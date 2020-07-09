<?php


namespace Ling\Light_TaskScheduler\Api\Custom\Classes;

use Ling\Light_TaskScheduler\Api\Generated\Classes\TaskScheduleApi;
use Ling\Light_TaskScheduler\Api\Custom\Interfaces\CustomTaskScheduleApiInterface;



/**
 * The CustomTaskScheduleApi class.
 */
class CustomTaskScheduleApi extends TaskScheduleApi implements CustomTaskScheduleApiInterface
{


    /**
     * Builds the CustomTaskScheduleApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
