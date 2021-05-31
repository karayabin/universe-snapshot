Light_Kit_Demo
===========
2019-04-25 -> 2021-03-09





Some demonstration of how to create websites with [Light_Kit](https://github.com/lingtalfi/Light_Kit).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Demo
```

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
- [The real website organization](#the-real-website-organization)
    - [index.php](#indexphp)
    - [The Light_Kit configuration](#the-light_kit-configuration)
    - [The looplab_home page](#the-looplab_home-page)
    - [The layout page](#the-layout-page)
- [History Log](#history-log)


The demos
===========

Checkout the [5 Light Kit demos](https://lingtalfi.com/Light_Kit_Demo).

All the demos are themes created by Brad Traversy in this course [Bootstrap 4 From Scratch With 5 Projects ](https://www.udemy.com/bootstrap-4-from-scratch-with-5-projects/).

The 5 websites use Bootstrap 4 and are responsive.

Their names are:

- [LoopLab](https://lingtalfi.com/Light_Kit_Demo?site=looplab)
- [Mizuxe](https://lingtalfi.com/Light_Kit_Demo?site=mizuxe)
- [Glozzom](https://lingtalfi.com/Light_Kit_Demo?site=glozzom)
- [Blogen](https://lingtalfi.com/Light_Kit_Demo?site=blogen)
- [PortfolioGrid](https://lingtalfi.com/Light_Kit_Demo?site=portfoliogrid)




What is this?
============


The goal of this [planet](https://github.com/karayabin/universe-snapshot) is to help anybody creating website with [Light_Kit](https://github.com/lingtalfi/Light_Kit).

It does so by providing 5 examples of websites (in this case all created with boostrap 4), along with the source code.


The methodology I've used for those demos is the following:

- create a prototype website first (optional)
- then create the real website 


The prototype website is using only [prototype widgets](https://github.com/lingtalfi/Kit_PrototypeWidget), whereas the real website use [picasso widgets](https://github.com/lingtalfi/Kit_PicassoWidget).


The main difference is that a prototype widget is just a static html widget, it's not administrable with php, so you can't change its variables.

However, it's faster to use prototype widgets when you want a preview of the website.

For all demos, I used prototype widgets only, but the picasso widgets give the same visual results.



Below, I will write a couple of notes about making a website using the prototype technique, and creating a website using the picasso widgets.




The prototype organization
==============

In this section, I'll discuss the general organization of a prototype website in a [Light](https://github.com/lingtalfi/Light) application,
using [Light_Kit].

Basically, all **Light_Kit** does is providing us with a **kit** service to use in our **Light** application.
 
The kit service by default uses a [BabyYaml](https://github.com/lingtalfi/BabyYaml) configuration storage which allows us to store all of our configuration in 
the **config/data** directory of our app.



Actually, in the [map directory of this repository](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map), you'll find all the files used for the demos.


Those files are copy/pasted in the application as is.


If we take the LoopLab demo for instance, the structure looks like this:


- [config/data/Ling.Light_Kit_Demo/Ling.Light_Kit/looplab/prototype/looplab_home.byml](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/assets/map/config/data/Ling.Light_Kit_Demo/Ling.Light_Kit/looplab/prototype/looplab_home.byml)
- [templates/Ling.Light_Kit_Demo/layouts/prototype/looplab_main_layout.php](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/assets/map/templates/Ling.Light_Kit_Demo/layouts/looplab/prototype/looplab_main_layout.php)
- [templates/Ling.Light_Kit_Demo/widgets/prototype/looplab/](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map/templates/Ling.Light_Kit_Demo/widgets/prototype/looplab)
- [templates/Ling.Light_Kit_Demo/widgets/prototype/looplab/looplab_footer_with_contact_us_button.php](https://github.com/lingtalfi/Light_Kit_Demo/blob/master/assets/map/templates/Ling.Light_Kit_Demo/widgets/prototype/looplab/looplab_footer_with_contact_us_button.php)
- [www/libs/universe/Ling/Light_Kit_Demo/looplab](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map/www/libs/universe/Ling/Light_Kit_Demo/looplab)




Notice that this structure respects the [recommended Light app structure](https://github.com/lingtalfi/Light/blob/master/doc/pages/light-application-recommended-structure.md).

  


The page configuration file (looplab_home.byml) is a regular [kit page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array).

Then the layout (looplab_main_layout.php) is the skeleton of the page. We can see that it contains a printZone statement, which
is one of the most useful method to use in a layout, allowing us to print a zone (group of widgets).


Then the **templates/Ling.Light_Kit_Demo/widgets/prototype/looplab** directory contains all the prototype widgets used for the LoopLab theme.
 
And last but not least the **www/libs/universe/Ling/Light_Kit_Demo/looplab** directory contains all the assets used for the LoopLab theme.


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
    return $service->get("kit")->renderPage('Light_Kit_Demo/Ling.Light_Kit/looplab/prototype/looplab_home');
});
$light->run();

```


Note that since I was using a server of mine and I wanted to use only one url namespace for all demos,
I used $_GET variables to navigate around the demos (site and page variables to be more precise),
but that's just specific to my server, you can create one url per page if you want, or whatever.





The real website organization
==============

Let's create the [LoopLab theme](http://lingtalfi/Light_Kit_Demo?site=looplab) using real [picasso widgets](https://github.com/lingtalfi/Kit_PicassoWidget).


Before we start, let's say that all picasso widgets used for all demos can be found in the [Light_Kit_BootstrapWidgetLibrary repository](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary).


- [web assets](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/tree/master/assets/map/www/libs/universe/Ling/Light_Kit_BootstrapWidgetLibrary)
- [widget directories](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/tree/master/assets/map/templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso)
- [widget classes](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/tree/master/Widget/Picasso)
- [widget descriptions](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md)


The only thing that is not there is the page configuration files and the layouts, which are stored inside the **Light_Kit_Demo** repository (this repository):

- [page configuration files](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map/config/data/Ling.Light_Kit_Demo/kit)
- [layouts](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map/templates/Ling.Light_Kit_Demo/layouts)


And so that being said, let's go over one example, and from that you should be able to work you way around for all demos (it's the same pattern every time).


