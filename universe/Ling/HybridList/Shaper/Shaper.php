<?php


namespace Ling\HybridList\Shaper;


use Ling\HybridList\Exception\HybridListException;

class Shaper implements ShaperInterface
{

    private $reactsToArray;
    protected $executeCallback;


    public function __construct()
    {
        $this->reactsToArray = [];
        $this->executeCallback = null;
    }

    public static function create()
    {
        return new static();
    }

    public function reactsTo($fieldIdentifier)
    {
        if (is_string($fieldIdentifier)) {
            $this->reactsToArray[] = $fieldIdentifier;
        } elseif (is_array($fieldIdentifier)) {
            $this->reactsToArray = array_merge($this->reactsToArray, $fieldIdentifier);
        }
        return $this;
    }

    public function getReactsTo()
    {
        if (null === $this->reactsToArray) {
            throw new HybridListException("The reactsToArray is not set (and should be)");
        }
        return $this->reactsToArray;
    }


    public function setExecuteCallback(callable $executeCallback)
    {
        $this->executeCallback = $executeCallback;
        return $this;
    }

}