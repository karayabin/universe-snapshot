Kamille
===========
2017-03-12 --> 2017-07-09



DOC IN PROGRESS...

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
    
    
- 1.114.0 -- 2018-02-08

    - add MorphicAdminListRenderer.renderByConfig persistence layer
    
- 1.113.0 -- 2018-02-07

    - add formRouteExtraVars in __default.list.conf.php
      
- 1.112.0 -- 2018-02-07

    - add KamilleClawsController.renderClaws's $prepareMethod argument  
    
- 1.111.1 -- 2018-02-05

    - fix rowActionUpdateRicAdaptor in __default.list.conf.php  
    
- 1.111.0 -- 2018-02-01

    - add KamilleClawsController protected handleClawsException method 
    
- 1.110.0 -- 2018-01-30

    - add KamilleClawsController ClawsHttpResponseException shortcut/interception mechanism 
    
- 1.109.0 -- 2018-01-26

    - add FormConfigurationProviderInterface.getConfig context argument 
    
- 1.108.0 -- 2018-01-26

    - add ListConfigurationProviderInterface.getConfig context argument 
    
- 1.107.2 -- 2018-01-25

    - reorganize _default.list.conf.php code 
    
- 1.107.1 -- 2018-01-25

    - fix _default.list.conf.php typo 
    
- 1.107.0 -- 2018-01-25

    - add morphic:defaultFormLinkPrefix to _default.list.conf.php 
    
- 1.106.2 -- 2018-01-25

    - fix MorphicAdminListRenderer headersVisibility index not exist 
    
- 1.106.1 -- 2018-01-25

    - fix MorphicAdminListRenderer, now handles headersVisibility 
    
- 1.106.0 -- 2018-01-23

    - enhance MorphicAdminListRenderer, now makes distinction between symbolic and real column names
    
- 1.105.0 -- 2018-01-19

    - add KamilleController constructor
    
- 1.104.0 -- 2018-01-18

    - changed Morphic List default file location
    - add Morphic Form
    
- 1.103.0 -- 2018-01-17

    - add Morphic
    
- 1.102.0 -- 2018-01-16

    - fix ThemeWidget
    - add Theme (in mvc)
    
- 1.101.0 -- 2018-01-16

    - add ThemeWidget
    
- 1.100.1 -- 2018-01-11

    - fix KamilleSession (static instead of self lazy binding error)
    
- 1.100.0 -- 2018-01-11

    - add KamilleSession
    
- 1.99.0 -- 2018-01-09

    - add KamilleClawsController
    
- 1.98.0 -- 2017-12-13

    - add HtmlPageHelper::renderPageFromContent method
    
- 1.97.1 -- 2017-12-10

    - fix SessionTransmitter typo
    
- 1.97.0 -- 2017-12-10

    - add SessionTransmitter
    
- 1.96.0 -- 2017-11-28

    - add ClawsWidgetError::modelIsErroneous method
    
- 1.95.0 -- 2017-11-27

    - add ClawsWidgetError
    
- 1.94.0 -- 2017-10-24

    - update ClawsWidget, improve error message
    
- 1.93.0 -- 2017-10-18

    - add HtmlPageHelper::hasBodyClass method
    
- 1.92.0 -- 2017-10-16

    - add Claws widget position system
    
- 1.91.0 -- 2017-09-28

    - add AjaxLayout object 
    
- 1.90.0 -- 2017-09-26

    - add FakeHttpRequest.setHost method 
    
- 1.89.0 -- 2017-09-21

    - add KamilleThemeHelper.loadJsInitFile 
    
- 1.88.1 -- 2017-09-14

    - fix AbstractHooks first argument of a hook call is passed via reference except for objects 
    
- 1.88.0 -- 2017-09-12

    - update AbstractHooks now accepts up to three arguments 
    
- 1.87.0 -- 2017-08-26

    - update ClawsWidget.setConf now accepts a callback to return a deferred conf 
    
- 1.86.0 -- 2017-08-02

    - add ClawsInterface 
    
- 1.85.0 -- 2017-08-02

    - add ClawsRenderer
    
