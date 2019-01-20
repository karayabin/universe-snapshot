DataTable model
===================
2017-04-29



(view info)
- headers: array of columnId
                This array is also determining the order in which columns are displayed.
                It must contain all columns, including hidden ones.
                
- hidden: array of hidden columns.
                Hidden means hidden from the view, but the data shall be still accessible if needed.
- rows: array of row, each row containing the key => value data.
                The value is a string, or an array.
                If it's a string, it represents the data to display.
                We use the array form when we want to create something special like links.
                
                So if the value array, it is the following array:
                
                - type: string indicating the type of special thing we want to display.
                            The available types so far are:
                            - link
                            - links
                
                - data: depend on the type, see the "Rows special features" section below.
                
- ric: array of row identifying columns (generally just contain the id column for dataTables which render data from a database)
                
                
                
                
                

                
(customization info)
- page: int=1, the number of the current page                
- nbTotalItems: int=1, total number of items                
- nipp: int=20, the number of items per page
- checkboxes: bool=true, whether or not to add the checkboxes (which allows for bulk actions)
- isSearchable: bool=true, whether or not to use a search system
- unsearchable: array of columnId which are not searchable
- searchValues: array of columnId to current search text
- isSortable: bool=true, whether or not to use the "order by" system
- unsortable: array of columnId which are not sortable 
- sortValues: array of columnId to sort direction (asc or desc), which indicates the 
                type of sort currently being applied to that column.__
                
- showCountInfo: bool=true, whether or not to show the count info (Showing 1 to 10 of 57 entries)
- showNipp: bool=true, whether or not to show the nbItemPerPage selector
- nippItems: array of possible nipp values, default=\[5, 10, 20, 50, 100, all]
                The special value all means all.
                The special value label can be set with the textNippAll key.
                
- showQuickPage: bool=true, whether or not to display a quick page navigation widget
- showPagination: bool=true, whether or not to display the pagination widget
- paginationNavigators: array=\[first, prev, next, last], array containing the navigator elements to display, amongst:
            - first
            - prev
            - next
            - last
- paginationLength: int=9, the max number of pagination items to display.
                            The current page should be display in the middle
- showBulkActions: bool=true, whether or not to display bulk actions
- showEmptyBulkWarning: bool=true, whether or not to display bulk a warning message when the user tries
                            to execute a bulk action but has not selected any rows
- bulkActions: array of identifier => bulkActions, each entry containing the following:
    - confirm: bool=false, whether or not to confirm before executing the action
    - confirmText: string=null, the confirm text. If null, will default to 
                    a default text of: "Are you sure you want to execute this action?"
    - label: string="", the label of the bulk action
    - uri: string="/datatable-handler?type=bulk", the uriNotation (see below)
                        The action identifier is passed via post (with key id).
                        Also, the selected rows' rics are passed as an array via post (with key rics)
    - type: string=modal, the type amongst:
            - link: the browser will be redirected to the given uri, as if you had clicked on a link
            - post: the data will be posted to the given uri as post data, this will redirect the page
            - modal: the data will be posted to the given uri as post data, but via ajax, and a modal
                        will be used to hold the server's response.
                        Json must be used as the datatype for this type of exchange.
                        The returned response must be a standardJsonResponse (see below).
            - refreshOnSuccess: like modal, but displays the modal only in case of failure,
                        and otherwise (in case of success), it refreshes the datatable (and widgets).
            - quietOnSuccess: like modal, but displays the modal only in case of failure,
                        and otherwise (in case of success), does nothing
                              
            
- showActionButtons: bool=true, whether or not to display the action buttons
- actionButtons: array of identifier => actionButton, each entry containing the following:
                same as bulkActions, with the following extra entries:
                    - icon: string, an icon suggestion identifier    
                    - flavour: string, a color/type suggestion    
                    - useSelectedRows: bool=false, whether or not to use the selected rows for this action.
                                        If true and no rows is selected, a warning will be displayed with the message
                                        defined in the textUseSelectedRowsEmptyWarning key.
                                        Note that the rics are passed no matter what.
                Also, the default uri is:
                - uri: string="/datatable-handler?type=action"
                

            
