Auto-Admin
===============
2017-05-02


It's all about lists and forms,
or to be more precise: how do you generate the lists and forms for a given set of tables.


One of the greatest problem we will have to tackle is that both lists and forms need to react to the relationship between tables.

For instance, imagine the following schema with two tables, where an user owns a car.


```txt
- table user
----- id
----- name
----- pass

- table car
----- id
----- user_id: (foreign key)
----- model
----- price
```


Given that structure, one thing that we would like is the option to choose between those 
two representations of a car list:


representation with the user_id as user_id:
-------------------------

```txt
id      user_id     model               price
1       1           volkswagen          10
2       1           fiat                100
3       2           chrysler            100
```


representation with the user.name as user_id:
-------------------------

```txt
id      user_id     model               price
1       paul        volkswagen          10
2       paul        fiat                100
3       emilie      chrysler            100
```


Actually, it might make even more sense if we could also change the column names, like in the following example:


representation with the user.name as user_id:
-------------------------

```txt
id      user_name     model               price
1       paul        volkswagen          10
2       paul        fiat                100
3       emilie      chrysler            100
```


That should give you an idea of the problem with list.


Now for forms, imagine that we want to generate a form for inserting a car in the database,
then we have a similar problem, as exposed below:


representation with the user_id as user_id:
-------------------------

```txt
model: input
price: input
user_id: select
            - 1
            - 2
            - 3
```

representation with the user_name as user_id:
-------------------------

```txt
model: input
price: input
user_id: select
            - paul
            - emilie
            - johan
```


representation with the user_name as user_id, and the column name user_id changed to user_name
-------------------------

```txt
model: input
price: input
user_name: select
            - paul
            - emilie
            - johan
```


So, now you should have an understanding of the biggest problem we need to resolve.

So now we will go into the details of what kind of tools we want to provide in order to help an auto-admin implementor 
do her job.
 
 
 
 
First, we will get started by making the assumption that the implementor will need to generate files, one per table and one per type.
So for instance, she will need to generate a structure like this for instance (file names and dir names might change):
 
```txt
- auto-generated-list/
----- db1.table1.php
----- db1.table2.php
----- ...
- auto-generated-form/
----- db1.table1.php
----- db1.table2.php
----- ...
``` 

So, we already know that we will need to iterate over the database(s) tables.
 
Also, we don't know what's inside the table1.php files (that's because there are as many possible implementations as 
there are implementors), so we won't be able to generate the concrete content of those files, but only provide tools 
that will help generate that content.

So our strategy will be to estimate the kind of things those files need, and provide relevant tools to help with the job
of providing those things.


To make things simple, we will make one tool for helping with lists, and another for helping with forms,
and both will extend a common CrudGeneratorHelper class.

 
```txt
- CrudGeneratorHelper
----- ListCrudGeneratorHelper
----- FormCrudGeneratorHelper
``` 

This allows us to have the iteration method at the CrudGeneratorHelper level, thus available to both list and form generators.

- setDatabases( array databases)
- getTables(db=null, useDbPrefix=true)
    - if the db is not specified, this method will iterate over every database provided with the setDatabases method


 
 
 
Lists
==============


Here is an example of DataTable configuration using a quickpdo generator (taken from a datatable profile file from the NullosAdmin module of the kamille framework).


