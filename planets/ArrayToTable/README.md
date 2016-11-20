ArrayToTable
=====================
2015-10-28



Create an html table from a php array.





Goal
----------

Our goal is to display an html table from a php array.
The php array contains the elements of the table, and therefore it's an array containing rows.
For instance, this is the kind of php array that we want to display:


```php
$rows = [
    ['pierre', 'male', 'developer'],
    ['alice', 'female', 'designer'],
    ['kobe', 'male', 'basketball player'],
    ['christine', 'female', 'marketing assistant'],
];
```

Notice that each line is a row, and every row must have the same structure (first name - gender - job).




How to
-----------

ArrayToTable is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


### The simplest table ever 

To create the simplest table possible, we can use the ArrayToTableUtil class.

```php
<?php

use ArrayToTable\ArrayToTableUtil;

require_once "bigbang.php";


$rows = [
    ['pierre', 'male', 'developer'],
    ['alice', 'female', 'designer'],
    ['kobe', 'male', 'basketball player'],
    ['christine', 'female', 'marketing assistant'],
];


echo ArrayToTableUtil::create()
    ->addBody($rows)
    ->setHeaders(['First Name', 'Gender', 'Job'])
    ->setCaption('My first table')
    ->setFooter(['Bum', 'Bam', 'Bim'])
    ->render()
;

```


The example above will display a nicely formatted output (notice the comments and the clean indentation in 
the generated source code):


```html
<!-- START - My first table -->
<table>
	<caption id="bam">My first table</caption>
	<thead>
		<tr><th>First Name</th><th>Gender</th><th>Job</th></tr>
	</thead>
	<tfoot>
		<tr><td>Bum</td><td>Bam</td><td>Bim</td></tr>
	</tfoot>
	<tbody>
		<tr><td>pierre</td><td>male</td><td>developer</td></tr>
		<tr><td>alice</td><td>female</td><td>designer</td></tr>
		<tr><td>kobe</td><td>male</td><td>basketball player</td></tr>
		<tr><td>christine</td><td>female</td><td>marketing assistant</td></tr>
	</tbody>
</table>
<!-- END - My first table -->
```


### Decorating with css


As of 1.2.0, if we want to add more style to the table, we can use the StylizedArrayToTableUtil class.
Here is an example.



```php
<?php

use ArrayToTable\StylizedArrayToTableUtil;

require_once "bigbang.php";



?>
    <style>

        .myTable, .myTable th, .myTable td {
            border: 1px solid #aaa;
            border-collapse: collapse;
            padding: 2px;
        }

        .myTable .success {
            background-color: green;
        }

        .myTable .failure {
            background-color: red;
        }

        .myTable .warning {
            background-color: orange;
        }
    </style>
<?php
$rows = [
    ['pierre', 'male', 'developer'],
    ['alice', 'female', 'designer'],
    ['kobe', 'male', 'basketball player'],
    ['christine', 'female', 'marketing assistant'],
];


echo StylizedArrayToTableUtil::create()
    ->addBody($rows)
    ->setHeaders(['First Name', 'Gender', 'Job'])
    ->setCaption('My first table')
    ->setFooter(['Bum', 'Bam', 'Bim'])
    // stylizing the table
    ->setTableAttr(['class' => 'myTable'])
    ->setCaptionAttr(['id' => 'bam'])
    // this callback should return the array of attributes to apply to the tr, or false if we don't want 
    // any attributes to be applied
    ->setTrAttr(function (array $row, $containerElType) { 
        if ('tfoot' === $containerElType) {
            return false; // we don't want any particular style on the footer
        }
        
        // below is style handling for a body row
        $ret = [];
        $firstName = $row[0];
        if (false !== strpos($firstName, 'r')) {
            $ret['class'] = 'success';
        }
        elseif (false !== strpos($firstName, 'k')) {
            $ret['class'] = 'warning';
        }
        else {
            $ret['class'] = 'failure';
        }
        return $ret;
    })
    ->render();

```

The code above, when executed by a browser, would give the following image:

![ arrayToTable stylized example ](http://s19.postimg.org/aldu0yt2b/stylized_Array_To_Table_example.png)







History Log
------------------
    
- 1.2.0 -- 2015-10-28 15:42

    - Added StylizedArrayToTableUtil
        
        
- 1.1.0 -- 2015-10-28

    - improve generated html code formatting, add html comments at the top and bottom of the generated table
    
- 1.0.0 -- 2015-10-28

    - initial commit
    
    
    
    