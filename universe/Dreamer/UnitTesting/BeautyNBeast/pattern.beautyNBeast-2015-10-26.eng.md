Beauty and Beast
======================
2015-10-26





A unit test tool for all languages.


Beauty and Beast (bnb) launches your application test from a web browser, using a gui.
Bnb is language agnostic: you can test any language that you wish: php, js, bash, ...





How does it work?
---------------------


Basically, 
every language must produce an html page containing a **result string** (see below the format for the result string) 
indicating the results of the tests, and then we use the browser to display the centralized results (using iframes).
 
The main benefit of this technique is that we are not tied to a specific test framework, we just need to provide
the tests results.



To be language agnostic, we use the following technique.


Tests are grouped by page.
A page contains tests written in a given language (for instance php).

When the page is executed, it must produce a string indicating how many tests have passed,
how many have failed, etc...



To be more specific, we have two distinct roles: 


- Beauty is the component responsible for executing the test pages and interpret the "results string"
- Beast is any component that the author uses to test her code and produce the "results string"



Communication between Beauty and Beast
------------------------------------------

The possible "special strings" are allowed:

- the results string: indicates the results of a page 
- the retry later string: indicates that the test is not finished yet (happens with js async test for instance)



### Beast: creating the results string
 
It's format is the following:
 
-  _BEAST_TEST_RESULTS:s=0;f=0;e=0;na=0;sk=0__

Of course, 0 digits have to be replaced by the actual number.
The different tests types are:

- s: success, the test could be executed and returns true
- f: failure, the test could be executed and returns false
- e: error, the test couldn't be executed properly and it didn't return either true or false 
- na: not applicable, the test makes no sense in this environment
- sk: skip, the test has been skipped for an arbitrary user reason

 
### Beast: creating the retry later string
 
The retry later string has the following format:
 
-  _BEAST_TEST_NOT_FINISHED_RETRY_LATER__
 

### Beauty: calling a page and interpreting the results

When Beauty calls a page, it SHOULD indicates somehow the following information to the user:

- success: the number of successes (of the currently executed page)
- failure: the number of failures
- error: the number of errors
- skip: the number of test skipped
- notApplicable: the number of tests flagged as not applicable
- unknown: the number of tests which do not produce the "results string"
- pending: the number of tests which produced the "retry later string"


Pending tests COULD be retried every 1 second for instance.



Implementations
-------------------

- Here is an implementation of the [Beast](https://github.com/lingtalfi/PhpBeast) part in php
- Here is an implementation of the [Beauty](https://github.com/lingtalfi/Beauty) part in php/js


