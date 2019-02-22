The PlanetDependenciesSectionWidget class
================
2019-02-21 --> 2019-02-22




Introduction
============

The PlanetDependenciesSectionWidget class.
This widget displays the planet dependencies.



Class synopsis
==============


class <span style="color: orange;">PlanetDependenciesSectionWidget</span> extends [Widget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget.md) implements [WidgetInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/WidgetInterface.md) {

- Properties
    - protected [DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PlanetInfo.md) [$planetInfo](#property-planetInfo) ;

- Inherited properties
    - protected array [Widget::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget/__construct.md)() : void
    - public [setPlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget/setPlanetInfo.md)([DocTools\Info\PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PlanetInfo.md) $planetInfo) : [PlanetDependenciesSectionWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget.md)
    - public [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget/render.md)() : string

- Inherited methods
    - public [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget/setOptions.md)(array $options) : void

}




Properties
=============

- <span id="property-planetInfo"><b>planetInfo</b></span>

    This property holds a [PlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/PlanetInfo.md) instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds an array of options to use. Options affect the behaviour of the instance and
    are specific to the concrete class.
    
    



Methods
==============

- [PlanetDependenciesSectionWidget::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget/__construct.md) &ndash; Builds the PlanetDependenciesSectionWidget instance.
- [PlanetDependenciesSectionWidget::setPlanetInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget/setPlanetInfo.md) &ndash; Sets the planet info.
- [PlanetDependenciesSectionWidget::render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/PlanetDependenciesSection/PlanetDependenciesSectionWidget/render.md) &ndash; Returns the rendered widget.
- [Widget::setOptions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Widget/Widget/setOptions.md) &ndash; Sets the options for this widget instance.




Location
=============
DocTools\Widget\PlanetDependenciesSection\PlanetDependenciesSectionWidget