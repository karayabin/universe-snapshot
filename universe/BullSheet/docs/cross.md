Cross
==========
2016-02-14





Abstract explanations
-------------------------

Cross technique allows you to populate the middle (has) table in a  many to many relationship.

For instance, if you have a table users, a table products, and a table users_has_products,
then you can use the cross technique to populate the users_has_products table.



In order to perform the cross technique, you need a few parameters:

- the name of the left table (users)
- the name of the right table (products)
- the maximum proportion (in percent) of the left table that you want to cross
- the maximum proportion (in percent) of the right table that you want to cross



Then you also need to provide an insert callback.
The insert callback has the following signature:

    void        function ( array:leftRow, array:rightRow )

It is responsible for inserting the data in the middle table.


### How many times will your callback be called?

Let A be the number of rows for the left table  and B be the number of rows for the right table.
Those numbers are computed based on the maximum proportion parameters that you gave.

So your callback will be called a maximum of A x B times.


Why is that number a maximum only and not an exact number?
That's because there are other parameters that you can use, called weights.
See the weights section for more information.



### Weights

A weight can filter a selection of rows by adding probability coefficient on some columns.
 
The idea is this.
You want to cross the users table with the products table.
But in the products table, you have a column named type, which can take 3 values: 1, 2 or 3.

And you want that most of the products inserted in the users_has_products are bound to products of type 2.

Well, with the weights, you can do that: you can influence the selected rows of either the left or right table.
 
You would give coefficients to the different values that type can have, for instance:
 
 
``` 
type:
    1 => 1,
    2 => 8, 
    3 => 1,
``` 

This would mean that on 10 tries, you would have 1 row with type=1, 8 rows with type=2, and 1 row with type=1 (statistically).


#### Implementation specific details

Since you have two sides in a cross join, you need to specify the side to which the weights are applied.
So the actual array of weights (fourth argument of the addTable method) looks like this:

```php
[
    left: [
        type: [
            1 => 1,
            2 => 8, 
            3 => 1,        
        ],
        ...
    ],
    right: [
        ...
    ],
]
```




### Notation



```
cross notation: "cross:" <leftTable> ";" <leftProportion> ";" <rightTable> ";" <rightProportion> 

```

- cross:users;100;products;5
- cross:users;90.578;products;7

A proportion accepts a maximum of 3 decimals.
The separator for decimals is the dot.



The weight argument




Technical explanations
-------------------------

Read the abstract explanations first.

In terms of code, the difference between using weights and not using weights is dramatic.


Not using weights, our selection is executed with one straightforward statement.
For instance, if our selection width was 122 rows, a statement like the following would be executed.


```
select * from table order by rand() limit 122;
```


Using weights, the same selection would look like this:
 
```
for ( i=0; i<122; i++ ):
    whereCond = resolveProbability(); // type=2, or type=1, or type=3, this number is refreshed on every iteration
    select * from table where whereCond order by rand() limit 1;
endfor;
``` 


But if you compare the two algorithms (with and without weight) and look closely, beside the performances, 
there is a difference between the results that you obtain.
 
The first algorithm, without weight, return 122 different numbers,
while the second algorithm as shown in the example would return 122 times a random number, which means that 
there is a risk of overlapping that does not exist with the first algorithm.



So to deal with that, the actual implementation does a few extra steps in the background, so that both algorithm 
don't have an overlapping risk.


