<?php


use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;

require_once 'inc/colis_init_mixed.php'; // replace this with your application init in prod

//------------------------------------------------------------------------------/
// COLIS LING - UPLOAD SERVICE - MIXED VERSION
//------------------------------------------------------------------------------/
OpaqueTimServer::create()
    ->setServiceName('colis.ling_upload_mixed')
    ->start(function (TimServerInterface $s) {
    
    
    // Make sure file is not cached (as it happens for example on iOS devices)
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");


    if (isset($_REQUEST["id"])) {
        $profileId = $_REQUEST['id'];
        
        
        $h = colis_get_services_handler($profileId);
        $h->handle($s);
        
        
    }
    else {
        /**
         * Note: if your php.ini's upload_max_filesize or/and post_max_size are too low,
         * you'll get that message too.
         * You can configure them from your .htaccess instead of opening the php.ini, put the following lines
         * in your .htaccess:
         *
         *      php_value upload_max_filesize 50M
         *      php_value post_max_size 50M
         *
         */
        http_response_code(403);
        $s->error("id not set");
        return false;
    }
})
    ->output();