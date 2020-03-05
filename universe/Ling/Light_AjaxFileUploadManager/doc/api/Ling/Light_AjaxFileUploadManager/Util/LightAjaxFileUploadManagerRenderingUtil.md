[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)



The LightAjaxFileUploadManagerRenderingUtil class
================
2019-08-01 --> 2020-02-21






Introduction
============

The LightAjaxFileUploadManagerRenderingUtil class.

This class helps rendering some of the gui parts involved in a file upload system.
In this particular class, we assume that the [jFileUploader](https://github.com/lingtalfi/jFileUploader) js client is used,
and we provide method to help its implementation.


We also assume that the [Chloroform](https://github.com/lingtalfi/Chloroform) planet is used to provide the form fields.
Last but not least we also assume that [Bootstrap4](https://getbootstrap.com/docs/4.0/getting-started/introduction/) is used.



Class synopsis
==============


class <span class="pl-k">LightAjaxFileUploadManagerRenderingUtil</span>  {

- Properties
    - protected string [$suffix](#property-suffix) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/__construct.md)() : void
    - public [setSuffix](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setSuffix.md)(string $suffix) : void
    - public [setContainer](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [printJavascript](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printJavascript.md)(array $field) : void
    - public [printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printField.md)(array $field, ?array $options = []) : void

}




Properties
=============

- <span id="property-suffix"><b>suffix</b></span>

    This property holds the suffix for this instance.
    It's the suffix to add to the css ids used by this class.
    This is mainly useful only if you use the fileUploader plugin multiple times on the same page (i.e. if you have
    multiple ajax input fields on the same page).
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightAjaxFileUploadManagerRenderingUtil::__construct](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/__construct.md) &ndash; Builds the LightAjaxFileUploadManagerRenderingUtil instance.
- [LightAjaxFileUploadManagerRenderingUtil::setSuffix](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setSuffix.md) &ndash; Sets the suffix.
- [LightAjaxFileUploadManagerRenderingUtil::setContainer](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/setContainer.md) &ndash; Sets the container.
- [LightAjaxFileUploadManagerRenderingUtil::printJavascript](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printJavascript.md) &ndash; Prints the javascript code necessary to instantiate a fully configured fileUploader js object.
- [LightAjaxFileUploadManagerRenderingUtil::printField](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Util/LightAjaxFileUploadManagerRenderingUtil/printField.md) &ndash; Prints the html field using the given field array, and assuming the js file uploader client (https://github.com/lingtalfi/jFileUploader) is used.





Location
=============
Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil<br>
See the source code of [Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Util/LightAjaxFileUploadManagerRenderingUtil.php)



SeeAlso
==============
Previous class: [LightAjaxFileUploadManagerService](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Service/LightAjaxFileUploadManagerService.md)<br>
