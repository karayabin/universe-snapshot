<?php

namespace ParserGenerator\Lexer;

/*
 * LingTalfi 2016-07-29
 */
use ParserGenerator\Exception\LexerException;
use ParserGenerator\Token\Token;

abstract class Lexer
{

    const EOF = -1;
    const EOF_TYPE = 1;

    protected $input; // input string
    protected $p = 0; // index of the current character
    protected $c; // current character


    public abstract function nextToken(): Token;

    public abstract function getTokenName(int $tokenType): string;
    

    public function __construct(string $input) // input is utf8
    {
        $this->input = $input;
        $this->c = $input[$this->p];
    }


    public function consume()
    {
        $this->p++;
        if ($this->p >= mb_strlen($this->input)) {
            $this->c = self::EOF;
        }
        else {
            $this->c = $this->input[$this->p];
        }
    }

    public function match(string $c)
    {
        if ($c === $this->c) {
            $this->consume();
        }
        else {
            throw new LexerException("Expecting " . $c . "; found " . $this->c);
        }
    }
}
