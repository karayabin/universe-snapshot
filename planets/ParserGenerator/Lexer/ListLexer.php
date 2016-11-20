<?php

namespace ParserGenerator\Lexer;

/*
 * LingTalfi 2016-07-29
 */
use ParserGenerator\Exception\LexerException;
use ParserGenerator\Token\Token;

class ListLexer extends Lexer
{


    const NAME = 2;
    const COMMA = 3;
    const LBRACK = 4;
    const RBRACK = 5;
    const EQUALS = 6;
    const TOKEN_NAMES = [
        "n/a",
        "<EOF>",
        "NAME",
        "COMMA",
        "LBRACK",
        "RBRACK",
        "EQUALS",
    ];


    public function isLETTER()
    {
        return ctype_alpha($this->c);
    }

    public function WS()
    {
        while (
            ' ' === $this->c ||
            "\t" === $this->c ||
            "\n" === $this->c ||
            "\r" === $this->c
        ) {
            $this->consume();
        }
    }

    public function NAME()
    {
        $buf = "";
        while ($this->isLETTER()) {
            $buf .= $this->c;
            $this->consume();
        }
        return new Token(self::NAME, $buf);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function nextToken(): Token
    {
        while ($this->c !== self::EOF) {
            switch ($this->c) {
                case ' ':
                case "\t":
                case "\n":
                case "\r":
                    $this->WS();
                    continue;
                    break;
                case ",":
                    $this->consume();
                    return new Token(self::COMMA, ',');
                    break;
                case "[":
                    $this->consume();
                    return new Token(self::LBRACK, '[');
                    break;
                case "]":
                    $this->consume();
                    return new Token(self::RBRACK, ']');
                    break;
                case "=":
                    $this->consume();
                    return new Token(self::EQUALS, '=');
                    break;
                default:
                    if ($this->isLETTER()) {
                        return $this->NAME();
                    }
                    throw new LexerException("invalid character " . $this->c);
                    break;
            }
        }
        return new Token(self::EOF_TYPE, "<EOF>");
    }

    public function getTokenName(int $x): string
    {
        return self::TOKEN_NAMES[$x];
    }

}
