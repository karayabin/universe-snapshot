ParametrizedSqlQuery
======================
2019-08-12


This is a work in progress.



The parametrizedSqlQuery originates from a project originally called Realist, which ended up in the
[Light_Realist](https://github.com/lingtalfi/Light_Realist) repository (which might not yet be publicly available at the moment
you read those lines).


The main goal of this planet is to let external parameters (often coming from a gui) govern the creation
of the sql query, while still having the sql query written in a single location (so that the developer
doesn't have a hard time debugging).
Note: the developer would ideally have a config folder where all her parametrized requests will be (so that she doesn't 
need to open php class files to understand the code). It's all centralized.




And so for the developer's comfort we recommend using [babyYaml](https://github.com/lingtalfi/BabyYaml) files,
that's what I'll be using in this document to write my examples if I need to.



However, this planet doesn't care, it just wants an array called the **request declaration**, 
which represents the parametrized request.

Sql query structure reminder
-----------------
A regular **select** sql query consists of different parts, which order is important.
The parts are the following (in order):
(Note, I refer to mysql documentation, not 100% sure if this applies to sql in general)


- select clause
- from clause, including joins
- where
- group by
- having
- order by
- limit



Request declaration
-----------

The **request declaration** is an array with the following structure, which more or less corresponds to the
sql select structure above.

The request declaration use the concept of tag.
A tag is basically a like a token that an external actor (i.e. the gui) gives to us, and we do something about it (i.e. we 
modify the sql request accordingly).

Using tags allow us to have complete control on the sql request being generated, whilst providing the external actors
with a mean to trigger certain parts of the sql request.
 
When an external actor provides a tag, he generally needs to provide some accompanying parameters too.
So the couple tag/parameters is treated by this tool, each tag activating certain parts of the parametrized sql request below.



 

The structure of the **request declaration** (aka parametrized request) is basically divided in two parts:

- the base request (written by the developer, it uses the parameters starting with the "base_" prefix, and is considered safe)
- the tags parts. Tags come from the user (i.e. not trusted). Tags activate the parts of the query allowed by the developer when creating
        the request declaration. The developer can allow the user of variables for certain tags.
        In that case, the variable is always required (i.e. if the client doesn't provide it we trigger an error).
        The tag parts are categorized by the name of the of the sql query part they are related to (joins, where, group_by, having,
        order, all those are categories for tags).
        
        The limit section is special. It is used both by the developer and the tags.
        First, the developer decides whether or not this list uses pagination or not (i.e. no limit at all).
        If the developer doesn't allow pagination (by writing the limit section), then the tags won't be able to update
        this section.
        However, if the dev writes the limit section, he can decide whether or not tags are allowed by using/not using the $page
        and $page_length variables for the values of the page and the page_length (see the limit section below).
        If the dev doesn't use those variables, then tags cannot update this part of the query.
        If the dev use those variables, then tags can update this part of the query by using the "limit" tag (this is a fixed tag name,
        the only one of its kind).
        


Here is a basic sketch of the request declaration structure:


- table: string. The table to fetch data from, including its alias if you need it (in joins).
    Examples: 
        - user u 
        - employee 
                
- base_fields: string|array. The columns to add to the query.
    Examples:
        - e.last_name
        - count(*) as total
        - u.pseudo
        
- base_join: string|array. An array of join expressions to add to the query. 
    Examples:
        - join_animal: inner join animal a on a.user_id=u.id
        
- base_group_by: string|array. An array of group by expressions to add to the query. 
    Examples:
        - e.last_name
        
- base_order: string|array. An array of order expressions to add to the query. 
    Examples:
        - u.pseudo asc
        - total desc
        
- base_having: string|array. An array of having expressions to add to the query. 
    Examples:
        - total < 200
        
        
        
- joins: array. Array of tag => join expression. 
    Examples:
        - join_animal: inner join animal a on a.user_id=u.id  
        
- where: array. Array of tag => where expression fragment.

            By default, all where expression fragments will be combined using the OR logical operator, as usually wants
            to search for something, and the OR logical operator gives more results than its more restrictive AND companion.
            
            An expression fragment can be either a string or an array.
            If it's a string, the equal **=** comparison operator will be used.
            
    Examples:
        - where_animal_name: a.name = :animal   
        - where_animal_type: a.type = :animal_type   
        - where_animal_price_less_than: a.price <= :price   
        - where_animal_price_more_than: a.price >= :price   
        - where_my_complicated_macro: (a.price between :price_low and :price.high) AND a.name like :animal   



- group_by: array. Array of tag => group by expression.

    Examples:
        - group_by_animal_name: a.name
        - group_by_animal_name_and_type: a.name, a.type
        
        
- having: array. Array of tag => having expression.        

    Examples:
        - having_animal_count: nb_animals > 6
        - having_animal_count: nb_animals > :nb_animal
        
- order: array. Array of tag => order expression. Notice that order doesn't require any user parameter.        

    Examples:
        - order_animal_name_asc: a.name asc
        - order_animal_name_desc: a.name desc
        
- limit: array. The limit array has the following structure:

        - page: int|string, the number of the page to display. Or the special value $page, which means that 
                the value will be provided by the user. 
        - page_length: int|string, the number of items to display. Or the special value $page_length, which means that
                the value will be provided by the user.
        
        
        Notice that we inject the parameters directly into the limit expression.          

        Examples: 
            - limit:
                - page: $page
                - page_length: $page_length
                
                                
    
    
- options: array. Contains the extra parameters for this request declaration
    - ?wiring: array. This section is explained in more details below. 
    - ?default_limit_page: int=1. The default value to use for the (limit) $page variable, in case the dev used the $page variable and   
            the client didn't specify it. 
    - ?default_limit_page_length: int=20. The default value to use for the (limit) $page_length variable, in case the dev used 
            the $page_length variable and the client didn't specify it.  
    - tags_options: array of tagName => tag options
        $tag_name: 
            - escape_underscore: true (by default). Whether to escape the sql underscore wildcard char (_) in the user provided values.                                 
            - escape_percent: true (by default). Whether to escape the sql percent wildcard char (%) in the user provided values.
    - sql_like_underscore_char: _ (by default).                                 
    - sql_like_percent_char: % (by default). Note: this doesn't affect our internal marker notation, which always use the percent symbol.
    - routines:
        - tags: array. The name of the tags this routine applies to.
        - name: string, the name of the routine, which is a special predefined treatment provided by this class.
                The available routines are:
                - transform_if_like (see the options in the routines section below in this document)         
        - ...: the routine options, depending on the routine
                
                                                  




Variables and internal markers
------------

After the like keyword
-----------


Note: this system will only be able to write mostly static requests.
For more dynamic requests which requires more application logic, this whole ParametrizedSqlQuery system is not suitable,
and one should use a more dynamical solution.


Routines
----------

Sometimes, with tag replacing variables, we need to do things that the simple :marker notation doesn't allow.
In that case, we can always rely on routines to do whatever we want.

The available routines are:

- transform_if_like: this routine was designed as a workaround to the following problem:
    your where expression includes different markers (like the one below for instance:
        - where :column :operator :operator_value
    And one of the marker (:operator_value in this case) actually can have multiple forms, depending on the 
    value of the :operator marker.
    If :operator is equal to one of:
    - like        
    - %like%        
    - %like        
    - like%        
    - not_like        
    - %not_like%        
    - %not_like        
    - not_like%
    
    Then the :operator_value marker needs to be transformed accordingly.
    By the way, the list of operators that we use is the one defined in the 
    [realist's open admin table protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md).
    However, notice how long it is to write all those tags. We don't want that, so instead we use a routine
    that alleviates most of the job for us.
    
    So how does it work?
    This routine takes the following parameters:
    - source: the name of the marker we will monitor (without the colon prefix)  
    - target: the name of the marker to update in case the source marker is a like-ish operator  
        
    Simple as that.      
      
    Note: Now we could have assign this routine to a specific tag, but then we would have to repeat the routine settings
    for all tags. So instead, we rely on the marker name, as it's easy for the developer to change the
    marker names for all the markers he wants to use for a given routine.


 



What is the user allowed to update?
-------------

In a typical gui, the user is allowed to manipulate the following sections:

- where (or having?)
- order
- limit


That's it.
Which means the other sections might be triggered by a wiring element (if the request needs it).

The strange good news is that as I'm implementing this thing in parallel, I see no use for wiring so far.
And that's good, because wiring makes it more complex. I wish it could be like that until the end, we will see...

 
 
Variable replacement: the internal markers
---------------- 

So, the user is allowed to replace the variables where the developer has written them.
However, as developer we generally use want to use sql markers to avoid/limit sql injection.

So generally we will prefer to write this:

- good: where pseudo=:pseudo

Rather than this:

- bad: where pseudo='$pseudo'


And so in the context of our class, we are allowed to use what we called internal markers, which looks like the good 
syntax example:

- where pseudo=:pseudo

When the developer writes the ":pseudo" internal marker, this marker needs to be provided a concrete value by the user.
If the client (on the behalf of the user) doesn't provide the "pseudo" variable, this class will throw an exception.

In other words, we can just use internal markers as we would normally write our secure sql statement, but with the
guarantee that this internal marker will be replaced securely by an user provided value.


But wait, there is more.
Internal markers look very much like markers.

However, they are actually not exactly the same, and that's because we can use the auto-wrapping notation.



Auto wrapping
-----------------

An internal marker can represent a marker preceded with the sql "LIKE" keyword.
This keyword allows for the use of wildcards (which in mysql by defaults are _ and %).

The wildcards provided by mysql offer us a great deal of flexibility when searching a row in the table.
And so whether to leverage that flexibility in our app is up to us.

That's why we provide the auto-wrapping syntax, along with two (tag) options: escape_underscore and escape_percent (explanations in a second).
Armed with those tools, we have the maximum flexibility for crafting our requests.

Ok, but what are those tools?

The auto-wrapping syntax let us write internal markers like that:

- where pseudo = :pseudo
- where pseudo like :%pseudo%
- where pseudo like :%pseudo
- where pseudo like :pseudo%

In other words, we wrap the alphabetical part of the internal marker with the percent symbol (%), just as we would
wrap the variable inside a LIKE (in a sql query).

This wrapping will be translated to the sql query, as expected.
With this, the developer is in control of the search mode.

In addition to this, we have the escape_underscore and escape_percent options (tag_options).
Those do what you expect: they escape the underscore and/or percent chars in the value provided by the user.

So now with the auto-wrapping notation and the escape options, we can implement different behaviours.
For instance, if we want to create an advanced search form, we generally want to escape the values (we don't 
want the user to type those weird percent and underscore chars), we can simply let him choose the operator (
LIKE, or %LIKE%, or LIKE%, or %LIKE for instance) via a select, and the operator will decide what wrapping
we apply to the escaped user value.

On the other hands, if we take the neck filters of the [open admin table protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md),
we can decide what we want to do:

- either allow the user to use wildcards, in which case, we would not use auto-wrapping, and we would not escape the wildcards 
- or restrict the searching to a %LIKE% pattern (for instance), thus using the auto-wrapping notation, and escaping the wildcards 






The wiring section
------------------

This is a work in progress section (I'm having a hard time anticipate everything right now, I need more practise, 
so I will update this section as practise will tell me how to..., with time).
As long as you see this message, don't take the rest of this section seriously.


It turns out I don't need those features yet, but I might need them later.


The wiring section is special, it's not part of the sql request, however it tells the ParametrizedSqlQuery object
how to wire the request fragments together.
For instance, if the gui provides the where_animal_name parameter, we need to add the join_animal tag too.
Each parameter can **trigger** one or more other parameter. 
Further more, the expressions in the where section might require different parameters, and so we need to know which ones.
The wiring array basically solves all that.

It's an array of tagName => wiringDeclarations.
With wiringDeclarations being an array of sectionName => wiringSectionDeclaration
With:
- sectionName: the name of the section (base, joins, limit, ...) to operate on 
- wiringSectionDeclaration: array of tags (to trigger)



```yaml
# Wiring section
wiring:
    joins:
        where_animal_name: join_animal  // string|array (can require multiple joins)    
        where_animal_type: join_animal

    variables: # list of required variables
        where_animal_name: [animal]
        where_animal_type: [animal_type]
        where_my_complicated_macro: 
            - price_low
            - price_high
            - animal
        
```
                
Note to myself: the variables section should be an auto-detect.
The only parts that might have variables are:

- where       
- having

And the variables seem to always start with the colon.
Or use dollar if you believe other sections might use variables? or that where/having sections might use variables 
not prefixed with colons.

But I like the colon, because it's more sql readable.

       











Sources
--------

For group by reminder:
https://www.guru99.com/group-by.html

Group by more in depth:
https://www.youtube.com/watch?v=14qSQUpPoTQ


Samples used for testing:
https://dev.mysql.com/doc/employee/en/
 