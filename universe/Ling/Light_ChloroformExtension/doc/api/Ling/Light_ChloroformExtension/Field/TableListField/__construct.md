[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Field\TableListField class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md)


TableListField::__construct
================



TableListField::__construct — Builds the AbstractField instance.




Description
================


public [TableListField::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/__construct.md)(?array $properties = []) : void




Builds the AbstractField instance.


The properties array should always contain at least the label for fields with label
(almost every field except the submit field and some other rare fields).



The properties array can contain the following (see corresponding properties
in this class for more details):

- label
- id (if not set, derived from the label)
- hint
- errorName (if not set, derived from the label)
- value

It can also contain other properties that a field wants to provide to the rendering objects.
For instance: class, cols (for text area), ...




Parameters
================


- properties

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [TableListField::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableListField.php#L42-L58)


See Also
================

The [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md) class.

Next method: [setForm](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setForm.md)<br>

