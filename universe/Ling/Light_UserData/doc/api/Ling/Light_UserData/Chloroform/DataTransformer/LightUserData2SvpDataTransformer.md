[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserData2SvpDataTransformer class
================
2019-09-27 --> 2019-10-31






Introduction
============

The LightUserData2SvpDataTransformer class.


This implements the second step of the [2svp system](https://github.com/lingtalfi/TheBar/blob/master/discussions/ajax-file-upload.md#2-steps-validation-process).

Basically, this class assumes that the data to transform is a filename containing the .2svp extension.

It will move (i.e. rename) the file to the same filename without the .2svp extension.
It will also update the new filename in the luda_resource table in the database.



Class synopsis
==============


class <span class="pl-k">LightUserData2SvpDataTransformer</span> extends [BaseDataTransformer](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/BaseDataTransformer.md) implements [DataTransformerInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/DataTransformer/DataTransformerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer/__construct.md)() : void
    - public [transform](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer/transform.md)(&$value, array $postedData, Ling\Chloroform\Field\FieldInterface $field) : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : [LightUserData2SvpDataTransformer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer.md)

- Inherited methods
    - public static BaseDataTransformer::create() : static

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserData2SvpDataTransformer::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer/__construct.md) &ndash; Builds the LightUserData2SvpDataTransformer instance.
- [LightUserData2SvpDataTransformer::transform](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer/transform.md) &ndash; Transforms the given value if necessary.
- [LightUserData2SvpDataTransformer::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer/setContainer.md) &ndash; Sets the container.
- BaseDataTransformer::create &ndash; Returns a new instance of the class being invoked.





Location
=============
Ling\Light_UserData\Chloroform\DataTransformer\LightUserData2SvpDataTransformer<br>
See the source code of [Ling\Light_UserData\Chloroform\DataTransformer\LightUserData2SvpDataTransformer](https://github.com/lingtalfi/Light_UserData/blob/master/Chloroform/DataTransformer/LightUserData2SvpDataTransformer.php)



SeeAlso
==============
Previous class: [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface.md)<br>Next class: [ValidUserDataUrlValidator](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/Validator/ValidUserDataUrlValidator.md)<br>
