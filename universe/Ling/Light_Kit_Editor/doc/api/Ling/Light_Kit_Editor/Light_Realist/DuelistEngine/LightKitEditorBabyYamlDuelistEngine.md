[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)



The LightKitEditorBabyYamlDuelistEngine class
================
2021-03-01 --> 2021-08-03






Introduction
============

The LightKitEditorBabyYamlDuelistEngine class.



Class synopsis
==============


class <span class="pl-k">LightKitEditorBabyYamlDuelistEngine</span> implements [DuelistEngineInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface.md) {

- Properties
    - private [Ling\Light_Kit_Editor\Light_Realist\DuelistEngine\?string](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/?string.md) [$rootDir](#property-rootDir) ;
    - private array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/__construct.md)() : void
    - public [setRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/setRootDir.md)(string $rootDir) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/setOptions.md)(array $options) : void
    - public [getRowsInfo](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsInfo.md)(string $requestId, array $duelistDeclaration, array $tags) : array | false
    - public [getError](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getError.md)() : string | null
    - private [getRowsByTable](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsByTable.md)(string $table) : array
    - private [getBlockHasWidgetRows](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getBlockHasWidgetRows.md)() : array
    - private [getPageHasBlockRows](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getPageHasBlockRows.md)() : array
    - private [getWidgetRows](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getWidgetRows.md)() : array
    - private [normalizeWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/normalizeWidget.md)(array &$widget, array $weakMap) : void
    - private [getRowsByDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsByDir.md)(string $dir, ?array $options = []) : array
    - private [getAllowedFieldsByTable](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getAllowedFieldsByTable.md)(string $table) : array
    - private [getSimplifiedTable](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getSimplifiedTable.md)(string $duelistTable) : string
    - private [getIdentifierSuffix](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getIdentifierSuffix.md)(int $count) : string
    - private [matchSearch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/matchSearch.md)(array $row, string $column, string $operator, string $operatorValue, ?string $operatorValue2 = null) : bool
    - private [format](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/format.md)(string $str) : string
    - private [error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    - caseSensitive: bool=false, whether the engine should be case sensitive
    
    



Methods
==============

- [LightKitEditorBabyYamlDuelistEngine::__construct](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/__construct.md) &ndash; Builds the LightKitEditorBabyYamlDuelistEngine instance.
- [LightKitEditorBabyYamlDuelistEngine::setRootDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/setRootDir.md) &ndash; Sets the rootDir.
- [LightKitEditorBabyYamlDuelistEngine::setOptions](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/setOptions.md) &ndash; Sets the options.
- [LightKitEditorBabyYamlDuelistEngine::getRowsInfo](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsInfo.md) &ndash; Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.
- [LightKitEditorBabyYamlDuelistEngine::getError](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getError.md) &ndash; Returns the error message if any, or null otherwise.
- [LightKitEditorBabyYamlDuelistEngine::getRowsByTable](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsByTable.md) &ndash; Returns all the rows for the given duelist table.
- [LightKitEditorBabyYamlDuelistEngine::getBlockHasWidgetRows](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getBlockHasWidgetRows.md) &ndash; Returns all the block_has_widget entries as rows.
- [LightKitEditorBabyYamlDuelistEngine::getPageHasBlockRows](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getPageHasBlockRows.md) &ndash; Returns all the page_has_block entries as rows.
- [LightKitEditorBabyYamlDuelistEngine::getWidgetRows](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getWidgetRows.md) &ndash; Return all the widgets as rows.
- [LightKitEditorBabyYamlDuelistEngine::normalizeWidget](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/normalizeWidget.md) &ndash; Prepares the given widget for rendering.
- [LightKitEditorBabyYamlDuelistEngine::getRowsByDir](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getRowsByDir.md) &ndash; Returns the rows from the given dir.
- [LightKitEditorBabyYamlDuelistEngine::getAllowedFieldsByTable](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getAllowedFieldsByTable.md) &ndash; Returns the array of allowed fields for the given table.
- [LightKitEditorBabyYamlDuelistEngine::getSimplifiedTable](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getSimplifiedTable.md) &ndash; Returns the simplified version of the given duelist table.
- [LightKitEditorBabyYamlDuelistEngine::getIdentifierSuffix](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/getIdentifierSuffix.md) &ndash; Returns a unique identifier based on the given number.
- [LightKitEditorBabyYamlDuelistEngine::matchSearch](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/matchSearch.md) &ndash; Checks if the given row match the filter defined by the other parameters, and returns whether it's a match or not.
- [LightKitEditorBabyYamlDuelistEngine::format](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/format.md) &ndash; Returns a formatted string.
- [LightKitEditorBabyYamlDuelistEngine::error](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_Editor\Light_Realist\DuelistEngine\LightKitEditorBabyYamlDuelistEngine<br>
See the source code of [Ling\Light_Kit_Editor\Light_Realist\DuelistEngine\LightKitEditorBabyYamlDuelistEngine](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Light_Realist/DuelistEngine/LightKitEditorBabyYamlDuelistEngine.php)



SeeAlso
==============
Previous class: [LightKitEditorRealformSuccessHandler](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Light_Realform/SuccessHandler/LightKitEditorRealformSuccessHandler.md)<br>Next class: [LightKitEditorService](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md)<br>
