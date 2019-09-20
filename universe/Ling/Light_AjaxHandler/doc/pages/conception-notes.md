Light Ajax Handler, conception notes
===================
2019-09-19



There is a potential plethora of plugins that will be created for the light framework.

Observing that some plugins create their own services, which includes the creation of a controller,
and a new route that points to that controller, I can only fear that we will end up with 
a plethora of routes.

That's not a good thing.


I propose to use only one entry point for all ajax services, alike there is only one entry point
(aka front controller) for the main application.


Plugins who adhere my point of view can use the **Light_AjaxHandler** plugin, and subscribe to 
its service in order to reduce the number of routes being created.

Plus, some of the behaviour might be factorized (meaning development time saved), as we might see.



So, the main idea is:

- this plugin provides the only route for all ajax services.
    The route url will be for instance: **/light-ajax-handler**
    
    
Then we will use the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol)
as the base of our communication, since it has been proved very flexible.



I thought this document would be longer, but that's pretty much all I have to say for now.

Time for me to implement that idea!
    




