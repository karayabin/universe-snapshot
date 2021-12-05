[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminChloroformWidget class
================
2019-05-17 --> 2021-07-30






Introduction
============

The LightKitAdminChloroformWidget class.


Conception notes
-----------
2019-07-31


This widget is the [ChloroformWidget](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md#chloroformwidget) version for Light_Kit_Admin (lka).


### New variables

- related_links: an array of items, each of which:
     - text: the text of the link
     - url: the url of the link
     - ?icon: the css class of an icon to add




### Why


I created this widget when I realized that using ChloroformWidget alone would not fill all my needs.
My needs were to be able to create all kinds of forms, starting with the form in the user profile page
of the lka gui.

This page contains two forms, and both of them I couldn't create with ChloroformWidget.

The first form contains the following fields:

- pseudo
- password
- avatar_url

For the password, I don't know if you've ever thought about how you allow an user to change her password,
but my idea was that if the field if empty, it means the user doesn't want to change it, and if it's
not empty, then it means she wants to change it.
And I prefer to avoid a second confirm password field, because it creates more field (although I might
change my mind on that later).

However this technique (without a confirm password field) is a bit risky in that the user might accidentally
change her password, and next thing you know is that she is logged out forever, unable to reconnect to the lka
app.
So I wanted to add a little change password switch, with the help of javascript, which would hide/show the
password related field(s).
And that, for starter, ChloroformWidget couldn't do that.

What you need for those kind of things is more freedom in the rendering side.
The problem with the ChloroformWidget is that you get the Chloroform_HeliumRenderer, and that's it.
Now the Chloroform_HeliumRenderer is obviously not flexible enough to handle all possible forms,
and so we need another solution.

I thought about two techniques:
- extending the Chloroform_HeliumRenderer for lka, which would have all the flexibility I want, but the boring
part being to implement all methods, one every time I want to create a new type of control. Benefit being
re-usability of those controls later.
- the second technique is to create the control on the fly directly in the template file. The main problem
     of this technique is: no re-usability. Benefit: full freedom, meaning speed of development.

My preferred method is the second one for the controls I believe I won't reuse (one shot controls).
And I intend to drop javascript validation support: an extra layer of work for almost nothing.
I mean, I don't care that the user reloads the page, as long as I can code my control in a very straight
forward manner. So basically my intent is to use freestyle coding in the templates, basically writing the controls,
and a static error message with basic condition, all that in plain php in the template, and I would be a happy guy
if this works.

So, those were my thoughts BEFORE the implementation. Now let's see what the concrete implementation
has to say about that.

Ps: By the way, the second fields that the Chloroform helium renderer didn't provide was the rights control,
some kind of list with groups, but I have a specific display in mind which is not a simple select with group,
but rather a more aesthetic pleasing control.



Oh, and I forgot: my implementation plan is to create one template per form.
I call those one shot template, as they will only be used for a form in particular.



Class synopsis
==============


class <span class="pl-k">LightKitAdminChloroformWidget</span> extends [EasyLightPicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget.md) implements [KitPageRendererAwareInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererAwareInterface.md), [WidgetConfAwarePicassoWidgetInterface](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/WidgetConfAwarePicassoWidgetInterface.md), [UniversalTemplateEngineInterface](https://github.com/lingtalfi/UniversalTemplateEngine/blob/master/doc/api/Ling/UniversalTemplateEngine/UniversalTemplateEngineInterface.md) {

- Inherited properties
    - protected [Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) [EasyLightPicassoWidget::$kitPageRenderer](#property-kitPageRenderer) ;
    - protected array [WidgetConfAwarePicassoWidget::$widgetConf](#property-widgetConf) ;
    - protected array [PicassoWidget::$libraries](#property-libraries) ;
    - protected array [PicassoWidget::$attr](#property-attr) ;
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [PicassoWidget::$copilot](#property-copilot) ;

- Methods
    - protected [useHelium](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Widget/Picasso/LightKitAdminChloroformWidget/useHelium.md)() : void

- Inherited methods
    - public EasyLightPicassoWidget::__construct() : void
    - public EasyLightPicassoWidget::setKitPageRenderer([Ling\Kit\PageRenderer\KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) $renderer) : void
    - public EasyLightPicassoWidget::getKitPageRenderer() : [KitPageRendererInterface](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRendererInterface.md) | null
    - protected EasyLightPicassoWidget::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - public WidgetConfAwarePicassoWidget::setWidgetConf(array $widgetConf) : void
    - public WidgetConfAwarePicassoWidget::getWidgetConf() : array
    - public PicassoWidget::getLibraries() : array
    - public PicassoWidget::setCopilot([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - public PicassoWidget::renderFile(string $filePath, ?array $variables = []) : false | string
    - public PicassoWidget::prepare(array &$widgetConf, [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - protected PicassoWidget::getAttributesHtml(?bool $excludeClass = true) : string
    - protected PicassoWidget::getCssClass() : string
    - protected PicassoWidget::registerLibrary(string $libraryName, array $css, array $js) : void
    - public ZephyrTemplateEngine::render(string $resourceId, ?array $variables = []) : false | string
    - public ZephyrTemplateEngine::getErrors() : array
    - public ZephyrTemplateEngine::setDirectory(string $directory) : void
    - protected ZephyrTemplateEngine::interpret(string $___path, array $z) : false | string

}






Methods
==============

- [LightKitAdminChloroformWidget::useHelium](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Widget/Picasso/LightKitAdminChloroformWidget/useHelium.md) &ndash; Attaches the helium renderer assets to the html page copilot instance.
- EasyLightPicassoWidget::__construct &ndash; Builds the EasyPicassoWidget instance.
- EasyLightPicassoWidget::setKitPageRenderer &ndash; Sets the KitPageRenderer instance.
- EasyLightPicassoWidget::getKitPageRenderer &ndash; 
- EasyLightPicassoWidget::getContainer &ndash; Returns a light service container instance.
- WidgetConfAwarePicassoWidget::setWidgetConf &ndash; Sets the widget configuration.
- WidgetConfAwarePicassoWidget::getWidgetConf &ndash; Returns the widget configuration.
- PicassoWidget::getLibraries &ndash; Returns the libraries of this instance.
- PicassoWidget::setCopilot &ndash; Sets the copilot.
- PicassoWidget::renderFile &ndash; Parses the file identified and returns its interpreted content (by injecting the variables in it).
- PicassoWidget::prepare &ndash; Prepares the widget according to the given widget configuration.
- PicassoWidget::getAttributesHtml &ndash; Returns the string of html attributes defined in the widget attributes (attr property in the [widget configuration array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array)).
- PicassoWidget::getCssClass &ndash; 
- PicassoWidget::registerLibrary &ndash; Registers an (external) library that this widget uses.
- ZephyrTemplateEngine::render &ndash; Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
- ZephyrTemplateEngine::getErrors &ndash; Returns the errors of this instance.
- ZephyrTemplateEngine::setDirectory &ndash; Sets the directory.
- ZephyrTemplateEngine::interpret &ndash; and returns the resulting html code.





Location
=============
Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget<br>
See the source code of [Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Widget/Picasso/LightKitAdminChloroformWidget.php)



SeeAlso
==============
Previous class: [LightKitAdminStandardServicePlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin.md)<br>
