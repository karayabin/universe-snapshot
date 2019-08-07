[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)<br>
[Back to the Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil class](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil.md)


LightAjaxFileUploadManagerRenderingUtil::printField
================



LightAjaxFileUploadManagerRenderingUtil::printField — Prints the html field using the given form, and assuming the js file uploader client (aka fileUploader) is used.




Description
================


public [LightAjaxFileUploadManagerRenderingUtil::printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printField.md)(string $fieldName, Ling\Chloroform\Form\Chloroform $form, array $options = []) : void




Prints the html field using the given form, and assuming the js file uploader client (aka fileUploader) is used.
This also uses the bootstrap4 framework.

The available options are:
- sizeClass: string=w100 the css class to add to the ".file-uploader-dropzone" element.




Parameters
================


- fieldName

    

- form

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxFileUploadManagerRenderingUtil::printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Util/LightAjaxFileUploadManagerRenderingUtil.php#L127-L164)


See Also
================

The [LightAjaxFileUploadManagerRenderingUtil](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil.md) class.

Previous method: [printJavascript](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printJavascript.md)<br>

