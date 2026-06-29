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
use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Log\d3log;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\DateIntervalUnit;
use Doctrine\DBAL\Query\QueryBuilder;
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
use Throwable;

class LogCleanup extends Command
{
    use LockableTrait;

    public const COMMAND_TITLE = 'cleanup log command';

    public const ARGUMENT_CLEANUP_VALUE = 'value';
    public const ARGUMENT_CLEANUP_UNIT  = 'unit';

    /**
     * @codeCoverageIgnore
     */
    protected function configure(): void
    {
        $this
            ->setName('d3:modcfg:log:cleanup')
            ->setDescription('cleanup log items')
            ->setHelp('Enables remote execution of maintenance tasks')

            ->addArgument(
                self::ARGUMENT_CLEANUP_VALUE,
                InputArgument::REQUIRED,
                'time value (integer - the "6" at "6 months)'
            )
            ->addArgument(
                self::ARGUMENT_CLEANUP_UNIT,
                InputArgument::REQUIRED,
                sprintf(
                    'time unit, possible values are: "%1$s"',
                    $this->getUnitList()
                )
            );
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($output->getVerbosity() === OutputInterface::VERBOSITY_QUIET) {
            Registry::getSession()->setVariable('d3modcfg_quiet', true);
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

        $output->writeln('Try to clear logs');

        try {
            $exitCode = Command::SUCCESS;
            $statusMessage = '<info>Successfully finished.</info>';

            $cleanupValue = $input->getArgument(self::ARGUMENT_CLEANUP_VALUE);
            $cleanupUnit  = strtoupper($input->getArgument(self::ARGUMENT_CLEANUP_UNIT));

            Assert::that($cleanupValue)
                ->integerish('Missing or invalid parameters, please check the passed arguments');
            Assert::that($cleanupUnit)
                ->inArray($this->getTimeUnitList(), 'Missing or invalid parameters, please check the passed arguments');

            $queryBuilder = $this->getQueryBuilder();
            $queryBuilder->delete(d3log::get('d3modcfg_lib', 0)->getCoreTableName())
                ->where('oxtime < DATE_SUB(NOW(), INTERVAL ' .
                         $queryBuilder->createNamedParameter(
                             (int) $cleanupValue,
                             ParameterType::INTEGER
                         ) . ' ' . $cleanupUnit . ')');

            if ($output->getVerbosity() === OutputInterface::VERBOSITY_DEBUG) {
                $output->writeln(sprintf(
                    '<comment>%s</comment>',
                    d3database::getInstance()->getPreparedStatementQuery(
                        $queryBuilder->getSQL(),
                        $queryBuilder->getParameters()
                    )
                ));
            }

            $affected = $queryBuilder->execute();
            $output->writeln(sprintf(
                '<info>%1$s entries were removed</info>',
                $affected
            ));
        } catch (Throwable $exception) {
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

    protected function getUnitList(): string
    {
        return implode(
            ", ",
            $this->getTimeUnitList()
        );
    }

    protected function getTimeUnitList(): array
    {
        return [ DateIntervalUnit::HOUR, DateIntervalUnit::DAY, DateIntervalUnit::MONTH, DateIntervalUnit::YEAR];
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getQueryBuilder(): QueryBuilder
    {
        return ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();
    }
}
