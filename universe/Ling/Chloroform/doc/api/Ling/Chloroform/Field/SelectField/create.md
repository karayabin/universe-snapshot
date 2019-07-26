[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Field\SelectField class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField.md)


SelectField::create
================



SelectField::create — Builds and returns the instance.




Description
================


public static [SelectField::create](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField/create.md)(string $label, array $properties = []) : [SelectField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField.md)




Builds and returns the instance.


The properties is the same array as the properties from the parent class,
with the following additions:

- ?multiple: bool=false. Whether to use the html multiple attribute on the select tag.
     Note: if multiple is false, the value will be a string, and if mulitple is true,
     the value will be an array.




Parameters
================


- label

    

- properties

    


Return values
================

Returns [SelectField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField.md).








Source Code
===========
See the source code for method [SelectField::create](https://github.com/lingtalfi/Chloroform/blob/master/Field/SelectField.php#L65-L69)


See Also
================

The [SelectField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField/__construct.md)<br>Next method: [setItems](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/SelectField/setItems.md)<br>

