PhpBeast
==============
2015-10-26




This is a php implementation of the Beast component of the [Beauty n Beast pattern](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).


PhpBeast is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PhpBeast
```

How to use
--------------


PhpBeast is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


In its most basic form, here is how we use the phpBeast package.


```php
<?php

use Ling\PhpBeast\TestAggregator;
use Ling\PhpBeast\TestInterpreter;

require_once "bigbang.php";


function pou($m)
{
    return 6 + (int)$m;
}


$agg = TestAggregator::create();

/**
 * Testing that pou returns 6 when we pass an arbitrary string
 */
$agg->addTest(function(&$msg, $testNumber){
    if(6 === pou('blabla')){
        return true;
    }
    return false;
});


/**
 * Testing that pou returns 8 when we pass 2 
 */
$agg->addTest(function(&$msg, $testNumber){
    if(8 === pou(2)){
        return true;
    }
    return false;
});

/**
 * Testing that pou returns 8 when we pass string '2 fruits' 
 */
$agg->addTest(function(&$msg, $testNumber){
    if(8 === pou('2 fruits')){
        return true;
    }
    return false;
});



TestInterpreter::create()->execute($agg);

```

The example is quite verbose, but it illustrates the relationship between the aggregator and the interpreter perfectly.


As of version 1.1.0, you can use the PrettyTestInterpreter class instead of the TestInterpreter class.
The difference between both classes is that the PrettyTestInterpreter class also displays an html table with 
color codes, which makes it easier to visualize what's going on: which tests are successes, which are failures, etc...


Just the replace the last line of the previous example with:

```php 
PrettyTestInterpreter::create()->execute($agg);
```




Exhausting testing
----------------------

When testing is about an equality between two values, rather than testing things one by one,
I like to give a first array containing 
all the values to test, and a second array containing all the expected values.
I call this exhausting testing, and the benefits of this technique are the following:
 
- testing workflow is faster, because we can duplicate lines and focus on the values we want to test 


Since 1.2.0, PhpBeast has an AuthorTestAggregator::addTestsByColumn method which implements this technique.
The following example tests the 
[Bat's FileSystemTool's getFileExtension](https://github.com/lingtalfi/Bat/blob/master/FileSystemTool.md#getfileextension) 
method against the examples found in the [fileName convention page](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.fileName.eng.md).



```php
<?php

use Ling\Bat\FileSystemTool;
use Ling\PhpBeast\AuthorTestAggregator;
use Ling\PhpBeast\PrettyTestInterpreter;

require_once "bigbang.php";




//------------------------------------------------------------------------------/
// EXHAUSTING TEST DEMO
//------------------------------------------------------------------------------/
$agg = AuthorTestAggregator::create();

$a = [
    '/path/to/file.txt',
    '/path/to/file.tXT',
    '/path/to/thefile.tar.gz',
    '/path/to/.htaccess',
    '/path/to/.hidden.d',
    '/path/to/.hidden.d.gz',
];

$b = [
    'txt',
    'tXT',
    'gz',
    '',
    'd',
    'gz',
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {
    $res = FileSystemTool::getFileExtension($value);
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
```


Since 1.4.0, you can use the ComparisonErrorTableTool tool to display a table containing a dump
of both the result and expected values for failing tests.

This tool helps you to spot the cause of a failing test.
 
Here is how you would use it in the above example:
 
```php
use Ling\PhpBeast\Tool\ComparisonErrorTableTool;

//...

$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {
    $res = FileSystemTool::getFileExtension($value);
    $ret = ($expected === $res);
    if (false === $ret) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return $ret;
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display(); // note that the display must be AFTER the PrettyTestInterpreter.execute method
```






### Testing exceptions 


Since 1.3.0, we can test exceptions with the AuthorTestAggregator::addExceptionTests method.
The following example tests the StringTool::camelCase2Constant method from [Bat](https://github.com/lingtalfi/Bat), 
and shows an example of use of the addExceptionTests method.


```php
<?php

use Ling\Bat\StringTool;
use Ling\PhpBeast\AuthorTestAggregator;
use Ling\PhpBeast\PrettyTestInterpreter;

require_once "bigbang.php";


//------------------------------------------------------------------------------/
// EXCEPTION TEST EXAMPLE
//------------------------------------------------------------------------------/
$agg = AuthorTestAggregator::create();

$a = [
    'camelCase',
    'thisIsNotCorrect',
    'simpleXML',
    'localDb2Remote',
    'notFound404',
];

$b = [
    'CAMEL_CASE',
    'THIS_IS_NOT_CORRECT',
    'SIMPLE_XML',
    'LOCAL_DB_2_REMOTE',
    'NOT_FOUND_404',
];


$c = [
    456,
    null,
    true,
    false,
];

$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {
    $res = StringTool::camelCase2Constant($value);
    return ($expected === $res);
});

$agg->addExceptionTests($c, function ($v) {
    StringTool::camelCase2Constant($v);
}, [
    '0-2' => 'InvalidArgumentException', // testing that the short name of the exception for tests 0,1,2 is InvalidArgumentException
    '3' => [
        'msgSub' => 'argument',  // testing that the exception message contains the "argument" substring
    ],
]);


PrettyTestInterpreter::create()->execute($agg);
```





Related
-------------

- [phpBeast's brainstorm](https://github.com/lingtalfi/PhpBeast/blob/master/brainstorm/brainstorm.phpBeast.eng.md)



Dependencies
------------------

- [lingtalfi/ArrayToTable 1.2.0](https://github.com/lingtalfi/ArrayToTable), if you use PrettyTestInterpreter




History Log
------------------


- 1.4.0 -- 2015-11-15

    - implement testNumber as the second argument of the callable of the TestAggregator::addTest method
    - add ComparisonErrorTableTool
    
    
- 1.3.0 -- 2015-11-08

    - add AuthorTestAggregator::addExceptionTests
    - fix bug: PrettyTestInterpreter text color
    
    
- 1.2.0 -- 2015-11-02

    - add AuthorTestAggregator
    
    
- 1.1.0 -- 2015-11-01

    - add TestInterpreter::printResults (protected)
    - add PrettyTestInterpreter
        
        
- 1.0.0 -- 2015-10-27

    - initial commit