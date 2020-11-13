Duelist
==============
2019-08-23 -> 2020-08-20


Table of Contents
=================

* [The base sql query](#the-base-sql-query)
* [The developer injections](#the-developer-injections)
* [The user injections](#the-user-injections)
 * [Variables](#variables)
 * [Inner markers](#inner-markers)
* [The limit setting](#the-limit-setting)
* [Options](#options)
* [Routines](#routines)
* [Csrf token](#csrf-token)
 * [The operator_and_value routine](#the-operator_and_value-routine)
* [Building the where expression](#building-the-where-expression)
* [Ric](#ric)
* [Dynamic injection](#dynamic-injection)





Duelist is the idea of implementing a gui list system created by both a developer and an user.


The two main actors are the developer and the user.
The developer is trusted, the user is not.


The developer basically writes the sql query, and allow the user to interact with it, in a way that doesn't 
compromise the security of the application (i.e. sql injection or other sql query based attacks).


The developer starts by writing a so called **request declaration**, usually stored in a file 
in [babyYaml](https://github.com/lingtalfi/BabyYaml) format (which is in fact nothing more than a big configuration array).


The request declaration is composed of various settings, which we will explore in this document.

We can conceptually divide the request declaration settings in sections:

- base sql query 
- user injections 
- limit setting 
- options
- routines
- csrf token




The base sql query
--------------
2019-08-23 -> 2020-08-20

This part is the safest part of the request declaration.
The user has almost no interaction with it.

The developer writes this section by using the following settings:

- table: the name of the table to interact with. 
            It can be followed by an alias (with exactly one space between the table and the alias).
            For instance, those are valid table values:
            - my_table 
            - my_table m
            - my_table my_alias
            
- ric: the row identifier columns array. 
            Unless you have specific needs, we suggest using the strict ric.
            See the ric section for more details.
- base_fields: the list of columns used in the sql request.
            Expressions with aliases are allowed if they use the AS keyword (case doesn't matter).
- ?base_joins: array|string. Each item being a join expression.
        Example: 
            - inner join user u on i.user_id=u.id 
- ?base_where: array|string. Each item being a "where" expression.
        Example:
            - user_id=3
            - and user_id=3
            
        Note that both examples above are possible, depending on what you where clause starts with (does it start with WHERE or WHERE 1 for instance).
        You're responsible for creating the full where clause; you have full control on the syntax.
        
- ?base_where_sep: string=and. A keyword to insert between the last "base_where" expression, and the first dynamic "where" expression injected by the user if any (see the user injection section below for more details).
    So the idea is that the developer can start a basic "where" clause with the **base_where** setting, but then
    the user can dynamically add to that "where expression".
    In order to keep the sql syntax valid though, a keyword such as **AND** or **OR** might be required between the base_where and the dynamic where expressions.
    Note: the base_where_sep is always padded with one space on each side, to smooth integration in the resulting where expression.


                    
- ?base_group_by: array|string. Each item being a "group_by" expression (without the "GROUP BY" keyword).
        Example:
            - first_name
- ?base_having: array|string. Each item being an "having" expression (without the "HAVING" keyword).
        Example:
            - nb_total > 12       
    
                
- ?base_order: array|string. Each item being an "order" expression (without the "ORDER BY" keyword).
        Example:
            - first_name asc




The developer injections
------------
2020-08-20


This is a dynamic variable replacement mechanism for the developer.


Since the **request declaration** is usually stored in a static file, the developer sometimes need to do some dynamic injections.

For instance, instead of writing this:

- base_where: un.lud_user_id=2

The developer might want to use a more dynamic notation, like this:

- base_where: un.lud_user_id=${userId}


The notation is: ${variableName}.


Note that developer injections and user injections use different notations, to really separate them, for security reasons (a user
shall never be able to overwrite what a developer wrote).


Developer injections are currently only possible in the following settings:

- base_where



### Providing developer variables
2020-08-20

We offer the **developer_variables** setting in the **request declaration**, as a mean to provide those developer variables.

The **developer_variables** setting accept the [Light execute notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md),
and shall return either:

- an array of variables
- a DeveloperVariableProviderInterface instance





The user injections
--------------
2019-08-23 -> 2019-10-10

The developer can also allow users to inject data to build a more dynamic sql request.
The settings (i.e. sections) where the user has potential interaction are:


- where
- order
- limit


Each of those settings is an array of tags, or more precisely an array of **tagName** => **tagExpression**.
Here are a few examples of what tags look like in the request declaration.

Example #1:

```yaml
order:
    col_order: last_name desc
```

Example #2:

```yaml
order:
    col_order: $column $direction
```

Example #3:

```yaml
order:
    col_order: first_name asc
    another_col_order_tag: last_name $direction
    yet_another_col_order_tag: $column $any_variable
```


Example #4:

```yaml
where:
    where_global: <
        id like :%expression% or
        identifier like :%expression% or
        pseudo like :%expression% 
    >
    where_generic: $column $operator :$operator_value
```



A tag basically represents the data provided by the user.
The developer consciously injects the tags into his sql request.

The **tagName** is just an arbitrary string chosen by the developer to identify the tag.

The **tagExpression** is a string which will ultimately be converted to a fragment of the sql query.
Hence, the **tagExpression** deserves a lot of attention.

The **tagExpression** can be written entirely by the developer, or the developer can allow some user injection.

When the **tagExpression** is written entirely by the developer, all the user can do is activate the tag (i.e. like a on/off button).
When the developer allows user injection, this is a totally different beast.

User injection in tag expressions is brought by special notation:

- the variables 
- the inner markers


### Variables
2019-08-23 -> 2019-10-10

A variable is a string starting with the dollar symbol ($).
When a variable is written, it is expected that the user also provides a value for it, otherwise the request should be rejected, unless
the implementor provides a default value for it.

This value can be constrained by the developer (personal note: no implementation yet). 

Also, there are some reserved variable names, which basically trigger automatically checked constraints:

- $column: check that this variable is one of the fields defined with the **base_fields** setting
- $direction: check that this variable is either asc or desc
- $operator: check that this variable is an operator defined in the [open admin table protocol operators](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md)
- $page: converts the variable to an int. 
- $page_length: converts the variable to an int. The "all" special value means: no pagination at all (i.e. there is only one page with all the rows in it)

If the check fails, the request is rejected.



#### Special variables treatment

In addition to that, some variables have an extra special treatment.

##### $column

The $column variable is replaced by a value based on the ones defined in the **base_fields** property:
        - if the corresponding base field doesn't use an alias, the $column variable is replaced by the column name
        - if the corresponding base field uses an alias, the $column variable is replaced by the column expression before the alias
        
So for instance if the base_fields contains those two entries:

- concat(user_id, '. ', u.pseudo) as user_id
- the_date

Then if a $column variable is passed and equals "the_date", it will be left unchanged (or replaced with the_date). 
But if that $column variable is equal to "user_id", it will be replaced with concat(user_id, '. ', u.pseudo).

This gives us more (notation) power when creating (relatively more involved) where expressions. 
 










### Inner markers
2019-08-23 -> 2019-10-10

An **inner marker** is a string starting with the colon symbol (:), and has the following notation:

- inner marker notation: {colon} {percentPrefix}? {markerName} {percentSuffix}?

An **inner marker** is used like a standard sql marker, the only difference is that it has an extended notation.

Examples of inner markers:

- where name = :name
- where name like :name
- where name like :%name%
- where name like :%name
- where name like :name%

Inner marker are ultimately converted to standard sql markers before executing the request, but in the meantime they allow 
the developer to specify which flavour of the "LIKE" keyword he wants.

It's a syntactic sugar if you will.


When an **inner marker** is written, it is expected that the user will bring the corresponding data, otherwise the request should be rejected.



The limit setting
------------
2019-08-23 -> 2019-10-10

The **limit** setting is special, because it's simpler than the other sql clauses.
The limit setting is a simple array with two entries:

- page
- ?page_length

The developer can allow user injection using the **$page** reserved variable.


Example #1:

```yaml
limit:
    page: $page
    page_length: 10
```

Example #2, showing all results (i.e. no pagination):

```yaml
limit:
    page: 1 
```

As long as **page_length** is not set, the page will be forced to 1.





Options
--------
2019-08-23 -> 2019-10-10

The duelist conception so far is quite straightforward.
However it might not handle all the problems we will be facing when writing gui lists.

The **options** are basically a mean to compensate those lacks.

So, it's extendable, as new problems might come with time.
Implementors of the duelist idea can also extend this array as they want.


The base **options** are:


- **sql_like_percent_char**: the default char used to represent the default percent sql wildcard. Note: this should be synced with your sql configuration. 
- **sql_like_underscore_char**: the default char used to represent the default underscore sql wildcard. Note: this should be synced with your sql configuration.
- **tag_options**: array of **tagName** => **thisTagOptions**. 
        With **thisTagOptions**: 
            - **escape_percent**: bool=true. Whether to escape the percent symbol in the user provided data for this group.  
            - **escape_underscore**: bool=true. Whether to escape the underscore symbol in the user provided data for this group.  
            - **operator_and_value**: array. A routine. See the routines section for more info.  
            - **operators**: array. The available operators. By default, the one defined in the [open admin protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md) are used.
            - **where_repeat_operator**: string=AND. The **where repeat operator**.
                        See the "where groups" section below for more details.        




Routines
----------
2019-08-23 -> 2019-10-10

So as we said, options are here to resolve problems.
But sometimes, we need more code to solve a problem.

So, the routines are like the tools of the options, the macros that some options can resort to if they need to.

When an option invokes a routine, it also provides the initialization parameters that goes along with it.


The available routines are:

- operator_and_value 



Csrf token
--------------
2019-08-23 -> 2019-10-10

As duelist was meant to be invoked from an ajax service, it's naturally vulnerable to csrf attacks.
The csrf_token option allows us to secure the ajax service.

It's an array or null. An example is this:

```yaml
csrf_token:
    name: realist-request
    value: REALIST(Light_Kit_Admin, csrf_token, realist-request)
```

If the value is null, or if the **csrf_token** key doesn't exist in the **requestDeclaration** array,
then no csrf check will be performed (not recommended).

If it's an array, it must contain the following entries:

- name: the name of the csrf token to validate against
- value: the value of the token. Note: in the above example I used the [dynamic injection](#dynamic-injection) notation
    to generate the csrf token value on the fly (rather than using a hard-coded value).
    

Usually, the name "realist-request" is used for a token used to protect a realist/duelist request.    













### The operator_and_value routine
2019-08-23 -> 2019-10-10

This routine transforms some special inner markers in a **tagExpression**.

Setup: your **tagExpression** must contain an **$operator** variable and an **:operator_value** inner marker.

Then this routine will basically update the where expression fragment based on the value of the **$operator**
variable and the value of the **:operator_value** inner marker.


Here are the list of things that this routine does, depending on the **$operator** variable value:

- if the **$operator** is a flavour of like (like, %like%, %like or like%), then the **:operator_value**
    inner marker will be updated accordingly (:operator_value, :%operator_value, :%operator_value or :operator_value%)
    
- if the **$operator** is **in** or **not_in**, the **:operator_value** variable provided by the user should be an array or a comma separated
    list of values, and the expression will be transformed to a sql injection safe statement like this:
        - IN ( :tag1, :tag2, :tag3, ... )
        
        Note: if the user provides a list of comma separated elements, white space is not
        important. The comma must be protected with quotes if it has a literal meaning.
        
        
- if the **$operator** is **between** (or **not_between**), the **:operator_value** variable provided by the user should be an array of 
    two elements, or a comma separated list of two values (with quote protection for the comma if necessary).
        The expression will be transformed to a sql injection safe statement like this:
        - BETWEEN :tag1 AND :tag2
        
- if the **$operator** is **null** (or **is_not_null**), the **:operator_value** variable provided by the user (if any) will be turned down.
        The expression will be transformed to a sql injection safe statement like this:
        - IS NULL
        - IS NOT NULL
        
         
    
    
    

It's configuration array takes two arguments

- source: the name of the variable (operator in our example)
- target: the name of the inner marker to update (operator_value in our example)


Note: the target should be declared without any flavour (i.e. don't use the percent symbol in the target,
because it will be added automatically by the routine if necessary).



 
Building the where expression
=======================
2019-08-23 -> 2019-10-10

The where expression is sometimes the result of combining multiple tags together.
While the developer is responsible for creating the tags, the gui is responsible for providing the tags in
the right order, producing a valid sql query.

Note: an attacker might corrupt the order in which tags are provided, thus resulting the execution
of an invalid sql query. However, I considered this case and thought it wasn't a big deal (the attacker
can't perform sql injection), is it?



Ric
==========
2019-09-03 


See the official [ric definition](https://github.com/lingtalfi/NotationFan/blob/master/ric.md).

     


Dynamic injection
=============
2019-09-19 


Dynamic injection is basically the duelist way of allowing dynamic variables into the (otherwise static) configuration array.

It allows this kind of syntax:

```yaml
csrf_token:
    name: realist-request
    value: REALIST(Light_Realist, csrf_token, realist-request)
```

See more details in the [duelist conceptions notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist-conception-notes.md#dynamic-injection).

Now the **Light_Realist** plugin comes with its own dynamic injection handler, which exposes the following actions

- csrf_token
- route

In **Light_Realist**, the action is the second argument of the dynamic injection call.
 


The csrf_token action
----------
2019-09-19 


The **csrf_token** action basically creates a token with the name given in the third argument, but only if it's not an ajax page (the router defines
whether the page is an ajax page).

If the page is an ajax page, then the csrf token will not be created.

To understand why, we need to understand that the duelist idea fits in the larger idea that is the [realist idea](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md),
which has two sides: a main side (displaying the regular page) and an ajax side (the backend server).

in **Light_Realist**, by design, the request declaration array is used by both sides.

The creation of a csrf token is created on the main side, and that's how we provide the token value to the js tools accompanying realist. 

Those js tools then send the csrf token via ajax to the backend server which needs to check the csrf token value.
This backend service also needs to access the request declaration array. But if it were re-interpreting the dynamic injection tags, it would create
a new csrf token value, and the csrf token validation would fail. 

You see, the csrf token dynamic injection tag was very active and dangerous: it created a csrf token every time you called it. Not something to take lightly.
That's why I had to reduce its power by preventing it to create a token on the ajax side, so that the csrf validation could be done.



The route action
----------
2019-09-19 


The **route** action is straightforward: it returns the url of the given route.

Example:

```yaml
params:
    url: REALIST(Light_Realist, route, lah_route-ajax_handler)
```




 
 

