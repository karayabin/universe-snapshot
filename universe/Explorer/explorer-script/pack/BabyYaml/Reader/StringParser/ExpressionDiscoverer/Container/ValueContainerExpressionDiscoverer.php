<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container;


use BabyYaml\Helper\VarTool;
use BabyYaml\Reader\StringIterator\StringIteratorInterface;
use BabyYaml\Reader\StringParser\Validator\ContainerValidator;


/**
 * ValueContainerExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-14
 *
 *
 * A value container contains value separated by the valueSep symbol.
 *
 *
 *
 * Symbols that need quote protection
 * -------------------------------------
 *
 * The following symbols need quote protection to be used as literal:
 *      - the valueSep symbol and the container end symbol
 *
 */
class ValueContainerExpressionDiscoverer extends TriContainerExpressionDiscoverer
{
    public function __construct()
    {
        parent::__construct();
        $this->setMonitorMessagePrefix('Val: ');
    }

    //------------------------------------------------------------------------------/
    // DEFINES ContainerExpressionDiscoverer
    //------------------------------------------------------------------------------/


    protected function parseContainer(StringIteratorInterface $it)
    {
        $string = $it->getString();
        $len = mb_strlen($string);
        $validator = ContainerValidator::create()->setSymbols($this->getContainerSpecialSymbols());

        $values = [];
        $lastWasSep = false;
        $firstIteration = true;


        while ($it->isValid()) {

            $itLen = 1;

            $this->notice("new iteration with char: " . $it->current() . " and position=" . $it->getPosition());

            $this->skipNotSignificant($it);


            if (true === $this->isValueSeparator($it)) {
                $this->notice("is valueSep");
                $itLen = $this->getValueSepLen();

                if (true === $firstIteration || true === $lastWasSep) {
                    if (true === $this->implicitValues) {
                        $values[] = $this->getDefaultImplicitValue();
                    }
                    else {
                        return false;
                    }
                }
                $lastWasSep = true;
            }
            elseif ($this->isContainerEnd($it)) {
                if (true === $lastWasSep) {
                    if (true === $this->implicitValues) {
                        $values[] = $this->getDefaultImplicitValue();
                    }
                    else {
                        return false;
                    }
                }
                $this->adjustIteratorPosition($it);
                $this->notice("container end found, pos=" . $it->getPosition());
                return $values;
            }
            else {
                $lastWasSep = false;
                $found = false;
                $this->notice("trying to parse value...");
                $v = $this->parseValue($it, $validator, $string, $len, $found);
                if (true === $found) {
                    $values[] = $v;
                    $this->warning("value found: " . VarTool::toString($v, ['details' => true]) . ", pos=" . $it->getPosition());
                }
                else {
                    $this->notice("value not found");
                    return false;
                }

            }


            $this->next($itLen, $it);
            $firstIteration = false;
            if ($this->isContainerEnd($it)) {
                if (true === $lastWasSep) {
                    if (true === $this->implicitValues) {
                        $values[] = $this->getDefaultImplicitValue();
                    }
                    else {
                        return false;
                    }
                }
                $this->adjustIteratorPosition($it);
                $this->notice("container end found, pos=" . $it->getPosition());
                return $values;
            }            
        }

        return false;
    }


}
