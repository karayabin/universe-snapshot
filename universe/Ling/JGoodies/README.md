jGoodies
==============
2016-01-09


Some functions that I found useful while playing with jQuery/javascript.



JGoodies is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/JGoodies
```


Dependencies: jquery 



Methods
---------

### regexQuote 

Quote a regex properly, you should use it any time you use a regex.
If you don't, you might encounter a "Nothing to repeat" error.
 
```js
var s = 'Buckys C++ Programming Tutorials - 23 - Making a Stock Market Simulator!.mp4';
var substrRegex = new RegExp(jGoodies.regexQuote(s), 'i');
``` 


### selectorEscape 

Properly escapes a [jquery selector](https://api.jquery.com/category/selectors/).
 
```js
var x = "dyNami" + 'c';
var jItem = $('[data-id="'+ jGoodies.selectorEscape(x) +'"]');
``` 











History Log
------------------

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2016-02-02

    - add selectorEscape method
    
- 1.0.0 -- 2016-01-09

    - initial commit
    
    