```php
<?php


/**
 * This is a datatable profile.
 * It contains the information necessary to display a datatable aware
 * of user parameters.
 *
 *
 *
 */
$profile = [
    'rowsGenerator' => [
        'type' => 'quickPdo',
        'fields' => '
f.id as fournisseur_id,  
f.nom as fournisseur_nom,        
a.id as article_id,  
a.reference_lf as reference_lf,  
h.reference,      
h.prix        
        ',
        'query' => '
select %s from zilu.fournisseur_has_article h 
inner join zilu.fournisseur f on f.id=h.fournisseur_id        
inner join zilu.article a on a.id=h.article_id        
        ',
    ],
    'transformers' => [
        'action' => function ($oldValue, $columnId, array $row) {
            return [
                'type' => "link",
                'data' => [
                    'type' => 'modal',
                    'uri' => '/datatable-handler?type=special&id=test',
                    'confirm' => false,
                    'confirmText' => "Are you sure you want to execute this action?",
                    'icon' => "mail",
                    'label' => "Send a mail",
                ],
            ];
        }
    ],
    'model' => [
        'ric' => ['fournisseur_id', "article_id"],
        'headers' => [
            "fournisseur_nom" => "fournisseur",
            "reference_lf" => "référence lf",
            "reference" => "référence",
            "prix" => "prix",
        ],
        'hidden' => ['fournisseur_id', 'article_id'],
        'checkboxes' => true,
        'isSearchable' => true,
        'unsearchable' => ['action'],
        'isSortable' => true,
        'unsortable' => ['action'],
        'showCountInfo' => true,
        'showNipp' => true,
        'nippItems' => [20, 50, 100, 'all'],
        'showQuickPage' => true,
        'showPagination' => true,
        'paginationNavigators' => ['first', 'prev', 'next', 'last'],
        'paginationLength' => 9,
        'showBulkActions' => true,
        'showEmptyBulkWarning' => true,
        'bulkActions' => [
            'deleteAll' => [
                'confirm' => false,
                'confirmText' => "Are you sure you want to execute this action?",
                'label' => "Delete items",
                'uri' => "/datatable-handler?type=bulk",
                'type' => "modal",
            ],
        ],
        'showActionButtons' => true,
        'actionButtons' => [
            'sendMail' => [
                'confirm' => false,
                'confirmText' => "Are you sure you want to execute this action?",
                'label' => "Send Mail",
                'useSelectedRows' => true,
                'uri' => "/datatable-handler?type=action",
                'type' => "refreshOnSuccess",
                'icon' => "mail",
            ],
        ],


        //--------------------------------------------
        // INITIAL SETTINGS
        // the user can override them
        //--------------------------------------------
        'page' => 1,
        'nipp' => 100,

        //--------------------------------------------
        // TEXT
        //--------------------------------------------
        'textNoResult' => 'No results found',
        'textSearch' => 'Search',
        'textSearchClear' => 'Clear',
        'textCountInfo' => 'Showing {offsetStart} to {offsetEnd} of {nbItems} entries',
        'textNipp' => 'Show {select} entries',
        'textNippAll' => 'all',
        'textQuickPage' => 'Page',
        'textQuickPageButton' => 'Go',
        'textBulkActionsTeaser' => 'For selected entries',
        'textEmptyBulkWarning' => 'Please select at least one row',
        'textUseSelectedRowsEmptyWarning' => 'Please select at least one row',
        'textPaginationFirst' => 'First',
        'textPaginationPrev' => 'Prev',
        'textPaginationNext' => 'Next',
        'textPaginationLast' => 'Last',
    ],
];
```
 


From there, we will focus for now only on the rowsGenerator section, which is part of what we want to generate
(later, we will need to generate the transformers section as well):


```php
$profile = [
    'rowsGenerator' => [
        'type' => 'quickPdo',
        'fields' => '
f.id as fournisseur_id,  
f.nom as fournisseur_nom,        
a.id as article_id,  
a.reference_lf as reference_lf,  
h.reference,      
h.prix        
        ',
        'query' => '
select %s from zilu.fournisseur_has_article h 
inner join zilu.fournisseur f on f.id=h.fournisseur_id        
inner join zilu.article a on a.id=h.article_id        
        ',
    ],
```

So, this starts to be concrete: we need to be able to generate a standard view of the table.
In particular (in this example), we need to generate two things:

- the fields
- the query

That's a good example though because this system is used in other auto-admins I've seen.


If we merge those fields together, we obtain the original sql query that we want to generate.

```txt
select 

f.id as fournisseur_id,  
f.nom as fournisseur_nom,        
a.id as article_id,  
a.reference_lf as reference_lf,  
h.reference,      
h.prix
 
from zilu.fournisseur_has_article h 
inner join zilu.fournisseur f on f.id=h.fournisseur_id        
inner join zilu.article a on a.id=h.article_id  
```


That's a fairly common example of list that we need to generate.

But let's start even simpler with a simple table with no relationship, just to get started.

```txt
select 
id,  
nom,
email
from fournisseur  
```



All we need here is to grab all the fields of a table. 
So we can add the following method to our Helper:

- array     getColumnNames( table )
        returns the names of the columns of the given table



Ok, let's move on to a next example.

I like to think with a model in front of me, so I will provide the zilu-schema.pdf document,
and will assume you've opened it so you can follow along with me.

By the way, this is a database schema used for an old project (but who cares).


Foreign key
===================
Ignoring the right half of the schema, focusing on the container table.


This is a simple table with only one foreign key.

So, the main table: 

- container
    - id
    - nom
    - type_container_id: fk


As we've discussed before, we don't want to simply display the flat type_container_id here, but rather a more
human readable column.

But what are our options here?

If we look into the foreign table: type_container, we have the following columns:

- type_container
    - id
    - label
    - poids_max
    - volume_max

