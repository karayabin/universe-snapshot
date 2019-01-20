ApplicationLog
==============
2015-10-25




Lightweight object to quickly send a message to a log file.


Features
------------

 - Lightweight (less than 300 lines of code)
 - singleton  
 - auto-rotation of the log file based on size (in bytes)  
 - quick setup
 - log all messages in one file  
 - handle {datetime} dynamic tag
 - you can tag your messages
 - you can pass exceptions directly




How to use
-----------




```php
<?php


use ApplicationLog\ApplicationLog;


require_once "bigbang.php";


//------------------------------------------------------------------------------/
// CONFIG (put this code in your application init file)
// This step is actually technically optional, but it makes sense to configure the ApplicationLog to YOUR needs
// rather than using the default values.
//------------------------------------------------------------------------------/
/**
 * Here are all possible config methods of ApplicationLog
 */
ApplicationLog::inst()
    ->setDir('log')
    ->setBaseName('app.log')// this is the default
    ->setOnError(function ($m) { // this is also the default
            throw new \Exception($m);
        })
    ->setMaxSize(1000000)// this is also the default
    ->setSeparator(PHP_EOL)// this is also the default
    ->setOnRotate(function (array $info) {

            $msg = '';
            $msg .= 'src= ' . $info['src'] . PHP_EOL;
            $msg .= 'dst= ' . $info['dst'] . PHP_EOL;
            $msg .= 'baseName= ' . $info['baseName'] . PHP_EOL;
            $msg .= 'maxSize= ' . $info['maxSize'] . PHP_EOL;
            $msg .= 'msg= ' . $info['msg'] . PHP_EOL;

            // you could send you an email for instance
            // sendMailToAdmin($msg);  // this is an imaginary mail function that you have in your application
        })
    ->setPrepareMessage(function ($msg, array $tags = null) { // this is also the default
        $stags = '';
        if ($tags) {
            foreach ($tags as $tag) {
                $stags .= '[' . $tag . ']';
            }
        }
        $sep = ' -- '; // sep will help parsers
        $msg = date("c") . $sep . $stags . $sep . $msg;
        return $msg;
    });


//------------------------------------------------------------------------------/
// APPLICATION CODE
//------------------------------------------------------------------------------/
/**
 * Examples of use
 */
ApplicationLog::add("Oops! the page /jozgjej does'nt exist."); // simple message
ApplicationLog::add("Oops! the page /jozgjej does'nt exist.", ['404']); // message with tags
ApplicationLog::add("Exception caught, with message: blabla", ['exception', 'important']); // message with tags
$e = new \Exception("This is an exception");
ApplicationLog::add($e); // message handling exception


```


Note: learn more about [bigbang autoloader](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md)


Related
------------

- [QuickLog](https://github.com/lingtalfi/QuickLog): simple log system for your app
- [InstantLog](https://github.com/lingtalfi/InstantLog): log for instant debug



Dependencies
------------------

- [lingtalfi/Bat 1.09](https://github.com/lingtalfi/Bat)




History Log
===============
    
- 1.0.0 -- 2016-12-28

    - fix package info