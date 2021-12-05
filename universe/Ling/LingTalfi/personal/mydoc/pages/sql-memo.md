Sql memo
==========
2021-07-05


This is a personal memo about sql.


Logical execution order
============
2021-07-05

https://www.youtube.com/watch?v=xTd1T2TxfOc


- from
- where
- group by
- having (just like where but applied on group by only)
- select
- distinct
- order by



Method for writing select queries
-------------
2021-07-05

- One: identify the data of interest
    1. from - which table does the data live in?
    2. where - which rows of data we care about?
    
- Two: specify aggregations, if any
    1. group by - combine multiple rows into one
    2. having - which aggregated rows of data do we care about?
    
- Three: return the result, sorted if desired
    5. select - which attributes to return in result?
    2. order by - how is the result set sorted?
    
    

implications of group by
---------
2021-07-05

- any attribute you want to output in the select clause must be guaranteed to have exactly one value for each group 
  
Rule: all expressions in phases executed after "group by" (i.e., having, select, order by) must guarantee to return
a single value (scalar) per group.


Why?
- once the GROUP BY phase executes, individual rows are not available to HAVING, SELECT, and ORDER BY clauses
- each group is ultimately represented by a single row in the final query
- hence, the expression must return a single scalar value per group
    - aggregate functions, such as SUM, AVG, MIN, MAX do this
    - specific columns, e.g., OrderAmount do not. They have multiple values per rows grouped by CustomerId group
    


Note that this behaviour can be overridden with the OVER() clause. (8:55)


Rule: if group by is used, all select list items must be contained in either:

- the group by clause
- an aggregate function (sum, min, ...)

why: because an aggregate function returns a single value per group.




aggregates
----------
2021-07-05


Rule: all aggregate except count(*) ignore nulls.



null values
---------
2021-07-05

https://www.youtube.com/watch?v=DZD0YGJowDs&list=PLzDhRwQSytx1TJ2Qxbk6CBEQtdN-oKYjD&index=3



Rules:

- all aggregate functions except count(*) ignore null
- distinct clause ignores null



Considering this data:

+--+-----+
|id|score|
+--+-----+
|1 |30   |
|2 |10   |
|3 |NULL |
|4 |10   |
|5 |10   |
+--+-----+


### 3-valued logic - true, false, unknown

Sql expressions can evaluate to one of three truth values:

- true
- false
- unknown

Two possible approaches to handle Unknown. Sql uses both:

- where and having clauses use "Accept True" principle.
    This means: accept only if true. Treat unknown as false.
- check clause of insert and update statements uses "Reject False".
    This means: reject only if false. Treat unknown as true (not covered in the tutorial).


Consider this bad query:



- select * from scores where score != null (instead of is not null)

Because null represents the absence of any value at all, the expression yields neither true nor false, but unknown.
Unknown in this case (where) is treated as false.
Hence, every row is rejected resulting in an empty table.






order by, distinct
-------
2021-07-05


Rule: order by elements don't need to be present in the select clause.
Exception: selected distinct.

Rule: distinct clause ignores null.

Rule: if select distinct is specified, order by items must appear in the select list.


Why?

Consider the following Orders table:

+-------+----------+----------+-----------+
|OrderId|CustomerId|OrderDate |OrderAmount|
+-------+----------+----------+-----------+
|1      |Amy       |2011-01-01|15         |
|2      |Amy       |2011-01-02|3          |
|3      |Amy       |2017-01-02|NULL       |
|4      |Bob       |2010-01-01|11         |
|5      |Bob       |2011-01-02|21         |
|6      |Bob       |2018-02-03|9          |
|500    |Cathy     |2000-01-01|16         |
|600    |David     |2000-01-01|100        |
+-------+----------+----------+-----------+

invalid query: 

select distinct CustomerId
from ORDERS
order by YEAR(OrderDate)

- a single result row may represent multiple source rows. Hence, ambiguity may exist as to which the multiple 
  YEAR(OrderDate) values in ORDER BY should be used to determine the CustomerId sequence in SELECT DISTINCT.
  
