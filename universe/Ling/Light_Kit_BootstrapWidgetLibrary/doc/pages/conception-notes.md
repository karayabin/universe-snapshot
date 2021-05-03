Conception notes
==========
2019-04-25



So, creating my first widget library.
No widget code have been written yet, this is exciting.


Screenshot library organization, widget naming
===============

Before I even think of coding, I need to organize the widgets.

I know that I will start with boostrap widgets, because bootstrap makes it easy to create
web designs (it handles responsive websites very well, and has a lot of convenient css classes for us to use).

But that said, even in the bootstrap context, there might be a lot of widgets to create.

As I already said, I plan to create a website builder, where the user can add widgets on the fly.

And so the user shall be presented with a widget library at some point.

I like the idea that the user can see the widget before he installs it.
So, I need visuals for all the widgets.

Rather than doing all the visuals at the end, I'm taking the other approach where I create visuals as I go, keeping 
the todo list very low.

That's why I will screenshot all widgets. But how do I name those screenshots, how do I name my widgets?


Having learned about the bootstrap framework recently, I was following a bootstrap course on Udemy, and the author presented
us with 5 themes, and what I liked about that was that each theme was like an adventure with an identity.

The names were strange:
- Looplab
- Mizuxe
- Glozzom
- Blogen
- PortfolioGrid

But the good thing about that is that it's easy to remember.
I've seen various videos about human memory, and I believe that the more your brain has different views on a subject, the more it memorizes it. 

And so having a theme name can be one handle to memorize a widget name. 

And so, my idea is that the user somehow will be able to browse the themes, and by doing so she will memorize the theme 
name quite naturally. Then, I will name each widget starting with the name of the theme it comes from, so that the user can
say: "I remember that this theme has this sick widget that I want, so I will search for a widget from that theme",
which basically helps the user finding a widget.

But the theme name is not all. I also noticed that in bootstrap, we can describe almost all widgets in terms of how many columns (or rather vertical divisions should I say) they use. If it's just one column, I will not mention it, because there
are so many widgets with just one column, but if it's two or more columns, I will put that in the name as well.

The number of column is based on the extra large view (because on smaller views, the columns might stack to one, which is not useful
for naming the widgets...).

This naming convention assumes that the widget's number of columns is static.
Now if the widget handles dynamic columns, it should have the word dynamic_columns in it instead.


That's another vector for the user to use when searching for a widget.

- Mmmm, (she might say), I remember that the widget I want has two columns, so I can start typing "two_columns" and the search helper will help me... (and she would be right).


And finally, the screenshot, the visual, which gives a pretty good idea of what the widget looks like, and if the user has 
browsed it before, it's probably the most efficiient memory trigger: "Aha, I remember this widget", she might say.

The only thing better than a visual is seing the widget live in action on a website, which should also be an option somehow (I don't know yet exactly how, maybe simply a button next to the visual: "See it in action"?).


I also try to spice up the names with some keywords representing the features (at least what I consider to be a feature), and so I will use keywords like:

- main_nav, the widget top navigation bar
- parallax, if the widget uses the parallax effect
- header, if the widget looks like a horizontal header
- signup_form
- newsletter_signup
- teaser, my custom name for a showcase-ish thing
- photo_gallery
- carousel
- showcase
- pricing_table
- accordion
- faq
- cards
- blog
- our_staff
- contact_form
- duo_tone, if the widget uses only two colors
- right_aligned
- modal
- sidebar, if the widget is contained in a sidebar
- action_buttons
- avatar
- progress_bar
- ...

Add to that list the name of some js libraries if they are used by the widget, for instance

- slick, slick carousel
- ekko, although that might be superseded by a simple photo_gallery keyword


That's because if the user doesn't use those, maybe she pays a webdev to make her website, and so those keywords might
be useful to the webdev...


In fact, the name of the widget almost looks like a humanized list of keywords put together. 


So, armed with this naming rules, let's name some widgets and take some screenshots...


Here is an example of widget name:

- glozzom_two_columns_teaser_with_overflowing_image



Also, for the size of the screenshot, I try to be consistent by resizing the browser to a 1600px wide window.

Note: using Firefox capture screenshot ability, combined with clean bootstrap markup makes it trivial 
to capture the precise widget area.



Integration in a Light application
===============



Following the [Light application recommended structure](https://github.com/lingtalfi/Light/blob/master/doc/pages/light-application-recommended-structure.md),
it makes sense to put our widget templates in the **$app/templates/Ling.Light_Kit_BootstrapWidgetLibrary** directory.

Our library will probably only use [Picasso widgets](https://github.com/lingtalfi/Kit_PicassoWidget),
and so for the sake of simplicity, we will put all our "widget" directory structure in the **$app/templates/Ling.Light_Kit_BootstrapWidgetLibrary** directory,
rather than trying to separate the "widget" directory files in perhaps more semantically accurate locations.


Now the **widgetDir** property of the [picasso widget configuration array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array)
is meant to be overridden by the user for quick testing, so we cannot monopolize it.
But we still need to advertise the Picasso widgets that we will be using, by default, a widget directory of our own, and not the
directory next to the widget class file.


So we can basically do something like this: set the **widgetDir** value only if it's not already set by the user.

This approach simply requires a kit widget conf decorator that this planet could provide.
But for now, the widget conf decorator approach is considered too risky, and so we will require the dev
to manually write the widgetDir (this should contribute to a more robust application in the end). 

And so the widget classes will be located in this planet's repository, in:

- Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/MainNavWidget.php for instance


And, the "widget" directories will be copied to the light app in:

- templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/MainNavWidget for instance (so this directory IS the widget dir)










