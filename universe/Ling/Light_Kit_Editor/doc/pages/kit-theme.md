Kit theme, conception notes
===========
2021-03-11 -> 2021-07-01




What's a theme, abstract definition
-------------
2021-03-11 -> 2021-07-01


Different frameworks might have different ideas for what a theme is, so let's start by setting up a definition.

In our planet, we consider that if the application looks like a human, the theme are the clothes.

We can change the theme to get a different look of our app, but the core (i.e., the human under the cloth) remains the same.


What we expect with themes, is to be able to change the look of our web apps in a finger snap.


So for instance a web app could have 4 themes, depending on which season we're on:

- autumn
- spring
- summer
- winter


Each of which would give a different look to the web app.



Using the theme
=========
2021-03-11 -> 2021-07-01



In our implementation, when we change the **theme**, the only two things that can potentially change are:

- the **layout**
- the **widgets** can potentially be overridden individually based on the theme name


95% of the **theme** is done by just changing the **layout** file, which calls the css files that do most of the job.

That's the main idea.




The **theme** itself is just an arbitrary string. It is first defined at the **website level**, but can be changed at the **page level**.


We recommend that your theme name has the following format:

- $planetDotName/$themeIdentifier



Defining the theme at the website level
----------
2021-07-01


The **theme** is first defined at the website level.
We define the theme by setting the "theme" property in the [website items](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/pages/conception-notes.md#website-items), like this (for instance):

```yaml

- 
    identifier: Ling.Light_Kit_Admin.backoffice
    provider: Ling.Light_Kit_Admin
    engine: babyYaml
    rootDir: ${app_dir}/config/open/Ling.Light_Kit_Admin/lke
    label: Ling.Light_Kit_Admin
    readonly: true
    theme: Ling.Light_Kit_Admin/zeroadmin


```



Changing the theme at the page level: the t variable
------------
2021-03-11 -> 2021-07-01


It is possible to override the theme individually at the page level.

In order to help with that, we introduce the **$t** variable.

The **$t** variable represents the theme name, and is used in your [kit page configuration](https://github.com/lingtalfi/Kit/blob/master/doc/pages/conception-notes.md#the-kit-configuration-array),
like this for instance:



```yaml

label: Light Kit Admin Dashboard
layout: config/open/Ling.Light_Kit_Admin/lke/layouts/$t/main_layout.php
vars:
    theme: $t  # if you want to override the theme at this page level, just replace $t with an actual value
...

```

Notice that the **$t** variable is:

- defined by the "vars.theme" entry 
- used by the "layout" entry 



In order to change the theme at a page level, suffice to change the value of the "vars.theme" entry directly, replacing $t by the name of the theme to use, for instance:


```yaml

label: Light Kit Admin Dashboard
layout: config/open/Ling.Light_Kit_Admin/lke/layouts/$t/main_layout.php
vars:
    theme: Ling.Light_Kit_Admin/my_special_theme
...

```



If you don't override the **vars.theme** value, the default value of **$t** is the one defined at the website level.




Accessing the theme value
---------
2021-07-01


The actual theme value is accessible when you call the **renderPage** method of our service.

It's designed to be available for templates mainly.


To access it, use our service's **getTheme** method.






The theme in widget's context
----------
2021-03-11 -> 2021-07-01


Note: at the time (2021-07-01), this feature is not yet implemented.


Now let's talk about widgets.

A typical kit widget will look like this:

```yaml
name: lka_chloroform
type: picasso
className: Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget
widgetDir: templates/Ling.Light_Kit_Admin/widgets/picasso/LightKitAdminChloroformWidget
template: default.php
js: null
skin: null              # you can interpret the word "skin" as "css" here, it's just kit picasso terminology
vars: []
    title: User Profile
    form: ${form}
    show_rights: true
    is_root: ${is_root}
    rights: ${rights}
```


The basic idea of the theme swapping as far as widgets as concerned is to add the **.$theme_name** suffix to either of those elements:

- template
- skin (aka css)
- js


Those 3 elements basically represent file names, and so by appending a suffix to them, we have a new filename.

For instance, if our template is:

- **default.php**
  

The themed version would be:

- **default.$theme_name.php**


Note that the suffix is actually between the [baseName](https://github.com/lingtalfi/NotationFan/blob/master/filename-basename.md) and the file extension.


So for instance if our theme is named **winter**, the themed version would be:

- **default.winter.php**


The basic idea is that file exists, it will be used, if not, the **default.php** file will be used.

Again, that's what I meant by the all powerful author idea earlier: if you are not the author of the widget,
you can't create a themed version of the widget (unless you hack yourself, but that's another story).
The "right" way to extend this widget if you are not the author is to copy/override, same as for the template (we discussed
this technique already in a previous section).



So there you have it, the full theme idea.
























