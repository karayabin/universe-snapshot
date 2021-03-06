Open admin table one
==============
2019-10-10 -> 2021-03-25


**Open admin table one** (oat1) is a renderer implementation guideline for the [open-admin-table protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/open-admin-table-protocol.md).




We use the [AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler) plugin under the hood.


For the ajax handler parameters to request a realist (this might be used by other plugins):
- The handlerId is: Light_Realist
- The actionId is: realist-request 


For CSRF protection, we use a token named "realist-request", which value is carried by the csrf_token
property (in $_POST). 




This "tool" is a helper for the renderer side of the protocol.

It helps the renderer to send the request, and refresh the gui on the server's response.


In this implementation, the renderer features are compartmented in so-called modules.

The following modules are recognized and handled by this tool:

- debug window 
- global search (aka general search)
- advanced search
- number of rows info
- head columns sort
- neck filters
- number of items per page
- pagination





An ajax list
------------
2020-08-27


The approach taken by this tool is entirely dynamic: when you load the page, the js client will fetch the html rows
from the ajax server and place them into the static list skeleton.
Then each user interaction with the list also triggers an ajax server call followed by a gui update.

In other words, you don't have to render the list rows statically, it's all done via ajax.

Note: you need to display a list skeleton though, which markup is described in this document.




OpenAdminTable helper, default behaviour
-----------------
2020-08-27


This tool will have a default behaviour that you can change (to a certain extent) with the configuration
parameters, which you define when instantiating this tool.

The default behaviour and how you can alter it is explained below.
This tool will try to automatically inject listeners for you.

First, you need to enclose everything inside a container element (i.e. a div for instance),
to help this tool recognize your elements.



Multiple elements (aka modules) are recognized:

- the debug window widget (composed of a single container).
- the number of rows info widget (composed of a single container).
- the global search widget (composed of an input and a potentially a button).
- the advanced search widget (composed of a form and a submit button)
- the head columns sort (composed of clickable icons or elements)
- the neck filters (composed of various html control elements and buttons, depending on the data type)
- the number of items per page (composed of single select element)
- the pagination (composed of clickable elements)
- the checkbox (composed of a checkbox per row)



The default interaction between them and the (php) backend service is the following:

- The debug window widget: php injects the sql query and markers into the debug window in case of a successful response,
            and the error message in case of an erroneous response.
            
- The number of rows info widget: php injects the number of rows info in the widget.

- The global search:
     When the user clicks the search button, we reinitialize all other widgets, including
     the pagination, the head columns sort and the neck filters, and the advanced search widget.
     Which widgets get re-initialized can be change with the options (see the options section below)

- The advanced search:
     Same as global search, except that this time the button is mandatory
     
     
- The head columns sort:
     When the user clicks a sort toggling element, the request is left unchanged except for the sort.
     In other words, we re-use all the other widgets, and we left them as they are.
     
- The neck filters:
     By default, we don't use submit buttons for neck filters, because of the limited space that we have (however, this is an option).
     Also we expect different types of controls, depending on their data-type (see more about data types in 
     https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/open-admin-table-protocol.md document):
      
     - input type=text: for int, string  
     - input type=date: for date and datetime
     - select: for enum
     - ... (some other types might be added)
     
     We also have additional clear buttons, one per neck filter, and a global clear all neck filter buttons, 
     to quickly cancel the effect of a neck filter in particular, or all of them at once.
     
     When the user interacts with a control (and/or a clear button), we keep the parameters of the global search and/or
     advanced search, and we reset the other widgets (sort and pagination).
     
     We use the generic_sub_filter defined in the open admin table protocol.
     In other words, the default behaviour of neck filters is that they can act as complementary searching tools for
     a global/advanced search.
     
- the number of items per page:       
      When the user selects a value, the request is left unchanged except for the pagination's page_length part.
      This widget is bound to the pagination widget, in that their data feed the same tag (the limit tag).
      
- the pagination:       
      When the user clicks a pagination link, the request is left unchanged except for the pagination.
      In other words, we re-use all the other widgets, and we left them as they are.
      
      
Expected markup
-------------
2020-08-27


In order to help this tool doing its job, we need to implement the following html markup in our html code.

First, wrap each "module" with a css class:

The css classes are:

- oath-debug-window 
- oath-number-of-rows-info
- oath-global-search (for the global search widget)
- oath-advanced-search
- oath-head-columns-sort
- oath-neck-filters
- oath-pagination
- oath-number-of-items-per-page

Then, for each module, implement the markup that you use.
If not preceded by a question mark, the markup is mandatory.