- 1.84.0 -- 2017-08-02

    - add Utils/Claws
    
- 1.83.1 -- 2017-07-31

    - enhance error message in LawsUtil.renderLawsView
    
- 1.83.0 -- 2017-07-25

    - add LawsConfig.replaceWidget method 
    
- 1.82.0 -- 2017-07-24

    - PhpLayoutRenderer.render now understand namespaces (for instance m:newAddressModel) 
    
- 1.81.0 -- 2017-07-23

    - add KamilleModule.disableHooks method
    
- 1.80.0 -- 2017-07-21

    - enhance ControllerExecuterRequestListener error message when controller is incorrect
    
- 1.79.0 -- 2017-07-21

    - add kamille's Ball
    
- 1.78.0 -- 2017-07-13

    - add LawsConfig.removeWidget method
    
- 1.77.0 -- 2017-07-09

    - add LawsConfig.replaceWidgetTemplate method
    
- 1.76.0 -- 2017-06-30

    - environment can now be detect in cli
    
- 1.75.0 -- 2017-06-20

    - add Laws DynamicWidgetBinder
    
- 1.74.0 -- 2017-06-07

    - remove ApplicationLinkGenerator
    
- 1.73.0 -- 2017-06-07

    - add arguments to ApplicationLinkGenerator.getUri method: absolute and https
    
- 1.72.1 -- 2017-06-06

    - fix WidgetInstanceDecorator.decorate arguments
    
- 1.72.0 -- 2017-06-06

    - add WidgetInstanceDecorator system
    
- 1.71.0 -- 2017-06-04

    - add KamilleThemeHelper class
    
- 1.70.1 -- 2017-05-29

    - fix XConfig.get parameters parsing method
    
- 1.70.0 -- 2017-05-29

    - add Umail utility
    
- 1.69.0 -- 2017-05-28

    - update LawsUtil to newest laws version
    
- 1.68.0 -- 2017-05-25

    - add ApplicationRegistry.all method
    
- 1.67.0 -- 2017-05-23

    - improve ShortCode system, it can now transform the whole conf array
    
- 1.66.0 -- 2017-05-22

    - add ShortCode system (search for ShortCodeProviderInterface)
    
- 1.65.0 -- 2017-05-22

    - add ApplicationRegistry
    
- 1.64.2 -- 2017-05-16

    - fix RoutsyRouter.matchRoute remove trailing slash on static url
    
- 1.64.1 -- 2017-05-16

    - fix HttpRequest.hack
    
- 1.64.0 -- 2017-05-16

    - add HttpRequest.hack method
    
- 1.63.4 -- 2017-05-15

    - fix RoutsyRouter urlParams not returned correctly
    
- 1.63.3 -- 2017-05-15

    - set homogeneous Xlog debug messages
    
- 1.63.2 -- 2017-05-15

    - fix RoutsyRouter to allows controller match syntax (as defined in WebRouterInterface)
    
- 1.63.1 -- 2017-05-14

    - fix PrefixedRoutsyRouteCollection.prefixMatch
    
- 1.63.0 -- 2017-05-14

    - update routsy tools
    
- 1.62.1 -- 2017-05-14

    - fixed prefixed routsy system
    
- 1.62.0 -- 2017-05-14

    - updated routsy system, it can now support prefixes
    
- 1.61.0 -- 2017-05-14

    - moved RouterInterface to WebRouterInterface
    
- 1.60.0 -- 2017-05-13

    - LinkGenerator fix greedy identifier
    
- 1.59.0 -- 2017-05-13

    - remove ApplicationRegistry (use Request instead)
    
- 1.58.1 -- 2017-05-13

    - ApplicationRoutsyRouter adds route parameter to the Request when match
    
- 1.58.0 -- 2017-05-12

    - add ApplicationRegistry
    
- 1.57.0 -- 2017-05-12

    - add LawsConfig.addWidget method
    
- 1.56.0 -- 2017-05-12

    - add ThemeCollection
    
- 1.55.0 -- 2017-05-12

    - add LawsConfig
    
