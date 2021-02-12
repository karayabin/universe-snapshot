<?php


namespace Ling\Light_Train\Api\Custom\Classes;

use Ling\Light_Train\Api\Generated\Classes\UserPreferenceApi;
use Ling\Light_Train\Api\Custom\Interfaces\CustomUserPreferenceApiInterface;



/**
 * The CustomUserPreferenceApi class.
 */
class CustomUserPreferenceApi extends UserPreferenceApi implements CustomUserPreferenceApiInterface
{


    /**
     * Builds the CustomUserPreferenceApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
