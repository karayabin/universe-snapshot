[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\RadioField class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/RadioField.md)


RadioField::__construct
================



RadioField::__construct — Builds the AbstractField instance.




Description
================


public [RadioField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/RadioField/__construct.md)(array $properties = []) : void




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
See the source code for method [RadioField::__construct](https://github.com/lingtalfi/Chloroform/blob/master/Field/RadioField.php#L30-L34)


See Also
================

The [RadioField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/RadioField.md) class.

Next method: [create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/RadioField/create.md)<br>

