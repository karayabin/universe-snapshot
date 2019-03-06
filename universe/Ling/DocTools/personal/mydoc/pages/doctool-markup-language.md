DocTool Markup language
============
2019-02-12





Summary
===========

- [Introduction](#introduction)
- [The php doc comment](#the-php-doc-comment)
- [Block level tags](#block-level-tags)
    - [The expandable block-level tag](#the-expandable-block-level-tag)
    - [The non-expandable block-level tag](#the-non-expandable-block-level-tag)
    - [The stand-alone block-level tag](#the-stand-alone-block-level-tag)
    - [List of block-level tags](#list-of-block-level-tags)
    - [The property var tag](#the-property-var-tag)
    - [The method param tag](#the-method-param-tag)
    - [The method return tag](#the-method-return-tag)
    
- [Inline functions](#inline-functions)






Introduction
=============

**DocTool** is a markup language used to ease the process of documenting an oop project.

It is built on top of markdown, so you can use any markdown notation you would like.


There are four types of tags organized in two categories:


- block-level tags:
    - expandable block-level tags
    - non-expandable block-level tags
    - stand-alone block-level tags    
- inline-level tags    
    - inline functions


Block-level tags are meant to be written inside php doc comments (i.e. comments starting with (/**)),
whereas inline-level tags can potentially be used anywhere (a doc comment, or a manually created documentation page for instance).




The php doc comment
==================

The docTool notation sees the doc comment (aka raw comment) as a unit composed of two elements:

- the main text
- the block-level tags section


The **main text** is first, and contains the comment's text.
Inline-level tags inside the main text are interpreted.

Then the **block-level tags section** is second and starts when the first block-level tag is encountered.

If no block-level tag is encountered, then there is no **block-level tags section**.

Once the **block-level tags section** is started, it goes until the end of the raw doc comment.



So for instance the following doc comment:

```php
/**
* This is just a demo doc-comment, to show the different parts of the comment.
 * So this is the main text of the doc comment.
 * 
 * @any_tag So now the block-level section has started, and will end with end of the doc comment.
 * @another_tag
 * This is another tag's text.
 * @var string 
 * 
 */
```


The main text is:

```txt
This is just a demo doc-comment, to show the different parts of the comment.
So this is the main text of the doc comment.
```

And the block-level tags section is everything starting from "@any_tag" to the end of the doc comment.

```txt
@any_tag So now the block-level section has started, and will end with end of the doc comment.
@another_tag
This is another tag's text.
@var string 
```










Block level tags
==================

A block-level tag is always written inside a [php doc comment](#the-php-doc-comment),
and always indicates the beginning of the **block-level tags section** of the php doc comment.


There are three types of block-level tags:

- expandable block-level tags
- non-expandable block-level tags
- stand-alone block-level tags  




A block-level tag is composed of one or more lines (depending on the type).

The first line is called **tag head line**, while subsequent lines 
are called **tag body lines**. 


- block level tag:
    - tag head line
    - ?tag body line
    - ?tag body line
    - ...
    


The tag head line starts with the @ symbol (it must be the very first character of the line) followed by the tag name (for instance @var or @return).




The expandable block-level tag
------------------

An expandable block-level tag is composed of one or more lines.

This tag has a **value** and a **body** associated to it.
 
The **value** is the part of the **tag head line** which follows the tag name.

And the **body** is the concatenated **tag body lines**.

Note: both the **value** and the **body** are trimmed.


However if an "ending sentence dot" is found on the **tag head line**, the **value** stops at this dot, and the **body** starts immediately after.


By "ending sentence dot" I mean a dot which naturally ends a sentence (a dot followed by a whitespace or a dot ending the line). 


So for instance in the following example:


```php
/**
* @var string = "mama" 
 *      The mama string doesn't have a papa yet.
*/
```

The **value** is:

```txt
string = "mama" 
``` 

and the **body** is:

```txt
The mama string doesn't have a papa yet.
```



But in the following example:
```php
/**
* @var string = "mama". I will start here rather.
 *      The mama string doesn't have a papa yet.
*/
```

The **value** is:

```txt
string = "mama" 
``` 

And the **body** is:

```txt
I will start here rather.
The mama string doesn't have a papa yet.
```


Notice how the "ending sentence dot" after "mama" marked the end of the 
**value** and the beginning of the **body** at the same time.











The non-expandable block-level tag
------------------


Same as the [expandable block-level tag](#the-expandable-block-level-tag),
but doesn't have a **body**. It just has a **value**.

And so it's always written on the **tag head line**, and never uses the **tag body lines**. 



The stand-alone block-level tag
------------------

Same as the [non-expandable block-level tag](#the-non-expandable-block-level-tag),
but doesn't have a **value**. 

So this tag has no **value** and no **body**.

It just has the **tag name** sitting alone on the **tag head line**.




List of block-level tags
-------------------------



- Expandable block-level tags
    - var: the property var tag (see [the property var tag section](#the-property-var-tag) for more info).
    - param: the method param tag (see [the method param tag section](#the-method-param-tag) for more info).
    - return: indicates the return type of a function. See the [the method return tag section](#the-method-return-tag) for more info. 
    
- Non-expandable block-level tags
    - seeClass: should translate to a link to another class.
                The **value** is the class name.
                 
                Example: "@seeClass Jin\Log\Logger".
                This tag can be used multiple times.
                
                
    - seeMethod: should translate to a link to a method from the current class (where the seeMethod tag is declared),
                 or an external class.
                 
                 If the method is internal, the **value** is simply the method name.
                 Example: @seeMethod parse
                 
                 If the method is external (another class than the one containing the "@seeMethod" tag),
                 then the **value** is the long method name:
                    - ```<class name> <::> <method name>``` 
                                  
                    Example: "@seeMethod Jin\Log\Logger::log".
                    
                    This tag can be used multiple times.
                
                
- Stand-alone block-level tags
    - implementation: indicates that this method implements an interface or an abstract class,
            and replaces the "@implementation" tag with the doc comment of the appropriated interface or abstract class.
            Note: the replacement process is recursive (i.e. an implementation tag can call another implementation tag and so forth...).
            Note2: this is basically an "include" mechanism.
            Note3: this tag can only be used in the doc comment of a method (i.e. not the doc comment of a class or a property).
             
            
    - overrides: same as implementation, but for regular subclassing (i.e. a child class overriding a parent's method).
    
    
    - overrideMe: indicates that this method could/should be overridden by the user.  
            Note: this tag can only be used in the doc comment of a method (i.e. not the doc comment of a class or a property).
















The property var tag
-----------------


The property var tag is an [expandable block-level tag](#the-expandable-block-level-tag).

Its informal notation is the following: 

- ```<@var> <type> <variable>? (<ws> <=> <defaultValue>)?  <alternatives)?  (<endOfSentenceDot> <descriptiveText>)?  ```  

With:
    - @var: string @var
    - type: the type of variable. A flag, or pipe separated combination of flags, amongst:
            - string
            - int
            - float
            - array
            - any object type (MyObject)
            - an array of any object type (```MyObject[]```)
            - bool
            - null
            - ...?
            
            
    - variable: the variable name preceded with the dollar symbol ($). This information is redundant, not required,
            and therefore not recommended, but it's accepted in order to be more permissive.
            
    - ws: one or more white space            
    - defaultValue: the default value of the variable if any.            
    - alternatives: the default values alternatives if relevant. This is a pipe separated values string (for instance red|blue|green).                      
    - endOfSentenceDot: an end of sentence dot "." (See [The expandable block-level tag](#the-expandable-block-level-tag) for more details).                       
    - descriptiveText: the beginning of the **body** (See [The expandable block-level tag](#the-expandable-block-level-tag) for more details).                       


Any complementary descriptive text should be set on the subsequent lines in the doc comment, and use proper case and punctuation.




Following are examples of the property var tag notation (they are all valid):

            
```php
/**
 * @var string 
 * @var string $machette 
 * @var string = mama 
 * @var string $machette2 = mama 
 * @var string = mama2 (mama|papa|dada)
 * @var string $machette3 = mama (mama|papa|dada)
 * @var string. This is actually the beginning of the body. 
 * 
 * @var string $machette4 = mama (mama|papa|dada)
 * This is the body of $machette4 tag.
 * This is also the body of $machette4 tag.
 * 
 * @var string $machette5. This is the body of $machette5.
 * This is also the body of $machette5 tag.
 * 
 */            
```            
            
            
            



The method param tag
-----------------

The method param tag is an [expandable block-level tag](#the-expandable-block-level-tag).

Its informal notation is the following:


- ```<@param> <type>? <variable> (<=> <defaultValue> (<alternatives>)?)?  (<.> <descriptiveText>)? ```  

With:
    - @var: string @var
    - type: the type of variable. A flag, or pipe separated combination of flags, amongst:
            - string
            - array
            - any object type (MyObject)
            - an array of any object type (```MyObject[]```)
            - bool
            - int
            - float
            - ...?
            
            
    - variable: the variable name preceded with the dollar symbol ($). 
    - defaultValue: the default value of the variable if any.            
    - alternatives: the default values alternatives if relevant. This is a pipe separated values string wrapped with parenthesis.
            For instance (red|blue|green)            
    - descriptiveText: a complementary inline descriptive text, using proper case and punctuation.           
         
Any complementary descriptive text should be set on the next lines in the doc comment, and use proper case and punctuation.   
            

Following are examples of the method param tag notation (they are all valid):

            
```php
/**
 * @param $alibi
 * @param string $alibi2
 * @param string|null $alibi3
 * @param string|MethodInfo[] $alibi4
 * @param string|MethodInfo[] $alibi5 = douceur 
 * @param string|MethodInfo[] $alibi6 = douceur (douceur|fraîcheur) 
 * @param string|MethodInfo[] $alibi7 = douceur (douceur|fraîcheur). This is the start of the body of the tag. 
 * 
 * @param string $alibi8. This is the beginning of the body of $alibi8.
 * 
 * This line is also part of the body of the $alibi8.
 * This line is also part of the body of the $alibi8.
 * 
 * 
 */            
```            
            
         





The method return tag
---------------

The return tag @return is used in methods doc comment to indicate the return
of the method.

To get the best out of the automation tool (that will generate the docs for us),
it should be formatted like this:

- ```<@return> <type> (<.> <description>)?```

With:

- @return: the string "@return"
- type: a pipe separated values string indicating the possible return types of the method.
        Possible values are:
        - array
        - false
        - true
        - bool
        - null
        - string
        - mixed (when in doubt)
        - any php object (MyObject)
        - an array of any php object (MyObject[])
        - ...?
        
- description: a description sentence, with proper case and punctuation. 

Any complementary descriptive text should be set on the next lines in the doc comment, and use proper case and punctuation.





Following are examples of the method return tag notation (they are all valid):

            
```php
/**
 * @return string 
 * @return string | null
 * @return MyInterface | null. This is the beginning of the body of the return tag.
 * 
 * @return string | int
 * This is the beginning of the body of the return tag.
 * 
 * @return string | float. This is the beginning of the body of the return tag.
 * This is part of the body of the return tag.
 * This is also part of the body of the return tag.
 * 
 * 
 */            
```    




Inline functions
===============

An inline function, sometimes referred to as an inline tag, is a replacement mechanism which can be written anywhere (i.e. not just in a [php doc comment](#the-php-doc-comment)). 

All inline-level tags have the same notation:

- notation: ```<@> <functionName> <(> <argsList>  <)> ```

    With:
    - functionName, the name of the function.
        Allowed chars: alpha-numeric chars, underscores.
    - argsList, a comma separated list of arguments.
        Each argument is a string.
        Allowed chars for an argument: every character except the closing parenthesis ")" and the comma ",".

        To write an actual closing parenthesis or comma inside an argument, we use the following aliases:
        - closing parenthesis: __closing_parenthesis__
        - comma: __comma__



When an inline function cannot be resolved, it is ignored.


The following functions are meant to be used inside a description text.

- @class($className): will be transformed into a link to the $className's generated doc page.
- @method($longMethodName): will be transformed into a link to the method's generated doc page.
    The $longMethodName has the following notation:
    
        - longMethodName: ```<className> <::> <methodName>```
    Example: DocTools\ClassParser\ClassParserInterface::parse         
    
- @link($text, $url): will be transformed into a link to the given $url, with the text $text.

- @keyword($keyword): a link to the keyword's most appropriate page or anchor will be made. The $keyword argument's resolution url would be defined in a map elsewhere.
- @kw($keyword): an alias for @keyword.
- @section($keyword): an alias for @keyword.
- @page($keyword): an alias for @keyword.
- @doc($keyword): an alias for @keyword.
- @concept($keyword): an alias for @keyword.
- @object($keyword): an alias for @keyword.

- @alias($keyword): will be replaced by the $keyword's value.
- @url($keyword): an alias for @alias.






