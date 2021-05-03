Events
===========
2020-10-29 -> 2021-03-22







**Light_HttpError** provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- **Ling.Light_SimpleHttpServer.on_controller_exception_caught**: triggered from the LightSimpleHttpServerController->render method when an exception is caught.
        The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) instance with an **exception** variable containing the caught exception. 