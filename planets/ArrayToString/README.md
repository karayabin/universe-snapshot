ArrayToString
====================
2015-10-27



Utility to export a php array in various string formats.




Features
============

- extensible: create your own formats 
- comes with 5 native formats: space indented, html, inline args, php, php function args

  
  
  
  
How to use
==============
  
  
  
You can use either the Tool or the Util.
The Tool uses the Util under the hood and provides quicker access to most common methods.
  
Using the Tool
-----------------


Create a modern (using brackets) php array representation:


```php
header("content-type: text/plain");
echo ArrayToStringTool::toPhpArray($phpArray);
```

This will generate this kind of output:


```  
[
    'pou' => 456,
    'aaa' => 777,
    'bbb' => [
        'omélie' => 'archeval',
        'pedros' => 'la casa',
    ],
]

```
   
  



Using the Util
------------------  
  
  
  
  
ArrayToString is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).
  
```php  
<?php


require_once "bigbang.php";

use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\HtmlArrayToStringSymbolManager;
use ArrayToString\SymbolManager\InlineArgsArrayToStringSymbolManager;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;
use ArrayToString\SymbolManager\SpaceIndentedArrayToStringSymbolManager;
use ArrayToString\SymbolManager\PhpFunctionArgsArrayToStringSymbolManager;


$a = [
    'pou' => 456,
    'aaa' => 777,
    'bbb' => [
        'omélie' => 'archeval',
        'pedros' => 'la casa',
    ],
];

//header("content-type: text/plain");
echo '<h3>Space Indented</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new SpaceIndentedArrayToStringSymbolManager())->toString($a);
echo '<h3>Html</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new HtmlArrayToStringSymbolManager())->toString($a);
echo '<h3>Inline args</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new InlineArgsArrayToStringSymbolManager())->toString($a);
echo '<h3>Php</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new PhpArrayToStringSymbolManager())->toString($a);
echo '<h3>Php Function Args</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new PhpFunctionArgsArrayToStringSymbolManager())->toString($a);

```
  

  
More about the native formats
--------------------------------
  
  
### Space Indented 
  
Just prints 4 spaces between the array values.
In the given example above, the output would be: 
  
  
    456    777    'archeval'    'la casa'   
  
  
### Html 
  
Prints an html friendly version of the array.
If you run the above example in a browser, you will visually see this:

    [
        'pou' => 456,
        'aaa' => 777,
        'bbb' => [
            'omélie' => 'archeval',
            'pedros' => 'la casa',
        ],
    ]  
    
And if you looked at the source code, you would see the necessary \n, \t and \<br> that were used to produce
the result.


### Inline Args

Use this format if you want the array to fit on a single line.
For instance, if you want to display the array content in an exception message.
The above example would look like this:


    ['pou' => 456,'aaa' => 777,'bbb' => ['omélie' => 'archeval','pedros' => 'la casa']]


### Php 

This format is like the native php's var_export.
The only difference that I see is that ArrayToString's Php native format uses the [] notation for arrays,
will the php native export function uses the array() notation.

The important thing is that you need this format when you want to dynamically write an array in php code.
 
 
```
// generated with ArrayToString's Php format  
[
    'pou' => 456,
    'aaa' => 777,
    'bbb' => [
        'omélie' => 'archeval',
        'pedros' => 'la casa',
    ],
]

// generated with php's var_export native function
array (
  'pou' => 456,
  'aaa' => 777,
  'bbb' => 
  array (
    'omélie' => 'archeval',
    'pedros' => 'la casa',
  ),
) 
```
 
 
### Php Function Args  

This format converts an array into php function arguments.
You can use the output directly as function arguments in your php code.

Here is the output of the above example.


```
456,
777,
[
    'omélie' => 'archeval',
    'pedros' => 'la casa',
]
```





How does it work?
--------------------

You have the ArrayToStringUtil class which is the engine.
The engine uses a well defined but abstract structure (see comments in the class for more details) of an array.

The engine needs a symbolManager object to resolve the actual structure symbols.




Tutorial: write a php array into a class
---------------
2016-11-26

Sometimes, when you generate code, you want to write an array in a class file.

For instance, imagine you have prepared the following class template:

```php
<?php


namespace MyNamespace;

class MyObject
{
    public static function getListOfItems()
    {
        //{items}
    }
}
```


And your goal is to rewrite this class, and replace the **//{items}** tag with a return statement
that returns an array, like so...

```php
<?php


namespace MyNamespace;

class MyObject
{
    public static function getListOfItems()
    {
        return [
            'a' => 'aaa',
            'b' => 'bbb',
            'c' => 'ccc',
        ];
    }
}
```


In order to do so, you need to configure the manager object, here is an imaginary code that would do the trick:

```php
function array_to_string(array $items)
{
    $manager = new PhpArrayToStringSymbolManager();
    $manager->setIndentationCallback(function ($spaceSymbol, $nbSpaces, $level) {
        if (0 === $level) {
            return str_repeat($spaceSymbol, 8);
        }
        if (1 === $level) {
            return str_repeat($spaceSymbol, 12);
        }
        return str_repeat($spaceSymbol, 16);
    });

    return 'return ' . ArrayToStringUtil::create()->setSymbolManager($manager)->toString($items) . ";";
}

$items = [
    'a' => 'aaa',
    'b' => 'bbb',
    'c' => 'ccc',
];

$src = "/path/to/templates/MyObject-template.php";
$dst = "/path/to/class/myObject.php";
$s = file_get_contents($src);
$s = str_replace('//{items}', array_to_string($items), $s);
$ret = file_put_contents($dst, $s);
```


The nice thing is that even if your array contains nested arrays, the format will be nicely indented.















History Log
------------------
    
   
- 1.3.0 -- 2017-09-03

    - add SpaceIndentedArrayToStringSymbolManager.setOffset method
    - add ArrayToStringTool::toPhpArray offset argument
    
- 1.2.0 -- 2017-06-21

    - add ArrayToStringTool.toPhpArray $showKeys argument
   
- 1.1.0 -- 2017-04-10

    - add ArrayToStringTool
    
- 1.0.0 -- 2015-10-27

    - initial commit
    
    
    
    



  