Id Filter Notation
========================
2015-10-05




What it is for?
------------------

So we have a bunch of unique numbers.

        5  20 13  44 20  3650  1 2 3 6 64  47    

How do we select some of them?



We can use idFilter
---------------------------


idFilter notation       |   selected numbers            |    comments
------------------------ | ---------------------------- | ----------------------------
5                       |    5                          |       
5,6                    |    5  6                        |       comma is the separator
5, 6                    |    5  6                       |       comma is the separator, spaces around commas are ignored
5,6,44                   |    5  6  44                  |       
5-10                   |    5  6 7 8 9 10                 | continuous range (the notion of continuity might depend on the context)       
5-10, 45, 48-50         |    5  6 7 8 9 10  45 48 49 50                 | mixed range and comma separator
5-10, 5, 6, 6         |    5  6 7 8 9 10                  | duplicate numbers are ignored
  



