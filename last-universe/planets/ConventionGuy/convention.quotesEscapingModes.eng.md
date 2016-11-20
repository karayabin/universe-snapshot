Quotes Escaping Modes
==========================
2015-10-06







How to Escape a Quote?
-------------------------


To escape a quote, we use one of the two mechanisms below:


Name                | Aka    |   Description
----------------    | ----------- | ---------------
Simple Backslash Escaping | simple     |  A backslash can only escape an inner quote
Recursive Backslash Escaping | recursive  | A backslash can escape an inner quote or another backslash  



### Examples



simple escaping notation       |     value
---------------------------- | --------------------------
"He is \"good\", really"     |     He is "good", really
"He is \\\"good\", really"     |     He is \"good", really
"He is \\\\\"good\", really"     |     He is \\\"good", really
"He is \\\\\\\"good\", really"     |     He is \\\\\"good", really

recursive escaping notation       |     value
---------------------------- | --------------------------
"He is \"good\", really"     |     He is "good", really
"He is \\\"good\", really"     |     Invalid: the double quote before good is not escaped; this breaks the protection of the whole string
"He is \\\\\"good\", really"     |     He is \\"good", really
"He is \\\\\\\"good\", really"     |     Invalid: the double quote before good is not escaped; this breaks the protection of the whole string
"He is \\\\\\\\\"good\", really"     |     He is \\\\"good", really
"He is \\\\\\\\\\\"good\", really"     |     Invalid: the double quote before good is not escaped; this breaks the protection of the whole string



As we can see, the simple backslash escaping model seems simpler to deal with.<br>
However, most programming languages use the recursive backslash escaping model. 






The big WHY do we need quote escapes in the first place?
----------------------------------------

When writing a new notation, one will probably will face a quote problem.
A basic problem is: if your notation is a sequence of comma separated components,
how do you know if a comma is considered as a separator, or as a part of a component's value?


```
myNotation: It's a good day, really?, I mean it, So, where are the values?
```

Quotes help enclose the components:

```
myNotation: "It's a good day, really?", I mean it, "So, where are the values?"
```

In the above example, quotes are used to split the notation in 3 values:

- It's a good day, really?
- I mean it
- So, where are the values?


But if you start using quotes, you now have new quotes problems.
What if your value contains literal quotes?<br> 
In the next example, how do you differentiate between enclosing quotes,
and literal quotes?


```
myNotation: "It's a "good" day, really?", I mean it, "So, where are the values?"
```

One way of dealing with this problem is to escape the quotes (aah, finally).<br>
Basically, when a quote is preceded by a backslash (\\), it's escaped, 
which means that the quote is literal.

```
myNotation: "It's a \"good\" day, really?", I mean it, "So, where are the values?"
```

Note that:
- if a component is enclosed with double quotes, single quotes need not to be escaped.
- if a component is enclosed with single quotes, double quotes need not to be escaped.


So this case was straight forward and developers are used to it.<br>
However, now that we use quote escaping, we have to deal with quote escaping problems (ouch, does it ever end?).

Imagine that for some reason you want that one of your component has the following value:
 
```
It's a \"good"/ day, really? 
``` 

How would you do it?

```
myNotation: "It's a \\"good\"/ day, really?", I mean it, "So, where are the values?"
myNotation: "It's a \\\"good\"/ day, really?", I mean it, "So, where are the values?"
```

One of the above notations is probably good, but which one exactly, and why?

Well, that's what escape modes are all about. 



Quotes Types
-------------

There are two basic types of quotes:

- single quote (')
- double quote (")

When writing notations, we need to differentiate between different quotes status.
Imagine the following comma separated value string:

```
hello, one, red, "it's \"good\", really!"
``` 

A quote can have one or more of the following statuses:

- a literal quote       (the single quote in the above example)
- an enclosing quote    (the first and last double quote in the above example)
- an inner quote        (the quotes inside enclosing quotes, so the single quote, and the second and third double quotes in the above example)
- an escaped quote      (the second and third double quotes in the above example)


It turns out that there are different ways to escape a quote, this is explained 
in the ["How to Escape a Quote?"](#user-content-how-to-escape-a-quote) section of this document.




Quotes protection
---------------------

By convention, we say that a string is protected when the two conditions below are fulfilled:

- it is enclosed by quotes of type A
- all quotes of type A inside the enclosing quotes are escaped











 






