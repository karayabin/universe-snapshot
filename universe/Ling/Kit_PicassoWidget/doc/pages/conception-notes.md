Conception notes 
========
2019-04-24



* [Going deeper with widgets: the picasso widget](#going-deeper-with-widgets-the-picasso-widget)
    * [A planet can provide multiple widgets](#a-planet-can-provide-multiple-widgets)
    * [Using templates](#using-templates)
    * [Using js-init files](#using-js-init-files)
    * [The picasso widget configuration array](#the-picasso-widget-configuration-array)



Going deeper with widgets: the picasso widget
----------------

Now as I said [earlier](https://github.com/lingtalfi/Kit/blob/master/doc/pages/conception-notes.md), a widget configuration depends on the widget.
I will create an implementation that corresponds to my needs, and I will name it Picasso, after the painter of the same name (don't ask me why),
just to pave the way and show that an infinite number of widget systems implementation are possible.

Now if you want to use the Picasso system, you're welcome.

The picasso system basically uses a php class and a file structure convention.

The php class must extend the PicassoWidget class, and must contain a widget directory right next to the php class, with the following structure:


```txt
- widget/
----- templates/            # this directory contains the templates available to this widget
--------- prototype.php     # just an example, can be any name really...
--------- default.php       # just an example, can be any name really...
----- js-init/
--------- default.js        # can be any name, but it's the same name as a template
```


So the main ideas here are:

- a [planet](https://github.com/karayabin/universe-snapshot) can provide multiple widgets
- the use of templates
- the use of js-init files


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


### The picasso widget configuration array

So, here is the configuration array for the picasso widget:

```yaml
className: $theClassName        # for instance Ling\MyFirstPicassoWidget\MyFirstPicassoWidget 
template: $templateName         # for instance: default.php, or prototype.php. This is the path to the template file, relative to the widget/templates directory next to the widget instance.
vars: array                     # An array of variables for the front widget to use
``` 


Again: I could drop the file extension in the name, to save us four characters per widget configuration array,
but I believe it's not worth it. 
Because today I use php extension, but I don't know about tomorrow.



Now since Picasso is the first widget system, I believe I will include it with Kit, so that the newbie user doesn't have to
fetch for a Picasso planet when she doesn't even know about kit (hopefully this is not a design flaw right there).
Actually you know what, I won't include it in Kit, because Kit is already complex enough by itself.