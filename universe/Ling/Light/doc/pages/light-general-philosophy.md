General philosophy of the Light framework
================
2019-04-09



Layers addition
-----------
A light web application is built by adding simple layers on top of each others. 
Each layer adds a simple functionality, and the application gets more complex as more layers get added.



Error handling: a strict error policy
--------------

Generally, when something which depends on the developer fails, we throw an exception.

If the error comes from the user, we might want to be a little more lenient and try to work around the problem 
by providing fallback behaviours. 



    
    
    