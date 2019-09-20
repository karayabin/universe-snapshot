<?php


namespace Ling\Light_Realist\ListActionHandler;


/**
 * The LightRealistAbstractListActionHandler class.
 */
abstract class LightRealistAbstractListActionHandler implements LightRealistListActionHandlerInterface
{
    /**
     * This property holds the handledIds for this instance.
     * @var array
     */
    protected $handledIds;


    /**
     * Executes the list action identified by the given action id.
     *
     * If something goes wrong, throw an exception (it will be caught, and the error message will be sent
     * to the user).
     *
     * Otherwise, return an array of successful data.
     *
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    abstract protected function doExecute(string $actionId, array $params = []): array;

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


    /**
     * @implementation
     */
    public function execute(string $actionId, array $params = []): array
    {
        try {
            $ret = $this->doExecute($actionId, $params);
            $ret['type'] = "success";

        } catch (\Exception $e) {

            $ret = [
                "type" => 'error',
                "error" => $e->getMessage(),
            ];
        }
        return json_encode($ret);
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