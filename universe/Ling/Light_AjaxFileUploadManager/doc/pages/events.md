Light_AjaxFileUploadManager events
===============
2019-11-11




Light_AjaxFileUploadManager provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- Light_AjaxFileUploadManager.on_controller_exception_caught: triggered from the FileUploadController->uploader method
        when an exception is caught.
        The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) instance with
         an **exception** variable containing the caught exception. 