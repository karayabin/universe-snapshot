<?php


namespace Ling\Light_MailStats\Api\Custom\Classes;

use Ling\Light_MailStats\Api\Generated\Classes\TrackerApi;
use Ling\Light_MailStats\Api\Custom\Interfaces\CustomTrackerApiInterface;



/**
 * The CustomTrackerApi class.
 */
class CustomTrackerApi extends TrackerApi implements CustomTrackerApiInterface
{


    /**
     * Builds the CustomTrackerApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
