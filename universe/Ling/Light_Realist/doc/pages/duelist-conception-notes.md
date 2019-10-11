Duelist conception notes
==============
2019-08-27



Combining where techniques
----------------

(deprecated as of 2019-10-10, see the "Let gui drive" section later in this document)

Combining the where clause can be a non-trivial task.

And so we dedicate this whole section to help the implementor doing this task.
We will also provide some options that the implementor might want to use.

 
The goal of this unit is to return a where fragment.

A where fragment is an expression that can be appended to a sql query after a "where 0" expression, 
in order to produce a valid sql query.


In other words, a where fragment is such as the following sql query is valid:

- select * from user where 0 {whereFragment}


To understand some potential difficulties that the implementor might have, let's imagine this scenario
where the user changes a neck filter (a sub filter below the column head in an admin table) while
having a global search already configured.
And let's say that the developer wants to use the neck filter part as a subfilter of the global search query.

In other words, he wants a sql query which looks like this:

- select * from user where 0 or {globalSearchQuery} and {neckFilterQuery}

With:
- globalSearchQuery being something like this for instance:
        id like :expression or pseudo like :expression or email like :expression
- neckFilterQuery being something like this for instance:
        age < 42 and email like :email
        

Another thing to consider: the neck filters can be used in a stand alone mode, or combined 
with other tags, as it's the case in the example above (the neck filter tags are combined with the global search tags). 


Yet another thing to consider is that the developer can write his request declaration by splitting the where
expression by columns, creating one tag per column, like this for instance:

- where_id_equals: id = :expression
- where_pseudo_like: pseudo like :%expression%
- where_first_name_like: first_name like :%expression%
 
 
                 
I tried to find a unique solution that would handle all the use cases, but I couldn't (damn).
So, instead I propose the concept of modes.

Each mode basically provides the tools for a particular problem.

The modes I've come across so far are:

- groups


Note that in order to use a mode, one must first define it in the options, using the **options.where.mode** option.

If the developer doesn't use a mode, we basically combine the where by concatenating them using the default keyword
defined by **options.where.defaultOperator** option, which implicitly defaults to AND.

So this means that if you don't use any mode, and you provide two where tags {tagA} and {tagB}, then the resulting
sql expression will be:

- WHERE 0 OR ( {expressionForTagA} AND {expressionForTagB} ) 


Groups (where mode)  
--------

(deprecated as of 2019-10-10, see the "Let gui drive" section later in this document)

This is a concrete use for tag groups.


Context:
The user can send the same tag multiple times, with different variable values.
This is the case for instance when trying to implement an advanced search, with the following
where declaration item:

- $column $operator :operator_value

What's a group now?

Each where declaration item leads to a group.
If the where declaration item is not repeated, it will be a group of one item.
If the where declaration item is repeated, all items will combine together to create a so-called group.


Items combine with themselves using a keyword: either OR or AND.
We provide the **tag_group_options.$tagGroupName.where_repeat_operator** option for that, which defaults to "AND".


Now how groups are combined?

We provide a mask, which looks like this:

- {tagGroupOne} OR {tagGroupTwo}

The result of a mask is inserted in a **WHERE 0 OR ()** scheme,
which means that the aforementioned mask would be inserted like this in the final sql query:

- WHERE 0 OR ( {tagGroupOne} OR {tagGroupTwo} )


And to set a mask, we need to list all its participant in an array.

This is done via the **where.masks** option.

So for instance we would do this:

```yaml
where:
    mode: groups
    masks:
        -
            participants:
                - tagGroupOne
                - tagGroupTwo
            mask: {tagGroupOne} OR {tagGroupTwo}
        - ...
                
```


So, in the masks array, you would list all possible combinations of where groups.
Note: don't list the stand alone where groups, because they don't cause problems (i.e. we insert them directly
in the where clause).

This technique assumes that you don't have too much participants (about 2 or 3), 
otherwise the declaration would be too verbose.
But still, it can have its use in specific situations, such as an open admin table implementation with generic tags.

The **groups** mode, although "hard" to configure, gives us total flexibility whereas combining where groups together.

