Light_UserPreferences, conception notes
===========
2020-07-31 -> 2020-08-11



This service brings plugin preferences at the user level.

Our service is built on top of [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase).


The idea is that we store the user preferences in a table, however, since this might lead to too many entries (depending on the number of users),
our philosophy is to provide default values that all users start with, and only write the preferences that user explicitly changes in the database, as to limit 
the number of entries in our table (hoping that not all users will change their preferences for all plugins).




Conventions
----------
2020-07-31


We recommend that plugin authors create a dedicated **UserPreferences/{TightName}UserPreferences** class containing the default values as php constants,
so that they can use them anywhere consistently in their code. 

Reminder: [TightName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#tight-planet-name) is accessible via [PlanetTool::getTightName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getTightPlanetName.md).

Also, we intend to provide a method that would return either the database value if any, or the default value if any.

In order to do that, we need to establish some conventions:

- first plugin authors should create the class we recommended above
- then the **constant names** and the **preference name** in the database should be the same, but due to technical naming constraints that php constants have,
    to convert the **preference name** to its **constant name** equivalent, we use the following procedure:
    - make sure the **preference name** contains only simple chars: [a-Z0-9_-], this means no space either, no dot, no comma, just alphanumerics, underscore and dash
    - make sure the **preference name** doesn't start with a digit
    - replace the dash with underscore
    - put everything to uppercase





Value types
----------
2020-07-31 -> 2020-08-11
  


We also want to ease the implementation of gui(s) later on, and therefore we provide a **value type**, which indicates what type of value
a preference will accept.

For convenience, we also include validation rules (if any) into the **value type**.

So the general syntax for a **value type** is the following:

- renderType (: validationRules)?


Note that no whitespace is allowed between the colon (:) and the **validationRules** part (if set).



With:

- renderType: string, the colon symbol (:) is not allowed, defines how this form field should be rendered (more info in a second)
- validationRules: validationRule ( | validationRule )*
    Note that no whitespace is allowed between the pipe and the validation rule.
    
- validationRule: string, the pipe symbol (|) is not allowed, the validation rules to apply to this form field (more info in a second)



Each **renderType** can have only a certain set of **validationRules** attached to it, this is detailed below.


Quick examples of value type:

- text
- int:positive|zero
- date:optional




In addition to that, we have two placeholders for the value: one called **value**, and the other **text_value** to take into account that we might treat differently
values of sql type TEXT, but it doesn't change the fact that a preference value is either of those, but only one of those.




The following **renderTypes** and relevant **validationRules** are available so far:

- int: an integer, can be positive, zero, or negative. 
    This field comes with an implicit isInteger validation rule already.
    The following validation rules can be added:
    - positive: to accept only positive integers (0 is not positive).
    - zero: only available along with the positive **validationRule**, to accept 0 as a value
    
    
    
- number: a number. Can be an integer or a float, but exponential notation is not accepted. 
    This field comes with an implicit isNumber validation rule already.
    No extra validation rule can be attached to this field.


- text: a small string (32 chars max). By default, it CANNOT be an empty string. 
    This field comes with an implicit maxChar(32) validation rule already.
    The following validation rules can be added:
    - optional: to allow the empty string 
    

- date: a string with mysql date format "yyyy-mm-dd". By default, an empty value is not accepted.
    This field comes with an implicit isDate validation rule already.
    The following validation rules can be added:
    - optional: to allow the empty string (which translates to null in a database)
    
    
- date: a string with mysql datetime format "yyyy-mm-dd hh:mm:ss". By default, an empty value is not accepted.
    This field comes with an implicit isDatetime validation rule already.
    The following validation rules can be added:
    - optional: to allow the empty string (which translates to null in a database)
    
    
    
 










