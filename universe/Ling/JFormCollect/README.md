JFormCollect
===========
2021-04-05 -> 2021-07-29



A tool to collect data from a form.

This depends on [jquery](https://jquery.com/).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.JFormCollect
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JFormCollect
```

Or just download it and place it where you want otherwise.





How to use
===========
2021-04-05 -> 2021-07-29


Add the **form-collect** css class to the controls you want to collect the data of.
Also, make sure they have a **name** html attribute.

Note: so far, the recognized controls are:

- input text
- input password
- input hidden
- select
- custom controls (add data-type="custom", and data-name="whatever" to create a custom control)



Then call jquery, and our lib, and write this js:

```js 

var jMyContext = $("#some-element");

var formData = FormCollect.collect({
    context: jMyContext,
});

```


The options you pass to the **collect** method are:


- context: a jquery selection, the context in which to look for form controls to collect.
    By default, the $("body") will be used.








History Log
=============

- 1.0.8 -- 2021-07-29

    - add handling of custom controls

- 1.0.7 -- 2021-07-01

    - now throws an exception if the name of a control isn't defined
  
- 1.0.6 -- 2021-06-22

    - add handling of input=email type
  
- 1.0.5 -- 2021-06-14

    - add handling of checkbox type
  
- 1.0.4 -- 2021-06-11

    - add handling for hidden type

- 1.0.3 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.2 -- 2021-05-10

    - add handling for password type
    
- 1.0.1 -- 2021-04-05

    - fix collect method not returning the map
    
- 1.0.0 -- 2021-04-05

    - initial commit