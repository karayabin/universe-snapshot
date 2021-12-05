Light_Logger Conception notes
=================
2019-08-01 -> 2021-06-25


A **logger system** for the light framework.


This **logger system** allow light plugins to send/listen **messages** from **channels**.

A plugin can create any **channel** it wants. 

A **channel** is basically an arbitrary string.


A **message** can be anything: an object, a string, an array, etc...



The asterisk channel
=========
2021-06-25

The special channel "*" is a shortcut representing all channels.

When a plugin listens to the "*" channel, it basically means that it listens to every message sent on every channel.

This feature is only available with the [close registration system](#close-vs-open-registration-system).


The minus property
---------
2021-06-25


Sometimes, a plugin wants to listen to all channels, except for one or two.

It's possible to do so using the **minus property**.

This is only available with our [close registration system](#close-vs-open-registration-system).



Close vs open registration system
==========
2021-06-25

We provide two ways for light plugin authors to subscribe to our service:

- close registration system
- open registration system


We recommend using the **open system** in general, as it tends to alleviate the fingerprint of the container.

You would use the close system if you have special needs, such as if your plugin wants to listen to the [asterisk channel](#the-asterisk-channel) for instance.


With the **close registration system**, your plugin directly calls our **addListener** method during the container init.

See more info in the [light close registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md).


Note that both systems work in parallel, which means you could add listeners for the same channel with both the close and open registration systems. 





The open registration system
--------
2021-06-25


Here is how we designed our [open registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md):

we have all channels stored in [babyYaml](https://github.com/lingtalfi/BabyYaml) files in the following **root dir**:

- $app/config/open/Ling.Light_Logger/channels


Then, each **channel** is represented by one **babyYaml** file with the same name, with the ".byml" file extension.

For instance, the channel "file_watcher.debug" would be represented by the following file (called **channel file**):

- $rootDir/file_watcher.debug.byml


Inside a **channel file**, we organize data like this:


```yaml
Ling.Light_FileWatcher:
    Ling.Light_FileWatcher.1:
        instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
        methods:
            configure:
                options:
                    file: ${app_dir}/log/file_watcher_debug.txt
    ...                    
...

```


Basically, each planet has ONE entry keyed by its [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name).

In the example above, we can see how the **Ling.Light_FileWatcher** planet is taking the first (and only) entry.

Then, within its own entry, each planet declares listeners.

A listener is identified by an **instanceIdentifier** (Ling.Light_FileWatcher.1 in the example above).

The listener value is an array using the [sic notation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md) for creating the listener instance.

So, in the example above, the listener is basically an instance of the **Ling\Light_Logger\Listener\LightCleanableFileLoggerListener** class.
The **configure** method was called on this instance, with the file option set to **${app_dir}/log/file_watcher_debug.txt**.

Note that the **${app_dir}** shortcut is automatically resolved to the actual application directory.

This is a feature that we provide to mimic the way the sic notation is resolved inside the light container.


That's it.


From there, we instantiate the listener instance for you, and store it with the given **instanceIdentifier** for reusable purposes (but you shouldn't care about that).



Registering to the open system
---------
2021-06-25


To help plugin authors subscribe with our **open registration system**, we provide a helper class
that does the registration for you.

In order to use it, you need to follow this convention:

- create the following file:

    - config/data/$YourPlanetDotName/Ling.Light_Logger/listeners.byml
    

In it, put your listeners like this (each listener has its own top level entry):


```yaml
-
    channels: file_watcher.debug
    listener:
        instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
        methods:
            configure:
                options:
                    file: ${app_dir}/log/file_watcher_debug.txt


- ...
```







Common channels
---------
2021-06-25



I recommend using the following channels:

- **error**: the error channel is explained in the [error logging convention](https://github.com/lingtalfi/TheBar/blob/master/discussions/error-logging-convention.md) document.






















