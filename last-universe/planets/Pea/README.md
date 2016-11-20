Pea
=========
2015-10-26


Php like functions in js.



Why the name pea?
--------------------

Because p like in php.

Most functions come from the [phpjs library](http://phpjs.org/).



How to use?
---------------

1. Include the pea.js file in your header.
2. Now the pea object is available globally, so you can use its methods.


Example:

```js
var fun = function(){
    alert("Is that fun?");
};

if( true === pea.isFunction(fun)){
    fun();
}

```



Functions
-------------


### bool    inArray ( str:needle, arrayOrObject:haystack, bool:strict=true ) 
### bool    isArray ( mixed ) 
### bool    isArrayObject ( mixed ) 
### bool    isArrayOrObject ( mixed ) 
### bool    isFunction ( mixed ) 
### bool    nl2br ( str:str, bool:is_xhtml ) 






History Log
------------------
    
- 1.2.0 -- 2016-01-09

    - add nl2br method 
    
- 1.1.0 -- 2015-12-11

    - add inArray method 

- 1.0.0 -- 2015-10-26

    - initial commit
    
    