- checkbox:
    - .oath-row-select-checkbox add this class to the checkboxes. It's not necessary to wrap this module, as for now it's just a courtesy for the renderers,
        so that they can toggle all checkboxes at once, using a master checkbox of their own.
        
     
- number of rows:
    - .nbri-total: add this class to the span or element which will receive the total number of rows.
    - .nbri-current-first: add this class to the span or element which will receive the current page's first element offset.
    - .nbri-current-last: add this class to the span or element which will receive the current page's last element offset.

- global search:
    - input: the input tag holding the search value. There should be only one input inside the global search container. 
    - ?.oath-search-btn: add this class to the "Search" button if you use one.
    - ?.oath-reset-btn: add this class to the "Reset" button if you use one.
    
- advanced search:
    - .oath-search-btn: add this class to the "Search" button.
    - ?.oath-reset-btn: add this class to the "Reset" button.
    - .input-operator-value: we mark all the input that can be reset with this class.
            The reset operation of the advanced search form is executed just before the global search form is posted. 
    - ?.oath-add-btn: add this class to the "Add New Line" button.
    - ?.oath-remove-btn: add this class to the "Remove Line" button.
            It's also recommended that you add a hiding class (i.e. d-none for instance in bootstrap) on that element,
            so that only dynamically added lines show that button (that's the internal behaviour of the
            helper to call the jquery show method on this element for new lines).
            If you do so, register the hiding class with the data-hide-class attribute (see below for more details).            
    - ?.data-hide-class: add this attribute to specify the css class that you used to hide the remove button.
    - ?.oath-andor-keyword: add this class to the html element that holds the OR keyword to inject in a row created
                with the oath-add-btn action trigger.
            
    
