[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)



The LightAjaxFileUploadManagerRenderingUtil class
================
2019-08-01 --> 2019-09-20






Introduction
============

The LightAjaxFileUploadManagerRenderingUtil class.

This class helps rendering some of the gui parts involved in a file upload system.
In this particular class, we assume that the [jsFileUploader](https://github.com/lingtalfi/jsFileUploader) js client is used,
and we provide method to help its implementation.


We also assume that the [Chloroform](https://github.com/lingtalfi/Chloroform) planet is used to provide the form fields.
Last but not least we also assume that [Bootstrap4](https://getbootstrap.com/docs/4.0/getting-started/introduction/) is used.



Class synopsis
==============


class <span class="pl-k">LightAjaxFileUploadManagerRenderingUtil</span>  {

- Properties
    - protected string [$suffix](#property-suffix) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/__construct.md)() : void
    - public [setSuffix](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setSuffix.md)(string $suffix) : void
    - public [printJavascript](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printJavascript.md)(string $fieldName, Ling\Chloroform\Form\Chloroform $form) : void
    - public [printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printField.md)(string $fieldName, Ling\Chloroform\Form\Chloroform $form, array $options = []) : void

}




Properties
=============

- <span id="property-suffix"><b>suffix</b></span>

    This property holds the suffix for this instance.
    It's the suffix to add to the css ids used by this class.
    This is mainly useful only if you use the fileUploader plugin multiple times on the same page (i.e. if you have
    multiple ajax input fields on the same page).
    
    



Methods
==============

- [LightAjaxFileUploadManagerRenderingUtil::__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/__construct.md) &ndash; Builds the LightAjaxFileUploadManagerRenderingUtil instance.
- [LightAjaxFileUploadManagerRenderingUtil::setSuffix](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setSuffix.md) &ndash; Sets the suffix.
- [LightAjaxFileUploadManagerRenderingUtil::printJavascript](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printJavascript.md) &ndash; Prints the javascript code necessary to instantiate a fully configured fileUploader js object.
- [LightAjaxFileUploadManagerRenderingUtil::printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printField.md) &ndash; Prints the html field using the given form, and assuming the js file uploader client (aka fileUploader) is used.





Location
=============
Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil<br>
See the source code of [Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Util/LightAjaxFileUploadManagerRenderingUtil.php)



SeeAlso
==============
Previous class: [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)<br>
