[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md)


LightRealistBaseListActionHandler::decorateGenericActionItemByAssets
================



LightRealistBaseListActionHandler::decorateGenericActionItemByAssets — the calling class source file.




Description
================


protected [LightRealistBaseListActionHandler::decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/decorateGenericActionItemByAssets.md)(string $actionName, array &$item, string $dir, ?array $options = []) : void




Decorates the given [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md) using mostly asset files found around
the calling class source file.


The available options are:

- modalVariables: an array of variables to pass to the modal template (if you use a modal template only).
             Inside the modal template, the variables are accessible via the $z variable (which represents this modalVariables array).
- generateAjaxParams: bool=true, whether to automatically generate ajax parameters. See the code for more info.
                     The ajax parameters basically will be transmitted to the js handler via the **params** argument of the f callable.
- jsActionName: the name of the action name to use to detect js files.
                 I used this when I had different action names pointing to the same js handler (export_to_csv, export_to_html, export_to_pdf, ...,
                 all pointing to a single export_to_file handler).
- params: array, some extra parameters to pass to add to the item params




Parameters
================


- actionName

    

- item

    

- dir

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistBaseListActionHandler::decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistBaseListActionHandler.php#L88-L141)


See Also
================

The [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/setContainer.md)<br>Next method: [getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getTableNameByRequestId.md)<br>

