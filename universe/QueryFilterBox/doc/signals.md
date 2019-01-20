Signals
=============
2017-10-16



Since a query is created collaboratively (i.e. multiple modules can participate
to the construction of the same query), signals is a simple system allowing
to mark the query with some mark that other participants can see.


The original problem that signals solve is the following:

module A wants to add tableXX and tableYY in an inner join,
but so does module B.

By default, if both modules add their joins without consideration of the other modules,
we end up with an erroneous sql query (i.e. the same inner join statement is 
written twice in the same query, which is probably wrong).

Now if module A and B both write and check for signal 123 (for instance),
they can together build the correct query (not adding their join if it's already in 
the sql request).