[Back to the Ling/SicTools api](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools.md)



The SicFileCombinerUtil class
================
2019-04-25 --> 2021-03-05






Introduction
============

The SicFileCombinerUtil class.


Overview
=========
Prerequisites: Know what the [sic notation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md) is.

The goal of the sic combiner (this class) is to provide a sic array (i.e. an array using the sic notation),
which usually serves as the configuration of a service container.

However with the sic combiner, you can merge multiple sic configuration files altogether to create one united big sic array.
So the sic combiner is like a blender in which you can put all your configuration files, and you get one combined sic array
in the end.

Now because multiple files are merged together, they kind of communicate with each other.
And so the sic combiner provides some features to organize this communication.


Be aware that the sic combiner works at the array level, BEFORE the sic notation is actually processed.
In other words, you start with multiple [babyYaml](https://github.com/lingtalfi/BabyYaml) files which basically contain arrays,
you assemble them using the sic combiner, which in the end gives you one big array.

Once you have this big array, you can interpret it as a sic array to feed your service container, but this
last step is outside the scope of the sic combiner object: the sic combiner only merges arrays together, and is
not aware of the sic notation.




Sic combiner features
=========
So again, the idea of a "combiner" is that the configuration array is broken into multiple files.

Typically, this is what happens naturally in an environment with plugins: each plugin brings
a part of the configuration in the form of one or multiple files; each plugin owns one or more files.

Then the role of a "combiner" is to parse all those files and make one united configuration.


By default, the files are merged in the order they appear (usually ordered alphabetically), and are merged
using the so-called arrayMergeReplaceRecursive algorithm

Basically, this algorithm merges arrays together, and when a value already exists, two cases:

- either the replaced value is an array, in which case the new value gets appended to that array
- or the replaced value is a scalar value (i.e. not an array), in which case the new value completely replaces the old one

The exception being you can't override a numerical key (which indicates a numeric array which always calls for
a merge operation).