Speaking of pattern, here is what the general synopsis looks like:

- the user browses a page
- the webserver (nginx/apache/...) redirects it to the index.php which starts the Light application (more on that in the next section)
- the Light application uses the kit service (from the [Light_Kit plugin](https://github.com/lingtalfi/Light_Kit)), and so basically 
    calls the relevant page configuration (in all our examples, the page configuration is stored in babyYaml format, which makes it easier to discuss
    and visualize, but keep in mind that the page configuration could come from a database as well, or any other medium actually).  
- So the kit service being actually nothing but a [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md) instance,
    it will be used to interpret (i.e. render) the given page configuration (using the renderPage method).
- The result of the kit service's renderPage method is then displayed back to the screen, using the basic routing concept of the [Light](https://github.com/lingtalfi/Light) framework.


Now there is a lot going on inside the **renderPage** method, so read the [Light_Kit](https://github.com/lingtalfi/Light_Kit) documentation for more in-depth info about that,
and also read the documentation of the [picasso widget](https://github.com/lingtalfi/Kit_PicassoWidget), as it's the only type of widget used in all demos.






index.php
-----------------

Let's start with the entry point of the web application, **index.php** in my case:

```php
<?php


use Ling\Light\Core\Light;
use Ling\Light\Helper\ServiceContainerHelper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


require_once __DIR__ . "/../../../universe/bigbang.php"; // activate universe





// we're using a service container
$appDir = __DIR__ . "/../../..";
$container = ServiceContainerHelper::getInstance($appDir, [
    'type' => 'red',
]);


// instantiate the light 
$light = new Light();
$light->setDebug(true); // set that to false in production
$light->setContainer($container);


$light->registerRoute("/Light_Kit_Demo", function (LightServiceContainerInterface $service) {
    return $service->get("kit")->renderPage('Light_Kit_Demo/Ling.Light_Kit/looplab/looplab_home');
});
$light->run();

```



The Light_Kit configuration
-------------


Here is the kit configuration I'm using (in **/my_app/config/services/Light_Kit.byml**).
 
Reminder: the service configuration is injected automatically into your **Light** app when you import a **Light** plugin.


```yaml
kit:
    instance: Ling\Light_Kit\PageRenderer\LightKitPageRenderer
    methods:
        configure:
            settings:
                application_dir: ${app_dir}
        setConfStorage:
            -
                instance: Ling\Kit\ConfStorage\BabyYamlConfStorage
                methods:
                    setRootDir:
                        rootDir: ${app_dir}/config/data
        setContainer:
            container: @container()

    methods_collection:
        -
            method: addPageConfigurationTransformer
            args:
                -
                    instance: Ling\Light_Kit\PageConfigurationTransformer\DynamicVariableTransformer
        -
            method: registerWidgetHandler
            args:
                - picasso
                -
                    instance: Ling\Kit_PicassoWidget\WidgetHandler\PicassoWidgetHandler
                    constructor_args:
                        options:
                            showCssNuggetHeaders: true
                            showJsNuggetHeaders: true
                    methods:
                        setWidgetBaseDir:
                            dir: ${app_dir}
        -
            method: registerWidgetHandler
            args:
                - prototype
                -
                    instance: Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler
                    methods:
                        setRootDir:
                            appDir: ${app_dir}


kit_css_file_generator:
    instance: Ling\Light_Kit\CssFileGenerator\LightKitCssFileGenerator
    constructor_args:
        rootDir: ${app_dir}/www
        format: css/tmp/$identifier-compiled-widgets.css
```


So, I'm basically using the **LightKitPageRenderer** object as a service, using the **BabyYamlConfStorage** as the storage.

Note that the babyYaml storage is configured with a rootDir of **${app_dir}/config/data**.
That's important, because that's where all the page configuration files will be found.


Notice the use of the **DynamicVariableTransformer** instance, which allows for dynamic variables (used in the **blogen** demo to
inject the name of the connected user into the top nav widget).


At the end, we can see the use of a second service: **kit_css_file_generator**, which is used to compile the css code of all widgets into one file (arguably cleaner
than every widget writing its own css code inline).




The looplab_home page
-----------


Now the page configuration.

Again, since we use BabyYaml storage, it's stored in babyYaml files, but it could be also stored in a database as well. 


The page configuration is very important for various reasons:

- we choose the layout (which contains the zones)
- we attach the widgets to the zones that we want
- we configure the widgets 


It's basically where the pages are created.


Back to our demo: from the **index.php**, we call the **Light_Kit_Demo/Ling.Light_Kit/looplab/looplab_home** page.

Now because of our kit service configuration (the **rootDir** property from the previous section in particular, remember?), the page configuration path 
resolves to **${app_dir}/config/data/Ling.Light_Kit_Demo/Ling.Light_Kit/looplab/looplab_home.byml**.


What follows is the content of that file:


```yaml
label: LoopLab main page
layout: templates/Ling.Light_Kit_Demo/layouts/looplab/looplab_main_layout.php
layout_vars: []

title: LoopLab one page theme
description: <
    This is the LoopLab one page theme, created by Brad Traversy, and implemented with the Light_Kit plugin from the Light framework.
>

zones:
    main_zone:
        -
            name: main_nav
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MainNavWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/MainNavWidget
            template: default.php
            skin: looplab-nav
            vars:
                attr:
                    id: main-nav
                    class: bg-dark navbar-dark looplab-nav
                title: LoopLAB
                fixed_top: true
                use_scrollspy: true
                use_smooth_scrolling: true
                title_url: /
                expand_size: sm
                links:
                    -
                        text: Home
                        url: "#home"
#                        icon: fas fa-user
                    -
                        text: Explore
                        url: "#explore-head-section"

                    -
                        text: Create
                        url: "#create-head-section"
                    -
                        text: Share
                        url: "#share-head-section"
                links_align_right: true
        -
            name: looplab_two_columns_signup_form
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabTwoColumnsSignupFormWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabTwoColumnsSignupFormWidget
            template: default.php
            vars:
                attr:
                    id: home
                showTeaser: true
                form_align_right: false
                teaser_visible_size: lg
                teaser_title: Build <strong>social profiles</strong> and gain revenue <strong>profits</strong>
                teaser_items:
                    -
                        icon: fas fa-check fa-2x
                        text:  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!
                    -
                        icon: fas fa-check fa-2x
                        text:  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!
                    -
                        icon: fas fa-check fa-2x
                        text:  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!
                form_title: Sign up Today
                form_subtitle: Please fill out this form to register
                form_fields:
                    -
                        name: username
                        placeholder: Username
                        type: text
                    -
                        name: email
                        placeholder: Email
                        type: text
                    -
                        name: password
                        placeholder: Password
                        type: password
                    -
                        name: confirm_password
                        placeholder: Confirm Password
                        type: password
                form_submit_value: Submit
                form_submit_class: btn btn-outline-light btn-block
                background_style: url('/plugins/Light_Kit_BootstrapWidgetLibrary/looplab/img/home.jpg')

        -
            name: looplab_monochrome_header
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabMonoChromeHeaderWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabMonoChromeHeaderWidget
            template: default.php
            skin: looplab-dark
            vars:
                attr:
                    class: looplab-dark
                    id: explore-head-section
                title: Explore
                text: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente doloribus ut iure itaque quibusdam rem accusantium deserunt reprehenderit sunt minus.
                button_url: '#'
                button_class: btn btn-outline-secondary
                button_text: Find Out More


        -
            name: looplab_two_columns_teaser
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabTwoColumnsTeaserWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabTwoColumnsTeaserWidget
            template: default.php
            vars:
                attr:
                    class: bg-light text-muted py-5
                img_on_left: true
                img_rounded: true
                img_src: /plugins/Light_Kit_BootstrapWidgetLibrary/looplab/img/explore-section1.jpg
                img_alt: Explore & Connect
                teaser_title: Explore & Connect
                teaser_text: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore reiciendis, voluptate at alias laborum odit aliquidtempore perspiciatis repudiandae hic?
                teaser_items:
                    -
                        icon: fas fa-check fa-2x
                        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
                    -
                        icon: fas fa-check fa-2x
                        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
        -
            name: looplab_monochrome_header
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabMonoChromeHeaderWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabMonoChromeHeaderWidget
            template: default.php
            vars:
                attr:
                    class: text-white bg-primary
                    id: create-head-section
                title: Create
                text: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente doloribus ut iure itaque quibusdam rem accusantium deserunt reprehenderit sunt minus.
                button_url: '#'
                button_class: btn btn-outline-light
                button_text: Find Out More
        -
            name: looplab_two_columns_teaser
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabTwoColumnsTeaserWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabTwoColumnsTeaserWidget
            template: default.php
            skin: looplab-dark
            vars:
                attr:
                    class: looplab-dark py-5
                img_on_left: false
                img_rounded: true
                img_src: /plugins/Light_Kit_BootstrapWidgetLibrary/looplab/img/create-section1.jpg
                img_alt: Create Your Passion
                teaser_title: Create Your Passion
                teaser_text: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore reiciendis, voluptate at alias laborum odit aliquidtempore perspiciatis repudiandae hic?
                teaser_items:
                    -
                        icon: fas fa-check fa-2x
                        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
                    -
                        icon: fas fa-check fa-2x
                        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
        -
            name: looplab_monochrome_header
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabMonoChromeHeaderWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabMonoChromeHeaderWidget
            template: default.php
            vars:
                attr:
                    class: text-white bg-primary
                    id: share-head-section
                title: Share
                text: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente doloribus ut iure itaque quibusdam rem accusantium deserunt reprehenderit sunt minus.
                button_url: '#'
                button_class: btn btn-outline-light
                button_text: Find Out More

        -
            name: looplab_two_columns_teaser
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabTwoColumnsTeaserWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabTwoColumnsTeaserWidget
            template: default.php
            vars:
                attr:
                    class: bg-light text-muted py-5
                img_on_left: true
                img_rounded: true
                img_src: /plugins/Light_Kit_BootstrapWidgetLibrary/looplab/img/share-section1.jpg
                img_alt: Share What You Create
                img_top_margin: 0px
                teaser_title: Share What You Create
                teaser_title_level: 3
                teaser_text: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore reiciendis, voluptate at alias laborum odit aliquidtempore perspiciatis repudiandae hic?
                teaser_items:
                    -
                        icon: fas fa-check fa-2x
                        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
                    -
                        icon: fas fa-check fa-2x
                        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?
        -
            name: looplab_footer_with_contact_us_button
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabFooterWithContactUseButtonWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabFooterWithContactUseButtonWidget
            template: default.php
            vars:
                attr:
                    class: bg-dark
                footer_title: LoopLab
                footer_text: Copyright &copy; $year
                footer_button_class: btn btn-primary
                footer_button_text: Contact Us
                modal_title: Contact Us
                modal_form_action: ""
                modal_form_method: post
                modal_fields:
                    -
                        label: Name
                        name: name
                        type: text
                    -
                        label: Email
                        name: email
                        type: email
                    -
                        label: Message
                        name: message
                        type: textarea

                modal_btn_text: Submit
                modal_btn_class: btn btn-primary btn-block






```

 
As you can see, there is quite a lot going on.

But basically, it's all widget configuration, with some general page configuration at the top of the file.

For more info about widget configuration, visit the [BootstrapLibrary widget documentation](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md).


 
And that's it for the real website demo.

With the page configuration above, we get the LoopLab theme.

Now it's the same principle for all themes.


  



The layout page
------------------

The layout used by the LoopLab home page has the following content.

- you can find the layouts for all the themes in the [layout directory of this repository](https://github.com/lingtalfi/Light_Kit_Demo/tree/master/assets/map/templates/Ling.Light_Kit_Demo/layouts)

```php
<?php


/**
 * @var $this LightKitPageRenderer
 */


use Ling\Bat\StringTool;
use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;


$container = $this->getContainer();
$jsLibs =  $this->copilot->getJsUrls();
$cssLibs =  $this->copilot->getCssUrls();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/plugins/Light_Kit_Demo/looplab/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">


    <?php foreach ($cssLibs as $url): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($url); ?>">
    <?php endforeach; ?>

    <?php if (true === $this->copilot->hasCssCodeBlocks()): ?>
        <link rel="stylesheet"
              href="<?php echo $container->get('kit_css_file_generator')->generate($this->copilot, $this->pageName); ?>">
    <?php endif; ?>


    <link rel="stylesheet" href="css/style.real.css">

    <?php if (true === $this->copilot->hasTitle()): ?>
        <title><?php echo $this->copilot->getTitle(); ?></title><?php endif; ?>

    <?php if (true === $this->copilot->hasDescription()): ?>
        <meta name="description"
              content="<?php echo htmlspecialchars($this->copilot->getDescription()); ?>"><?php endif; ?>

</head>

<body <?php echo StringTool::htmlAttributes($this->copilot->getBodyTagAttributes()); ?>>


<?php $this->printZone("main_zone"); ?>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>


<?php foreach ($jsLibs as $url): ?>
    <script src="<?php echo htmlspecialchars($url); ?>"></script>
<?php endforeach; ?>



<script>


    $(document).ready(function () {


        /**
         * Adds a top padding automatically to the first .container element, except if it's
         * the .container inside the top nav element.
         *
         * Note: depending on your layout, this might be a good/bad idea.
         * You might also want to first arrange your page, then when done, change the css manually (i.e. not
         * using a javascript solution like this).
         *
         */
        $('.container').not("nav .container").first().addClass('first-container');


        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear());


    });
</script>

<?php if (true === $this->copilot->hasJsCodeBlocks()): ?>

    <script>

        <?php $blocks = $this->copilot->getJsCodeBlocks(); ?>
        <?php foreach($blocks as $block): ?>
        <?php echo $block; ?>
        <?php endforeach; ?>

    </script>

<?php endif; ?>
</body>

</html>
```



Hopefully you now know how to create websites using the **Light_Kit** plugin.

Good luck!





History Log
=============

- 1.2.6 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.5 -- 2021-03-09

    - update README to reflect path change from Ling.Light_Kit_BootstrapWidgetLibrary
  
- 1.2.4 -- 2021-03-09

    - rename templates dir to Ling.Light_Kit_Demo, moved www/plugins assets to www/libs/universe dir

- 1.2.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2019-08-30

    - taking into account the new HtmlPageCopilot interface 
    
- 1.1.3 -- 2019-08-14

    - fix doc 404 link 
    
- 1.1.2 -- 2019-08-14

    - fix erroneous packing of repo 
    
- 1.1.1 -- 2019-08-14

    - update the repo to accommodate new light philosophy about app recommended structure
    
- 1.0.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.0 -- 2019-05-17

    - hello v1  
    
- 0.6.4 -- 2019-05-03

    - update README.md  
    
- 0.6.3 -- 2019-05-03

    - update README.md looplab configuration page, now reflects the website more accurately (especially the nav)  
    
- 0.6.2 -- 2019-05-03

    - update README.md add looplab layout content  
    
- 0.6.1 -- 2019-05-03

    - fix README.md looplab page example missing ids  
    
- 0.6.0 -- 2019-05-03

    - update the README.md with real website example for looplab  
    
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