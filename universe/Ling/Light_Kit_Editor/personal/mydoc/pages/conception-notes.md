Light_Kit_Editor, conception notes
================
2021-03-01 -> 2021-03-04

**Light kit editor** (lke)'s purpose is to help users edit their kit pages using a gui.

Lke focuses on the api side, which is the first step towards a fully functional gui.

The actual gui is not handled by lke yet. Maybe it will be one day, but at the moment those are just conception notes,
nothing is coded, I just have some ideas.



lke provides two interchangeable storages:

- [babyYaml](#babyyaml-storage): a storage based on [babyYaml](https://github.com/lingtalfi/BabyYaml) files
- [database](#database-storage): a storage using the database


The main api provides an abstraction for the storage layer, so that the methods are the same independently of which storage you choose.

Which storage you choose is entirely up to you.

Basically, they do the same thing, only a few implementation details change.

The main concepts used by both storages are the one used by [kit](https://github.com/lingtalfi/Kit#the-concepts-used-by-kit)):


- **page**
- **layout**
- **zone**
- **widget**
  
In addition to that, we add the following concept:
  

- **zone_alias**: a **zone alias** is used by the developers inside  the babyYaml files of the pages.
    A **zone alias** is basically a short notation which reference a zone.
    We chose to use the **zone alias** technique instead of the template inheritance system, as we found it's a bit more 
    intuitive (i.e. less clumsy).
    So the idea with **zone aliases** is that in your **page** file you define all the zones explicitly, but then for each zone
    you can call individual zone "templates" using **zone aliases**.
  
    This is explained in more details in the [zone alias](#zone-alias) section.




babyYaml storage
-----------
2021-03-02


The organization of the babyYaml storage is all contained in a so-called root directory, which is a directory of your choice.
We will refer to it as **$root** in this section.

We have different types of file:


- a page file: $root/pages/$pageId.byml
- a zone file: $root/zones/$zoneId.byml


The characters allowed for both the **$pageId** and the **$zoneId** are the alphanumerical chars,
dash, underscore and the slash (to create sub-directory based organization).






database storage
-----------
2021-03-02 -> 2021-03-04


For the database storage, we have the following tables:


- lke_page: to store the pages  
- lke_zone: to store the zones  
- lke_widget: to store widgets of both types [picasso](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array) and 
  [prototype](https://github.com/lingtalfi/Kit_PrototypeWidget#the-prototype-widget-array).
  
  

- lke_page_has_zone: to store bindings between pages and zones.
- lke_zone_has_widget: to store bindings between zones and widgets


It basically looks like this:

![lke-schema](https://lingtalfi.com/img/universe/Light_Kit_Editor/lke-schema.png)


To understand the database model, please continue reading.


The layout files call **positions**.

And so because of this, **pages** are implicitly bound to **positions**.

In our model, we group **widgets** into **zones** and attach these zones to a certain **position** of a given **page**.


In other words, a **page** contains **positions**. Each **position** contains any number of **zones**. The **zone_index** defines the order
in which the zones are displayed for a given position.

Note that a widget needs to be in a zone in order to be bound to the page (i.e. it's not possible to attach a widget to the page directly).






Zone alias
-----------
2021-03-02


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
_parent: Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base
zones:
    body:
        -
            name: zeroadmin_herograph
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeroGraphWidget
            widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeroGraphWidget
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
layout: templates/Light_Kit_Admin/layouts/zeroadmin/zeroadmin_main_layout.php
zones:

    header:
        -
            name: zeroadmin_header
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderWidget
            widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderWidget
            identifier: maurice
            template: default.php

    body: 
        -
            name: zeroadmin_breadcrumb
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminBreadcrumbWidget
            widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminBreadcrumbWidget
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
            widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/FooterWithButtonWidget
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


So here the layout file (i.e. **templates/Light_Kit_Admin/layouts/zeroadmin/zeroadmin_main_layout.php**) is defined in the parent,
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
        - z$:main_header    
    body:
        - z$:main_body    
        -
            name: zeroadmin_herograph
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeroGraphWidget
            widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeroGraphWidget
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
        - z$:main_footer
```


So here, we have three **zone aliases**:

- z$: main_header
- z$: main_body
- z$: main_footer

Each of these reference another file which contains the corresponding zones.
For instance the **main_header** alias refers to a **zone file**, which zone id is main_header, and looks like this:


```yaml
-
    name: zeroadmin_header
    type: picasso
    className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderWidget
    widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderWidget
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

- z$: $zoneId

With: 

- $zoneId: the zone id


Light kit editor uses the zone alias system instead of the template inheritance system, because we believe it's more intuitive and more flexible.



















