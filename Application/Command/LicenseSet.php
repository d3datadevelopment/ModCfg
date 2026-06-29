<?php

/**
 * Copyright (c) D3 Data Development (Inh. Thomas Dartsch)
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <info@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

declare(strict_types=1);

namespace D3\ModCfg\Application\Command;

use Assert\Assert;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Constants;
use Doctrine\DBAL\Driver\Exception as DBALDriveerException;
use Doctrine\DBAL\Exception as DBALException;
use Doctrine\DBAL\Query\QueryBuilder;
use Exception;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Stopwatch\Stopwatch;

class LicenseSet extends Command
{
    use LockableTrait;

    public const COMMAND_TITLE = 'license key set command';

    public const ARGUMENT_SHOPID = 'shop id';
    public const ARGUMENT_MODULEID = 'module id';
    public const ARGUMENT_LICENSEKEY = 'license key';

    /**
     * @codeCoverageIgnore
     */
    protected function configure(): void
    {
        $this
            ->setName('d3:modcfg:license:set')
            ->setDescription('set license key for D3 modules')
            ->setHelp('It registers module licences.')

            ->addArgument(
                self::ARGUMENT_SHOPID,
                InputArgument::REQUIRED,
                'ID of the selected shop'
            )
            ->addArgument(
                self::ARGUMENT_MODULEID,
                InputArgument::REQUIRED,
                'ID of the module in question'
            )
            ->addArgument(
                self::ARGUMENT_LICENSEKEY,
                InputArgument::REQUIRED,
                'license key'
            );
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($output->getVerbosity() === OutputInterface::VERBOSITY_QUIET) {
            Registry::getSession()->setVariable('d3cfgmodcli_quiet', true);
        }

        $stopWatch = new Stopwatch();
        $stopWatch->start(self::COMMAND_TITLE);

        $logger = Registry::getLogger();
        $logger->notice(self::COMMAND_TITLE, ['status' => 'started']);

        if ($this->isLocked()) {
            $output->writeln('The command is already running in another process.');
            $logger->notice(self::COMMAND_TITLE, ['status' => 'aborted', 'reason' => 'already running']);
            return Command::SUCCESS;
        }

        $output->writeln('Try to set modules license key');

        try {
            $exitCode = Command::SUCCESS;
            $statusMessage = '<info>Successfully finished.</info>';

            Assert::that(d3_cfg_mod::isAvailable($input->getArgument(self::ARGUMENT_MODULEID)))->true(
                sprintf(
                    'module id "%1$s" is not available in "%2$s"',
                    $input->getArgument(self::ARGUMENT_MODULEID),
                    $this->getModuleIdList()
                )
            );

            $set = oxNew(d3_cfg_mod::class);
            $set->setShopId($input->getArgument(self::ARGUMENT_SHOPID));
            $set->load($set->getModOxid($input->getArgument(self::ARGUMENT_MODULEID)));
            $set->setSerial($input->getArgument(self::ARGUMENT_LICENSEKEY));
            $set->save();
        } catch (Exception $exception) {
            $logger->error(
                Constants::OXID_MODULE_ID . ': ' . $exception->getMessage(),
                ['exception' => $exception]
            );
            $statusMessage = '<error>Error: ' . $exception->getMessage() . '</error>';
            $exitCode = Command::FAILURE;
        } finally {
            $this->release();
            $performance = (string)$stopWatch->stop(self::COMMAND_TITLE);
            $logger->notice(self::COMMAND_TITLE, [
                'status' => 'finished',
                'exit code' => $exitCode,
                'performance' => $performance,
            ]);
            $output->writeln($statusMessage . ' ' . ($output->isVerbose() ? $performance : ''));
            return $exitCode;
        }
    }

    /**
     * @codeCoverageIgnore
     */
    protected function isLocked(): bool
    {
        return !$this->lock();
    }

    protected function getModuleIdList(): string
    {
        try {
            /** @var QueryBuilder $oQB */
            $oQB = ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();
            $oQB->select('DISTINCT oxmodid')->from(oxNew(d3_cfg_mod::class)->getCoreTableName());
            $idList = array_keys($oQB->execute()->fetchAllAssociativeIndexed());

            return implode(
                ", ",
                $idList
            );
        } catch (DBALException|DBALDriveerException) {
            return '';
        }
    }
}
