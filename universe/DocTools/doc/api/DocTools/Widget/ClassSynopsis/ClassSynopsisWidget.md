The ClassSynopsisWidget class
================
2019-02-21 --> 2019-02-25




Introduction
============

The ClassSynopsisWidget class.
It tries to reproduce the following widget:

![screenshot from php.net](http://lingtalfi.com/img/universe/DocTools/class-synopsis-widget.png)


Options
----------
- bodyStyle: string = indented (indented|flat).
The style of the body. Possible values are:
- flat: the section title and its elements are at the same indentation level (root)
- indented: (default) the section title is a list at level 0, and the elements are children of that list (level 1)



Class synopsis
==============


class <span class="pl-k">ClassSynopsisWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md) [$classInfo](#property-classInfo) ;
    - protected array [$generatedItems2Url](#property-generatedItems2Url) ;
    - protected [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) [$report](#property-report) ;
    - protected string [$_bodyStyle](#property-_bodyStyle) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/__construct.md)() : void
    - public [setGeneratedItems2Url](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/setGeneratedItems2Url.md)(array $generatedItems2Url) : void
    - public [setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/setReport.md)([DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report) : void
    - public [setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/setClassInfo.md)([DocTools\Info\ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md) $classInfo) : void
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/render.md)() : string
    - protected [getClassUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getClassUrl.md)([\ReflectionClass](http://php.net/manual/en/class.reflectionclass.php) $class, $hint = null) : false | string
    - protected [addConstantLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/addConstantLine.md)(string &$s, \ReflectionClassConstant $constant, bool $showDeclaringClass = false) : void
    - protected [addPropertyLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/addPropertyLine.md)(string &$s, [DocTools\Info\PropertyInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PropertyInfo.md) $property, bool $showDeclaringClass = false) : void
    - protected [addMethodLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/addMethodLine.md)(?&$s, [DocTools\Info\MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) $method, $showDeclaringClass = false) : void
    - protected [getConstantVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getConstantVisibility.md)(\ReflectionClassConstant $constant) : string
    - protected [getSectionTitle](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getSectionTitle.md)(string $title) : string
    - protected [getElementIndentedDash](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getElementIndentedDash.md)() : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget/setOptions.md)(array $options) : void

}




Properties
=============

- <span id="property-classInfo"><b>classInfo</b></span>

    This property holds the class info.
    
    

- <span id="property-generatedItems2Url"><b>generatedItems2Url</b></span>

    This property holds a map of className and/or className::methodName => url.
    
    

- <span id="property-report"><b>report</b></span>

    This property holds a report instance.
    If not set, this class will not report anything.
    
    

- <span id="property-_bodyStyle"><b>_bodyStyle</b></span>

    This property holds the style to apply to the widget.
    The following values are available:
    - flat: the section titles (properties, methods) are written with doc comments, and the actual elements (properties, methods)
    are written as top level elements of a list
    
    - indented: the section titles are written as top level elements of a list, and the actual elements are their children (nested list elements).
    This is the default value
    
    

- <span id="property-options"><b>options</b></span>

    This property holds an array of options to use. Options affect the behaviour of the instance and
    are specific to the concrete class.
    
    



Methods
==============

- [ClassSynopsisWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/__construct.md) &ndash; Builds the ClassSynopsisWidget instance.
- [ClassSynopsisWidget::setGeneratedItems2Url](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/setGeneratedItems2Url.md) &ndash; Sets the generatedItems2Url.
- [ClassSynopsisWidget::setReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/setReport.md) &ndash; Sets the report.
- [ClassSynopsisWidget::setClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/setClassInfo.md) &ndash; Sets the classInfo.
- [ClassSynopsisWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/render.md) &ndash; Returns the rendered widget.
- [ClassSynopsisWidget::getClassUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getClassUrl.md) &ndash; Returns the class url for the given $class.
- [ClassSynopsisWidget::addConstantLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/addConstantLine.md) &ndash; Adds the constant line to the given $s string.
- [ClassSynopsisWidget::addPropertyLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/addPropertyLine.md) &ndash; Adds the property line to the given $s string.
- [ClassSynopsisWidget::addMethodLine](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/addMethodLine.md) &ndash; Adds the method line to the given $s string.
- [ClassSynopsisWidget::getConstantVisibility](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getConstantVisibility.md) &ndash; Returns the constant visibility.
- [ClassSynopsisWidget::getSectionTitle](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getSectionTitle.md) &ndash; Returns the section title, depending on the body style.
- [ClassSynopsisWidget::getElementIndentedDash](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/ClassSynopsis/ClassSynopsisWidget/getElementIndentedDash.md) &ndash; Returns the properly indented dash for body elements (methods, properties, inherited properties, ...).
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.




Location
=============
DocTools\Widget\ClassSynopsis\ClassSynopsisWidget