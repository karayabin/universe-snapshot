The widget variables description 
==================
2019-05-01



This is an array describing the variables used by a widget (the vars property of the [Picasso widget configuration array](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-widget-array)).

Example
---------

This is the configuration of the MainNavWidget (my first kit widget) as of 2019-05-01:


```yaml


name: MainNavWidget
description: <
    The MainNavWidget is a bootstrap 4 widget representing the top navigation on a website.
    You can configure the title of the nav with or without a logo, and you can create two separate
    sets of links, with various options for each link, such as adding an icon, or a dropdown menu.
>
vars:

    title:
        type: string
        default_value: null
        description: The title of the nav widget. It's usually the name of the company or website.


    title_logo:
        type: array
        default_value: null
        description: Adds a logo to the title.
        properties:
            url:
                type: string
                default_value: null
                description: The url of the logo image (the value to put into the src attribute of the img tag).
            width:
                type: string
                default_value: 50
                description: The width of the logo image.
            height:
                type: string
                default_value: 50
                description: The height of the logo image.
            alt:
                type: string
                default_value: null
                description: The value of the alt attribute of the logo img tag.


    fixed_top:
        type: bool
        default_value: true
        description: Whether the nav is fixed on the top, or scrolls along with the content.

    title_url:
        type: string
        default_value: /
        description: The string to put in the href attribute of the title link. It can be an anchor if necessary (starting with a hash symbol).


    expand_size:
        type: string
        default_value: sm
        description: Defines at which size does the burger menu expand.
        choices:
            - sm
            - md
            - lg


    links:
        type: item_list
        default_value: []
        description: An array of link items to display in the nav.
        item_properties:
            text:
                type: string
                default_value: null
                description: The text of the link item.
            url:
                type: string
                default_value: null
                description: The url of the link item (anchors are accepted).
            icon:
                type: string
                default_value: null
                description: The css class for the icon.
                example: fas fa-user

    links_align_right:
        type: bool
        default_value: false
        description: Whether to align the links to the right.
        
    links2: 
        alias_of: links
    links2_align_right: 
        alias_of: links_align_right
```


Abstract description
------------------


```yaml
name: TheWidgetName
description: A quick summary of what the widget is and does.
vars:  # an array containing all the vars variables available to the widget

    variable_one:
        # The expected type of value, possible values are:
        # - string (includes numbers)
        # - bool
        # - item_list, a list of items with the same structure
        # - array, an array
    
        type: string
    
        
        # The default value to use for this variable item
        default_value: null
    
    
        # Describes how this value will be used in the widget.
        # Regular punctuation for a sentence should apply (starting with an uppercase letter, and ending the sentence with the dot).
        description: The title of the nav widget. It's usually the name of the company or website.
    
        # An array of choices for the values. This is optional, and applies only to variables
        # which values are a finite set of values, like the example below representing bootstrap sizes.
        choices:
            - sm
            - md
            - lg
    
        # When the type is item_list, it means that the value is a list of items, each of which being
        # an array with the same structure. The item_properties directive contains the variable description
        # for all keys of that item array. In the example below, the item is an array with two keys: text and url.
        item_properties:
            text:
                type: string
                default_value: null
                description: The text of the link item.
            url:
                type: string
                default_value: null
                description: The url of the link item (anchors are accepted).
    
        # When the type is array, and if the array is associative, then the properties directive contains the variable description
        # for all keys of that array. Example:
        properties:
            url:
                type: string
                default_value: null
                description: The url of the logo image (the value to put into the src attribute of the img tag).
            width:
                type: string
                default_value: 50
                description: The width of the logo image.
            height:
                type: string
                default_value: 50
                description: The height of the logo image.
            alt:
                type: string
                default_value: null
                description: The value of the alt attribute of the logo img tag.
    
    
        # An example value. This is optional.
        example: an example value
        
        # Use this to reference an already written property 
        # If you use the alias_of directive, then you don't need any other directive (but you can if you want to override certain parts of the alias).
        alias_of: string, the name of the referenced property
        
    variable_two: ...same as variable_one...        
```    

example: a real life configuration example in babyYaml format. It's optional, but recommended.