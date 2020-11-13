Light Events, conception notes
==================
2019-10-31 -> 2020-11-06




Why (skip this blabla)?
----------
2019-10-31


I thought for a long time before deciding to not implement an orm system.
One cool thing with having tables as objects though is the ability to add hooks into your objects, so that for instance
when an user is created (i.e. a row is inserted in the user table), your application can do something about it.

Well, I figured I would do this manually (which might be even more flexible), hence I need the light events system.





What
---------
2019-10-31


As you can probably guess from the name, this is just an event dispatching system.

Nothing special.

I also implemented a priority system, and a stop propagation system too.



Logs
-----------
2020-06-25 -> 2020-11-06


We believe in logs.

You can use the following service configuration options:

- debugDispatch: bool=false, whether to log when we dispatch an event.
- debugCall:  bool=false, whether to log when we trigger a listener.
- formattingDispatch: string=null, the [bashhtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) formatting to wrap the debugDispatch messages with. 
- formattingCall: string=null, the bashhtml formatting to wrap the debugCall messages with. 


Examples of formatting: 

- white
- white:bgRed



We use the [Light_Logger](https://github.com/lingtalfi/Light_Logger) service under the hood, with the channel: **events.debug**.





Dynamic events registration
------------
2020-08-14 -> 2020-08-17


As an alternative to registering events statically, which is very fast but usually registers more listeners than the one actually used,
our service also supports dynamic registration, which is much slower in action since its based on the filesystem, but has the benefit of actually
calling only the relevant listeners.

We recommend using static registration for events that are called often, and dynamic registration for events that occur more occasionally.
This recommendation is obviously very subjective, and depends on your application and your mindset.

To use our **dynamic registration** system, you need to know the event name first, and then you create a [babyYaml](https://github.com/lingtalfi/BabyYaml) file at the root of the **appDir/config/dynamic/Light_Events/$eventName** directory.

For now, we only will parse direct children of this directory (this idea is very new as I'm writing those lines).


By convention, plugin authors create a file using with their plugin names, because then it allows them to use automation tool (such as the [kaos suite](https://github.com/lingtalfi/LingTalfi/tree/master/Kaos) for instance).


So for instance, typically a plugin named **Light_MyPlugin** who wants to listen to the **Light_Database.on_lun_user_notification_create** event will create a structure like this one:

- appDir/config/dynamic/Light_Events/Light_Database.on_lun_user_notification_create/Light_MyPlugin.byml


However, this is just a convention, and as the app maintainer, you can create your own events registration nuggets very easily. All the following files are valid and would be registered dynamically:

   
- appDir/config/dynamic/Light_Events/Light_Database.on_lun_user_notification_create/Boris.byml
- appDir/config/dynamic/Light_Events/Light_Database.on_lun_user_notification_create/The_App_Maintainer.byml
- appDir/config/dynamic/Light_Events/Light_Database.on_lun_user_notification_create/whatever.byml


As for the content of that babyYaml file, we expect an array of callables.

Each callable must be written in a special format, which you can think of as the [light execute notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md).



So for instance a file could contain something like this:

```yaml
- @some_service->method(ee,ff)
- @some_service2->method(ee,ff)
```


There are some extra variables available to you:

- data, mixed: the event data passed to the event (often in the form of a Light_Event instance)
- event, string: the name of the event being fired
- dynamicPath, string: the path to the file containing the registration nuggets
 
 
To access them from your method call, by convention your argument must have exactly the same name as the variable you want to use.
Note that those variables names are thus reserved by our service.


So for instance if you write this:

```yaml
- @some_service->method(ee,ff, data, event)
```

Then our service will call the **some_service->method** method with the following arguments:


- ee
- ff
- data
- event


The stopPropagation flag is also available, but not as a variable.
Instead, by default, the propagation doesn't stop, and your method can stop the propagation by returning 
the special string **LightEventsService::STOP_PROPAGATION**.



The dynamically registered listeners are executed *AFTER* the one registered statically.















 




