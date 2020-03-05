Light_AjaxHandler events
===============
2019-11-11




Light_AjaxHandler provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- Light_AjaxHandler.on_controller_exception_caught: triggered from the LightAjaxHandlerController->handle method
        when an exception is caught.
        The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) instance with an **exception** variable containing the caught exception. 