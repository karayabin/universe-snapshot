[Back to the Ling/Chloroform_HydrogenRenderer api](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer.md)<br>
[Back to the Ling\Chloroform_HydrogenRenderer\HydrogenRenderer class](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer.md)


HydrogenRenderer::printTimeField
================



HydrogenRenderer::printTimeField — Prints the given time field.




Description
================


public [HydrogenRenderer::printTimeField](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer/printTimeField.md)(array $field) : void




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








See Also
================

The [HydrogenRenderer](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer.md) class.

Previous method: [printDateField](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer/printDateField.md)<br>Next method: [printDateTimeField](https://github.com/lingtalfi/Chloroform_HydrogenRenderer/blob/master/doc/api/Ling/Chloroform_HydrogenRenderer/HydrogenRenderer/printDateTimeField.md)<br>

