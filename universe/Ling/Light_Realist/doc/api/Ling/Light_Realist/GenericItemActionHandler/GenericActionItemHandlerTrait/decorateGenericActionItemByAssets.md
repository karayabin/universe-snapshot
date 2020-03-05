[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\GenericItemActionHandler\GenericActionItemHandlerTrait class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait.md)


GenericActionItemHandlerTrait::decorateGenericActionItemByAssets
================



GenericActionItemHandlerTrait::decorateGenericActionItemByAssets — the calling class source file.




Description
================


protected [GenericActionItemHandlerTrait::decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/decorateGenericActionItemByAssets.md)(string $actionName, array &$item, string $requestId, string $dir, ?array $options = []) : void




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




Parameters
================


- actionName

    

- item

    

- requestId

    

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
See the source code for method [GenericActionItemHandlerTrait::decorateGenericActionItemByAssets](https://github.com/lingtalfi/Light_Realist/blob/master/GenericItemActionHandler/GenericActionItemHandlerTrait.php#L87-L131)


See Also
================

The [GenericActionItemHandlerTrait](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/setContainer.md)<br>Next method: [getTableNameByRequestId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/GenericItemActionHandler/GenericActionItemHandlerTrait/getTableNameByRequestId.md)<br>

