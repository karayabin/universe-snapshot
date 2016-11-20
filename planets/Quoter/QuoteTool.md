QuoteTool
==============
2015-11-24



Main utility to manipulate quotes.



There are two types of quotes:

 - single quote
 - double quote
 
A quoted string is a string wrapped with the same type of quote.
Those quotes must be non escaped.
The wrapped content must not contain non escaped quote of the same type.

We use [quote escaping modes](https://github.com/lingtalfi/universe/blob/master/planets/ConventionGuy/convention.quotesEscapingModes.eng.md)

All methods here use [php multi-bytes functions](http://php.net/manual/en/ref.mbstring.php) (mb_)
 

To see method examples, check the [beauty'n'beast](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md) tests in the btests directory.
 
 


getCorrespondingEndQuoteInfo
-------------------
2015-11-26


```php
false|array(str:quotedString, int:endQuotePos)    getCorrespondingEndQuoteInfo( str:string, int:pos=0, bool:escapeRecursiveMode=true )
```



Check that the char at the given position of the given string is a quote,
then returns an array containing:

- 0: quotedString
- 1: pos of the end quote
          
  If it fails, it returns false
     
     
Note: whether the quote at the given position is escaped or not is irrelevant.


Example 

```php
a(QuoteTool::getCorrespondingEndQuoteInfo('abcdef'));  // false
a(QuoteTool::getCorrespondingEndQuoteInfo('"abc"def'));  // ['"abc"def', 4]
a(QuoteTool::getCorrespondingEndQuoteInfo('"abc\"de"f'));  // ['"abc\"de"', 8]
```





getCorrespondingEndQuotePos
-------------------
2015-11-25


```php
int|false    getCorrespondingEndQuotePos( str:string, int:pos=0, bool:escapeRecursiveMode=true )
```



Check that the char at the given position of the given string is a quote,
then returns the position (from the beginning of the string) of the next unescaped quote of the same type.

Returns false in case of failure, or the position of the next unescaped quote otherwise.

Note: whether the quote at the given position is escaped or not is irrelevant.


Example 

```php
a(QuoteTool::getCorrespondingEndQuotePos('abcdef'));  // false
a(QuoteTool::getCorrespondingEndQuotePos('"abc"def'));  // 4
a(QuoteTool::getCorrespondingEndQuotePos('"abc\"de"f'));  // 8
```




isQuotedString
-----------
2015-11-24

Returns whether or not the given string is a valid quoted string.


```php
bool        isQuotedString ( str:string, str:quoteType=null, bool:escapedRecursiveMode=true ) 
```

If quoteType is null (the default), both types of quotes are tested.


Example

```php
a(QuoteTool::isQuotedString('"hello"')); // true
```




quote 
-----------
2015-11-28


Quotes a quotable unquoted string.

Returns false if the given string is unquotable.
An unquotable string is only possible if escapeRecursiveMode is false and the last character
of the string is the backslash (\\\).


Returns false|string,
          the quoted string, or false if the given string is unquotable,
          in which case a warning is generated.
     
     
```php
false|string        quote ( str:unquotedString, str:quoteType=", bool:escapedRecursiveMode=true ) 
```


Example

```php
a(QuoteTool::quote('abc')); // "abc"
```




unquote 
-----------
2015-11-29


Unquotes the given valid quoted string and returns the result.
If the given string is not a valid quoted string, it return false.
 
 
```php
false|string        unquote ( str:quotedString, bool:escapedRecursiveMode=true ) 
```

Example

```php
a(QuoteTool::unquote('"abc"')); // abc
```







