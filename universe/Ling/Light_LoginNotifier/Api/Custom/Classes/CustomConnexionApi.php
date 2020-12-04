<?php


namespace Ling\Light_LoginNotifier\Api\Custom\Classes;

use Ling\Light_LoginNotifier\Api\Generated\Classes\ConnexionApi;
use Ling\Light_LoginNotifier\Api\Custom\Interfaces\CustomConnexionApiInterface;



/**
 * The CustomConnexionApi class.
 */
class CustomConnexionApi extends ConnexionApi implements CustomConnexionApiInterface
{


    /**
     * Builds the CustomConnexionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
