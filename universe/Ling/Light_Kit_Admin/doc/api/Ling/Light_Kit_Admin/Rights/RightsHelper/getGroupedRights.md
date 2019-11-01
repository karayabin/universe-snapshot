[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Rights\RightsHelper class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper.md)


RightsHelper::getGroupedRights
================



RightsHelper::getGroupedRights — Returns the array of rights grouped by plugin names.




Description
================


public static [RightsHelper::getGroupedRights](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/getGroupedRights.md)(array $rights, ?bool $keepPluginName = false) : array




Returns the array of rights grouped by plugin names.
This method assumes that every right starts with the plugin name followed by a dot.

If the rights contains the root right (*), then the returned array will only contain the root right.




Parameters
================


- rights

    

- keepPluginName

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [RightsHelper::getGroupedRights](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Rights/RightsHelper.php#L45-L70)


See Also
================

The [RightsHelper](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper.md) class.

Previous method: [isRoot](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Rights/RightsHelper/isRoot.md)<br>

