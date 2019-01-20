<?php


use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;


//------------------------------------------------------------------------------/
// COLIS LING - INFO SERVICE - FAST VERSION
//------------------------------------------------------------------------------/
require_once 'inc/colis_init_fast.php'; // replace this with your application init in prod


OpaqueTimServer::create()
    ->setServiceName('colis.ling_info_fast')
    ->start(function (TimServerInterface $s) {
    
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $s->success(colis_get_info_by_name($name));
    }
    else {
        $s->error("Invalid input data: missing name");
    }

})->output();
