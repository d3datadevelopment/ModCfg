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

use Twig\Compiler;
use Twig\Node\Expression\AbstractExpression;
use Twig\Node\Node;

class d3modcfgcheckNode extends Node
{
    public function __construct($params, $lineno = 0, $tag = null)
    {
        parent::__construct(['params' => $params], [], $lineno, $tag);
    }

    public function compile(Compiler $compiler)
    {
        $count = count($this->getNode('params'));
        $compiler->addDebugInfo($this);
        $nodeKeys = array_keys($this->getNode('params')->nodes);

        $compiler
            ->write('$d3checkdata = $d3checkdata ?? [];'.PHP_EOL)
            ->write(sprintf(
                '$d3checkdata[%d] = $d3checkdata[%d] ?? [];',
                $this->getAttribute(d3modcfgcheckNodeVisitor::COUNTER_VARNAME),
                $this->getAttribute(d3modcfgcheckNodeVisitor::COUNTER_VARNAME)
            ))
            ->raw(PHP_EOL);

        for ($i = 0; ($i < $count); $i++) {
            $nodeKey = $nodeKeys[$i];
            // argument is not an expression (such as, a \Twig_Node_Textbody)
            // we should trick with output buffering to get a valid argument to pass
            // to the functionToCall() function.
            if (($this->getNode('params')->getNode($nodeKey) instanceof AbstractExpression)) { // variables
                $compiler
                        ->write(sprintf(
                            '$d3checkdata[%d][\''.$nodeKey.'\'] = ',
                            $this->getAttribute(d3modcfgcheckNodeVisitor::COUNTER_VARNAME)
                        ))
                        ->subcompile($this->getNode('params')->getNode($nodeKey))
                        ->raw(';')
                        ->raw(PHP_EOL);
            } else {    // body
                $compiler->write('ob_start();'.PHP_EOL);

                $compiler->subcompile($this->getNode('params')->getNode($nodeKey));

                $compiler->write(
                    sprintf(
                        '$d3checkdata[%d][\''.$nodeKey.'\'] = ob_get_clean();'.PHP_EOL,
                        $this->getAttribute(d3modcfgcheckNodeVisitor::COUNTER_VARNAME)
                    )
                );
            }
        }

        $compiler
            ->write('$func = function(string $body, string $modid, string $optionvar = null, $optionvardefault = null) use (&$context) {'.PHP_EOL)
            ->indent()
            ->write('if ( \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::isCallable() && \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::isAvailable( $modid ) ) {'.PHP_EOL)
            ->indent()
            ->write('$set = \D3\ModCfg\Application\Model\Configuration\d3_cfg_mod::get( $modid );'.PHP_EOL)
            ->write('$context[\'mod_\'.$modid] = false;'.PHP_EOL)
            ->write('$context[\'mod_\'.$modid.\'__\'.$optionvar] = false;'.PHP_EOL)
            ->write('$context[\'oModCfg_\'.$modid] = $set;'.PHP_EOL)
            ->raw(PHP_EOL)
            ->write('if ( $set->isActive() && ( null == $optionvar || ( $optionvar && $set->getLicenseConfigData( $optionvar, $optionvardefault ) ) ) ) {'.PHP_EOL)
            ->indent()
            ->write('echo $body;'.PHP_EOL)
            ->write('$context[\'mod_\'.$modid] = true;'.PHP_EOL)
            ->write('if ($optionvar !== null) $context[\'mod_\'.$modid.\'__\'.$optionvar] = $set->getLicenseConfigData( $optionvar, $optionvardefault );'.PHP_EOL)
            ->outdent()
            ->write('}'.PHP_EOL)
            ->outdent()
            ->write('}'.PHP_EOL)
            ->outdent()
            ->write('};'.PHP_EOL);

        $compiler->write(sprintf(
            'call_user_func_array($func, $d3checkdata[%d]);'.PHP_EOL,
            $this->getAttribute(d3modcfgcheckNodeVisitor::COUNTER_VARNAME)
        ));
        $compiler->write(sprintf(
            'unset($d3checkdata[%d]);'.PHP_EOL,
            $this->getAttribute(d3modcfgcheckNodeVisitor::COUNTER_VARNAME)
        ));
        $compiler->write('unset($func);'.PHP_EOL);
    }
}
