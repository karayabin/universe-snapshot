#!/usr/bin/php
<?php
//------------------------------------------------------------------------------/
// HELPER PROGRAMM TO QUICK SETUP MYSQL  HOST ON LING SERVER
// IT WON'T WORK ANYWHERE ELSE !!!!
//------------------------------------------------------------------------------/



$aArgs = $_SERVER['argv'];
array_shift($aArgs); // get rid of the programm name
// check args
if (1 !== count($aArgs)) {
    echo "
        

Exactly One argument are required for this function : 
databasename.";
    echo "
        Here is an example of valid call : 
         php -f mysql-create-database.php -- vero 
         

";
    exit;
}


$databaseName = array_shift($aArgs);


echo "\n\n";

// string
function getMysqlPass($length=12) {
    $s = '';
    $tool = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,";
    for ($i = 1; $i <= $length; $i++) {
        $s .= $tool[rand(0, 62)];
    }
    return $s;
}

$password = getMysqlPass();

echo "\n";



$content = '
    
DROP DATABASE IF EXISTS ' . $databaseName . ';
CREATE DATABASE ' . $databaseName . ';


DELETE FROM mysql.user WHERE Host=\'localhost\' AND User=\'' . $databaseName . '\';


GRANT ALL PRIVILEGES ON ' . $databaseName . '.* 
      TO ' . $databaseName . '@localhost IDENTIFIED BY \'' . $password . '\';

FLUSH PRIVILEGES;

';





echo "\n\n";
$tmpFile = 'distantmysqlinittmp';
echo "try creating $tmpFile...";
if (false !== file_put_contents($tmpFile, $content)) {
    echo "...ok\n";


    $cmd = 'mysql -u root -p < ' . $tmpFile . ' 2>&1';
    echo "Running $cmd\n";
    system($cmd);


    echo "Trying to delete tmp file...";
    if (true === unlink($tmpFile)) {
        echo "ok\n";
        echo "**************************************\n";
        echo "Okay. I'm done, please note your password : $password\n";
        echo "**************************************\n";
    } else {
        echo "\n\nOops, unable to unlink tmpfile $tmpFile, you should remove it manually";
    }
} else {
    echo "\n\nSomething wrong happened with creation of tmp file : $tmpFile !! Aborted";
}






