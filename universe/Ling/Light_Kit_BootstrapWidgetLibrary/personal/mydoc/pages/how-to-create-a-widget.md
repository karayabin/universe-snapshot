How to create a widget
=================
2019-05-13


Intro
---------
Below is the current technique I use to create a widget.
I write it down for two reasons:

- first as a guide for my future self
- in the hope that I can see clearer the global picture, and potentially see opportunities to automate things





The steps explained
-------------

Here are the steps for a widget named IconTeaserWidget.


1. Create the widget class in my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/IconTeaserWidget.php.
It's an empty class.

2. Take some screenshots and put them in the /komin/lingtalfi.com/app/www/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/IconTeaserWidget directory.
    That's because I host all my github images in lingtalfi.com (I used postimages online service in the past, but one day they changed all the urls, so
    I decided that images were safer on a vps I have control over).
    Screenshots have all the same width (that's for consistency) of 1600px (use the resize alias to resize firefox before taking a screenshot).
    



3. Create the template in **my_app/templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/IconTeaserWidget/templates/default.php**
And paste the prototype (I usually have a prototype widget ready before I start this whole process).
But creating prototype is long, and so if for some reasons I decide to do create widget without prototypes in the future,
I could paste an html snippet stolen from the web instead, just to get started.


4. Usually at this point I like to prepare the template file: I like to add the same snippet for every template at the top,
which basically tells phpStorm that the **$this** keyword in the template file should point to the PicassoWidget instance (helpful for code auto-completion).
Also, I like to decorate the outer tag of the widget with the html attributes, and css class, and add a class specific to the widget.

Since I'm working on the BootstrapWidgetLibrary, I prefix all my widget outer tag's css classes with **kit-bwl-** (for instance kit-bwl-icon_teaser).




5. Open the page.byml I'm working on (for instance **my_app/config/kit/pages/Light_Kit_Demo/glozzom/glozzom_home.byml**), and add the widget to the page,
    so that I can have a preview of the widget as I'm creating it.
    I often start with a prototype that I already have, so that I have a precise idea of how the widget look.
    I always start by creating the widget description, storing it in the widget configuration under the temporary _descr property.
    I like to start with the same sentence (from that page: https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md):
    
    - IconTeaserWidget is a bootstrap 4 widget... 
     
    Once the description is done, I duck type the variables directly in the widget configuration array (in the page.byml file), so that I can focus on the
    variables aesthetic (ease of use).


6. Implement the template (basically inject the variables in the widget, making it alive).
Taking care of css and js nuggets if necessary.


7. Once the widget configuration is done, I now like to add to store it as a preset: it costs nothing, and can be very useful (because
copy-pasting has always proven being very useful).

8. Then I create the description, using this little code (which needs to be adapted depending on the page I'm working on):

 ```php
 //$pageConfFile = "/komin/jin_site_demo/config/kit/pages/Light_Kit_Demo/looplab/looplab_home.byml";
 //$outputDir = "/tmp/assets";
 //$o = new VariableDescriptionFileGeneratorUtil();
 //$o->generate($pageConfFile, $outputDir);
 //az();
 ```
 
I put that code at the top of my index.php, and uncomment it just to create the description prototype in /tmp/assets;
I then copy paste that prototype and put it here:
  
- my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary/assets/variables_description/IconTeaserWidget.vars_descr.byml

I then adapt the description.


9. Once all this is done, I just upload my code to github.
So for instance:

- cd **my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary**
- kpp


The kpp alias basically calls the kaos push light plugin command, which in turn calls the DocBuilder for the Light_Kit_BootstrapWidgetLibrary,
which apart from creating the doc, also creates the widget documentation page (https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md) from the variable descriptions.
stored in **my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary/assets/variables_description**.











 
    
    
    
    
    
    
    
    


