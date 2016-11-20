String Cases
==========================
2015-10-14



Motivation
--------------

This document can serve as a reference for tools that need to distinguish between different string cases.




Different cases
-----------------------


A word contains only the [a-Z0-9_] chars.
A wordChar is a char in the [a-Z0-9_] range.




- camelCase: everything to lower case, then change the first letter of each word but the first to uppercase, then remove gaps between words  
- flexibleCamelCase: change the first letter of each word but the first to uppercase, then remove gaps between words  
- dash-case: replace consecutive blanks with one dash
- PascalCase: everything to lower case, then change the first letter of each word to uppercase, then remove gaps between words
- FlexiblePascalCase: change the first letter of each word to uppercase, then remove gaps between words 
- snake_case: everything to lower case, convert accentuated letters to non accentuated, then replace gaps between words with one underscore (_). Characters other than undercores, flat letters (non accentuated) and numbers are stripped out
- dog-case: everything to lower case, convert accentuated letters to non accentuated, and replace any non **wordChars** with a dash. No dash can precede another dash
- flea case: everything to lower case, convert accentuated letters to non accentuated, and remove any non accepted chars. Accepted chars are wordChars, the dash and the period. There cannot be more two consecutive dashes, two consecutive underscores, or two consecutive dots.
- hotDog-case: keep original case, convert accentuated letters to non accentuated, and replace any non **wordChars** with a dash. No dash can precede another dash
- CONSTANT_CASE: everything to upper case, then replace gaps between words with one underscore (_)


### Snake case

A string with everything to lower case.
Blanks chars are replaced with underscores.
Accentuated letters are replaced with their non accentuated equivalent.
Then, accepted characters are underscores, the 26 letters of the alphabet lower case, and the digits.
Characters outside of this range are stripped out.
Consecutive underscores are replaced with one underscore.


### Dog case

A string with everything to lower case.
Blanks chars are replaced with dashes.
Accentuated letters are replaced with their non accentuated equivalent.
Then, accepted characters are underscores, the 26 letters of the alphabet lower case, the digits, and the dash.
Characters outside of this range are stripped out.
Consecutive dashes are replaced with one dash.





### Flea case

A string with everything to lower case.
Blanks chars are replaced with dashes.
Accentuated letters are replaced with their non accentuated equivalent.
Then, accepted characters are underscores, the 26 letters of the alphabet lower case, the digits, the dash, and the dot.
Characters outside of this range are stripped out.
Consecutive dashes are replaced with one dash.
Consecutive underscores are replaced with one underscore.
Consecutive dots are replaced with one dot.

This was originally created to create secured file names during an upload (because two consecutive dots are not possible,
then the path cannot try to access a parent dir, but it's possible to have a file extension like ".jpg" for instance
because the dot char is accepted).






Examples
-------------

The table below shows how they translate to each other.


case        |   this is not correct |  simple XML  |  local db 2 remote   |    XML element
------------| --------------------- | -------------------  | ------------ |  ---------------  
camelCase   |   thisIsNotCorrect   | simpleXml  |  localDb2Remote   |     xmlElement
flexibleCamelCase |  thisIsNotCorrect   |  simpleXML  |  localDb2Remote  | XMLElement
PascalCase   |   ThisIsNotCorrect   | SimpleXml  |  LocalDb2Remote   |   XmlElement 
FlexiblePascalCase   | ThisIsNotCorrect  |  SimpleXML  |  LocalDb2Remote  | XMLElement 
snake_case  |   this_is_not_correct  |  simple_xml  |  local_db_2_remote  | xml_element
dog-case  |   this-is-not-correct  |  simple-xml  |  local-db-2-remote  | xml-element
flea-case  |   this-is-not-correct  |  simple-xml  |  local-db-2-remote  | xml-element
CONSTANT_CASE  |  THIS_IS_NOT_CORRECT  |  SIMPLE_XML  |  LOCAL_DB_2_REMOTE  | XML_ELEMENT 





History Log
------------------
    
- 2.0 -- 2015-11-07

    - reforged cases definitions
    
    
- 1.0 -- 2015-10-14

    - initial commit
    
    