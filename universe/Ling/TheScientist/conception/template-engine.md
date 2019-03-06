About template engine
=====================
2019-01-21







What's a template?
------------------
In this planet, a template is some piece of code in which we can inject variables (and which reacts to those variables).


What's a template engine?
-------------------------
In this planet, a template engine is an object that takes a resource identifier (which identifies a template) and some variables as the input,
and returns a rendered template (a template in which the variables have been injected).

The signature method of a template engine is the following:

- string render ( string resourceIdentifier, array variables = [] )