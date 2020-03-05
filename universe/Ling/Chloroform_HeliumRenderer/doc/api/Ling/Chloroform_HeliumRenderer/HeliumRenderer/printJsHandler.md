[Back to the Ling/Chloroform_HeliumRenderer api](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer.md)<br>
[Back to the Ling\Chloroform_HeliumRenderer\HeliumRenderer class](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer.md)


HeliumRenderer::printJsHandler
================



HeliumRenderer::printJsHandler — and some fields behaviours.




Description
================


public [HeliumRenderer::printJsHandler](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printJsHandler.md)(?array $options = null) : void




Prints the javascript code to handle the validation of the form,
and some fields behaviours.

See the [Chloroform toArray method](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md) for more info about the fields structure.

The options are all mandatory, and all pertains to the javascript handler:

- displayErrorSummary: bool. Whether to display the error summary.
- displayInlineErrors: bool. Whether to display the inline errors.
- showOnlyFirstError: bool. Whether to display the first error or all errors for each field (in case a field has multiple errors).
- useValidation: bool. Whether to use the js validation system at all.




Parameters
================


- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [HeliumRenderer::printJsHandler](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/HeliumRenderer.php#L1088-L1110)


See Also
================

The [HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer.md) class.

Previous method: [printDecorativeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printDecorativeField.md)<br>Next method: [printCustomScripts](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printCustomScripts.md)<br>