So, the question is: should we take the value of the id, label, poids_max or volume_max column?

We will agree that in the end, this is a human choice; although that could be in some degrees automated (for instance
every column named label would be a candidate for being the selected field).

This first question leads us to a first term: foreignKeyPreferredColumn.


foreignKeyPreferredColumn
--------------------------
If column A from table T is a foreign key to column B from table T2,  
then the foreignKeyPreferredColumn is the column from T2 that we use instead of A (in order to make
the rendered list more human friendly).

Implementation wise, we won't bother trying to automate those preferences, and will let that to the user,
since creating the preferences will be done only once per schema (so it doesn't cost much, even for lazy
people like me).

So, we will have one foreignKeyPreferredColumn for every table that is referenced at least once by another table.
  
And actually, we can automate the creation of the array with non-accurate values (taking the first non auto-incremented 
column every time, just for the sake of having a name), as an array to complete by the user.


Here is a concrete implementation from my previous auto-admin generator (in nullos admin),
just as an example:

```php
<?php


namespace Crud\Util;

use QuickPdo\QuickPdoInfoTool;

class CrudGeneratorHelper
{

    public static function generateForeignKeyPrettierColumns(array $tables)
    {
        $ret = [];
        foreach ($tables as $table) {
            $fkInfos = QuickPdoInfoTool::getForeignKeysInfo($table);
            foreach ($fkInfos as $fkInfo) {

                $fkTable = $fkInfo[0] . '.' . $fkInfo[1];
                if (!array_key_exists($fkTable, $ret)) {
                    $types = QuickPdoInfoTool::getColumnDataTypes($fkTable, false);
                    foreach ($types as $prettyColumn => $type) {
                        if ('varchar' === $type) {
                            break;
                        }
                    }
                    $ret[$fkTable] = $prettyColumn;
                }
            }
        }
        return $ret;
    }
}
```


But anyway, we end up with an array of table => foreignKeyPreferredColumn.

Let's be creative and call this array table2ForeignKeyPreferredColumn.

And so that's one more word to our vocabulary.


- foreignKeyPreferredColumn
- table2ForeignKeyPreferredColumn

That was just a reminder of the vocabulary we know so far.







Using translations for the end result
---------------------------------------
I believe that column names should be translated by the translation mechanism of your app.

Why?

Because translation is powerful: it can translate a column name not ONLY in a human readable name,
but in a human readable name FOR EVERY LANGUAGE, which is a far better approach right?

So, imagine that we have the following two tables:

- concours
    - id
    - equipe_id: fk
    - titre
    - url_photo
    - url_video
    - date_debut
    - date_fin
    - lots
    - reglement
    - description
    
- equipe
    - id        
    - nom
            
And imagine we want to display the concours table,
then the fields would look like that for instance:

- id
- equipe.nom
- titre
- url_photo
- url_video
- date_debut
- date_fin
- lots
- reglement
- description
 
 
(Notice that I replaced the foreign key with the name of the foreign table followed by a dot, followed by the foreignKeyPreferredColumn)
 
And so, my point is that it is much better to rely on a translation system to actually translate the column names
rather than relying on custom rules (like replacing underscores with spaces) or mappings (url_photo => Photo, ...).

Well, if we adopt that way of thinking, then the problem of finding human names is not our problem anymore
and we can move to the next step, which is aliasing.


Prefixes
-------------

So in the previous example, we only had one foreign key, and so we had the following columns:
 
- id
- equipe.nom
- titre
- url_photo
- url_video
- date_debut
- date_fin
- lots
- reglement
- description


Let's start to think about creating a valid mysql request:

Here is my try and error process:
```bash
mysql> select id, equipe.nom from concours c inner join equipe e on e.id=c.equipe_id;
ERROR 1052 (23000): Column 'id' in field list is ambiguous

mysql> select c.id, equipe.nom from concours c inner join equipe e on e.id=c.equipe_id;
ERROR 1054 (42S22): Unknown column 'equipe.nom' in 'field list'

mysql> select c.id, e.nom from concours c inner join equipe e on e.id=c.equipe_id;
+----+-------------------+
| id | nom               |
+----+-------------------+
|  1 | komin >           |
|  2 | equipe concours 2 |
|  3 | equipe concours 2 |
|  4 | equipe concours 2 |
+----+-------------------+
4 rows in set (0.00 sec)

mysql> 

```

So, if you read closely my tries and errors, in the first try, I use the id column without an alias,
and mysql complains, because it's ambiguous. Indeed the equipe table also has an id column.

