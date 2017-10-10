<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\Psn;


/**
 * PsnResolver.
 * @author Lingtalfi
 *
 *
 */
class PsnResolver implements PsnResolverInterface
{


    protected $symbols = array();
    private $sortedSymbols;


    public function __construct(array $symbols = array())
    {
        foreach ($symbols as $symbol => $symbolicPath) {
            $this->symbols['[' . $symbol . ']'] = $this->getPath($symbolicPath);
        }
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS PsnResolverInterface
    //------------------------------------------------------------------------------/
    /**
     * @see PsnResolverInterface
     * @inheritDoc
     */
    public function getPath($symbolicPath, $object = null)
    {
        if (is_string($symbolicPath)) {
            if (is_object($object)) {
                $class = new \ReflectionObject($object);
                $symbolicPath = str_replace('[object]', dirname($class->getFileName()), $symbolicPath);
            }
            return str_replace(array_keys($this->symbols), array_values($this->symbols), $symbolicPath);
        }
        throw new \InvalidArgumentException("Invalid symbolicPath argument type: a string was expected");
    }

    public function getSymbolicPath($absolutePath)
    {
        if (null === $this->sortedSymbols) {
            $this->sortedSymbols = $this->symbols;
            uasort($this->sortedSymbols, function ($a, $b) {
                if (strlen($a) < strlen($b)) {
                    return 1;
                }
                return -1;
            });
        }
        return str_replace($this->sortedSymbols, array_keys($this->sortedSymbols), $absolutePath);
    }

//    public function getSymbols()
//    {
//        return array_keys($this->symbols);
//    }


}
