<?php


namespace Tokens\TokenRepresentation;


class ReplacementSequence
{

    private $model;
    private $currentTry;
    private $_onMatch;
    private $nextModelIndex;

    public function __construct()
    {
        $this->model = [];
        $this->currentTry = null; // null means currentTry is cancelled or not started

        /**
         * note: because of optional ReplacementSequenceToken,
         * there is a potential out of between the model index and the number of currently
         * identified tokens (this->currentTry[tokenIdentifiers]),
         * therefore we need to track nextModelIndex separately
         */
        $this->nextModelIndex = 0;
    }

    public static function create()
    {
        return new self();
    }


    public function addToken(ReplacementSequenceToken $token)
    {
        $this->model[] = $token;
        return $this;
    }


    public function nextTokenIdentifier($index, $tokenIdentifier)
    {

        // not started yet?
        if (null === $this->currentTry) {
            if (count($this->model) > 0) {
                $firstToken = $this->model[$this->nextModelIndex];
                if ($firstToken->matches($tokenIdentifier)) {
                    $this->currentTry = [
                        'start' => $index,
                        'end' => $index,
                        'tokenIdentifiers' => [$tokenIdentifier],
                    ];

                    if (1 === count($this->model)) { // model ends here?
                        $this->matched($this->currentTry);
                        $this->resetCurrentTry();
                    } else {
                        $this->nextModelIndex++;
                    }
                }
            }
        } // continuing an existing sequence
        else {
            if (array_key_exists($this->nextModelIndex, $this->model)) {

                $curToken = $this->model[$this->nextModelIndex];
                if ($curToken->matches($tokenIdentifier)) {
                    $this->currentTry['end'] = $index;
                    $this->currentTry['tokenIdentifiers'][] = $tokenIdentifier;

                    if (count($this->currentTry['tokenIdentifiers']) === count($this->model)) { // model ends here?
                        $this->matched($this->currentTry);
                        $this->resetCurrentTry();
                    } else {
                        $this->nextModelIndex++;
                    }
                } else {
                    if (true === $curToken->isOptional()) {
                        $this->currentTry['end'] = $index;
                        $this->currentTry['tokenIdentifiers'][] = $tokenIdentifier;

                        if (count($this->currentTry['tokenIdentifiers']) === count($this->model)) {
                            $this->matched($this->currentTry);
                            $this->resetCurrentTry();
                        } else {
                            $this->nextModelIndex++;
                        }

                    } else {
                        $this->resetCurrentTry();
                    }
                }

            } else {
                throw new \LogicException("This case should have never happened, sorry, I've no clue what this is btw... (good luck). Maybe you are not using this object like you should?");
            }

        }
    }


    public function onMatch($func)
    {
        $this->_onMatch = $func;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function matched(array $currentTry)
    {
        call_user_func($this->_onMatch, $currentTry['start'], $currentTry['end'], $currentTry['tokenIdentifiers']);
    }

    private function resetCurrentTry()
    {
        $this->currentTry = null;
        $this->nextModelIndex = 0;
    }
}