<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
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
