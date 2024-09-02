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

use Twig\Environment;
use Twig\Node\Node;
use Twig\NodeVisitor\NodeVisitorInterface;

class d3modcfgcheckNodeVisitor implements NodeVisitorInterface
{
    public const COUNTER_VARNAME = 'd3CheckCounter';

    private int $counter = 0;

    public function enterNode(Node $node, Environment $env): Node
    {
        if ($node instanceof d3modcfgcheckNode) {
            $node->setAttribute(self::COUNTER_VARNAME, $this->counter++);
        }

        return $node;
    }

    public function leaveNode(Node $node, Environment $env): Node
    {
        if ($node instanceof d3modcfgcheckNode) {
            $node->setAttribute(self::COUNTER_VARNAME, $this->counter--);
        }
        return $node;
    }

    public function getPriority(): int
    {
        return 0;
    }
}