That's why I chose it (I tried another lighter implementation just before, but it didn't have as much flexibility).


Conclusive blabla: So, I'm not 100% satisfied with the groups mode, but if it can help the implementor, good for him.
The good part is that it's just a mode, so no big deal if it's not optimal, just create another one later
when you have a better conception. 




   
Flexible advanced search
================
2019-08-28

As for now, the advanced search functionality is pretty poor: the "lines" are combined using the AND keyword,
and that's it.

Not very flexible if you ask me. What was I thinking (probably I had other issues at the moment, so I couldn't focus
on that).

I still have a lot of code to write, but I've thought 2sec about how we could extend this advanced search form system
so that it would become flexible.

First, we need some super gui, which basically introduces another field per line: the combination_operator.

A combination operator is any string that helps you combining the where fragments.
Usually, it's one of:

- OR
- AND
- AND (
- OR (
- )
- (
- ) OR (
- ) AND (
- ... you get the idea


Then, we would have a flexible_advanced_search tag:

- flexible_advanced_search: $combination_operator $column $operator :operator_value

Then a routine that handles the job. Note: the routine might need to spot and fix potential sql syntax errors,
unless the super gui does that for us (would be better actually).

So those are my two cents about the future implementation of the flexible advanced search.  
 



 
Dynamic injection
-------------------
2019-09-19


So basically, the duelist uses a configuration array.

```yaml
fruits:
    a: apple
    b: banana
    c: cherry
sports:
    - judo
    - karate
    - kungfu
```

Dynamic injection allows us to replace the content of a configuration value dynamically, by using the REALIST(args) notation,
where args is a comma separated list of arguments, using smart code notation (https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md).

The first argument is the identifier of the handler of the function (owned by a plugin who registered the handler in advance), 
and the rest of the arguments will be passed to the handler.

Because there are many plugins, I opted that a handler is an object rather than just a callable, the idea being that each plugin provides
only one handler that handles all the use cases for that plugin.

I provide a **RealistDynamicInjectionHandlerInterface** for that purpose.


So for instance if the plugin **MyPlugin** registers a realist dynamic injection handler with identifier **MyPlugin**,
we can imagine that this array:



```yaml
fruits:
    a: apple
    b: REALIST(MyPlugin, sayWord, hello )
    c: cherry
sports:
    - judo
    - karate
    - kungfu
```

Would be converted by the realist tools to:

```yaml
fruits:
    a: apple
    b: hello
    c: cherry
sports:
    - judo
    - karate
    - kungfu
```


All registrations of realist dynamic injection handlers is done via the realist service.
 
The result of a handler doesn't have to be a string, it could be an array, an object, an int, anything.

If the handler returns a "stringable" result, then we can embed the handler call in a bigger string.

For instance, we can do this:

```yaml
fruits:
    b: My name is REALIST(MyPlugin, sayWord, paul )
```

This would give us:

```yaml
fruits:
    b: My name is paul
```



Let the gui drive
---------------------
2019-10-10

All the previous attempts to create a "where" statement were non trivial tasks.
The main problem with the masks technique is that it's not suited for complex "where" statements
involving more than 2 or 3 tags. 

However, in the process of implementing an advanced search system, I just found out that in the context of the
system I wanted to create, all "where" possibilities can be created using 5 tags:

- generic_filter: $column $operator :operator_value
- open_parenthesis: (
- close_parenthesis: )
- and: and
- or: or


Now 5 tags is more than 2 or 3, and so the masks system is not good enough for this case, so I need to replace
the masks system with something better.

The simplest solution occurred to me as being to let the gui drive and provide the tags in the correct order.
This solves all the problems.

The cost to pay is that we let the user provide the order in which tags are provided.
In other words, we trust that he will provide the tags in the correct order.

In other words, an attacker can change that order and provoke the request to fail (by providing tags in 
an order that doesn't make any sql sense). 

I thought about that, and decided that it was worth it still: I believe it's not too big of a deal if the 
attacker can trigger a sql request to fail (maybe I'm wrong?); as long as he cannot perform sql injection
he doesn't have much power. 






 




         


  


