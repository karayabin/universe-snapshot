<?php


namespace Ling\Light_Database\Service;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Light\Events\LightEvent;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;

/**
 * The LightDatabaseService class.
 */
class LightDatabaseService extends LightDatabasePdoWrapper
{

    /**
     * This property holds the options for this instance.
     * @var array
     */
    protected $options;


    /**
     * Builds the LightDatabaseService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->options = [];
    }


    /**
     *
     * Sets the options.
     *
     * Available options are:
     *
     * - devMode: bool=false.
     *      If true, will add the query to the SimplePdoWrapperQueryException exception message.
     *
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Embellishes the error message in SimplePdoWrapperQueryException exceptions.
     * @param LightEvent $event
     *
     */
    public function onExceptionCaught(LightEvent $event): void
    {
        $e = $event->getVar("exception");
        if ($e instanceof SimplePdoWrapperQueryException) {
            $devMode = $this->options['devMode'] ?? false;
            if (true === $devMode) {
                $e->setMessage($e->getMessage() . " ||| query=" . $e->getQuery() . " ||| markers=" . ArrayToStringTool::toInlinePhpArray($e->getMarkers()));
            }
        }
    }


}