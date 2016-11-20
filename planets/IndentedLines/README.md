IndentedLines
=================
2015-12-15



Convert lists in indentedLines format to php arrays.



This tool is a php implementation of the [indentedLines notation](https://github.com/lingtalfi/Dreamer/blob/master/IndentedLines/notation.indentedLines.eng.md),
which aims at creating programming arrays using a simple language independent notation.


IndentedLines can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



How to use it?
--------------------

### A basic example


```php
<?php


use IndentedLines\Tool\IndentedLinesTool;

require_once "bigbang.php";



$string = <<<EEE
apple
banana
cherry
lemon
EEE;


a(IndentedLinesTool::parseFlatList($string)); // [apple, banana, cherry, lemon]


```



### A demonstration example


```php
<?php


use IndentedLines\Tool\IndentedLinesTool;

require_once "bigbang.php";



$string = <<<EEE

# this is a comment
- apple
- all:
----- peter
----- colors:
--------- red
--------- blue
- signature: <
    This is a multi line.
    And this is the second line.
>
- banana

EEE;


a(IndentedLinesTool::parseDashList($string));


```


The resulting array is as you would expect:

```php
array (size=4)
  0 => string 'apple' (length=5)
  'all' => 
    array (size=2)
      0 => string 'peter' (length=5)
      'colors' => 
        array (size=2)
          0 => string 'red' (length=3)
          1 => string 'blue' (length=4)
  'signature' => string 'This is a multi line.
And this is the second line.' (length=50)
  1 => string 'banana' (length=6)

```




How does it work under the hood?
----------------------


If you like very boring stories, you are in the good section.
A very good start is to read the [IndentedLines notation](https://github.com/lingtalfi/Dreamer/blob/master/IndentedLines/notation.indentedLines.eng.md),
which is the goal of this implementation.



I will give you an overview of how this specific implementation works though:


The NodeTreeBuilder is the main object, it is responsible for parsing the string top down, line by line.
It handles multi lines and comments.

The NodeTreeBuilder uses a KeyFinder object, which goal is to separate the key from the value.
For instance:

```php
- fruit: apple      // key=fruit, value=apple 
- apple      // value=apple, no key as far as the keyFinder is concerned 
```

Once the KeyFinder has found (or not found) the key, the NodeTreeBuilder is able to determine the value.

The NodeTreeBuilder does his job, and in the end, it produces a big Node object, which can contain other Node objects recursively,
and which represents the whole parsed structure.

I used Node objects because with a Node it's easier to keep track of which line is the children of which in trees that sometimes get complex.

Since our goal is to produce a php array, there is a NodeToArrayConvertor, that does the job of converting the big Node to a php array structure.

To hide the implementation details, I added the IndentedLinesTool which provides two simple general methods: parseFlatList and parseDashList.





Dependencies
------------------

- [lingtalfi/Bat 1.18](https://github.com/lingtalfi/Bat)
- [lingtalfi/Bate 1.0.0](https://github.com/lingtalfi/Bate)
- [lingtalfi/Quoter 1.4.0](https://github.com/lingtalfi/Quoter)





History Log
------------------
    
- 1.2.0 -- 2016-01-11

    - add QuotableValueInterpreter.setQuotedValueIsAlwaysString method
    
- 1.1.0 -- 2015-12-19

    - add QuotableValueInterpreter
    
- 1.0.2 -- 2015-12-19

    - fix BaseNodeTreeBuild.setKeyFinder, return the instance for fluidity
    
- 1.0.1 -- 2015-12-19

    - enhance KeyFinder, add static create method
    
    
- 1.0.0 -- 2015-12-15

    - initial commit
    
    



