[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\FieldInterface class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md)


FieldInterface::toArray
================



FieldInterface::toArray — Returns the array representation of the field.




Description
================


abstract public [FieldInterface::toArray](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/toArray.md)() : array




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
See the source code for method [FieldInterface::toArray](https://github.com/lingtalfi/Chloroform/blob/master/Field/FieldInterface.php#L102-L102)


See Also
================

The [FieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface.md) class.

Previous method: [getValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FieldInterface/getValue.md)<br>

