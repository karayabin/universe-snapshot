<?php


use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;


require_once 'inc/colis_init_mixed.php'; // replace this with your application init in prod


//------------------------------------------------------------------------------/
// COLIS LING - INFO SERVICE - MIXED VERSION
//------------------------------------------------------------------------------/
OpaqueTimServer::create()
    ->setServiceName('colis.ling_info_mixed')
    ->start(function (TimServerInterface $s) {


    if (isset($_REQUEST["id"])) {

        $profileId = $_REQUEST['id'];

        if (isset($_POST['name'])) {
            $name = $_POST['name'];

            $h = colis_get_services_handler($profileId);
            $err = '';
            if (false !== ($info = $h->getInfo($name, $err))) {
                $s->success($info);
            }
            else {
                if (!empty($err)) {
                    $s->error($err);
                }
                else {
                    // using colis ling convention
                    $s->success([
                        'type' => 'none',
                    ]);
                }
            }

        }
        else {
            $s->error("Invalid input data: missing name");
        }
    }
    else {
        $s->error("id not set");
    }

})->output();
