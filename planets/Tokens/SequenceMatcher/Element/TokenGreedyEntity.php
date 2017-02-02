<?php


namespace Tokens\SequenceMatcher\Element;

use SequenceMatcher\Element\EntityInterface;

class TokenGreedyEntity implements EntityInterface
{

    private $stopType;
    private $stopContent;


    /**
     * @param $stopType : int
     * @param $stopContent : null|string
     */
    public function __construct($stopType, $stopContent)
    {
        $this->stopType = $stopType;
        $this->stopContent = $stopContent;
    }

    public static function create($stopType, $stopContent)
    {
        return new self($stopType, $stopContent);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function match($thing)
    {
        if (null === $this->stopContent) {
            if (is_array($thing)) {
                return $thing[0] !== $this->stopType;
            }
            return true;
        } else {
            if (is_string($thing)) {
                return ($thing !== $this->stopContent);
            } else {
                return (false === (
                        ($thing[0] === $this->stopType) &&
                        ($thing[1] === $this->stopContent)
                    ));
            }
        }
    }

    public function __toString()
    {
        return (string)$this->stopType;
    }

}