Escape modes
==================
2015-11-12



This "escape modes" convention describes some way we can escape a character in a string.
Escaping a special character (a character with a special meaning in an arbitrary notation) is the action of 
giving it back its literal meaning.

Escaping modes help developer implement new notations.





There are two escape modes:

- simple escape mode (sem)
- recursive escape mode (rem)


Most developers will be familiar with the recursive escape mode, because it's the one used in languages like php.


Simple escape mode
---------------------

The escaping character (ec), backslash (\\) by default, escapes a special character when put in front of it,
and otherwise has no particular value.


### An example with an arbitrary notation using the double quote (") as the only special character



Notation using sem  |       Unescaped version         | Comments
---------------------------- | --------------      | -----------
hello       |   hello
he\llo      |   he\llo          |  ec has no particular meaning
He is \"good\"      |   He is "good"     |  both quotes are escaped
He is \\\"good\\\"      |   He is \"good\"  |   both quotes are still escaped, and preceded by one literal backslash
He is \\\\\"good\\\\\"      |   He is \\\"good\\\"   |   both quotes are still escaped, and preceded by two consecutive literal backslashes
He is \\\\\\\"good\\\\\\\"      |   He is \\\\\"good\\\\\"|   both quotes are still escaped, and preceded by three consecutive literal backslashes
     
     

Recursive escape mode
---------------------

The escaping character (ec), backslash (\\) by default, escapes a special character when put in front of it, or the ec itself,
and otherwise has no particular value.


### An example with an arbitrary notation using the double quote (") as the only special character     
     
     
Notation using rem  |       Unescaped version     |   Comments
----------------------------- | -------------------------| --------
hello       |   hello
he\llo      |   he\llo          |  ec has no particular meaning
He is \"good\"      |   He is "good"     | Both quotes are escaped
He is \\\"good\\\"      |   He is \"good\"     | Both quotes are not escaped, and are preceded by one literal backslash
He is \\\\\"good\\\\\"      |   He is \"good\"   | Both quotes are escaped, and are preceded by one literal backslash   
He is \\\\\\\"good\\\\\\\"      |   He is \\\"good\\\"    | Both quotes are not escaped, and are preceded by two literal backslashes  
He is \\\\\\\\\"good\\\\\\\\\"      |   He is \\\"good\\\"  | Both quotes are escaped, and are preceded by two literal backslashes    





Sources
------------

- [Quotes escaping modes](https://github.com/lingtalfi/universe/blob/master/planets/ConventionGuy/convention.quotesEscapingModes.eng.md#user-content-how-to-escape-a-quote)

