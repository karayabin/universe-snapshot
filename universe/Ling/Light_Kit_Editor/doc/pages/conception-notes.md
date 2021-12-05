Light_Kit_Editor, conception notes
================
2021-03-01 -> 2021-07-01

**Light kit editor** (lke)'s purpose is to help users edit their [kit](https://github.com/lingtalfi/Kit) pages using a gui.


Basically, we provide some tools and concepts, which third-party authors can use to create their own gui.



The first thing to understand is that we've expanded the kit system, adding our own twist to it.
This is the concept of [kit web app](#the-kit-web-app), which basically introduces the idea of **theme** in the **kit system**.




Summary
------------
2021-03-12 -> 2021-07-01

* [The kit web app](#the-kit-web-app)
* [The two engines](#the-two-engines)
  * [babyYaml storage](#babyyaml-storage)
  * [Page example](#page-example)
  * [Assigning widgets to page positions with babyYaml](#assigning-widgets-to-page-positions-with-babyyaml)
    * [Block alias](#block-alias)
  * [database storage](#database-storage)
  * [Zone alias conception](#zone-alias-conception)
* [Website items](#website-items)
* [The website controller](#the-website-controller)
* [The kit editor page renderer](#the-kit-editor-page-renderer)
  




The kit web app
===========
2021-03-11 -> 2021-03-12


In a **kit web app**, we use the same concepts defined in the [kit system](https://github.com/lingtalfi/Kit),
but we add two new terms:

- theme
- block: this is our term for: a "group of widget"

The general logic is the following:

- a **page** is called (from a controller)
- the **page** calls a **layout**, which arranges some **positions** in a html canvas 
- the **page** also assigns **blocks** to the **positions** (i.e. zones) of the layout
- then the **layout** is rendered, and as a **position** is called the layout renders all the **widgets** bound to it 


So the idea with **blocks** is that we don't assign **widgets** directly to a **zone**, but rather we group widgets in blocks first,
and then assign the blocks to the **zones**.


We also introduce the notion of [theme](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/pages/kit-theme.md), which kit lacked.




The two engines
==========
2021-03-11 -> 2021-05-04


lke provides two different storages:

- [babyYaml](#babyyaml-storage): a storage based on [babyYaml](https://github.com/lingtalfi/BabyYaml) files
- [database](#database-storage): a storage using the database


The main api provides an abstraction for the storage layer, so that the methods are the same independently of which storage you choose.

The type of storage you choose is entirely up to you.





babyYaml storage
-----------
2021-03-02 -> 2021-06-18


The organization of the babyYaml storage is all contained in a so-called root directory (aka **kit web app** directory), which is a directory of your choice.
We will refer to it as **$root** in this section.

You can put the **$root** dir where you want.

We recommend that you put it in:

- $app_dir/config/open/$yourGalaxy.$yourPlanet/Ling.Light_Kit_Editor/$yourWebsiteIdentifier


This way, your website is "open" to other planets (continue reading to understand).   



A typical **kit web app** directory contains the following types of file:

- a layout file: $root/layouts/$layoutId.php
- a page file: $root/pages/$pageId.byml
- a block file: $root/blocks/$blockId.byml


The characters allowed for the **$layoutId**, **$pageId**, and **$blockId** are the alphanumerical chars,
dash, underscore and the slash (to create sub-directory based organization).


Since a **kit web app** is generally the result of multiple plugins working collaboratively, we use the following filesystem structure,
which is [eco-structure](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#eco-structure) friendly:

```txt
- $web_app_name/
    - layouts/
        - $planetDotName/
            - $theme_name/
                - layout_46819.php
                - ...
            - $another_theme_name/
                - layout_46819.php
                - ...
    - pages/
        - $planetDotName/
            - some_page.byml
            - ...
    - blocks/
        - $planetDotName/
            - some_block.byml
            - ...
```

With:

- **$web_app_name**: the name of your **kit web app** (aka site)
- **$planetDotName**: the [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the contributing plugin
- **$theme_name**: the name of your [theme](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/pages/kit-theme.md)


So for instance in the above example, we have the following mappings:

- **$layoutId**: $planetDotName/$theme_name/layout_46819 
- **$pageId**: $planetDotName/some_page 
- **$blockId**: $planetDotName/some_block 












Page example
----------
2021-03-11


To get started, you can use the following page example (inspired by **config/open/Ling.Light_Kit_Admin/lke/pages/Ling.Light_Kit_Admin/dashboard.byml** from the [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin):



```yaml
label: Light Kit Admin Dashboard
layout: config/open/Ling.Light_Kit_Admin/lke/layouts/$t/main_layout.php
layout_vars: []

title: Light Kit Admin Dashboard
description: <
    Welcome to the light kit admin dashboard.
>


zones:
    notifications: b$:Ling.Light_Kit_Admin/notifications_default
    toasts: b$:Ling.Light_Kit_Admin/toasts_default
    sub_header: b$:Ling.Light_Kit_Admin/sub_header_default
    header: b$:Ling.Light_Kit_Admin/header_default
    sidebar: b$:Ling.Light_Kit_Admin/sidebar_default
    body:
        - b$:Ling.Light_Kit_Admin/body_default
        # --------------------------------------
        # YOUR WIDGET(S) HERE...
        # --------------------------------------
        -
            name: zeroadmin_statsummaryicon
            type: picasso
            identifier: w8
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminStatSummaryIconWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminStatSummaryIconWidget
            template: default.php
            vars: []
            
    footer: b$:Ling.Light_Kit_Admin/footer_default
```




Assigning widgets to page positions with babyYaml
------------------
2021-03-11


A peculiarity of babyYaml files is that we don't have to group widgets into **blocks** before assigning them to a **page position**.

In the [page example](#page-example) above, notice how the widgets are defined in the "body" zone:

- the first assignment uses a [block alias](#block-alias), which refers to a group of widgets defined in a separate file
- the second assignment directly assigns a widget to the "body" position


In that regard, the babyYaml storage is more flexible than the database storage.


Now what exactly is a **block alias**?

Let's find out in the next section.




### Block alias
2021-03-21


A **block alias** is used by the developers inside  the babyYaml files of the **pages**.

A **block alias** is basically a short notation which references a **block**.

We chose to use the **block alias** technique instead of the template inheritance system, as we found it's a bit more intuitive (i.e. less clumsy).
This is explained in more details in the [zone alias conception](#zone-alias-conception) section.

The **block alias**' notation is the following:

- b$:$zoneId


In other words, you start with the "**b$:**" string, immediately followed by your zone id.











database storage
-----------
2021-03-02 -> 2021-03-30


For the database storage, we have the following tables:


- lke_site: to store sites (aka web apps)  
- lke_page: to store the pages, each page belongs to a site
- lke_block: to store the blocks  
- lke_widget: to store widgets of both types [picasso](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array) and 
  [prototype](https://github.com/lingtalfi/Kit_PrototypeWidget#the-prototype-widget-array).
  
- lke_page_has_block: to associate the blocks to the different pages
- lke_block_has_widget: to group widgets into blocks


It basically looks like this:

![lke-schema 3](https://lingtalfi.com/img/universe/Light_Kit_Editor/lke-schema-3.png)


To understand the database model, please continue reading.


The layout file arranges **positions** in a html canvas.

Because of this, **pages** are implicitly bound to **positions**.

In our model, we group **widgets** into **blocks** that we then can attach to a **page**, on a given position.


In other words, a **page** contains **positions**, and each **position** contains any number of **blocks**. 

The **block_index** field defines the order in which the blocks are displayed for a given position.

Note that a widget needs to be in a **block** in order to be bound to a page.

That is to say that it's not possible to attach a widget to the page directly.



### About identifiers
2021-03-12

I personally like to have my identifiers very explicit, so that I don't have to guess what they are.
Basically, my database identifiers are based on the equivalent babyYaml storage structure.

So I end up using the following identifiers formats, which I recommend using:

- page.identifier: $planetDotName/$page_name
- block.identifier: depending on whether it's defined in a babyYaml page or block: 
    - blocks/$planetDotName/$block_name
    - pages/$planetDotName/$page_name
- widget.identifier: here I don't care (w1, w2, w3, ...) unless I need to target a specific widget  






Zone alias conception
-----------
2021-03-02 -> 2021-03-11


A **zone alias** is a short notation which refer to a **zone**.

We use this mechanism instead of template inheritance, because we believe it's more intuitive.

In this section, I will try to explain the differences between both mechanisms, so that the reader can estimate for
himself the pros/cons of each approach, and hopefully understand why we chose the **zone alias** system.


So with inheritance, our page file looks like this:


```yaml
title: Light Kit Admin Home
description: <
    This is the gui admin provided by the Light_Kit_Admin plugin (from the Light framework), using the zeroadmin theme by ling talfi
    >
_parent: Light_Kit_Admin/Ling.Light_Kit/zeroadmin/dev/mainlayout_base
zones:
    body:
        -
            name: zeroadmin_herograph
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeroGraphWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeroGraphWidget
            template: default.php
            _descr: <
                ZeroAdminHeroGraphWidget is a bootstrap 4 widget to display a line graph. See the dashboard of the zeroadmin theme (https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html)
                for a concrete example.

                We can add as many lines as we want.
                Each line has the following:
                - the numeric data (two arrays x and y correponding to the values on the x and y axes)

            >
            vars: []
```

It refers to a template (referenced with the **_parent** key), and the template contains something like this:


```yaml
layout: templates/Ling.Light_Kit_Admin/layouts/zeroadmin/zeroadmin_main_layout.php
zones:

    header:
        -
            name: zeroadmin_header
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderWidget
            identifier: maurice
            template: default.php

    body: 
        -
            name: zeroadmin_breadcrumb
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminBreadcrumbWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminBreadcrumbWidget
            template: default.php
            vars:
                first_element_text: Home
                breadcrumb_links:
                    -
                        url: ::(@reverse_router->getUrl(/dashboard))::
                        text: Admin
                last_element_text: Dashboard
                extra_links:
                    -
                        url: ::(@reverse_router->getUrl(/pages/e-product-edit))::
                        text: Edit Page
                        icon: fas fa-edit
                    -
                        url: ::(@reverse_router->getUrl(/pages/u-profile))::
                        text: Profile
                        icon: far fa-address-card
                    -
                        url: ::(@reverse_router->getUrl(/plugins/plotly))::
                        text: Stats
                        icon: fas fa-chart-line

    footer:
        -
            name: footer_with_button
            type: picasso
            active: true
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\FooterWithButtonWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/FooterWithButtonWidget
            template: default.php
            vars:
                attr:
                    id: main-footer
                    class: p-5 bg-dark text-white
                column_class: col-md-6
                icon: fas fa-cloud
                button_class: btn btn-outline-light
                button_url: "#"
                button_text: Download Resume
```


So here the layout file (i.e. **templates/Ling.Light_Kit_Admin/layouts/zeroadmin/zeroadmin_main_layout.php**) is defined in the parent,
which is not optimal, because you have to open the parent to know the layout (i.e. wasted time).

In this case, the "body" widgets of the page file are merged with the "body" widgets of the parent file.
To be more precise, they are appended to the parent's body widgets. If we wanted them to be prepended, we would need to add some
notation tricks.


Ok, so that works, but I am personally not a big fan of this system.

Now let's see the alternative technique with **zone aliases**.

So with **zone aliases**, the page file looks like this:



```yaml
title: Light Kit Admin Home
description: <
    This is the gui admin provided by the Light_Kit_Admin plugin (from the Light framework), using the zeroadmin theme by ling talfi
    >

zones:
    header:
        - b$:main_header    
    body:
        - b$:main_body    
        -
            name: zeroadmin_herograph
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeroGraphWidget
            widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeroGraphWidget
            template: default.php
            _descr: <
                ZeroAdminHeroGraphWidget is a bootstrap 4 widget to display a line graph. See the dashboard of the zeroadmin theme (https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html)
                for a concrete example.

                We can add as many lines as we want.
                Each line has the following:
                - the numeric data (two arrays x and y correponding to the values on the x and y axes)

            >
            vars: []
    footer:
        - b$:main_footer
```


So here, we have three **zone aliases**:

- b$: main_header
- b$: main_body
- b$: main_footer

Each of these reference another file which contains the corresponding zones.
For instance the **main_header** alias refers to a **zone file**, which zone id is main_header, and looks like this:


```yaml
-
    name: zeroadmin_header
    type: picasso
    className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderWidget
    widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderWidget
    identifier: maurice
    template: default.php
```

So with this system, notice that the page file is clearer, and although a bit more verbose, it's more intuitive, 
because we have all the information we need upfront, without having to open other files (unless we want to investigate specific zones,
in which case we need to open the separate zone files).

Also notice that now the control of how the "body" widgets are merged between the page specific widgets and the zone alias "body" widgets
is more intuitive (we just call the alias after or before, depending on whether we want to append or prepend them).

Generally, this mechanism feels more flexible.

The drawback is that is seems less dry, and is more verbose.


So to recap, the **zone alias** notation looks like this:

- b$: $zoneId

With: 

- $zoneId: the zone id


Light kit editor uses the zone alias system instead of the template inheritance system, because we believe it's more intuitive and more flexible.






Website items
==========
2021-04-01 -> 2021-07-01



Third party authors create their own websites via our [open registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md#the-open-registration).

We provide the following file:

- config/open/Ling.Light_Kit_Editor/websites.byml


Example:

```yaml
-
    provider: Ling.Light_Kit_Admin
    engine: babyYaml
    identifier: some_identifier
    rootDir: ${app_dir}/config/open/Ling.Light_Kit_Admin/Ling.Light_Kit_Editor/admin
    label: Website 1
    theme: Ling.Light_Kit_Admin/zeroadmin

-
    provider: Ling.Light_Kit_Admin
    engine: db
    identifier: lke
    rootDir: ${app_dir}/config/open/Ling.Light_Kit_Admin/Ling.Light_Kit_Editor/admin
    label: Website name
    theme: Ling.Light_Kit_Admin/zeroadmin

```

Each entry is an item representing a website, which has the following structure:

- provider: string, the [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the plugin providing the website
- engine: string, which engine to use for this website (db or babyYaml)
- identifier: string, a unique identifier for this website. This will be used as a reference internally
- ?rootDir: string, the root dir of the website files.
    It must start with The ${app_dir} tag, which will be either:
    - resolved to the application root directory
    - stripped out (internally) to get the relative path to the root dir
    depending on the methods used.
    
    While this is mostly useful with the babyYaml engine type, the db engine also uses it if you use the **$root** alias in your layout path.
    In that case, the **$root** alias is replaced with the value of this rootDir property.

- label: string, the human label for the website, will be used in the gui
- ?theme: string="default", the default theme to use for this website, see our [kit-theme](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/pages/kit-theme.md) page for more info.
  
- ...: other properties might be added



You can use our service to register a website entry in the **websites** file.




The website controller
=========
2021-04-08


We also provide a website controller class, which purpose is to render all the websites' pages.
We create a dedicated route to access it: 

- kit

The expected GET parameters are the following:

- ?**website_id**: the website identifier
- **page_id**: the page identifier


You can set a "default website identifier" via our service configuration (which defaults to "default").

This way you don't have to specify the **website_id** parameter in GET. 







The kit editor page renderer
=========
2021-06-18


We provide our own replacement to the [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md) (which is the main renderer of the kit system).

You can use our page renderer to benefit the followings (assuming proper configuration):

- the $t variable is automatically replaced with the theme name in the layout path.
- the $root variable is automatically replaced with the relative $root path of your website (relative to the application dir)









