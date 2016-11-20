Ornella
=========================
2015-10-21






Ornella is a notation for replacing {tags} with a customized value.
It's useful in a few cases where the caller doesn't have access to a programming language, 
and yet you want her to be able to use advanced string functions like strToUpper (converts all to uppercase).  



- [ornella tag notation documentation](https://github.com/lingtalfi/ornella/blob/master/ornella-tag-notation.md) 
- [ornella tag implementation in php](https://github.com/lingtalfi/ornella/blob/master/OrnellaTagNotationUtil.php)
 
 
 
 
How to use the php implementation provided in this planet 
-------------------------------------- 


Copy paste the following code and test it in a browser.<br>
The **a** function and the bigbang.php script come from 
the [portable autoloader technique](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md).


```php
<?php


use Ornella\OrnellaTagNotationUtil;

require_once "bigbang.php";



$strings=[
    '{fileName:upper}.{ext}.{fileName:safe_-:upper:cut_-_1;3-4_+\_+}',
    '{fileName:upper}.{ext}.{fileName:safe_-:upper:cut_-_1;3-4_+\:+}',
    '{fileName:upper}.{ext}.{fileName:safe_-:upper:cut_-_1;3-4_-}',
    '{fileName:upper}.{ext}.{fileName:safe_-:upper:cut_-_1;3-4}',
    '{fileName:upper}.{ext}.{fileName:safe_-:upper:cut_-_1;3}',
    '{fileName:upper}.{ext}.{fileName:safe_-:upper:cut_-_2+}',
    '{fileName:upper}.{ext}.{fileName:safe_-:upper}',
    '{fileName:upper}.{ext}.{fileName:substr_0}',
    '{fileName:upper}.{ext}.{fileName:substr_1}',
    '{fileName:upper}.{ext}.{fileName:substr_-3}',
    '{fileName:upper}.{ext}.{fileName:substr_2_6}',
    '{fileName:upper}.{ext}.{fileName:substr_2_-2}',
];




$tagValues = [
    'fileName' => 'wood-tiger-from-the-hood',
    'ext' => 'txt',
];

$string = end($strings);

$o = OrnellaTagNotationUtil::create();
if (false !== ($str = $o->parse($string, $tagValues))) {
    a($str);
}
else {
    echo '<hr>';
    a($o->getErrors());
}

```



