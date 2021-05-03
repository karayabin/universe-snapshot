[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Light_Realist\DuelistEngine\LightKitEditorBabyYamlDuelistEngine class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.md)


LightKitEditorBabyYamlDuelistEngine::getRowsByDir
================



LightKitEditorBabyYamlDuelistEngine::getRowsByDir — Returns the rows from the given dir.




Description
================


private [LightKitEditorBabyYamlDuelistEngine::getRowsByDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsByDir.md)(string $dir, ?array $options = []) : array




Returns the rows from the given dir.


Available options are:
- id: bool, whether to add the id (auto-incremented property) to each row
- weakMap: array=null, a map of extra properties to add to each row, if they don't exist
- transform: array of propertyName => php callable.
     This is applied BEFORE the weakMap is applied.
     This will transform the given propertyName, if it exists in the row, into whatever the php callable returns.
     The php callable takes the property's value as input.
- remove: array of properties to remove
- filesOnly: bool=false. If true, the relative path to the file will be set as the "identifier" key in the row,
     and the content of the babyYaml file is not parsed.




Parameters
================


- dir

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightKitEditorBabyYamlDuelistEngine::getRowsByDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.php#L634-L691)


See Also
================

The [LightKitEditorBabyYamlDuelistEngine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.md) class.

Previous method: [normalizeWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/normalizeWidget.md)<br>Next method: [getAllowedFieldsByTable](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getAllowedFieldsByTable.md)<br>

