JResponsiveTableHelper
===========
2019-09-03



A js tool to help implementing responsive tables.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JResponsiveTableHelper
```

Or just download it and place it where you want otherwise.


Note: JResponsiveTableHelper implements the [universe assets](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md) recommendation.



See the [responsive table helper gif demo](https://lingtalfi.com/img/universe/JResponsiveTableHelper/responsive-table-helper.gif)



Note: in the gif demo, I went slowly so that we can see all my moves, but the js code is actually fast and lightweight, 
it's all smooth don't worry.




How to
==========

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Responsive table helper demo</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, tr, td, th {
            border: 1px solid black;
        }

        td, th {
            padding: 50px;
        }


        #my-table table td {
            padding: 5px;
        }

    </style>

    <link rel="stylesheet" href="/libs/responsive-table-helper/responsive-table-helper.css">

</head>

<body>


<table class="table" id="my-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">Pet</th>
        <th scope="col">Pet 2</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>Cat</td>
        <td>Lion</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>Dog</td>
        <td>Tiger</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>Bird</td>
        <td>Elephant with horns and three legs, he also have a big brain, and has a lot of memory, but that's all.</td>
    </tr>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="/libs/responsive-table-helper/responsive-table-helper.js"></script>

<script>
    var rth = new ResponsiveTableHelper({
        jTable: $("#my-table"),
        extraColumnContent: [
            '',
            '<a class="rth-toggle-button" href=""><i class="fas fa-plus-circle"></i></a>',
        ],
        contentRowStartIndex: 1,
        collapsibleColumnIndexes: [5, 4, 3, 2, 1],
        columnLabels: 'auto',
        padding: 50,
    });

    rth.listen();
</script>
</body>


</html>



```


For more, read the source code, it's only about 500 lines.




How to deal with ajax requests
==============
If your table is refreshed via ajax by another tool (let's call it ajaxTool), you might need more configuration work.
That's because the "responsive table helper" always starts by adding a "plus toggle column" at the beginning
of the table (and hides/shows it depending on the size of the table).
 
Because of this extra column, the ajaxTool might be very confused, injecting the rows into a table
that has one more column than expected: this would lead to a gui mess with an inconsistent table.

There is a quick fix to that. Just tap into the ajaxTool logic, just before the ajax request is sent,
and just after, like this (pseudo js code):


  ```js

var rth = new ResponsiveTableHelper({
    jTable: $("#main-table"),
    // ...your config here...
});

var ajaxTool = new MyAjaxTool({
    // ...the ajax tool config here...
    on_request_before: function () {
        rth.removePlusColumn();
    },
    on_request_after: function () {
        rth.listen();
    },
});

ajaxTool.listen(); 
```


As you can see, we first start by removing the "plus" column before sending the request.
Then we call the rth.listen method every time after a request is sent.






History Log
=============

- 1.5.0 -- 2019-09-25

    - cloned table removed after every use was a bad idea (inconsistent results), put it back to hide mode  
    
- 1.4.2 -- 2019-09-23

    - fix wrong path for dependencies 
    
- 1.4.1 -- 2019-09-23

    - implemented the universe assets idea 
    
- 1.4.0 -- 2019-09-23

    - update, now the cloned table is removed after every use (instead of being just hidden) 

- 1.3.0 -- 2019-09-23

    - add responsive-clone css class to the hidden clone, so that other scripts can target it 
    
- 1.2.0 -- 2019-09-04

    - added collapsibleColumnIndexes=admin option 
    
- 1.1.0 -- 2019-09-04

    - added ajax handling
    - added breakpoints support 
    
- 1.0.0 -- 2019-09-03

    - initial commit