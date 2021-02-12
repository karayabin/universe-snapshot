[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The MethodPrevNextWidget class
================
2019-02-21 --> 2021-02-04






Introduction
============

The MethodPrevNextWidget class.



Class synopsis
==============


class <span class="pl-k">MethodPrevNextWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) [$classInfo](#property-classInfo) ;
    - protected [Ling\DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) [$methodInfo](#property-methodInfo) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;
    - protected [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) [$report](#property-report) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/__construct.md)() : void
    - public [setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setClassInfo.md)([Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) $classInfo) : void
    - public [setMethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setMethodInfo.md)([Ling\DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) $methodInfo) : void
    - public [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setGeneratedItemsToUrl.md)(array $generatedItems2Url) : void
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setReport.md)([Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report) : void
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/render.md)() : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md)(array $options) : void

}




Properties
=============

- <span id="property-classInfo"><b>classInfo</b></span>

    This property holds the class info.
    
    

- <span id="property-methodInfo"><b>methodInfo</b></span>

    This property holds the method info.
    
    

- <span id="property-generatedItems2Url"><b>generatedItems2Url</b></span>

    This property holds the array of className and/or className::methodName => url.
    
    

- <span id="property-report"><b>report</b></span>

    This property holds the DocTools\Report\ReportInterface.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds an array of options to use. Options affect the behaviour of the instance and
    are specific to the concrete class.
    
    



Methods
==============

- [MethodPrevNextWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/__construct.md) &ndash; Builds the ClassMethodsWidget instance.
- [MethodPrevNextWidget::setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setClassInfo.md) &ndash; Sets the classInfo.
- [MethodPrevNextWidget::setMethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setMethodInfo.md) &ndash; Sets the methodInfo.
- [MethodPrevNextWidget::setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setGeneratedItemsToUrl.md) &ndash; Sets the generatedItems2Url.
- [MethodPrevNextWidget::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/setReport.md) &ndash; Sets the report.
- [MethodPrevNextWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/MethodPrevNext/MethodPrevNextWidget/render.md) &ndash; Returns the rendered widget.
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.





Location
=============
Ling\DocTools\Widget\MethodPrevNext\MethodPrevNextWidget<br>
See the source code of [Ling\DocTools\Widget\MethodPrevNext\MethodPrevNextWidget](https://github.com/lingtalfi/DocTools/blob/master/Widget/MethodPrevNext/MethodPrevNextWidget.php)



SeeAlso
==============
Previous class: [ClassSynopsisWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget.md)<br>Next class: [PlanetDependenciesSectionWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget.md)<br>
