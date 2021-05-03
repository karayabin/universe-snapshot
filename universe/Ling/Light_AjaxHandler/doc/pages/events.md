Light_AjaxHandler events
===============
2019-11-11 -> 2021-04-06




Light_AjaxHandler provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- **Ling.Light_AjaxHandler.on_handle_exception_caught**: triggered from the LightAjaxHandlerService->handleViaCallable method
        when an exception is caught.
        The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) instance with an **exception** variable containing the caught exception. 