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

// https://stackoverflow.com/questions/26170727/how-to-create-a-twig-custom-tag-that-executes-a-callback

// example: {% d3modcfgcheck modid="d3_ordermanager" optionvar="value1" optionvardefault="value3" %}

declare(strict_types=1);

namespace D3\ModCfg\Core\Twig;

use Twig\Extension\AbstractExtension;

class d3modcfgcheckExtension extends AbstractExtension
{
    public function getTokenParsers(): array
    {
        return array_merge(
            parent::getTokenParsers(),
            [oxNew(d3modcfgcheckTokenParser::class)]
        );
    }

    public function getNodeVisitors(): array
    {
        return array_merge(
            parent::getNodeVisitors(),
            [oxNew(d3modcfgcheckNodeVisitor::class)]
        );
    }
}
