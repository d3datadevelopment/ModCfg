<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
use D3\ModCfg\Application\Model\d3bitmask;
use D3\ModCfg\Application\Model\d3cliutils;
use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Log\d3log;
use D3\ModCfg\Application\Model\Log\d3LogLevel;
use Doctrine\DBAL\Driver\Exception as DBALDriverException;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Platforms\DateIntervalUnit;
use Doctrine\DBAL\Query\QueryBuilder;
use Exception;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Session;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Stopwatch\Stopwatch;

class LogStatus extends Command
{
    public const COMMAND_TITLE = 'log status command';

    const ARGUMENT_CLEANUP_VALUE = 'value';
    const ARGUMENT_CLEANUP_UNIT  = 'unit';

    /**
     * @codeCoverageIgnore
     */
    protected function configure(): void
    {
        $this
            ->setName('d3:modcfg:log:status')
            ->setDescription('show log status')
            ->setHelp('show log status')

            ->addArgument(
                self::ARGUMENT_CLEANUP_VALUE,
                InputArgument::OPTIONAL,
                'time value (integer - the "6" at "6 months)'
            )
            ->addArgument(
                self::ARGUMENT_CLEANUP_UNIT,
                InputArgument::OPTIONAL,
                sprintf(
                    'time unit, possible values are: "%1$s"',
                    $this->getUnitList()
                )
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws DBALDriverException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($output->getVerbosity() === OutputInterface::VERBOSITY_QUIET) {
            d3GetOxidDIC()->get('d3ox.modcfg.'.Session::class)->setVariable( 'd3modcfg_quiet', true );
        }

        $stopWatch = new Stopwatch();
        $stopWatch->start(self::COMMAND_TITLE);

        $logger = Registry::getLogger();
        $logger->notice(self::COMMAND_TITLE, ['status' => 'started']);

        $output->writeln('Try to show log status');

        try {
            $exitCode = Command::SUCCESS;
            $statusMessage = '<info>Successfully finished.</info>';

            Assert::that($input->getArgument(self::ARGUMENT_CLEANUP_UNIT))
                ->nullOr()
                ->inArray($this->getTimeUnitList(), 'Missing or invalid parameters, please check the passed arguments');

            $queryBuilder = $this->getQueryBuilder();

            $queryBuilder->select('count(*)', 'oxlogtype', 'DATE_FORMAT(OXTIME, \'%Y-%m\')')
                ->from(d3GetOxidDIC()->get('d3.modcfg.log_get')->getCoreTableName())
                ->groupBy('DATE_FORMAT(OXTIME, \'%Y-%m\')')
                ->addGroupBy('OXLOGTYPE')
                ->orderBy('DATE_FORMAT(OXTIME, \'%Y-%m\')', 'DESC')
                ->addOrderBy("FIELD(OXLOGTYPE, '".$this->getLogTypeListString()."')");

            if ($input->getArgument(self::ARGUMENT_CLEANUP_VALUE)) {
                $queryBuilder->where(
                    'oxtime < DATE_SUB(NOW(), INTERVAL ' .
                    $queryBuilder->createNamedParameter(
                        $input->getArgument(self::ARGUMENT_CLEANUP_VALUE), ParameterType::INTEGER
                    ) . ' ' . $input->getArgument(self::ARGUMENT_CLEANUP_UNIT) . ')'
                );
            }

            if ($output->getVerbosity() === OutputInterface::VERBOSITY_DEBUG) {
                $output->writeln(sprintf(
                    '<comment>%s</comment>',
                    d3database::getInstance()->getPreparedStatementQuery(
                        $queryBuilder->getSQL(), $queryBuilder->getParameters()
                    )
                ));
            }

            $result = array_merge(
                ['-1' => ['count', 'log type', 'date']],
                $queryBuilder->execute()->fetchAllNumeric()
            );

            $cliUtils = oxNew(d3cliutils::class);
            $output->writeln(sprintf(
                '<info>%s</info>',
                $cliUtils->table($result, [STR_PAD_LEFT, STR_PAD_RIGHT, STR_PAD_RIGHT])
            ));
        } catch (Exception $exception) {
            $logger->error(
                Constants::OXID_MODULE_ID . ': ' . $exception->getMessage(),
                ['exception' => $exception]
            );
            $statusMessage = '<error>Error: ' . $exception->getMessage() . '</error>';
            $exitCode = Command::FAILURE;
        } finally {
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

    protected function getLogTypeListString(): string
    {
        return implode(
            "', '",
            $this->getLogTypeList()
        );
    }

    protected function getLogTypeList(): array
    {
        /** @var d3log $log */
        $log = d3GetOxidDIC()->get('d3.modcfg.log_get');

        $bitmask = oxNew( d3bitmask::class);
        $range = $bitmask->removeBit(d3LogLevel::ERROR_AND_BELOW, d3LogLevel::EMPTY_AND_BELOW);

        return $log->getLogTypeListByRange($range);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getQueryBuilder(): QueryBuilder
    {
        return ContainerFactory::getInstance()->getContainer()->get( QueryBuilderFactoryInterface::class )->create();
    }
}
