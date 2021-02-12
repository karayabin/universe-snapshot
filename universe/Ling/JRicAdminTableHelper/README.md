JRicAdminTableHelper
===========
2019-09-03



A tool to help implementing ric actions or ajax actions in general in your admin tables.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JRicAdminTableHelper
```

Or just download it and place it where you want otherwise.

Note: JRicAdminTableHelper implements the [universe assets](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md) recommendation.


What is ric?
---------------


Ric is an acronym, it stands for row identifier columns.
It's basically an array of the columns which identify a row uniquely.

Usually, the ric is equivalent to the columns of the primary key of the table if it has a one.
Or, if the table doesn't have a primary key, all the columns.
Alternately, the developer can always override the ric manually.

This ric concept is generally useful when the gui wants to interact with a row in particular.
This happens a lot with admin tables, where the user can select one or more lines (rows) in the table,
and apply a general action on them.

Or, on an individual row, if there is an action button, this action button generally requires the ric information
if this action is executed by the backend server.




How does this tool work?
================


Selection
---------------

Basically, this tool covers your checkboxes and your inline actions (inside your admin table).

You first need to setup the markup.

The markup rules apply to the following elements inside your admin table:

- input of type checkbox
- a link or button


Apply the following markup:

- add the "rath-emitter" css class 
- add the "data-ric-{colName}" attribute to add a column to the ric object (which is an arrayObject of columnName => value) 
- add the "data-param-{paramName}" attribute to add a value to the parameters object (which is an arrayObject of paramName => value) 


Now your markup is all set, you can use this tool.

Call the getSelectedRic() method to collect all the checked checkboxes ric.

For individual actions, call the getRic( jEmitter ) method to get the ric array, or the getAttributes (jEmitter) to get all parameters.


Listening
-------------

This tool can also help you implementing a basic interaction between your ric emitters and
a backend server.


To activate this, call the listen method.

You will need to configure the related options before hand, such as the server uri.


What this tool will is:

- when an emitter of type link or button (i.e not a checkbox) is clicked,
    it will collect the parameters and send them to the given server.
    The ric parameter is special and collected separately.
    
    
    
Note: this tool won't complain if the ric parameters are not provided, so you can use this tool outside the narrow context
of ric actions. In other words, you can use this tool to send any action to the server, using the data-param-{paramName} attributes.





History Log
=============

- 1.0.8 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.7 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.6 -- 2019-10-04

    - update RicAdminTableHelper.getSelectedRic inner algorithm
    
- 1.0.5 -- 2019-09-23

    - fix wrong path for dependencies
    
- 1.0.4 -- 2019-09-23

    - implemented the universe assets recommendation
    
- 1.0.3 -- 2019-09-23

    - fix getRicSelected returning non unique values
    
- 1.0.2 -- 2019-09-04

    - fix missing semi-column at the end of a line
    
- 1.0.1 -- 2019-09-04

    - fix error method not existing
    
- 1.0.0 -- 2019-09-03

    - initial commit