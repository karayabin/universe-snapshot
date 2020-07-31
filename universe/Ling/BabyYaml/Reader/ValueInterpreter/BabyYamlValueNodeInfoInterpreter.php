<?php


namespace Ling\BabyYaml\Reader\ValueInterpreter;


use Ling\BabyYaml\Reader\StringParser\BabyYamlLineNodeInfoExpressionDiscoverer;


/**
 * BabyYamlValueNodeInfoInterpreter
 */
class BabyYamlValueNodeInfoInterpreter extends BabyYamlValueInterpreter
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->discoverer = new BabyYamlLineNodeInfoExpressionDiscoverer();
    }


    /**
     * Returns the array of the @page(commentItems) that this interpreter parsed.
     * @return array
     */
    public function getComments(): array
    {
        return $this->discoverer->getComments();
    }

    /**
     * Resets the @page(commentItems).
     */
    public function resetComments()
    {
        $this->discoverer->resetComments();
    }


    /**
     * Proxy to the discoverer->getValueType method.
     *
     * @return string
     */
    public function getValueType(): ?string
    {
        return $this->discoverer->peakValueType();
    }


}
