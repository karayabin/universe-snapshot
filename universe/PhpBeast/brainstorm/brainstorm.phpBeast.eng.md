2015-10-26



Although the [beauty n beast](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md) pattern describes a general mechanism for implementing language agnostic unit testing tool,
it does not provide clear guidelines on how to implement a Beast for a specific language.


In particular, there is no mention of success/failures messages that might be useful to debug.
Therefore, I will try to path the way for future implementors.


We have two objects:


- TestAggregator
- TestInterpreter


The test aggregator collects the tests.
By extension, it can provide handy methods for the users.
As its core though, it just collect tests.

Then the test interpreter executes all the tests and produces the "results string"/"try later string".
By extension, it also can display a visual debug helper which basically is a table containing the tests and their results.
We have to remember that the TestInterpreter is called from a web browser, so the carriage return char is \<br>.
 
 
 

For this design to work properly, we need to know exactly what a test is, and
how it works internally.



What is a test?
------------------

In this implementation with php, a test is a callable.



        bool       f ( str:&msg=null )
        
- success: is achieved when the test returns true
- failure: is achieved when the test returns false
- skipped: is achieved when the test throws a BeastSkipException
- notApplicable: is achieved when the test throws a BeastNotApplicableException
- error: is achieved when the test throws another exception
- try later state: is achieved when the test throws a BeastTryLaterException, but this should not happen in php

If msg is set to a non null value, then:
    - if the result of the test is a success, it's value will be the success message
    - if the result of the test is a failure, it's value will be the failure message



