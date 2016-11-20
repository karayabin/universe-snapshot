JBeast Brainstorm
====================
2016-05-18


Missions
-----------

- be a unit test companion for the coder
- display an html table of results for visual convenience


We will reuse the PhpBeast conception for the most part.
https://github.com/lingtalfi/PhpBeast




Implementation
-----------------



### TestAggregator

We have a TestAggregator, to which the dev can attach (unit) tests.

### test

A test in this case is a function which can return either a boolean (whether the test is a success
or a failure), or an array containing:

- a boolean, whether the test is a success or a failure
- a string, optional message that accompany the test and explains the result


A test shall also throw an exception if an error (which prevent the test from being 
executed normally) occurs.



### TestInterpreter

Then the interpreter execute the tests collected by the aggregator, execute them,
and display the **test results string**, as to implement the [bnb pattern](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md#beauty-and-beast).




