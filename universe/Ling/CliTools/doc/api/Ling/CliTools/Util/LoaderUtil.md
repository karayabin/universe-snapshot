[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The LoaderUtil class
================
2019-02-26 --> 2021-05-31






Introduction
============

The LoaderUtil class.



Class synopsis
==============


class <span class="pl-k">LoaderUtil</span>  {

- Properties
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$output](#property-output) ;
    - protected int [$nbTotalItems](#property-nbTotalItems) ;
    - protected string [$displayMode](#property-displayMode) ;
    - private int [$lastLoaderLength](#property-lastLoaderLength) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/__construct.md)() : void
    - public [setOutput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [setNbTotalItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setNbTotalItems.md)(int $nbTotalItems) : void
    - public [setDisplayMode](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setDisplayMode.md)(string $displayMode) : void
    - public [incrementBy](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/incrementBy.md)(?$int = 1) : void
    - public [start](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/start.md)() : void
    - protected [refreshDisplay](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/refreshDisplay.md)() : void

}




Properties
=============

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    

- <span id="property-nbTotalItems"><b>nbTotalItems</b></span>

    This property holds the nbTotalItems for this instance.
    
    

- <span id="property-displayMode"><b>displayMode</b></span>

    This property holds the displayMode for this instance.
    It shows the display of this widget either in percent (i.e. 94%) or showing ratio of items done vs item total (i.e. 67/89).
    
    

- <span id="property-lastLoaderLength"><b>lastLoaderLength</b></span>

    The number of visible characters last displayed by this loader.
    
    



Methods
==============

- [LoaderUtil::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/__construct.md) &ndash; Builds the LoaderUtil instance.
- [LoaderUtil::setOutput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setOutput.md) &ndash; Sets the output.
- [LoaderUtil::setNbTotalItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setNbTotalItems.md) &ndash; Sets the nbTotalItems.
- [LoaderUtil::setDisplayMode](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setDisplayMode.md) &ndash; Sets the displayMode.
- [LoaderUtil::incrementBy](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/incrementBy.md) &ndash; Increments the loader by the given amount.
- [LoaderUtil::start](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/start.md) &ndash; Starts running the loader, which displays the widget to the output.
- [LoaderUtil::refreshDisplay](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/refreshDisplay.md) &ndash; Refreshes the display of the widget.


Examples
==========

Example #1: Basic usage
---------------



```php
$input = new CommandLineInput();
$output = new Output();


$nbItems = 10000000;

$loader = new LoaderUtil();
$loader->setOutput($output);
$loader->setNbTotalItems($nbItems);
$loader->setDisplayMode('percent');


$loader->start();
for ($i = 0; $i <= $nbItems; $i++) {
    $loader->incrementBy(1);
}

```




Location
=============
Ling\CliTools\Util\LoaderUtil<br>
See the source code of [Ling\CliTools\Util\LoaderUtil](https://github.com/lingtalfi/CliTools/blob/master/Util/LoaderUtil.php)



SeeAlso
==============
Previous class: [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md)<br>Next class: [TableUtil](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil.md)<br>
