[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ClassPrevNextWidget class
================
2019-02-21 --> 2021-03-05






Introduction
============

The ClassPrevNextWidget class.



Class synopsis
==============


class <span class="pl-k">ClassPrevNextWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) [$classInfo](#property-classInfo) ;
    - protected [Ling\DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md) [$planetInfo](#property-planetInfo) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;
    - protected [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) [$report](#property-report) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/__construct.md)() : void
    - public [setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setClassInfo.md)([Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) $classInfo) : void
    - public [setPlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setPlanetInfo.md)([Ling\DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md) $planetInfo) : void
    - public [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setGeneratedItemsToUrl.md)(array $generatedItems2Url) : void
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setReport.md)([Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report) : void
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/render.md)() : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md)(array $options) : void

}




Properties
=============

- <span id="property-classInfo"><b>classInfo</b></span>

    This property holds the class info.
    
    

- <span id="property-planetInfo"><b>planetInfo</b></span>

    This property holds the planet info.
    
    

- <span id="property-generatedItems2Url"><b>generatedItems2Url</b></span>

    This property holds the array of className and/or className::methodName => url.
    
    

- <span id="property-report"><b>report</b></span>

    This property holds the DocTools\Report\ReportInterface.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds an array of options to use. Options affect the behaviour of the instance and
    are specific to the concrete class.
    
    



Methods
==============

- [ClassPrevNextWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/__construct.md) &ndash; Builds the ClassMethodsWidget instance.
- [ClassPrevNextWidget::setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setClassInfo.md) &ndash; Sets the classInfo.
- [ClassPrevNextWidget::setPlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setPlanetInfo.md) &ndash; Sets the planetInfo.
- [ClassPrevNextWidget::setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setGeneratedItemsToUrl.md) &ndash; Sets the generatedItems2Url.
- [ClassPrevNextWidget::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/setReport.md) &ndash; Sets the report.
- [ClassPrevNextWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget/render.md) &ndash; Returns the rendered widget.
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.





Location
=============
Ling\DocTools\Widget\ClassPrevNext\ClassPrevNextWidget<br>
See the source code of [Ling\DocTools\Widget\ClassPrevNext\ClassPrevNextWidget](https://github.com/lingtalfi/DocTools/blob/master/Widget/ClassPrevNext/ClassPrevNextWidget.php)



SeeAlso
==============
Previous class: [ClassMethodsWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassMethods/ClassMethodsWidget.md)<br>Next class: [ClassPropertiesWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassProperties/ClassPropertiesWidget.md)<br>
