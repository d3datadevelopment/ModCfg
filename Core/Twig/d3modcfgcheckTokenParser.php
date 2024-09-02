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

use OxidEsales\Eshop\Core\Registry;
use Twig\Error\SyntaxError;
use Twig\Node\Node;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

class d3modcfgcheckTokenParser extends AbstractTokenParser
{
    public function parse(Token $token): Node
    {
        $parser = $this->parser;
        $stream = $parser->getStream();
        $lineNo = $token->getLine();

        $params = $this->getInlineParams();

        $continue = true;

        while ($continue) {
            // create subtree until the decideMyTagFork() callback returns true
            $body = $parser->subparse([ $this, 'decideTokenEnd' ]);

            // I like to put a switch here, in case you need to add middle tags, such
            // as: {% mytag %}, {% nextmytag %}, {% endmytag %}.
            $tag = $stream->next()->getValue();

            $continue = match ($tag) {
                'endd3modcfgcheck' => false,
                default => throw new SyntaxError(sprintf('Unexpected end of template. Twig was looking for the following tags "endd3modcfgcheck" to close the "d3modcfgcheck" block started at line %d)', $lineNo), -1),
            };

            // you want $body at the beginning of your arguments
            $this->array_unshift_assoc($params, 'body', $body);
            $stream->expect(Token::BLOCK_END_TYPE);
        }

        return new d3modcfgcheckNode(new Node($params), $lineNo, $this->getTag());
    }

    protected function array_unshift_assoc(&$arr, $key, $val): array
    {
        $arr = array_reverse($arr, true);
        $arr[$key] = $val;
        $arr = array_reverse($arr, true);
        return $arr;
    }

    protected function getInlineParams(): array
    {
        $stream = $this->parser->getStream();
        $params = [];

        try {
            while (! $stream->test(Token::BLOCK_END_TYPE)) {
                // Read the attribute name
                $name = $stream->next()->getValue();
                // Read the "="
                $stream->expect(Token::OPERATOR_TYPE, '=');
                $params[ $name ] = $this->parser->getExpressionParser()->parseExpression();
            }
            $stream->expect(Token::BLOCK_END_TYPE);
        } catch (SyntaxError $e) {
            Registry::getLogger()->error($e->getMessage());
        }

        return $params;
    }

    public function decideTokenEnd(Token $token): bool
    {
        return $token->test('endd3modcfgcheck');
    }

    public function getTag(): string
    {
        return 'd3modcfgcheck';
    }
}