So, we don't need to go any further, we will basically need to prefix all our fields, this should take
care of the problem.

So, then I try the request by prefixing the equipe's nom field with the equipe table name, and
mysql still complains: it doesn't know the equipe.nom column, probably because I used the e alias for equipe.

Although finding alias is very natural for a human, in terms of programming that's one more problem (although
a small one), and it can be avoided by prefixing every column with the full table name, like this:


```bash
mysql> select concours.id, equipe.nom from concours inner join equipe on equipe.id=concours.equipe_id;
+----+-------------------+
| id | nom               |
+----+-------------------+
|  1 | komin >           |
|  2 | equipe concours 2 |
|  3 | equipe concours 2 |
|  4 | equipe concours 2 |
+----+-------------------+
4 rows in set (0.00 sec)
```

So, although this is more verbose, it's actually simpler to compute as a program, and also is less error prone.
And so, you guessed it, that's the way I will choose.


So we need some kind of function that would take a table name as input, and return the prefixed column names
as output.


Ideally, something like that:

- getPrefixedColumns ( concours )

Returns the following:

```php
- concours.id
- equipe.nom
- concours.titre
- concours.url_photo
- concours.url_video
- concours.date_debut
- concours.date_fin
- concours.lots
- concours.reglement
- concours.description
```

It's important that this method must always return the ric fields, as ric fields
only can ensure proper identifying of a row (typically allowing editing a row and deleting a row features).

So we need to ask: what's a ric field, and we need a method to get the ric fields for us.

### Ric

Ric fields are the fields that uniquely identify any row of a given table.
If the table contains an auto-incremented column (like typically id for instance),
then this alone is the ric field.

Otherwise, if there is a primary key, the primary key is the ric field (it might be composed
of one ore more columns).

Then, if no primary key was found, then the ric fields must be all the columns of the table (there
is no other option).

We should have a getRic( table ) method to abstract this annoying implementation details for us.



<hr>


