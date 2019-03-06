<?php


echo '<xmp>';
//$s = file_get_contents('/tmp/debugdump.txt');
$lines = file('/tmp/debugdump.txt');

foreach ($lines as $line) {
    if (0 !== strpos($line, '<= Recv header')) {
        echo $line;
    }
}

echo '</xmp>';
