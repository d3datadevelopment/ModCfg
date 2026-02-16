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
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use Exception;
use OxidEsales\Eshop\Core\Registry;
use RuntimeException;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Stopwatch\Stopwatch;

class ClearTmp extends Command
{
    use LockableTrait;

    public const COMMAND_TITLE = 'clear tmp folder command';

    const ARGUMENT_TYPE = 'type';

    const TYPE_ALL = 'all';
    const TYPE_TEMPLATES = 'templates';
    const TYPE_DATABASE = 'database';
    const TYPE_LANGUAGE = 'language';
    const TYPE_MENU = 'menu';
    const TYPE_CLASSPATH = 'classpath';
    const TYPE_STRUCTURE = 'structure';
    const TYPE_TAGCLOUD = 'tagcloud';
    const TYPE_MODULE = 'module';
    const TYPE_SEO = 'seo';

    /**
     * @codeCoverageIgnore
     */
    protected function configure(): void
    {
        $this
            ->setName('d3:modcfg:cleartmp')
            ->setDescription('clear tmp folder')
            ->setHelp('delete objects from temporary folder')

            ->addArgument(
                self::ARGUMENT_TYPE,
                InputArgument::REQUIRED,
                sprintf(
                    'Types of objects to be deleted, possible values are "%1$s"',
                    $this->getTypeListString()
                ),
            );
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

        $output->writeln('Try to clear the tmp folder');

        try {
            $exitCode = Command::SUCCESS;
            $statusMessage = '<info>Successfully finished.</info>';

            Assert::that($input->getArgument(self::ARGUMENT_TYPE))
                ->nullOr()
                ->inArray($this->getTypeList(), 'Missing or invalid parameters, please check the passed arguments');

            $controller = $this->getClearTmp();
            call_user_func_array(
                [$controller, $this->getTypeMethod($input->getArgument(self::ARGUMENT_TYPE))],
                []
            );
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

    protected function getTypeListString(): string
    {
        return implode(
            ", ",
            $this->getTypeList()
        );
    }

    protected function getTypeList(): array
    {
        return [
            self::TYPE_ALL,
            self::TYPE_TEMPLATES,
            self::TYPE_DATABASE,
            self::TYPE_LANGUAGE,
            self::TYPE_MENU,
            self::TYPE_CLASSPATH,
            self::TYPE_STRUCTURE,
            self::TYPE_TAGCLOUD,
            self::TYPE_MODULE,
            self::TYPE_SEO,
        ];
    }

    protected function getTypeMethod(string $type): string
    {
        return match ( strtolower( $type ) ) {
            self::TYPE_ALL => 'clearAllCache',
            self::TYPE_TEMPLATES => 'clearFrontendCache',
            self::TYPE_DATABASE => 'clearDataBaseStructCache',
            self::TYPE_LANGUAGE => 'clearLangCache',
            self::TYPE_MENU => 'clearMenuCache',
            self::TYPE_CLASSPATH => 'clearClassPathCache',
            self::TYPE_STRUCTURE => 'clearStructureCache',
            self::TYPE_TAGCLOUD => 'clearTagcloudCache',
            self::TYPE_SEO => 'clearSeoCache',
            self::TYPE_MODULE => 'clearModuleCache',
            default => throw new RuntimeException('no valid type defined'),
        };
    }

    /**
     * @return d3clrtmp
     */
    protected function getClearTmp(): d3clrtmp
    {
        return oxNew( d3clrtmp::class );
    }
}
