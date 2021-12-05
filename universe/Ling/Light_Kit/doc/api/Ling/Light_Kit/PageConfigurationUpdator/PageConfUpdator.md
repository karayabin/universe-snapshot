[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The PageConfUpdator class
================
2019-04-25 --> 2021-07-08






Introduction
============

The PageConfUpdator class.



Class synopsis
==============


class <span class="pl-k">PageConfUpdator</span>  {

- Properties
    - protected array [$mergeArray](#property-mergeArray) ;
    - protected array [$identifierLayers](#property-identifierLayers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/create.md)() : [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md)
    - public [update](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/update.md)(array &$pageConf) : void
    - public [setMergeArray](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/setMergeArray.md)(array $mergeArray) : [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md)
    - public [updateWidget](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/updateWidget.md)(string $widgetIdentifier, $newWidgetConfLayer) : [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md)

}




Properties
=============

- <span id="property-mergeArray"><b>mergeArray</b></span>

    This property holds the mergeArray for this instance.
    It's an array to merge with the page configuration array.
    
    

- <span id="property-identifierLayers"><b>identifierLayers</b></span>

    This property holds the identifierLayers for this instance.
    
    



Methods
==============

- [PageConfUpdator::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/__construct.md) &ndash; Builds the PageConfUpdator instance.
- [PageConfUpdator::create](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/create.md) &ndash; Builds and returns a PageConfUpdator instance.
- [PageConfUpdator::update](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/update.md) &ndash; Updates the given $pageConf array.
- [PageConfUpdator::setMergeArray](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/setMergeArray.md) &ndash; Sets the mergeArray.
- [PageConfUpdator::updateWidget](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/updateWidget.md) &ndash; Updates widget identified by $widgetIdentifier using the $newWidgetConfLayer layer.





Location
=============
Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator<br>
See the source code of [Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/PageConfigurationUpdator/PageConfUpdator.php)



SeeAlso
==============
Previous class: [WidgetVariablesHelper](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper.md)<br>Next class: [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md)<br>
