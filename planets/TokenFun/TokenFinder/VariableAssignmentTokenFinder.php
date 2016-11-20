<?php

namespace TokenFun\TokenFinder;

use TokenFun\TokenArrayIterator\TokenArrayIterator;
use TokenFun\Tool\TokenTool;
use TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;

/**
 * VariableAssignmentTokenFinder
 * @author Lingtalfi
 * 2016-01-02
 *
 * If finds a variable assignment, like for instance:
 *
 *          - $o = 6;
 *          - $o = $p;
 *          - $o = $p + 4;
 *          - $o = "pou";
 *          - $o = "pou" . "poo";
 *          - $o = <<<EOF
 *                      blabla
 *            EOF;
 *          - $o = <<<'EOF'
 *                      blabla
 *            EOF;
 *          - $o = array();
 *          - $o = ["apple" => 'juice'];
 *          - $o = new \Poo();
 *          - $o = 6 + 4 / 78;
 *
 *
 * With some options, it can also find more:
 *
 *          - $o['oo'] = 6;
 *          - $o['oo'][987] = 6;
 *          - $$dyn = 6;
 *          - $$$$dyn = 6;
 *
 *
 *
 * Note:
 *      assignments via ternary operator are not handled.
 *
 *
 *
 * Nested elements can also be found with nestedMode enabled (disabled by default).
 * This happens only if a variable instantiation contains other variables instantiation, like in the following example:
 *
 *          $o = function(){
 *                 $p = 4;
 *               };
 *
 *
 *
 * Variables instantiation inside class are not parsed by default.
 * Set the skipClass flag to false (true by default) to override this behaviour.
 *
 *          class DOO{
 *                 protected $do = 6;
 *
 *                  public function __construct(){
 *                      $this->do = 7;
 *                      $p = 8;
 *                  }
 *          }
 *
 *
 *
 *      Personal note:
 *              This class is not designed to parse variables from a class, instead, you should create another
 *              more specialized class if that's what you are looking for.
 *
 *
 *
 * Variables instantiation inside regular (not assigned to a variable) function are not parsed by default.
 * Set the skipFunction flag to false (true by default) to override this behaviour.
 *
 *          function poo(){
 *              $x = 5;
 *          }
 *
 *
 *
 *
 * Variables inside for loops conditions are skipped by default.
 * Set the skipForLoopCondition flag to false (true by default) to override this behaviour.
 *
 *          for( $i=0; $i <= 10; $i++ ){ 
 *              // do something
 *          }
 *
 *
 *
 * Variables inside statements-group of control structure are parsed by default.
 * Set the skipControlStructure flag to true (false by default) to override this behaviour.
 *
 *              if(true){
 *                  $o = 6;
 *              }
 *
 *              while(true){
 *                  $o = 6;
 *              }
 *
 *              switch ($o){ 
 *                  case "pou":
 *                      $p = 9;
 *                  break;
 *              }
 *
 *              foreach($doom as $do){ 
 *                  $p = 8;
 *              }
 *
 *              for($i=0; $i<=10; $i++){ 
 *                  $p = 8;
 *              }
 *
 *              ...
 *
 *
 *
 * Array affectations are not parsed by default.
 * Set the allowArrayAffectation flag to true (false by default) to override this behaviour.
 *
 *
 *              $p["pou"] = 6;
 *              $p["pou"]["dii"] = 6;
 *
 *
 *
 * By default, dynamic variables (on the left part of the equal symbol) are not parsed.
 * Set the allowDynamic flag to true (false by default) to override this behaviour.
 *
 *
 *              $$dyn = 6;
 *              $$$$$dyn = 6;
 *
 *
 *
 */
class VariableAssignmentTokenFinder extends RecursiveTokenFinder
{


    protected $skipClass;
    protected $skipFunction;
    protected $skipForLoopCondition;
    protected $skipControlStructure;
    protected $allowArrayAffectation;
    protected $allowDynamic;

    public function __construct()
    {
        $this->skipClass = true;
        $this->skipFunction = true;
        $this->skipForLoopCondition = true;
        $this->skipControlStructure = false;
        $this->allowArrayAffectation = false;
        $this->allowDynamic = false;
    }


