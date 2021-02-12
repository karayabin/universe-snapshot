String Cases
==========================
2015-10-14 --> 2021-01-07



Motivation
--------------
2015-10-14



This document can serve as a reference for tools that need to distinguish between different string cases.




Different cases
-----------------------
2015-10-14 -> 2021-01-07



- A **word** contains only the [a-Z0-9_] chars.
- A **wordChar** is a char in the [a-Z0-9_] range.
- A **alphaNumericChar** is a char in the [a-Z0-9] range.


For all cases except **human flat case**, accents are stripped.


- [camel case](#camelcase)
- [constant case](#constantcase)
- [dash case](#dashcase)
- [flexible camel case](#flexiblecamelcase)
- [flexible dash case](#flexibledashcase)
- [flexible pascal case](#flexiblepascalcase)
- [human flat case](#humanflatcase)
- [pascal case](#pascalcase)
- [snake case](#snakecase)
- [underscore low case](#underscorelow-case)





Old cases (deprecated)
- hotDog-case: keep original case, convert accentuated letters to non accentuated, and replace any non **wordChars** with a dash. No dash can precede another dash.
- dog-case:
    A string with everything to lower case.
    Blanks chars are replaced with dashes.
    Accentuated letters are replaced with their non accentuated equivalent.
    Then, accepted characters are underscores, the 26 letters of the alphabet lower case, the digits, and the dash.
    Characters outside of this range are stripped out.
    Consecutive dashes are replaced with one dash.
- flea-case:
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






camelCase
-------------
2015-10-14



Consider underscore and spaces as words separators.
Everything to lower case, then uppercase the first letter of each word but the first.
Then remove gaps between words.



input            |       output
-------------  | -------------
this is not correct | thisIsNotCorrect
simple XML | simpleXml
local db 2 remote | localDb2Remote
XML element | xmlElement
some_tool_here | someToolHere
SOMe_tool_HERe | someToolHere
tai-tai-PEI.MAURICE | taiTaiPeiMaurice
tai(tai)-PEI+MAURICE | taiTaiPeiMaurice


flexibleCamelCase
-------------
2015-10-14 -> 2020-07-03



Like [camelCase](#camelcase), but keeps the existing case (uppercase or lowercase), except for:
- the first letter of the first word is always lowercase
- the first letter of the non-first words is always uppercase


input            |       output
-------------  | -------------
this is not correct | thisIsNotCorrect
simple XML | simpleXML
local db 2 remote | localDb2Remote
XML element | xMLElement
some_tool_here | someToolHere
SOMe_tool_HERe | sOMeToolHERe
tai-tai-PEI.MAURICE | taiTaiPEIMAURICE
tai(tai)-PEI+MAURICE | taiTaiPEIMAURICE



pascalCase
-------------
2015-10-14



Like [camelCase](#camelcase), but the first letter is uppercase.


input            |       output
-------------  | -------------
this is not correct | ThisIsNotCorrect
simple XML | SimpleXml
local db 2 remote | LocalDb2Remote
XML element | XmlElement
some_tool_here | SomeToolHere
SOMe_tool_HERe | SomeToolHere
tai-tai-PEI.MAURICE | TaiTaiPeiMaurice
tai(tai)-PEI+MAURICE | TaiTaiPeiMaurice



flexiblePascalCase
-------------
2015-10-14



Like [flexibleCamelCase](#flexiblecamelcase), but the first letter is uppercase.


input            |       output
-------------  | -------------
this is not correct | ThisIsNotCorrect
simple XML | SimpleXML
local db 2 remote | LocalDb2Remote
XML element | XMLElement
some_tool_here | SomeToolHere
SOMe_tool_HERe | SOMeToolHERe
tai-tai-PEI.MAURICE | TaiTaiPEIMAURICE
tai(tai)-PEI+MAURICE | TaiTaiPEIMAURICE




snakeCase
-------------
2015-10-14


The whole string is converted to lowercase, and every non **alphaNumeric** char is replaced with an underscore.
Consecutive underscores are merged to one.



input            |       output
-------------  | -------------
this is not correct | this_is_not_correct
simple XML | simple_xml
local db 2 remote | local_db_2_remote
XML element | xml_element
some_tool_here | some_tool_here
SOMe_tool_HERe | some_tool_here
tai-tai-PEI.MAURICE | tai_tai_pei_maurice
tai(tai)-PEI+MAURICE | tai_tai_pei_maurice



constantCase
-------------
2015-10-14


Like [snakeCase](#snakecase), but everything is set to uppercase.



input            |       output
-------------  | -------------
this is not correct | THIS_IS_NOT_CORRECT
simple XML | SIMPLE_XML
local db 2 remote | LOCAL_DB_2_REMOTE
XML element | XML_ELEMENT
some_tool_here | SOME_TOOL_HERE
SOMe_tool_HERe | SOME_TOOL_HERE
tai-tai-PEI.MAURICE | TAI_TAI_PEI_MAURICE
tai(tai)-PEI+MAURICE | TAI_TAI_PEI_MAURICE



dashCase
-------------
2015-10-14

The whole string is converted to lowercase, and every non **alphaNumeric** char is replaced with a dash.
Consecutive dashes are merged to one.



input            |       output
-------------  | -------------
this is not correct | this-is-not-correct
simple XML | simple-xml
local db 2 remote | local-db-2-remote
XML element | xml-element
some_tool_here | some-tool-here
SOMe_tool_HERe | some-tool-here
tai-tai-PEI.MAURICE | tai-tai-pei-maurice
tai(tai)-PEI+MAURICE | tai-tai-pei-maurice



flexibleDashCase
-------------
2015-10-14



Like [dashCase](#dashcase), but the string conserves its original case.



input            |       output
-------------  | -------------
this is not correct | this-is-not-correct
simple XML | simple-XML
local db 2 remote | local-db-2-remote
XML element | XML-element
some_tool_here | some-tool-here
SOMe_tool_HERe | SOMe-tool-HERe
tai-tai-PEI.MAURICE | tai-tai-PEI-MAURICE
tai(tai)-PEI+MAURICE | tai-tai-PEI-MAURICE



humanFlatCase
-------------
2020-07-03 -> 2021-01-07



It's just another name for lower case, and space separated words.


- underscores are replaced with spaces
- uppercase letters inside a word are prefixed with a space






input            |       output
-------------  | -------------
this is not correct | this is not correct
camelCase | camel case
simple XML | simple xml
local db 2 remote | local db 2 remote
XML element | xml element
some_tool_here | some tool here
SOMe_tool_HERe | some tool here
tai-tai-PEI.MAURICE | tai-tai-pei.maurice
tai(tai)-PEI+MAURICE | tai(tai)-pei+maurice





underscoreLow case
------
2021-01-07


lower case underscore separated components.


It's a combination of the [humanFlatCase](#humanflatcase) and the [snake_case](#snakecase).


- apply the humanFlatCase
- apply the snake_case




input            |       output
-------------  | -------------
this is not correct | this_is_not_correct
camelCase | camel_case
simple XML | simple_xml
local db 2 remote | local_db_2_remote
XML element | xml_element
some_tool_here | some_tool_here
SOMe_tool_HERe | some tool here
tai-tai-PEI.MAURICE | tai_tai_pei_maurice
tai(tai)-PEI+MAURICE | tai_tai_pei_maurice





History Log
------------------

- 4.1 -- 2021-01-07

    - add underscore_low case
    
- 4.0 -- 2020-07-03

    - add human flat case
    
- 3.0 -- 2018-05-01

    - reforged cases definitions

- 2.0 -- 2015-11-07

    - reforged cases definitions


- 1.0 -- 2015-10-14

    - initial commit

