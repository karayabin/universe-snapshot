Light kit admin js environment
================
2019-09-26


In light kit admin, we embrace javascript and jquery altogether.

We also embrace bootstrap, but that's a little bit irrelevant to this discussion.


We provide a js api to deal with javascript related problems that a light kit admin developer might encounters.




The js api is named LightKitAdminEnvironment, and exposes some static methods:


- toast(title, body, type), creates a toast notification on the fly



Preparation
---------

Before you can use the light kit admin js environment helper, we need to prepare our layout.

If you want to use the toast method:

- create a an empty div which will contain all the toasts, and assign the id="lka-toasts-zone" attribute to it 



