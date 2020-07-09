[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ClassPropertiesWidget class
================
2019-02-21 --> 2020-06-29






Introduction
============

The ClassPropertiesWidget class.
It helps to reproduce the following widget:

![screenshot from php.net](http://lingtalfi.com/img/universe/DocTools/class-properties-widget.png)



Class synopsis
==============


class <span class="pl-k">ClassPropertiesWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) [$classInfo](#property-classInfo) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassProperties/ClassPropertiesWidget/__construct.md)() : void
    - public [setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassProperties/ClassPropertiesWidget/setClassInfo.md)([Ling\DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) $classInfo) : void
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassProperties/ClassPropertiesWidget/render.md)() : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md)(array $options) : void

}




Properties
=============

- <span id="property-classInfo"><b>classInfo</b></span>

    This property holds the class info.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds an array of options to use. Options affect the behaviour of the instance and
    are specific to the concrete class.
    
    



Methods
==============

- [ClassPropertiesWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassProperties/ClassPropertiesWidget/__construct.md) &ndash; Builds the ClassPropertiesWidget instance.
- [ClassPropertiesWidget::setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassProperties/ClassPropertiesWidget/setClassInfo.md) &ndash; Sets the classInfo.
- [ClassPropertiesWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassProperties/ClassPropertiesWidget/render.md) &ndash; Returns the rendered widget.
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.





Location
=============
Ling\DocTools\Widget\ClassProperties\ClassPropertiesWidget<br>
See the source code of [Ling\DocTools\Widget\ClassProperties\ClassPropertiesWidget](https://github.com/lingtalfi/DocTools/blob/master/Widget/ClassProperties/ClassPropertiesWidget.php)



SeeAlso
==============
Previous class: [ClassPrevNextWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassPrevNext/ClassPrevNextWidget.md)<br>Next class: [ClassSynopsisWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget.md)<br>
