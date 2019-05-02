Light_Kit_Demo
===========
2019-04-25


WORK IN PROGRESS, COME BACK IN A FEW MONTHS...



Some demonstration of how to use Light_Kit with concrete websites.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Demo
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Demo api](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/doc/api/Ling/Light_Kit_Demo.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [The demos](#the-demos)
- [What is this?](#what-is-this)
- [The prototype organization](#the-prototype-organization)
- [History Log](#history-log)


The demos
===========

Checkout the [5 Light Kit demos](http://lingtalfi.com/Light_Kit_Demo).

All the demos are themes created by Brad Traversy in this course [Bootstrap 4 From Scratch With 5 Projects ](https://www.udemy.com/bootstrap-4-from-scratch-with-5-projects/).

The 5 websites use Bootstrap 4 and are responsive.

Their names are:

- LoopLab
- Mizuxe
- Glozzom
- Blogen
- PortfolioGrid




What is this?
============


The goal of this [planet](https://github.com/karayabin/universe-snapshot) is to help anybody creating website with [Light_Kit](https://github.com/lingtalfi/Light_Kit).

It does so by providing 5 examples of websites (in this case all created with boostrap 4), along with the source code.


The methodology I've used for those demos is the following:

- create a prototype website first (optional)
- then create the real website 


The prototype website is using only prototype widgets.
A prototype widget is just a static html widget, it's not administrable with php, so you can't change its variables.

The real website is the version with working widgets (php driven widgets).

 
This planet is still a work in progress, and I'm currently working on the real websites versions, but 
the prototype versions are done already.

The benefit for me to create a prototype version, is that I can show you the demos right now, without you
having to wait for me to create all php widgets (which might take quite some time).



The prototype organization
==============

In this section, I'll discuss the general organization of a prototype website in a [Light](https://github.com/lingtalfi/Light) application,
using [Light_Kit].

Basically, all **Light_Kit** does is providing us with a **kit** service to use in our **Light** application.
 
The kit service by default uses a [BabyYaml](https://github.com/lingtalfi/BabyYaml) configuration storage which allows us to store all of our configuration in 
the **config/kit/pages** directory of our app.



Actually, in the [map directory of this repository](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map), you'll find all the files used for the demos.


Those files are copy/pasted in the application as is.


If we take the LoopLab demo for instance, the structure looks like this:


- [config/kit/pages/Light_Kit_Demo/looplab/prototype/looplab_home.byml](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/assets/map/config/kit/pages/Light_Kit_Demo/looplab/prototype/looplab_home.byml)
- [templates/Light_Kit_Demo/layouts/prototype/looplab_main_layout.php](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/assets/map/templates/Light_Kit_Demo/layouts/looplab/prototype/looplab_main_layout.php)
- [templates/Light_Kit_Demo/widgets/prototype/looplab/](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map/templates/Light_Kit_Demo/widgets/prototype/looplab)
- [templates/Light_Kit_Demo/widgets/prototype/looplab/looplab_footer_with_contact_us_button.php](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/assets/map/templates/Light_Kit_Demo/widgets/prototype/looplab/looplab_footer_with_contact_us_button.php)
- [www/plugins/Light_Kit_Demo/looplab](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map/www/plugins/Light_Kit_Demo/looplab)




Notice that this structure respects the [recommended Light app structure](https://github.com/lingtalfi/Light/blob/master/doc/pages/light-application-recommended-structure.md).

  


The page configuration file (looplab_home.byml) is a regular [kit page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array).

Then the layout (looplab_main_layout.php) is the skeleton of the page. We can see that it contains a printZone statement, which
is one of the most useful method to use in a layout, allowing us to print a zone (group of widgets).


Then the **templates/Light_Kit_Demo/widgets/prototype/looplab** directory contains all the prototype widgets used for the LoopLab theme.
 
And last but not least the **www/plugins/Light_Kit_Demo/looplab** directory contains all the assets used for the LoopLab theme.


On the server side, I just use regular Light code, here is my code for the looplab demo:


```php
<?php


use Ling\Light\Core\Light;
use Ling\Light\Helper\ServiceContainerHelper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


require_once __DIR__ . "/../../../universe/bigbang.php"; // activate universe






$appDir = __DIR__ . "/../../..";
$container = ServiceContainerHelper::getInstance($appDir, [
    'type' => 'red',
]);

$light = new Light();
$light->setDebug(true);
$light->setContainer($container);


$light->registerRoute("/Light_Kit_Demo", function (LightServiceContainerInterface $service) {
    return $service->get("kit")->renderPage('Light_Kit_Demo/looplab/prototype/looplab_home');
});
$light->run();

```


Note that since I was using a server of mine and I wanted to use only one url namespace for all demos,
I used $_GET variables to navigate around the demos (site and page variables to be more precise),
but that's just specific to my server, you can create one url per page if you want, or whatever.




History Log
=============

- 0.5.0 -- 2019-05-01

    - update the README.md with online demos  
    
- 0.4.0 -- 2019-04-29

    - adjust active navigation item  
    
- 0.3.0 -- 2019-04-29

    - adjust paths for multi-pages prototypes  
    
- 0.2.0 -- 2019-04-29

    - add prototypes for 5 projects 
    
- 0.1.0 -- 2019-04-26

    - add assets for looplab prototype version 

- 0.0.0 -- 2019-04-25

    - initial commit