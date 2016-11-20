<?php

namespace UrlFriendlyListHelper\ItemGenerator;

/*
 * LingTalfi 2015-11-02
 * 
 * 
 * Note:
 *      We have getParameter and getParameterOrDefault methods.
 *      They are different, the primer is an assumption, the latter is a question.
 */
use UrlFriendlyListHelper\ItemGeneratorHelper\ItemGeneratorHelperInterface;
use UrlFriendlyListHelper\ListHelper\ListHelperInterface;

abstract class ItemGenerator implements ItemGeneratorInterface
{


    /**
     * @var ItemGeneratorHelperInterface[]
     */
    protected $generatorHelpers;

    /**
     * @var ListHelperInterface
     */
    protected $listHelper;

    private $params;

    public function __construct()
    {
        $this->params = [];
        $this->listHelpers = [];
    }

    public function setParameters(array $params)
    {
        $this->params = $params;
    }

    public function addGeneratorHelper(ItemGeneratorHelperInterface $h)
    {
        $this->generatorHelpers[] = $h;
        return $this;
    }

    public function setListHelper(ListHelperInterface $h)
    {
        $this->listHelper = $h;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getParameterOrDefault($k, $default = null)
    {
        if (array_key_exists($k, $this->params)) {
            return $this->params[$k];
        }
        return $default;
    }

    protected function getParameter($k, $default = null)
    {
        if (array_key_exists($k, $this->params)) {
            return $this->params[$k];
        }
        trigger_error("The parameter $k was not found");
        return $default;
    }
}
