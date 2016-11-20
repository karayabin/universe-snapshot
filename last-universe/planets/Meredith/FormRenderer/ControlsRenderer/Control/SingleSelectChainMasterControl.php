<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-16
 *
 */
class SingleSelectChainMasterControl extends SingleSelectControl implements SingleSelectChainMasterControlInterface
{

    private $nodes;
    private $useTim;
    private $triggerOnStart;

    public function __construct()
    {
        parent::__construct();
        $this->nodes = [];
        $this->useTim = true;
        $this->triggerOnStart = true;
    }

    public function getNodes()
    {
        return $this->nodes;
    }

    public function addNode($name, $url = null, array $params = [])
    {

        $this->nodes[] = [$name, $url, $params];
        return $this;
    }

    public function getOptions()
    {
        return [
            'useTim' => $this->useTim,
            'triggerOnStart' => $this->triggerOnStart,
        ];
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setTriggerOnStart($triggerOnStart)
    {
        $this->triggerOnStart = $triggerOnStart;
        return $this;
    }

    public function setUseTim($useTim)
    {
        $this->useTim = $useTim;
        return $this;
    }


}