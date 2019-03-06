ArrayExport
===============
2016-12-02



This class can export a php array containing closures (aka anonymous functions).



ArrayExport is part of the [universe](https://github.com/karayabin/universe-snapshot) framework.



Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/ArrayExport
```



Examples
--------------


Paste the following code in a file, and execute it in a browser (or via the command line)
```php
<?php

use Ling\ArrayExport\ArrayExport;

require "bigbang.php";

class Doom
{
    private $number;

    public function setNumber($n)
    {
        $this->number = $n;
    }
}

$o = new Doom();
$o->setNumber(78);

$prefs = [
    'direction' => 'right',
    'number' => 6,
    'float' => 6.2,
    'bool' => false,
    'null' => null,
    'anArray' => [
        'sport',
        'fun',
        'computers',
    ],
    'recursiveArray' => [
        'michel' => 'coups de coeur',
        'boris' => 'clock',
        'fantom' => [
            'callbackInAnArray' => function ($name, array &$imaginaryArgument = null) {
                return "noproblem " . $name;
            }
        ],
    ],
    'myfunction' => function ($c) {
        return (false !== strpos($c, 'url_'));
    },
    'classInstance' => $o,
];

$f = "/path/to/output.php";
$content = '<?php ' . PHP_EOL;
$content .= '$theArray = ' . ArrayExport::export($prefs) . ';' . PHP_EOL;
file_put_contents($f, $content);

```

Now, open the **/path/to/output.php** file and you should see something like this
(I just reindented the code on the closure lines):


```php

<?php
$theArray = [
    'direction' => 'right',
    'number' => 6,
    'float' => 6.2000000000000002,
    'bool' => false,
    'null' => NULL,
    'anArray' => [
        'sport',
        'fun',
        'computers',
    ],
    'recursiveArray' => [
        'michel' => 'coups de coeur',
        'boris' => 'clock',
        'fantom' => [
            'callbackInAnArray' => function ($name, array &$imaginaryArgument = null) {
                return "noproblem " . $name;
            },
        ],
    ],
    'myfunction' => function ($c) {
        return (false !== strpos($c, 'url_'));
    },
    'classInstance' => Doom::__set_state(array(
        'number' => 78,
    )),
];

```


As you can see, the closures have been kept intact.

But, we also see that the float value is messed up.

This can be worked out with the second parameter of the export method, which is the floatPrecision parameter.

So for instance if you use the same code as above, but instead replace the appropriate line with this one:


```php
$content .= '$theArray = ' . ArrayExport::export($prefs, 2) . ';' . PHP_EOL;
```

Now your output is better for the float.

```php
<?php 
$theArray = [
    'direction' => 'right',
    'number' => 6,
    'float' => 6.2,
    'bool' => false,
    'null' => NULL,
    'anArray' => [
        'sport',
        'fun',
        'computers',
    ],
    'recursiveArray' => [
        'michel' => 'coups de coeur',
        'boris' => 'clock',
        'fantom' => [
            'callbackInAnArray' => function ($name, array &$imaginaryArgument = null) {
                return "noproblem " . $name;
            },
        ],
    ],
    'myfunction' => function ($c) {
        return (false !== strpos($c, 'url_'));
    },
    'classInstance' => Doom::__set_state(array(
       'number' => 78,
    )),
];

```









Dependencies
--------------

- [ArrayToString 1.0.0](https://github.com/lingtalfi/ArrayToString)






History Log
------------------
    
- 1.1.0 -- 2017-04-19

    - fix indentation issue and improved inline function detection 

- 1.0.0 -- 2016-12-02

     - initial commit