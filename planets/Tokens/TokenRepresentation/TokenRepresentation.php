<?php


namespace Tokens\TokenRepresentation;


class TokenRepresentation
{


    private $replacementSequences;
    private $tokenIdentifiers;

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
     * Returns a list of token identifiers (defined in php doc: http://php.net/manual/en/function.token-get-all.php)
     */
    public function getTokens()
    {
        $replacementSequences = [];
        foreach ($this->replacementSequences as $s) {
            $s->onMatch(function ($beginIndex, $endIndex, array $newSequence) use (&$replacementSequences) {
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