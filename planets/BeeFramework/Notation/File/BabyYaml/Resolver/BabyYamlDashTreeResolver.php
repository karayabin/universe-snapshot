<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyYaml\Resolver;

use BeeFramework\Bat\QuoteTool;

use BeeFramework\Notation\File\BabyYaml\Reader\BabyYamlInlineReader;
use BeeFramework\Notation\PhpArray\DashTree\DashTreeNode;
use BeeFramework\Notation\PhpArray\DashTree\Resolver\VirtualKeyDashTreeResolver;
use BeeFramework\Notation\String\InlineNotation\InlineNotationTool;


/**
 * BabyYamlDashTreeResolver
 * @author Lingtalfi
 * 2014-09-09
 *
 */
class BabyYamlDashTreeResolver extends VirtualKeyDashTreeResolver
{

    protected $exceptionMode;

    public function __construct(array $options = [])
    {

        $inlineReaderOptions = (array_key_exists('inlineReaderOptions', $options)) ? $options['inlineReaderOptions'] : [];
        $syntaxErrors = [];
        $byReader = BabyYamlInlineReader::create($inlineReaderOptions);

        $options = array_replace([
            'exceptionMode' => 0, // [exceptionMode™]
        ], $options, [
            'getKeyValue' => function (DashTreeNode $node) use (&$syntaxErrors, $byReader) {

                    $hasChildren = $node->hasChildren();


                    $value = $node->getValue();
                    // strip comments
                    $value = InlineNotationTool::stripComment($value, [
                        'starterChars' => [':'],
                    ]);


                    $k = false;
                    $vv = false;


                    /**
                     * - /Users/pierrelafitte/Desktop/tmp/src/fruits/banana.txt:0222
                     */
                    if ('- ' === substr($value, 0, 2)) {
                        $v = substr($value, 2);
                        $v = $byReader->parse($v);
                    }
                    else {

                        $pos = 0;
                        $v = QuoteTool::parseComponent($value, [':'], $pos);
                        if (false !== $rest = substr($value, $pos)) {
                            if (':' === substr($rest, 0, 1)) {
                                // this will allow keys to use the same protection mechanism as scalar values,
                                // so it's easier for the user to understand babyYaml's syntax.
                                $k = $byReader->parse($v);
//                            $k = $v; // that was before...
                                if (false === $node->hasMultiLineValue()) {
                                    if (false !== $v = substr($rest, 1)) {
                                        $v = $byReader->parse($v);
                                        if (true === $hasChildren) {
                                            $this->syntaxError(sprintf("A line with real children should not specifies a virtual value (%s), line %s", $value, $node->getLine()));
                                        }
                                    }
                                }
                                else {
                                    $v = $node->getMultiLineValue();
                                }
                            }
                        }
                        else {
                            if (true === $hasChildren) {
                                // dash with children
                                if ('-' === $v) {
                                }
                                else {
                                    $this->syntaxError(sprintf("Invalid key format: missing the colon at the end of the line (%s), line %s", $v, $node->getLine()));
                                }
                            }
                        }
                    }


                    return [$k, $v, $vv];
                },
        ]);
        parent::__construct($options);
        $this->exceptionMode = $options['exceptionMode'];
    }

    private function syntaxError($msg)
    {
        if (0 === $this->exceptionMode) {
            throw new \RuntimeException($msg);
        }
        elseif (1 === $this->exceptionMode) {
            trigger_error($msg, E_USER_WARNING);
        }
        return false;
    }

}