    /**
     * @return array of match
     *                  every match is an array with the following entries:
     *                          0: int startIndex
     *                                      the index at which the pattern starts
     *                          1: int endIndex
     *                                      the index at which the pattern ends
     *
     */
    public function find(array $tokens)
    {
        $ret = [];
        $tai = new TokenArrayIterator($tokens);
        $start = null;
        while ($tai->valid()) {
            $cur = $tai->current();
            if (null === $start) {
                if (TokenTool::match(T_VARIABLE, $cur)) {
                    $start = $tai->key();

                    $isDynamic = false;
                    if (true === $this->allowDynamic) {
                        $tai->prev();
                        while (TokenTool::match('$', $tai->current())) {
                            $isDynamic = true;
                            $tai->prev();
                        }

                        if (true === $isDynamic) {
                            $tai->next(); // re-balancing the last prev move from the while loop 
                            $parseStart = $start;
                            $start = $tai->key();
                            $tai->seek($parseStart);
                        }
                        else {
                            $tai->next();
                        }
                    }

                    /**
                     * By default in this implementation, we have chosen to parse
                     * array affectation ONLY IF the variable is not dynamic,
                     * because this (array affectation on a dynamic var) is not valid php:
                     *
                     *          $$x["pou"] = 6;
                     *
                     */
                    if (true === $this->allowArrayAffectation && false === $isDynamic) {
                        $tai->next();
                        if (false === TokenArrayIteratorTool::skipSquareBracketsChain($tai)) {
                            $tai->prev();
                        }
                    }
                }
                else {
                    if (true === $this->skipControlStructure) {
                        if (true === TokenTool::match('{', $tai->current())) {
                            TokenArrayIteratorTool::moveToCorrespondingEnd($tai);
                        }
                    }
                    if (true === $this->skipClass) {
                        TokenArrayIteratorTool::skipClassLike($tai);
                    }
                    if (true === $this->skipFunction) {
                        TokenArrayIteratorTool::skipFunction($tai);
                    }
                    if (true === $this->skipForLoopCondition) {
                        if (true === TokenTool::match(T_FOR, $tai->current())) {
                            $tai->next();
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                            if (true === TokenTool::match('(', $tai->current())) {
                                TokenArrayIteratorTool::moveToCorrespondingEnd($tai);
                            }
                        }
                    }
                }
            }
            else {

                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);

                if (TokenTool::match("=", $tai->current())) {

                    while ($tai->valid()) {
                        if (false === TokenTool::match(';', $tai->current())) {
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                            if (TokenTool::match(['(', '[', '{'], $tai->current())) {
                                TokenArrayIteratorTool::moveToCorrespondingEnd($tai);
                            }
                            /**
                             *
                             * A closing brace means probably that we are not on the right way.
                             * Look at the following example that would otherwise match if we
                             * did not add the following condition:
                             *
                             * while (false !== $n = getMax()) { 
                             *
                             * }
                             * echo "pou";  // the semi-column on this line would be used
                             */
                            elseif (true === TokenTool::match([')', ']', '}'], $tai->current())) {
                                break;
                            }

                        }
                        else {
                            break;
                        }
                        $tai->next();
                    }
                    if (true === TokenTool::match(';', $tai->current())) {
                        $found = true;
                        $ret[] = [$start, $tai->key()];
                        $this->onMatchFound($start, $tai);
                        $start = null;
                    }
                }


                if (false === $found) {
                    $start = null;
                }
            }
            $tai->next();
        }

        return $ret;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    public function isSkipClass()
    {
        return $this->skipClass;
    }

    public function setSkipClass($skipClass)
    {
        $this->skipClass = $skipClass;
    }

    public function isSkipFunction()
    {
        return $this->skipFunction;
    }

    public function setSkipFunction($skipFunction)
    {
        $this->skipFunction = $skipFunction;
    }

    public function isSkipForLoopCondition()
    {
        return $this->skipForLoopCondition;
    }

    public function setSkipForLoopCondition($skipForLoopCondition)
    {
        $this->skipForLoopCondition = $skipForLoopCondition;
    }

    public function isSkipControlStructure()
    {
        return $this->skipControlStructure;
    }

    public function setSkipControlStructure($skipControlStructure)
    {
        $this->skipControlStructure = $skipControlStructure;
    }

    public function isAllowArrayAffectation()
    {
        return $this->allowArrayAffectation;
    }

    public function setAllowArrayAffectation($allowArrayAffectation)
    {
        $this->allowArrayAffectation = $allowArrayAffectation;
    }

    public function isAllowDynamic()
    {
        return $this->allowDynamic;
    }

    public function setAllowDynamic($allowDynamic)
    {
        $this->allowDynamic = $allowDynamic;
    }


}
