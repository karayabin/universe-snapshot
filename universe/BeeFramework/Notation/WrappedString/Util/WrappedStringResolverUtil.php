<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\WrappedString\Util;

use BeeFramework\Notation\WrappedString\Tool\WrappedStringTool;
use BeeFramework\Bat\BdotTool;
use BeeFramework\Notation\WrappedString\Util\Exception\WrappedStringUtilCircularException;
use BeeFramework\Notation\WrappedString\Util\Exception\WrappedStringUtilException;


/**
 * WrappedStringResolverUtil
 * @author Lingtalfi
 * 2015-03-07
 *
 */
class WrappedStringResolverUtil
{


    protected $refArray;
    protected $beginSymbol;
    protected $beginSymbolLen;
    protected $endSymbol;
    protected $endSymbolLen;
    protected $escapingMode;
    protected $options;

    private $circular;
    /**
     * @var
     */
    private $errors;

    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            'beginSymbol' => '§',
            'endSymbol' => '§',
            /**
             * When useInline is false (by default), inline ref are ignored, and will not trigger errors.
             */
            'useInline' => false,
            /**
             * Behaviour with unresolved references and invalid references.
             * errorMode:
             *      0: throw exception
             *      1: collect errors, the getErrors method should be used to collect them
             */
            'errorMode' => 0,
            /**
             * see wrapped string doc for more details:
             *
             *      - 0:  no escaping
             *      - 1:  simple backslash escaping
             *      - 2:  recursive backslash escaping
             */
            'escapingMode' => 1,
        ], $options);

        $this->beginSymbol = $options['beginSymbol'];
        $this->beginSymbolLen = mb_strlen($this->beginSymbol);
        $this->endSymbol = $options['endSymbol'];
        $this->endSymbolLen = mb_strlen($this->endSymbol);
        $this->escapingMode = $options['escapingMode'];
        $this->circular = [];
        $this->errors = [];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ArrayWithReferencesInterface
    //------------------------------------------------------------------------------/
    /**
     * In this implementation, we return bool indicating if the method has errors or not.
     * It is only useful if errorMode is 1.
     * It assumes that mb_internal_encoding is set to utf8, but you're responsible for that
     */
    public function dereferenceArray(array &$targetArray)
    {
        $this->errors = [];
        $this->refArray = $targetArray; // resolving itself
        BdotTool::walk($targetArray, function (&$v, $k, $p) {
            $this->circular = [];
            $this->doResolveReferences($k, $v, $p);
        });

        return (empty($this->errors));
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getErrors()
    {
        return $this->errors;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function doResolveReferences($key, &$value, $dotPath)
    {
        if (is_string($value) && false !== $refs = $this->getReferencesInfo($value)) {
            /**
             * Check for circular references first
             */
            $vector = $key . '-' . implode('-', array_keys($refs));
            if (!in_array($vector, $this->circular)) {
                $this->circular[] = $vector;
            }
            else {
                throw new WrappedStringUtilCircularException(sprintf("Circular reference with vector: %s", $vector));
            }

            /**
             * Now try to resolve references, depending on the reference type
             */
            foreach ($refs as $referencedKey => $refType) {
                $this->dereference($dotPath, $referencedKey, $refType, $value);
            }
        }
    }


    protected function dereference($dotPath, $referencedKey, $refType, &$value)
    {
        $found = false;
        $v = BdotTool::getDotValue($referencedKey, $this->refArray, null, $found);
        if (true === $found) {
            $this->doResolveReferences($referencedKey, $v, $dotPath);
            if (0 === $refType) {
                // standalone reference
                $value = $v;
            }
            else {
                // inline reference
                if (is_string($v) || is_numeric($v)) {
                    $fullKey = $this->beginSymbol . $referencedKey . $this->endSymbol;
                    $value = str_replace($fullKey, $v, $value);
                }
                else {
                    $this->error(sprintf("invalid reference: %s, trying to inject value of type %s in a string", $dotPath, gettype($v)));
                }
            }
        }
        else {
            $this->error(sprintf("unresolved reference: %s", $dotPath));
        }
    }

    protected function error($msg)
    {
        if (0 === $this->options['errorMode']) {
            throw new WrappedStringUtilException($msg);
        }
        else {
            $this->errors[] = $msg;
        }
    }

    /**
     * @return false|array of referencedKey => refType
     *              type:
     *                      0: standalone
     *                      1: inline
     *              false if the value does not contain any reference (this depends on inlineMode)
     */
    protected function getReferencesInfo($value)
    {
        $ret = false;
        $mbPos = 0;
        $c = 0;
        while (false !== $info = WrappedStringTool::getNextWrappedStringInfo($value, $mbPos, $this->beginSymbol, $this->beginSymbolLen, $this->endSymbol, $this->endSymbolLen, $this->escapingMode)) {
            $ret = [];
            // find the value to inject
            $wrappedString = mb_substr($value, $info[0], $info[1]);
            $unwrapped = WrappedStringTool::unwrap($wrappedString, $this->beginSymbol, $this->beginSymbolLen, $this->endSymbol, $this->endSymbolLen, $this->escapingMode);
            $isStandalone = (0 === $info[0] && $info[1] === mb_strlen($value));
            if (true === $isStandalone) {
                $ret[$unwrapped] = 0;
                break;
            }
            else {
                $ret[$unwrapped] = 1;
            }

            $mbPos = $info[1] + 1;
            $c++;
        }
        return $ret;
    }


}
