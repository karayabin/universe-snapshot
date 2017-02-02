<?php


namespace Tokens\SequenceMatcher\Element;

use SequenceMatcher\Element\EntityInterface;

class TokenEntity implements EntityInterface
{

    private $type;
    private $content;


    /**
     * @param $type : int
     * @param $content : null|string
     */
    public function __construct($type, $content)
    {
        $this->type = $type;
        $this->content = $content;
    }

    public static function create($type, $content)
    {
        return new self($type, $content);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function match($thing)
    {
        if (null == $this->content) {
            if (is_array($thing)) {
                return $thing[0] === $this->type;
            }
            return false;
        } else {
            if (is_string($thing)) {
                return ($thing === $this->content);
            } else {
                return (
                    ($thing[0] === $this->type) &&
                    ($thing[1] === $this->content)
                );
            }
        }
    }

    public function __toString()
    {
        return (string)$this->type;
    }

}