- head columns sort:

    The head columns must be wrapped in a thead tag (so that it's easier to isolate the rows containing data). 

    - .oath-sort-trigger: add this class to every triggering element.
        Now we will use the [realist-tag-transfer js helper](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/realist-tag-transfer-js-implementation-notes.md)
        under the hood to collect the values, but for the columns head sort, we need to help him a bit by
        updating its values.
        
        First, we will introduce the concept of three states sorting, the three states being:
        - neutral
        - asc
        - desc
        
        Each state will be represented with a different icon.
        
        And so inside of this triggering element (.oath-sort-trigger), we expect to have:
        
        - the realist-tag-transfer markup for this column, which is composed of two hidden spans (for instance):
            - span class=d-none data-rtt-variable=column data-rtt-value=$colName
            - span class=d-none data-rtt-variable=direction data-rtt-value=neutral (aka direction span)
            
            The d-none is a bootstrap class utility meaning: display:none.
            The $colName is replaced by the real column name by the static (php) renderer.
            
            The direction written in the direction span is used by this tool as the default sort for this column,
            and so you should be careful what value you put in here (neutral, asc or desc), as this will will be the 
            value sent (to the server) for the first request.
            
            This direction value will be updated dynamically by this tool when the user clicks on the trigger.
            
        - the icon markup.
            We provide a little helper to show the right icon depending on the status of the column sort.
            In order to use our helper, you need to write your three icons, and they should have the following css class:
            
            - oath-icon
            
            Then, you need to specify which css class will be used to hide an icon, the default being "d-none" (which 
            is the bootstrap4 way of saying: display: none). This is done via the options of this tool.
            
            And also you need to add this hiding class to the two icons you want to hide.
            
            Last but not least, you need to assign the state the icon is related to, using the data-state attribute,
            with the value of the corresponding state.
            
            Note: you can also define the order in which the state rotate in the configuration.

            
        
        
    
- neck filters:
    Each individual filter should be wrapped in a container class.
    
    - .oath-filter-container: add this class to every neck filter container
        - .oath-control: add this class to every native html control element
        - .oath-clear-btn: add this class to every clear button that applies to a specific neck filter
    - ?.oath-clear-all-btn: add this class to the clear all button if you use one
     
- number of items per page: 

    - .oath-nipp-selector: add this class to the select holding the values.
        Note: the all value is a convention used to mean: show all the pages (i.e. no pagination),
        and it should be treated as such on the server side.
        
    - the data-rtt-extra-tag_group=pagination attribute should be set        
    - the data-rtt-tag=limit attribute should be set (see the [realist tag transfer protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/realist-tag-transfer-protocol.md) for more information)        
    - the data-rtt-variable=page_length attribute should be set        
        
      

- pagination: see the "pagination markup" section for more details



        
- table:
    the data rows must be enclosed in a tbody tag (so that it's easier to distinguish between the head and 
    the rows of the table).
        
    
    


Javascript main implementation idea
-----------
2019-10-10 -> 2021-03-25

In my previous try (open-admin-table-helper-implementation-notes-2019-08-19.md), 
I used the combine_request_with and primary_groups properties.

But now that we use a gui driven approach (with the implementation of new tags or, and, open_parenthesis and close_parenthesis),
we have to provide the AND tag between the global_search/advanced_search and the neck_filters ourselves.

At this point, this means that these "logical" tags (i.e. and, or, open_parenthesis and close_parenthesis) we send to the server are in a logical order, so that the server can just parse the stream of tags
in order to get the logical expression to resolve.


That would just have been a matter of adding a small hardcoded exception snippet in the existing code, but I feared that this addition would
make the whole js helper too complicated to understand for a developer in general (like me in 6 months for instance).

So I will simply re-implement the tool with a new idea which is the described below.

So there are 5 main widgets/modules gravitating around the main list:

- global_search
- advanced_search
- head_columns_sort
- neck_filters
- pagination (composed of the page number, and optionally including number_of_items_per_page)


Each module can be activated, which means the user clicks on it or interacts with it.
Note: page stands for page number.



Now the following rules apply (and cannot be changed like the previous version).
There are a lot of them, but they are very intuitive when you think about it, so it shouldn't be hard
to understand them:


- a main search module is one of: **global_search**, **advanced_search**
- a filtering module is one of: **global_search**, **advanced_search**, **neck_filters**
- **global_search** and **advanced_search** modules cannot be used at the same time (it's either one or the other)
- when **global_search** is activated **advanced_search** is emptied
- when **advanced_search** is activated the **global_search** is emptied
- **neck_filters** can be combined with either **global_search** or **advanced_search**
- When **neck_filters** is combined with a main search module, it's appended to the main search module with the "AND" keyword, such as in:
        - main_search_module AND neck_filters
- When a main search module is activated, the page and sort are reset (i.e. page=1, no sort)
- The **current search** refers to the last main search module used (or **global_search** by default if no module was used before), and optionally the **neck_filters** if activated
- When the **page** is activated, it re-sends the tags of the **current_search**, the **head_columns_sort** and the **number_of_items_per_page** (if defined)
- When the **number_of_items_per_page** is activated, it re-sends the tags of the **current_search**, the **head_columns_sort**, and the **page**.
        Note that the server might fix the page number, as the requested page number might not exist anymore (if the number of pages has been
        reduced due to the increase of the number of items per page for instance).
- When the **neck_filters** module is activated alone (without a main search module), it re-sends the tags of the **head_columns_sort** and the **number_of_items_per_page** (if defined). The **page** is reset to 1.
- When the **head_columns_sort** is activated, it re-sends the tags of the **current search**, and the **number_of_items_per_page** (if defined). The **page** is reset to 1.
 


So, a lot of rules, but at least it's a much simpler system to understand than the previous one.











Personal notes:
--------------------
2020-08-27


Here is a reminder on how I now see things (which might help the reader diving more into the code details):

We have 5 main widgets gravitating around the main list:

- global_search
- advanced_search
- head_columns_sort
- neck_filters
- pagination (optionally including number_of_items_per_page)


I assume that you already understand the combine_with_request technique, which I found quite flexible.
If not, please the source code or doc again until you get it, it's the first step to better understand
what's following.

But now for more tricks.
The first trick is to think of them as two separated groups:

- those sending their data as an atomic block (aka atomic widgets): global_search, advanced_search and pagination
- those sending partial data (aka partial widgets): head_columns_sort, neck_filters


Then the implementation trick that I use is quite simple:
I start by adding a neutral state to the columns sort, so that they have three states:
- asc 
- desc 
- neutral

So now, head_columns_sort and neck_filters can be treated the same way:
when the user clicks on a head_columns_sort trigger, we just change that trigger, and set it to its
next state (i.e. asc if it was neutral, desc if it was asc, neutral if it was desc).
We don't change anything else.

Same for the neck_filters: when the user types something in the pseudo field, the values of the other fields
don't change. If she clicks the clear button, we clear the value.

But everything is just done by the dom so far.

Thanks to this implementation, now we can simply collect all the data, just dropping blank values, which are:
- columns with neutral state for head_columns_sort
- the controls with empty value for neck_filters



Because of those tricks, the data-rtt-active attribute becomes obsolete.



A quick recap on the interaction between rtt and open-admin-table protocol js implementations as far as 
sending the request:
- first both markups are set into the page
- then the on relevant user interaction the open admin table helper (oath) makes a pre-update of the gui
    when necessary (for col sort, it toggles the neutral/asc/desc state to the next state,
    and for neck filters clearing, it empties the corresponding values).
    In other words, oath cleans the dom for the rtt to pick up the right values.
- now that the dom is clean, the rtt collects the values
- the oath uses those values to send and handle the request

In other words, rtt is just a sub-tool that we use to collect the rtt tags/values on any page.
Remember, rtt was meant to be used for ANY list, including front-end lists, etc..., so it's very 
abstract and loose. Oath does most of the job in those admin lists.     





Pagination markup
--------------
2020-08-27


There are different styles of pagination.

The ones I have implemented so far are:

- single-band


What's a single band pagination?
Let's first define the elements that constitute a pagination system:

- first page link
- previous page link
- numbered page links
- next page link
- last page link

Now the different styles of pagination often come from how the numbered page links are sliced.
In the single band pagination style, the numbered page links section is just one contiguous element with a maxWidth 
property.
For instance if maxWidth = 5, the pagination could look like this:

- first - previous - 12 - 13 - 14 - 15 - 16 - next - last 
- first - previous - 12 - 13 - 14 - disabled:next - disabled:last  (if nbPage=14)

 
Now for the markup.
We will redraw the dynamic pagination numbers after every change.
Here is how it works:

This module is divided in two parts:
- one containing the realist tag transfer (rtt) markup for the page
- the markup to help this tool redraw/update the pagination on every request change

The rtt markup is pretty straightforward, it's a hidden span with:
- class="rtt-emitter" 
- data-rtt-tag="limit"    
- data-rtt-extra-tag_group="pagination"    
- data-rtt-variable="page"    
- data-rtt-value="1"


The rtt value is set to whatever default page you want to start with, usually 1.
Note: this is the part that is sent to the server, the next part below is just for the gui.
    

What follows describe the markup to help this tool updating/redrawing the pagination widget
on every request change.
Your pagination module/container contains what's called pagination items.

All pagination items point to a specific page number.

There are two types of pagination items:
-  a regular pagination item, which has a numeric label (i.e. 1, 2, 3, ...)
-  a special pagination item, which label is not numeric and usually one of: First, Previous, Next, Last.

On every gui refresh, the regular pagination items are re-drawn completely.
For the special pagination items, we redraw only one html attribute (the data-page-number).

All your regular pagination items must have the same html structure (although we recommend just drawing one)
All your special pagination items should have the same html structure.

The structure of a regular pagination item can differ from the one of a special pagination item.

The html structure of a pagination item is up to you, but you must respect the following constraints.

A pagination item needs to hold the following types of information:

- the page number
- the active/disabled status
- if it's a special pagination item, the type between: first, prev, next and last.


For the skeleton, create all the special pagination items that you need, and create one regular pagination item (this will be the model
for dynamically generated regular pagination items). 


For each pagination item:

- add the "oath-pagination-item" css class to the (pagination item) container


For your regular pagination item:
- add the "oath-pagination-item-model" css class to outer html element.
- add the "oath-number-holder" css class to the inner element which holds the html pagination number.
            Note: its html content will be replaced.
            Note2: if this element is the pagination item container element itself, you don't need to add this class (this is the default).
- add the "oath-status-holder" css class to the inner html element holding the status information.
    Note: the ".active" css class will be added/removed to that element dynamically.
    Note2: you can change the ".active" css class to whatever you want using the **pagination.active_class** option.
    Note3: if the pagination item is the holder itself, you don't need to add this class (this is the default). 


For your special pagination items:
- add the data-type attribute on the relevant container elements, and with the following values:
    - first            
    - prev            
    - next            
    - last

- add the "oath-status-holder" css class to the inner html element holding the status information.
        Note: the ".disabled" css class will be added/removed to that element dynamically.
        Note2: you can change the ".disabled" css class to whatever you want using the **pagination.disabled_class** option.
        Note3: if the pagination item is the holder itself, you don't need to add this class (this is the default). 
        
         

Ric implementation
----------------
2020-08-27


By default, we implement ric by using the [ric admin table helper](https://github.com/lingtalfi/JRicAdminTableHelper) js tool.
See the documentation of this tool for more details.

Because this tool is so useful, we've included it as a dependency of the **Light_Realist** planet, so that when you import **Light_Realist**
you also get the ric admin table helper in your application.






The toolbar widget
---------------
2020-08-27

For the toolbar widget, we use the implementation suggestions from the 
[list action handler conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/list-action-handler-conception-notes.md).











