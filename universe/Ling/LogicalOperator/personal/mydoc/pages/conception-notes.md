Logical operator, conception notes
==========
2021-03-25




In this planet, **logical operators** refer to the following:


- || 
- &&
- ( 
- )



Logical operator expression evaluator
---------
2021-03-25


The **expression evaluator** util can resolve an expression made of **logical operators** and **expression aliases** to a bool.


So for instance, let's say we have the following expression:


- ( a || b ) && ( c )


In the above example, the **expression aliases** are:

- a
- b
- c


The other symbols are the **logical operators**.

An **expression alias** is an alias to a php callable which resolves to a bool.

So let's say that they resolve like this:

- a: true
- b: false
- c: true

Then the expression will translate to: 

- ( true || false ) && ( true )

which resolves to true.