So, back to getPrefixedColumns, it should always ensure that ric fields are present.
If we listed all fields of a given table, we would have them, but since we do the 
"get preferred foreign key column replacement", some columns might be taken away,
and some of those MIGHT be part of the ric fields (that's why the getPrefixedColumns method to put them back for us)



getSqlQuery
----------------

Or even better, some method that returns the whole sql query (so computing the inner joins for us);
but as a kit rather than a whole, since we might need to split it, depending on our auto-admin system,
so ideally something like this:

- array     getSqlQuery ( table )

The returned array would contain two entries: fields and query.

And so getSqlQuery ( concours )

would return the following array:

- 0:
    - concours.id
    - equipe.nom
    - concours.titre
    - concours.url_photo
    - concours.url_video
    - concours.date_debut
    - concours.date_fin
    - concours.lots
    - concours.reglement
    - concours.description    
- 1:
    - inner join equipe on equipe.id=concours.equipe_id
    
    
Ok, nice, except that this was only a trivial example with a nice foreign key.
In real life, we might have nullable foreign keys.
I once stumbled upon that case, and doing inner joins on those nullable foreign keys didn't work so well.

Actually, the table I'm talking about is in the zilu schema: commande_has_article.

I figured out that the working sql query was basically the following:

```txt


select
    c.id,
    c.commande_id,
    co.reference as commande_reference,
    c.article_id,
    a.reference_lf as article_reference_lf,
    c.container_id,
    con.nom as container_nom,
    c.fournisseur_id,
    f.nom as fournisseur_nom,
    c.sav_id,
    s.fournisseur as sav_fournisseur,
    c.commande_ligne_statut_id,
    com.nom as commande_ligne_statut_nom,
    c.prix_override,
    c.date_estimee,
    c.quantite,
    c.unit


from zilu.commande_has_article c
inner join zilu.article a on a.id=c.article_id
inner join zilu.commande co on co.id=c.commande_id
inner join zilu.commande_ligne_statut com on com.id=c.commande_ligne_statut_id
inner join zilu.fournisseur f on f.id=c.fournisseur_id
left join zilu.container con on con.id=c.container_id
left join zilu.sav s on s.id=c.sav_id
    
```

So, basically using left join instead of inner join on nullable foreign keys, and putting the 
left join at the end, after the inner join.

I know, that's imprecise explanations, right? That's because my skills in mysql are very limited,
and as for now I don't have the time to dig deeper, but this is a very interesting topic, so it's open
to evolution...

But for now, I will use this strategy of using of "left join at the end".

So, basically the getSqlQuery will take care of all that for us, and thus drastically reducing
the amount of work to generate a simple sql query for every given tables of the chosen databases.




joins
----------------

Basically, each foreign key in a table will generate a join, which can be either of type left or type inner,
depending on whether or not the foreign key is nullable or not (respectively).







Generating the menu
=====================

I don't know your auto-admin system yet, but I bet it has a menu where you can select a table in particular.

So, I provide a createMenu() method, that you will override, which basically receives the 
sets of tables as argument, organized by databases.

As I said earlier, I strongly recommend to use the translation mechanism of your application
to then translate those menu labels into any language you want.

So, it doesn't matter if the createMenu method doesn't provide human readable 
labels out of the box.






Generating forms
=====================
2017-05-09


Pehaps the most important question which comes in mind when generating forms is:

- what control type should I use for this table field?


I believe the user (of the crud generator) should always have the last word,
so we are going to create a simple map representing the type for every columns of every table
that we want to know about.

So basically, we will have a big file (or one per database) containing such content (imaginary example):

- table_one:
    - id: auto_increment
    - name: input
    - age: input
    - description: textarea
    - photo: upload
    - car_id: selectForeignKey:car.id


The benefit of this technique is that the user can change the default type chosen by the generator easily.
The drawback is that she needs to learn a syntax (and I need to create it).
 
So once this list is generated, the goal is to call the generator again against that list, and it will generate
all the form for us.


In other words, we split the work in two parts:

- defining the control types
- generating the controls in the application



Defining the control types
-----------------------------

So wat syntax are we going to use?

Well, meet skinny, the name of the syntax we are going to use.
(my first idea was CTDLFFG, control type description language for form generators, but
then I change for skinny because nobody would remember CTDLFFG).


Skinny
----------
The available types are:

- auto_increment: this one maybe is obsolete because an auto-incremented field is not likely to become something else,
                and generators usually know how to handle them.
                But just in case.
- input: indicate the generator that we want a default input text html tag.
            This type might be generated for fields of type varchar.
- textarea: indicate the generator that we want a textarea.    
            This type might be suitable for fields of type text.
- upload: indicate the generator that we want a file tag, or possibly an ajax drop files thing.
            We can let the user put this type manually, or maybe detect if the column name contains expressions like photo, image, avatar, ...
            This type might require extraneous parameters, depending on the concrete implementation.
            How to add parameters is explained below in the next section.
- date: indicate the generator that we want a date.
            This type might be generated for fields of type date.
            Parameters:
                - nullable (0|1): whether or not the field is nullable.
            
- datetime: indicate the generator that we want a datetime 
            This type might be generated for fields of type datetime.
            Parameters:
                - nullable (0|1): whether or not the field is nullable.            
- selectForeignKey: indicate the generator that we want a select, or an autocomplete, depending on the estimated
            number of items.
            A select is preferable when there are few choices, since the user doesn't have to GUESS,
            while an autocomplete becomes the only recommended choice if there are more than x items (I personally 
            like to set the threshold at 365 items for poetic reasons), since too much items on a select would
            totally slow down the browser and put it on its knees (try a select with 10000 items and see for yourself).
            Again, parameters will probably be required.

            Parameters:
                - nullable (0|1): whether or not the field is nullable.            

That's all for now.
You might want to add your own types, but those work fine for me.
            
            
### Parameters:

We shall be able to add some parameters to any of those types.
To add parameters, simply put the parameters list after the type, separating them with the plus (+) symbol.

A parameter is composed of a name followed by a value, both separated by an equal (=) symbol.

There is no escape mechanism so far (because I'm lazy and I believe we don't need it).

There might be one later if necessary.
(note, we can think of doubling the plus and the equal before implementing an escaping system)

Example:

The upload type might require a path identifier.

- upload+path=/bla/bla

Also, the selectForeignKey might requires a sql query as the first parameter, and a string formatter as the second parameter.

- selectForeignKey+query=select id, label from articles+format={id}. {label}



So that's it.



I suggest skinny types are stored in a php file under your application store directory.

One file per database, so for instance in NullosAdmin (the current project I'm working on):
 
```txt 
- app/store/AutoAdmin/skinny-types/
----- auto/
--------- database1.php
--------- database2.php
----- manual/
--------- database2.php
----- ...
``` 

If the manual version (manual directory) exists, it should be used, 
otherwise your system should fallback to the auto version.

And so, the generator should only generate the auto versions, and let the user create the manual versions 
at her own pace.


And the content of database1.php would look like this:

```php
<?php

$types = [
    "table1" => [
        'column1' => 'input',    
        'column2' => 'input',    
        //...    
    ],
    //...    
];

```









            
            
            
                







