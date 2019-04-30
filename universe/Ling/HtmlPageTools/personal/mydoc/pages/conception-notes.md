Conception notes
=======
2019-04-23




The main idea
-------------

My first idea was to implement a fully dynamic system, where you had to inject the assets one by one, basically,
something like this (pseudo-code):


```php
h->addTitle( my title )
h->addMeta( viewport, "width=device-width, initial-scale=1.0" )
h->addMeta( blabla )
h->addCssLibrary( /path/to/style.css )
``` 


But then, the more I thought about it, the more I found that there is not just ONE fit all html page structure;
for instance, some people like to put certain types of meta before the title (metas like the charset, or those which refresh the page),
some people like also to put the responsive meta (device) before the title, some other after.

What about the X-UA-Compatible meta, and the robots meta.

The meta tag only has a lot of different attributes, here is a non exhaustive list:

- charset
- name
- content
- http-equiv

 
Then the css stylesheet also has a lot of potential attributes, 

- rel: stylesheet or something else
- href
- integrity
- crossorigin

Some people will use integrity and crossorigin, while someother won't.


And so my point was that it would become tedious for a developer to convert an html template 
into calls to the HtmlPage object (like in the first example).

So I thought of a second idea, which I prefer, which basically is more webdev friendly, 
as it let the developer simply inject the bits of the htmlPage that she wants in some special
files:

- top 
- bottom

