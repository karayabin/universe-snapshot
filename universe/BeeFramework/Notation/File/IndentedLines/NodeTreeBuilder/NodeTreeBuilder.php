<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\NodeTreeBuilder;

use BeeFramework\Component\Log\SuperLogger\Traits\SuperLoggerTrait;
use BeeFramework\Notation\File\IndentedLines\KeyFinder\KeyFinder;
use BeeFramework\Notation\File\IndentedLines\KeyFinder\KeyFinderInterface;
use BeeFramework\Notation\File\IndentedLines\MultiLineCompiler\MultiLineCompilerInterface;
use BeeFramework\Notation\File\IndentedLines\MultiLineCompiler\WithLeftMarginMultiLineCompiler;
use BeeFramework\Notation\File\IndentedLines\MultiLineDelimiter\MultiLineDelimiterInterface;
use BeeFramework\Notation\File\IndentedLines\MultiLineDelimiter\SingleCharMultiLineDelimiter;
use BeeFramework\Notation\File\IndentedLines\Node\Node;
use BeeFramework\Notation\File\IndentedLines\Node\NodeInterface;
use BeeFramework\Component\Error\CodifiedErrors\Traits\CodifiedErrorsTrait;


/**
 * NodeTreeBuilder
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class NodeTreeBuilder extends BaseNodeTreeBuilder
{

    protected $indentChar;
    protected $nbIndentCharPerLevel;
    protected $hasLeadingIndentChar;

    private $indentCharLen;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'indentChar' => ' ',
            'nbIndentCharPerLevel' => 4,
            'hasLeadingIndentChar' => false,
        ], $options);
        parent::__construct($options);

        $this->indentChar = $options['indentChar'];
        $this->nbIndentCharPerLevel = $options['nbIndentCharPerLevel'];
        $this->hasLeadingIndentChar = $options['hasLeadingIndentChar'];
        $this->indentCharLen = strlen($this->indentChar);
    }


    /**
     * @return int|false in case of failure,
     *                  in which case a codified error should be triggered.
     */
    protected function getLineLevel($line)
    {
        $len = strlen($line);
        $len2 = strlen(ltrim($line, $this->indentChar));
        $nbIndentChars = $len - $len2;

        if (true === $this->hasLeadingIndentChar) {
            if ($nbIndentChars > 0) {
                if (0 === ($nbIndentChars - 1) % $this->nbIndentCharPerLevel) {
                    return (int)(($nbIndentChars - 1) / $this->nbIndentCharPerLevel);
                }
                else {
                    $this->addMyCodifiedError('P501', [
                        'nbIndentCharPerLevel' => $this->nbIndentCharPerLevel,
                    ]);
                }
            }
            else {
                $this->addMyCodifiedError('P502', [
                    'indentChar' => $this->indentChar,
                ]);
            }
        }
        else {
            if (0 !== $nbIndentChars % $this->nbIndentCharPerLevel) {
                $this->addMyCodifiedError('P503', [
                    'indentChar' => $this->indentChar,
                    'nbIndentCharPerLevel' => $this->nbIndentCharPerLevel,
                    'nbIndentChars' => $nbIndentChars,
                ]);
            }
            $level = ($nbIndentChars / $this->nbIndentCharPerLevel);
            return $level;
        }
        return 0;
    }

    /**
     * @return string|false in case of failure,
     *                  in which case a codified error should be triggered.
     *                  A line content is the line once the indentation symbols and
     *                  starting blank chars have been stripped out.
     */
    protected function getLineWithoutIndent($line)
    {
        if (1 === $this->indentCharLen) {
            return ltrim(ltrim($line, $this->indentChar));
        }
        else {
            while (0 === strpos($line, $this->indentChar)) {
                $line = substr($line, $this->indentCharLen);
            }
            return ltrim($line);
        }
    }

    protected function getCodifiedErrorsMap()
    {
        $x = ' on file {file}, line {lineNb}';
        return array_merge(parent::getCodifiedErrorsMap(), [
            'P501' => "The number of dash starting a line must be equal to {nbIndentCharPerLevel}n + 1, n being the level of the element" . $x,
            'P502' => "A line must start with at least one indentChar ({indentChar})" . $x,
            'P503' => "Number of indentChars ({indentChar}) for indentation must be a multiple of {nbIndentCharPerLevel}, ({nbIndentChars} indentChars found)" . $x,
        ]);
    }


}
