[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)



The ClassMethodsWidget class
================
2019-02-21 --> 2019-02-27






Introduction
============

The ClassMethodsWidget class.
It helps to reproduce the following widget:

![screenshot from php.net](http://lingtalfi.com/img/universe/DocTools/class-methods-widget.png)



Class synopsis
==============


class <span class="pl-k">ClassMethodsWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md) [$classInfo](#property-classInfo) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;
    - protected [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) [$report](#property-report) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/__construct.md)() : void
    - public [setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/setClassInfo.md)([DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md) $classInfo) : void
    - public [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/setGeneratedItemsToUrl.md)(array $generatedItems2Url) : void
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/setReport.md)([DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report) : void
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/render.md)() : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget/setOptions.md)(array $options) : void

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

- [ClassMethodsWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/__construct.md) &ndash; Builds the ClassMethodsWidget instance.
- [ClassMethodsWidget::setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/setClassInfo.md) &ndash; Sets the classInfo.
- [ClassMethodsWidget::setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/setGeneratedItemsToUrl.md) &ndash; Sets the generatedItems2Url.
- [ClassMethodsWidget::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/setReport.md) &ndash; Sets the report.
- [ClassMethodsWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassMethods/ClassMethodsWidget/render.md) &ndash; Returns the rendered widget.
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.





Location
=============
DocTools\Widget\ClassMethods\ClassMethodsWidget


SeeAlso
==============
Previous class: [ParseDownTranslator](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Translator/ParseDownTranslator.md)<br>Next class: [ClassPrevNextWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget.md)<br>
