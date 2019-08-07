[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)<br>
[Back to the Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator class](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md)


PageConfUpdator::updateWidget
================



PageConfUpdator::updateWidget — Updates widget identified by $widgetIdentifier using the $newWidgetConfLayer layer.




Description
================


public [PageConfUpdator::updateWidget](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/updateWidget.md)(string $widgetIdentifier, array $newWidgetConfLayer) : [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md)




Updates widget identified by $widgetIdentifier using the $newWidgetConfLayer layer.
The widgetIdentifier is a string with the following format:

- $zone.$identifier

With:

- $zone: the name of the zone containing the widget
- $identifier: the "identifier" key of the widget to update (this should be set by the plugin author).
     See more details in my [conception notes about the page updator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md#page-conf-updator).





The layer will be merged with the page configuration array using the ams algorithm,
which allows use to replace items from an associative array and add items to numerically indexed arrays.
For more details refer to the [ams algorithm documentation](https://github.com/lingtalfi/Bat/blob/master/ArrayTool.md#arraymergereplacerecursive).




Parameters
================


- widgetIdentifier

    

- newWidgetConfLayer

    


Return values
================

Returns [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md).








Source Code
===========
See the source code for method [PageConfUpdator::updateWidget](https://github.com/lingtalfi/Light_Kit/blob/master/PageConfigurationUpdator/PageConfUpdator.php#L120-L124)


See Also
================

The [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md) class.

Previous method: [setMergeArray](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/setMergeArray.md)<br>

