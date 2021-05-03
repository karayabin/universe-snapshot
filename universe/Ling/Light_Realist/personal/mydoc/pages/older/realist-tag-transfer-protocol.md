Realist tag transfer protocol
======================
2019-08-15 -> 2021-03-23



We have two actors:
- a rows generator, responsible for generating the rows
- a renderer, responsible for displaying the rows


And this protocol defines the json data structure sent from a "renderer" to a "rows generator" (via ajax),
and the json data response structure from the "rows generator" to the "renderer".

So we will have two sections:

- the gui request (from the renderer to the generator)
- the generator's response (from the generator to the renderer)



Note: the renderer sends data to the rows generator because of a human user manipulating the gui (usually).
Note 2: The goal of this protocol is to help implementing an interactive gui admin table.



The gui request
---------------
2019-08-15 -> 2021-03-23

The gui request is a json array sent from the renderer to the (rows) generator.

It has the following structure:



```yaml
request_id: <
    string, the request id identifier. Depends on your implementation.
    An example of implementation is defined in the comments of the LightRealistService->executeRequestById method
    (https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/executeRequestById.md).
>            
tags:
    - 0: 
        tag_id: the identifier of the tag that we want to activate 
        variables:
            $name: $value
            - ...
        - ...(other properties, if we need them)
    - ...
- ...(other properties, if we need them later)
```

Note: each item of the tags array is called a tag item.



The generator's response
---------------
2019-08-15 


The generator response is also a json array, and its structure depends on whether the response is a success or erroneous.

An erroneous response looks like this:

```yaml
type: error       #fixed value  
error: string, the error message  
?gui_request: [] # returns the same array as the gui request, but the variables' values can be updated.

```

Note: the gui_request will generally (99.99% of the cases) never been used, so implementor can forget about it.
But the theory needed to be established here.


In case of a successful response, we have this structure:


```yaml
type: success       #fixed value  
rows: array of col => html.
        # With: 
        # - col: string, the name of the column 
        # - html: string, the html code for that column 
  
nb_total_rows: int, the total number of rows
current_page_first: int, the current page's first element offset
current_page_last: int, the current page's lst element offset
nb_pages: int, the total number of pages
nb_items_per_page: int, the number of items per page
page: int, the current page number
sql_query: string, the sql query being executed (intended for debugging)
markers: array, the markers used with the sql query (intended for debugging)
?gui_request: [] # returns the same array as the gui request, but the variables can be updated.

```



Note: same remark for gui_request, it will practically never be used, just ignore it.


Tip: Notice that we can anticipate that the rows will be rewritten by the gui. And so if we were to inject javascript logic in our rows,
we shall rely on delegated/lazy events (i.e. assuming that the rows cannot be targeted directly by their dom element which will be rewritten
every time a parameter changes). 



The general philosophy
-------------
2019-08-15 -> 2021-03-23


With those two json array, the philosophy is that renderer is in charge of its own logic. It decide which data to send, and how to treat the 
response.

If we wanted to switch to another philosophy where the generator has something to say about it, we would then start to use the **gui_request** property,
but this is not recommended.




Related
-----------
- [realist-tag-transfer js helper](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/realist-tag-transfer-js-implementation-notes.md): a possible implementation of this protocol








