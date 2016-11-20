<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-16
 *
 * A select chain's master (hold the javascript code for all the chain).
 *
 * https://github.com/lingtalfi/SelectChain
 *
 */
interface SingleSelectChainMasterControlInterface extends SingleSelectControlInterface
{

    /**
     * Return an array of nodes (see selectChain documentation for more details).
     *
     *
     * @return array of node, with
     *                      - node
     *                      ----- name
     *                      ----- url
     *                      ----- params
     *
     */
    public function getNodes();

    /**
     * @return array of the js selectChain object's options
     */
    public function getOptions();

}