<?php


namespace Tokens\TokenRepresentation;


class TokenRepresentation
{


    private $replacementSequences;
    private $tokenIdentifiers;
    private $_onSequenceMatch;

    public function __construct(array $tokenIdentifiers)
    {
        $this->replacementSequences = [];
        $this->tokenIdentifiers = $tokenIdentifiers;
    }

    public static function create(array $tokenIdentifiers)
    {
        return new self($tokenIdentifiers);
    }

    public function addReplacementSequence(ReplacementSequence $s)
    {
        $this->replacementSequences[] = $s;
        return $this;
    }

    /**
     * func takes the newSequence as parameter, and return the (modified)? newSequence
     */
    public function onSequenceMatch($func)
    {
        $this->_onSequenceMatch = $func;
        return $this;
    }

    /**
     * Returns a list of token identifiers (defined in php doc: http://php.net/manual/en/function.token-get-all.php)
     */
    public function getTokens()
    {
        $replacementSequences = [];
        foreach ($this->replacementSequences as $s) {
            $s->onMatch(function ($beginIndex, $endIndex, array $newSequence) use (&$replacementSequences) {
                if (null !== $this->_onSequenceMatch) {
                    $newSequence = call_user_func($this->_onSequenceMatch, $newSequence);
                }
                $replacementSequences[] = [$beginIndex, $endIndex, $newSequence];
            });
            foreach ($this->tokenIdentifiers as $index => $tokenIdentifier) {
                $s->nextTokenIdentifier($index, $tokenIdentifier);
            }
        }
        return $this->replaceProcess($this->tokenIdentifiers, $replacementSequences);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function replaceProcess(array $tokenIdentifiers, array $replacementSequences)
    {
        $newTokens = $tokenIdentifiers;
        $lastIndex = count($replacementSequences) - 1;
        if ($lastIndex >= 0) {
            for ($i = $lastIndex; $i >= 0; $i--) {
                $replacementSequence = $replacementSequences[$i];


                $start = $replacementSequence[0];
                $end = $replacementSequence[1];

                $newSeq = $replacementSequence[2];

                $length = $end - $start + 1;
                array_splice($newTokens, $start, $length, $newSeq);
            }
        }
        return $newTokens;
    }
}