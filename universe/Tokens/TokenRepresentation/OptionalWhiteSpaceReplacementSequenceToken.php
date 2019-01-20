<?php


namespace Tokens\TokenRepresentation;


class OptionalWhiteSpaceReplacementSequenceToken extends ReplacementSequenceToken
{


    public function __construct()
    {
        parent::__construct();
        $this
            ->optional()
            ->matchIf(function ($tokenIdentifier) {
                return (is_array($tokenIdentifier) && T_WHITESPACE === $tokenIdentifier[0]);
            });
    }

    public static function create()
    {
        return new self();
    }


}