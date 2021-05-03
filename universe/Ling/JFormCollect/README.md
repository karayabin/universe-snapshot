JFormCollect
===========
2021-04-05



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
2021-04-05


Add the **form-collect** css class to the controls you want to collect the data of.
Also, make sure they have a **name** html attribute.

Note: so far, the recognized controls are:

- input text
- select



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

- 1.0.1 -- 2021-04-05

    - fix collect method not returning the map
    
- 1.0.0 -- 2021-04-05

    - initial commit