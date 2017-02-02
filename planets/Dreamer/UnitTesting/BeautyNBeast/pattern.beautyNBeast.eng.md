Beauty
============
2016-05-25


One (unit testing) framework to rule them all.

![Beauty and the beast pattern](http://s19.postimg.org/i3xqkk86b/bnb_pattern.jpg)


The goal of this pattern is to produce a language agnostic unit testing framework.<br>
The main benefit of such a thing is that you can use ONE framework for ALL YOUR TESTS.<br>
You then can take your tests organization to the next level.





The actors
---------------------

- [test page](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#test-page)
- [visitor](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#visitor)



Test page
-------------

- It's an html page
- It has a **state**, which can be ONE of the following values (open) at a time:

    - pending
    - resolved
    
    The pending state is temporary and turn into the resolved state when the tests 
    are finished executing.
- It contains **tests** (unit tests)
- It executes its tests when called via a browser
- To indicate a state, a **test page** MUST use one of the following formatted strings:
        
    - [tests result string](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#tests-result-string) (resolved)
    - [retry later string](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#retry-later-string) (pending)



Visitor
------------

- It visits the [test pages](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#test-page),
    collect their **states** and display the results as a nicely formatted list.
    A pending test page will be revisited until it resolves.
    
- When it revisits a pending test page, the visitor does not refresh the iframe, but rather reparses
    its content. 
    This mechanism permits the handling of async tests that modify the DOM tree, and more.
        
        
        
Tests result string
-------------------------

This string, produced by a [test page](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#test-page), and interpreted 
by the [visitor](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#visitor), 
has the following format: <br>
**_BEAST_TEST_RESULTS:s=0;f=0;e=0;na=0;sk=0__**
        
Of course, the 0 digits have to be replaced by the actual number.
The meaning of the different test types are:
                
- s: success, the test could resolve and was successful ( returns true )
- f: failure, the test could resolve and was a failure ( returns false )
- e: error, the test couldn't resolve: it didn't return either true or false 
- na: not applicable, the test makes no sense in this environment
- sk: skip, the test has been skipped for an arbitrary user reason
        
        
Retry later string
-------------------------

The **retry later string**, produced by a [test page](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#test-page), and interpreted 
by the [visitor](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#visitor), 
has the following format: <br>
**_BEAST_TEST_NOT_FINISHED_RETRY_LATER__**
        
        


Why the name Beauty and Beast
--------------------

The Beauty is the nick name for the visitor.<br>
The Beast is the nick name for the unit testing framework for a given test page.



Related
=============
- [example implementation](https://github.com/lingtalfi/bnb)