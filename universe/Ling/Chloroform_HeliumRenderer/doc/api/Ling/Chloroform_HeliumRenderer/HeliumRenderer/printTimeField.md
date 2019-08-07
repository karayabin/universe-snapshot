[Back to the Ling/Chloroform_HeliumRenderer api](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer.md)<br>
[Back to the Ling\Chloroform_HeliumRenderer\HeliumRenderer class](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer.md)


HeliumRenderer::printTimeField
================



HeliumRenderer::printTimeField — Prints the given time field.




Description
================


public [HeliumRenderer::printTimeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printTimeField.md)(array $field) : void




Prints the given time field.

See the [Chloroform toArray method](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/toArray.md) and the [TimeField class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/TimeField.md) for more info about the field structure.

In this particular field, we split the time in 2 or 3 parts (depending whether we use seconds),
and when the user submits the form, we recompile the right time value and inject it into an hidden input tag,
so that it gets posted.




Parameters
================


- field

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [HeliumRenderer::printTimeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/HeliumRenderer.php#L593-L667)


See Also
================

The [HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer.md) class.

Previous method: [printDateField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printDateField.md)<br>Next method: [printDateTimeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printDateTimeField.md)<br>

