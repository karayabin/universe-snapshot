Bootstrap Widget Library
=============
2019-05-01



Below is the documentation for the widgets of the Bootstrap Widget Library.
The variables of the widgets described in this document represent the front variables of
a [Picasso widget array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array), referenced by the **vars** key.
For more information about the variables representation, please refer to the [widget variables description](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/pages/widget-variables-description.md) page.



Summary
=========

- [BlogCardsWidget](#blogcardswidget)
- [BlogenAdminTableWidget](#blogenadmintablewidget)
- [BlogenFormWidget](#blogenformwidget)
- [BlogenHeaderWithActionButtonsWidget](#blogenheaderwithactionbuttonswidget)
- [BlogenHeaderWithModalActionButtonsWidget](#blogenheaderwithmodalactionbuttonswidget)
- [BlogenIconHeaderWidget](#blogeniconheaderwidget)
- [BlogenSearchHeaderWidget](#blogensearchheaderwidget)
- [BlogenSidebarAvatarWithActionButtonsWidget](#blogensidebaravatarwithactionbuttonswidget)
- [BlogenSidebarIconCardsWidget](#blogensidebariconcardswidget)
- [ColoredBoxesWidget](#coloredboxeswidget)
- [ContactFormAndCompanyInfoWidget](#contactformandcompanyinfowidget)
- [FooterWithButtonWidget](#footerwithbuttonwidget)
- [GlozzomPricingTableWidget](#glozzompricingtablewidget)
- [GlozzomTwoColumnsTeaserWidget](#glozzomtwocolumnsteaserwidget)
- [IconTeaserWidget](#iconteaserwidget)
- [LoopLabFooterWithContactUseButtonWidget](#looplabfooterwithcontactusebuttonwidget)
- [LoopLabMonoChromeHeaderWidget](#looplabmonochromeheaderwidget)
- [LoopLabTwoColumnsSignupFormWidget](#looplabtwocolumnssignupformwidget)
- [LoopLabTwoColumnsTeaserWidget](#looplabtwocolumnsteaserwidget)
- [MainNavWidget](#mainnavwidget)
- [MizuxeContactFormWidget](#mizuxecontactformwidget)
- [MizuxeFourColumnsOurStaffWidget](#mizuxefourcolumnsourstaffwidget)
- [MizuxeNewsletterSignupHeaderWidget](#mizuxenewslettersignupheaderwidget)
- [MizuxeTwoColumnsTeaserWidget](#mizuxetwocolumnsteaserwidget)
- [NewsletterHeaderWidget](#newsletterheaderwidget)
- [OneColumnAccordionWidget](#onecolumnaccordionwidget)
- [ParallaxHeaderWidget](#parallaxheaderwidget)
- [ParallaxHeaderWithVideoTriggerWidget](#parallaxheaderwithvideotriggerwidget)
- [PeopleGridWidget](#peoplegridwidget)
- [PhotoGalleryWidget](#photogallerywidget)
- [PortfolioGridHeaderWithDescriptionWidget](#portfoliogridheaderwithdescriptionwidget)
- [PortfolioGridMainNavHeaderWidget](#portfoliogridmainnavheaderwidget)
- [PortfolioGridThreeColumnsCardInfoWidget](#portfoliogridthreecolumnscardinfowidget)
- [ProgressBarWidget](#progressbarwidget)
- [ShowCaseCarouselWidget](#showcasecarouselwidget)
- [SimpleFooterWidget](#simplefooterwidget)
- [SlickTestimonialCarouselWidget](#slicktestimonialcarouselwidget)
- [TwoColumnsAccordionWidget](#twocolumnsaccordionwidget)
- [ZeroAdminBreadcrumbWidget](#zeroadminbreadcrumbwidget)
- [ZeroAdminHeaderNewMessagesIconLinkWidget](#zeroadminheadernewmessagesiconlinkwidget)
- [ZeroAdminHeaderNewNotificationsIconLinkWidget](#zeroadminheadernewnotificationsiconlinkwidget)
- [ZeroAdminHeaderProfileDropdownLinkWidget](#zeroadminheaderprofiledropdownlinkwidget)
- [ZeroAdminHeaderWidget](#zeroadminheaderwidget)
- [ZeroAdminSidebarWidget](#zeroadminsidebarwidget)






BlogCardsWidget
==============

[Back to top](#summary)

- [Screenshots](#blogcardswidget-screenshots)
- [Templates and skins](#blogcardswidget-templates-and-skins)
- [Example](#blogcardswidget-configuration-example)
- [Variables descriptions](#blogcardswidget-variables-description)



BlogCardsWidget is a bootstrap 4 widget representing a list of blog cards organized in columns.

We can decide the size of the columns using the "column_class" property, which uses the bootstrap 4 grid css classes
(more on that at: https://getbootstrap.com/docs/4.0/layout/grid/), along with the "nb_cards_per_row" property.

Each card is composed of set of elements amongst the following:

- an image
- a title
- a subtitle
- a text
- a quote
- a quote author

When an element is empty (for instance if we set the subtitle to an empty string), it is not displayed.





BlogCardsWidget screenshots
----------

![Screenshot glozzom_three_columns_blog_cards.jpg](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogCardsWidget/glozzom_three_columns_blog_cards.jpg)





BlogCardsWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


BlogCardsWidget configuration example
----------------

```yaml
name: blog_cards
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogCardsWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogCardsWidget
template: default.php
vars:
    attr:
        id: blog
        class: py-3

    column_class: col-md-4
    non_initial_row_class: mt-2
    nb_cards_per_row: 3
    cards:
        -
            card_class: ""
            img_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/blog-photo-1.jpg
            img_alt: photo-1
            title: Blog Post One
            subtitle: Written by Jeff on 05/20
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam harum illo itaque
                iusto pariatur rem? Distinctio praesentium rerum suscipit. Ab aspernatur, itaque magnam
                officiis optio quae quam repudiandae saepe tenetur?
            >

        -
            card_class: ""
            img_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/blog-photo-2.jpg
            img_alt: photo-2
            title: Blog Post Two
            subtitle: Written by Karen on 05/22
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam harum illo itaque
                iusto pariatur rem? Distinctio praesentium rerum suscipit. Ab aspernatur, itaque magnam
                officiis optio quae quam repudiandae saepe tenetur?
            >

        -
            card_class: ""
            img_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/blog-photo-3.jpg
            img_alt: photo-3
            title: Blog Post Three
            subtitle: Written by Harry on 05/23
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam harum illo itaque
                iusto pariatur rem? Distinctio praesentium rerum suscipit. Ab aspernatur, itaque magnam
                officiis optio quae quam repudiandae saepe tenetur?
            >

        -
            card_class: p-3
            quote_text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur deleniti exercitationem fugiat neque, pariatur ratione.
            quote_author: "Someone Famous in <cite title=\"Source Title\">Source Title</cite>"
            quote_author_class: text-muted

        -
            card_class: p-3 bg-danger text-white
            quote_text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur deleniti exercitationem fugiat neque, pariatur ratione.
            quote_author: "Someone Famous in <cite title=\"Source Title\">Source Title</cite>"
            quote_author_class: text-white

        -
            card_class: p-3
            quote_text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur deleniti exercitationem fugiat neque, pariatur ratione.
            quote_author: "Someone Famous in <cite title=\"Source Title\">Source Title</cite>"
            quote_author_class: text-muted


```



BlogCardsWidget variables description
-----------

- **column_class**
    - **type**: string
    - **default_value**: col-md-4
    - **description**: The css class to apply to each column. Note: a column contain one card.
    - **example**: col-md-4
- **non_initial_row_class**
    - **type**: string
    - **default_value**: mt-2
    - **description**: The css class to apply to every row. Use this to define the vertical spacing between rows.
    - **example**: mt-2
- **nb_cards_per_row**
    - **type**: number
    - **default_value**: 3
    - **description**: The max number of cards per row.
    - **example**: 3
- **cards**
    - **type**: item_list
    - **default_value**
    - **description**: The array of cards.
    - **item_properties**
        - **card_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to this card's outer tag..
            - **example**: 
        - **img_url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the image of this card. If empty, the image will not be displayed.
            - **example**: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/blog-photo-1.jpg
        - **img_alt**
            - **type**: string
            - **default_value**: 
            - **description**: The value of the alt attribute of the image for this card.
            - **example**: photo-1
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the card. If empty, will not be displayed.
            - **example**: Blog Post One
        - **subtitle**
            - **type**: string
            - **default_value**: 
            - **description**: The subtitle of the card. If empty, will not be displayed.
            - **example**: Written by Jeff on 05/20
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the card. If empty, will not be displayed.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam harum illo itaque
iusto pariatur rem? Distinctio praesentium rerum suscipit. Ab aspernatur, itaque magnam
officiis optio quae quam repudiandae saepe tenetur?







BlogenAdminTableWidget
==============

[Back to top](#summary)

- [Screenshots](#blogenadmintablewidget-screenshots)
- [Templates and skins](#blogenadmintablewidget-templates-and-skins)
- [Example](#blogenadmintablewidget-configuration-example)
- [Variables descriptions](#blogenadmintablewidget-variables-description)



BlogenAdminTableWidget is a bootstrap 4 widget displaying an admin table.


The widget is composed of three parts:

- the title
- the table
- the pagination


The title is optional and is only displayed if not empty.

The table is composed of the following elements:

- columns: the array containing the label (or any html code) to write in the column headers of the table
- rows: the array containing the rows of values (any html code) to write in the cells of the table.

Each row is an array which must have the same length as the "columns" array (otherwise it won't work).
Note that the row values accept html code, which allows you to create not only text, but also custom buttons, or anything that you like.


By default, the pagination only shows up if there is more than one page.

We can force it to be always visible with the "pagination_always_visible" property.









BlogenAdminTableWidget screenshots
----------

![Screenshot blogen_admin_table-with_pagination.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenAdminTableWidget/blogen_admin_table-with_pagination.png)

![Screenshot blogen_admin_table.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenAdminTableWidget/blogen_admin_table.png)





BlogenAdminTableWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: blogen.byml


BlogenAdminTableWidget configuration example
----------------

```yaml
name: blogen_admin_table
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenAdminTableWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenAdminTableWidget
template: default.php
vars:
    attr:
        id: posts

    title: Latest Posts
    table_class: table-striped
    table_head_class: thead-dark
    columns:
        - "#"
        - Title
        - Category
        - Date
        - ""

    rows:
        -
            - 1
            - Post One
            - Web Development
            - May 10 2018
            - <
                <a href="/?page=details" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            >

        -
            - 2
            - Post Two
            - Tech Gadgets
            - May 11 2018
            - <
                <a href="/?page=details" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            >

        -
            - 3
            - Post Three
            - Web Development
            - May 13 2018
            - <
                <a href="/?page=details" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            >

        -
            - 4
            - Post Four
            - Business
            - May 15 2018
            - <
                <a href="/?page=details" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            >

        -
            - 5
            - Post Five
            - Web Development
            - May 17 2018
            - <
                <a href="/?page=details" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            >

        -
            - 6
            - Post Six
            - Health & Wellness
            - May 20 2018
            - <
                <a href="/?page=details" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                </a>
            >

    pagination_always_visible: false
    pagination_nb_pages: 1
    pagination_link_format: /?page={page}
    pagination_selected_page: 1
    pagination_show_prev: true
    pagination_show_next: true
    pagination_prev_text: Previous
    pagination_next_text: Next
```



BlogenAdminTableWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Latest Posts
- **table_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the table.
    - **example**: table-striped
- **table_head_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the table head.
    - **example**: thead-dark
- **columns**
    - **type**: string
    - **default_value**
    - **description**: The array of column labels (html is accepted).
- **rows**
    - **type**: string
    - **default_value**
    - **description**: The array of rows. Each row must have the same number of elements as the "columns" property (otherwise you
will have an erroneous table). Html code is accepted (so that you can create custom buttons for instance).
- **pagination_always_visible**
    - **type**: bool
    - **default_value**: false
    - **description**: Whether to show pagination even if there is only one page.
- **pagination_nb_pages**
    - **type**: string
    - **default_value**: 1
    - **description**: The number of pages.
    - **example**: 1
- **pagination_link_format**
    - **type**: string
    - **default_value**: 
    - **description**: The format for the url of the page link. The {page} tag will be replaced by the actual page number.
    - **example**: /?page={page}
- **pagination_selected_page**
    - **type**: string
    - **default_value**: 1
    - **description**: The actual page number.
    - **example**: 1
- **pagination_show_prev**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the previous page button.
- **pagination_show_next**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the next page button.
- **pagination_prev_text**
    - **type**: string
    - **default_value**: Previous
    - **description**: The text for the previous page button.
    - **example**: Previous
- **pagination_next_text**
    - **type**: string
    - **default_value**: Next
    - **description**: The text for the next page button.
    - **example**: Next







BlogenFormWidget
==============

[Back to top](#summary)

- [Screenshots](#blogenformwidget-screenshots)
- [Templates and skins](#blogenformwidget-templates-and-skins)
- [Example](#blogenformwidget-configuration-example)
- [Variables descriptions](#blogenformwidget-variables-description)



BlogenFormWidget is a bootstrap 4 widget representing a form.

The form is composed of:

- a title
- some fields
- a submit button


We can hide the submit button using the "show_submit_button" property.


The fields of the form can have one of the following types:

- text (an input text)
- email (an input text of type email)
- radio (an input text of type radio)
- list (a select tag)
- file (a file input)
- password (an input of type password)
- textarea
- textarea_ck (a textarea using the ckeditor js plugin)


Properties for the fields are:

- type
- name
- label
- value
- hint

The fields of type "list" have an extra "options" property.

The fields of type "file" have an extra "file_label" property.

The fields of type "radio" have an extra "choices" property.





BlogenFormWidget screenshots
----------

![Screenshot blogen_form-with_radio.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenFormWidget/blogen_form-with_radio.png)

![Screenshot blogen_form.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenFormWidget/blogen_form.png)





BlogenFormWidget templates, skins, presets
-----------
- **Templates**: default.php, fieldset.php, login.php
- **Skins**: 
- **Presets**: blogen_details.byml, blogen_profile.byml


BlogenFormWidget configuration example
----------------

```yaml
name: blogen_form
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenFormWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenFormWidget
template: default.php
vars:
    attr:
        id: details

    title: Edit Post
    title_class: bg-primary text-white
    form_action: ""
    form_method: post
    form_fields:
        -
            type: text
            name: title
            label: Title
            value: Post One
            hint: ""

        -
            type: list
            name: category
            label: Category
            value: web
            hint: ""
            options:
                web: Web Development
                tec: Tech Gadgets
                bus: Business
                hea: Health & Wellness


        -
            type: file
            name: my_file
            label: Upload image
            file_label: Choose File
            value: ""
            hint: Max Size 3mb

        -
            type: textarea_ck
            name: body
            label: Body
            value: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt harum possimus qui. Exercitationem ipsum itaque quis vitae! Ad animi aspernatur consequatur distinctio enim est expedita fuga in ipsum labore laboriosam maxime nobis quasi, quibusdam quidem recusandae tempore, tenetur totam veniam veritatis! Beatae culpa ea eius esse magni quae rem, voluptatibus.
            hint: ""


    footer_class: text-right
    submit_btn_text: Save Changes
    submit_btn_class: btn btn-primary
```



BlogenFormWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Edit Post
- **title_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the title.
    - **example**: bg-primary text-white
- **form_column_class**
    - **type**: string
    - **default_value**: col
    - **description**: The css class to apply to the column containing the form.
We can use this to shape the form's width and responsiveness.
You can use bootstrap 4 grid css classes.
More on that at: https://getbootstrap.com/docs/4.0/layout/grid/
    - **example**: col-md-6
- **form_action**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the action attribute of the form.
    - **example**: 
- **form_method**
    - **type**: string
    - **default_value**: post
    - **description**: The value of the method attribute of the form.
    - **example**: post
- **form_fields**
    - **type**: item_list
    - **default_value**
    - **description**: The array of form fields.
    - **item_properties**
        - **type**
            - **type**: string
            - **default_value**: 
            - **description**: The type of field.
            - **example**: text
            - **choices**
                - text
                - email
                - list
                - file
                - password
                - textarea
                - textarea_ck
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The name attribute of the field.
            - **example**: title
        - **label**
            - **type**: string
            - **default_value**: 
            - **description**: The label of the field.
            - **example**: Title
        - **value**
            - **type**: string
            - **default_value**: 
            - **description**: The value of the field.
            - **example**: Post One
        - **hint**
            - **type**: string
            - **default_value**: 
            - **description**: The hint for the field.
            - **example**: Max Size 3mb
        - **choices**
            - **type**: array
            - **default_value**
            - **description**: An array of value => label representing the choices for a field of type radio.
            - **example**: 
        - **options**
            - **type**: array
            - **default_value**
            - **description**: An array of value => label representing the choices for a field of type list.
            - **example**: 
        - **file_label**
            - **type**: string
            - **default_value**: 
            - **description**: A message to display inside the input of type file.
            - **example**: Choose File
- **show_submit_button**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the submit button.
    - **example**: true
- **submit_button_wrapper_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the element wrapping the submit button (if any, depends on the template).
    - **example**: text-right
- **submit_btn_text**
    - **type**: string
    - **default_value**: Submit
    - **description**: The text of the submit button.
    - **example**: Save Changes
- **submit_btn_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the submit button.
    - **example**: btn btn-primary







BlogenHeaderWithActionButtonsWidget
==============

[Back to top](#summary)

- [Screenshots](#blogenheaderwithactionbuttonswidget-screenshots)
- [Templates and skins](#blogenheaderwithactionbuttonswidget-templates-and-skins)
- [Example](#blogenheaderwithactionbuttonswidget-configuration-example)
- [Variables descriptions](#blogenheaderwithactionbuttonswidget-variables-description)



BlogenHeaderWithActionButtonsWidget is a bootstrap 4 widget representing a header with some action buttons, and a back link.


Each action button is composed of:

- a text
- an icon


The text and the icon are only displayed if not empty.

We can choose the size and responsiveness of each button using the "column_class" property, which uses a bootstrap 4 grid system css class.

More info at: https://getbootstrap.com/docs/4.0/layout/grid/.








BlogenHeaderWithActionButtonsWidget screenshots
----------

![Screenshot blogen_header_with_back_link_and_action_buttons-alt.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenHeaderWithActionButtonsWidget/blogen_header_with_back_link_and_action_buttons-alt.png)

![Screenshot blogen_header_with_back_link_and_action_buttons-alt2.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenHeaderWithActionButtonsWidget/blogen_header_with_back_link_and_action_buttons-alt2.png)

![Screenshot blogen_header_with_back_link_and_action_buttons.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenHeaderWithActionButtonsWidget/blogen_header_with_back_link_and_action_buttons.png)





BlogenHeaderWithActionButtonsWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: blogen.byml


BlogenHeaderWithActionButtonsWidget configuration example
----------------

```yaml
name: blogen_header_with_action_buttons
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenHeaderWithActionButtonsWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenHeaderWithActionButtonsWidget
template: default.php
vars:
    attr:
        id: actions
        class: py-4 mb-4 bg-light

    column_class: col-md-3
    buttons:
        -
            class: btn btn-light btn-block
            icon: fas fa-arrow-left
            url: /?page=dashboard
            text: Back to Dashboard

        -
            class: btn btn-success btn-block
            icon: fas fa-check
            url: /?page=dashboard
            text: Save Changes

        -
            class: btn btn-danger btn-block
            icon: fas fa-trash
            url: /?page=dashboard
            text: Delete Post


```



BlogenHeaderWithActionButtonsWidget variables description
-----------

- **column_class**
    - **type**: string
    - **default_value**: col-md-3
    - **description**: The css class to apply to each column containing a button.
    - **example**: col-md-3
- **buttons**
    - **type**: item_list
    - **default_value**
    - **description**: The array of buttons.
    - **item_properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the button.
            - **example**: btn btn-light btn-block
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the button icon.
            - **example**: fas fa-arrow-left
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the button.
            - **example**: /?page=dashboard
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the button.
            - **example**: Back to Dashboard







BlogenHeaderWithModalActionButtonsWidget
==============

[Back to top](#summary)

- [Screenshots](#blogenheaderwithmodalactionbuttonswidget-screenshots)
- [Templates and skins](#blogenheaderwithmodalactionbuttonswidget-templates-and-skins)
- [Example](#blogenheaderwithmodalactionbuttonswidget-configuration-example)
- [Variables descriptions](#blogenheaderwithmodalactionbuttonswidget-variables-description)



BlogenHeaderWithModalActionButtonsWidget is a bootstrap 4 widget displaying a header with some buttons, each of which opening
a form in a modal popup.


The widget is composed of items.

Each item is composed of:

- a button
- a form (which is visible only when the user clicks on the button)


The button is composed of:

- an icon
- a text

The icon and the text are only displayed if not empty.


The form is composed of:

- a title
- some fields
- a submit button


We can choose the size and responsiveness of the buttons by using the "button_column_class" property for each item.

This property uses the bootstrap 4 grid system css classes.

More about that at: https://getbootstrap.com/docs/4.0/layout/grid/.


The fields of the form can have one of the following types:

- text (an input text)
- email (an input text of type email)
- list (a select tag)
- file (a file input)
- password (an input of type password)
- textarea
- textarea_ck (a textarea using the ckeditor js plugin)


Properties for the fields are:

- type
- name
- label
- value
- hint

The fields of type "list" have an extra "options" property.

The fields of type "file" have an extra "file_label" property.






BlogenHeaderWithModalActionButtonsWidget screenshots
----------

![Screenshot blogen_header_with_modal_action_buttons-add_post_action.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenHeaderWithModalActionButtonsWidget/blogen_header_with_modal_action_buttons-add_post_action.png)

![Screenshot blogen_header_with_modal_action_buttons.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenHeaderWithModalActionButtonsWidget/blogen_header_with_modal_action_buttons.png)





BlogenHeaderWithModalActionButtonsWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: blogen.byml


BlogenHeaderWithModalActionButtonsWidget configuration example
----------------

```yaml
name: blogen_header_with_modal_action_buttons
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenHeaderWithModalActionButtonsWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenHeaderWithModalActionButtonsWidget
template: default.php
vars:
    attr:
        id: actions
        class: py-4 mb-4 bg-light

    items:
        -
            button_column_class: col-md-3
            button_icon: fas fa-plus
            button_class: btn btn-primary btn-block
            button_text: Add Post
            modal_title_class: bg-primary text-white
            modal_title: Add Post
            modal_form_action: ""
            modal_form_method: post
            modal_form_fields:
                -
                    type: text
                    name: title
                    label: title
                    value: ""
                    hint: ""

                -
                    type: list
                    name: category
                    label: Category
                    value: web
                    hint: ""
                    options:
                        web: Web Development
                        tec: Tech Gadgets
                        bus: Business
                        hea: Health & Wellness


                -
                    type: file
                    name: my_file
                    label: Upload image
                    file_label: Choose File
                    value: ""
                    hint: Max Size 3mb

                -
                    type: textarea_ck
                    name: body
                    label: Body
                    value: ""
                    hint: ""


            modal_form_submit_btn_text: Save Changes
            modal_form_submit_btn_class: btn btn-primary

        -
            button_column_class: col-md-3
            button_icon: fas fa-plus
            button_class: btn btn-success btn-block
            button_text: Add Category
            modal_title_class: bg-success text-white
            modal_title: Add Category
            modal_form_action: ""
            modal_form_method: post
            modal_form_fields:
                -
                    type: text
                    name: title
                    label: title


            modal_form_submit_btn_text: Save Changes
            modal_form_submit_btn_class: btn btn-success

        -
            button_column_class: col-md-3
            button_icon: fas fa-plus
            button_class: btn btn-warning btn-block
            button_text: Add User
            modal_title_class: bg-warning text-white
            modal_title: Add User
            modal_form_action: ""
            modal_form_method: post
            modal_form_fields:
                -
                    type: text
                    name: name
                    label: Name

                -
                    type: email
                    name: email
                    label: Email

                -
                    type: password
                    name: password
                    label: Password

                -
                    type: password
                    name: confirm_password
                    label: Confirm Password


            modal_form_submit_btn_text: Save Changes
            modal_form_submit_btn_class: btn btn-warning


```



BlogenHeaderWithModalActionButtonsWidget variables description
-----------

- **items**
    - **type**: item_list
    - **default_value**
    - **description**: The array of items.
    - **item_properties**
        - **button_column_class**
            - **type**: string
            - **default_value**: col-md-3
            - **description**: The css class to apply to the column containing this item's button.
            - **example**: col-md-3
        - **button_icon**
            - **type**: string
            - **default_value**: 
            - **description**: The icon inside the button of this item. If empty, will not be displayed.
            - **example**: fas fa-plus
        - **button_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the button of this item.
            - **example**: btn btn-primary btn-block
        - **button_text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the button of this item. If empty, will not be displayed.
            - **example**: Add Post
        - **modal_title_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the title of the modal.
            - **example**: bg-primary text-white
        - **modal_title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the modal.
            - **example**: Add Post
        - **modal_form_action**
            - **type**: string
            - **default_value**: 
            - **description**: The value of the action attribute of the modal's form.
            - **example**: 
        - **modal_form_method**
            - **type**: string
            - **default_value**: post
            - **description**: The value of the method attribute of the modal's form.
            - **example**: post
        - **modal_form_fields**
            - **type**: item_list
            - **default_value**
            - **description**: The array of fields for the modal's form.
            - **item_properties**
                - **type**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The type of the field.
                    - **example**: text
                    - **choices**
                        - text
                        - email
                        - list
                        - file
                        - password
                        - textarea
                        - textarea_ck
                - **name**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The name attribute of the field.
                    - **example**: title
                - **label**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The label of the field.
                    - **example**: title
                - **value**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The value of the field.
                    - **example**: 
                - **hint**
                    - **type**: string
                    - **default_value**: 
                    - **description**: A hint for the field.
                    - **example**: Max Size 3mb
        - **modal_form_submit_btn_text**
            - **type**: string
            - **default_value**: Submit
            - **description**: The text of the modal's form submit button.
            - **example**: Save Changes
        - **modal_form_submit_btn_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the modal's form submit button.
            - **example**: btn btn-primary







BlogenIconHeaderWidget
==============

[Back to top](#summary)

- [Screenshots](#blogeniconheaderwidget-screenshots)
- [Templates and skins](#blogeniconheaderwidget-templates-and-skins)
- [Example](#blogeniconheaderwidget-configuration-example)
- [Variables descriptions](#blogeniconheaderwidget-variables-description)



BlogenIconHeaderWidget is a bootstrap 4 widget displaying a simple header.


The header is composed of an icon and a title, both of which being only displayed if they are not empty.






BlogenIconHeaderWidget screenshots
----------

![Screenshot blogen_monochrome_icon_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenIconHeaderWidget/blogen_monochrome_icon_header.png)





BlogenIconHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: blogen.byml


BlogenIconHeaderWidget configuration example
----------------

```yaml
name: blogen_icon_header
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenIconHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenIconHeaderWidget
template: default.php
vars:
    attr:
        id: main-header
        class: py-2 bg-primary text-white

    icon: fas fa-cog
    title: Dashboard
```



BlogenIconHeaderWidget variables description
-----------

- **icon**
    - **type**: string
    - **default_value**: 
    - **description**: The icon. If empty, will not be displayed.
    - **example**: fas fa-cog
- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Dashboard







BlogenSearchHeaderWidget
==============

[Back to top](#summary)

- [Screenshots](#blogensearchheaderwidget-screenshots)
- [Templates and skins](#blogensearchheaderwidget-templates-and-skins)
- [Example](#blogensearchheaderwidget-configuration-example)
- [Variables descriptions](#blogensearchheaderwidget-variables-description)



BlogenSearchHeaderWidget is a bootstrap 4 widget representing a search header.

It's composed of a search form with a submit button.






BlogenSearchHeaderWidget screenshots
----------

![Screenshot blogen_search_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenSearchHeaderWidget/blogen_search_header.png)





BlogenSearchHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: blogen.byml


BlogenSearchHeaderWidget configuration example
----------------

```yaml
name: blogen_search_header
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenSearchHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenSearchHeaderWidget
template: default.php
vars:
    attr:
        id: search
        class: py-4 mb-4 bg-light

    form_action: ""
    form_method: post
    name: search
    label: Search Posts...
    btn_text: Search
    btn_class: btn btn-primary
```



BlogenSearchHeaderWidget variables description
-----------

- **form_action**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the action attribute of the search form.
    - **example**: 
- **form_method**
    - **type**: string
    - **default_value**: post
    - **description**: The value of the method attribute of the search form.
    - **example**: post
- **name**
    - **type**: string
    - **default_value**: 
    - **description**: The name of the search form input.
    - **example**: search
- **label**
    - **type**: string
    - **default_value**: 
    - **description**: The label associated with the search form input.
    - **example**: Search Posts...
- **btn_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the search form submit button.
    - **example**: Search
- **btn_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the search form submit button.
    - **example**: btn btn-primary







BlogenSidebarAvatarWithActionButtonsWidget
==============

[Back to top](#summary)

- [Screenshots](#blogensidebaravatarwithactionbuttonswidget-screenshots)
- [Templates and skins](#blogensidebaravatarwithactionbuttonswidget-templates-and-skins)
- [Example](#blogensidebaravatarwithactionbuttonswidget-configuration-example)
- [Variables descriptions](#blogensidebaravatarwithactionbuttonswidget-variables-description)



BlogenSidebarAvatarWithActionButtonsWidget is a bootstrap 4 widget representing a sidebar avatar image, with some action buttons.


The widget is composed of:

- a title
- an image
- an arbitrary number of action buttons

If any of the element is empty, it will not be displayed.








BlogenSidebarAvatarWithActionButtonsWidget screenshots
----------

![Screenshot blogen_sidebar_avatar_with_action_buttons.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenSidebarAvatarWithActionButtonsWidget/blogen_sidebar_avatar_with_action_buttons.png)





BlogenSidebarAvatarWithActionButtonsWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: blogen.byml


BlogenSidebarAvatarWithActionButtonsWidget configuration example
----------------

```yaml
name: blogen_sidebar_avatar_with_action_buttons
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenSidebarAvatarWithActionButtonsWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenSidebarAvatarWithActionButtonsWidget
template: default.php
vars:
    title: Your Avatar
    img_src: /plugins/Light_Kit_Demo/blogen/img/avatar.png
    img_alt: my_avatar
    buttons:
        -
            class: btn btn-primary btn-block
            url: "#"
            text: Edit Image

        -
            class: btn btn-danger btn-block
            url: "#"
            text: Delete Image


```



BlogenSidebarAvatarWithActionButtonsWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Your Avatar
- **img_src**
    - **type**: string
    - **default_value**: 
    - **description**: The src attribute of the avatar image. If empty, the avatar will not be displayed.
    - **example**: /plugins/Light_Kit_Demo/blogen/img/avatar.png
- **img_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The alt attribute of the avatar.
    - **example**: my_avatar
- **buttons**
    - **type**: item_list
    - **default_value**
    - **description**: The array of buttons.
    - **item_properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to this button.
            - **example**: btn btn-primary btn-block
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of this button.
            - **example**: /?page=random
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of this button.
            - **example**: Edit Image







BlogenSidebarIconCardsWidget
==============

[Back to top](#summary)

- [Screenshots](#blogensidebariconcardswidget-screenshots)
- [Templates and skins](#blogensidebariconcardswidget-templates-and-skins)
- [Example](#blogensidebariconcardswidget-configuration-example)
- [Variables descriptions](#blogensidebariconcardswidget-variables-description)



BlogenSidebarIconCardsWidget is a bootstrap 4 widget showing a vertical stack of icon cards.


Each card has the following components:

- title
- icon
- number
- button


All of them are optional (they are only displayed if not empty).





BlogenSidebarIconCardsWidget screenshots
----------

![Screenshot blogen_sidebar_icon_cards.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/BlogenSidebarIconCardsWidget/blogen_sidebar_icon_cards.png)





BlogenSidebarIconCardsWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: blogen.byml


BlogenSidebarIconCardsWidget configuration example
----------------

```yaml
name: blogen_sidebar_icon_cards
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\BlogenSidebarIconCardsWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/BlogenSidebarIconCardsWidget
template: default.php
vars:
    cards:
        -
            class: text-center bg-primary text-white mb-3
            title: Posts
            icon: fas fa-pencil-alt
            number: 6
            btn_class: btn btn-outline-light btn-sm
            btn_text: View
            btn_url: /?page=posts

        -
            class: text-center bg-success text-white mb-3
            title: Categories
            icon: fas fa-folder
            number: 4
            btn_class: btn btn-outline-light btn-sm
            btn_text: View
            btn_url: /?page=categories

        -
            class: text-center bg-warning text-white mb-3
            title: Users
            icon: fas fa-users
            number: 4
            btn_class: btn btn-outline-light btn-sm
            btn_text: View
            btn_url: /?page=users


```



BlogenSidebarIconCardsWidget variables description
-----------

- **cards**
    - **type**: item_list
    - **default_value**
    - **description**: The array of cards.
    - **item_properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the card.
            - **example**: text-center bg-primary text-white mb-3
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the card. If empty, will not be displayed.
            - **example**: Posts
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The icon of the card. If empty, will not be displayed.
            - **example**: fas fa-pencil-alt
        - **number**
            - **type**: string
            - **default_value**: 
            - **description**: The number of the card. If empty string, will not be displayed.
            - **example**: 6
        - **btn_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the button of the card.
            - **example**: btn btn-outline-light btn-sm
        - **btn_text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the button of the card. If empty, will not be displayed.
            - **example**: View
        - **btn_url**
            - **type**: string
            - **default_value**: 
            - **description**: The url for the button of the card.
            - **example**: /?page=posts







ColoredBoxesWidget
==============

[Back to top](#summary)

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





ColoredBoxesWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: mizuxe.byml


ColoredBoxesWidget configuration example
----------------

```yaml
name: colored_boxes
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ColoredBoxesWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ColoredBoxesWidget
template: default.php
vars:
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

- **column_class**
    - **type**: string
    - **default_value**: col-md-3
    - **description**: Defines the width and responsiveness of the columns containing the boxes.
This widget uses bootstrap 4 grid system: https://getbootstrap.com/docs/4.0/layout/grid/.
    - **example**: col-md-3
- **nb_boxes_per_row**
    - **type**: number
    - **default_value**: null
    - **description**: The number of boxes per row. If null, all boxes are put into the same row.
    - **example**: 3
- **row_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to every row.
    - **example**: mb-4
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







ContactFormAndCompanyInfoWidget
==============

[Back to top](#summary)

- [Screenshots](#contactformandcompanyinfowidget-screenshots)
- [Templates and skins](#contactformandcompanyinfowidget-templates-and-skins)
- [Example](#contactformandcompanyinfowidget-configuration-example)
- [Variables descriptions](#contactformandcompanyinfowidget-variables-description)



ContactFormAndCompanyInfoWidget is a bootstrap 4 widget composed of two parts:

- a company info block
- a contact form


By default, the company info is on the left.

We can put it on the right using the "company_info_is_left" property.


The company info block is composed of the following elements:

- title
- text
- address
- email
- phone


Each element is optional, and is displayed only if not empty.

The form contact is composed of the following elements:

- title
- fields
- submit button

Each field has a type which is one of the following:

- text
- email
- textarea





ContactFormAndCompanyInfoWidget screenshots
----------

![Screenshot glozzom_two_columns_contact_form.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ContactFormAndCompanyInfoWidget/glozzom_two_columns_contact_form.png)





ContactFormAndCompanyInfoWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


ContactFormAndCompanyInfoWidget configuration example
----------------

```yaml
name: contact_form_and_company_info
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ContactFormAndCompanyInfoWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ContactFormAndCompanyInfoWidget
template: default.php
vars:
    attr:
        id: contact
        class: py-3

    company_info_is_left: true
    company_title: Get In Touch
    company_text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, ipsam.
    company_address: 550 Main St, Boston MA
    company_email: test@test.com
    company_phone: (555) 555-5555
    form_title: Please fill out this form to contact us
    form_action: ""
    form_method: post
    form_fields:
        -
            type: text
            name: name
            label: First Name

        -
            type: text
            name: last_name
            label: Last Name

        -
            type: email
            name: email
            label: Email

        -
            type: text
            name: phone
            label: Phone Number

        -
            type: textarea
            name: message
            label: Message


    form_btn_text: Submit
    form_btn_class: btn btn-outline-danger btn-block
```



ContactFormAndCompanyInfoWidget variables description
-----------

- **company_info_is_left**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to align the company info block on the left or on the right.
- **company_title**
    - **type**: string
    - **default_value**: 
    - **description**: The company title. If empty, will not be displayed.
    - **example**: Get In Touch
- **company_text**
    - **type**: string
    - **default_value**: 
    - **description**: The company description. If empty, will not be displayed.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, ipsam.
- **company_address**
    - **type**: string
    - **default_value**: 
    - **description**: The company address. If empty, will not be displayed.
    - **example**: 550 Main St, Boston MA
- **company_email**
    - **type**: string
    - **default_value**: 
    - **description**: The company email. If empty, will not be displayed.
    - **example**: test@test.com
- **company_phone**
    - **type**: string
    - **default_value**: 
    - **description**: The company phone number. If empty, will not be displayed.
    - **example**: (555) 555-5555
- **form_title**
    - **type**: string
    - **default_value**: 
    - **description**: The form title. If empty, will not be displayed.
    - **example**: Please fill out this form to contact us
- **form_action**
    - **type**: string
    - **default_value**: 
    - **description**: The form action attribute.
    - **example**: 
- **form_method**
    - **type**: string
    - **default_value**: post
    - **description**: The form method attribute.
    - **example**: post
    - **choices**
        - post
        - get
- **form_fields**
    - **type**: item_list
    - **default_value**
    - **description**: The array of form fields.
    - **item_properties**
        - **type**
            - **type**: string
            - **default_value**: 
            - **description**: The type of this form field.
            - **example**: text
            - **choices**
                - text
                - email
                - textarea
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The name attribute of this form field.
            - **example**: name
        - **label**
            - **type**: string
            - **default_value**: 
            - **description**: The label for this form field.
            - **example**: First Name
- **form_btn_text**
    - **type**: string
    - **default_value**: Submit
    - **description**: The text of the form submit button.
    - **example**: Submit
- **form_btn_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the form submit button.
    - **example**: btn btn-outline-danger btn-block







FooterWithButtonWidget
==============

[Back to top](#summary)

- [Screenshots](#footerwithbuttonwidget-screenshots)
- [Templates and skins](#footerwithbuttonwidget-templates-and-skins)
- [Example](#footerwithbuttonwidget-configuration-example)
- [Variables descriptions](#footerwithbuttonwidget-variables-description)



FooterWithButtonWidget is a bootstrap 4 widget for a footer with just a button inside of it.






FooterWithButtonWidget screenshots
----------

![Screenshot portfoliogrid_footer_with_download_button.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/FooterWithButtonWidget/portfoliogrid_footer_with_download_button.png)





FooterWithButtonWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: portfoliogrid.byml


FooterWithButtonWidget configuration example
----------------

```yaml
name: footer_with_button
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\FooterWithButtonWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/FooterWithButtonWidget
template: default.php
vars:
    attr:
        id: main-footer
        class: p-5 bg-dark text-white

    column_class: col-md-6
    icon: fas fa-cloud
    button_class: btn btn-outline-light
    button_url: "#"
    button_text: Download Resume
```



FooterWithButtonWidget variables description
-----------

- **column_class**
    - **type**: string
    - **default_value**: col-md-6
    - **description**: The css class to apply to the column containing the button.
    - **example**: col-md-6
- **icon**
    - **type**: string
    - **default_value**: 
    - **description**: The icon inside the button. If empty, will not be displayed.
    - **example**: fas fa-cloud
- **button_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the button.
    - **example**: btn btn-outline-light
- **button_url**
    - **type**: string
    - **default_value**: 
    - **description**: The url of the button.
    - **example**: #
- **button_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the button. If empty, will not be displayed.
    - **example**: Download Resume







GlozzomPricingTableWidget
==============

[Back to top](#summary)

- [Screenshots](#glozzompricingtablewidget-screenshots)
- [Templates and skins](#glozzompricingtablewidget-templates-and-skins)
- [Example](#glozzompricingtablewidget-configuration-example)
- [Variables descriptions](#glozzompricingtablewidget-variables-description)



GlozzomPricingTableWidget is a bootstrap 4 widget representing a pricing table.


The widget is composed of boxes, each of which having at most the following elements:

- title
- price
- description
- features, an array of features
- button
- footer


Each feature is composed of:

- icon
- text


We can define how we want to organize our pricing tables using the "column_class" property, which takes a bootstrap 4 grid css class.

More info at: https://getbootstrap.com/docs/4.0/layout/grid/








GlozzomPricingTableWidget screenshots
----------

![Screenshot glozzom_three_columns_pricing_table.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/GlozzomPricingTableWidget/glozzom_three_columns_pricing_table.png)





GlozzomPricingTableWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


GlozzomPricingTableWidget configuration example
----------------

```yaml
name: glozzom_pricing_table
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\GlozzomPricingTableWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/GlozzomPricingTableWidget
template: default.php
vars:
    attr:
        id: services
        class: py-5

    column_class: col-md-4
    boxes:
        -
            title: Service Plan One
            price: $59.99/Month
            description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, voluptatibus.
            features:
                -
                    icon: fas fa-check
                    text: Feature One

                -
                    icon: fas fa-check
                    text: Feature Two

                -
                    icon: fas fa-check
                    text: Feature Three

                -
                    icon: fas fa-check
                    text: Feature Four

                -
                    icon: fas fa-check
                    text: Feature Five


            btn_text: Get It
            btn_class: btn btn-danger btn-block mt-2
            btn_url: ""
            footer_text: 1 Year Plan

        -
            title: Service Plan Two
            price: $99.99/Month
            description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, voluptatibus.
            features:
                -
                    icon: fas fa-check
                    text: Feature One

                -
                    icon: fas fa-check
                    text: Feature Two

                -
                    icon: fas fa-check
                    text: Feature Three

                -
                    icon: fas fa-check
                    text: Feature Four

                -
                    icon: fas fa-check
                    text: Feature Five


            btn_text: Get It
            btn_class: btn btn-danger btn-block mt-2
            btn_url: ""
            footer_text: 1 Year Plan

        -
            title: Service Plan Three
            price: $129.99/Month
            description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, voluptatibus.
            features:
                -
                    icon: fas fa-check
                    text: Feature One

                -
                    icon: fas fa-check
                    text: Feature Two

                -
                    icon: fas fa-check
                    text: Feature Three

                -
                    icon: fas fa-check
                    text: Feature Four

                -
                    icon: fas fa-check
                    text: Feature Five


            btn_text: Get It
            btn_class: btn btn-danger btn-block mt-2
            btn_url: ""
            footer_text: 1 Year Plan


```



GlozzomPricingTableWidget variables description
-----------

- **column_class**
    - **type**: string
    - **default_value**: col-md-4
    - **description**: The css class to apply to the container of each box.
    - **example**: col-md-4
- **boxes**
    - **type**: item_list
    - **default_value**
    - **description**: The boxes.
    - **item_properties**
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the box. If empty, will not be displayed.
            - **example**: Service Plan One
        - **price**
            - **type**: string
            - **default_value**: 
            - **description**: The price of the box. If empty, will not be displayed.
            - **example**: $59.99/Month
        - **description**
            - **type**: string
            - **default_value**: 
            - **description**: The description of the box. If empty, will not be displayed.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, voluptatibus.
        - **features**
            - **type**: item_list
            - **default_value**
            - **description**: The array of features for this box.
            - **item_properties**
                - **icon**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The icon for this feature. If empty, will not be displayed.
                    - **example**: fas fa-check
                - **text**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The text for this feature. If empty, will not be displayed.
                    - **example**: Feature One
        - **btn_text**
            - **type**: string
            - **default_value**: 
            - **description**: The text for the button of the box. If empty, will not be displayed.
            - **example**: Get It
        - **btn_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class for the button of the box.
            - **example**: btn btn-danger btn-block mt-2
        - **btn_url**
            - **type**: string
            - **default_value**: #
            - **description**: The url of the button of this box.
            - **example**: 
        - **footer_text**
            - **type**: string
            - **default_value**: 
            - **description**: The footer of the box. If empty, will not be displayed.
            - **example**: 1 Year Plan







GlozzomTwoColumnsTeaserWidget
==============

[Back to top](#summary)

- [Screenshots](#glozzomtwocolumnsteaserwidget-screenshots)
- [Templates and skins](#glozzomtwocolumnsteaserwidget-templates-and-skins)
- [Example](#glozzomtwocolumnsteaserwidget-configuration-example)
- [Variables descriptions](#glozzomtwocolumnsteaserwidget-variables-description)



GlozzomTwoColumnsTeaserWidget is a bootstrap 4 widget composed of two parts:

- the teaser
- the image


By default the teaser is on the left and the image on the right.

We can have the teaser to the right by using the "teaser_align_left" property.

The teaser is composed of three parts:

- a title
- a text
- a button

If you don't define them, they will not appear. So for instance if you don't define the title, or if
your title is an empty string, it will not be displayed. Same for the text and the button (based on the button text).






GlozzomTwoColumnsTeaserWidget screenshots
----------

![Screenshot glozzom_two_columns_teaser.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/GlozzomTwoColumnsTeaserWidget/glozzom_two_columns_teaser.png)





GlozzomTwoColumnsTeaserWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


GlozzomTwoColumnsTeaserWidget configuration example
----------------

```yaml
name: glozzom_two_columns_teaser
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\GlozzomTwoColumnsTeaserWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/GlozzomTwoColumnsTeaserWidget
template: default.php
vars:
    attr:
        id: info
        class: py-3

    teaser_align_left: true
    title: Lorem Ipsum
    text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure nisi numquam odio, omnis quas quis suscipit? Doloremque, ratione vel.
    btn_url: ?page=about
    btn_class: btn btn-outline-danger btn-lg
    btn_text: Learn More
    img_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/laptop.png
    img_alt: My laptop
```



GlozzomTwoColumnsTeaserWidget variables description
-----------

- **teaser_align_left**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to align the teaser on the left or on the right.
- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If it's an empty string, the title will not be displayed.
    - **example**: Lorem Ipsum
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text. If it's an empty string, the text will not be displayed.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure nisi numquam odio, omnis quas quis suscipit? Doloremque, ratione vel.
- **btn_url**
    - **type**: string
    - **default_value**: #
    - **description**: The url of the button.
    - **example**: ?page=about
- **btn_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class for the btn.
    - **example**: btn btn-outline-danger btn-lg
- **btn_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the button. If it's an empty string, the button will not be displayed.
    - **example**: Learn More
- **img_url**
    - **type**: string
    - **default_value**: 
    - **description**: The url of the image.
    - **example**: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/laptop.png
- **img_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the alt attribute of the image.
    - **example**: My laptop







IconTeaserWidget
==============

[Back to top](#summary)

- [Screenshots](#iconteaserwidget-screenshots)
- [Templates and skins](#iconteaserwidget-templates-and-skins)
- [Example](#iconteaserwidget-configuration-example)
- [Variables descriptions](#iconteaserwidget-variables-description)



IconTeaserWidget is a bootstrap 4 widget to display some boxes with icons.
Each box is composed of 3 elements:
- icon
- title
- text

If an element is empty, it's not displayed.

We can choose how many boxes we want per line using the "column_class" property,
which takes a bootstrap 4 grid system css class as the input.

More info at https://getbootstrap.com/docs/4.0/layout/grid/





IconTeaserWidget screenshots
----------

![Screenshot glozzom_three_columns_icon_teaser.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/IconTeaserWidget/glozzom_three_columns_icon_teaser.png)





IconTeaserWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


IconTeaserWidget configuration example
----------------

```yaml
name: icon_teaser
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\IconTeaserWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/IconTeaserWidget
template: default.php
vars:
    attr:
        class: py-5
        id: home-icons

    column_class: col-md-4
    boxes:
        -
            class: mb-4 text-center
            icon: fas fa-cog fa-3x mb-2
            title: Turning Gears
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dignissimos!

        -
            icon: fas fa-cloud fa-3x mb-2
            class: mb-4 text-center
            title: Sending Data
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dignissimos!

        -
            icon: fas fa-cart-plus fa-3x mb-2
            class: mb-4 text-center
            title: Making Money
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dignissimos!


```



IconTeaserWidget variables description
-----------

- **column_class**
    - **type**: string
    - **default_value**: col-md-4
    - **description**: The column size css class to apply. A bootstrap 4 grid css class (or a combination of css classes) is
expected, such as col-md-4, col-sd-3, col-lg-6, ...
    - **example**: col-md-4
- **boxes**
    - **type**: item_list
    - **default_value**
    - **description**: The array of boxes.
    - **item_properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the box outer tag.
            - **example**: mb-4 text-center
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class of the icon of this box.
            - **example**: fas fa-cog fa-3x mb-2
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title for this box.
            - **example**: Turning Gears
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The description for this box.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, dignissimos!







LoopLabFooterWithContactUseButtonWidget
==============

[Back to top](#summary)

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





LoopLabFooterWithContactUseButtonWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css
- **Presets**: 


LoopLabFooterWithContactUseButtonWidget configuration example
----------------

```yaml
name: looplab_footer_with_contact_us_button
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabFooterWithContactUseButtonWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabFooterWithContactUseButtonWidget
template: default.php
vars:
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
    - **default_value**
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

[Back to top](#summary)

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





LoopLabMonoChromeHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: looplab-dark.css
- **Presets**: 


LoopLabMonoChromeHeaderWidget configuration example
----------------

```yaml
name: looplab_monochrome_header
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabMonoChromeHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabMonoChromeHeaderWidget
template: default.php
skin: looplab-dark
vars:
    attr:
        class: looplab-dark
        id: explore-head-section

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
    - **default_value**
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

[Back to top](#summary)

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





LoopLabTwoColumnsSignupFormWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css.php
- **Presets**: 


LoopLabTwoColumnsSignupFormWidget configuration example
----------------

```yaml
name: looplab_two_columns_signup_form
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabTwoColumnsSignupFormWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabTwoColumnsSignupFormWidget
template: default.php
vars:
    attr:
        id: home

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
    background_style: url('/plugins/Light_Kit_BootstrapWidgetLibrary/looplab/img/home.jpg')
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
    - **example**: url('/plugins/Light_Kit_BootstrapWidgetLibrary/looplab/img/home.jpg')







LoopLabTwoColumnsTeaserWidget
==============

[Back to top](#summary)

- [Screenshots](#looplabtwocolumnsteaserwidget-screenshots)
- [Templates and skins](#looplabtwocolumnsteaserwidget-templates-and-skins)
- [Example](#looplabtwocolumnsteaserwidget-configuration-example)
- [Variables descriptions](#looplabtwocolumnsteaserwidget-variables-description)



LoopLabTwoColumnsTeaserWidget is a bootstrap 4 widget representing a two columns teaser header.
It's composed of two parts: the image and the teaser.
By default, the image is on the left.
You can change this using the **img_on_left** property.
If you don't want it rounded, set the **img_rounded** property to false.

You can also change the vertical position of the image using the "img_top_margin" property.

The teaser part contains a title, a text, and a list with an arbitrary number of items with icons.





LoopLabTwoColumnsTeaserWidget screenshots
----------

![Screenshot glozzom_two_columns_teaser_with_overflowing_image.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsTeaserWidget/glozzom_two_columns_teaser_with_overflowing_image.png)

![Screenshot looplab_two_columns_teaser-alt.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsTeaserWidget/looplab_two_columns_teaser-alt.png)

![Screenshot looplab_two_columns_teaser-dark.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsTeaserWidget/looplab_two_columns_teaser-dark.png)

![Screenshot looplab_two_columns_teaser.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/LoopLabTwoColumnsTeaserWidget/looplab_two_columns_teaser.png)





LoopLabTwoColumnsTeaserWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css, looplab-dark.css
- **Presets**: glozzom.byml, looplab.byml


LoopLabTwoColumnsTeaserWidget configuration example
----------------

```yaml
name: looplab_two_columns_teaser
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\LoopLabTwoColumnsTeaserWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/LoopLabTwoColumnsTeaserWidget
template: default.php
vars:
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
    - **default_value**
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
- **img_top_margin**
    - **type**: string
    - **default_value**: 0px
    - **description**: The css margin-top value to apply to the image. This can be useful to quickly offset the image vertically for instance.
    - **example**: -50px
- **teaser_title**
    - **type**: string
    - **default_value**: 
    - **description**: The teaser title.
    - **example**: Explore & Connect
- **teaser_title_level**
    - **type**: number
    - **default_value**: 3
    - **description**: The teaser title level, from 1 to 6, corresponding to h1 to h6.
    - **example**: 3
    - **choices**
        - 1
        - 2
        - 3
        - 4
        - 5
        - 6
- **teaser_text**
    - **type**: string
    - **default_value**: 
    - **description**: The teaser text, or an array of teaser texts (each item representing a paragraph for instance).
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

[Back to top](#summary)

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





MainNavWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: glozzom.css, glozzom.scss, looplab-nav.css, mizuxe-nav.css, mizuxe-nav.scss
- **Presets**: glozzom.byml, looplab.byml, mizuxe.byml


MainNavWidget configuration example
----------------

```yaml
name: main_nav
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MainNavWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/MainNavWidget
template: default.php
skin: looplab-nav
vars:
    attr:
        id: main-nav
        class: bg-dark navbar-dark looplab-nav

    title: LoopLAB
    fixed_top: true
    use_scrollspy: true
    use_smooth_scrolling: true
    title_url: /
    expand_size: sm
    links:
        -
            text: Home
            url: "#home"

        -
            text: Explore
            url: "#explore-head-section"

        -
            text: Create
            url: "#create-head-section"

        -
            text: Share
            url: "#share-head-section"


    links_align_right: true
```



MainNavWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**
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
    - **default_value**
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
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to add to this specific link item. Note: it merges with the "links_item_class" property.
            - **example**: mr-3
        - **active**
            - **type**: bool
            - **default_value**: false
            - **description**: Whether to add the active class to the item.
            - **example**: true
        - **children**
            - **alias_of**: links
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







MizuxeContactFormWidget
==============

[Back to top](#summary)

- [Screenshots](#mizuxecontactformwidget-screenshots)
- [Templates and skins](#mizuxecontactformwidget-templates-and-skins)
- [Example](#mizuxecontactformwidget-configuration-example)
- [Variables descriptions](#mizuxecontactformwidget-variables-description)



MizuxeContactFormWidget is a bootstrap 4 widget representing a contact form.

It's composed of two parts:
- the form
- the image

The form is composed of a title, a text, some fields, and a submit button.

Each form field has a type, which can be one of:
- text: an input of type text
- email: an input of type email
- textarea: a textarea


The image can be hidden using the "show_image" property.







MizuxeContactFormWidget screenshots
----------

![Screenshot mizuxe_one_column_contact_form.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/MizuxeContactFormWidget/mizuxe_one_column_contact_form.png)

![Screenshot portfoliogrid_contact_form.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/MizuxeContactFormWidget/portfoliogrid_contact_form.png)





MizuxeContactFormWidget templates, skins, presets
-----------
- **Templates**: card.php, default.php
- **Skins**: 
- **Presets**: mizuxe.byml, portfoliogrid.byml


MizuxeContactFormWidget configuration example
----------------

```yaml
name: mizuxe_one_column_contact_form
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MizuxeContactFormWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/MizuxeContactFormWidget
template: default.php
vars:
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



MizuxeContactFormWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**
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
- **form_text_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the text of the form.
    - **example**: lead
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
        - **icon_wrapper_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the element containing the icon.
            - **example**: bg-danger text-white
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the field element.
            - **example**: bg-dark text-white
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
        - **rows**
            - **type**: number
            - **default_value**: null
            - **description**: The number of rows for the textarea element only. If null, the number of rows is not specified.
            - **example**: 5
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







MizuxeFourColumnsOurStaffWidget
==============

[Back to top](#summary)

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





MizuxeFourColumnsOurStaffWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: 


MizuxeFourColumnsOurStaffWidget configuration example
----------------

```yaml
name: mizuxe_four_columns_our_staff_header
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MizuxeFourColumnsOurStaffWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/MizuxeFourColumnsOurStaffWidget
template: default.php
vars:
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
    - **default_value**
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

[Back to top](#summary)

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





MizuxeNewsletterSignupHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: 


MizuxeNewsletterSignupHeaderWidget configuration example
----------------

```yaml
name: mizuxe_newsletter_signup_header
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MizuxeNewsletterSignupHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/MizuxeNewsletterSignupHeaderWidget
template: default.php
vars:
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
    - **default_value**
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







MizuxeTwoColumnsTeaserWidget
==============

[Back to top](#summary)

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





MizuxeTwoColumnsTeaserWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css
- **Presets**: 


MizuxeTwoColumnsTeaserWidget configuration example
----------------

```yaml
name: mizuxe_two_columns_teaser
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\MizuxeTwoColumnsTeaserWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/MizuxeTwoColumnsTeaserWidget
template: default.php
vars:
    attr:
        id: showcase
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
    img_src: /plugins/Light_Kit_BootstrapWidgetLibrary/mizuxe/img/book.png
    img_alt: Mizuxe Mountains Book
    bg_style: url('/plugins/Light_Kit_BootstrapWidgetLibrary/mizuxe/img/mountains.jpg')
    bg_overlay_style: rgba(50, 146, 166, 0.8);
    bg_overlay_class: text-white
```



MizuxeTwoColumnsTeaserWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**
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
    - **example**: /plugins/Light_Kit_BootstrapWidgetLibrary/mizuxe/img/book.png
- **img_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the alt attribute of the img tag for the image.
    - **example**: Mizuxe Mountains Book
- **bg_style**
    - **type**: string
    - **default_value**: transparent
    - **description**: The value of the background css property for the background image.
    - **example**: url('/plugins/Light_Kit_BootstrapWidgetLibrary/mizuxe/img/mountains.jpg')
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







NewsletterHeaderWidget
==============

[Back to top](#summary)

- [Screenshots](#newsletterheaderwidget-screenshots)
- [Templates and skins](#newsletterheaderwidget-templates-and-skins)
- [Example](#newsletterheaderwidget-configuration-example)
- [Variables descriptions](#newsletterheaderwidget-variables-description)



NewsletterHeaderWidget is a bootstrap 4 widget representing a newsletter signup form.


It has three parts:

- the title
- the text
- the form

We can disable the title and text by setting their values to an empty string.

The form is composed an arbitrary number of fields, and a submit button. Usually, only one field for collecting the email
is required.





NewsletterHeaderWidget screenshots
----------

![Screenshot glozzom_newsletter_signup_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/NewsletterHeaderWidget/glozzom_newsletter_signup_header.png)





NewsletterHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


NewsletterHeaderWidget configuration example
----------------

```yaml
name: newsletter_header
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\NewsletterHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/NewsletterHeaderWidget
template: default.php
vars:
    attr:
        id: newsletter
        class: text-center p-5 bg-dark text-white

    title: Sign Up For Our Newsletter
    text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium alias aliquam amet eaque laudantium officia optio quas tempora voluptatum.
    fields:
        -
            type: text
            label: Enter Name
            name: name

        -
            type: email
            label: Enter Email
            name: email


    btn_class: btn btn-primary mb-2
    btn_text: Submit
```



NewsletterHeaderWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Sign Up For Our Newsletter
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text. If empty, will not be displayed.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium alias aliquam amet eaque laudantium officia optio quas tempora voluptatum.
- **fields**
    - **type**: item_list
    - **default_value**
    - **description**: The array of form fields.
    - **item_properties**
        - **type**
            - **type**: string
            - **default_value**: 
            - **description**: The type of the input tag. It can be one of "text" or "email".
            - **example**: text
            - **choices**
                - text
                - email
        - **label**
            - **type**: string
            - **default_value**: 
            - **description**: The label for this form field.
            - **example**: Enter Name
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The name attribute for this form field.
            - **example**: name
- **btn_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the submit button.
    - **example**: btn btn-primary mb-2
- **btn_text**
    - **type**: string
    - **default_value**: Submit
    - **description**: The text of the submit button.
    - **example**: Submit







OneColumnAccordionWidget
==============

[Back to top](#summary)

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





OneColumnAccordionWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: 


OneColumnAccordionWidget configuration example
----------------

```yaml
name: one_column_accordion
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\OneColumnAccordionWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/OneColumnAccordionWidget
template: default.php
vars:
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
    - **default_value**
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







ParallaxHeaderWidget
==============

[Back to top](#summary)

- [Screenshots](#parallaxheaderwidget-screenshots)
- [Templates and skins](#parallaxheaderwidget-templates-and-skins)
- [Example](#parallaxheaderwidget-configuration-example)
- [Variables descriptions](#parallaxheaderwidget-variables-description)



ParallaxHeaderWidget is a bootstrap 4 widget to display a header with a parallax effect.
The parallax header is composed of four elements:
- the background image
- an overlay to tint/attenuate the background image
- a title
- a text

By default, the text only shows up if the screen is medium size or larger.
We can control at which size the text shows up by using the "text_visible_size" property.

If the title is empty, it will not be displayed.

If the text is empty, it will not be displayed.





ParallaxHeaderWidget screenshots
----------

![Screenshot glozzom_parallax_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ParallaxHeaderWidget/glozzom_parallax_header.png)





ParallaxHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php, no-overlay.php
- **Skins**: default.css, no-overlay.css
- **Presets**: glozzom-home.byml, glozzom-no-overlay.byml


ParallaxHeaderWidget configuration example
----------------

```yaml
name: parallax_header
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ParallaxHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ParallaxHeaderWidget
template: default.php
vars:
    attr:
        id: home-heading
        class: p-5

    background_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/lights.jpg
    background_height: 200px
    overlay_color: rgba(0,0,0,0.7)
    title: Are You Ready To Get Started?
    text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad dolore illum in ipsum iste odio perferendis quia quidem quos sit?
    text_visible_size: md
```



ParallaxHeaderWidget variables description
-----------

- **background_url**
    - **type**: string
    - **default_value**: 
    - **description**: The url of the background image.
    - **example**: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/lights.jpg
- **background_height**
    - **type**: string
    - **default_value**: 200px
    - **description**: The css height of the background image.
    - **example**: 200px
- **background_position**
    - **type**: string
    - **default_value**: 0px 0px
    - **description**: The css background-position value to apply to the background image.
    - **example**: 0 -360px
- **overlay_color**
    - **type**: string
    - **default_value**: rgba(0,0,0,0.7)
    - **description**: The background color of the overlay covering the background image. Note: not all templates use overlay.
    - **example**: rgba(0,0,0,0.7)
- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, it will not be displayed.
    - **example**: Are You Ready To Get Started?
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text. If empty, it will not be displayed.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad dolore illum in ipsum iste odio perferendis quia quidem quos sit?
- **text_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the text.
    - **example**: d-none d-md-block







ParallaxHeaderWithVideoTriggerWidget
==============

[Back to top](#summary)

- [Screenshots](#parallaxheaderwithvideotriggerwidget-screenshots)
- [Templates and skins](#parallaxheaderwithvideotriggerwidget-templates-and-skins)
- [Example](#parallaxheaderwithvideotriggerwidget-configuration-example)
- [Variables descriptions](#parallaxheaderwithvideotriggerwidget-variables-description)



ParallaxHeaderWithVideoTriggerWidget is a bootstrap 4 widget allows us to show a youtube video.

It's composed of four parts:

- the background, which is a background image with a parallax effect
- the overlay, lays on top of the background image and tints/attenuates it
- the text and icon to trigger the video
- the video






ParallaxHeaderWithVideoTriggerWidget screenshots
----------

![Screenshot glozzom_parallax_video_trigger_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ParallaxHeaderWithVideoTriggerWidget/glozzom_parallax_video_trigger_header.png)





ParallaxHeaderWithVideoTriggerWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css
- **Presets**: glozzom.byml


ParallaxHeaderWithVideoTriggerWidget configuration example
----------------

```yaml
name: parallax_header_with_video_trigger
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ParallaxHeaderWithVideoTriggerWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ParallaxHeaderWithVideoTriggerWidget
template: default.php
vars:
    attr:
        id: video-play

    video_url: https://www.youtube.com/embed/HnwsG9a5riA
    background_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/media.jpg
    background_height: 200px
    background_position: 0 -300px
    overlay_color: rgba(0,0,0,0.7)
    icon: fas fa-play fa-3x
    text: See What We Do
```



ParallaxHeaderWithVideoTriggerWidget variables description
-----------

- **video_url**
    - **type**: string
    - **default_value**: 
    - **description**: The url of the video.
    - **example**: https://www.youtube.com/embed/HnwsG9a5riA
- **background_url**
    - **type**: string
    - **default_value**: 
    - **description**: The url of the background image.
    - **example**: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/media.jpg
- **background_height**
    - **type**: string
    - **default_value**: 200px
    - **description**: The height of the background image.
    - **example**: 200px
- **background_position**
    - **type**: string
    - **default_value**: 0 -300px
    - **description**: Use this to adjust the vertical position of the background. It expects the value of the css background-position property.
    - **example**: 0 -300px
- **overlay_color**
    - **type**: string
    - **default_value**: rgba(0,0,0,0.7)
    - **description**: The css background-color to apply to the overlay.
    - **example**: rgba(0,0,0,0.7)
- **icon**
    - **type**: string
    - **default_value**: fas fa-play fa-3x
    - **description**: The css class for the icon.
    - **example**: fas fa-play fa-3x
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text
    - **example**: See What We Do







PeopleGridWidget
==============

[Back to top](#summary)

- [Screenshots](#peoplegridwidget-screenshots)
- [Templates and skins](#peoplegridwidget-templates-and-skins)
- [Example](#peoplegridwidget-configuration-example)
- [Variables descriptions](#peoplegridwidget-variables-description)



PeopleGridWidget is a bootstrap 4 widget displaying people profiles in a grid.

We can decide the grid dimensions and responsiveness using the "column_class", which takes a bootstrap 4 grid css class,
along with the "nb_profiles_per_row" property.

More info at: https://getbootstrap.com/docs/4.0/layout/grid/

The widget is composed of:

- a title
- a list of profiles

The title is optional, and will only be displayed if not empty.

Each profile is composed of:

- the image, which can be rounded or not using the "is_rounded" property
- the person name
- the person role

The person's name and role are optional and will only be displayed if not empty.







PeopleGridWidget screenshots
----------

![Screenshot glozzom_four_columns_our_staff_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/PeopleGridWidget/glozzom_four_columns_our_staff_header.png)





PeopleGridWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


PeopleGridWidget configuration example
----------------

```yaml
name: people_grid
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PeopleGridWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/PeopleGridWidget
template: default.php
vars:
    attr:
        id: staff
        class: py-5 text-center bg-dark text-white

    column_class: col-md-3
    nb_profiles_per_row: 4
    row_class: mt-5
    title: Our Staff
    profiles:
        -
            img_url: /plugins/Light_Kit_Demo/glozzom/img/person1.jpg
            img_alt: Jane Doe
            name: Jane Doe
            role: Marketing Manager
            is_rounded: true

        -
            img_url: /plugins/Light_Kit_Demo/glozzom/img/person2.jpg
            img_alt: Sara Williams
            name: Sara Williams
            role: Business Manager
            is_rounded: true

        -
            img_url: /plugins/Light_Kit_Demo/glozzom/img/person3.jpg
            img_alt: John Doe
            name: John Doe
            role: CEO
            is_rounded: true

        -
            img_url: /plugins/Light_Kit_Demo/glozzom/img/person4.jpg
            img_alt: Steve Smith
            name: Steve Smith
            role: Web Developer
            is_rounded: true


```



PeopleGridWidget variables description
-----------

- **column_class**
    - **type**: string
    - **default_value**: col-md-3
    - **description**: The css class to apply to the columns containing the profiles. You should use bootstrap 4 grid css classes.
    - **example**: col-md-3
- **nb_profiles_per_row**
    - **type**: string
    - **default_value**: 4
    - **description**: The number of profiles per row. Adjust this parameter according to the value set in the "column_class" property.
    - **example**: 4
- **row_class**
    - **type**: string
    - **default_value**: mt-5
    - **description**: The css class to add on the non initial rows. Use this property to define the vertical spacing between rows.
    - **example**: mt-5
- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Our Staff
- **profiles**
    - **type**: item_list
    - **default_value**
    - **description**: The array of profiles.
    - **item_properties**
        - **img_url**
            - **type**: string
            - **default_value**: 
            - **description**: The image for this profile.
            - **example**: /plugins/Light_Kit_Demo/glozzom/img/person1.jpg
        - **img_alt**
            - **type**: string
            - **default_value**: 
            - **description**: The alt attribute of the image for this profile.
            - **example**: Jane Doe
        - **name**
            - **type**: string
            - **default_value**: 
            - **description**: The name for this profile. If empty, will not be displayed.
            - **example**: Jane Doe
        - **role**
            - **type**: string
            - **default_value**: 
            - **description**: The role for this profile. If empty, will not be displayed.
            - **example**: Marketing Manager
        - **is_rounded**
            - **type**: bool
            - **default_value**: true
            - **description**: Whether the profile image should be rounded.







PhotoGalleryWidget
==============

[Back to top](#summary)

- [Screenshots](#photogallerywidget-screenshots)
- [Templates and skins](#photogallerywidget-templates-and-skins)
- [Example](#photogallerywidget-configuration-example)
- [Variables descriptions](#photogallerywidget-variables-description)



PhotoGalleryWidget is a bootstrap 4 widget showing a photo gallery.

It uses the ekko plugin, so that when the user clicks a photo, the photo opens in a lightbox.

You can decide how many photos per row you want using the "nb_photos_per_row" property, along with the "columns_class" property,
which expects a bootstrap 4 grid css class. More info at: https://getbootstrap.com/docs/4.0/layout/grid/.


The gallery is composed of:

- a title
- a text
- the photos





PhotoGalleryWidget screenshots
----------

![Screenshot glozzom_three_columns_photo_gallery.jpg](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/PhotoGalleryWidget/glozzom_three_columns_photo_gallery.jpg)





PhotoGalleryWidget templates, skins, presets
-----------
- **Templates**: default.php, no-container.php
- **Skins**: 
- **Presets**: glozzom.byml, portfoliogrid-nogutters.byml


PhotoGalleryWidget configuration example
----------------

```yaml
name: photo_gallery
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PhotoGalleryWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/PhotoGalleryWidget
template: default.php
vars:
    attr:
        id: gallery
        class: py-5
    title: Photo Gallery
    title_class: text-center
    title_level: 1
    text: Check out our photos
    text_class: text-center
    column_class: col-md-4
    nb_photos_per_row: 3
    photos:
        -
            url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/photo-1.jpg
            alt: photo-1
        -
            url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/photo-2.jpg
            alt: photo-2
        -
            url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/photo-3.jpg
            alt: photo-3
        -
            url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/photo-4.jpg
            alt: photo-4
        -
            url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/photo-5.jpg
            alt: photo-5
        -
            url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/photo-6.jpg
            alt: photo-6

```



PhotoGalleryWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title of the photo gallery. If empty, it will not be displayed.
    - **example**: Photo Gallery
- **title_level**
    - **type**: number
    - **default_value**: 1
    - **description**: The importance level of the title, from 1 (the most important) to 6 (the least important).
    - **example**: 3
- **title_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the title of the photo gallery.
    - **example**: text-center
- **text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the photo gallery. If empty, it will not be displayed.
    - **example**: Check out our photos
- **text_class**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the text of the photo gallery.
    - **example**: text-center
- **column_class**
    - **type**: string
    - **default_value**: col-md-4
    - **description**: The css class to apply to the columns containing the photos. You should use bootstrap 4 grid classes.
    - **example**: col-md-4
- **row_class**
    - **type**: string
    - **default_value**: mb-4
    - **description**: The css class to apply to the rows.
    - **example**
        - mb-4
        - no-gutters
- **nb_photos_per_row**
    - **type**: string
    - **default_value**: 3
    - **description**: The number of photos per row. You may also want to adjust the "column_class" property accordingly.
    - **example**: 3
- **photos**
    - **type**: item_list
    - **default_value**
    - **description**: An array of the photos.
    - **item_properties**
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the photo.
            - **example**: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/photo-1.jpg
        - **alt**
            - **type**: string
            - **default_value**: 
            - **description**: The value of the alt attribute for the photo.
            - **example**: photo-1







PortfolioGridHeaderWithDescriptionWidget
==============

[Back to top](#summary)

- [Screenshots](#portfoliogridheaderwithdescriptionwidget-screenshots)
- [Templates and skins](#portfoliogridheaderwithdescriptionwidget-templates-and-skins)
- [Example](#portfoliogridheaderwithdescriptionwidget-configuration-example)
- [Variables descriptions](#portfoliogridheaderwithdescriptionwidget-variables-description)



PortfolioGridHeaderWithDescriptionWidget is a bootstrap 4 widget representing a header with a title and a description.





PortfolioGridHeaderWithDescriptionWidget screenshots
----------

![Screenshot portfoliogrid_monochrome_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/PortfolioGridHeaderWithDescriptionWidget/portfoliogrid_monochrome_header.png)





PortfolioGridHeaderWithDescriptionWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: portfoliogrid.byml


PortfolioGridHeaderWithDescriptionWidget configuration example
----------------

```yaml
name: portfoliogrid_header_with_description
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PortfolioGridHeaderWithDescriptionWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/PortfolioGridHeaderWithDescriptionWidget
template: default.php
vars:
    attr:
        class: bg-primary text-white py-5

    title: Welcome To My Page
    description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, provident?
```



PortfolioGridHeaderWithDescriptionWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Welcome To My Page
- **description**
    - **type**: string
    - **default_value**: 
    - **description**: The description. If empty, will not be displayed.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, provident?







PortfolioGridMainNavHeaderWidget
==============

[Back to top](#summary)

- [Screenshots](#portfoliogridmainnavheaderwidget-screenshots)
- [Templates and skins](#portfoliogridmainnavheaderwidget-templates-and-skins)
- [Example](#portfoliogridmainnavheaderwidget-configuration-example)
- [Variables descriptions](#portfoliogridmainnavheaderwidget-variables-description)



PortfolioGridMainNavHeaderWidget is a bootstrap 4 widget representing the main navigation header for a portfolio website.

The header contains the following element:

- the photo of the candidate on the left
- a zone on the right on the photo, containing:
    - the name and social icons links (facebook, twitter, ...)
    - the role of the candidate
    - the links to the page, which by default use the accordion system


We can disable the accordion system with the "use_accordion" property.

If the accordion system is used, I recommend to use a special layout
which contains as many zones as there are accordion links.
Then the id attribute of the zones should correspond to the accordion links urls.

Other implementation of the accordion are possible, of course.









PortfolioGridMainNavHeaderWidget screenshots
----------

![Screenshot portfoliogrid_main_nav_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/PortfolioGridMainNavHeaderWidget/portfoliogrid_main_nav_header.png)





PortfolioGridMainNavHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css
- **Presets**: portfoliogrid.byml


PortfolioGridMainNavHeaderWidget configuration example
----------------

```yaml
name: portfoliogrid_main_nav_header
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PortfolioGridMainNavHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/PortfolioGridMainNavHeaderWidget
template: default.php
vars:
    attr:
        id: main-header

    use_accordion: true
    photo_url: /plugins/Light_Kit_Demo/portfoliogrid/img/person1.jpg
    photo_alt: John Doe
    name: John Doe
    social_icons:
        -
            url: http://twitter.com
            icon: fab fa-twitter

        -
            url: http://facebook.com
            icon: fab fa-facebook

        -
            url: http://instagram.com
            icon: fab fa-instagram

        -
            url: http://github.com
            icon: fab fa-github


    role: Experienced Full Stack Web Developer
    links:
        -
            label: Home
            icon: fas fa-home fa-2x d-block
            url: "#home"
            class: bg-primary

        -
            label: Resume
            icon: fas fa-graduation-cap fa-2x d-block
            url: "#resume"
            class: bg-success

        -
            label: Work
            icon: fas fa-folder-open fa-2x d-block
            url: "#work"
            class: bg-warning

        -
            label: Contact
            icon: fas fa-envelope fa-2x d-block
            url: "#contact"
            class: bg-danger


```



PortfolioGridMainNavHeaderWidget variables description
-----------

- **use_accordion**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to make links use accordion.
- **photo_url**
    - **type**: string
    - **default_value**: 
    - **description**: The url of the photo.
    - **example**: /plugins/Light_Kit_Demo/portfoliogrid/img/person1.jpg
- **photo_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The alt attribute of the photo.
    - **example**: John Doe
- **name**
    - **type**: string
    - **default_value**: 
    - **description**: The name.
    - **example**: John Doe
- **social_icons**
    - **type**: item_list
    - **default_value**
    - **description**: The array of social icons.
    - **item_properties**
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the social icon.
            - **example**: http://twitter.com
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the social icon.
            - **example**: fab fa-twitter
- **role**
    - **type**: string
    - **default_value**: 
    - **description**: The role.
    - **example**: Experienced Full Stack Web Developer
- **links**
    - **type**: item_list
    - **default_value**
    - **description**: The array of links. If you use the accordion system, you must prefix links with the hash symbol (#)
    - **item_properties**
        - **label**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the link.
            - **example**: Home
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class for the icon of the link.
            - **example**: fas fa-home fa-2x d-block
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the link.
            - **example**: #home
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the link.
            - **example**: bg-primary







PortfolioGridThreeColumnsCardInfoWidget
==============

[Back to top](#summary)

- [Screenshots](#portfoliogridthreecolumnscardinfowidget-screenshots)
- [Templates and skins](#portfoliogridthreecolumnscardinfowidget-templates-and-skins)
- [Example](#portfoliogridthreecolumnscardinfowidget-configuration-example)
- [Variables descriptions](#portfoliogridthreecolumnscardinfowidget-variables-description)



PortfolioGridThreeColumnsCardInfoWidget is a bootstrap 4 widget displaying some cards info.



The widget is composed of:

- a title
- a description
- the cards

Each card is composed of the following elements:

- the title
- the description
- the features
- the footer


It's possible to change the cards's column size and responsiveness using the bootstrap 4 grid css classes.

More on this at: https://getbootstrap.com/docs/4.0/layout/grid/.





PortfolioGridThreeColumnsCardInfoWidget screenshots
----------

![Screenshot portfoliogrid_three_columns_card_info.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/PortfolioGridThreeColumnsCardInfoWidget/portfoliogrid_three_columns_card_info.png)





PortfolioGridThreeColumnsCardInfoWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: portfoliogrid.byml


PortfolioGridThreeColumnsCardInfoWidget configuration example
----------------

```yaml
name: portfoliogrid_three_columns_card_info
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PortfolioGridThreeColumnsCardInfoWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/PortfolioGridThreeColumnsCardInfoWidget
template: default.php
vars:
    attr:
        class: py-5

    title: Where Have I Worked?
    description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur nihil quasi qui, quibusdam similique voluptatem?
    cards:
        -
            title: Devmasters
            description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, ratione?
            features:
                -
                    class: p-2 mb-3 bg-dark text-white
                    text: Position: Full Stack Developer

                -
                    class: p-2 mb-3 bg-dark text-white
                    text: Phone: (444) 444-4444


            footer_text: Dates: 2015 - 2018

        -
            title: 123 Designs
            description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, ratione?
            features:
                -
                    class: p-2 mb-3 bg-dark text-white
                    text: Position: Web Designer

                -
                    class: p-2 mb-3 bg-dark text-white
                    text: Phone: (222) 222-2222


            footer_text: Dates: 2013 - 2015

        -
            title: Web Designer Pros
            description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, ratione?
            features:
                -
                    class: p-2 mb-3 bg-dark text-white
                    text: Position: Web Designer

                -
                    class: p-2 mb-3 bg-dark text-white
                    text: Phone: (333) 333-3333


            footer_text: Dates: 2010 - 2013


```



PortfolioGridThreeColumnsCardInfoWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Where Have I Worked?
- **description**
    - **type**: string
    - **default_value**: 
    - **description**: The description. If empty, will not be displayed.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur nihil quasi qui, quibusdam similique voluptatem?
- **cards**
    - **type**: item_list
    - **default_value**
    - **description**: The array of cards.
    - **item_properties**
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the card. If empty, will not be displayed.
            - **example**: Devmasters
        - **description**
            - **type**: string
            - **default_value**: 
            - **description**: The description of the card. If empty, will not be displayed.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, ratione?
        - **features**
            - **type**: item_list
            - **default_value**
            - **description**: The array of features for this card.
            - **item_properties**
                - **class**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The css class to apply to this feature.
                    - **example**: p-2 mb-3 bg-dark text-white
                - **text**
                    - **type**: string
                    - **default_value**: 
                    - **description**: The text of this feature.
                    - **example**: Position: Full Stack Developer
        - **footer_text**
            - **type**: string
            - **default_value**: 
            - **description**: The footer text for the card. If empty, will not be displayed.
            - **example**: Dates: 2015 - 2018







ProgressBarWidget
==============

[Back to top](#summary)

- [Screenshots](#progressbarwidget-screenshots)
- [Templates and skins](#progressbarwidget-templates-and-skins)
- [Example](#progressbarwidget-configuration-example)
- [Variables descriptions](#progressbarwidget-variables-description)



ProgressBarWidget is a bootstrap 4 widget displaying progress bars.


It's composed of the following elements:

- title
- description
- progress bars


Each progress bar is composed of:

- a text
- a bar






ProgressBarWidget screenshots
----------

![Screenshot portfoliogrid_progress_bars.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ProgressBarWidget/portfoliogrid_progress_bars.png)





ProgressBarWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: portfoliogrid.byml


ProgressBarWidget configuration example
----------------

```yaml
name: progress_bar
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ProgressBarWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ProgressBarWidget
template: default.php
vars:
    attr:
        class: py-5

    title: Welcome To My Page
    description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, provident?
    progress_bars:
        -
            text: HTML 5
            percent: 100
            class: bg-success

        -
            text: CSS 3
            percent: 100
            class: bg-success

        -
            text: JavaScript
            percent: 90
            class: bg-success

        -
            text: PHP
            percent: 80
            class: bg-success

        -
            text: Python
            percent: 70
            class: bg-success


```



ProgressBarWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title. If empty, will not be displayed.
    - **example**: Welcome To My Page
- **description**
    - **type**: string
    - **default_value**: 
    - **description**: The description. If empty, will not be displayed.
    - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, provident?
- **progress_bars**
    - **type**: item_list
    - **default_value**
    - **description**: The array of progress bars.
    - **item_properties**
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the progress bar.
            - **example**: HTML 5
        - **percent**
            - **type**: string
            - **default_value**: 
            - **description**: The percent of the progress bar.
            - **example**: 100
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the progress bar.
            - **example**: bg-success







ShowCaseCarouselWidget
==============

[Back to top](#summary)

- [Screenshots](#showcasecarouselwidget-screenshots)
- [Templates and skins](#showcasecarouselwidget-templates-and-skins)
- [Example](#showcasecarouselwidget-configuration-example)
- [Variables descriptions](#showcasecarouselwidget-variables-description)



The ShowCaseCarouselWidget is a bootstrap 4 widget representing a carousel with sliding items.

It uses the bootstrap 4 carousel component (more info at https://getbootstrap.com/docs/4.0/components/carousel/)

Each item by default is composed of the following elements:
- background image
- title
- text
- button

We can decide which item should be display first by adding the setting the "active" property of the desired item
to true.

By default, the textual elements of an item (the title, text and button) are only visible on small screens and larger (i.e. on
very small screens like mobile, they aren't visible, because they take too much space).

We can change the size at which the textual elements become visible using the "captions_visible_size" property.

Also, for the title, text and button of each item, if their text is empty they will not be displayed.

So for instance if the title of an item is empty, it will not be displayed for that item.
Same for the text and the button.


By default, the navigation between items occur automatically every 6 seconds.
It's possible to change the time an item stays on the showcase using the "js.interval" property,
and more generally it's possible to define the behaviour of the carousel using the properties inside the "js" property.

See the variables description for more details.

By default, the carousel has navigation arrows on the edges, and navigation indicators near the bottom of the carousel.
We can de-activate those by using the "show_nav_arrows" and "show_nav_indicators" properties.






ShowCaseCarouselWidget screenshots
----------

![Screenshot glozzom_showcase_carousel.jpg](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ShowCaseCarouselWidget/glozzom_showcase_carousel.jpg)





ShowCaseCarouselWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css.php
- **Presets**: 


ShowCaseCarouselWidget configuration example
----------------

```yaml
name: glozzom_showcase_carousel
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ShowCaseCarouselWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ShowCaseCarouselWidget
template: default.php
vars:
    attr:
        id: showcase

    js:
        automatic_cycle: true
        interval: 6000
        pause_on_hover: true

    show_nav_arrows: true
    show_nav_indicators: true
    captions_visible_size: sm
    items:
        -
            img_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/image1.jpg
            caption_align: right
            title: Heading One
            title_class: display-3
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore ea, harum itaque maiores nihil perferendis quae sint tempore voluptates?
            text_class: lead
            btn_text: Sign Up Now
            btn_url: "#"
            btn_class: btn btn-danger btn-lg
            active: true

        -
            img_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/image2.jpg
            caption_align: center
            title: Heading Two
            title_class: display-3
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore ea, harum itaque maiores nihil perferendis quae sint tempore voluptates?
            text_class: lead
            btn_text: Learn More
            btn_url: "#"
            btn_class: btn btn-primary btn-lg

        -
            caption_align: right
            img_url: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/image3.jpg
            title: Heading Three
            title_class: display-3
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore ea, harum itaque maiores nihil perferendis quae sint tempore voluptates?
            text_class: lead
            btn_text: Learn More
            btn_url: "#"
            btn_class: btn btn-success btn-lg


```



ShowCaseCarouselWidget variables description
-----------

- **js**
    - **type**: array
    - **default_value**: null
    - **description**: An array of parameters to define the behaviour of the javascript part of the slider.
    - **properties**
        - **automatic_cycle**
            - **type**: bool
            - **default_value**: true
            - **description**: Whether to automatically cycles through the items. If not, the user needs to change the slide manually.
        - **interval**
            - **type**: string
            - **default_value**: 6000
            - **description**: The amount of time (in milliseconds) to delay between automatically cycling an item. This option is only
relevant if the automatic_cycle option is set to true.
            - **example**: 6000
        - **pause_on_hover**
            - **type**: bool
            - **default_value**: true
            - **description**: If true, the carousel will stop sliding as long as the user hovers her cursor on a carousel item.
- **show_nav_arrows**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the navigation arrows.
- **show_nav_indicators**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the navigation indicators.
- **captions_visible_size**
    - **type**: string
    - **default_value**: sm
    - **description**: The size at which the textual information of the slide should become visible (between small, medium and large).
    - **example**: sm
    - **choices**
        - sm
        - md
        - lg
- **items**
    - **type**: item_list
    - **default_value**
    - **description**: The items of the carousel.
    - **item_properties**
        - **img_url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the background image for this carousel item.
            - **example**: /plugins/Light_Kit_BootstrapWidgetLibrary/glozzom/img/image1.jpg
        - **caption_align**
            - **type**: string
            - **default_value**: right
            - **description**: How to align the textual information (aka caption) of this carousel item.
            - **example**: right
            - **choices**
                - left
                - center
                - right
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title for this carousel item. If this value is empty, the title will not be displayed.
            - **example**: Heading One
        - **title_class**
            - **type**: string
            - **default_value**: display-3
            - **description**: The css class to apply to the title of this carousel item.
            - **example**: display-3
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text for this carousel item. If this value is empty, the text will not be displayed.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore ea, harum itaque maiores nihil perferendis quae sint tempore voluptates?
        - **text_class**
            - **type**: string
            - **default_value**: lead
            - **description**: The css class to apply to the text of this carousel item.
            - **example**: lead
        - **btn_text**
            - **type**: string
            - **default_value**: 
            - **description**: The text for the button of this carousel item. If this value is empty, the button will not be displayed.
            - **example**
                - Sign Up Now
                - Read More
        - **btn_url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the button for this carousel item.
            - **example**: 
        - **btn_class**
            - **type**: string
            - **default_value**: btn
            - **description**: The css class to apply to the button for this carousel item.
            - **example**: btn btn-danger btn-lg
        - **active**
            - **type**: bool
            - **default_value**: false
            - **description**: If true, indicates that this carousel item should be displayed first when the page opens.







SimpleFooterWidget
==============

[Back to top](#summary)

- [Screenshots](#simplefooterwidget-screenshots)
- [Templates and skins](#simplefooterwidget-templates-and-skins)
- [Example](#simplefooterwidget-configuration-example)
- [Variables descriptions](#simplefooterwidget-variables-description)



SimpleFooterWidget is a bootstrap 4 widget representing a footer.

It is composed of a text, which we can align horizontally using the "text_align" property.

In the footer text, we can use the $year string, which will be replaced by the current year.






SimpleFooterWidget screenshots
----------

![Screenshot blogen_footer.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/SimpleFooterWidget/blogen_footer.png)

![Screenshot glozzom_simple_copyright_footer.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/SimpleFooterWidget/glozzom_simple_copyright_footer.png)

![Screenshot mizuxe_right_aligned_monochrome_footer.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/SimpleFooterWidget/mizuxe_right_aligned_monochrome_footer.png)





SimpleFooterWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: dark-skin.css
- **Presets**: blogen.byml, glozzom.byml, mizuxe.byml


SimpleFooterWidget configuration example
----------------

```yaml
name: simple_footer
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\SimpleFooterWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/SimpleFooterWidget
template: default.php
vars:
    attr:
        class: py-5 bg-primary text-white
        id: main-footer

    text_align: right
    text_class: ""
    text: Copyright &copy; $year
```



SimpleFooterWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class to apply to the widget container.
            - **example**: py-5 bg-primary text-white
- **text_align**
    - **type**: string
    - **default_value**: right
    - **description**: How to align the text of the widget.
    - **example**: right
    - **choices**
        - left
        - center
        - right
- **text_class**
    - **type**: string
    - **default_value**: lead
    - **description**: The css class to apply to the text of the widget.
    - **example**: lead
- **text**
    - **type**: string
    - **default_value**: Copyright &copy; $year
    - **description**: The text of the widget.
    - **example**: Copyright &copy; $year







SlickTestimonialCarouselWidget
==============

[Back to top](#summary)

- [Screenshots](#slicktestimonialcarouselwidget-screenshots)
- [Templates and skins](#slicktestimonialcarouselwidget-templates-and-skins)
- [Example](#slicktestimonialcarouselwidget-configuration-example)
- [Variables descriptions](#slicktestimonialcarouselwidget-variables-description)



SlickTestimonialCarouselWidget is a bootstrap 4 widget representing a carousel of testimonials.


There are two parts:

- the title
- the items

The title remains always visible on top of the testimonials and doesn't slide.

If the title is empty, it will not be displayed.

The items slide below the title.


Each item is composed of a text and an author, both of which accept html strings.



If the text is an empty string, it will not be displayed.
Same for the author.


We can decide to play the carousel automatically or manually, using the "autoplay" and "autoplay_speed" properties.


Behind the scene, the slick js library is used: https://kenwheeler.github.io/slick/.







SlickTestimonialCarouselWidget screenshots
----------

![Screenshot glozzom_slick_testimonial_carousel.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/SlickTestimonialCarouselWidget/glozzom_slick_testimonial_carousel.png)





SlickTestimonialCarouselWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: glozzom.byml


SlickTestimonialCarouselWidget configuration example
----------------

```yaml
name: slick_testimonial_carousel
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\SlickTestimonialCarouselWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/SlickTestimonialCarouselWidget
template: default.php
vars:
    attr:
        id: testimonials
        class: p-4 bg-dark text-white

    title: testimonials
    autoplay: false
    autoplay_speed: 3000
    items:
        -
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, fuga.
            author: "John Doe From <cite title=\"Company 1\">Company 1</cite>"

        -
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, fuga.
            author: "Sam Smith From <cite title=\"Company 2\">Company 2</cite>"

        -
            text: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, fuga.
            author: "Meghan Williams From <cite title=\"Company 3\">Company 3</cite>"


```



SlickTestimonialCarouselWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The title of the carousel.
    - **example**: testimonials
- **autoplay**
    - **type**: bool
    - **default_value**: false
    - **description**: Whether to play the carousel automatically or manually.
- **autoplay_speed**
    - **type**: string
    - **default_value**: 3000
    - **description**: If the carousel plays automatically, the interval in milliseconds between two items.
    - **example**: 3000
- **items**
    - **type**: item_list
    - **default_value**
    - **description**: The array of items.
    - **item_properties**
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the item. If empty, will not be displayed. It accepts html notation.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, fuga.
        - **author**
            - **type**: string
            - **default_value**: 
            - **description**: The author of the item. If empty, will not be displayed. It accepts html notation.
            - **example**: John Doe From <cite title="Company 1">Company 1</cite>







TwoColumnsAccordionWidget
==============

[Back to top](#summary)

- [Screenshots](#twocolumnsaccordionwidget-screenshots)
- [Templates and skins](#twocolumnsaccordionwidget-templates-and-skins)
- [Example](#twocolumnsaccordionwidget-configuration-example)
- [Variables descriptions](#twocolumnsaccordionwidget-variables-description)



TwoColumnsAccordionWidget is a bootstrap 4 widget representing two accordions next to each other.

There is a title at the top, and then two columns, each column containing one accordion.

Each accordion can contain any number of items.

Each item is composed of the following:
- title
- text


By default, when the page loads, every accordion item is closed, but we can have them opened using the is_open property of each item.





TwoColumnsAccordionWidget screenshots
----------

![Screenshot glozzom_two_columns_accordion_faq.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/TwoColumnsAccordionWidget/glozzom_two_columns_accordion_faq.png)





TwoColumnsAccordionWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css
- **Presets**: glozzom.byml


TwoColumnsAccordionWidget configuration example
----------------

```yaml
name: two_columns_accordion
type: picasso
active: true
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\TwoColumnsAccordionWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/TwoColumnsAccordionWidget
template: default.php
vars:
    attr:
        id: faq
        class: p-5 bg-dark text-white

    title: Frequently Asked Question
    one_items:
        -
            title: Question One
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
                esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
                reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
                libero provident quis saepe voluptatum.
            >
            is_open: true

        -
            title: Question Two
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
                esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
                reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
                libero provident quis saepe voluptatum.
            >
            is_open: false

        -
            title: Question Three
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
                esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
                reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
                libero provident quis saepe voluptatum.
            >
            is_open: false


    two_items:
        -
            title: Question Four
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
                esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
                reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
                libero provident quis saepe voluptatum.
            >
            is_open: false

        -
            title: Question Five
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
                esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
                reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
                libero provident quis saepe voluptatum.
            >
            is_open: false

        -
            title: Question Six
            text: <
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
                esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
                reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
                libero provident quis saepe voluptatum.
            >
            is_open: false


```



TwoColumnsAccordionWidget variables description
-----------

- **title**
    - **type**: string
    - **default_value**: 
    - **description**: The top title.
    - **example**: Frequently Asked Question
- **one_items**
    - **type**: item_list
    - **default_value**
    - **description**: The array of items for accordion one (the left accordion).
    - **item_properties**
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the item.
            - **example**: Question One
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the item.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
libero provident quis saepe voluptatum.
        - **is_open**
            - **type**: bool
            - **default_value**: false
            - **description**: Whether to open the item by default (when the page loads).
- **two_items**
    - **type**: item_list
    - **default_value**
    - **description**: The array of items for accordion two (the right accordion).
    - **item_properties**
        - **title**
            - **type**: string
            - **default_value**: 
            - **description**: The title of the item.
            - **example**: Question One
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the item.
            - **example**: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aut deleniti dolor,
esse facilis impedit iste maxime molestias nemo nihil non nostrum numquam odit
reprehenderit tenetur voluptate. Asperiores assumenda aut consequuntur eum hic, labore
libero provident quis saepe voluptatum.
        - **is_open**
            - **type**: bool
            - **default_value**: false
            - **description**: Whether to open the item by default (when the page loads).







ZeroAdminBreadcrumbWidget
==============

[Back to top](#summary)

- [Screenshots](#zeroadminbreadcrumbwidget-screenshots)
- [Templates and skins](#zeroadminbreadcrumbwidget-templates-and-skins)
- [Example](#zeroadminbreadcrumbwidget-configuration-example)
- [Variables descriptions](#zeroadminbreadcrumbwidget-variables-description)



ZeroAdminBreadcrumbWidget is a bootstrap 4 widget representing a breadcrumb in the style of the
zeroadmin theme (https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html).

The widget is composed of two parts
- a left part, with the breadcrumb links
- a right part, with optional extra links


The breadcrumb links structure is the following (from left to right):

- first element (plain text)
- (inner) breadcrumb links
- last element (plain text)

The optional extra links can have an icon.





ZeroAdminBreadcrumbWidget screenshots
----------

![Screenshot zeroadmin-breadcrumb-widget-in-context.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminBreadcrumbWidget/zeroadmin-breadcrumb-widget-in-context.png)

![Screenshot zeroadmin-breadcrumb-widget.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminBreadcrumbWidget/zeroadmin-breadcrumb-widget.png)





ZeroAdminBreadcrumbWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css, default.scss
- **Presets**: 


ZeroAdminBreadcrumbWidget configuration example
----------------

```yaml
name: zeroadmin_breadcrumb
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminBreadcrumbWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminBreadcrumbWidget
template: default.php
vars:
    first_element_text: Home
    breadcrumb_links:
        -
            url: (::ROUTE::)/dashboard
            text: Admin


    last_element_text: Dashboard
    extra_links:
        -
            url: (::ROUTE::)/pages/e-product-edit
            text: Edit Page
            icon: fas fa-edit

        -
            url: (::ROUTE::)/pages/u-profile
            text: Profile
            icon: far fa-address-card

        -
            url: (::ROUTE::)/plugins/plotly
            text: Stats
            icon: fas fa-chart-line


```



ZeroAdminBreadcrumbWidget variables description
-----------

- **first_element_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the first element of the breadcrumb.
    - **example**: Home
- **breadcrumb_links**
    - **type**: item_list
    - **default_value**
    - **description**: The links in the middle of the breadcrumb.
    - **item_properties**
        - **url**
            - **type**: string
            - **default_value**: (mandatory)
            - **description**: The url of the link.
            - **example**: (::ROUTE::)/dashboard
        - **text**
            - **type**: string
            - **default_value**: (mandatory)
            - **description**: The text of the link.
            - **example**: Admin
- **last_element_text**
    - **type**: string
    - **default_value**: 
    - **description**: The text of the last element of the breadcrumb.
    - **example**: Dashboard
- **extra_links**
    - **type**: item_list
    - **default_value**
    - **description**: Some extra plain links.
    - **item_properties**
        - **url**
            - **type**: string
            - **default_value**: (mandatory)
            - **description**: The url of the link.
            - **example**: (::ROUTE::)/pages/e-product-edit
        - **text**
            - **type**: string
            - **default_value**: (mandatory)
            - **description**: The text of the link.
            - **example**: Edit Page
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The icon class. If empty, the icon will not be displayed.
            - **example**: fas fa-edit







ZeroAdminHeaderNewMessagesIconLinkWidget
==============

[Back to top](#summary)

- [Screenshots](#zeroadminheadernewmessagesiconlinkwidget-screenshots)
- [Templates and skins](#zeroadminheadernewmessagesiconlinkwidget-templates-and-skins)
- [Example](#zeroadminheadernewmessagesiconlinkwidget-configuration-example)
- [Variables descriptions](#zeroadminheadernewmessagesiconlinkwidget-variables-description)



ZeroAdminHeaderNewMessagesIconLinkWidget is a bootstrap 4 widget for the ZeroAdminHeaderWidget widget
(https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md#zeroadminheaderwidget).

You can add it to the SUB_zeroadmin_header zone of ZeroAdminHeaderWidget.
It's an icon with badge and a dropdown pops out when you click on the icon.
The links of the dropdown display messages from a sender to a recipient, a date, an avatar, and a text.

There is a header text on top of those links, and a view all link at the bottom.

Each link is actually a message composed of:

- a route
- a date (used to mark the message)
- an avatar image
- a sender
- a recipient
- a text






ZeroAdminHeaderNewMessagesIconLinkWidget screenshots
----------

![Screenshot zeroadmin-header-new-messages.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminHeaderNewMessagesIconLinkWidget/zeroadmin-header-new-messages.png)





ZeroAdminHeaderNewMessagesIconLinkWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: 


ZeroAdminHeaderNewMessagesIconLinkWidget configuration example
----------------

```yaml
name: zeroadmin_header_icon_link_new_messages
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderNewMessagesIconLinkWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderNewMessagesIconLinkWidget
template: default.php
vars:
    icon: fas fa-envelope
    badge: badge badge-pill badge-warning
    header_text_format: You have %s messages
    model: (::METHOD_CALL::)Ling\Light_Kit_Admin\DataExtractor\MessagesDataExtractor->extractNewest(5)
    view_all_link: (::ROUTE::)/pages/m-inbox
    view_all_text: Read All Messages
    view_all_icon: fas fa-envelope
```



ZeroAdminHeaderNewMessagesIconLinkWidget variables description
-----------

- **icon**
    - **type**: string
    - **default_value**: 
    - **description**: The icon of the dropdown link.
    - **example**: fas fa-envelope
- **badge**
    - **type**: string
    - **default_value**: badge badge-pill
    - **description**: The css class to apply to the badge.
    - **example**: badge badge-pill badge-warning
- **header_text_format**
    - **type**: string
    - **default_value**: 
    - **description**: The format of the header text. Using %s as the placeholder for the number of messages.
    - **example**: You have %s messages
- **model**
    - **type**: array
    - **default_value**: none
    - **description**: The array of messages. The example below uses the lazy reference resolver system from Light_Kit.
    - **example**: (::METHOD_CALL::)Ling\Light_Kit_Admin\DataExtractor\MessagesDataExtractor->extractNewest(5)
- **view_all_link**
    - **type**: string
    - **default_value**: 
    - **description**: The url leading to all the messages. If empty, the "view all" link will not be displayed.
The example below uses the lazy reference resolver system from Light_Kit.
    - **example**: (::ROUTE::)/pages/m-inbox
- **view_all_text**
    - **type**: string
    - **default_value**: Read All
    - **description**: The text of the "view all" link.
    - **example**: Read All Messages
- **view_all_icon**
    - **type**: string
    - **default_value**: 
    - **description**: The icon of the "view all" link. If empty, the icon is not displayed.
    - **example**: fas fa-envelope







ZeroAdminHeaderNewNotificationsIconLinkWidget
==============

[Back to top](#summary)

- [Screenshots](#zeroadminheadernewnotificationsiconlinkwidget-screenshots)
- [Templates and skins](#zeroadminheadernewnotificationsiconlinkwidget-templates-and-skins)
- [Example](#zeroadminheadernewnotificationsiconlinkwidget-configuration-example)
- [Variables descriptions](#zeroadminheadernewnotificationsiconlinkwidget-variables-description)



ZeroAdminHeaderNewNotificationsIconLinkWidget is a bootstrap 4 widget for the ZeroAdminHeaderWidget widget
(https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md#zeroadminheaderwidget).

You can add it to the SUB_zeroadmin_header zone of ZeroAdminHeaderWidget.
It's an icon with badge and a dropdown pops out when you click on the icon.

The links of the dropdown display notifications.
There is a header text on top of those notifications, and a view all link at the bottom.

Each notification is composed of:

- a route
- a date (used to mark the message)
- an icon (optional)
- a text





ZeroAdminHeaderNewNotificationsIconLinkWidget screenshots
----------

![Screenshot zeroadmin-header-new-notifications.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminHeaderNewNotificationsIconLinkWidget/zeroadmin-header-new-notifications.png)





ZeroAdminHeaderNewNotificationsIconLinkWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: 


ZeroAdminHeaderNewNotificationsIconLinkWidget configuration example
----------------

```yaml
name: zeroadmin_header_icon_link_new_notifications
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderNewNotificationsIconLinkWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderNewNotificationsIconLinkWidget
template: default.php
vars:
    icon: fas fa-bell
    badge: badge badge-pill badge-danger
    header_text_format: You have %s notifications
    model: (::METHOD_CALL::)Ling\Light_Kit_Admin\DataExtractor\NotificationsDataExtractor->extractNewest(5)
    view_all_link: (::ROUTE::)/pages/u-issue-tracker
    view_all_text: View All notifications
```



ZeroAdminHeaderNewNotificationsIconLinkWidget variables description
-----------

- **icon**
    - **type**: string
    - **default_value**: 
    - **description**: The icon of the dropdown link.
    - **example**: fas fa-bell
- **badge**
    - **type**: string
    - **default_value**: 
    - **description**: The css class to apply to the badge.
    - **example**: badge badge-pill badge-danger
- **header_text_format**
    - **type**: string
    - **default_value**: 
    - **description**: The format of the header text. Using %s as the placeholder for the number of notifications.
    - **example**: You have %s notifications
- **model**
    - **type**: array
    - **default_value**: none
    - **description**: The array of notifications. The example below uses the lazy reference resolver system from Light_Kit.
    - **example**: (::METHOD_CALL::)Ling\Light_Kit_Admin\DataExtractor\NotificationsDataExtractor->extractNewest(5)
- **view_all_link**
    - **type**: string
    - **default_value**: 
    - **description**: The url leading to all the notifications. If empty, the "view all" link will not be displayed.
The example below uses the lazy reference resolver system from Light_Kit.
    - **example**: (::ROUTE::)/pages/u-issue-tracker
- **view_all_text**
    - **type**: string
    - **default_value**: View All notifications
    - **description**: The text of the "view all" link.
    - **example**: View All notifications







ZeroAdminHeaderProfileDropdownLinkWidget
==============

[Back to top](#summary)

- [Screenshots](#zeroadminheaderprofiledropdownlinkwidget-screenshots)
- [Templates and skins](#zeroadminheaderprofiledropdownlinkwidget-templates-and-skins)
- [Example](#zeroadminheaderprofiledropdownlinkwidget-configuration-example)
- [Variables descriptions](#zeroadminheaderprofiledropdownlinkwidget-variables-description)



ZeroAdminHeaderProfileDropdownLinkWidget is a bootstrap 4 widget for the ZeroAdminHeaderWidget widget
(https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md#zeroadminheaderwidget).

You can add it to the SUB_zeroadmin_header zone of ZeroAdminHeaderWidget.
It's an avatar with a dropdown that pops out when you click on the avatar.

The links of the dropdown are capped with a header text.

Each link is composed of:

- an url
- an icon (optional)
- a text
- a badge (optional)





ZeroAdminHeaderProfileDropdownLinkWidget screenshots
----------

![Screenshot zeroadmin-header-profile-dropdown.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminHeaderProfileDropdownLinkWidget/zeroadmin-header-profile-dropdown.png)





ZeroAdminHeaderProfileDropdownLinkWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: 
- **Presets**: 


ZeroAdminHeaderProfileDropdownLinkWidget configuration example
----------------

```yaml
name: zeroadmin_header_icon_link_profile_dropdown
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderProfileDropdownLinkWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderProfileDropdownLinkWidget
template: default.php
vars:
    attr:
        class: mr-3
    img_src: /plugins/Light_Kit_Admin/zeroadmin/img/avatars/photo-3.jpg
    img_alt: the avatar of ${pseudo}
    pseudo: ${pseudo}
    links:
        -
            url: (::ROUTE::)/pages/u-profile
            icon: fas fa-user
            text: Profile

        -
            url: (::ROUTE::)/pages/b-settings
            icon: fas fa-cog
            text: Settings

        -
            url: (::ROUTE::)/pages/m-inbox
            icon: far fa-envelope
            text: Messages
            badge_text: 7
            badge_class: badge-success

        -
            url: (::ROUTE::)/pages/b-faq
            icon: far fa-question-circle
            text: Help

        -
            url: (::ROUTE::)/pages/b-login
            icon: fas fa-sign-out-alt
            text: Logout


```



ZeroAdminHeaderProfileDropdownLinkWidget variables description
-----------

- **img_src**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the image src attribute of the avatar.
    - **example**: /plugins/Light_Kit_Admin/zeroadmin/img/avatars/photo-3.jpg
- **img_alt**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the image alt attribute of the avatar.
The following example uses the dynamic variable system provided by Light_Kit.
    - **example**: the avatar of ${pseudo}
- **pseudo**
    - **type**: string
    - **default_value**: 
    - **description**: The pseudo of the admin user.
The following example uses the dynamic variable system provided by Light_Kit.
    - **example**: ${pseudo}
- **links**
    - **type**: item_list
    - **default_value**
    - **description**: The array of links.
    - **item_properties**
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the link.
The following example uses the lazy reference resolver system provided by Light_Kit.
            - **example**: (::ROUTE::)/pages/u-profile
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The icon of the link. If empty, the icon won't be displayed.
            - **example**: fas fa-user
        - **text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the link.
            - **example**: Profile
        - **badge_text**
            - **type**: string
            - **default_value**: 
            - **description**: The text of the badge (if any).
            - **example**: 7
        - **badge_class**
            - **type**: string
            - **default_value**: 
            - **description**: The css class of the badge (if any).
            - **example**: badge-success







ZeroAdminHeaderWidget
==============

[Back to top](#summary)

- [Screenshots](#zeroadminheaderwidget-screenshots)
- [Templates and skins](#zeroadminheaderwidget-templates-and-skins)
- [Example](#zeroadminheaderwidget-configuration-example)
- [Variables descriptions](#zeroadminheaderwidget-variables-description)



ZeroAdmin header is a bootstrap 4 widget representing the header of an admin website based on the zeroadmin theme (https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html).
The header is composed of various elements:

- the logo (aka brand image)
- the sidebar toggler (optional, the idea being that if your admin has a sidebar, you can toggle the sidebar on/off via this sidebar toggler)
- some plain links (optional)
- a subzone on the right (named SUB_zeroadmin_header) to add extra widgets

In the original zeroadmin theme, the subzone is filled with the following widgets (in this order):

- ZeroAdminHeaderNewMessagesIconLinkWidget
- ZeroAdminHeaderNewNotificationsIconLinkWidget
- ZeroAdminHeaderProfileDropdownLinkWidget






ZeroAdminHeaderWidget screenshots
----------

![Screenshot zeroadmin_header.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminHeaderWidget/zeroadmin_header.png)





ZeroAdminHeaderWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css, default.scss
- **Presets**: 


ZeroAdminHeaderWidget configuration example
----------------

```yaml
name: zeroadmin_header
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminHeaderWidget
template: default.php
vars:
    attr:
        id: main-header

    brand_link: /
    brand_img_src: /plugins/Light_Kit_Admin/zeroadmin/img/zero-admin-logo4.png
    brand_img_alt: ZeroAdmin Logo
    use_sidebar_toggler: true
    sidebar_toggler_id: header-navbar-toggler
    plain_links:
        -
            url: (::ROUTE::)/dashboard
            text: Dashboard
            icon: fas fa-user

        -
            url: (::ROUTE::)/pages/u-contacts
            text: Users
            icon: ""

        -
            url: (::ROUTE::)/pages/b-settings
            text: Settings
            icon: ""


```



ZeroAdminHeaderWidget variables description
-----------

- **brand_link**
    - **type**: string
    - **default_value**: /
    - **description**: The url of the brand logo.
    - **example**: /
- **brand_img_src**
    - **type**: string
    - **default_value**: 
    - **description**: The value of the src attribute of the brand logo image.
    - **example**: /plugins/Light_Kit_Admin/zeroadmin/img/zero-admin-logo4.png
- **brand_img_alt**
    - **type**: string
    - **default_value**: Logo
    - **description**: The value of the alt attribute of the brand logo image.
    - **example**: ZeroAdmin Logo
- **use_sidebar_toggler**
    - **type**: bool
    - **default_value**: true
    - **description**: Whether to show the sidebar toggler.
- **sidebar_toggler_id**
    - **type**: string
    - **default_value**: header-navbar-toggler
    - **description**: The css id of the navbar toggler, used to toggle a visually external sidebar.
    - **example**: header-navbar-toggler
- **plain_links**
    - **type**: item_list
    - **default_value**
    - **description**: A list of plain links to add to the header.
    - **item_properties**
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the link.
            - **example**: /dashboard
        - **text**
            - **type**: string
            - **default_value**: Dashboard
            - **description**: The text of the link
            - **example**: Dashboard
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The icon of the link, or an empty string if the link doesn't use an icon.
            - **example**: fas fa-user







ZeroAdminSidebarWidget
==============

[Back to top](#summary)

- [Screenshots](#zeroadminsidebarwidget-screenshots)
- [Templates and skins](#zeroadminsidebarwidget-templates-and-skins)
- [Example](#zeroadminsidebarwidget-configuration-example)
- [Variables descriptions](#zeroadminsidebarwidget-variables-description)



ZeroAdminSidebarWidget is a bootstrap 4 widget representing the sidebar of an admin website based
on the zeroadmin theme (https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html).

We can configure it to be toggled by an external toggler by setting the following:
- attr.id: the css id of this widget's container element
- sidebar_toggler_id: the css id of the sidebar toggler element (which can be whatever we want)

The sidebar is composed of links, each of which having:

- icon (optional)
- text
- url (optional, since parents don't have urls)
- children (optional)
- active/not active state (for leaves only)
- opened/not opened state (for parents only)
- badge (optional)





ZeroAdminSidebarWidget screenshots
----------

![Screenshot zeroadmin-sidebar-widget-in-context.gif](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminSidebarWidget/zeroadmin-sidebar-widget-in-context.gif)

![Screenshot zeroadmin-sidebar-widget.png](https://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots/ZeroAdminSidebarWidget/zeroadmin-sidebar-widget.png)





ZeroAdminSidebarWidget templates, skins, presets
-----------
- **Templates**: default.php
- **Skins**: default.css, default.scss
- **Presets**: 


ZeroAdminSidebarWidget configuration example
----------------

```yaml
name: zeroadmin_sidebar
type: picasso
className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminSidebarWidget
widgetDir: templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso/ZeroAdminSidebarWidget
template: default.php
vars:
    attr:
        id: body-sidebar

    sidebar_toggler_id: header-navbar-toggler
    links:
        -
            is_active: true
            icon: fas fa-bars
            text: Dashboard
            url: (::ROUTE::)/dashboard
            children: []

        -
            icon: fas fa-pencil-alt
            text: Typography
            url: (::ROUTE::)/typography

        -
            icon: fas fa-table
            text: Tables
            url: (::ROUTE::)/tables
            badge_text: HOT
            badge_class: bg-danger text-white

        -
            icon: fas fa-bong
            text: Widgets
            url: (::ROUTE::)/widgets

        -
            icon: fas fa-shapes
            text: Components
            children:
                -
                    url: (::ROUTE::)/components/alerts
                    text: Alerts

                -
                    url: (::ROUTE::)/components/badges
                    text: Badge

                -
                    url: (::ROUTE::)/components/breadcrumb
                    text: Breadcrumb

                -
                    url: (::ROUTE::)/components/buttons
                    text: Buttons

                -
                    url: (::ROUTE::)/components/button-group
                    text: Button group

                -
                    url: (::ROUTE::)/components/cards
                    text: Card

                -
                    url: (::ROUTE::)/components/carousel
                    text: Carousel

                -
                    url: (::ROUTE::)/components/collapse
                    text: Collapse

                -
                    url: (::ROUTE::)/components/dropdowns
                    text: Dropdowns

                -
                    url: (::ROUTE::)/components/forms
                    text: Forms

                -
                    url: (::ROUTE::)/components/input-group
                    text: Input group

                -
                    url: (::ROUTE::)/components/jumbotron
                    text: Jumbotron

                -
                    url: (::ROUTE::)/components/list-group
                    text: List group

                -
                    url: (::ROUTE::)/components/navs
                    text: Navs

                -
                    url: (::ROUTE::)/components/modal
                    text: Modal

                -
                    url: (::ROUTE::)/components/navbar
                    text: Navbar

                -
                    url: (::ROUTE::)/components/pagination
                    text: Pagination

                -
                    url: (::ROUTE::)/components/popovers
                    text: Popovers

                -
                    url: (::ROUTE::)/components/progress
                    text: Progress

                -
                    url: (::ROUTE::)/components/scrollspy
                    text: Scrollspy

                -
                    url: (::ROUTE::)/components/spinners
                    text: Spinners

                -
                    url: (::ROUTE::)/components/toasts
                    text: Toasts

                -
                    url: (::ROUTE::)/components/tooltips
                    text: Tooltips



        -
            icon: fas fa-puzzle-piece
            text: Plugins
            children:
                -
                    url: (::ROUTE::)/plugins/animate
                    text: Animate

                -
                    url: (::ROUTE::)/plugins/aos
                    text: Aos

                -
                    url: (::ROUTE::)/plugins/bootstrap-duallistbox
                    text: Bootstrap Dual Listbox

                -
                    url: (::ROUTE::)/plugins/bootstrap-social
                    text: Bootstrap Social

                -
                    url: (::ROUTE::)/plugins/bootstrap-responsive-tabs
                    text: Bootstrap Responsive Tabs

                -
                    url: (::ROUTE::)/plugins/bootstrap-touchspin
                    text: Bootstrap Touchspin

                -
                    url: (::ROUTE::)/plugins/bootstrap-tour
                    text: Bootstrap Tour

                -
                    url: (::ROUTE::)/plugins/cleave
                    text: Cleave

                -
                    url: (::ROUTE::)/plugins/clockpicker
                    text: Clockpicker

                -
                    url: (::ROUTE::)/plugins/cropper
                    text: Cropper

                -
                    url: (::ROUTE::)/plugins/datatables
                    text: Datatables

                -
                    url: (::ROUTE::)/plugins/dropzone
                    text: Dropzone

                -
                    url: (::ROUTE::)/plugins/full-calendar
                    text: Full Calendar

                -
                    url: (::ROUTE::)/plugins/googlemap
                    text: Google Map

                -
                    url: (::ROUTE::)/plugins/ion-range-slider
                    text: Ion Range Slider

                -
                    url: (::ROUTE::)/plugins/jquery-countdown
                    text: Jquery Countdown

                -
                    url: (::ROUTE::)/plugins/jquery-ui-sortable
                    text: Jquery UI Sortable

                -
                    url: (::ROUTE::)/plugins/jscookie
                    text: JsCookie

                -
                    url: (::ROUTE::)/plugins/jstree
                    text: Js Tree

                -
                    url: (::ROUTE::)/plugins/knob
                    text: Knob

                -
                    url: (::ROUTE::)/plugins/ladda
                    text: Ladda

                -
                    url: (::ROUTE::)/plugins/lightbox-ekko
                    text: Lightbox Ekko

                -
                    url: (::ROUTE::)/plugins/lightpick
                    text: Lightpick

                -
                    url: (::ROUTE::)/plugins/magnify
                    text: Magnify

                -
                    url: (::ROUTE::)/plugins/nestable2
                    text: Nestable 2

                -
                    url: (::ROUTE::)/plugins/owl-carousel
                    text: Owl Carousel

                -
                    url: (::ROUTE::)/plugins/plotly
                    text: Plotly

                -
                    url: (::ROUTE::)/plugins/pretty-checkbox
                    text: Pretty Checkbox

                -
                    url: (::ROUTE::)/plugins/prism
                    text: Prism

                -
                    url: (::ROUTE::)/plugins/select2
                    text: Select2

                -
                    url: (::ROUTE::)/plugins/slick
                    text: Slick

                -
                    url: (::ROUTE::)/plugins/spectrum
                    text: Spectrum

                -
                    url: (::ROUTE::)/plugins/spinkit
                    text: Spin Kit

                -
                    url: (::ROUTE::)/plugins/starrr
                    text: Starrr

                -
                    url: (::ROUTE::)/plugins/summernote
                    text: Summernote

                -
                    url: (::ROUTE::)/plugins/switchery
                    text: Switchery



        -
            icon: fas fa-copy
            text: Pages
            children:
                -
                    icon: fas fa-bullseye
                    text: Basic
                    children:
                        -
                            url: (::ROUTE::)/pages/b-404
                            text: Error 404

                        -
                            url: (::ROUTE::)/pages/b-faq
                            text: Faq

                        -
                            url: (::ROUTE::)/pages/b-forgot-password
                            text: Forgot password

                        -
                            url: (::ROUTE::)/pages/b-landpage
                            text: Landpage

                        -
                            url: (::ROUTE::)/pages/b-login
                            text: Login

                        -
                            url: (::ROUTE::)/pages/b-register
                            text: Register

                        -
                            url: (::ROUTE::)/pages/b-settings
                            text: Settings



                -
                    icon: fas fa-shopping-cart
                    text: E-commerce
                    children:
                        -
                            url: (::ROUTE::)/pages/e-admin-products-list
                            text: Admin products

                        -
                            url: (::ROUTE::)/pages/e-cart
                            text: Cart

                        -
                            url: (::ROUTE::)/pages/e-invoice
                            text: Invoice

                        -
                            url: (::ROUTE::)/pages/e-product
                            text: Product

                        -
                            url: (::ROUTE::)/pages/e-products-list
                            text: Products list

                        -
                            url: (::ROUTE::)/pages/e-product-edit
                            text: Product edit



                -
                    icon: far fa-comments
                    text: Messaging
                    children:
                        -
                            url: (::ROUTE::)/pages/m-chat
                            text: Chat

                        -
                            url: (::ROUTE::)/pages/m-compose
                            text: Compose

                        -
                            url: (::ROUTE::)/pages/m-email-templates
                            text: Email templates

                        -
                            url: (::ROUTE::)/pages/m-forum
                            text: Forum

                        -
                            url: (::ROUTE::)/pages/m-inbox
                            text: Inbox

                        -
                            url: (::ROUTE::)/pages/m-message
                            text: Message



                -
                    icon: fas fa-user
                    text: Management
                    children:
                        -
                            url: (::ROUTE::)/pages/u-contacts
                            text: Contacts

                        -
                            url: (::ROUTE::)/pages/u-filemanager
                            text: File manager

                        -
                            url: (::ROUTE::)/pages/u-issue-tracker
                            text: Issue tracker

                        -
                            url: (::ROUTE::)/pages/u-profile
                            text: Profile

                        -
                            url: (::ROUTE::)/pages/u-project-detail
                            text: Project details

                        -
                            url: (::ROUTE::)/pages/u-project-list
                            text: Project list

                        -
                            url: (::ROUTE::)/pages/u-teams
                            text: Teams

                        -
                            url: (::ROUTE::)/pages/u-timeline
                            text: Timeline

                        -
                            url: (::ROUTE::)/pages/u-vote-list
                            text: Vote list



                -
                    icon: fas fa-hat-wizard
                    text: Website Builder
                    children:
                        -
                            url: (::ROUTE::)/pages/w-page-configure
                            text: Page configure

                        -
                            url: (::ROUTE::)/pages/w-page-edit
                            text: Page edit





        -
            icon: fas fa-fire-alt
            text: Snippets
            children:
                -
                    url: (::ROUTE::)/snippets/right-sidebar
                    text: Right Sidebar

                -
                    url: (::ROUTE::)/snippets/sidebar
                    text: Sidebar




```



ZeroAdminSidebarWidget variables description
-----------

- **attr**
    - **type**: array
    - **default_value**
    - **description**: The attributes to add to the widget's container tag.
    - **properties**
        - **id**
            - **type**: string
            - **default_value**: body-sidebar
            - **description**: The css id to apply to the sidebar element.
            - **example**: body-sidebar
- **sidebar_toggler_id**
    - **type**: string
    - **default_value**: header-navbar-toggler
    - **description**: The css id applied to the (external) element toggling the sidebar (on click).
    - **example**: header-navbar-toggler
- **links**
    - **type**: item_list
    - **default_value**
    - **description**: The array of links of the sidebar.
    - **item_properties**
        - **is_active**
            - **type**: bool
            - **default_value**: false
            - **description**: Whether the leave node is active.
        - **is_opened**
            - **type**: bool
            - **default_value**: false
            - **description**: Whether the parent node is opened.
        - **icon**
            - **type**: string
            - **default_value**: 
            - **description**: The css class for the icon.
            - **example**: fas fa-bars
        - **text**
            - **type**: string
            - **default_value**: (mandatory)
            - **description**: The text of the link.
            - **example**: Dashboard
        - **url**
            - **type**: string
            - **default_value**: 
            - **description**: The url of the link (for leave nodes only).
            - **example**: (::ROUTE::)/dashboard
        - **children**
            - **type**: string
            - **default_value**
            - **description**: The array of children links (recursive array).













