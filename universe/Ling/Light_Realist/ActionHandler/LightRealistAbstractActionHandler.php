<?php


namespace Ling\Light_Realist\ActionHandler;


/**
 * The LightRealistAbstractActionHandler class.
 */
abstract class LightRealistAbstractActionHandler implements LightRealistActionHandlerInterface
{


    /**
     * This property holds the handledIds for this instance.
     * @var array
     */
    protected $handledIds;


    /**
     * Builds the LightRealistAbstractActionHandler instance.
     */
    public function __construct()
    {
        $this->handledIds = [];
    }


    /**
     * @implementation
     */
    public function getHandledIds(): array
    {
        return $this->handledIds;
    }

    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Sets the handledIds.
     *
     * @param array $handledIds
     */
    public function setHandledIds(array $handledIds)
    {
        $this->handledIds = $handledIds;
    }

}