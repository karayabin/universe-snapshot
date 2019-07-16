Conception notes 
========
2019-05-15




* [Dynamic variables](#dynamic-variables)
* [Lazy reference resolver](#lazy-reference-resolver)




Dynamic variables
----------------
2019-05-15


The kit system distinguishes between static and dynamic variables.

Static variables are the ones stored directly in the page configuration.

And the dynamic variables are the ones created by php at runtime.

Static variables can reference dynamic variables by using a special notation, which defaults to the following:

- ${myVar}

(a dollar symbol, followed by an opening curly bracket, then the dynamic variable name, then the closing curly bracket)


Dynamic variables were create to solve the problem of a widget which needs to display "Hello Tim",
where "Tim" is the name of the currently logged user, and "Hello" is just one of many variations of a greeting word 
(could have been Hi, Bonjour, Salut, Guten Tag, Welcome,...).

Because of the number of potential variations of the greeting world ("Hello" in this case), it has to be stored in the 
widget configuration (and hence in the page configuration): the other approach would be to create one template by variation, 
but this would obviously lead us to too many template files, that's not a practical solution.

So thanks to the dynamic variable concept, we can store this in the widget configuration:

- Hello ${user_name}

Which solves the problem.




Lazy reference resolver
----------------
2019-07-15


Like dynamic variables, the lazy reference resolver is a system which allows you to inject dynamic variables
into your templates. However, there is a difference.

With the dynamic variable system, you create the dynamic variable from the controller, and then pass it to the template
via the renderPage method.


With the lazy reference resolver mechanism, the idea is that you can call a variable generator directly from your page configuration.
This alleviates the burden on the controller a bit, and can lead to a cleaner code base.

The notation used by the lazy reference resolver is the following:

- (::XXX::), where XXX can be replaced by any string

Concrete examples include:

- (::METHOD_CALL::) 
- (::ROUTE::)


Each "string" is provided by an LazyReferenceResolver object which must be created separately.
See the MethodCallResolver and RouteResolver objects for some implementation examples.

As per now, the lazy reference resolver string must be the entire string and cannot be only a part of a string.

We can use the lazy reference resolver system to inject any kind of data into a key: so an string, an array, an object, ...









 

