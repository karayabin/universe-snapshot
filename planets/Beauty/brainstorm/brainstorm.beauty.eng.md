2015-10-27



Although the [beauty n beast](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md) pattern describes a general mechanism for implementing language agnostic unit testing tool,
it does not provide clear guidelines on how to implement the Beauty component for a specific language.


In this document, I try to find my way through it, possibly preparing the path for future implementors.




One of the nice thing about beauty'n'beast is that it doesn't tell us where to find the tests.
This means basically that any organisation is possible.




Let's define some nomenclature.


- test page url: an url to a test page. When this url is called, we expect that its output contains a special string (results string or try later string), 
                    and it should be interpreted by the Beauty gui.

           
- group: contains some test page urls and/or some other groups. The group is the base unit of organisation of our tests.
                       
           
       
                    
General organization
------------------------

We have two main roles:

- defining the test page urls available to the gui
- displaying the gui
                    
                    
### Defining the test page urls available to the gui
                    
This will be handled by a TestPageUrlFinder object.
                    
### Displaying the gui
                  
This will be handled by a Gui object.                  
                    
                    
                    
My implementation
----------------------

Since I'm a php/js developer, I will make an implementation with those languages:

- TestFinder with php
- Gui with js


             