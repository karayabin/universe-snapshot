Bootstrap Widget Library
=============
2019-05-01



Below is the documentation for the widgets of the Bootstrap Widget Library.
The variables of the widgets described in this document represent the front variables of
a [Picasso widget array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array), referenced by the **vars** key.
For more information about the variables representation, please refer to the [widget variables description](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/pages/widget-variables-description.md) page.



Summary
=========

- [ColoredBoxesWidget](#coloredboxeswidget)
- [LoopLabFooterWithContactUseButtonWidget](#looplabfooterwithcontactusebuttonwidget)
- [LoopLabMonoChromeHeaderWidget](#looplabmonochromeheaderwidget)
- [LoopLabTwoColumnsSignupFormWidget](#looplabtwocolumnssignupformwidget)
- [LoopLabTwoColumnsTeaserWidget](#looplabtwocolumnsteaserwidget)
- [MainNavWidget](#mainnavwidget)
- [MizuxeFourColumnsOurStaffWidget](#mizuxefourcolumnsourstaffwidget)
- [MizuxeNewsletterSignupHeaderWidget](#mizuxenewslettersignupheaderwidget)
- [MizuxeTwoColumnsContactFormWidget](#mizuxetwocolumnscontactformwidget)
- [MizuxeTwoColumnsTeaserWidget](#mizuxetwocolumnsteaserwidget)
- [OneColumnAccordionWidget](#onecolumnaccordionwidget)






ColoredBoxesWidget
==============


- [Screenshots](#coloredboxeswidget-screenshots)
- [Templates and skins](#coloredboxeswidget-templates-and-skins)
- [Example](#coloredboxeswidget-configuration-example)
- [Variables descriptions](#coloredboxeswidget-variables-description)



ColoredBoxesWidget is a bootstrap 4 widget used to display colored boxes.
We can change the number of columns using the **column_class** property.
Each box contains an optional icon, a title and a text.
We can change the css class and the background style for each box,
and align the text on the left, center or right.





ColoredBoxesWidget screenshots
----------

![Screenshot glozzom_three_columns_colored_icon_cards.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ColoredBoxesWidget/glozzom_three_columns_colored_icon_cards.png)

![Screenshot mizuxe_four_columns_card_teaser.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ColoredBoxesWidget/mizuxe_four_columns_card_teaser.png)





ColoredBoxesWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: 


ColoredBoxesWidget configuration example
----------------

```yaml
attr:
    class: py-5

column_class: col-md-3
boxes:
    -
        class: border-primary mb-resp
        text_align: center
        title: Be Better
        title_class: text-primary
        text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, totam.
        text_class: text-muted
        icon: ""

    -
        class: bg-primary mb-resp text-white
        text_align: center
        title: Be Smarter
        title_class: ""
        text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, totam.
        text_class: ""
        icon: ""

    -
        class: border-primary mb-resp
        text_align: center
        title: Be Faster
        title_class: text-primary
        text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, totam.
        text_class: text-muted
        icon: ""

    -
        class: bg-primary mb-resp text-white
        text_align: center
        title: Be Stronger
        title_class: ""
        text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, totam.
        text_class: ""
        icon: ""

```



ColoredBoxesWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: py-5
            - **description**: The css class to add to the widget container tag.
            - **example**: py-5
- **column_class**
    - **type**: string
    - **default_value**: col-md-3
    - **description**: Defines the width and responsiveness of the columns containing the boxes.
This widget uses bootstrap 4 grid system: https://getbootstrap.com/docs/4.0/layout/grid/.
    - **example**: col-md-3
- **boxes**
    - **type**: item_list
    - **default_value**
    - **description**: An array of boxes.
    - **item_properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the box outer container.
            - **example**
                - border-primary mb-resp
                - bg-dark text-white
                - bg-primary mb-resp
        - **text_align**
            - **type**: string
            - **default_value**: center
            - **description**: The alignment to apply to the box content (including title and text).
            - **example**: center
            - **choices**
                - left
                - center
                - right
        - **title**
            - **type**: string
            - **default_value**: No title
            - **description**: The title of the box.
            - **example**: Be Better
        - **title_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to add to the title of the box.
            - **example**: text-primary
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the box
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, totam.
        - **text_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to add to the text of the box.
            - **example**: text-muted
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class for the icon of the box. If empty, the icon will not be displayed.
            - **example**: fas fa-box fa-3x







LoopLabFooterWithContactUseButtonWidget
==============


- [Screenshots](#looplabfooterwithcontactusebuttonwidget-screenshots)
- [Templates and skins](#looplabfooterwithcontactusebuttonwidget-templates-and-skins)
- [Example](#looplabfooterwithcontactusebuttonwidget-configuration-example)
- [Variables descriptions](#looplabfooterwithcontactusebuttonwidget-variables-description)



LoopLabFooterWithContactUseButtonWidget is a bootstrap 4 widget representing a footer with a button opening a "contact us" modal form.

It's composed of two parts: the footer, and the form.

The footer has a title, a text, and a button.

In the footer text, you can use the $year variable to add an always up-to-date copyright year.

The form has a title, some customizable fields, and a submit button.

Each customizable field has a type which can be one of the following:

- text: an input tag with type text
- email: an input tag with type email
- textarea: a textarea tag








LoopLabFooterWithContactUseButtonWidget screenshots
----------

![Screenshot looplab_footer_with_contact_us_button.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabFooterWithContactUseButtonWidget/looplab_footer_with_contact_us_button.png)





LoopLabFooterWithContactUseButtonWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: default.css


LoopLabFooterWithContactUseButtonWidget configuration example
----------------

```yaml
attr:
    class: bg-dark

footer_title: LoopLab
footer_text: Copyright &copy; $year
footer_button_class: btn btn-primary
footer_button_text: Contact Us
modal_title: Contact Us
modal_form_action: ""
modal_form_method: post
modal_fields:
    -
        label: Name
        name: name
        type: text

    -
        label: Email
        name: email
        type: email

    -
        label: Message
        name: message
        type: textarea


modal_btn_text: Submit
modal_btn_class: btn btn-primary btn-block
```



LoopLabFooterWithContactUseButtonWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the widget container tag. We recommend using bootstrap 4 css classes.
            - **example**: bg-dark
- **footer_title**
    - **type**: string
    - **default_value**: 
    - **description**: The title of the footer.
    - **example**: LoopLab
- **footer_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the footer. You can use the **$year** variable to indicate the year dynamically.
    - **example**: Copyright &copy; $year
- **footer_button_class**
    - **type**: string
    - **default_value**: btn btn-primary
    - **description**: todo: here
    - **example**: btn btn-primary
- **footer_button_text**
    - **type**: string
    - **default_value**: Contact Us
    - **description**: The footer button text.
    - **example**: Contact Us
- **modal_title**
    - **type**: string
    - **default_value**: Contact Us
    - **description**: The modal form text.
    - **example**: Contact Us
- **modal_form_action**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the modal form **action** attribute.
    - **example**: 
- **modal_form_method**
    - **type**: string
    - **default_value**: post
    - **description**: The value of the modal form **method** attribute.
    - **example**: post
- **modal_fields**
    - **type**: item_list
    - **default_value**
    - **description**: A list of fields to display in the modal form.
    - **item_properties**
        - **label**
            - **type**: string
            - **default_value**: 
            - **description**: The label of the field.
            - **example**: Name
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The value of the name attribute of the field.
            - **example**: name
        - **type**
            - **type**: string
            - **default_value**: 
            - **description**: The type of the field. See the possible value in the choices property.
            - **choices**
                - text
                - email
                - textarea
            - **example**: text
- **modal_btn_text**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the modal form's submit button.
    - **example**: Submit
- **modal_btn_class**
    - **type**: string
    - **default_value**: btn btn-primary btn-block
    - **description**: The css class for the modal form's submit button.
    - **example**: btn btn-primary btn-block







LoopLabMonoChromeHeaderWidget
==============


- [Screenshots](#looplabmonochromeheaderwidget-screenshots)
- [Templates and skins](#looplabmonochromeheaderwidget-templates-and-skins)
- [Example](#looplabmonochromeheaderwidget-configuration-example)
- [Variables descriptions](#looplabmonochromeheaderwidget-variables-description)



LoopLabMonoChromeHeaderWidget is a bootstrap 4 widget representing a monochrome header.
It contains a title, a text, and a button.

We can change the background color using bootstrap css classes (or custom classes).





LoopLabMonoChromeHeaderWidget screenshots
----------

![Screenshot looplab_monochrome_header-dark.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabMonoChromeHeaderWidget/looplab_monochrome_header-dark.png)

![Screenshot looplab_monochrome_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabMonoChromeHeaderWidget/looplab_monochrome_header.png)





LoopLabMonoChromeHeaderWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: looplab-dark.css


LoopLabMonoChromeHeaderWidget configuration example
----------------

```yaml
attr:
    class: text-white bg-dark

title: Explore
text: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente doloribus ut iure itaque quibusdam rem accusantium deserunt reprehenderit sunt minus.
button_url: "#"
button_class: btn btn-outline-secondary
button_text: Find Out More
```



LoopLabMonoChromeHeaderWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: text-white bg-dark
            - **description**: The css class to apply to the widget container tag. We recommend using bootstrap 4 css classes.
            - **example**: text-white bg-dark
- **title**
    - **type**: string
    - **default_value**: No title
    - **description**: The title of the header.
    - **example**: Explore
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the header.
    - **example**: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente doloribus ut iure itaque quibusdam rem accusantium deserunt reprehenderit sunt minus.
- **button_url**
    - **type**: string
    - **default_value**: #
    - **description**: The url of the button.
    - **example**: #
- **button_class**
    - **type**: string
    - **default_value**: btn btn-outline-secondary
    - **description**: The css class to apply to the button. We recommend using bootstrap 4 css classes.
    - **example**: btn btn-outline-secondary
- **button_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the button.
    - **example**: Find Out More







LoopLabTwoColumnsSignupFormWidget
==============


- [Screenshots](#looplabtwocolumnssignupformwidget-screenshots)
- [Templates and skins](#looplabtwocolumnssignupformwidget-templates-and-skins)
- [Example](#looplabtwocolumnssignupformwidget-configuration-example)
- [Variables descriptions](#looplabtwocolumnssignupformwidget-variables-description)



The LoopLabTwoColumnsSignupFormWidget is a bootstrap 4 widget representing a two columns signup form.

The looplab two columns signup form widget is composed of three parts:
- the teaser part
- the form
- the background

By default, the teaser part will only appear for large screens (because for lower resolutions, we believe it's not readable enough).
This can be customized using the teaser_visible_size property (default=lg).


First, you decide if you want to show the teaser part with the showTeaser property.
Then, you decide whether the form is on the right (by default) or on the left with the form_align_right property.

Then, customize each part as you want.

The teaser is composed of a title, and an arbitrary number of icons (which by default are checkboxes) along with some text.

Then signup form is composed of a title, a subtitle, some fields including a submit button. Don't forget to
set the action (attribute) of the form, to hook it with your application.





More about the form fields
--------
The form fields are input tags. You can choose the type of the input amongst the following:

- text
- password

The submit button has its own variables and is not considered as a regular form field.








LoopLabTwoColumnsSignupFormWidget screenshots
----------

![Screenshot looplab_two_columns_signup_form.jpg](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsSignupFormWidget/looplab_two_columns_signup_form.jpg)





LoopLabTwoColumnsSignupFormWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: default.css.php


LoopLabTwoColumnsSignupFormWidget configuration example
----------------

```yaml
showTeaser: true
form_align_right: false
teaser_visible_size: lg
teaser_title: Build <strong>social profiles</strong> and gain revenue <strong>profits</strong>
teaser_items:
    -
        icon: fas fa-check fa-2x
        text: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!

    -
        icon: fas fa-check fa-2x
        text: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!

    -
        icon: fas fa-check fa-2x
        text: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!


form_title: Sign up Today
form_subtitle: Please fill out this form to register
form_fields:
    -
        name: username
        placeholder: Username
        type: text

    -
        name: email
        placeholder: Email
        type: text

    -
        name: password
        placeholder: Password
        type: password

    -
        name: confirm_password
        placeholder: Confirm Password
        type: password


form_submit_value: Submit
form_submit_class: btn btn-outline-light btn-block
background_style: url('/plugins/Light_Kit_Demo/looplab/img/home.jpg')
```



LoopLabTwoColumnsSignupFormWidget variables description
-----------

- **showTeaser**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the teaser.
- **form_align_right**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to align the form to the right.
- **teaser_visible_size**
    - **type**: string
    - **default_value**: 
    - **description**: The bootstrap size at which the teaser should start to be visible.
    - **example**: lg
    - **choices**
        - sm
        - md
        - lg
- **teaser_title**
    - **type**: string
    - **default_value**: 
    - **description**: The teaser title.
    - **example**: Build <strong>social profiles</strong> and gain revenue <strong>profits</strong>
- **teaser_items**
    - **type**: item_list
    - **default_value**
    - **description**: An array of teaser items to display in the teaser.
    - **item_properties**
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The icon of the teaser item.
            - **example**: fas fa-check fa-2x
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the teaser item.
            - **example**: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!
- **form_title**
    - **type**: string
    - **default_value**: 
    - **description**: The title of the form.
    - **example**: Sign up Today
- **form_subtitle**
    - **type**: string
    - **default_value**: 
    - **description**: The subtitle of the form.
    - **example**: Please fill out this form to register
- **form_fields**
    - **type**: item_list
    - **default_value**
    - **description**: An array of the form fields (not including the submit button).
    - **item_properties**
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The name attribute of the input tag for this field.
            - **example**: username
        - **placeholder**
            - **type**: string
            - **default_value**: 
            - **description**: The placeholder attribute of the input tag for this field.
            - **example**: Username
        - **type**
            - **type**: string
            - **default_value**: 
            - **description**: The type attribute of the input tag for this field.
            - **example**: text
            - **choices**
                - text
                - password
- **form_submit_value**
    - **type**: string
    - **default_value**: 
    - **description**: The value for the submit button.
    - **example**: Submit
- **form_submit_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class for the submit button.
    - **example**: btn btn-outline-light btn-block
- **background_style**
    - **type**: string
    - **default_value**: 
    - **description**: The background css value. Note, you can use a simple color, or an image.
    - **example**: url('/plugins/Light_Kit_Demo/looplab/img/home.jpg')







LoopLabTwoColumnsTeaserWidget
==============


- [Screenshots](#looplabtwocolumnsteaserwidget-screenshots)
- [Templates and skins](#looplabtwocolumnsteaserwidget-templates-and-skins)
- [Example](#looplabtwocolumnsteaserwidget-configuration-example)
- [Variables descriptions](#looplabtwocolumnsteaserwidget-variables-description)



LoopLabTwoColumnsTeaserWidget is a bootstrap 4 widget representing a two columns teaser header.
It's composed of two parts: the image and the teaser.
By default, the image is on the left.
You can change this using the **img_on_left** property.
If you don't want it rounded, set the **img_rounded** property to false.
The teaser part contains a title, a text, and a list with an arbitrary number of items with icons.





LoopLabTwoColumnsTeaserWidget screenshots
----------

![Screenshot looplab_two_columns_teaser-alt.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsTeaserWidget/looplab_two_columns_teaser-alt.png)

![Screenshot looplab_two_columns_teaser-dark.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsTeaserWidget/looplab_two_columns_teaser-dark.png)

![Screenshot looplab_two_columns_teaser.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsTeaserWidget/looplab_two_columns_teaser.png)





LoopLabTwoColumnsTeaserWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: default.css, looplab-dark.css


LoopLabTwoColumnsTeaserWidget configuration example
----------------

```yaml
attr:
    class: bg-light text-muted py-5

img_on_left: true
img_rounded: true
img_src: img/explore-section1.jpg
img_alt: Explore & Connect
teaser_title: Explore & Connect
teaser_text: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore reiciendis, voluptate at alias laborum odit aliquidtempore perspiciatis repudiandae hic?
teaser_items:
    -
        icon: fas fa-check fa-2x
        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?

    -
        icon: fas fa-check fa-2x
        text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?

```



LoopLabTwoColumnsTeaserWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: bg-light text-muted py-5
            - **description**: The css class to add to the widget container. We recommend using bootstrap css classes.
            - **example**: bg-light text-muted py-5
- **img_on_left**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether the image is on the left.
- **img_rounded**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether the image is rounded.
- **img_src**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the src attribute of the img tag.
    - **example**: img/explore-section1.jpg
- **img_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the alt attribute of the img tag.
    - **example**: Explore & Connect
- **teaser_title**
    - **type**: string
    - **default_value**: 
    - **description**: The teaser title.
    - **example**: Explore & Connect
- **teaser_text**
    - **type**: string
    - **default_value**: 
    - **description**: The teaser text.
    - **example**: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore reiciendis, voluptate at alias laborum odit aliquidtempore perspiciatis repudiandae hic?
- **teaser_items**
    - **type**: item_list
    - **default_value**
    - **description**: A list of teaser items.
    - **item_properties**
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class for the icon of the teaser item.
            - **example**: fas fa-check fa-2x
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text for the teaser item.
            - **example**: Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi distinctio iusto, perspiciatis mollitia natus harum?







MainNavWidget
==============


- [Screenshots](#mainnavwidget-screenshots)
- [Templates and skins](#mainnavwidget-templates-and-skins)
- [Example](#mainnavwidget-configuration-example)
- [Variables descriptions](#mainnavwidget-variables-description)



The MainNavWidget is a bootstrap 4 widget representing the top navigation on a website.
You can configure the title of the nav with or without a logo, and you can create two separate
sets of links, with various options for each link, such as adding an icon, or a dropdown menu.

You can also enable spyscroll and smooth scrolling to enhance your navigation if your theme is a one page theme.






MainNavWidget screenshots
----------

![Screenshot MainNavWidget-01.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/MainNavWidget/MainNavWidget-01.png)





MainNavWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: looplab-nav.css, mizuxe-nav.css, mizuxe-nav.scss


MainNavWidget configuration example
----------------

```yaml

title: LoopLab

# Whether the top nav is fixed on the top
fixed_top: true

# the string to put in the href attribute of the title link.
# It can be an anchor if necessary
# The default value is slash
title_url: /

# If not set, the title will not use a logo
# If set, the title_logo must define all parameters as the example below
#title_logo:
#    url: /plugins/Light_Kit_Demo/mizuxe/img/mlogo.png
#    width: 50
#    height: 50
#    alt: Mizuxe logo
expand_size: sm # at which size does the burger menu expand (sm | md | lg) = sm
links:
    -
        text: Home
        url: "#home"
#        icon: fas fa-user
    -
        text: Explore
        url: "#explore-head-section"

    -
        text: Create
        url: "#create-head-section"
    -
        text: Share
        url: "#share-head-section"

# An additional css class to add to all link items. Example: px-2
#links_item_class: px-2

# Whether to push the links on the right. Note: if you use links2.
links_align_right: false

links2:
    -
        text: Welcome Ling
        url: "#"
        icon: fas fa-user
        children:
            -
                text: Profile
                url: "#create-head-section"
                icon: fas fa-user-circle
            -
                text: Settings
                url: "#create-head-section"
                icon: fas fa-cog
    -
        text: Log out
        url: "#share-head-section"
        icon: fas fa-user-times
links2_align_right: true

```



MainNavWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: bg-light text-muted py-5
            - **description**: The css class to add to the widget container. We recommend using bootstrap css classes.
            - **example**: bg-dark navbar-dark looplab-nav
        - **id**
            - **type**: string
            - **default_value**: 
            - **description**: The css id to add to the widget container. It's required if you are using the spyscroll or the smooth scrolling feature.
            - **example**: main-nav
- **use_scrollspy**
    - **type**: bool
    - **default_value**: false
    - **description**: Whether to activate the scroll spy. If so, you must define a css id. See the bootstrap documentation for more info.
- **use_smooth_scrolling**
    - **type**: bool
    - **default_value**: false
    - **description**: Whether to smoothly scroll to the desired anchor when you the user clicks a link item (this only works on one page themes). To use this feature you must define a css id.
- **title**
    - **type**: string
    - **default_value**: null
    - **description**: The title of the nav widget. It's usually the name of the company or website.
- **title_logo**
    - **type**: array
    - **default_value**: null
    - **description**: Adds a logo to the title.
    - **properties**
        - **url**
            - **type**: string
            - **default_value**: null
            - **description**: The url of the logo image (the value to put into the src attribute of the img tag).
        - **width**
            - **type**: string
            - **default_value**: 50
            - **description**: The width of the logo image.
        - **height**
            - **type**: string
            - **default_value**: 50
            - **description**: The height of the logo image.
        - **alt**
            - **type**: string
            - **default_value**: null
            - **description**: The value of the alt attribute of the logo img tag.
- **fixed_top**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether the nav is fixed on the top, or scrolls along with the content.
- **title_url**
    - **type**: string
    - **default_value**: /
    - **description**: The string to put in the href attribute of the title link. It can be an anchor if necessary (starting with a hash symbol).
- **expand_size**
    - **type**: string
    - **default_value**: sm
    - **description**: Defines at which size does the burger menu expand.
    - **choices**
        - sm
        - md
        - lg
- **links**
    - **type**: item_list
    - **default_value**
    - **description**: An array of link items to display in the nav.
    - **item_properties**
        - **text**
            - **type**: string
            - **default_value**: null
            - **description**: The text of the link item.
        - **url**
            - **type**: string
            - **default_value**: null
            - **description**: The url of the link item (anchors are accepted).
        - **icon**
            - **type**: string
            - **default_value**: null
            - **description**: The css class for the icon.
            - **example**: fas fa-user
- **links_align_right**
    - **type**: bool
    - **default_value**: false
    - **description**: Whether to align the links to the right.
- **links_item_class**
    - **type**: string
    - **default_value**: null
    - **description**: An additional css class expression to add to all link items.
    - **example**: px-2
- **links2**: same as links
- **links2_align_right**: same as links_align_right
- **links2_item_class**: same as links_item_class







MizuxeFourColumnsOurStaffWidget
==============


- [Screenshots](#mizuxefourcolumnsourstaffwidget-screenshots)
- [Templates and skins](#mizuxefourcolumnsourstaffwidget-templates-and-skins)
- [Example](#mizuxefourcolumnsourstaffwidget-configuration-example)
- [Variables descriptions](#mizuxefourcolumnsourstaffwidget-variables-description)



MizuxeFourColumnsOurStaffWidget is a bootstrap 4 widget showing your staff members.

It's composed of 3 parts:
- the title
- the text
- the items

You can show/hide each parts individually with the show_xxx properties.

Each item is composed of an image, the name of the member, the role, a description, and a list of social icon links.

By default, the member items are displayed in a 4 columns grid on large screens, and 2 columns grid for medium screens (and they
stack on each other for small screens).
This can be changed with the "column_class" property, which leverages the bootstrap 4 framework responsive capabilities.

See the grid system of bootstrap 4 for more details (https://getbootstrap.com/docs/4.0/layout/grid/).







MizuxeFourColumnsOurStaffWidget screenshots
----------

![Screenshot mizuxe_four_columns_our_staff_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/MizuxeFourColumnsOurStaffWidget/mizuxe_four_columns_our_staff_header.png)





MizuxeFourColumnsOurStaffWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: 


MizuxeFourColumnsOurStaffWidget configuration example
----------------

```yaml
attr:
    class: my-5 text-center
    id: authors

column_class: col-lg-3 col-md-6
show_title: true
show_text: true
show_items: true
title: Meet The Authors
text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque corporis ea ipsam laborum officia quo.
items:
    -
        img_url: img/person1.jpg
        img_alt: Lead Writer Susan Williams
        name: Susan Wiliams
        role: Lead Writer
        description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus facere itaque soluta. Odio, voluptate.
        icons:
            -
                icon: fab fa-facebook
                url: http://facebook.com

            -
                icon: fab fa-twitter
                url: http://twitter.com

            -
                icon: fab fa-instagram
                url: http://instagram.com



    -
        img_url: img/person2.jpg
        img_alt: Co-Writer Grace Smith
        name: Grace Smith
        role: Co-Writer
        description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus facere itaque soluta. Odio, voluptate.
        icons:
            -
                icon: fab fa-facebook
                url: http://facebook.com

            -
                icon: fab fa-twitter
                url: http://twitter.com

            -
                icon: fab fa-instagram
                url: http://instagram.com



    -
        img_url: img/person3.jpg
        img_alt: Editor John Doe
        name: John Doe
        role: Editor
        description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus facere itaque soluta. Odio, voluptate.
        icons:
            -
                icon: fab fa-facebook
                url: http://facebook.com

            -
                icon: fab fa-twitter
                url: http://twitter.com

            -
                icon: fab fa-instagram
                url: http://instagram.com



    -
        img_url: img/person4.jpg
        img_alt: Designer Kevin Swanson
        name: Kevin Swanson
        role: Designer
        description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus facere itaque soluta. Odio, voluptate.
        icons:
            -
                icon: fab fa-facebook
                url: http://facebook.com

            -
                icon: fab fa-twitter
                url: http://twitter.com

            -
                icon: fab fa-instagram
                url: http://instagram.com



```



MizuxeFourColumnsOurStaffWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: my-5 text-center
            - **description**: The css class to apply to the widget container tag.
            - **example**: my-5 text-center
- **column_class**
    - **type**: string
    - **default_value**: col-lg-3 col-md-6
    - **description**: The boostrap 4 grid responsive class for each column containing a card. See https://getbootstrap.com/docs/4.0/layout/grid/ for more info.
    - **example**: col-lg-3 col-md-6
- **show_title**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the title.
- **show_text**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the text.
- **show_items**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the items.
- **title**
    - **type**: string
    - **default_value**: No title
    - **description**: The title.
    - **example**: Meet The Authors
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque corporis ea ipsam laborum officia quo.
- **items**
    - **type**: item_list
    - **default_value**
    - **description**: An array of member items.
    - **item_properties**
        - **img_url**
            - **type**: string
            - **default_value**: 
            - **description**: The value of the src attribute of the img tag.
            - **example**: img/person1.jpg
        - **img_alt**
            - **type**: string
            - **default_value**: 
            - **description**: The value of the alt attribute of the img tag.
            - **example**: Lead Writer Susan Williams
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The name of the member.
            - **example**: Susan Wiliams
        - **role**
            - **type**: string
            - **default_value**: 
            - **description**: The role of the member.
            - **example**: Lead Writer
        - **description**
            - **type**: string
            - **default_value**: 
            - **description**: The description of the member.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus facere itaque soluta. Odio, voluptate.
        - **icons**
            - **type**: item_list
            - **default_value**
            - **description**: The social icon items for this member.
            - **item_properties**
                - **icon**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The css class for the social icon.
                    - **example**: fab fa-facebook
                - **url**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The url for the social icon.
                    - **example**: http://facebook.com







MizuxeNewsletterSignupHeaderWidget
==============


- [Screenshots](#mizuxenewslettersignupheaderwidget-screenshots)
- [Templates and skins](#mizuxenewslettersignupheaderwidget-templates-and-skins)
- [Example](#mizuxenewslettersignupheaderwidget-configuration-example)
- [Variables descriptions](#mizuxenewslettersignupheaderwidget-variables-description)



MizuxeNewsletterSignupHeaderWidget is a bootstrap 4 widget.
It's an epurated newsletter signup form with two fields and a submit button.
The two fields are name and email.
We can disable the name field to only collect the email using the **field_name_active** property.






MizuxeNewsletterSignupHeaderWidget screenshots
----------

![Screenshot mizuxe_newsletter_signup_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/MizuxeNewsletterSignupHeaderWidget/mizuxe_newsletter_signup_header.png)





MizuxeNewsletterSignupHeaderWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: 


MizuxeNewsletterSignupHeaderWidget configuration example
----------------

```yaml
attr:
    class: bg-dark text-white py-5

field_name_active: true
field_name_name: name
field_name_label: Enter Name
field_email_name: email
field_email_label: Enter Email
btn_class: btn btn-primary btn-lg btn-block
btn_icon: fas fa-envelope-open
btn_text: Subscribe
```



MizuxeNewsletterSignupHeaderWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: bg-dark text-white py-5
            - **description**: The css class to apply to the widget's container tag.
            - **example**: bg-dark text-white py-5
- **field_name_active**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the name field.
- **field_name_name**
    - **type**: string
    - **default_value**: name
    - **description**: The value of the name attribute for the **name** field.
    - **example**: name
- **field_name_label**
    - **type**: string
    - **default_value**: Enter Name
    - **description**: The label for the **name** field.
    - **example**: Enter Name
- **field_email_name**
    - **type**: string
    - **default_value**: email
    - **description**: The value of the name attribute for the **email** field.
    - **example**: email
- **field_email_label**
    - **type**: string
    - **default_value**: Enter Email
    - **description**: The label for the **email** field.
    - **example**: Enter Email
- **btn_class**
    - **type**: string
    - **default_value**: btn btn-primary btn-lg btn-block
    - **description**: The css class to use on the button.
    - **example**: btn btn-primary btn-lg btn-block
- **btn_icon**
    - **type**: string
    - **default_value**: fas fa-envelope-open
    - **description**: The css class of the button icon.
    - **example**: fas fa-envelope-open
- **btn_text**
    - **type**: string
    - **default_value**: Subscribe
    - **description**: The text of the button.
    - **example**: Subscribe







MizuxeTwoColumnsContactFormWidget
==============


- [Screenshots](#mizuxetwocolumnscontactformwidget-screenshots)
- [Templates and skins](#mizuxetwocolumnscontactformwidget-templates-and-skins)
- [Example](#mizuxetwocolumnscontactformwidget-configuration-example)
- [Variables descriptions](#mizuxetwocolumnscontactformwidget-variables-description)



MizuxeTwoColumnsContactFormWidget is a bootstrap 4 widget representing a contact form.

It's composed of two parts:
- the form
- the image

The form is composed of a title, a text, some fields, and a submit button.

Each form field has a type, which can be one of:
- text: an input of type text
- email: an input of type email
- textarea: a textarea


The image can be hidden using the "show_image" property.







MizuxeTwoColumnsContactFormWidget screenshots
----------

![Screenshot mizuxe_one_column_contact_form.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/MizuxeTwoColumnsContactFormWidget/mizuxe_one_column_contact_form.png)





MizuxeTwoColumnsContactFormWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: 


MizuxeTwoColumnsContactFormWidget configuration example
----------------

```yaml
attr:
    class: bg-light py-5
    id: contact

show_image: true
image_url: img/mlogo.png
image_alt: our company logo
form_action: ""
form_method: post
form_title: Get In Touch
form_text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, ea!
form_fields:
    -
        icon: fas fa-user
        name: name
        label: Name
        type: text

    -
        icon: fas fa-envelope
        name: email
        label: Email
        type: email

    -
        icon: fas fa-pencil-alt
        name: message
        label: Message
        type: textarea


submit_btn_text: Submit
submit_btn_class: btn btn-primary btn-block btn-lg
```



MizuxeTwoColumnsContactFormWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the widget container.
            - **example**: bg-light py-5
- **show_image**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the image.
- **image_url**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the src attribute of the img tag.
    - **example**: img/mlogo.png
- **image_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the alt attribute of the img tag.
    - **example**: our company logo
- **form_action**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the action attribute of the form tag.
    - **example**: 
- **form_method**
    - **type**: string
    - **default_value**: post
    - **description**: The value of the method attribute of the form tag.
    - **example**: post
    - **choices**
        - get
        - post
- **form_title**
    - **type**: string
    - **default_value**: 
    - **description**: The title of the form.
    - **example**: Get In Touch
- **form_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the form.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, ea!
- **form_fields**
    - **type**: item_list
    - **default_value**
    - **description**: An array of form fields.
    - **item_properties**
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The icon for this field. If empty, the icon will not be displayed.
            - **example**: fas fa-user
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The name attribute for this field.
            - **example**: name
        - **label**
            - **type**: string
            - **default_value**: 
            - **description**: The label for this field. It might be displayed in a placeholder.
            - **example**: Name
        - **type**
            - **type**: string
            - **default_value**: 
            - **description**: The type of this form field.
            - **example**: text
            - **choices**
                - text, an input of type text
                - email, an input of type email
                - textarea, a textarea
- **submit_btn_text**
    - **type**: string
    - **default_value**: Submit
    - **description**: The text for the submit button.
    - **example**: Submit
- **submit_btn_class**
    - **type**: string
    - **default_value**: btn btn-primary btn-block btn-lg
    - **description**: The css class to apply to the submit button.
    - **example**: btn btn-primary btn-block btn-lg







MizuxeTwoColumnsTeaserWidget
==============


- [Screenshots](#mizuxetwocolumnsteaserwidget-screenshots)
- [Templates and skins](#mizuxetwocolumnsteaserwidget-templates-and-skins)
- [Example](#mizuxetwocolumnsteaserwidget-configuration-example)
- [Variables descriptions](#mizuxetwocolumnsteaserwidget-variables-description)




MizuxeTwoColumnsTeaserWidget is a bootstrap 4 widget composed of three parts:

- the teaser
- the image
- the background

The teaser has a title, a text and a button with an icon.

By default, the image only appears on large screens.
You can make it appears on a different size using the **img_size_visible** property.

The image will appear by default on the right of the text. This can be changed using the **img_on_right** property.

The background is composed of a background image and a background overlay used as a tint.








MizuxeTwoColumnsTeaserWidget screenshots
----------

![Screenshot mizuxe_two_columns_teaser.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/MizuxeTwoColumnsTeaserWidget/mizuxe_two_columns_teaser.png)





MizuxeTwoColumnsTeaserWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: default.css


MizuxeTwoColumnsTeaserWidget configuration example
----------------

```yaml
attr:
    class: py-5

teaser_title: Do What You Dream Of...
teaser_text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, voluptatibus?
teaser_text_align: center
teaser_button_text: Read More
teaser_button_icon: fas fa-arrow-right
teaser_button_class: btn btn-outline-secondary btn-lg text-white
teaser_button_url: "#"
img_on_right: true
img_size_visible: lg
img_src: /plugins/Light_Kit_Demo/mizuxe/img/book.png
img_alt: Mizuxe Mountains Book
bg_style: url('/plugins/Light_Kit_Demo/mizuxe/img/mountains.jpg')
bg_overlay_style: rgba(50, 146, 166, 0.8);
bg_overlay_class: text-white
```



MizuxeTwoColumnsTeaserWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to add to the widget container tag.
            - **example**: py-5
- **teaser_title**
    - **type**: string
    - **default_value**: No title
    - **description**: The title of the teaser.
    - **example**: Do What You Dream Of...
- **teaser_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the teaser.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, voluptatibus?
- **teaser_text_align**
    - **type**: string
    - **default_value**: center
    - **description**: The align value for the teaser text. See the choices for the available values.
    - **example**: center
    - **choices**
        - center
        - left
        - right
- **teaser_button_text**
    - **type**: string
    - **default_value**: Read More
    - **description**: The text of the teaser button.
    - **example**: Read More
- **teaser_button_icon**
    - **type**: string
    - **default_value**: fas fa-arrow-right
    - **description**: The icon of the teaser button.
    - **example**: fas fa-arrow-right
- **teaser_button_class**
    - **type**: string
    - **default_value**: btn btn-outline-secondary btn-lg text-white
    - **description**: The css class of the teaser button.
    - **example**: btn btn-outline-secondary btn-lg text-white
- **teaser_button_url**
    - **type**: string
    - **default_value**: #
    - **description**: The url of the teaser button.
    - **example**: #
- **img_on_right**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to display the image on the right of the teaser.
- **img_size_visible**
    - **type**: string
    - **default_value**: lg
    - **description**: The screen size at which the image becomes visible. Use bootstrap 4 sizes.
    - **example**: lg
    - **choices**
        - sm
        - md
        - lg
- **img_src**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the src attribute of the img tag for the image.
    - **example**: /plugins/Light_Kit_Demo/mizuxe/img/book.png
- **img_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the alt attribute of the img tag for the image.
    - **example**: Mizuxe Mountains Book
- **bg_style**
    - **type**: string
    - **default_value**: transparent
    - **description**: The value of the background css property for the background image.
    - **example**: url('/plugins/Light_Kit_Demo/mizuxe/img/mountains.jpg')
- **bg_overlay_style**
    - **type**: string
    - **default_value**: transparent
    - **description**: The value of the background css property for the background overlay.
    - **example**: rgba(50, 146, 166, 0.8);
- **bg_overlay_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to add to the background overlay.
    - **example**: text-white







OneColumnAccordionWidget
==============


- [Screenshots](#onecolumnaccordionwidget-screenshots)
- [Templates and skins](#onecolumnaccordionwidget-templates-and-skins)
- [Example](#onecolumnaccordionwidget-configuration-example)
- [Variables descriptions](#onecolumnaccordionwidget-variables-description)



OneColumnAccordionWidget is a bootstrap 4 widget composed of three parts:
    - the title
    - the text
    - the accordion

We can show/hide each of those parts.

The accordion items can have icons.





OneColumnAccordionWidget screenshots
----------

![Screenshot mizuxe_one_column_accordion_teaser.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/OneColumnAccordionWidget/mizuxe_one_column_accordion_teaser.png)





OneColumnAccordionWidget templates and skins
-----------
- **Templates**: default.php
- **Skins**: 


OneColumnAccordionWidget configuration example
----------------

```yaml
attr:
    class: py-5 text-center bg-light

title_visible: true
title: Why This Book?
title_class: text-primary pb-3
text_visible: true
text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolore laboriosam nisi reiciendis sint sunt?
text_class: lead pb-3
accordion_visible: true
accordion_items:
    -
        icon: fas fa-arrow-circle-down
        title: Get Inspired
        is_open: true
        text: <
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi asperiores
            at culpa, deserunt ducimus facilis ipsa minima, obcaecati, quod reprehenderit
            repudiandae sed voluptates. Amet at autem commodi dicta dolore dolorum error esse et
            excepturi fugiat fugit labore laboriosam molestiae odit provident quisquam, repellendus
            ut vero vitae voluptas, voluptatem voluptatibus.
        >
    -
        icon: fas fa-arrow-circle-down
        title: Gain The Knowledge
        is_open: false
        text: <
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi asperiores
            at culpa, deserunt ducimus facilis ipsa minima, obcaecati, quod reprehenderit
            repudiandae sed voluptates. Amet at autem commodi dicta dolore dolorum error esse et
            excepturi fugiat fugit labore laboriosam molestiae odit provident quisquam, repellendus
            ut vero vitae voluptas, voluptatem voluptatibus.
        >

    -
        icon: fas fa-arrow-circle-down
        title: Open Your Mind
        is_open: false
        text: <
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi asperiores
            at culpa, deserunt ducimus facilis ipsa minima, obcaecati, quod reprehenderit
            repudiandae sed voluptates. Amet at autem commodi dicta dolore dolorum error esse et
            excepturi fugiat fugit labore laboriosam molestiae odit provident quisquam, repellendus
            ut vero vitae voluptas, voluptatem voluptatibus.
        >

```



OneColumnAccordionWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**: null
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: py-5 text-center bg-light
            - **description**: The css class to add to the widget container tag.
            - **example**: py-5 text-center bg-light
- **title_visible**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to display the title.
- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title.
    - **example**: Why This Book?
- **title_class**
    - **type**: string
    - **default_value**: text-primary pb-3
    - **description**: The css class of the title.
    - **example**: text-primary pb-3
- **text_visible**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to display the text.
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text below the title.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolore laboriosam nisi reiciendis sint sunt?
- **text_class**
    - **type**: string
    - **default_value**: lead pb-3
    - **description**: The css class of the text.
    - **example**: lead pb-3
- **accordion_visible**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to display the accordion.
- **accordion_items**
    - **type**: item_list
    - **default_value**
    - **description**: An array of accordion items.
    - **item_properties**
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class of the icon. If empty, the icon won't be displayed.
            - **example**: fas fa-arrow-circle-down
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the accordion item.
            - **example**: Get Inspired
        - **is_open**
            - **type**: bool
            - **default_value**: true
            - **description**: Whether to open the accordion item by default.
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the accordion item.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi asperiores
at culpa, deserunt ducimus facilis ipsa minima, obcaecati, quod reprehenderit
repudiandae sed voluptates. Amet at autem commodi dicta dolore dolorum error esse et
excepturi fugiat fugit labore laboriosam molestiae odit provident quisquam, repellendus
ut vero vitae voluptas, voluptatem voluptatibus.













