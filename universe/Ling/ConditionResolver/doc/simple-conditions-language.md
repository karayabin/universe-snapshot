Simple conditions language
======================
2017-11-07





This simple conditions language is a simple language for writing whether or not
a condition should apply.

It is designed to be written/read from a database, and it is human readable (i.e. not serialized)
so that the administrator can change it directly inside the database if she/he wanted to.


The language is just a big string representing a condition.

Evaluating this string with the **SimpleConditionResolverUtil.evalute** method of the returns 
a boolean.


The language has two elements:

- comparison block
- logical operator


The comparison block is a statement resolving to a boolean value.

It generally involves two values separated by a comparison operator, but it can also be composed of 
only one value (mainly implemented for testing purpose), or three values in the case
of a comparison block using the between comparison operator.




The available comparison operators are:

- = (equivalent of php ===)
- != (equivalent of php !==)
- < 
- <= 
- > 
- >= 
- >< (between exclusive, then this comparison operator expect two arguments separated by a comma,
        whitespace around the comma has no meaning) 
- >=< (between inclusive, same as ><, but accepts boundaries)


The values can be any value, or a variable (using the dollar symbol as a prefix).
Variables are replaced by their corresponding value in the **pool** array (second argument
of the evaluate method).



So for instance, this is a typical comparison block:

- $lang_id=2


Each comparison block is in itself a statement that can be evaluated and returns a boolean.

The logical operators are the following:

- ||
- &&
- (( 
- ))

With them, we can combine multiple comparison blocks together.

- $lang_id=1&&user_country=FR
- ((1 && 2)) || 3
- 1 && ((2 || 3))
- Note: 1 && 2 || 3 is equivalent to 1 && ((2 || 3))
        In other words, the condition string is first cut with &&, then || 


Note that this **simple conditions language** is a primitive language and does not allow
for nested logical groups.
