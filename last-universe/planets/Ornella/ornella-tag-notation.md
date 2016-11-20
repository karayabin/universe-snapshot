Ornella Tag Notation
=========================
2015-10-21





What is it?
---------------

Ornella tag notation is used to replace **tags** by a treated value.
For instance, the {fileName} tag could be replaced by a file name variable,
and the {fileName:upper} tag could be replaced by the file name variable uppercase.


Why?
-------

In some cases where you don't have direct access to a programming language, ornella notation can be used
as a proxy to some basic functions that only programming language can provide.



How does it work?
---------------------

Ornella is all about replacing tags.
A tag is a string wrapped with the curly brackets, like {this}.

A tag contains an arbitrary number of components separated by the colon symbol(:), 
the first (component) of which being always the identifier.
The identifier is replaced by the so-called value.

Then, the subsequents components are called the functions.
The value is passed through the functions (and modified by them) until all the functions have been executed.
The final value is the actual value which replaces the tag.


We could represent the ornella tag notation like this:

- ornellaTagNotation: \<{> \<identifier> (\<:> \<functionDeclaration>)*  \<}>
- identifier:  [a-Z0-9_]
- functionDeclaration: \<functionName> \<functionParamsString>?
- functionName:  [a-Z0-9_]
- functionParamsString: string, depends on the function. Generally, it starts with an underscore to delineate 
                            the function name from the beginning of the function parameters.




Special chars 
---------------------

The following chars have a special meaning:

- colon (:) 
- opening curly bracket ({)
- closing curly bracket (})

Therefore, they must be escaped with the backslash should they appear in the functionDeclaration expression.
Some functions use more than one parameter and use the underscore(\_) as a separator, therefore for those functions, 
unless otherwise specified, the underscore(\_) should also be escaped when used as a parameter value. 
 




The functions
---------------------

The following functions are available:

- upper
- lower
- safe ( replaceChar )
- cut ( cutChar, fieldSpec )
- substr ( start, length? )




### upper

Returns the uppercase version of the given value

### upper

Returns the lowercase version of the given value

### safe (replaceChar)

Transform any non safe char into the replaceChar (which can be of any length).
A safe char is [a-Z0-9_].
The notation is illustrated by the following example:

    {var:safe_<replaceChar>}        # abstract
    {var:safe_-}                    # replace all non safe chars with dash
    {var:safe__}                    # replace all non safe chars with underscore
    {var:safe___}                   # replace all non safe chars with two underscores



### cut ( cutChar, fieldSpec )

Cuts the value in pieces using the cutChar symbol, and then returns the fields according to fieldSpec.
fieldSpec defines the set of pieces that should be returned, and the separator between those pieces.

There are different notations.
The underscore is used as the main separator.

To restrict the returned value to a specific field, we simply write its index.
Pieces are indexed numerically, starting at 1.
    
The abstract notation is:
    
    {var:cut_<cutChar>_<fieldSpec>}
    
    
#### Examples     

Imagine we have an input value of: 

    hello_world_is_it_ok.txt


##### Single field


    To return a single field, we simply write its index.
    To return hello, we use the notation {var:cut_\__1}
    To return world, we use the notation {var:cut_\__2}
    And so on.
    

##### Ranges

To return a closed range of fields, we write the boundaries separated by a dash.
Then because there are many fields being returned, we can specify the separator between them,
the default (implicit) separator being the empty string.

Order of boundaries matters.

The abstract notation is:
    
    {var:cut_<cutChar>_<ranges>(_<separator>)?}
    - ranges: <range> (<;> <range>)*
    - range: <openRange> | <closedRange>
    - openRange: <boundary1> <+> 
    - closedRange: <boundary1> <-> <boundary2>
    - boundary1: positive int
    - boundary2: positive int, with boundary2 always greater than boundary1
    
    
    
    To return helloworld, we use the notation {var:cut_\__1-2}
    To return hello-world, we use the notation {var:cut_\__1-2_-}
    To return hello_world, we use the notation {var:cut_\__1-2__}
    To return hello__world, we use the notation {var:cut_\__1-2___}
    To return hello$world$is, we use the notation {var:cut_\__1-3_$}

We can also specify multiple ranges.

    To return helloisitok, we use the notation {var:cut_\__1;3-5}
    To return hello=is=it=ok, we use the notation {var:cut_\__1;3-5_=}
    Alternately, to return hello=is=it=ok, we can also use the notation {var:cut_\__1;3+_=}

And so on.
    
    
    
### substr ( start, length? )

Returns a substring of the value.

Abstract notation: 
    
    {var:substr_<start>(_<length>)?}
    
- start: int    
- length: int
    
    
The returned value is the substring defined by \<start> and \<length>.
    
\<start> marks the beginning of the substring.
If it's a positive number (including zero), it indicates the index position of the beginning from the start.
If it's a negative number, it indicates the index position of the beginning, but starting from the end.


Once the beginning of the substring has been set, \<length> is used to define the end of the substring.
If \<length> is positive, then \<length> is added to the (positive version of the) \<start> index, and the result 
is the actual ending position (index) of the substring.
If \<length> is negative, then the end position is the very last position of the value, moved to the left by 
\<length> (multibytes) chars.
If \<length> is omitted, then the end position is the very last position of the value.


If you know php, then basically the substr function or ornella's tag notation is the equivalent of php's native [mb_substr function](http://php.net/manual/en/function.mb-substr.php).


 
    
    
#### Examples     
        
Imagine we have an input value of: 

    hello_world_is_it_ok.txt
    
  
    To return hell, we use {var:substr_0_4}    
    To return ello, we use {var:substr_1_4}    
    To return .txt, we use {var:substr_-4}    
    To return .t, we use {var:substr_-4_2}    
    To return ello_world_is_it_ok, we use {var:substr_1_-4}    
    
    
    

Combining functions
---------------------
    
As said earlier, it is possible to chain functions, using the colon separator.
    
Example:
    
    
    {var:substr_0_4:upper:safe_-}  
    
In this example, the value is first passed to the substr function (with params 0 and 4), <br>
then the result is passed to the upper function,<br>
then the new result is passed to the safe function with param dash(-).
    
    
    
Implementations
------------------
    
A php implementation is provided in this planet: [Ornella Tag Notation php implementation by LingTalfi](https://github.com/lingtalfi/ornella/blob/master/OrnellaTagNotationUtil.php)    
















