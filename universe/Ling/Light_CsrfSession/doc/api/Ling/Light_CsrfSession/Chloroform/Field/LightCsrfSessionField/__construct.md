[Back to the Ling/Light_CsrfSession api](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession.md)<br>
[Back to the Ling\Light_CsrfSession\Chloroform\Field\LightCsrfSessionField class](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField.md)


LightCsrfSessionField::__construct
================



LightCsrfSessionField::__construct — Builds the AbstractField instance.




Description
================


public [LightCsrfSessionField::__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField/__construct.md)(?array $properties = []) : void




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
See the source code for method [LightCsrfSessionField::__construct](https://github.com/lingtalfi/Light_CsrfSession/blob/master/Chloroform/Field/LightCsrfSessionField.php#L23-L27)


See Also
================

The [LightCsrfSessionField](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField.md) class.

Next method: [getValue](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession/Chloroform/Field/LightCsrfSessionField/getValue.md)<br>

