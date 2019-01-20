<?php 



require_once 'alveolus/bee/boot/autoload.php';


$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

$cmd = null;

switch ($action) {
    case 'simpleGet':
        $cmd = 'http://httpbin.org/get';
        break;
    case 'simpleGetWithParams':
        $cmd = 'http://httpbin.org/get?birthyear=1905&press=OK';
        break;
    case 'simplePost':
        $cmd = '--data "birthyear=1905&press=%20OK%20" http://httpbin.org/post';
        break;
    case 'simplePostLongData':
        $cmd = '--data "birthyear=1905&press=%20OK%20&fruits[]=apple&fruits[]=banana&fruits[]=banana&fruits[]=banana&fruits[]=banana&fruits[]=banana&fruits[]=banana&fruits[]=banana&fruits[]=banana" http://httpbin.org/post';
        break;
    case 'fileUploadPost':
        $cmd = '--form upload=@tinytrans.gif --form press=OK http://httpbin.org/post';
        break;
    case 'httpUploadPut':
        $cmd = '--upload-file tinytrans.gif http://httpbin.org/put';
        break;
    case 'httpBasicAuth':
        $cmd = '--user user:passwd http://httpbin.org/basic-auth/user/passwd';
        break;
    case 'referer':
        $cmd = '--referer http://httpbin.org http://httpbin.org';
        break;
    case 'userAgent':
        $cmd = '--user-agent "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)" http://httpbin.org';
        break;
    case 'location':
        $cmd = '--location http://httpbin.org';
        break;
    case 'setCookie':
        $cmd = '--cookie "name=Daniel" http://httpbin.org/cookies';
        break;
    case 'https':
        $cmd = 'https://lingtalfi.com';
        break;
    default:
        break;
}




if(null !== $cmd){
    $cmd = 'curl --trace-ascii /tmp/debugdump.txt ' . $cmd;
    exec($cmd);
}
