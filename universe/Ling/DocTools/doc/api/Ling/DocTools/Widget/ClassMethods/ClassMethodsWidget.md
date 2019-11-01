[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ClassMethodsWidget class
================
2019-02-21 --> 2019-10-25






Introduction
============

The ClassMethodsWidget class.
It helps to reproduce the following widget:

![screenshot from php.net](http://lingtalfi.com/img/universe/DocTools/class-methods-widget.png)



Class synopsis
==============


class <span class="pl-k">ClassMethodsWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) [$classInfo](#property-classInfo) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;
    - protected [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) [$report](#property-report) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/__construct.md)() : void
    - public [setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/setClassInfo.md)([Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) $classInfo) : void
    - public [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/setGeneratedItemsToUrl.md)(array $generatedItems2Url) : void
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/setReport.md)([Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report) : void
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/render.md)() : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md)(array $options) : void

}




Properties
=============

- <span id="property-classInfo"><b>classInfo</b></span>

    This property holds the class info.
    
    

- <span id="property-generatedItems2Url"><b>generatedItems2Url</b></span>

    This property holds the array of className and/or className::methodName => url.
    
    

- <span id="property-report"><b>report</b></span>

    This property holds the DocTools\Report\ReportInterface.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds an array of options to use. Options affect the behaviour of the instance and
    are specific to the concrete class.
    
    



Methods
==============

- [ClassMethodsWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/__construct.md) &ndash; Builds the ClassMethodsWidget instance.
- [ClassMethodsWidget::setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/setClassInfo.md) &ndash; Sets the classInfo.
- [ClassMethodsWidget::setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/setGeneratedItemsToUrl.md) &ndash; Sets the generatedItems2Url.
- [ClassMethodsWidget::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/setReport.md) &ndash; Sets the report.
- [ClassMethodsWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget/render.md) &ndash; Returns the rendered widget.
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.





Location
=============
Ling\DocTools\Widget\ClassMethods\ClassMethodsWidget<br>
See the source code of [Ling\DocTools\Widget\ClassMethods\ClassMethodsWidget](https://github.com/lingtalfi/DocTools/blob/master/Widget/ClassMethods/ClassMethodsWidget.php)



SeeAlso
==============
Previous class: [ParseDownTranslator](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Translator/ParseDownTranslator.md)<br>Next class: [ClassPrevNextWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget.md)<br>
