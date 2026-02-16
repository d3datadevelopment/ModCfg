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

use D3\ModCfg\Application\Model\Constants;
use D3\ModCfg\Application\Model\Install\d3updateinstaller;
use Exception;
use OxidEsales\Eshop\Core\Registry;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Stopwatch\Stopwatch;

class ModuleSetup extends Command
{
    use LockableTrait;

    public const COMMAND_TITLE = 'module setup';

    /**
     * @codeCoverageIgnore
     */
    protected function configure(): void
    {
        $this
            ->setName('d3:modcfg:modules:setup')
            ->setDescription('performs setup tasks')
            ->setHelp('performs setup tasks');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($output->getVerbosity() === OutputInterface::VERBOSITY_QUIET) {
            Registry::getSession()->setVariable( 'd3cfgmodcli_quiet', true );
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

        $output->writeln('Try to set up modules');

        try {
            $exitCode = Command::SUCCESS;
            $statusMessage = '<info>Successfully finished.</info>';

            $updateInstaller = $this->getUpdateInstaller();
            $updateInstaller->startModuleInstallation();
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

    /**
     * @return d3updateinstaller
     */
    protected function getUpdateInstaller(): d3updateinstaller
    {
        return oxNew( d3updateinstaller::class );
    }
}
