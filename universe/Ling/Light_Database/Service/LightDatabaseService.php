<?php


namespace Ling\Light_Database\Service;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\CliTools\Formatter\BashtmlFormatter;
use Ling\Light\Events\LightEvent;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_Logger\LightLoggerService;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;

/**
 * The LightDatabaseService class.
 */
class LightDatabaseService extends LightDatabasePdoWrapper
{

    /**
     * This property holds the options for this instance.
     *
     *
     * See our @page(Light_Database conception notes options) for more details.
     *
     *
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


    /**
     * @overrides
     */
    protected function queryLog(string $type, ...$args)
    {
        $queryLog = $this->options['queryLog'] ?? false;
        if (true === $queryLog) {


            $fmt = $this->options["queryLogFormatting"] ?? [];
            $fmtQuery = $fmt['query'] ?? null;
            $fmtError = $fmt['error'] ?? null;

            /**
             * @var $lg LightLoggerService
             */
            $lg = $this->container->get("logger");
            $bashFmt = new BashtmlFormatter();
            $sType = $type;
            $isError = false;


            switch ($type) {
                case "insert":
                case "replace":
                case "update":
                case "delete":
                    $query = trim($args[1]);
                    $markers = $args[2];
                    $msg = $query . PHP_EOL;
                    $msg .= 'markers: ' . ArrayToStringTool::toPhpArray($markers);
                    break;
                case "fetch":
                case "fetchAll":
                    $query = trim($args[0]);
                    $markers = $args[1];
                    $msg = $query . PHP_EOL;
                    $msg .= 'markers: ' . ArrayToStringTool::toPhpArray($markers);
                    break;
                case "execute":
                    $query = trim($args[0]);
                    $msg = $query;
                    break;
                case "exception":
                    $e = $args[0];
                    $msg = $e;
                    $isError = true;
                    break;
                default:
                    $msg = '';
                    break;
            }

            if (true === $isError && null !== $fmtError) {
                $sType = $bashFmt->format("<$fmtError>$sType</$fmtError>");
            } elseif (null !== $fmtQuery) {
                $sType = $bashFmt->format("<$fmtQuery>$sType</$fmtQuery>");
            }

            $lg->log($sType . ':' . $msg, "database");
        }
    }

}