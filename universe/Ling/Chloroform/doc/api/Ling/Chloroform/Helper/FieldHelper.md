[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The FieldHelper class
================
2019-04-10 --> 2019-04-29






Introduction
============

The FieldHelper class.



Class synopsis
==============


class <span class="pl-k">FieldHelper</span>  {

- Methods
    - public static [getDefaultIdByLabel](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getDefaultIdByLabel.md)(string $label) : string
    - public static [getDefaultErrorNameByLabelOrId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getDefaultErrorNameByLabelOrId.md)(string $label = null, string $id = null) : string
    - public static [getFieldValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getFieldValue.md)(string $fieldId, array $values) : mixed | null
    - public static [getHtmlNameById](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getHtmlNameById.md)(string $fieldId) : string

}






Methods
==============

- [FieldHelper::getDefaultIdByLabel](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getDefaultIdByLabel.md) &ndash; Returns the default [field id](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-field-id) from the given label.
- [FieldHelper::getDefaultErrorNameByLabelOrId](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getDefaultErrorNameByLabelOrId.md) &ndash; used in an error message) from the given label and id.
- [FieldHelper::getFieldValue](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getFieldValue.md) &ndash; or null if it doesn't exist.
- [FieldHelper::getHtmlNameById](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Helper/FieldHelper/getHtmlNameById.md) &ndash; Returns the html name from a field id.





Location
=============
Ling\Chloroform\Helper\FieldHelper


SeeAlso
==============
Previous class: [WarningFormNotification](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/FormNotification/WarningFormNotification.md)<br>Next class: [AbstractMinMaxValidator](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Validator/AbstractMinMaxValidator.md)<br>
