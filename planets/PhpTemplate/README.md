PhpTemplate
===============
2016-02-03



Simple php template system.


PhpTemplate can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



Features
--------------

- simple
- tag replacement
- conditional



How does it work?
-----------------

1. Create one directory and put all your php templates in it
2. When you need a template, call the write method
 



Tutorial
------------

1. Choose and create a directory where you will put all your php templates.

Mine will be phptemplates directory at the root of my app. 


2. Now create a template inside the phptemplates dir.
Your template is a regular php file.

Mine is named headerBar.ptpl.

I use the ptpl extension because I think it  makes it cleaner to know the type of file I'm working with.
I also setup my IDE to interpret ptpl files as php (for syntax interpretation).

But if your prefer so, you can stick with a php extension.
 
The content of my file is the following:
 
```php
<div id="header_hook">
    <div id="header">
        <div class="leftbar">
            <a data-featherlight="#login_popup" href="/login" class="wllogin wlbutton">LOGIN</a>

            <form class="search" method="get" action="/search">
                <input name="q" type="search" value="" placeholder="Rechercher un élément">
                <input class="icon-magnifier" type="submit" value="&#xe905;">
            </form>
            

            <?php if ($p->opt('icons')): ?>
                <a href="/"><i class="icon-prozaic"></i></a>
                <a href="/"><i class="icon-channel"></i></a>
                <a href="/"><i class="icon-pro"></i></a>
                <a href="/"><i class="icon-calendar"></i></a>
            <?php endif; ?>
        </div>
        <a class="$channelLogoClass" href="$channelLink"><span>$channelName</span></a>
    </div>
</div> 
``` 
 
The syntax is explained in the template syntax section below, but let's move continue. 
 

3. Now let's use it.

Actually, before we can use it, we need to tell PhpTemplate where the template directory is.
So in your application init file, write this:

```php 
PhpTemplate::$templateDir = __DIR__ . "/phptemplates"; 
```

Now we can use it.
Somewhere in your php code, put the following:


```php
PhpTemplate::write('headerBar.ptpl', [
    'channelLogoClass' => 'wllogo icon-logo',
    'channelLink' => '/',
    'channelName' => 'Actarus prod',
], [
    'icons' => true,
]);
```

Read more about the write method in the phpTemplate methods section below.






Template syntax
------------------

The template syntax is very simple.
It provides the following mechanisms

- tag replacement
- options


### Tag replacement 

Tag replacement is done by prefixing the placeholder name by a dollar symbol ($).
It's just a string nicely that integrates with your html code.


### Options

Options allows you to use booleans variables in your templates.
A typical use for boolean variable is to choose whether or not a certain portion of your template will 
be displayed. 
You simply use the php language to create the condition block.

You access the boolean variable (aka option) via the pilot object (see pilot section below),
using the opt method. See an example in the mini tutorial above.




Pilot
---------

The pilot object is the only object available in your template code.
You access it via the reserved variable $p.
 
Its methods are the following.
 
 
### opt 
 
```php
bool        opt  ( str:optionName )
``` 

Return whether or not the given option is set to true.

 
 
 
Php Template methods
----------------------

### write

```php
void    write( str:tpl, array:tags=[], array:options=[] )
```

The tpl parameter is the template relative path, from the template directory.

The tags parameter defines the placeholders available inside the template code.
It's a simple key to value array.

The options parameter defines the options available inside the template code.
Options are accessed via the pilot.opt method, see the pilot section for more details.

 
 
 
 

Related
------------

Ptpl is nice for static templates.
But if you want more dynamic (fetched via ajax for instance) templates, 
you can use php template's companion: [htmltemplate](https://github.com/lingtalfi/HtmlTemplate).









History Log
------------------
    
- 1.0.0 -- 2016-02-03

    - initial commit
    
    