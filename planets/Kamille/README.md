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
use Kamille\Architecture\ApplicationParameters\Web\WebApplicationParameters;
use Kamille\Architecture\Request\Web\HttpRequest;
use Kamille\Architecture\RequestListener\Web\ControllerExecuterRequestListener;
use Kamille\Architecture\RequestListener\Web\ResponseExecuterListener;
use Kamille\Architecture\RequestListener\Web\RouterRequestListener;
use Kamille\Architecture\Router\Web\StaticObjectRouter;
use Services\X;


require_once __DIR__ . "/../init.php";

WebApplicationParameters::boot();





WebApplication::inst()
    ->set('theme', "gentelella")// this application uses a theme
    ->addListener(RouterRequestListener::create()
        ->addRouter(StaticObjectRouter::create()->setUri2Controller(X::getStaticObjectRouter_Uri2Controller()))
//        ->addRouter(StaticPageRouter::create()
//            ->setStaticPageController(X::getStaticPageRouter_StaticPageController())
//            ->setUri2Page(X::getStaticPageRouter_Uri2Page()))
    )
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
    
- 1.13.0 -- 2017-03-21

    - update StepTrackerAwareModule
    
- 1.12.0 -- 2017-03-21

    - added StepTrackerAwareInterface.getStepTracker
    
- 1.11.0 -- 2017-03-21

    - removed WebApplicationParameters (moved to app specific like kaminos)
    
- 1.10.0 -- 2017-03-20

    - added AbstractX and AbstractXConfig
    
- 1.9.0 -- 2017-03-20

    - added ModuleInstaller and StepTracker
    
- 1.8.0 -- 2017-03-17

    - moved application parameters outside the Application
    
- 1.7.0 -- 2017-03-16

    - add ControllerExecuterRequestListener.throwExOnControllerNotFound method
    
- 1.6.0 -- 2017-03-16

    - add possibility of choosing the method from the StaticObjectRouter's controller string
    
    
- 1.5.0 -- 2017-03-16

    - Remove built-in dependencies to X and Hooks
    
- 1.4.0 -- 2017-03-16

    - Undo add WebControllerInterface
    
- 1.3.0 -- 2017-03-16

    - Added WebControllerInterface 
    
- 1.2.0 -- 2017-03-15

    - LayoutProxy catches Exception on widget rendering 
    
- 1.1.0 -- 2017-03-13

    - now PhpLayoutRenderer passes the v variable as an array instead of an object 

- 1.0.0 -- 2017-03-12

    - initial commit



