[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The Where class
================
2019-07-22 --> 2020-03-03






Introduction
============

The Where class.

This class is used to ease the writing of simple but secured (via pdo markers) where conditions.
In particular, writing conditions involving "like" can be difficult to remember.

The concept is that you create the where conditions list like this:

```php
$whereConditions = Where::inst()
     ->key("user_id")->equals(3)
     ->key("pseudo")->like("maurice");
```

And then you can pass the whereConditions array to any method that accept whereConditions, such as update and delete.
Alternately, you can also use it in methods like fetch or fetchAll, by using the appendToQuery method.


All conditions use pdo markers (i.e. sql injection safe).



Class synopsis
==============


class <span class="pl-k">Where</span>  {

- Properties
    - protected array [$conditionsList](#property-conditionsList) ;
    - protected string [$key](#property-key) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/__construct.md)() : void
    - public static [inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/inst.md)() : static
    - public [key](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/key.md)(string $key) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [equals](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/equals.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [greaterThan](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/greaterThan.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [greaterThanOrEqualTo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/greaterThanOrEqualTo.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [lessThan](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/lessThan.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [lessThanOrEqualsTo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/lessThanOrEqualsTo.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notEquals](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notEquals.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [likeStrict](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likeStrict.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [like](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/like.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [contains](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/contains.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [likePre](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likePre.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [endsWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/endsWith.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [likePost](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likePost.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [startsWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/startsWith.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notLikeStrict](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikeStrict.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notLike](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLike.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notContaining](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notContaining.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notLikePre](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikePre.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notEndingWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notEndingWith.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notLikePost](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikePost.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notStartingWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notStartingWith.md)($value, ?$allowedWildChars = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [in](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/in.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notIn](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notIn.md)($value) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [between](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/between.md)($value1, $value2) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [notBetween](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notBetween.md)($value1, $value2) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [isNull](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/isNull.md)() : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [isNotNull](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/isNotNull.md)() : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [operator](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/operator.md)(string $operator, ?$value = null, ?$option = null) : [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md)
    - public [apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/apply.md)(string &$query, ?array &$markers = []) : void
    - public [getConditions](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/getConditions.md)() : void

}




Properties
=============

- <span id="property-conditionsList"><b>conditionsList</b></span>

    This property holds the conditionsList for this instance.
    It's an array of condition items.
    
    Each condition item is an array:
    - 0: key, the name of the targeted column
    - 1: comparisonFunction, using the [susco notation](https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md)
    - 2: value1: the value used to compare the column against
    - ?3: option: an optional value, depending ont he comparisonFunction used.
         For instance the second value in case of the "between" and/or "not_between" operator, or the list of allowed wildchars with like methods.
    
    

- <span id="property-key"><b>key</b></span>

    This property holds the current key.
    
    



Methods
==============

- [Where::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/__construct.md) &ndash; Builds the Where instance.
- [Where::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/inst.md) &ndash; Creates a new instance and returns it.
- [Where::key](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/key.md) &ndash; Sets the current key and return this instance for chaining.
- [Where::equals](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/equals.md) &ndash; Proxy to the operator method, with a predefined operator of "=".
- [Where::greaterThan](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/greaterThan.md) &ndash; Proxy to the operator method, with a predefined operator of ">".
- [Where::greaterThanOrEqualTo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/greaterThanOrEqualTo.md) &ndash; Proxy to the operator method, with a predefined operator of ">=".
- [Where::lessThan](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/lessThan.md) &ndash; Proxy to the operator method, with a predefined operator of "<".
- [Where::lessThanOrEqualsTo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/lessThanOrEqualsTo.md) &ndash; Proxy to the operator method, with a predefined operator of "<=".
- [Where::notEquals](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notEquals.md) &ndash; Proxy to the operator method, with a predefined operator of "!=".
- [Where::likeStrict](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likeStrict.md) &ndash; Proxy to the operator method, with a predefined operator of "like".
- [Where::like](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/like.md) &ndash; Proxy to the operator method, with a predefined operator of "%like%".
- [Where::contains](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/contains.md) &ndash; Alias of the like method.
- [Where::likePre](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likePre.md) &ndash; Proxy to the operator method, with a predefined operator of "%like".
- [Where::endsWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/endsWith.md) &ndash; Alias of the likePre method.
- [Where::likePost](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likePost.md) &ndash; Proxy to the operator method, with a predefined operator of "like%".
- [Where::startsWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/startsWith.md) &ndash; Alias of the likePost method.
- [Where::notLikeStrict](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikeStrict.md) &ndash; Proxy to the operator method, with a predefined operator of "not_like".
- [Where::notLike](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLike.md) &ndash; Proxy to the operator method, with a predefined operator of "%not_like%".
- [Where::notContaining](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notContaining.md) &ndash; Alias of the notLike method.
- [Where::notLikePre](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikePre.md) &ndash; Proxy to the operator method, with a predefined operator of "%not_like".
- [Where::notEndingWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notEndingWith.md) &ndash; Alias of the notLikePre method.
- [Where::notLikePost](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikePost.md) &ndash; Proxy to the operator method, with a predefined operator of "not_like%".
- [Where::notStartingWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notStartingWith.md) &ndash; Alias of the notLikePost method.
- [Where::in](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/in.md) &ndash; Proxy to the operator method, with a predefined operator of "in".
- [Where::notIn](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notIn.md) &ndash; Proxy to the operator method, with a predefined operator of "not_in".
- [Where::between](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/between.md) &ndash; Proxy to the operator method, with a predefined operator of "between".
- [Where::notBetween](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notBetween.md) &ndash; Proxy to the operator method, with a predefined operator of "not_between".
- [Where::isNull](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/isNull.md) &ndash; Proxy to the operator method, with a predefined operator of "null".
- [Where::isNotNull](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/isNotNull.md) &ndash; Proxy to the operator method, with a predefined operator of "is_not_null".
- [Where::operator](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/operator.md) &ndash; and returns this instance for chaining.
- [Where::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/apply.md) &ndash; and appends it to the given query, and update the given markers accordingly.
- [Where::getConditions](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/getConditions.md) &ndash; Returns the conditions list.





Location
=============
Ling\SimplePdoWrapper\Util\Where<br>
See the source code of [Ling\SimplePdoWrapper\Util\Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/Where.php)



SeeAlso
==============
Previous class: [SimpleTypeHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimpleTypeHelper.md)<br>
