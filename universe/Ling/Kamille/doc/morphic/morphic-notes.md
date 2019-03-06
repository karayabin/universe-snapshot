Morphic notes
===================
2018-01-31





Morphic is a system that makes a static admin table markup functional.

It consists of a js layer and a companion webservice.
Together, they provide functionality such as update an entry, delete an entry, other actions...
The view is refreshed live.




Morphic List
===============

The morphic config file exposes the following keys:

- title
- table
- viewId
- headers:
        array of columnName => label
- ?headersVisibility:
        array of columnName => bool:isVisible
- ?realColumnMap:
        array of columnName => queryColumn
            The queryColumn is used in the sql query (built using querySkeleton and queryCols)
- querySkeleton
- queryCols
        array of columnName or "... as columnName"
- ric:
        array of columnName
        Those are used when appropriate:
            - generate update form link
            - delete record (on the webservice side)
        
- formRoute




With columnName being the symbolic column name.



When you create a config file, the important rule is that queryCols and headers MUST be synced.
That's because the headers displayed in the view are generated based on the config headers, 
and the rows (the main lines of the admin table) are generated using both the queryCols and the headers.



The realColumnMap is used when appropriate.
One of the use case is when the view needs to be refreshed: so for instance if the user changes the sort direction,
an ajax request is made, and symbolic column names transit via http.
Then those symbolic names are injected into a real sql query using the realColumnMap as an adaptor.


View
===============

order and filter
-------------------

The order trigger and filter fields use extra attributes:

- data-column: which corresponds to the columnName
- data-sort-dir: null|asc|desc (only for order trigger)


See more about this in MorphicBootstrap3GuiAdminHtmlTableRenderer::getHeaderColAttributes.




 