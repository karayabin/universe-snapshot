VariableToString
=====================
2015-10-27




Utility to write any php variable to a string representation.


VariableToString is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/VariableToString
```




Why? What's the goal?
---------

Typically, you want to write an error message and add some additional information about the culprit variable.



How to use it
-------------------

### Use the author object (recommended)

```php
$o = AuthorVariableToStringUtil::create();
$o->toString($anyVar); // prints an informative string about the $anyVar
```



### Use a custom object
 
```php
$o = VariableToStringUtil::create();
$o->addAdaptor(new PhpTypeVariableToStringAdaptor());
$o->toString($anyVar); // prints an informative string about the $anyVar
```



Comparing representations of various tools
------------------------------------

My little study about various tools for doing that.


Here is an array containing values that we want to represent.


```php
class ABC
{
    public function def()
    {
        echo "def";
    }
}

$abc = new ABC();

function pou()
{
    echo "pou";
}

$resource = fopen(__FILE__, 'r');


$vars = [
    'string' => 'hello',
    'int' => 789,
    'float' => 789.122,
    'true' => true,
    'false' => false,
    'null' => null,
    'array' => [
        'one' => 1,
        'two' => 'azul',
    ],
    'closure' => function ($m) {
        return $m;
    },
    'functionName' => 'pou',
    'instance' => new ABC(),
    'callback' => [$abc, 'def'],
    'resource' => $resource,
];
```



And now the results.

### Using php casting

Using the following methods are equivalent in php: 


```php

echo (string) $var;  // 1
echo strval($var);  // 2
settype($var, 'string'); // 3
echo $var;

```

The result is 

```
hello
789
789.122
1


Array
Catchable fatal error: object of class closure could not be converted...
pou
Catchable fatal error: object of class ABC could not be converted...
Array
Resource id #3
```


Notice that false and null are converted to the empty string,
and that the closure and the class trigger a fatal error.


### Using var_dump

Here is what we have if we use php's [var_dump](http://php.net/manual/en/function.var-dump.php) and 
capture its output.


```php 
string 'hello' (length=5)


int 789


float 789.122


boolean true


boolean false


null


array (size=2)
'one' => int 1
'two' => string 'azul' (length=4)


object(Closure)[3]
public 'parameter' =>
array (size=1)
'$m' => string '<required>' (length=10)


string 'pou' (length=3)


object(ABC)[4]


array (size=2)
0 =>
object(ABC)[2]
1 => string 'def' (length=3)


resource(3, stream)
```

### Using var_export


Using php's [var_export](http://php.net/manual/en/function.var-export.php), we obtain the following


```php
'hello'
789
789.12199999999996
true
false
NULL
array ( 'one' => 1, 'two' => 'azul', )
Closure::__set_state(array( ))
'pou'
ABC::__set_state(array( ))
array ( 0 => ABC::__set_state(array( )), 1 => 'def', )
NULL
```



### Using print_r 


Using php's [print_r](http://php.net/manual/en/function.print-r.php):

```
hello
789
789.122
1


Array ( [one] => 1 [two] => azul )
Closure Object ( [parameter] => Array ( [$m] => ) )
pou
ABC Object ( )
Array ( [0] => ABC Object ( ) [1] => def )
Resource id #2
```


### Using VariableToStringUtil with PhpTypeVariableToStringAdaptor


Using the code from the 'How to use it?' section.



```
string(hello)
integer(789)
double(789.122)
true
false
null
array(2)
object(Closure)
string(pou)
object(ABC)
array(2)
resource(stream)
```



### Using VariableToStringUtil with PhpDocVariableToStringAdaptor


```
"hello"
789
789.122
true
false
null
['one' => 1,'two' => 'azul']
object(Closure)
"pou"
object(ABC)
[ABC::__set_state(array( )),'def']
resource(stream)
```   


### Using AuthorVariableToStringUtil


```
string(hello)
integer(789)
double(789.122)
true
false
null
array(2)
closure($m)
callable(pou)
object(ABC)
callable(ABC->def())
resource(stream)
```   



Dependencies
------------------

- [lingtalfi/ArrayToString 1.0.0](https://github.com/lingtalfi/ArrayToString)
- [lingtalfi/ReflectionRepresentation 1.0.0](https://github.com/lingtalfi/ReflectionRepresentation)




History Log
------------------
    
- 1.1.0 -- 2015-10-27

    - Add CallableVariableToStringAdaptor
        
        
- 1.0.0 -- 2015-10-27

    - initial commit
    
    
    
    