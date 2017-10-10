Adaptors
============
2017-07-26




Forms are used a lot on applications.
There are two main types of form:

- form to collect punctual data
- form to represent a state of an object or thing in the application


The main difference being that the former comes empty, whereas the latter is pre-filled with the data
representing the thing.


But where does that data come from?

Often, it comes from a database, but more generally speaking, it comes from somewhere that we call input in this document.


Then, the form is posted, and maybe the data needs to be prepared before it is written in somewhere that we call output in this document.


The best example I have is a birthday date.

Imagine that the input and output is the same database, and in the database the birthday is stored as a mysql DATE type.

So, we all know that the format of a DATE is yyyy-mm-dd.

That's the format we have, the format we pass to the OnTheFlyForm instance, and the format we expect to take out from the OnTheFlyForm instance.


However at the form template level, for practical reasons, we prefer to display a date as 3 separate components:
 
- a select representing the year  
- a select representing the month  
- a select representing the day

So indeed, from an OnTheFlyForm instance's perspective, we need 3 different variables: for instance birthday_year,
birthday_month and birthday_day.



The input adaptor
=================

So, the first idea is to plug an InputAdaptor in our OnTheFlyForm instance, so that when we inject the default values,
it really creates the fields we need concretely.

Note that we don't need this mechanism when the data comes from the user (when the data comes from the form),
because if the data comes the form, it already is formatted the way we want.


So, that's the second argument of the inject method being set to true. 




The output adaptor
=================

The second thing we want is that when we receive the posted data, the 3 birthday fields (birthday_year, birthday_month
and birthday_day) get compiled back into one single birthday field (using mysql DATE format).


Sometimes we will need an output adaptor, and other times we won't.

To avoid asking the question every time, we use a unique getData method, which gives us the data we want to work with once the form has been validated.


  

