Conception notes 
========
2019-04-24



* [Going deeper with widgets: the picasso widget](#going-deeper-with-widgets-the-picasso-widget)
    * [A planet can provide multiple widgets](#a-planet-can-provide-multiple-widgets)
    * [Using templates](#using-templates)
    * [Using js-init files](#using-js-init-files)
    * [Using css decorator files](#using-css-decorator-files)
    * [The picasso widget configuration array](#the-picasso-widget-configuration-array)
* [The variables description idea](#the-variables-description-idea)
* [The css skin idea](#the-css-skin-idea)



Going deeper with widgets: the picasso widget
----------------

Now as I said [earlier](https://github.com/lingtalfi/Kit/blob/master/doc/pages/conception-notes.md), a widget configuration depends on the widget.
I will create an implementation that corresponds to my needs, and I will name it Picasso, after the painter of the same name (don't ask me why),
just to pave the way and show that an infinite number of widget systems implementation are possible.

Now if you want to use the Picasso system, you're welcome.

The picasso system basically uses a php class and a file structure convention.

The php class must extend the PicassoWidget class, and provide a "widget" directory, which by default is named "widget"
and is located right next to the php class, with the following structure:


```txt
- widget/
----- templates/            # this directory contains the templates available to this widget
--------- prototype.php     # just an example, can be any name really...
--------- default.php       # just an example, can be any name really...
----- js-init/
--------- default.js        # can be any name, but it's the same name as a template
----- css/                  # this directory contains the css code blocks to add to the chosen template
--------- default.css       # can be any name, but it's the same name as a template
```


Note: the widget directory could also be placed elsewhere, which would be useful in a plugin oriented application, so
that the plugins can copy the **widget** dir in the application scope, so that the maintainer of the app can modify those
files by hand without having to modify the plugin itself (for instance).



So the main ideas here are:

- a [planet](https://github.com/karayabin/universe-snapshot) can provide multiple widgets
- the use of templates
- the use of js-init files
- the use of css decorator files


###  A planet can provide multiple widgets

When I say planet, I mean any container really, but the planet is a container.
And so the idea is that since we don't have the widget directory at the root of the planet (or container), the planet
can provide multiple widgets (not only one). 



### Using templates

I decided to use templates for two reasons:
 
- it's easy to switch from a template to another.
- I personally like the prototyping approach for creating websites, where you first inject the html from a template, 
        and then make it dynamic using php code injection, and so starting by creating a prototype template (by copy-pasting
        from the original template model) is a methodology that I promote. 

### Using js-init files

In the picasso approach, we like to put js scripts at the end of the html page, just before the closing body tag.
In there, we also put the js code for the widgets that need such initialization code.

The idea with the js-init files is that when the template is loaded, the initialization js code blocks are also automatically
loaded (via the use of the Copilot object from the [HtmlPageRenderer](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md)).

The main benefit of using js-init files is that we use js files, and so the writing of initialization code is easy (because
your IDE will provide you with the correct js syntax highlighting).

Now with this system, the js init file name must match the template name.

The benefit is:

- simple conception, easy to remember

One drawback is:

- we don't have a fancy common.js file that would be called for every template for instance

But as always, I tend to prefer simple things over fancy ones, so I opted for the first mechanism (at least for now). 



### Using css decorator files

A widget template might have specific needs in terms of css.

It's always possible to write the css code directly inside the template, since html allows the style tag to be written anywhere.

However, Picasso widgets provides another option for those who prefer to have the widgets css code in an external stylesheet.

Basically, if you put a css file in the **widget/css** dir, the content of the css file will be memorized and written to a css file
called by the host application (obviously, your host application needs to be aware of that mechanism and implement it, otherwise
this wouldn't work).

So the idea with this system is that all widgets are parsed at once, and so the css code of all widgets get memorized, 
and is then written to one **widget-compiled.css** file (by the host application).

With this technique, your css code is nicely separated from the html code.

 




### The picasso widget configuration array

So, here is the configuration array for the picasso widget:

```yaml
className: $theClassName        # for instance Ling\MyFirstPicassoWidget\MyFirstPicassoWidget 
?widgetDir: $widgetDir          # absolute path to the widget directory. If not set, the widget directory is a directory named "widget" found next to the file containing the widget class.
                                # If set, and the path is relative (i.e. not starting with a slash),
                                # then the path is relative to the widgetBaseDir (set using the setWidgetBaseDir method of the PicassoWidgetHandler class)
template: $templateName         # for instance: default.php, or prototype.php. This is the path to the template file, relative to the $widgetDir/templates directory

# The css skin to use. 
# If the skin property doesn't exist, it defaults to the template name. 
# If it's defined, it indicates which skin to use.
# If null, this means use no skin at all (the user probably wants to take care of the css by herself)
?skin: null                         
?vars:                          # An array of variables to pass to the template
    my_value: 667  
?attr:                          # An array of html attributes to add to the widget's outer tag
    id: my_id
    class: my_class my_class2
    data-example-value: 668

``` 


Again: I could drop the file extension in the name, to save us four characters per widget configuration array,
but I believe it's not worth it. 
Because today I use php extension, but I don't know about tomorrow.



Now since Picasso is the first widget system, I believe I will include it with Kit, so that the newbie user doesn't have to
fetch for a Picasso planet when she doesn't even know about kit (hopefully this is not a design flaw right there).
Actually you know what, I won't include it in Kit, because Kit is already complex enough by itself.



2019-04-30: I've just added the attr property. I believe it should not be included in the (front) vars. 

attr is more a cosmetic thing, and hence it's part of the widget root configuration properties.
The attr parameter was originally implemented to facilitate the implementation of the website-builder system, as
described in my [conception notes](https://github.com/lingtalfi/Light_Kit_WebsiteBuilder/blob/master/doc/pages/conception-notes.md).




The variables description idea
----------------
2019-04-30

I was creating my first Picasso widget for the Light_Kit_BootstrapWidgetLibrary (MainNavWidget), and I thought
about this idea of creating a variable description file, which would basically be a file describing the vars of the widget
(accessible via the vars property of [the widget configuration array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array)).

The file looks like this:


```yaml

```

What's the purpose of that file:

- first, I thought that I could use it as a documentation for myself (like a memory), since the file has a structure, it's a first step towards
    a minimum level of consistency throughout all the widgets I will every build
- then expanding on this idea, I thought that I could use it to generate the documentation (using my doc builder tools in the LingTalfi planet...),
    which would concretely make all the widget documentation consistent all the sudden.
- also, I thought that I could generate some admin files: I plan to create an admin website for my kit based apps, like a wordpress backend,
        and so I anticipated that this admin would work based on some files describing the types of gui necessary to update the vars,
        basically those files would be used to generate the admin forms for each widget,
        and so with those var description files, I could generate a sort of blue print (yet to be completed manually), to save a lot of time too.
        Note: I'm not 100% sure how the admin would work though, that's just a speculation at the moment, but I still consider this as an argument
        as to justify the creation of those variable description files.
             
              
     


This discussion led to the official [widget variables description page](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/pages/widget-variables-description.md).



The css skin idea
------------
2019-05-02


The idea behind a css skin is that for a given template, we can choose from different stylesheets.

Each stylesheet is called a skin.

By default, the skin used is the skin which has the same name as the template (if such a skin exists).

Skins are located under the **$widgetDir/css** directory.


Sometimes, the user prefers to not use any css skin, for instance because she uses a general stylesheet coding for the whole theme
(including all pages and widgets). In that case, she can just set the skin to null, to disable it.

















