CommandLineManiac
====================
2015-10-04



Tools for command line scripts written in php.





GetOptTool
==================
2015-10-04



Knowing exactly the data type of your options
------------------------------------------------

This tool is to be used along with the native getopt php function.
The problem with getopt is this:

```bash
my_script -i 4 -i 5 -i 6    # i is an array
my_script -i 4              # i is a string
```
    
    
Sometimes, it's not a problem.
But I usually always know if I'm want an array or a string.
GetOptTool contains two functions to do just that:
    
    
```php
    
$options = getopt("l:s:");


if (array_key_exists('l', $options)) {
    $action = "list";
    $value = GetOptTool::getOptionAsString('l', $options); 
    // now you know for sure that $value contains a string
}

if (array_key_exists('s', $options)) {
    $statusValues = GetOptTool::getOptionAsArray('s', $options);
    // now you know for sure that $statusValues contains an array
}
```


Also, the GetOptTool::getOptionAsArray method can parse a string using a separator, 
so for instance the following notations are all equivalent:


```bash
my_script -i 4 -i 5 -i 6            # standard php getopt way of creating arrays
my_script -i 4,5,6                  # GetOptTool::getOptionAsArray parses this as an array automatically
my_script -i "4, 5, 6"              # This too, but don't forget the quotes 
my_script -i 4.5.6                  # We can also specify a different separator, like a dot
```




Display help and exit the script immediately
----------------------------------------------

If you have created bash scripts, you would appreciate that you can exit from within a function,
and that would exit the whole process.
Thus, you can create a help function and put an exit at the end, and you would get the expected behaviour.

Not much so in php.
If you miss this feature from bash, it's actually very simple to implement in php:
just throw an SilentException, and do nothing when you catch it. 

The CommandLineManiac tools provide such exceptions.

Here is the workflow:





```php
function help()
{
    echo <<<EEEE
    
Usage:
    -l: list all entries
    -u: update the last entry
    ...blabla

EEEE;
    throw new HelpException();
}


function werror($m)
{
    echo "wizard: fatal: " . $m . PHP_EOL;
    throw new SilentException();
}



try {



    if("wrong parameter"){
        help();
    }
    if("error"){
        werror("oops");
    }
    
    
    //------------------------------------------------------------------------------/
    // PROCESSING OPTIONS
    //------------------------------------------------------------------------------/
    if (array_key_exists('l', $options)) {
        $action = "list";
        $value = GetOptTool::getOptionAsString('l', $options);
    }

    if (array_key_exists('s', $options)) {
        $statusValues = GetOptTool::getOptionAsArray('s', $options);
    }
    if (array_key_exists('m', $options)) {
        $maxValue = GetOptTool::getOptionAsString('m', $options);
    }
    // ...



} catch (SilentException $e) {
    // void
} catch (\Exception $e) {
    echo $e;
}
```

