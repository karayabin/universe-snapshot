<?php


namespace Ling\Light_MailStats\Api\Custom\Classes;

use Ling\Light_MailStats\Api\Generated\Classes\StatsApi;
use Ling\Light_MailStats\Api\Custom\Interfaces\CustomStatsApiInterface;



/**
 * The CustomStatsApi class.
 */
class CustomStatsApi extends StatsApi implements CustomStatsApiInterface
{


    /**
     * Builds the CustomStatsApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
