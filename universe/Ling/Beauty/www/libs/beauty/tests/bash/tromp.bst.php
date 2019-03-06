<?php



$pathToBashProgramToTest = 'whoami';
$output = [];
$ret = null;


exec($pathToBashProgramToTest, $output, $ret);


if(0 === $ret){
    echo '_BEAST_TEST_RESULTS:s=1;f=0;e=0;na=0;sk=0__';
}
else{
    echo '_BEAST_TEST_RESULTS:s=0;f=1;e=0;na=0;sk=0__';
}