See the [ArrayTool::arrayMergeReplaceRecursive](https://github.com/lingtalfi/Bat/blob/master/ArrayTool.md#arraymergereplacerecursive) method for more info.

Apart from providing that default algorithm, the extra-value brought by this combiner is that it allows syntax additions.

In this particular combiner object, the following features are implemented:


- lazy override variables
- variable references


Lazy override variables
---------

Ams is a variant based upon the arrayMergeReplaceRecursive algorithm; its goal is to address some limitations
of the arrayMergeReplaceRecursive algorithm.

What are those limitations?
The main limitation of the arrayMergeReplaceRecursive algorithm is that arrays are merged in their order
of appearance, so that when two arrays are merged, the second array is always pasted on top of the first one,
overriding its values.

So for instance if file aa.byml contains this:

```yaml
my_color: blue
```

and file bb.yml contains this:

```yaml
my_color: red
```


Then the combined file will look like this:

```yaml
my_color: red
```


That's because b comes after a in the alphabet, and so the bb.yml file will always be merged on top of the
aa.byml file.


Sometimes though, in particular in a plugin environment where plugins have equal "rights", the plugin aa.byml
should have the right to override the configuration of plugin bb.yml, exactly in the same manner as
bb.yml having the right to override the configuration of aa.byml.

In other words, a plugin shall be able to SUBSCRIBE to another plugin's service (aka configuration),
without regards to its alphabetical order.


And so that's what the lazy override syntax addresses.

The lazy override syntax basically uses the [bdot](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md) syntax, but it prefixes it with a
symbol (the dollar symbol by default).
So for instance, here is the content of an hypothetical z.byml file:



```yaml
service_from_Z:
     instance: My\Company\Util\ServiceOne
     methods:
         adopt: []

```


And now here is the content of a file aa.byml, who wants to hook into the service from zz.byml:



```yaml
$service_from_Z.methods.adopt:
     - item_one
     - item_two
```


In the end, the "compiled" file/array will look like this:

```yaml
service_from_Z:
     instance: My\Company\Util\ServiceOne
     methods:
         adopt:
             - item_one
             - item_two

```

So again, the lazy override syntax is just a way for a plugin to override a configuration key from another plugin.

A lazy override variable must be declared at the root of a file (i.e. not in a nested key).
What's done under the hood is that when a lazy override variable is found, it is temporarily extracted from the
combining process, and stored in memory.

Then after the final array is combined, the stored variables are injected using the same arrayMergeReplaceRecursive
algorithm into the combined array.





Variable references
-------

A variable reference is just a reference to a (previously declared) lazy override variable.
*
So for instance if my file contains this:

```yaml
my_var: 66
```

Then I can use the ${tag} notation, for instance:


```yaml
my_service:
     instance: My\Company\Util\ServiceOne
     methods:
         makeCoffee:
             - arg1
             - ${my_var}
             - arg3
```



Variables must be declared at the root level.
Bdot syntax is allowed.

The goal of variables is to allow an application maintainer to configure her system with ease.
Usually, a plugin author would create an array containing all her variables.
That would avoid potential collisions with other plugins variables.

Here is a concrete fake example of how the variable system was meant to be used.

A plugin author creates her file aa.byml with the following content:

```yaml

plugin_a_vars:
     color: red

my_service_A:
     nested:
         very_deep:
             so_boring:
                 to_override:
                     -
                         instance: paa
                         methods:
                             doCoffee:
                                 - 11
                                 - 33
                     -
                         instance: poo
                         methods:
                             doTea:
                                 arg1: 11
                                 color: ${plugin_a_vars.color}
                                 arg3: 33
     others: blabla

my_service_2: etc...


```

Then in a separate file, the application maintainer put the following content:

```yaml
$plugin_a_vars.color: blue
```


So, in this case, what variables permit is:

- plugin authors can provide their own variable by declaring them in their configuration file
- using variables saves some typing for the app maintainer who can override them from another configuration file (using lazy override technique for instance)


If she didn't use the variable system, the app maintainer would had typed this instead:


```yaml
$my_service_A.nested.very_deep.so_boring.to_override.1.methods.doTea.color: blue
```


Note: plugins technically can also use this lazy override syntax to "use" other plugins.
And so it is recommended that the app maintainer creates a file which comes last in the alphabetical order
(for instance: zzz.byml), so that the app maintainer configuration prevails no matter what.
That's because even the lazy override variables system is ruled by the alphabetical order.



Class synopsis
==============


class <span class="pl-k">SicFileCombinerUtil</span>  {

- Properties
    - protected string [$lazyOverrideSymbol](#property-lazyOverrideSymbol) ;
    - protected string [$variableSymbol](#property-variableSymbol) ;
    - protected array [$environmentVariables](#property-environmentVariables) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/__construct.md)() : void
    - public [setLazyOverrideSymbol](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setLazyOverrideSymbol.md)(string $lazyOverrideSymbol) : void
    - public [setVariableSymbol](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setVariableSymbol.md)(string $variableSymbol) : void
    - public [setEnvironmentVariables](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setEnvironmentVariables.md)(array $environmentVariables) : [SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil.md)
    - public [combine](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/combine.md)(string $directory, ?array $options = []) : array
    - private [injectLazyVars](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/injectLazyVars.md)(array $lazyVars, array &$ret) : void

}




Properties
=============

- <span id="property-lazyOverrideSymbol"><b>lazyOverrideSymbol</b></span>

    This property holds the combinerFirstSymbol for this instance.
    This is the symbol to indicate the beginning of a lazy override variable symbol.
    This should be a one letter long symbol.
    
    

- <span id="property-variableSymbol"><b>variableSymbol</b></span>

    This property holds the variableSymbol for this instance.
    This is the symbol to indicate the beginning of a variable reference symbol.
    This should be a one letter long symbol.
    
    

- <span id="property-environmentVariables"><b>environmentVariables</b></span>

    This property holds the environmentVariables for this instance.
    
    It's an array of key => value.
    It represents some extra variables that are always available to the configuration files.
    You can access their values like regular variables using the ${var} notation (by default).
    
    



Methods
==============

- [SicFileCombinerUtil::__construct](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/__construct.md) &ndash; Builds the SicFileCombinerUtil instance.
- [SicFileCombinerUtil::setLazyOverrideSymbol](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setLazyOverrideSymbol.md) &ndash; Sets the lazyOverrideSymbol.
- [SicFileCombinerUtil::setVariableSymbol](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setVariableSymbol.md) &ndash; Sets the variableSymbol.
- [SicFileCombinerUtil::setEnvironmentVariables](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/setEnvironmentVariables.md) &ndash; Sets the environmentVariables.
- [SicFileCombinerUtil::combine](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/combine.md) &ndash; Combines the babyYaml files found in the given directory, and returns the resulting array.
- [SicFileCombinerUtil::injectLazyVars](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/Util/SicFileCombinerUtil/injectLazyVars.md) &ndash; Injects the lazy vars into the ret array.





Location
=============
Ling\SicTools\Util\SicFileCombinerUtil<br>
See the source code of [Ling\SicTools\Util\SicFileCombinerUtil](https://github.com/lingtalfi/SicTools/blob/master/Util/SicFileCombinerUtil.php)



SeeAlso
==============
Previous class: [SicTool](https://github.com/lingtalfi/SicTools/blob/master/doc/api/Ling/SicTools/SicTool.md)<br>
