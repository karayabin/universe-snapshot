[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\DecorativeField class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField.md)


DecorativeField::toArray
================



DecorativeField::toArray — Returns the array representation of the field.




Description
================


public [DecorativeField::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/toArray.md)() : array




Returns the array representation of the field.
It should contain at least the following keys:


```yaml
- id: string                  # the field id
- label: string|null          # the label
- hint: string|null           # the hint (often used in placeholder)
- errorName: string           # the label to use in an error message
- value: mixed                # the value of the field. Could be null, an array or a scalar.
- htmlName: string            # the html name (often used in the name attribute of html tags)
- errors: array               # the error messages. Each error message is a string.
- className: string           # the name of the field class (this is addressed to renderers, so that they know how to render the field)
```




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [DecorativeField::toArray](https://github.com/lingtalfi/Chloroform/blob/master/Field/DecorativeField.php#L156-L170)


See Also
================

The [DecorativeField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField.md) class.

Previous method: [getFallbackValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/getFallbackValue.md)<br>Next method: [hasVeryImportantData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/DecorativeField/hasVeryImportantData.md)<br>

