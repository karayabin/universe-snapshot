<?php


use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;


//------------------------------------------------------------------------------/
// COLIS LING - UPLOAD SERVICE - NEW VERSION
//------------------------------------------------------------------------------/
require_once __DIR__ . "/../../../../../init.php"; // replace this with your application init in prod


/**
 * Object oriented uploader
 * ==================================
 * 2016-01-14    LingTalfi
 *
 *
 * Disclaimer
 * --------------
 *
 * This might be slow or faster, depending on which handler you use.
 *
 * Handy note:
 * I noticed that with big chunks (10Mo - 20Mo), perfs get much better than with 1Mo chunks,
 * so you can balance the slowness with the chunk size a lot.
 *
 *
 * Oop is generally slower than procedural code, and for chunking that does matter (test yourself).
 * If you want faster, take a look at the [colis planet]/www/libs/colis/service/colis_upload_profiles.php file.
 * Even faster might be the raw upload handler [colis planet]/www/libs/colis/service/colis_upload_fast.php.
 * But that comes with the price of scattering your application a bit.
 *
 *
 *
 *
 * The colis_get_handler function
 * ---------------------------------
 *
 * Your only duty is to implement the function colis_get_handler, which returns an object having the handle method.
 *
 *
 * For instance you can return a ColisUploadHandlerInterface like
 * the WebAssetProfileColisUploadHandler (in this Colis planet in ColisUploadHandler dir).
 *
 *
 * Or you could also return an UploaderHandlerInterface (https://github.com/lingtalfi/UploaderHandler).
 * There is maybe the ColisTimUploaderHandler class (in the Colis planet) that you can use (although I'm not using
 * it personally anymore because I'm obsessed with speed and I find it has too much features compared to what I
 * usually need).
 *
 * Or create a simple object with a simple handle method.
 * To get an idea of what should the "handle" method do, have a look inside the
 * [colis planet]/www/libs/colis/service/colis_upload_profiles.php file
 *
 *
 *
 *
 *
 *
 *
 */


OpaqueTimServer::create()
    ->setServiceName('colis.ling_upload_new')
    ->start(function (TimServerInterface $s) {
    colis_get_handler()->handle($s);
})
    ->output();