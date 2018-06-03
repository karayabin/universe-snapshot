<?php


namespace CronTaskBot\CronTask;


interface CronTaskInterface
{


    public function getLabel();

    public function execute();

    //--------------------------------------------
    // AFTER EXECUTION ONLY
    //--------------------------------------------
    public function isSuccessful();

    /**
     * @return array of info level messages
     */
    public function getInfoMessages();

    /**
     * @return array of error level messages
     */
    public function getErrorMessages();
}