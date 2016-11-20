IndentedLines
==================
2015-12-08



This is a notation to write a php array in an intuitive way.




The basic features
-----------------------

The base unit is a line.
We write the array line after line, starting from the top and going down.

For instance:


```
apple
banana
cherry
```

### The key and the value
 
In the above example, each line contains a value which represents a fruit.
But arrays also have keys, so how do we introduce keys?
We use a symbol to separate the value from the key.
By default, this symbol would be the colon symbol (:).
For instance:

```
fruit1: apple
fruit2: banana
fruit3: cherry
```

When the value sits on the same line than the key, we call it an inline value.

### Indentation for expanded value 

What if we want to put all the fruits in the same array?
We use indentation to represent the belonginess of a line to another.
I will use dashes to create the indentation:


```
- fruits
----- apple
----- banana
----- cherry
```


When the value is written on subsequent lines, we call it an expanded value.


### Value interpretation

What if I want to write an empty array?
You have to create a special symbol and interpret it yourself.
For instance, you can decide that the self closed square bracket symbol ([ ]) would be an empty array,
and then you can just use a regular line, for instance:

```
- fruits: []
```

Or:

```
- fruits: __empty_array__
```


Multiline
------------

Sometimes, the value of a line is verbose.
IndentedLines provides the multi-line mechanism to cope with that problem.
A multi-line starts when the value is a special symbol, the opening angular bracket symbol (<) by default,
and ends when the line is a special symbol, the closing angular bracket by default (>).
For instance:

```
- myBiography: <
    Nam ei erant iuvaret, quis viderer et ius. Timeam nostrum postulant has ut. 
    Id ludus decore definitionem eos, an vero decore constituam qui. 
    Quo et movet aeterno vivendum, aeque iudico pro ex. Ei sea nonumy malorum voluptua.
>
```



Comments
------------

IndentedLines consider three types of comments:

- comment on its own line
- comment instead of a value
- comment after of a value




For instance:

```
# this is a comment on its own line
- fruits # this is a comment instead of a value
----- apple
----- banana # this is a comment after a value
----- cherry  
- name: john # this is also a comment after a value
```


The first two types of comments (comment on its own line and comment instead of a value)
should be handled by the generic implementation.

In the case of the comment after a value, the implementation depends on the complexity of the value
itself. 

For instance, where would you say that the comment start on the following lines:

```
- name: "John#TheKungfuPanda"   # this is supposed to be the comment 
- name2: "John#TheKungfuPanda"    
- name3: "John#TheKungfuPanda"  # this is supposed to be the #comment#  
- name4: ["John#TheKungfuPanda", #what?, nope]   # this is supposed to be the comment 
```

Therefore, the implementation of this type of comment is left to the user.





Implementations
-------------------

There is a php implementation here:

- [IndentedLines](https://github.com/lingtalfi/IndentedLines) 