For example, should the CustomerId sequence in the output be:

1. David (2000), 2. Cathy (2000), 3. Amy (2011), 4. Bob (2018) or
1. David (2000), 2. Cathy (2000), 3. Bob (2010), 4. Amy (2011) or
...



where/having
--------
2021-07-05


Rule: the WHERE clause must not have an Aggregate such as count, sum, avg, min, max. The where clause filters
based on values of individual non-aggregate fields.

Rule: the having clause filters based on aggregate values for each group (e.g., sum, avg, min, max count), and/or 
the group by attribute.





sub queries
--------
2021-07-05

https://www.youtube.com/watch?v=gQCMp2K_yDI


sub query aka nested query.

- queries must be enclosed within parenthesis
- order by can not be used in inner query


- select at1, at2, ... (select ...)


Performances:

- if the inner query returns a few records, it's more efficient than a cross product
- if the inner query returns only one record (ex: mId=x), then a sub-query is good
- if it returns more than one record, set comparators (i.e., IN, ANY, ALL) are more appropriate


set comparators
-------
2021-07-05

https://www.youtube.com/watch?v=O1KVzYHCKDo

- in: equal to any member in the list
- any: compare value to each value in the list
- all: compare value to every value in the list


compare means <, >, =.



joins
---------
2021-07-05

https://www.youtube.com/watch?v=6B8SxF6E99A&list=PLzDhRwQSytx1TJ2Qxbk6CBEQtdN-oKYjD&index=5


Three fundamental join types: cross, inner, outer.


                     |  executes this logical phase...
---------------------+---------------------------------+-------------------------------------+----------------------------------------+
This join type...    |   cartesian (or cross) product  | filter rows using the ON criteria   |   add outer rows from preserved table  |
---------------------+---------------------------------+-------------------------------------+----------------------------------------+
cross join           |          yes                    |            no                       |          no                            |
---------------------+---------------------------------+-------------------------------------+----------------------------------------+
inner join           |          yes                    |            yes                      |          no                            |
---------------------+---------------------------------+-------------------------------------+----------------------------------------+
outer join           |          yes                    |            yes                      |          yes                           |
---------------------+---------------------------------+-------------------------------------+----------------------------------------+


Consider this data:


customers table
+----------+------------+
|customerId|customerName|
+----------+------------+
|A         |Amy         |
|B         |Bob         |
|C         |Cindy       |
+----------+------------+



rewards table
+-------------+----------+------+
|transactionId|customerId|points|
+-------------+----------+------+
|101          |A         |10    |
|102          |A         |11    |
|222          |W         |22    |
|333          |X         |33    |
+-------------+----------+------+








https://www.youtube.com/watch?v=vTp_VxAvMrY


JOIN:
- inner join (will return only the records from both tables which satisfy the predicate)
- outer join
    - left  (if record doesn't satisfy predicate, still return the left table values, right will be null
    - right
    - full




r1 (a, b)
r2 (a, c)

r1 join r2 on <predicate>

r1+2 (a, b, a, c)





left join example:

r1: A - B           
---------
a1 - b1
a2 - b2

r2: A - C
---------
a2 - c2
a3 - c3

select r1 left join r2 on r1.a=r2.a

results:

A - B - A - C
--------
a1 -  b1 - null - null
a2 -  b2 - a2 - c2


















Correlated queries in sql
--------
https://www.youtube.com/watch?v=SM9cDMxAeK4


emp(eid, name, sal, dep)

    1   A       2k  CSE
    2   B       3k  EC
    3   C       3k  CSE
    4   D       4k  EC



Write a query that returns the list of employees which salary is greater than the average of their department.


select
    eid, name
from emp as e 
where
    sal > (
        select avg(sal) 
        from emp
        where dep = e.dep
           )   



Usually, the inner query is executed only ONCE.
But here, since the inner query uses a data from the outer query, it's called a correlated query, and therefore is evaluated for each row.



Performance of correlated subquery:

- it performs better if only a few records are retrieved by outer query
or
- inner query returns only a small records

Otherwise, VIEWS or JOINS will be more efficient.

