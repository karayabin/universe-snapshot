Conception notes 
========
2019-04-24 --> 2019-07-25




* [The concepts used by Kit](#the-concepts-used-by-kit)
* [The kit configuration array](#the-kit-configuration-array)
 * [Comments](#comments)
 * [About type](#about-type)
* [A Babyyaml implementation of the kit configuration array](#a-babyyaml-implementation-of-the-kit-configuration-array)
* [Database vs BabyYaml?](#database-vs-babyyaml)
* [Capturing the zones](#capturing-the-zones)
* [Implementing the ConfStorage object](#implementing-the-confstorage-object)

         
         
         

The concepts used by Kit
-------------

Kit is a system to render widgets in an html page.

It uses the following concepts:

- page
- layout
- zone
- widget



The page is the biggest container, it contains everything and represents an html page.

A page uses a layout, which is like the html skeleton of the page. 

A layout is a php file, which content looks like an html file, but which includes zones.


Note: the layout file also uses the [HtmlPageRenderer](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md) from the [HtmlPageTools planet](https://github.com/lingtalfi/HtmlPageTools) to
render the top and bottom of the html page. And so Kit borrows [the concept of top and bottom](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md#the-top-and-bottom-concept) too.


A zone is like a placeholder for widgets. The developer will attach widgets to a zone.
She can attach as many widgets as she wants.

And so, by assigning the widgets to the different zones of the layout, she composes the html page.


The widget is the smallest unit in Kit: it's an html code block representing an identifiable element on the html page.

For instance, a menu nav bar, or a list of blog posts, or an advertising in a side bar, ...


The kit configuration array
-------------

To actually render a page, we need to pass a configuration array to the KitPageRenderer object.

In this document, I will use the [BabyYaml](https://github.com/lingtalfi/BabyYaml) notation for representing arrays (for readability purpose).


Here is the configuration for a given page (variables are preceded with the dollar symbol):

```yaml

label: $pageLabel               # The human name for the page. It is used in error messages.                 
layout: $layoutRelPath          # The relative path to the layout file for this page. The path is relative to a root which shall be defined in the general configuration of kit. Generally, the app directory.
layout_vars: []                 # an array of layout vars that will be accessible to the layout (a layout might be configured to some degree by such variables, depending on the layout)
zones:
    $zoneName:                  # note: the zone name is called from the layout file 
        -   
            name: $widgetName       # the widget name
            type: $widgetType       # the widget type
            ?active: $bool          # whether to use the widget, defaults to true
            ...                     # any other configuration value that you want 
                         

```


Important note: when a zone is configured in the zone section, all the widgets contained in that zone will be processed,
even if you don't use them in your layout. 
So, make sure that your layout uses all the zones defined in this configuration array, otherwise you would process widgets
that aren't actually used (waste of performance).



### Comments

On a design level, I wanted us to be able to re-use zones from one page to the other.
And I first thought that the zones shall be configured at a more abstract level.
But after thinking again, I now believe that simplicity is the master, and so I define the zones in the page where they
belong, and re-using a zone will actually be a duplication performed by gui interfaces or other more sophisticated 
apis (sort of a courtesy tricks for the lazy humans that we are, but it should not corrupt the simplicity of my design).

And so with zones in the page configuration, yes, there will be code duplication, but in the end we will have a more robust 
and intuitive application (I believe).

The $zoneName array is a numerically indexed array, and the order of the elements in this array defines the order of the widgets
on the page. Note that the same widget can be used multiple times on the same zone (hence the use of a numerical array vs an array using
the widget names as the keys).



### About type

Now I hesitated before committing the type system.
The other option I was going for was a system where the page renderer would guess the widget type, using a WidgetHandler object
with a isHandled method.

Then I thought about the consequences in term of design.

The only benefit I could think of with a guessing system is that it saves us from typing an explicit type.

But at the same time, it makes the system more obscure/unpredictable, since the type is not explicit.

So, for the sake of the system robustness, I decided that I would go along with the explicit type, which is redundant and boring
to type, but at the same time participates to the robustness of the system.

Plus, since we don't need to guess, it's a little faster performance wise. 






A Babyyaml implementation of the kit configuration array
--------------

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




Database vs BabyYaml?
---------
2019-04-24


Now unfortunately I don't have any answer to this question yet, as fas as which solution is faster/more efficient.

But I wanted to put down the question mark so that I don't forget.

I personally like babyYaml, being a developer, using the IDE all the time, so I'll start with that.

Later, I will implement a mysql version, to see if a system is better than the other.

 
 




Capturing the zones
---------------
In version 1.1.0, I made a mistake with the implementation of the KitPageRenderer.

Basically, I just called the layout, which contains the calls to the printZone methods, 
assuming that everything will display nicely in the end.

Well, that was totally wrong, because I forgot that the widgets are actually feeding the Copilot object,
and that the top and bottom parts, which are inside the layout, are fed by the Copilot.

In other words, there is an order of execution which I forgot about, and this order is:

- first call the widgets
- then call the layout

Now the idea of the fix (in 1.2.0) is that I capture the widget zones in the first pass,
so that I then can call the layout as before. 

Then the printZone methods will just call the pre-cached zones.

Now to know which zones to capture, I thought about using a regex that would parse the layout, but that would fail
if the user decides to use dynamic names.

So after thinking about various solutions, the simplest solution that occurred to me was to simply use the zones 
from the page configuration array.

The only drawback with this technique is that if for some reasons the user removes a call to a zone from the layout,
but doesn't remove the corresponding zone in the configuration, the zone will be processed nonetheless (i.e. it will have 
a performance cost depending on the widgets in the zone).

In other words, with this conception, any zone configured in the configuration file will be processed.




Implementing the ConfStorage object
---------------
2019-04-25

As I said earlier in the [Database vs BabyYaml? section](#database-vs-babyyaml), I intend to test both systems: 
babyYaml and database, to see which one stands better.

This means I have to create an abstraction layer in the meantime for accessing the configuration (even
if I personally just use the BabyYaml version).

So, as far as getting the information, I believe only one method will be necessary: getPageConf, which returns
the whole page conf as described earlier.

Now what about writing data?

My goal being to create a website builder, meaning basically the user will operate a gui, which in turn will
update the pages configuration.

So in other words we need to be able to WRITE to the page configuration programmatically.

If it was only for BabyYaml, we could basically retrieve the whole page conf, and then target the particular 
data that we want to update using the Bdot access tools.

However, databases are organized differently, and methods like this one:

```yaml
- update(zones.$zoneName.$widgetIndex.name, $newName)
```

will not work.

So I believe the common denominator left is to create one method per gui action, basically.

So, if the user can change the page label via the gui, then we need a changePageLabel method, etc...

To update a widget, we will use the concept of widget id, which is the page.zone.widgetIndex combo.
Note that the widget name doesn't matter.

As I said, I'm not 100% sure if I want to use a database for kit, so I will start with a simple interface
with just the getPageConf method, and add the setters when I need them, so that if I don't need it, I didn't 
waste too much time for nothing.





Adding the bodyClass
-------------
2019-07-25

I believe that we should be able to update the body tag css class from the page configuration,
so that for instance we can re-use two times the same layout, but with a different css class on the body tag.

So now the bodyClass property is treated by the KitPageRenderer. 














