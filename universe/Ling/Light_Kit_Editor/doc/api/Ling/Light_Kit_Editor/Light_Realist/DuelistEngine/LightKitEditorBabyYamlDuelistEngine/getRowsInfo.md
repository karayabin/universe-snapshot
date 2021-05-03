[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Light_Realist\DuelistEngine\LightKitEditorBabyYamlDuelistEngine class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.md)


LightKitEditorBabyYamlDuelistEngine::getRowsInfo
================



LightKitEditorBabyYamlDuelistEngine::getRowsInfo — Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.




Description
================


public [LightKitEditorBabyYamlDuelistEngine::getRowsInfo](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsInfo.md)(string $requestId, array $duelistDeclaration, array $tags) : array | false




Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.

The structure of the returned array is:

- rows: the rows to render, in mysql associative style (i.e. key/value pairs)
- nbTotalRows: the total number of rows if the request were not filtered
- limit: array of:
     - offset: int, the index of the first rendered element in the context of all the rows
     - length: int, the page length (i.e. how many items should be rendered)
- debugInfo: additional info which the engine wants to share with the caller.
     It's an array of key/value pairs.

If not otherwise specified, the tags used are the [open tags](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/2020/conception-notes.md#the-updateric-concept).
Duelist declaration: https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/duelist.md.

If something wrong occurs, the error message can be fetched via the getError method.


Throws an exception if something unexpected occurs.




Parameters
================


- requestId

    

- duelistDeclaration

    

- tags

    


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitEditorBabyYamlDuelistEngine::getRowsInfo](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.php#L84-L338)


See Also
================

The [LightKitEditorBabyYamlDuelistEngine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/setOptions.md)<br>Next method: [getError](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getError.md)<br>

