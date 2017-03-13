Kamille
===========
2017-03-12



My first implementation of the [kam framework](https://github.com/lingtalfi/kam).

Kamille is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
=============

```bash
uni import Kamille
```


Once you've installed Kamille, you should create the following classes at your application level:

- Services\Hooks: this is the Hooks class for your modules 
- Services\X: the service container in kamille






Getting started
===================

You should start by reading the implementation notes in the **doc** directory.
That's the only doc available so far.

Then, the examples below might get you going.



Example index.php controller
--------------------------------


```php
<?php


use Kamille\Architecture\Application\Web\WebApplication;
use Kamille\Architecture\Request\Web\HttpRequest;
use Kamille\Architecture\RequestListener\Web\ControllerExecuterRequestListener;
use Kamille\Architecture\RequestListener\Web\ResponseExecuterListener;
use Kamille\Architecture\RequestListener\Web\RouterRequestListener;
use Kamille\Architecture\Router\Web\StaticPageRouter;

require_once __DIR__ . "/../init.php";


WebApplication::inst()
    ->addListener(RouterRequestListener::create()->addRouter(StaticPageRouter::create()))
    ->addListener(ControllerExecuterRequestListener::create())
    ->addListener(ResponseExecuterListener::create())
    ->handleRequest(HttpRequest::create());

```


Example MVC code (should be inside a Controller)
--------------------------------

First, create a theme folder containing the following files (find it in this repo in the **doc** directory):

- theme/
    - layout/
        - home.tpl.php 
    - widget/
        - group/
            - group.tpl.php
        - kart/ 
            - kart.tpl.php
        - meteo/ 
            - meteo.tpl.php
            
            
Then, you can use this example code:
            
            
```php
<?php


use Kamille\Ling\Z;
use Kamille\Mvc\Layout\HtmlLayout;
use Kamille\Mvc\Loader\FileLoader;
use Kamille\Mvc\Renderer\PhpLayoutRenderer;
use Kamille\Mvc\Widget\GroupWidget;
use Kamille\Mvc\Widget\Widget;

require_once __DIR__ . "/../init.php";


$wloader = FileLoader::create()->addDir(Z::appDir() . "/theme/widget");
$commonRenderer = PhpLayoutRenderer::create();


//HtmlPageHelper::$title = "Coucou";
//HtmlPageHelper::$description = "Ca va ?";
//HtmlPageHelper::css("/styles/style.css");
//HtmlPageHelper::js("/js/lib/mylib.js", "jquery", ["defer" => "true"]);
//HtmlPageHelper::js("/js/poite/poire.js");
//HtmlPageHelper::addBodyClass("marsh");
//HtmlPageHelper::addBodyClass("mallow");
//HtmlPageHelper::addBodyAttribute("onload", "tamere");
//HtmlPageHelper::js("/js/lib/sarah", null, null, false);


echo HtmlLayout::create()
    ->setTemplate("home")
    ->setLoader(FileLoader::create()
        ->addDir(Z::appDir() . "/theme/layout")
    )
    ->setRenderer($commonRenderer)
    ->bindWidget("group", GroupWidget::create()
        ->setTemplate("group/group")
        ->setLoader($wloader)
        ->setRenderer($commonRenderer)
        ->bindWidget("meteo", Widget::create()
            ->setTemplate("meteo/meteo")
            ->setVariables(['level' => "good"])
            ->setLoader($wloader)
            ->setRenderer($commonRenderer)
        )
        ->bindWidget("kart", Widget::create()
            ->setTemplate("kart/kart")
            ->setLoader($wloader)
            ->setRenderer($commonRenderer)
        )
    )
    ->render([
        "name" => 'Pierre',
    ]);



```            




History Log
===============
    
- 1.1.0 -- 2017-03-13

    - now PhpLayoutRenderer passes the v variable as an array instead of an object 

- 1.0.0 -- 2017-03-12

    - initial commit



