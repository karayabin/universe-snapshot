Light plugin
=============
2019-04-05


A Light plugin is a [planet](https://github.com/karayabin/universe-snapshot) that once installed
provides new functionality to the Light framework immediately.


How does it work?
-------------

This basically works by using the services container provided by the Light framework.
The configuration of the services container lies in the **config/services** directory at the root of the Light application.

When the planet/plugin installs itself, it also copies its services configuration files to the **config/services**
directory of the Light application, thus enhancing the Light application instantly.


