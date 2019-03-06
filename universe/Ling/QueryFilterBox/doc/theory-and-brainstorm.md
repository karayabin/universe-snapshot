Theory and brainstorm
========================
2017-10-03




List theory
=====================

The description below provides some background and nomenclature for the upcoming discussions.

We always start with a pool of items, which I like to represent as an unorganized ensemble of marble balls.
I call those the **raw items**.


There are three operations that we can apply to that set, the order of operations is important:

- first, we cut (or filter) the items. This means we select a specific set of this ensemble. We obtain **cut items**.
- second, we sort the set (cut items). We obtain **sorted items**.
- last but not least, we slice (paginate) the items, and return the relevant slice (**paginated items**), which is 
        the final result of this process.
                    


Example
----------

An example would be marble a to z, in any order:

For instance
```txt
a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p
z, y, x, w, v, u, t, s, r, q.
```

### Cutting

We select a subset of the ensemble:
```txt
a, b, c, d, w, v, u, t
```

### Sorting

We sort the **cut items** from the previous operation (in this case by alphabetical order ascendant):

```txt
a, b, c, d, t, u, v, w
```

### Slicing

We slice the **sorted items** from the previous step (using a page length of 2 in this example)...


```txt
- page 1: a, b
- page 2: c, d
- page 3: t, u
- page 4: v, w
```

...and return the relevant slice (in this example the user asked for page 2):

```txt
c, d
```





QueryFilterBox brainstorm
===============================
Now that we agreed on how a list works, let's prototype this queryFilterBox system.

This is a system where the query is modified using queryFilterBox objects.

We have an ItemsGenerator responsible for generating the items.
The ItemsGenerator has the following methods:


```txt
ItemsGenerator
- setPool ( array pool )
- setFilterBox ( name, QueryFilterBox box )
- getItems ( )
```

The ItemsGenerator is also the conductor that orchestrates the relationship between the queryFilterBoxes and
the query (in a form of a Query object).


The relationships can be guessed by the signature of the QueryFilterBox and the Query:

(note: this is just a sketch, not the final implementation)
 
```txt
QueryFilterBox
- readPool ( array pool, array &usedPool )
- decorateQuery ( Query )

Query
- addJoin ( type=inner )
- addWhere 
- addOrder
```

The pool is the ensemble of variables available by the system.
The usedPool is the ensemble of variables used by the system.



Pagination
-------------
The pagination is handled by the ItemsGenerator alone: it doesn't require the queryFilterBoxes for that,
because paginating **sort items** is a stand alone operation which logic is well known and independent from
external factors.









