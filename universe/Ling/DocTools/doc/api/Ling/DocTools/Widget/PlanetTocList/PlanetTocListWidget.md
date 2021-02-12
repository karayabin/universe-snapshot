[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The PlanetTocListWidget class
================
2019-02-21 --> 2021-02-04






Introduction
============

This PlanetTocListWidget widget displays a list of each class of the planet and their methods.
Each item being a link to a separate doc page.


This was inspired by the following page from the php.net website: http://php.net/manual/en/book.reflection.php
See the [screenshot here](http://lingtalfi.com/img/universe/DocTools/toclist-widget.png).


Options
-----------
- internal_link_base_uri: string, the uri prefix for internal links. It doesn't end with slash.
- ?display_class_description: bool=true, whether to display the short class description next to the generated class links.

- ?class_description_mode: string=mixed (first_line | first_sentence | format_text | mixed).
         Defines what the class description is (this option is only relevant if the display_class_description option is set to true).
         The possible modes are:
             - first_line: this will display the first line of the class' (doc block) comment. If the class has no comment,
                         this displays an empty string.
             - first_sentence: this will display the first sentence of the class' (doc block) comment. If the class has no comment,
                         this displays an empty string.
             - format_text: this will display a formatted text defined with the class_description_format option.
             - mixed: first try the first_sentence, and if empty use the format_text mode (as a fallback).
                     This is the default value.


- ?class_description_format: string, the default text to display as the class description.
             Is only relevant when display_class_description=true and class_description_use_class_comment_first_line=false
             Default value: "The {short} class".
             The following tags can be used:
                 - {class}: the class name
                 - {short}: the short class name

- ?display_methods: bool=true, whether to display the methods. If false, only the class links will be generated.
- ?methods_filter: string|array=public. A string or array of flags indicating which type of methods to return.
                 The available flags are:
                     - public
                     - protected
                     - private

- ?display_method_description: bool=true. Whether to display the short method description next to the generated method links.
         Is only relevant if display_methods is set to true.

- ?method_description_mode: string=mixed (first_line | first_sentence | format_text | mixed).
         Same as the class_description_mode option, but for methods.


- ?method_description_format: string, same as class_description_format, but for methods.
             Default value: "The {method} method".
             The following tags can be used:
                 - {method}: the method name



Class synopsis
==============


class <span class="pl-k">PlanetTocListWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [Ling\DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md) [$planetInfo](#property-planetInfo) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/__construct.md)() : void
    - public [setPlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/setPlanetInfo.md)([Ling\DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md) $planetInfo) : [PlanetTocListWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget.md)
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/render.md)() : string
    - protected [getItemDescription](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/getItemDescription.md)([Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) $comment, string $mode, callable $formatterCallable, string $debugString) : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md)(array $options) : void

}




Properties
=============

- <span id="property-planetInfo"><b>planetInfo</b></span>

    This property holds a [PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/PlanetInfo.md) instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds an array of options to use. Options affect the behaviour of the instance and
    are specific to the concrete class.
    
    



Methods
==============

- [PlanetTocListWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/__construct.md) &ndash; Builds the PlanetTocListWidget instance.
- [PlanetTocListWidget::setPlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/setPlanetInfo.md) &ndash; Sets the planet info.
- [PlanetTocListWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/render.md) &ndash; Returns the rendered widget.
- [PlanetTocListWidget::getItemDescription](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/getItemDescription.md) &ndash; Returns the item description, according to the given $mode.
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.





Location
=============
Ling\DocTools\Widget\PlanetTocList\PlanetTocListWidget<br>
See the source code of [Ling\DocTools\Widget\PlanetTocList\PlanetTocListWidget](https://github.com/lingtalfi/DocTools/blob/master/Widget/PlanetTocList/PlanetTocListWidget.php)



SeeAlso
==============
Previous class: [PlanetDependenciesSectionWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget.md)<br>Next class: [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/Widget.md)<br>
