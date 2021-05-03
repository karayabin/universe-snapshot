Conception notes 
========
2019-04-24 -> 2021-04-09




* [The concepts used by Kit](#the-concepts-used-by-kit)
* [The kit configuration array](#the-kit-configuration-array)
* [A Babyyaml implementation of the kit configuration array](#a-babyyaml-implementation-of-the-kit-configuration-array)
* [Rendering a widget](#rendering-a-widget)

         
         
         

The concepts used by Kit
-------------
2019-04-24 -> 2021-04-08

Kit is a system to render a widget based html page.

It uses the following concepts:

- page
- layout
- zone (aka position)
- widget




The page is the biggest container, it contains everything and represents an html page.

A page uses a layout, which is like the html skeleton of the page. 

A layout is a php file, which content looks like an html file, but which includes zones.


Note: the layout file also uses the [HtmlPageRenderer](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md) from the [HtmlPageTools planet](https://github.com/lingtalfi/HtmlPageTools) to
render the top and bottom of the html page. And so Kit borrows [the concept of top and bottom](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md#the-top-and-bottom-concept) too.


A zone is like a placeholder for widgets. We attach any number of widgets to a zone.

By doing so, we compose the html page.


The widget is the smallest unit in Kit: it's an html code block representing an identifiable element on the html page.

For instance, a menu nav bar, or a list of blog posts, or an advertising in a side bar, ...


The main idea with kit is to have **independent** widgets that works together in a given page. 





The kit configuration array
-------------
2019-04-24 -> 2021-04-09


To actually render a page, we need to pass a configuration array to the KitPageRenderer object.

In this document, I will use the [BabyYaml](https://github.com/lingtalfi/BabyYaml) notation for representing arrays (for readability purpose).


Here is the configuration for a given page (variables are preceded with the dollar symbol):

```yaml

label: string, the human name for the page. It is used in error messages.                 
layout: string, the relative path to the layout file for this page. The path is relative to a root which shall be defined in the general configuration of kit. Generally, the app directory.
layout_vars: []                 # an array of layout vars that will be accessible to the layout (a layout might be configured to some degree by such variables, depending on the layout)
vars: []                        # an array of custom vars related to the page, put what you want here. For instance, a theme variable...
body_class: string, css class(es) to apply to the body tag
zones:
    $zoneName:                  # note: the zone name is called from the layout file 
        -   
            name: string, the widget name
            type: string, the widget type
            ?active: bool=true, whether to use the widget
            ...any other configuration value that you want 
                         

```









A Babyyaml implementation of the kit configuration array
--------------
2019-04-24


As we've seen, the kit configuration array represents a page.

If we use BabyYaml to store the array, we can simply create one configuration file per page, with the name of the configuration
file being the name of the page.

For instance, we could have a kit directory with the following structure:

```txt
- kit/
----- config.byml       # a general kit configuration file. Note: I'm not sure about that, maybe we don't need it.
----- pages/
--------- page_one.byml
--------- page_two.byml
--------- page_three.byml
```



Rendering a widget
-------------
2021-04-08


One of the main idea with kit is that each widget on a page is **independent**.

In other words, its configuration alone should be all it needs to be rendered.


Sometimes though, a widget needs to process user input data, for instance if the widget is a form.


In kit, in order to render a page, we have two phases:

- process widgets
- render widgets

During the **process widgets** phase, we give the widgets the opportunity to do the following:

- update the configuration so that it's more suitable for rendering
- process the input data if any

Both steps are optional, some widgets needs those steps, others don't.


At the end of the **process widgets** phase, our kit configuration array is basically fully completed, and ready to be rendered.


So then we execute **render widgets** phase, which is just a plain rendering of the widgets templates (which are dumb by convention).


One of the reason we use two phases instead of just one is that some widgets might require information to be updated first in order to render accurately.

For instance, imagine a **widget A** that displays the number of posts a user has. Let's say it reads this number from a table in the database, and displays 3 (for instance).

Now in the same page, there is a **widget B** which is a form to add a post, and so when the user submits the form a new post is added, and so the user now has a total of 4 posts.

If we had only one phase, given that **widget A** is rendered before **widget B**, **widget A** can only read 3 from the db, because the db is updated only when **widget B** is processed.

So by creating two phases, we don't have this problem anymore.


























