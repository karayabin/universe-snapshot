[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The DocBuilder class
================
2019-02-21 --> 2019-07-23






Introduction
============

The DocBuilder class.

This class builds the documentation pages.


The main idea is that you create a DocBuilder class tailored to your needs (encapsulating all your settings and preferences
for documentation generation), so that in production you can just call the builder any time you want to generate your documentation
with a few lines of code.

*
This is arguably the most important object in the DocTools planet as it's your interface to generate your documentation.

There is no particular rule about how code should be organized inside a DocBuilder, but the classes from the DocTools planet
might help you, and there is a main synopsis.



Synopsis
-----------


```txt
builder->prepare ( options )
builder->buildDoc()
builder->showReport()        // The report is a diagnose tool that helps you creating the perfect doc (it will tell you which methods don't have comments, etc...)

```


For a concrete implementation, see the [LingGitPhpPlanetDocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md) class.



Class synopsis
==============


abstract class <span class="pl-k">DocBuilder</span>  {

- Properties
    - protected [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) [$report](#property-report) ;

- Methods
    - abstract public [prepare](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/prepare.md)(array $settings = []) : void
    - abstract public [buildDoc](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/buildDoc.md)() : void
    - public [showReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/showReport.md)() : void
    - protected [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/setReport.md)([Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report) : void

}




Properties
=============

- <span id="property-report"><b>report</b></span>

    This property holds the parser report.
    
    



Methods
==============

- [DocBuilder::prepare](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/prepare.md) &ndash; Prepares the doc builder instance.
- [DocBuilder::buildDoc](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/buildDoc.md) &ndash; and according to the writeMode property.
- [DocBuilder::showReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/showReport.md) &ndash; Displays the report.
- [DocBuilder::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder/setReport.md) &ndash; Sets the report object.





Location
=============
Ling\DocTools\DocBuilder\DocBuilder<br>
See the source code of [Ling\DocTools\DocBuilder\DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/DocBuilder/DocBuilder.php)



SeeAlso
==============
Previous class: [CopyModuleInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md)<br>Next class: [LingGitPhpPlanetDocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md)<br>
