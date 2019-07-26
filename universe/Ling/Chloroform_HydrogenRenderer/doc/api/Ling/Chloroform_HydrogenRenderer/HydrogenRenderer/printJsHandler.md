[Back to the Ling/Chloroform_HydrogenRenderer api](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer.md)<br>
[Back to the Ling\Chloroform_HydrogenRenderer\HydrogenRenderer class](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer.md)


HydrogenRenderer::printJsHandler
================



HydrogenRenderer::printJsHandler — and some fields behaviours.




Description
================


public [HydrogenRenderer::printJsHandler](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer/printJsHandler.md)(array $options = null) : void




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
See the source code for method [HydrogenRenderer::printJsHandler](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/HydrogenRenderer.php#L806-L826)


See Also
================

The [HydrogenRenderer](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer.md) class.

Previous method: [printPasswordField](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer/printPasswordField.md)<br>Next method: [printInputField](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer/printInputField.md)<br>

