<?php


namespace Ling\Light_TaskScheduler\Service;

use Ling\Bat\SmartCodeTool;
use Ling\Light_LingStandardService\Service\LightLingStandardService01;
use Ling\Light_TaskScheduler\Api\Custom\CustomLightTaskSchedulerApiFactory;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


/**
 * The LightTaskSchedulerService class.
 */
class LightTaskSchedulerService extends LightLingStandardService01
{
         
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;
    


    /**
     * This property holds the factory for this instance.
     * @var CustomLightTaskSchedulerApiFactory
     */
    protected $factory;


    /**
     * Builds the LightTaskSchedulerService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->factory = null;
        $this->container = null;        
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }
    


    /**
     *
     * This method IS the task manager.
     * See the @page(Light_TaskScheduler conception notes) for more details.
     *
     */
    public function run()
    {

        /**
         * lastOnly
         * firstOnly
         * allRemaining
         */
        $executionMode = $this->options['executionMode'] ?? "lastOnly";
        $this->logDebug("Executing run method with execution mode \"$executionMode\".");

        $taskRows = [];
        $tsApi = $this->getFactory()->getTaskScheduleApi();

        switch ($executionMode) {
            case "lastOnly":
            case "firstOnly":

                $dir = ("firstOnly" === $executionMode) ? 'asc' : 'desc';

                $now = date("Y-m-d H:i:s");
                $taskRow = $tsApi->fetch([
                    Where::inst()->key("execution_end_date")->isNull()->and()->key("scheduled_date")->lessThan($now),
                    OrderBy::inst()->add("scheduled_date", $dir),
                ]);
                if (false !== $taskRow) {
                    $taskRows[] = $taskRow;
                }
                break;
            case "allRemaining":
                $now = date("Y-m-d H:i:s");
                $taskRows = $tsApi->fetchAll([
                    Where::inst()->key("execution_end_date")->isNull()->and()->key("scheduled_date")->lessThan($now),
                    OrderBy::inst()->add("scheduled_date", 'asc'),
                ]);
                break;
            default:
                $this->error("Unknown execution mode \"$executionMode\".");
                break;
        }


        $nbTasks = count($taskRows);
        $this->logDebug("$nbTasks task(s) to execute.");

        foreach ($taskRows as $taskRow) {
            $hasError = false;
            $id = $taskRow['id'];
            $name = $taskRow['name'];
            $executionEndDate = date("Y-m-d H:i:s");

            try {
                $res = $this->executeTaskByRow($taskRow);
                $executionEndDate = date("Y-m-d H:i:s");

                if (false === $res) {
                    $hasError = true;
                    $this->logDebug("The task \"$name\" failed to execute properly.");
                } else {
                    $this->logDebug("The task \"$name\" was successfully executed.");
                }


            } catch (\Exception $e) {
                $this->logDebug($e);
                $hasError = true;
            }


            //--------------------------------------------
            // update the db
            //--------------------------------------------
            $taskRow["error"] = (string)((int)$hasError);
            $taskRow["execution_end_date"] = $executionEndDate;

            $tsApi->updateTaskScheduleById($id, $taskRow);
        }
    }


    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightTaskSchedulerApiFactory
     */
    public function getFactory(): CustomLightTaskSchedulerApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightTaskSchedulerApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->container->get("database"));
        }
        return $this->factory;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Executes the task and returns its return.
     *
     * @param array $taskRow
     * @return false|mixed
     */
    protected function executeTaskByRow(array $taskRow)
    {
        $name = $taskRow['name'];
        $action = $taskRow['action'];
        $param1 = $taskRow['param1'];
        $sExtraParams = $taskRow['extra_params'];
        $sParam1 = (null === $param1) ? "null" : '"' . $param1 . '"';
        $sText = "Executing task \"$name\", with action \"$action\" and param1=" . $sParam1;
        $this->logDebug($sText);

        $callable = null;
        //--------------------------------------------
        // define the callable
        //--------------------------------------------
        if ('@' === substr($action, 0, 1)) { // service notation
            $p = explode(":", $action);
            list($service, $method) = $p;
            $service = substr($service, 1);
            $callable = [$this->container->get($service), $method];

        } else { // class notation
            $p = explode(":", $action);
            if (2 === count($p)) {
                list($className, $method) = $p;
                $callable = [new $className(), $method];
            } else {
                $this->error("Unknown action type with action=\"$action\".");
            }
        }


        //--------------------------------------------
        // execute the callable
        //--------------------------------------------
        $extraParams = [];
        if ($sExtraParams) {
            $extraParams = SmartCodeTool::parseArguments($sExtraParams);
        }

        $args = array_merge([$param1], $extraParams);
        return call_user_func_array($callable, $args);

    }
}







