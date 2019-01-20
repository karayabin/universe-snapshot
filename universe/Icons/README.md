Icons
==================
2016-11-23


Add svg icons to your website.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


This library helps you integrating svg icons in your website.
It works best (only?) if all icons have same size, such as when they all come from the same icons library.


I created this helper to work mainly with [material icons](https://material.io/icons/)



How does it work?
===================
2016-12-24


Here is my workflow.

Go to your application, and paste the Icons and IconsFactory classes from this repository to your application's class directory, 
then create an extra **icons.svg** file. you should end up with the following structure:


```txt
- Icons
----- Icons.php
----- icons.svg
----- IconsFactory.php
```

Each file has its own role.


icons.svg
-----------

This file is my working file, it contains all the svg icons.

It's a svg file that looks like this:

```svg
<svg>
    <defs>
        <g id="add">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </g>
        <g id="announcement">
            <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </g>
        <!-- ...more groups... -->
    </defs>
</svg>
```

I like to use those file because they are easy to manipulate.

Just copy an svg code somewhere, and throw it in the mix.

By the way, I only used material icons so far, but it might work with any svg.


Icons and IconsFactory
-------------------------

Now that icons.svg is ready, whenever I need an icon, I just call the **Icons::printIcon** method.

Also, at the bottom of my layout, I include a call to **IconsFactory::printIconsDefinitions**.

What that does is include the definitions of the svg for me, and only 
those called by the **Icons::printIcon** method (of course).

There are plenty of resources on the web about this technique, basically it's about being compatible
with ie9+ (I believe).


Okay, but there is one more step.


Adding an icon
-----------------
When I added an icon in the past, I used to directly update the IconsFactory file.
That's fast and straightforward.

However, for some reasons, I now use a [task](https://github.com/lingtalfi/task-manager/blob/master/tasks/ling-personal-tasks/nullos/icons.sh)
to generate the IconsFactory for me, from the **icons.svg** file.

This basically allows me to work with the svg file, which I find a little bit more easy.

And if I want, I can generate the whole Material library for testing, and switch back to my custom library
before deploying to production, thanks to the [generators](https://github.com/lingtalfi/Icons/tree/master/scripts).

So, a couple of interesting options.

But both methods work fine.




Css pass
=============

If you are sure that your icons will always have the same characteristics, you can define them in css, like this for instance:


```css
.icon{
	width: 48px;
	height: 48px;
}		
```


4. Prepare your layout

Put this php code at the bottom of each html page that you generate.

```php
IconsFactory::printIconsDefinitions();
```


5. Use the icons when you want.

Now you're ready.

Whenever you need an icon, type the following in your html code:

```html
<?php Icons::printIcon('add'); ?>
```

You can change the color on the fly with the second argument:

```html
<?php Icons::printIcon('add', 'blue'); ?>
```

You can also change the size on the fly with the third argument:

```html
<?php Icons::printIcon('add', null, 48); ?>
```





 
 
History Log
------------------
    
- 1.0.2 -- 2016-12-24

    - fix bug
    
- 1.0.1 -- 2016-12-24

    - fix bug
    
- 1.0.0 -- 2016-12-24

    - separated IconsFactory from Icons

- ??? -- ???
	- initial commit    
