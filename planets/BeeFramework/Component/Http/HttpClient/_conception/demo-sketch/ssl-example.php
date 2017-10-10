<?php
#!/usr/bin/env php


//require_once 'alveolus/bee/boot/bam1.php';

use BeeFramework\Component\Http\HttpClient\BodyEntity\MultiPartBodyEntity;
use BeeFramework\Component\Http\HttpClient\Connexion\StreamConnexion;
use BeeFramework\Component\Http\HttpClient\CookieJar\CookieJar;
use BeeFramework\Component\Http\HttpClient\HttpClient;
use BeeFramework\Component\Http\HttpClient\Request\HttpRequest;
use Bware\SymphoBeeFramework\Routing\Sombrero\Router\StaticSombreroRouter;

require_once 'alveolus/bee/boot/autoload.php';

ini_set('error_reporting', -1);
ini_set('display_errors', 1);




$sslOptions = array(
    /**
     * The 3 options below allow us to verify the server's certificate (peer_name) against a trusted CA chain (cafile)
     */
    "verify_peer" => true,
    "peer_name" => 'beerepo',    // the common name set in the server's certificate    
    "cafile" => "/opt/local/etc/openssl/komin/cacert.pem", // supplies the CA data to verify against
    /**
     * Recommended by mozilla
     * https://wiki.mozilla.org/Security/Server_Side_TLS#Recommended_Ciphersuite
     */
    'ciphers' => 'ECDHE-RSA-AES128-GCM-SHA256:ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES256-GCM-SHA384:ECDHE-ECDSA-AES256-GCM-SHA384:DHE-RSA-AES128-GCM-SHA256:DHE-DSS-AES128-GCM-SHA256:kEDH+AESGCM:ECDHE-RSA-AES128-SHA256:ECDHE-ECDSA-AES128-SHA256:ECDHE-RSA-AES128-SHA:ECDHE-ECDSA-AES128-SHA:ECDHE-RSA-AES256-SHA384:ECDHE-ECDSA-AES256-SHA384:ECDHE-RSA-AES256-SHA:ECDHE-ECDSA-AES256-SHA:DHE-RSA-AES128-SHA256:DHE-RSA-AES128-SHA:DHE-DSS-AES128-SHA256:DHE-RSA-AES256-SHA256:DHE-DSS-AES256-SHA:DHE-RSA-AES256-SHA:!aNULL:!eNULL:!EXPORT:!DES:!RC4:!3DES:!MD5:!PSK',
    'disable_compression' => true,
    /**
     *
     */
    "verify_peer_name" => true,
);


$img = '/Users/pierrelafitte/Desktop/ssldig17.gif';
$img = '/Users/pierrelafitte/Downloads/tinytrans.gif';


$jar = CookieJar::create()->setPath('/tmp/cookieJar.yml');
$jar->setCookie('hack', 'fr%26%3B%3D-%26p%C3%A9%E2%82%ACff');

$req = HttpRequest::fromUri('https://beerepo')
    ->setMethod('POST')
//    ->setBody(TextBodyEntity::create()->setText('Hello'));
//    ->setBody(WwwFormUrlEncodedBodyEntity::create()->setParams([
//        'no m&€dd' => 'mi ch€lé',
//        'age' => '26',
//    ]));
//    ->setBody(JsonBodyEntity::create()->setJsonContent([
//        'alphé bet€' => 'ab cdé€',
//    ]));
//    ->setBody(FileBodyEntity::create()->setFile('/Users/pierrelafitte/Desktop/down.gif'));
    ->setBody(MultiPartBodyEntity::create()->setFieldsAndFiles([
        'n&é om' => 'mich€ àel',
        'age' => 26,
        'fruits[]' => [
            'apple',
            'banana',
        ],
    ], [
        'image' => $img,
    ]));
$req->headers()->set('Connection', 'close');


$response = HttpClient::create()
    ->setConnexion(StreamConnexion::create()->setSslOptions($sslOptions))
//    ->setConnexion(new FsockConnexion())
    ->setCookieJar($jar)
    ->setOnRawRequestReady(function ($raw) {
        a($raw);
    })
    ->setOnRawResponseReady(function ($raw) {
//        FileSystemTool::filePutContents('/tmp/myfile.txt', $raw);
    })
    ->send($req);


a($response);
a($jar->getCookies($req));