- 1.54.0 -- 2017-05-11

    - add Z.link method 
    
- 1.53.0 -- 2017-05-11

    - add Z.themeDir method 
    
- 1.52.0 -- 2017-05-11

    - fix Z.getUrlParam urldecode  
    
- 1.51.0 -- 2017-05-06

    - replaced GscpErrorResponse and GscpSuccessResponse with a unique GscpResponse  
    
- 1.50.0 -- 2017-05-05

    - we can now change the Layout class in LawsUtil 
    
- 1.49.0 -- 2017-05-04

    - add "profiles.php" automatic method facility upon installation
    
- 1.48.0 -- 2017-05-03

    - Hooks now accepts string to be passed as references
    
- 1.47.0 -- 2017-05-02

    - removed kao initiative
    
- 1.46.0 -- 2017-05-02

    - removed Position system (replaced with the Decoration system)
    
- 1.45.0 -- 2017-05-02

    - add kao initiative
    
- 1.44.0 -- 2017-05-01

    - add GscpResponse
    - remove Z::debug, as it's inefficient 
    
- 1.43.0 -- 2017-05-01

    - add Z::debug 
    
- 1.42.0 -- 2017-04-30

    - extracted Loader to an external planet 
    
- 1.41.0 -- 2017-04-25

    - add GridSystem for LawsUtil 
    
- 1.40.0 -- 2017-04-20

    - add RoutsyUtil class 
    
- 1.39.0 -- 2017-04-20

    - add Routsy system 
    - add ModuleInstallationRegister.getUninstalled method 
    
- 1.38.0 -- 2017-04-19

    - add WritableHttpRequest 
    
- 1.37.1 -- 2017-04-18

    - fix StaticRoute implementation 
    
- 1.37.0 -- 2017-04-18

    - add addRoute method to RouteInterface 
    
- 1.36.0 -- 2017-04-18

    - add Route and Routes objects 
    
- 1.35.0 -- 2017-04-12

    - AbstractX.get accept service arguments 
    - fix ModuleInstallTool methods using ClassCooker
    
- 1.34.0 -- 2017-04-10

    - removed ModuleInstaller 
    
- 1.33.0 -- 2017-04-10

    - ModuleInstaller moved to Module subdirectory 
    
- 1.32.0 -- 2017-04-10

    - add reuse argument to the AbstractX.get method 
    
- 1.31.0 -- 2017-04-09

    - WebApplication now has the lang parameter 
    
- 1.30.0 -- 2017-04-09

    - XConfig now uses dot notation to access deep array levels 
    - Z::uri method now works without request 
    
- 1.29.0 -- 2017-04-08

    - add Z::uri method 
    
- 1.28.0 -- 2017-04-07

    - fix LawsUtil default Widget class 
    
- 1.27.0 -- 2017-04-07

    - update LawsUtil arguments 
    
- 1.26.0 -- 2017-04-06

    - fix LawsLayoutProxy.includes 
    - created PublicWidgetInterface 
    
- 1.25.0 -- 2017-04-06

    - add LawsLayoutProxy.includes method
    
- 1.24.0 -- 2017-04-04

    - fix ModuleInstallTool problem with unbind hooks
    
- 1.23.0 -- 2017-04-02

    - add laws implementation
    
- 1.22.0 -- 2017-04-02

    - integrated ex-KaminosUtils class
    
- 1.21.0 -- 2017-04-02

    - add RouterHelper
    
- 1.20.0 -- 2017-04-02

    - add Z.requestParam
    
- 1.19.0 -- 2017-04-02

    - add FakeHttpRequest
    
- 1.18.0 -- 2017-03-29

    - add WidgetInstallerInterface
    
- 1.17.0 -- 2017-03-28

    - add LawsLayoutProxy
    
- 1.16.0 -- 2017-03-27

    - add param to the Hook.call method
    - add StaticObjectRouter.setDefaultController
    
- 1.15.0 -- 2017-03-26

    - added KamilleNaiveImporter
    
- 1.14.0 -- 2017-03-25

    - added XInstalledModules
    
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