- textNoResult: string, the text to display when the number of rows is zero.
                Default: No results found
- textSearch: string, the text to display in the search button.
                Default: Search
- textSearchClear: string, the text to display in the search clear button.
- textCountInfo: string, the format string representing the count info.
                    A typical count info string looks like this:
                    Showing 1 to 10 of 57 entries
                    And so we use tags to achieve displaying the unknown info.
                    Default: Showing {offsetStart} to {offsetEnd} of {nbItems} entries
                    
                    The variables have to be resolved by the renderer object.
                    
                    
                    Have a look at the DataTableRendererUtil::getShowCountInfoText($a)
                    method to see an example of how the computation is done.
                    (ModelRenderers\DataTable\Util\DataTableRendererUtil).
- textNipp: string, the format string representing the nipp selector.
            Default: Show {select} entries
            
                        The {select} tag is replaced by an html select tag,
                        and this is done by the renderer object.
- textNippAll: string, default=all,
                    the label of the "all" special key potentially displayed in a nipp.  
- textQuickPage: string, default=Page, text used by the quickPage widget
- textQuickPageButton: string, default=Go, text used inside the button of the quickPage widget
- textBulkActionsTeaser: string, default=For selected entries,  
                            text typically displayed as the first option's label of the bulk action selector
- textEmptyBulkWarning: string, default=Please select at least one row  
- textUseSelectedRowsEmptyWarning: string, default=Please select at least one row  
- textPaginationFirst: string, default=First, the text to display in the pagination's first button (if any)  
- textPaginationPrev: string, default=Previous, the text to display in the pagination's prev button (if any)  
- textPaginationNext: string, default=Next, the text to display in the pagination's next button (if any)  
- textPaginationLast: string, default=Last, the text to display in the pagination's last button (if any)  
                    
                    
                    
                    
                    
                    
                    
            
            
            
            

            
uriNotation         
------------
It's a string, but the {ric} tag is replaced with the ric values separated with the ricSeparator.
  
ricSeparator
---------------
The ricSeparator is used to separate ric values.
Since ric values can be anything, the ricSeparator should be hard to guess.
The default is: +--ric_separator--+


standardJsonResponse
-----------------
An array containing two keys:
- type: string, the response type: error|success
- message: string, the accompanying message 



Rows special features
=========================

link
---------
This will create a link.
The following properties describe a link:


Same as bulkActions, with the following extra entries:
    - icon: string, an icon suggestion identifier
    - flavour: string, a color/type suggestion
    
Also, the ric value of the row is provided via $_POST\[ric].


links
---------
An array of link as described above.
Shall be displayed as a grouped buttons widgets or something alike.



Others
----------
This model is open to new ideas.
For instance, a boostrap renderer might provide a dropdown special feature.

Renderer implementor should expose their capabilities upfront in their doc. 





Renderer constraints
========================
The dataTable widget is an alive widget, which gets updated as the user searches through it,
changes the sort order, deletes a row, etc...
This involves a server script handling the update of the model server side.

So there must be a communication protocol between the dataTable and the server.
Although this is not strictly a model's problem, we suggest the following implementation:





- search: string|array,
            depending on whether the renderer offers a search by column or a general search widget.
            
            If this is a string, then it's a global search (assuming searching all columns). 
            If this is an array, it's an array of columnId => searchText.
             
            The array is the recommended form as it's more flexible.
- sort: array of columnId => sortDirection  
                sortDirection is one of asc|desc.
- nipp: int|all, number of items per page. 
                    The special keyword all, if allowed server side, yields all the results.
- page: int, the number of the page we wish to display 
                      
                
            



