Morphic layer
===================
2018-01-15



The morphic layer is an abstract js layer that provides behaviour to the GuiAdminTable's table.
It needs to be implemented for your needs.

Basically, here I just describe the abstract ideas that I have on that subject.



- js api
- js listening system






The js api
-------------


The js api basically updates the view (table and widgets) by fetching the html code
directly from the server (using ajax) and replacing/pasting it in the current view.




- + filter ( filters )
        with: filters being an array of key => value
- + order ( orderFields )
        with: orderFields being an array of key => value
- + getSelectedRows ( )
- + refresh ( )
- - getCurrentRow ( )


Js listening system
---------------------

Jquery delegating system.
The css class to trigger a morphic event should be: morphic


We recommend the following css class markup:
(all elements below also have the morphic class)

- morphic-container: the element containing all the markup for a table and its widgets
----- morphic-action: on list action items.
            Each item also should have the following attribute:
            - data-name: string, the name of the action to execute
            // related to confirm
            - ?data-confirm: string, the text of the confirmation.
                            If set, the action requires a confirmation.
                            If not, it does not require a confirmation.
            - ?data-confirm-title: string (default=Warning), the title of the confirmation modal.
            - ?data-confirm-ok-text: string (default=Ok), the text of the ok button of the confirm modal
            - ?data-confirm-cancel-text: string (default=Cancel), the text of the cancel button of the confirm modal
            
            Also, each item can have one of the following classes:
             - disabled, prevents the action from being triggered
             - will-enable, the action will be disabled when no rows is selected, and enabled when at least one
                    row is selected. It updates dynamically as the user select/de-selects rows.
            
            
----- morphic-table: the table 
        The table should have the following attributes:
        - data-view-id: the name of the table to interact with
        - ?data-page: the number of the current page to display,
                    otherwise (if not set), 1 is assumed
        - data-nipp: the number of items per page to use,
                    otherwise (if not set), 20 is assumed
        - data-service-uri: the url of the service to fetch
        
--------- morphic-table-sort: on a sort trigger.
                    The following html attributes should be added accordingly:
                    - ?data-sort-dir: asc|desc|null, represent the current sorting being applied for 
                            this column.
                            Any other value is equivalent to null, meaning no particular 
                            sorting was applied for this column.
                            Same if the data-sort-dir attribute is not present.
                            
                            The orders cycle in the following order:
                            - null
                            - asc
                            - desc
                             
                            
                    - data-column: string, the name of the column to which the sort is applied 
--------- morphic-checkbox (both): on checkbox inside data rows
--------- (td)
        Every cell containing data should have the following attributes:
        - data-column: the name of the column
        - data-value: the original value of the column

------------- morphic-row-action: action for a specific, same as morphic-action







### Sorting

Every element that could be sorted should have the "morphic-table-sort" class.
Also, it should have a data-column attribute holding the value of the column,
and a "data-sort-dir" attribute to hold the direction of the sort: asc, desc, null.

### Filtering

Every element that can hold a filter value (like input or select for instance)
should have the "morphic-table-filter" class.
Also, it should have a data-column attribute holding the value of the column.

The search button should have the classes "morphic-table-search-btn" 
and "morphic" (morphic class is necessary for the morphic system to kick in).

A search reset button might exist, it should have the classes "morphic-table-search-reset-btn" 
and "morphic".

### pagination

The following markup, related to pagination, should be applied:


- morphic-page, this is for a specific page.
                    The page number should be added using the attribute: data-page



### nipp        
        
For nipp, the element should have the following class:

- morphic-nipp
        The nipp number should be set via the data-nipp number.
        If data-nipp equals 0, this means display all items.



        
### Ajax service

An ajax service should be available.
The communication consists of the actions described below.
It will use the [ecp](https://github.com/lingtalfi/Ecp) protocol.
All parameters are passed via post.
The key introducing the actions is: "actionType".


- fetching data:
        - actionType: fetch
        - viewId: the view id.
                    Often, this is the name of the table.
                    It's an identifier representing the view being displayed.
        - sort: array of columnName => sortDir
                        with sortDir: asc|desc|null
                        Note: if the columnName is not passed, it has the same
                        effects than if it had the value null.
        - filters: array of columnName => searchString
                        @todo-ling: define searchString
        - page: int, the minimum is 1.
        - nipp: int, the number of items per page
                        
        The result is a string containing the html table and widgets.
        It should depend on the theme.
        Therefore, we ask the Theme to give us a "table & widgets" renderer,
        also called GuiAdminTableRenderer.
        

- deleting data:
        - actionType: delete
        - (exact same parameters as fetching data, plus the following)
        - params:
            - rows: the rows to delete

        