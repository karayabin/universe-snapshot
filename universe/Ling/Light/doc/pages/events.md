Light events
=============
2019-11-06 -> 2020-06-11


Note: we use the [Light_Events](https://github.com/lingtalfi/Light_Events) service under the hood.


The Core/Light will dispatch the following events:


- **Light.on_route_found**: when a route matched. 
    The argument is a [Light_Event](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) object 
    with the following variables:
    - **route**: the matching [route](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md) array
    
- **Light.on_exception_caught**: when an exception is caught. The argument is a [Light_Event](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) object
    with the following variables:
    - **exception**: the caught exception.

    Plugins can set a response to return to the user by setting the **httpResponse** variable (in the LightEvent instance).
    The response must be an [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) instance.
    <br>We recommend that plugins that handle generic exceptions have a lower priority, and plugins that handle
    more specific exceptions have a higher priority by contrast.
        
- **Light.on_unhandled_exception_caught**: triggered when an exception is caught but not handled by a third party plugin. 
    This event can be used to log the unhandled exceptions for instance.
    The data is a [Light_Event](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) object
    with the following variables:
    - **exception**: the caught exception.
        
- **Light.initialize_1**: triggered at the beginning of the run method. The goal is to allow plugins to trigger their initialization routine.
    The data is a [Light_Event](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) object with no particular variables attached to it.
- **Light.end_routine**: triggered at the end of the run method. The goal is to allow plugins to trigger their end routine.
    The data is a [Light_Event](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) object 
    with the following variables:
    - **route**: array|false, the matching [route](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md) array, or false if no route matched      

 
 
Events naming convention
--------------
 
For name consistency across the different light plugins, we recommend that plugin authors
use the following naming convention for naming events:

- eventName: {pluginName}.{event_name}

With:
- {pluginName}: the plugin name in [pascal case](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#pascalcase) 
- {event_name}: the event name in [snake case](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#snakecase) 






How to debug events
------------
2020-06-11


The Light instance uses the [Light_Events](https://github.com/lingtalfi/Light_Events) plugin,
which provides a debug version of its main class.

In the service configuration for the **Light_Events** plugin, use the debug class (**DebugLightEventsService**)
instead of the regular one.

Now you should be able to see all the listeners called by the **Light_Events** plugin in your debug log 
(**app/log/light_log.log** by default).