So basically with this new idea the concept is that the top part contains the doctype, the html tag,
and the head tag, and potentially the opening body tag (I've not decided yet).

And the bottom part contains just the end body tag (along with all the javascript that might
be injected just before that ending body tag), and the ending html tag.

And of course there is the body part in the middle.
And the main idea is that the top and bottom use files.

So now the implementation looks like this in pseudo-code:


```php
h->setTopFile (f)
h->setBottomFile (b)
```

And here is an example top file:

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"/>

    <?php
    foreach assets as asset
        echo asset
    ?>

    <link rel="stylesheet" href="css/style.css">
    <title><?php echo h->getTitle(); ?></title>
</head>

<body>

```


Now I see many benefits with this approach:

- we have more flexibility as far as where we want to inject elements of the HtmlPage object
- it's easier to convert an html template, since we can use copy paste for the most part


This gets even better in the bottom part, where we can inject jquery snippet code if we want,
so here is an example bottom file:


```php


<?php
foreach jsScript as script 
    echo script
?>

<script>
    $(document).ready(function () {
        
        <?php
            foreach getJsSnippets( jquery ) as snippet
                echo snippet;
        ?>
        
    });
</script>

```


As you can see, we have a great deal of flexibility here.
If we didn't have this, and we wanted similar functionality (injecting jquery snippets),
we might need to modelize an oop JsSnippetHandler object, a lot of oop in perspective,
which I'm not a big fan of. 

I believe that an HtmlPage object should be closer to the html developer
than to the php developer, it should be a tool, like bootstrap is a tool for creating web pages
rapidly, and not a pain in the ass.


And so I choose this design for the HtmlPage object.

Now as you can see those are just rough ideas, so I need to organize them, but that's the core of it.


UPDATE:
And in fact, the more I think about it, the more I don't need the setTopFile and setBottomFile methods.

Those are actually just my personal main implementation idea, but the HtmlPage object can be lighter and
don't take part in this implementation, it can just provide the variables. So this way the HtmlPage object
is simple, and how we render an html page using the HtmlPage object is another topic for another planet.  

 


About css
----------

Now to be honest, my only goal is to create a tool so that I can implement my website builder later,
and so I'm aiming at a tool which will be used in a widget environment.

In other words, the page will be built dynamically (the user will create pages by adding widgets
on it, she will compose the page).

And so some widgets might use assets, and I'm interested only in managing those assets.

With the top/bottom new conception, the idea is that the writing of the head is delegated mainly
to the developer.

Now in general, a web dev will include the css in the head, and she will usually include links (not inline css).

I don't want the HtmlPage to handle inline css for now, as it would add complexity to this object.
At this stage of the conception I believe it's way too early to think about that, especially when
I don't have a concrete use case for it. 

So generally, the big css library(ies) will be called first.
I will go as fas as saying that generally only one big css library is used.

For instance: bootstrap.

Then, we should include the css libraries used by the widgets.
For instance, ekko lightbox css.

Then finally, the user's overriding custom style.css.

So I believe the css structure will look like this (at least I know that for most if not all of my projects
this would be the case):


- big css libraries 
- css libraries called by widgets 
- user custom css

And so the good thing with the top/bottom design as far as the implementation,
is that I only need to handle the css libraries called by the widgets, the other parts are the
full responsibility of the web dev (as they won't generally change from one page to the other,
and if they do, well the web dev can simply create another template with some other top/bottom files).



And so to simplify things, I will assume that rel=stylesheet is always a desirable attribute.

Which leads me to:

h->addCssLibrary ( libName, href )
h->addCssLibrary ( ekko, https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css )


Now why the libName? that's just to avoid conflicts between libraries.

It is possible that two different widgets on the same page use the same library, and I don't want
that the user accidentally finds herself with a page with the css library called twice (or more)
on the same page, so in other words, the HtmlPage should handle libraries conflicts.




Handling libraries conflicts, my implementation
-----------

Now this is perhaps not the best implementation, but I came up with this idea which I like:

```php

if false === h->hasLibrary( ekko ):
    h->addCssLibrary ( ekko, https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css )
    h->addJsLibrary ( ekko, https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js )
    h->addJsSnippet ( 
     
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
    )

```

Actually, the js snippet should come from a file, for more readability and organization, but for the sake of this example
I added it inline.

Now as one can guess, this code is presumably called from a widget.
It's basically the part of the widget code that registers the assets to the HtmlPage.

Note: it is assumed that the HtmlPage is distributed as the main htmlPage service and is used by all widgets by convention.


A couple of things to note with this design:

- if you add only a css library, it will register the library (hasLibrary will return true), and this is also true if you register only the js library,
        so that's the thing I'm not terribly fan of in this design, it's that it's kind of imprecise.
        But I believe it's more practical than:
        
        
```php

if false === h->hasLibrary( ekko ):
    h->registerLibrary ( ekko , 
            css = https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css,
            js = https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js

```        

You see, I'm not fan of that last bit, because it kind of closes the possibilities. For instance, I cannot register the js snippet,
unless I extend/stretch the method, that sounds painful already.

So, choosing the lesser of two evils, I prefer the first approach, more imprecise, but more trivial in a way, and 
perhaps more robust as well.


- I like the idea of checking whether the library is already included, because then I don't need extra checks for duplicate inside the addCssLibrary 
    method (basically trusting that if the user calls the add method, she knows that something will effectively be added without condition), so, I will implement that.

 


About Js libraries
-----------

As for now, being a few hours only inside the conception, I will not implement, or even think about implementing some fancy things.

A good thing that comes from the top/bottom design though, is that the user decides where she injects the code, so I don't have
to implement a zone system, where the user can choose in which zone she wants the code to be injected.


So I came up with the idea of context. But let me first draw a picture before I explain this further.

Some people like their js in the head, some prefer at the bottom (before the body end).

Note: it's recommended to put them in the bottom.

Some other people will use both locations. For now, I will not deal with this case, which from memory doesn't have
a functional issue, it's just a matter of preference (not 100% sure though, but for now I will not deal with that).

So basically, widgets will have two methods at their disposition:


- addJsLibrary (libName, src)
- addJsSnippet ( snippet, context = js )


Now the addJsLibrary works the same as the addCssLibrary, which I talked about in the previous section (so I'm not 
talking about that again).

But the addJsSnippet method (perhaps addJsCodeBlock was a better name?) has the interesting context parameter.

It basically allow widgets to target a context: js or jquery are the only two contexts I can think of right now,
but if you use some other js frameworks which need to wrap somehow the js code pertaining to them, you
could add some other contexts... 

A context is just a string, and the dev creating the top and/or bottom file will call that string again
and inject the snippet collection wherever she wants.

So, that's the beauty of it: with one method, we handle all possible kind of snippets. I like that. 



So, to be more concrete, here is an example of a raw bottom file (I learned bootstrap 4 those last three days, so I'm all
bootsrap now):


```html
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<script>
    $(document).ready(function () {
        $('.port-item').click(function () {
            $('.collapse').collapse("hide")
        });
    });

    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
</body>

</html>

``` 


And so a bottom file created by a dev for that template could look like this:


```php
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>


<?php
foreach h->getJsLibraries() as lib 
    echo lib
?>


<script>

    <?php
    foreach h->getJsSnippets(js) as snippet 
        echo snippet
    ?>


    $(document).ready(function () {
        $('.port-item').click(function () {
            $('.collapse').collapse("hide")
        });

        <?php
        foreach h->getJsSnippets( jquery ) as snippet 
            echo snippet
        ?>
    
    });

</script>
</body>

</html>
```

Well, actually I'm not 100% sure if the context is useful at all, since repeating ```$(document).ready(function () {```
shouldn't be too much of a pain for the perfs and for the typing.

Maybe I will start without the context, and add the context later, only if I really need it.

 




Synthesis
--------

By reading all my messy thoughts above, I can try a first synthesis of what HtmlPage is:
HtmlPage is an object that captures and serves back what's specific to a given html page (assets, meta title, meta description, ...).
It's used as a medium object between the widgets and the html page renderer in a widget oriented application.


I will also rename the object HtmlPageCopilot, as my intention is now to help rendering the page, but the object will not have 
the render method as I intended to in the first place.


 

About rendering
-----------
Here is how I envision rendering using the HtmlPage (note to my future self):

```php
h->setTopFile ( f ) 
h->setBottomFile ( b )
h->setBody ( s )
h->render ( ) 

```

That's just the gist of it, but the only reason why I didn't implement it yet is that I don't like the setBody method:
the body would be a long string, and I feat to pass a long string as an argument of a method (I don't know why, maybe it's not
a big deal, but passing a long string to the stack, I don't know how it's handled, my intuition is that it's more heavy to handle
as passing a simple short string). 
So, I let the implementors do the job inside an application aware class, so that the setBody method can be dropped and replaced inside
the render method by a specialized method which renders/prints the body directly rather than storing it first, and then rendering it.


Apparently, storing a long string only affects the memory: https://stackoverflow.com/questions/11136491/php-very-long-string-support.

So, I might do a dummy implementation, but an implementation on the application side would probably still be a better solution.


On second thought, I can simply avoid the problem with this:

```php
r->setHtmlPage (h)
r->renderTopFile ( f )
// let the application print the body content here...
r->renderBottomFile ( b )
```

And so, the top file would contain the opening body tag, and the bottom file would handle the ending body tag,
so that the application body content will just need to handle the content INSIDE the body tag (for instance).

Let's do that.



More about css
-----------
2019-04-29

In a widget oriented application (WOA), how do you handle css?

A common idea is to create one stylesheet, that contains the whole css code for the theme. 
And so all css code, be it specific to widgets or not, would be there.

However, one of the thing on my agenda is to create a website builder, which means that the user will effectively compose
a website by adding/removing widgets on the fly, whenever and wherever she sees fit.

So how do we handle css in this case?

An intuitive idea is the following:

- first, all widgets register their specific css code to the copilot
- then, the application retrieves all those css code blocks and generates a "widgets-compiled.css" stylesheet.


Another idea is to create a css stylesheet that would encompass the styles of all widgets: those already created,
and those yet to be created. 
But I don't like this idea too much, because it constrains somehow the freedom/creativity of the webdev, as far as
the design is concerned. 


We can't deny that some widgets might have some specific css needs, just as some of them require some specific js init,
and so the first solution seems to me to be the more appealing.

In some cases, we can get away with writing the css code inline, along with the html code for the widget,
but this gives us a parasited html code, which can be more or less a big deal, depending on how purist you are with html/css separation.

Anyway, it's always a fallback option to write the css code directly with the html code of the widget, but I wanted to provide
the option of doing the html/css separation "the right way", for those who want to do so, and so by implementing this feature
in the copilot, I'm doing the first step in that direction.

Since we already have an addJsCodeBlock method, I will add an addCssCodeBlock method, just for the sake of consistency and intuitiveness. 

 




