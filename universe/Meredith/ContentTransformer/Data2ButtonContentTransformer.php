<?php

namespace Meredith\ContentTransformer;

/**
 * LingTalfi 2016-01-05
 */
class Data2ButtonContentTransformer implements ContentTransformerInterface
{

    /**
     * @var array of str:data to [ str:cssClass, str:spanText ]
     */
    private $textMap;

    /**
     * @var array|null, the  [ str:cssClass, str:spanText ] array
     */
    private $defaultInfo;


    public function __construct()
    {

        $this->textMap = [];
    }

    public static function create()
    {
        return new static();
    }


    public function render($targetPos)
    {


        $map = json_encode($this->textMap);
        $d = json_encode($this->defaultInfo);

        return <<<EEE
        meredithColumnDefsFactory.data2ButtonMap( $targetPos, {
                            textMap: $map,
                            defaultInfo: $d
                        })
EEE;

    }

    public function setValue($key, $class, $text)
    {
        $this->textMap[$key] = [$class, $text];
        return $this;
    }

    public function setDefaultInfo(array $defaultInfo)
    {
        $this->defaultInfo = $defaultInfo;
        return $this;
    }

    public function setTextMap(array $textMap)
    {
        $this->textMap = $textMap;
        return $this;
    }


}