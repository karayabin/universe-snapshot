Conception notes
=============
2019-05-17





Summary
============
- [What's the mood now?](#whats-the-mood-now)
- [Feature recognition system](#feature-recognition-system)
- [One admin = one website](#one-admin--one-website)
- [The built-in website builder: iframe or responsive builder?](#the-built-in-website-builder-iframe-or-responsive-builder)
- [The attack plan](#the-attack-plan)
- [Back with the admin prototype](#back-with-the-admin-prototype)
- [The light kit admin features](#the-light-kit-admin-features)
- [Error handling](#error-handling)



What's the mood now?
---------------
2019-05-17

Today I just finished the Light_Kit_Demo, and so I've a few widgets to play with.

I think it's time to start thinking about phase 2: the admin.


The admin would basically allow us to create kit based websites using a gui.


I'll write in this document my ideas as they arise. 

Today is pretty much over, and, I'm not working the week ends, so I will continue next monday.

However, I've got a few ideas and a couple hours left before the week end, so let's dive in.






So far, here are the features I envision for the kit admin:

- created with kit 
- administrate/create kit website (websites based on kit)


And here are my implementation ideas so far:


- feature recognition system
- one admin = one website




Feature recognition system
---------------
2019-05-17


The admin is here to help us create website rapidly.
Efficiency, I'm obsessed with that, I want to create the most efficient tool to create website.

Anyway, what do I mean by feature recognition system?


The admin will detect whether or not there is already a website to administrate.

If the website does not exist, then it will present us with the page to create a new website:

- What kind of website do you want? ...

If the website already exists, then the admin switches to administration mode and let us configure the existing website.

See the "first steps into the gui" section to see what I have in mind at this point.



One admin = one website
------------
2019-05-17


One of the first question I had earlier today, while in the shower (aka meditation facility), was:

- how many websites the admin will be able to administrate

Indeed, I've worked in a company where the need to administrate multiple websites was a requirement at some point in time.

We can't deny that this is a concrete need that one client or even myself might have one day.

However, conceiving an admin that handles multiple websites already adds weight and complexity to the project.

So, I found a workaround I'm ok with for that problem: to handle multiple websites, we can add some kind of plugin
to our admin (a navigation widget at the top of the screen for instance) which allows us to navigate between the different admin websites.

And so, with that in mind, the kit admin planet can focus on administrating only one website.

So again, a top widget to navigate between different kit admins at the top (each admin has its own url), but each kit admin administrates only one website.  

Now that this is clear, we can focus on a "simpler" admin.



First steps into the gui
---------------
2019-05-17


That's the first important step.

I cannot see much into the future, but thinking about it, one of the few things I can envision right now is this (image is worth thousand words):


- https://lingtalfi.com/img/universe/Light_Kit_Admin/gui-sketch-page-configure.png
- https://lingtalfi.com/img/universe/Light_Kit_Admin/gui-sketch-page-edit-mode.png


So the basic idea is that we have the list of pages on the left, with some main action related to pages (Import, New, Delete).
And when we click on the page, we edit the page (either it goes to configuration mode, or edit mode, I don't know yet).

And so to edit the page, we have two modes:

- configure
- edit mode

The configure mode allows us to configure all the properties of the page configuration not pertaining to widgets,
so things like the meta title, the page name, the description, the layout, etc...


The edit mode is a visual mode which allows us to edit the page directly.
I initially planned to implement an admin first, and then a website builder, but I realize now that the admin
could perhaps provide some kind of website builder by itself, don't know yet...

In the edit mode, we can see our widgets organized in zones on the right.
We can re-arrange the widgets, or delete a widget using the small icons next to the widget name.

We can also add a widget to any zone, by clicking the "Add Widget" button.

Each zone is an accordion so that we can toggle the zones that we don't work with, to save some space.

Now when we click a widget, the "EDIT WIDGET" pane fills up the whole column on the right (using an accordion system or similar), so that:

- the user can focus on the editing part (editing a widget is an action that generally lasts one minute or less, and so we can help the user focus)
- we use as much space as possible, because a small/tiny gui is unpractical. 

Now on the sketch I didn't draw all the gui widgets in the **EDIT WIDGET** pane, but there are a lot of varieties of gui widgets,
with different purposes and shapes, depending on what can be edited (all the vars part of every widget configuration array basically,
plus things like the widget name, the template, ...). 


On the left, I forgot to mention the site section, but I'm not sure if it should be there, and even if it should be there at all.

My idea though, was that this section allows us to quickly import/export our website.

Let's say we have been working on the website for two days, we want to save our work and give it to a friend: site > export.

Send the site via ftp (because it's a heavy zip, we can't use an email), and the friend: site > import.

Now by saying that I realize that cloud based solutions would be more appropriate (things like site > export > my_urlblabla,
and then just share the url), but that would be for a later time (when all this admin is already working, and if I need to provide more services in the future, maybe...).



The built-in website builder: iframe or responsive builder?
---------------
2019-05-17


Now having a built-in (mini) website builder begs the question of the implementation style.

My first opinion was that I preferred I frame, because we can resize iframe, and I envisioned that the user didn't need 
to have everything to scale to administrate her website, having a rough idea of how it looks would be sufficient.

But now that the website builder presents itself at the reach of our hands, it's very tempting to switch to the "classical"
website builder implementation (at least mines), which uses js to target the elements on the page live.

Now here is what I like about iframe:

- it's static: with an iframe, you know that what's displayed is really the end result (assuming that you've saved the changes before loading the iframe).

The problem with the classical js approach for website building is that you make changes live, but it sounds a little bit risky (i.e. a slight error in your code,
and you might have a js updated widget different from the actual static widget that you get in the end).

However what I like about website builder is the colors:

- having the ability to change colors live is the real value (in my opinion) of the website builder. Changing text live is also cool, but not as important.

And so, I would like that for the Light_Kit_Admin users too.

So, the perfect mix, to me, would be an iframe (for stability and easy scaling), but with some live abilities (for colors, and why not text, and maybe other things) if possible.

I will confess that I've never done such an hybrid implementation of a website builder before, that will be my first time.

But, if there is no technical restriction I'm not aware of, it should be just as easy as any other implementation form.
 

Now for the overlays that "classical" website builder have, I prefer my implementation (the panel on the right), which sounds more robust to my ears.

So, I don't need those overlays.


So that's it for today. Now it's late. The week end starts now.
 
May the inspiration be with me.

See you next monday. 



The attack plan
---------------
2019-05-20


Ok, back in business.
So here are my predictions for how I plan to attack the problem of creating the admin:

- first, create the admin prototype (estimated 2 days -> 1 week)
- two, making the prototype/picasso widgets for this prototype (2 weeks -> 3 months )
    - the website builder widget will be the hardest part (1 month -> 2 months) 
- create a user/rights system and implement it in the form of a widget (4d -> 10d)
- think about a module management/plugin system and implement (as a widget) (5d -> 1month)
- try to create a first website using the admin, and see how it works, and then create another attack plan


So that's a rough idea, I probably won't be following this plan in a too strict manner, but those are a starting point.

Ok let's go. 



Back with the admin prototype
-----------
2019-07-02

Hey, me again. Long time no see.

The first step, creating an admin prototype, took me longer than expected, but I created a cool admin prototype here: it's called zeroadmin, and it's available on templatemonster.com:
https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html

The real demo url is https://zeroadmin.ovh/.

I'll go in vacation in two days, so I don't have too much time for this session, but I wanted to say a quick hello, and 
say that I'm keeping the work on that project.

But zeroadmin doesn't have the configure/edit page widget yet, so I guess I will do those pages first, then follow the rest of the attack plan (making prototype/picasso
widgets for the admin).


2019-07-18
Now I'm back from vacation. I realize how long it will take to turn all the zeroadmin stuff into picasso widgets, and 
I believe it's not worth it, because the zeroadmin stuff is not always based on concrete needs, but is just a demo theme.

So rather than spending another month to do all the widgets, I decided to just implement them as I encounter a need for them.
So the rest of the implementation will focus on trying to get the Light Kit Admin up and running. I envision a standalone admin application
at first, with a functional login system.

Reviewing my notes, I can see that the main idea was to also implement the website builder part. 
I've got a dedicated Light_Kit_WebsiteBuilder repo waiting for that, so I'm not sure if I'll implement the website builder
in Light_Kit_Admin or in Light_Kit_WebsiteBuilder. 

But first, let's start with the basic admin stuff.
   


The light kit admin features
---------------
2019-07-18


In this section I intend to list all features of the **Light Kit Admin** worth being aware of:

### the login system

Light_Kit_Admin comes with a login system based on the user_manager service (see the [LightUserManager repo](https://github.com/lingtalfi/Light_UserManager/) for more info).
The user will be redirected to the login page, unless she is logged in.
Once logged in, she will be able to log out using a dropdown menu in the header, or more generally a controller  
will be dedicated to that.

2019-07-19

I've been thinking this morning, and I just figured out that the login system can be implemented with Controllers and the
help of the application configuration from the [Light_ApplicationConfigurator](https://github.com/lingtalfi/Light_ApplicationConfigurator/) plugin.

For instance, we create an AdminController with a dedicated render method used by all, and this render method actually redirects
to the login page if the user is not connected.


And so I want to discuss a bit this alternative to the firewall technique provided by the [Light_Firewall](https://github.com/lingtalfi/Light_Firewall/) plugin,
which was my first idea/implementation of the login system.

And so although at first the firewall technique might give the impression of giving us a 10000 feet away control over
the redirection, whereas with the controller it seems that we are more stuck with hard code.

However, with the application configuration concept, we can simply have the same flexibility with controllers, being
controlled from the application configuration rather than from the firewall configuration.

With the controllers we have one more benefit:  we don't need to parse the routes. 
And so, as fas as the login system, it's faster (for the application) to use controllers.

Now I'm not saying that the firewall is useless at all, but for the specific case of the login system, I personally 
will have a preference to start with a controller based implementation, and see if it really works out in production.

So again the implementation is quite simple: every controller that requires a login user extends the AdminController
and uses the render method to which encapsulates both the kit rendering and the login logic.

Also, often when the user visits a protected page **/A.html** and he is not logged in, she will be first redirected
to the login page, and then when she logs in she is redirected back to **/A.html**.

The login system of Light_Kit_Admin should provide an option for the (application) maintainer to do that.
  





Error handling
-------------
2019-07-23

Handling errors is an important business, so I moved this section to its own page: [error-handling.md](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/error-handling.md)
 



The user
-----------
2019-07-26

In LightKitAdmin, we use the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md),
and we use the [user_database service](https://github.com/lingtalfi/Light_UserDatabase) and [user_manager service](https://github.com/lingtalfi/Light_UserManager/) to access it.

When the database is first created, a root user is created with the following properties:

- identifier/email: root
- pseudo: root
- password: root
- avatar_url: /plugins/Light_Kit_Admin/img/avatars/root_avatar.png
- rights: 
    - *














