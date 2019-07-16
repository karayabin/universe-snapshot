Conception notes 
========
2019-04-24



* [Going deeper with widgets: the picasso widget](#going-deeper-with-widgets-the-picasso-widget)
    * [A planet can provide multiple widgets](#a-planet-can-provide-multiple-widgets)
    * [Using templates](#using-templates)
    * [Using js files](#using-js-files)
    * [Using css decorator files](#using-css-decorator-files)
    * [The picasso widget configuration array](#the-picasso-widget-configuration-array)
* [The variables description idea](#the-variables-description-idea)
* [The css skin idea](#the-css-skin-idea)
* [Dynamic nuggets](#dynamic-nuggets)
* [Presets](#presets)
* [Aliases](#aliases)
* [Caching](#caching)
* [Passing dynamic data down the pipe](#passing-dynamic-data-down-the-pipe)



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
----- js/
--------- default.js        # can be any name, but it's the same name as a template
--------- default.js.php    # use this instead of default.js to turn the file into a dynamic js nugget
----- css/                  # this directory contains the css code blocks to add to the chosen template
--------- default.css       # can be any name, but it's the same name as a template
--------- default.css.php   # use this instead of default.css to turn the file into a dynamic css nugget
----- presets/              # the (widget configuration) built-in presets for this widget.  
--------- preset_one.byml   # an example preset file  
```


Note: the widget directory could also be placed elsewhere, which would be useful in a plugin oriented application, so
that the plugins can copy the **widget** dir in the application scope, so that the maintainer of the app can modify those
files by hand without having to modify the plugin itself (for instance).



So the main ideas here are:

- a [planet](https://github.com/karayabin/universe-snapshot) can provide multiple widgets
- the use of templates
- the use of js files
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

### Using js files

In the picasso approach, we like to put js scripts at the end of the html page, just before the closing body tag.
In there, we also put the js code for the widgets that need such initialization code.

The idea with the js files is that when the template is loaded, the initialization js code blocks are also automatically
loaded (via the use of the Copilot object from the [HtmlPageRenderer](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md)).

The main benefit of using js-init files is that we use js files, and so the writing of initialization code is easy (because
your IDE will provide you with the correct js syntax highlighting).

Now with this system, the js init file name must match the template name.


Now if you need to leverage the power of php in your js nugget (aka js file), add the **.php** extension.
This will turn your file into a [dynamic nugget](#dynamic-nuggets).



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

Now if you need to leverage the power of php in your css nuggets, add the **.php** extension.
This will turn your file into a [dynamic nugget](#dynamic-nuggets).




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
# The js init file to use. 
# If not defined, it defaults to the template name. 
# If it's defined, it indicates the js init file to use.
# If null, this means use no js init file at all (the user probably wants to take care of the js by herself)
?js: null                        
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



Dynamic nuggets
---------
2019-05-03

First of all, what's a nugget?
It's an alias for either a css code block or a js init code block (I found that the word nugget it was easier to remember
than code block, but those are the same things).

In other words, a nugget is a piece of code that is collected during the zone capturing phase (by the Picasso widget handler instance),
it is merged with other nuggets to form a bigger piece of code, which is injected somewhere in the final code.

So for css nuggets, we generally inject the compiled code in a css file referenced in the head tag of the html page (usually with
the help of a cssFileGenerator object).

And for js nuggets, the common practice is to inject the compiled code inside a script tag just before the 
body tag (of the html page) ends.


As written earlier, the nuggets are located in the **widget** directory of a picasso widget,
and they have the same name than the template currently being rendered, but with the css or js extension.

The only problem with nuggets so far is that they cannot access the widget variables.
Yesterday, I was creating a widget, and I wanted to provide the user with the possibility to change the background image.

To me, it's cleaner to operate the background image from a css file (rather than inline), so I wanted to inject
the background image property to the nugget, but I couldn't, because css cannot use php variables by default.

Well, that's why I created dynamic nuggets.

To transform your nugget into a dynamic nugget, just add the php extension to the nugget file.
So for instance, your **default.css** file becomes **default.css.php**, and/or your **default.js** file
becomes **default.js.php**.

Once you've done that, you can use php inside your file, because it's rendered exactly like a widget would.
The template engine used by the PicassoWidget is the [ZephyrTemplate Engine](https://github.com/lingtalfi/ZephyrTemplateEngine),
which is the fastest and simplest php template engine I know of.

 
And so all the front widget variables are accessible via the **$z** variable, simple as that.

So with the power of php in my fingertips, my css problem is easily solve: here is an excerpt of the css file for the widget
I'm working on:

```css
.kit-bwl-2c_signup_form {


    position: relative;
    background: <?php echo $z['background_style'] ?>;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    min-height: 700px;
}

```


Note: I reckon that not letting the user choosing her template engine is a design mistake, and in a future, 
if other people have a need for it, it should be fixed (i.e. you should be able to change the template engine bound to a picasso widget).
But for now, it's just me on the project, and zephyr is by far my favorite template engine so... 



Another thing to remember, the context for dynamic nuggets is the PicassoWidgetHandler object, and so using the **$this**
variable, you can access all its variables (even the protected or private ones), and so if for some reason you need
the layout variables or the widgetConf array, you can use **$this**. 




Presets
==========
2019-05-06

I open the conception note here because I'm thinking about it now, but the concept of preset is actually much deeper and extends
way beyond the Kit_PicassoWidget. In fact, the concept of preset that I have in mind right now applies to the whole site builder conception.

But you've got to start somewhere.


So, the goal of the preset is to provide the user with some pre-made configuration snippets that the user can activate in one click.
This saves a lot of time for the user, depending on the type of preset that we are talking about.

For instance, to configure a picasso widget of type accordion, where you want to define each accordion item manually,
and depending on how customizable the widget is, it might takes about from 1 to 5 minutes to just configure one accordion correctly.

The use case for presets that I had in mind was in a website builder, the user can simply click on different presets to see what the widget looks like
when configured properly, and when she likes a preset, she validates her choice and applies the preset.

That works for widgets (or will work, as I am about to implement preset in Kit_PicassoWidget), but the concept of preset also works on bigger objects.

For instance, we can have page presets. The time saved becomes huge all the sudden (about 5-6 widgets for a simple page), so 5 to 25 minutes saved per page preset.

What about websites preset (for instance a blog contains this page and that page...): we can literally save hours of times for the customer, so definitely a concept to investigate.

While I'm at it, let's put down my two cents thoughts about presets:

They are two kind of presets:

- built-in presets (the presets are created by the authors of the plugins/widgets/...)
- user presets (created by the user for her own convenience)

That sounds obvious, but the user presets are attached to the user id somehow, and are not shared to all users.
And so in terms of babyYaml organization (I'm not discussing database organization yet, because the database part should be more obvious to implement),
I believe that user presets should be in a specialized directory at the root of the app, like this:


```txt
- app/presets/ 
    - users/
        - widgets-presets/  
        - page-presets/  
        - site-presets/  
```

Whereas for built-in presets, I have no recommendation yet, but as far as PicassoWidget is concerned, I believe that storing them
in the widget dir is a good idea (makes it easy for the maintainer to access the preset list if she wants to change something). 
 

2019-05-11: Today it's a day off for me, but I just wanted to write some morning thoughts I had about presets, because they are VERY IMPORTANT.

- PRESETS DON'T ADD ANY COST IN RUNTIME !!!

A preset is like a copy paste operation that the user does during the configuration of her website.

When the page is rendered, the preset is already written in the configuration and nobody can tell whether a preset was used or not.

Usually in terms of implementation, we imagine a gui connected to a database, which provides the user with a list of presets.

That works just fine with the database.

With the babyYaml implementation, we can do the same if we write directly into the file, or we can just let the user copy paste
the snippets manually (if I'm too lazy to implement the first idea), if that's ok with them. For instance, that's ok with me, because babyYaml is a developer format in the first place:
it's a format for people who put their hands dirty, and so a copy paste is just a simple operation. 

Ok, I'm out.
 


 
Aliases
-----------
2019-05-14


If I project myself in the future, and put myself in the shoes a a website builder user, creating her pages, 
then at some point there is a functionality that the user should have: the possibility to create aliases.

What does that mean?

In simple terms, an alias is just a reference to something else.

Apply this to widgets, and all the sudden you can create a widget once, and reference it as many times as you want,
exactly like symbolic links on linux.

What's the benefits of aliases for the user?

The benefit is quite simple to understand: imagine that the user creates a multi-pages site.

It's very likely that the footer will be the same. The main nav is could also be exactly the same (depending on whether the active
link is set dynamically or statically via the configuration).

So the benefit of aliases is that the user can modify ONCE the footer to get an updated footer on all the pages (using the footer) of her website.

That sounds a very nice feature to have for the user.

However I've something to say about that:

implementing a real alias system would add more complexity to the kit thing, and at this point of development, I think I've had enough with complexity:
the skin/js/nugget/presets system is already almost messy, and probably super powerful, and it needs (I believe) to be tested in the wild before any decision about adding new features
can be made. 

I want to first deploy the kit system with this messy system, so that I can adjust/fine-tune/clean-up the system first.

And so I've found a possibly better solution than a real alias system: a fake alias system.

That's how I want to implement it, because it doesn't add complexity to the kit picasso widget system.

How does the fake alias system work?

Well, in terms of gui, you can do something that looks like the real alias system, but in the background, rather than using real aliases,
just let the computer copy the widget configuration on all pages.

The effect is exactly the same, except that the computer has a very little tiny bit more to do than with real aliases, but the complexity of 
the kit picasso widget is lower, which is totally worth it I believe.

So, even if the kit picasso widget system was already clean, I would still go with the fake implementation because it maintains a low level of complexity.




Caching
-------------
2019-05-16


One of the most important topics in my opinion is the caching system you use.

What follows is my two cents about implementing a caching system for PicassoWidget.

The most efficient caching, if you can, is to cache the whole page. 

But sometimes, this might not be an option. For instance, if the user is logged in,
and the header nav has the name of the user in it, or if the left menu in the user account
reflects the user items, etc...

In those cases, it might still worth to implement a caching system based on the widgets rather
than the whole page.

Because the page load time might be faster if some widgets are cached (I believe).

So, how do we go about implementing a widget based cache?

Well, I thought of different solutions this morning, one of them being to render the whole
page, then preg replace the dynamic ones, but that seemed not very practical and risky,
and so I eventually came across another idea that I present to my future self as the one 
I would like to be implemented.

But before I go, quick reminder: in kit a widget has actually multiple parts (and that's the
main difficulty): the widget itself, but also assets/nuggets registered via the copilot and
which end in the head of the page, or at the bottom part just before the end body tag.

So, potentially three parts (head, widget, body end).

Now my idea is quite simple actually: cache 2 different files:

- the widget file containing just the widget html code
- an asset dependency file, containing the code which registers the assets to the copilot
    (and not directly the assets), so that we get the opportunity to resolve assets conflicts.
    
So basically, the synopsis in this case (where the whole page can't be cached) is that
each widget gets cached and gives 3 files (at most).

And so when the application reads such a page, it basically does 3 if conditions per widget
(which I believe is faster than interpreting the whole widget, and that's the the effective incentive
of this idea), and if the file exists, they are included.


In order to implement such a system, I believe that we need some kind of copilot that resets itself
after each widget, so that we can cache the widget resources in the first place.
But my job is over for today, the rest is left to the implementor.


Also, I forgot to say, the widgets shouldn't use the copilot except for the assets;
so they shouldn't for instance try to set the meta title, or other metas, or otherwise the system I described above
needs to be adjusted (plus, it doesn't make much sense to set the meta title from a widget). 


      




Passing dynamic data down the pipe
-------------
2019-07-03


When you want to inject dynamic data to a template, you can use a pageConfTransformer.

The DynamicVariableTransformer allows you to create a variable from the controller and reference it in your template
using the ${tag} notation. More details in the source code of the [LightKitPageRenderer:renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md) method.

The LazyReference method call system alleviates the controller, and let you call any class directly from the template, 
using a special notation.

Note that the first technique has the most flexibility, since the controller potentially has access to any data it wants,
whereas with the second technique, you are limited to what can be written in a string.
I would recommend that you use the dynamic variable system for any data that belongs to an user, and optionally use
the second technique when the data is anonymous and predictable.



























