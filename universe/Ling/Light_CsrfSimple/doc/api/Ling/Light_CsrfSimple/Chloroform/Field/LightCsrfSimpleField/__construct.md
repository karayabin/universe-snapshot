[Back to the Ling/Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md)<br>
[Back to the Ling\Light_CsrfSimple\Chloroform\Field\LightCsrfSimpleField class](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField.md)


LightCsrfSimpleField::__construct
================



LightCsrfSimpleField::__construct — Builds the AbstractField instance.




Description
================


public [LightCsrfSimpleField::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/__construct.md)(?array $properties = []) : void




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
See the source code for method [LightCsrfSimpleField::__construct](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/Chloroform/Field/LightCsrfSimpleField.php#L27-L31)


See Also
================

The [LightCsrfSimpleField](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField.md) class.

Next method: [getValue](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple/Chloroform/Field/LightCsrfSimpleField/getValue.md)<br>

