[Back to the Ling/Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md)



The FileUploadController class
================
2019-08-01 --> 2019-10-31






Introduction
============

The FileUploadController class.

This class is meant to be the entry point of all ajax uploaded files in an application.

An ajax entry point for file upload being a good csrf attack target, this class handles csrf protection.


What's the main idea of this class?
-------------------
The idea of this class is to have one service to handle all ajax file uploads of your light application.
So this service waits for your ajax file uploads, and when your app sends one, it takes care of it.

How?

Well first there is a communication protocol defined by this service.
This communication protocol is called [AjaxFileUpload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md) and must be implemented in order for this service
to work properly.
And this class, along with other classes from this plugin, help implement this protocol.




php settings
------------
You should ensure that the following directives are set accordingly with your application need:

- upload_max_filesize: the max file size (for an individual file)
- post_max_size: the max size of the data (all files weights combined)



Class synopsis
==============


class <span class="pl-k">FileUploadController</span> extends [LightController](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [uploader](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Controller/FileUploadController/uploader.md)() : void

- Inherited methods
    - public LightController::__construct() : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface

}






Methods
==============

- [FileUploadController::uploader](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Controller/FileUploadController/uploader.md) &ndash; according to the AjaxFileUpload protocol described in this class description.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.





Location
=============
Ling\Light_AjaxFileUploadManager\Controller\FileUploadController<br>
See the source code of [Ling\Light_AjaxFileUploadManager\Controller\FileUploadController](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/Controller/FileUploadController.php)



SeeAlso
==============
Next class: [LightAjaxFileUploadManagerException](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager/Exception/LightAjaxFileUploadManagerException.md)<br>
