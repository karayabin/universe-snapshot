Beauty and Beast
======================
2016-05-16



![Beauty and the beast pattern](http://s19.postimg.org/i3xqkk86b/bnb_pattern.jpg)

The beauty and beast pattern (bnb pattern) is a technique that helps organizing your unit tests.
It is framework agnostic, so you can use php unit, jasmine, and/or your own unit test framework, all at the same time,
as long as you implement the pattern's rules.
It handles async tests as well by revisiting pending tests until they resolve.


By removing the barrier of the languages being tested, the bnb pattern provides you with a great flexibility 
for organizing your tests.
 
You can typically gather all the tests for an application together, independently of the language for which they were written.




The concept
--------------

The concept of this pattern is quite simple; it works with a browser and some html pages.
There is one and only one visitor, and multiple test pages.

The visitor is responsible for collecting the **test results string** from a given set of **test pages** and display
them to the user.
The results collected by the visitor are usually displayed as a recursive tree table.


Every test page contains an arbitrary number of tests executed by an arbitrary unit framework.
A test page is like a bridge between the tests and the visitor.
To be unit testing framework agnostic, a test page uses the bnb protocol described below.



### Note on async tests

To handle async tests, the test page indicate that at least one test has not resolved yet, and tell the
visitor to try again later (usually 1 or 2 seconds later).
This is done by using the bnb protocol described below.


Test Page
------------

A test page is a container for your tests.
It can use any unit testing framework that you like.
It's duty is to communicate the test results to the **visitor** using the bnb protocol described below.



Bnb protocol
-----------------

The bnb protocol is a protocol where two entities communicate together: the emitter and the viewer.
The emitter provides a string to the viewer; the string contains information about the unit tests being executed.

There are two different string types that an emitter can use: the **retry later string** and the **test results string**.


### retry later string

The **retry later string** indicates that the tests have not finished yet, and that the 
viewer shall come back later (the retry later string is used with languages 
that allow for async behaviours, like javascript for instance).
                        
The retry later string has the following format: **_BEAST_TEST_NOT_FINISHED_RETRY_LATER__**
                        
### test results string                        
The **test results string** indicates the number of executed tests and their status.

It's format is the following: **_BEAST_TEST_RESULTS:s=0;f=0;e=0;na=0;sk=0__**

Of course, the 0 digits have to be replaced by the actual number.
The meaning of the different test types are:
                
- s: success, the test could resolve and was successful ( returns true )
- f: failure, the test could resolve and was a failure ( returns false )
- e: error, the test couldn't resolve: it didn't return either true or false 
- na: not applicable, the test makes no sense in this environment
- sk: skip, the test has been skipped for an arbitrary user reason






About the Beauty
--------------------

The Beauty is the nick name of the gui that uses the visitor to collect the tests and display them to the user.


About the Beast
--------------------

The Beast is the nick name of the bridge object that interprets the results of your tests (using whatever unit testing framework)
and converts them to a bnb friendly string.






Implementations
-------------------

- Here is an implementation of the [Beast](https://github.com/lingtalfi/PhpBeast) part for php
- Here is an implementation of the [Beauty](https://github.com/lingtalfi/Beauty) part interface (it uses php and js under the hood)



