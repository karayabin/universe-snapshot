How to create a widget
=================
2019-05-13 -> 2020-08-10


Intro
---------
2019-05-13


Below is the current technique I use to create a widget.
I write it down for two reasons:

- first as a guide for my future self
- in the hope that I can see clearer the global picture, and potentially see opportunities to automate things





The steps explained
-------------
2019-05-13 -> 2020-08-10


Here are the steps for a widget named IconTeaserWidget.


1. Create the widget class in my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary/Widget/Picasso/IconTeaserWidget.php.
It's an empty class.


2. Create the template in **my_app/templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/IconTeaserWidget/templates/default.php**
And paste your html or code in it.


Usually at this point I follow a few conventions: I like to add the same snippet for every template at the top,
which basically tells phpStorm that the **$this** keyword in the template file should point to the PicassoWidget instance (helpful for code auto-completion).

Also, I like to decorate the outer tag of the widget with the html attributes, and css class, and add a class specific to the widget.

Since I'm working on the BootstrapWidgetLibrary, I prefix all my widget outer tag's css classes with **kit-bwl-** (for instance kit-bwl-icon_teaser).


It looks like this:

```php 
<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$columnClass = $z['column_class'] ?? "col-md-4";
$boxes = $z['boxes'] ?? [];


?>


<section class="kit-bwl-icon_teaser <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <?php foreach ($boxes as $box):
                $class = $box['class'] ?? "";
                $icon = $box['icon'] ?? "";
                $title = $box['title'] ?? "";
                $text = $box['text'] ?? "";
                ?>
                <div class="<?php echo htmlspecialchars($columnClass); ?> <?php echo $class; ?>">
                    <?php if ($icon): ?>
                        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <h3><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if ($text): ?>
                        <p><?php echo $text; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

```





3. Open the kit page configuration file (for instance **my_app/config/data/Light_Kit_Demo/kit/glozzom/glozzom_home.byml**), and add the widget to the page,
    so that you can have a preview of the widget while creating it.
    
    I often start with a prototype that I already have, so that I have a precise idea of how the widget look.
    I always start by creating the widget description, storing it in the widget configuration under the temporary _descr property in the page configuration file.
    I like to start with the same sentence (from that page: https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md):
    
    - IconTeaserWidget is a bootstrap 4 widget... 
     
    Once the description is done, I duck type the variables directly in the widget configuration array (in the page.byml file), so that I can focus on the
    variables aesthetic (ease of use).


A typical page configuration looks like this:

```yaml
label: Light Kit Admin Login Page
layout: templates/Light_Kit_Admin/layouts/zeroadmin/zeroadmin_standalone_layout.php
layout_vars:
    page_one_id: page_one
    page_two_id: page_two
    page_three_id: page_three
    page_four_id: page_four
    opened_page: four


title: Light Kit Admin Login Page
description: <
    This is the gui admin provided by the Light_Kit_Admin plugin (from the Light framework), using the zeroadmin theme by ling talfi
>

zones:
    body:
        -
            name: zeroadmin_login_form
            type: picasso
            className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminLoginFormWidget
            widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminLoginFormWidget
            template: default.php
            vars:
                form_method: post
                form_action: ""
                title: Login
                subtitle: Sign In to your account
                hidden_var: zeroadmin_login_form
                field_username:
                    icon: fas fa-user
                    name: username
                    label: Username
                    value: ""
                field_password:
                    icon: fas fa-lock
                    name: password
                    label: Password
                    value: ""
                error_no_match_show: false
                error_no_match_body: <strong>Nope!</strong> The provided credentials don't match an user in our database.
                btn_submit:
                    class: btn btn-primary px-4
                    text: Login
                use_link_forgot_password: true
                link_forgot_password:
                    link: ::(@reverse_router->getUrl(/pages/b-forgot-password))::
                    text: Forgot password?

```


For more info check the [Light_Kit](https://github.com/lingtalfi/Light_Kit) planet.






4. Take some screenshots and put them in the /komin/lingtalfi.com/app/www/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/IconTeaserWidget directory.
    That's because I host all my github images in lingtalfi.com (I used postimages online service in the past, but one day they changed all the urls, so
    I decided that images were safer on a vps I have control over).
    Screenshots have all the same width (that's for consistency) of 1600px (use the **resize** alias to resize firefox before taking a screenshot).
    And deploy them to lingtalfi.com using the **dplt** alias, which uses the [deploy tool](https://github.com/lingtalfi/Deploy). 
    









5. Implement the template (basically inject the variables in the widget, making it alive).
Taking care of css and js nuggets if necessary.


6. Once the widget configuration is done, I now like to add to store it as a preset: it costs nothing, and can be very useful (because
copy-pasting has always proven being very useful).



7. Then I create the description file, starting with this little code (which needs to be adapted depending on the page I'm working on):

 ```php
 //$pageConfFile = "/komin/jin_site_demo/config/kit/pages/Light_Kit_Demo/looplab/looplab_home.byml";
 //$outputDir = "/tmp/assets";
 //$o = new VariableDescriptionFileGeneratorUtil();
 //$o->generate($pageConfFile, $outputDir);
 //az();
 ```
 
 
And then filling the fields by hand.
 
I put that code at the top of my index.php, and uncomment it just to create the description prototype in /tmp/assets;
I then copy paste that prototype and put it here:
  
- my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary/assets/variables_description/IconTeaserWidget.vars_descr.byml

(don't forget to remove the prototype extension).

I then paste my previous description (the one created in the page configuration file) instead of the generated one.

And then I don't forget to remove the **_descr** property from the page configuration file (it served its purpose). 


8. Once all this is done, I just upload my code to github.
So for instance:

- cd **my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary**
- kpp


The kpp alias basically calls the kaos push light plugin command, which in turn calls the DocBuilder for the Light_Kit_BootstrapWidgetLibrary,
which apart from creating the doc, also creates the widget documentation page (https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md) from the variable descriptions.
stored in **my_app/universe/Ling/Light_Kit_BootstrapWidgetLibrary/assets/variables_description**.











 
    
    
    
    
    
    
    
    


