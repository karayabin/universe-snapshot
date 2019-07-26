[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Helper\FieldHelper class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper.md)


FieldHelper::getFieldValue
================



FieldHelper::getFieldValue — or null if it doesn't exist.




Description
================


public static [FieldHelper::getFieldValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getFieldValue.md)(string $fieldId, array $values) : mixed | null




Returns the value of the field in the given values array,
or null if it doesn't exist.

Note: the null state for non-existent fields might actually be used by
checkbox validators.




Parameters
================


- fieldId

    

- values

    


Return values
================

Returns mixed | null.








Source Code
===========
See the source code for method [FieldHelper::getFieldValue](https://github.com/lingtalfi/Chloroform/blob/master/Helper/FieldHelper.php#L61-L64)


See Also
================

The [FieldHelper](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper.md) class.

Previous method: [getDefaultErrorNameByLabelOrId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getDefaultErrorNameByLabelOrId.md)<br>Next method: [getHtmlNameById](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getHtmlNameById.md)<br>

