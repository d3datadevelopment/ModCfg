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

namespace D3\ModCfg\Application\Model\Log;

use Psr\Log\InvalidArgumentException;
use Psr\Log\LoggerInterface;

class Psr3Adapter implements LoggerInterface
{
    public function __construct(protected d3LogInterface $log)
    {
    }

    public function notice($message, array $context = []): void
    {
        $this->log->notice(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function info($message, array $context = []): void
    {
        $this->log->info(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function error($message, array $context = []): void
    {
        $this->log->error(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function emergency($message, array $context = []): void
    {
        $this->log->emergency(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function warning($message, array $context = []): void
    {
        $this->log->warning(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function alert($message, array $context = []): void
    {
        $this->log->alert(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function critical($message, array $context = []): void
    {
        $this->log->critical(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function debug($message, array $context = []): void
    {
        $this->log->debug(__CLASS__, __FUNCTION__, __LINE__, '', $message);
    }

    public function log($level, $message, array $context = []): void
    {
        if (is_string($level)) {
            $level = d3LogLevel::stringToIntLevel((string) $level);
        }

        if (is_int($level)) {
            $this->log->log($level, __CLASS__, __FUNCTION__, __LINE__, '', $message);
        } else {
            throw new InvalidArgumentException('log level must be string or integer');
        }
    }
}
