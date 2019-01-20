ListBundle
=================
2017-11-15



A list bundle is the ensemble of a list widget and surrounding widgets, like the pagination links,
the sort widget, a possible search widget, ...



In this implementation, the listBundle is a composable model.
Templates should always check for optional properties (prefixed with the question mark).


```txt
- general: 
    - items: the rows
    - sliceNumber: the number of the slice representing the items (aka the current page number)
    - sliceLength: the number of items per slice
    - totalNumberOfItems: the total number of items
    - offset: the offset of the returned slice's first element (compared to the whole items array)         
- ?page: 
    - currentPage
    - items: array of item, each item:
        - number: number
        - link: string
        - selected: bool
- ?sort:
    (this sort system uses one identifier for every sort/sortDir couple)
    (so for instance, we have identifier like this: price_asc, price_desc, ...)
    - sortName: string, the name of the sort (usually "sort")
    - items: array of item, each item
        - value: string, the value (price_asc)    
        - label: string    
        - selected: bool    
```



Other properties could be added in the future, this is an extendable model.