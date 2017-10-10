Off protocol
=================
2017-07-27




This protocol describes the ajax communication between a js script and a php service,
the goal being to post a form via ajax.




In and out
==================

To understand this protocol, we only need to understand what goes in the php service, and what goes out the php service.



In
------

- the form data as a query string (the jquery serialize method for forms does just that).
            It looks like this:
                first_name=pierre&last_name=todo&age=39

Out
--------

There are three possible responses: 

- error
- formerror
- success



### The error response

The error response is triggered when something exceptionally bad happens, something unexpected, for instance the
user is not logged in and she was supposed to be logged in.
This is something the user shouldn't see (no public error message).


- type: error
- error: the error message


### The formerror response

The form error response means that the service was able to reach the onTheFlyForm code,
but the code could not totally fulfill its goal(s): maybe a form validation error occurred, or 
an error message was set.

In this case there should be a public error message displayed to the user.

 
- type: formerror
- model:  a subset of the off form model, see the README at the root of this repository,
            containing the following entries:
            
            (form level)
            - isSuccess
            - validationOk
            - successMessage
            - errorMessage
            - _formErrors
            (control level)
            - only the errorX fields (we don't need the nameX and valueX fields since they have already been displayed)
            
            

### the success response
       

The form was processed successfully (no validation error message, and no error message).

- type: success
- model: same as model in the formerror response
- data: extra data that the application might want to transmit






Context
----------
An example use case is the following: the user creates an account and the log in.

She now goes into the myAccount page, and she has a myContact page where she can manage her contacts.

There is a button: "add Contact".

When she clicks on it, a modal pops out with the "add contact form" inside.

She fills the form and click the **submit** button.

The form data transits via ajax (we will describe how more precisely in this document), and the response
is treated accordingly:

- if the form is successful, then the new contact appears in the user's contact list
- if the form is erroneous, then the errors appear in the form


Now, she wants to update the contact she has just created, so she clicks the "update contact button".

The form appears again, in a modal as before, but this time the fields are pre-filled.

An ajax request was performed, and the id of the contact was passed,

Again, she fills the form and click the **submit** button.

The form data transits again via ajax, same as before, and the response is treated accordingly, same as before.

- if the form is successful, then the contact list is updated with the new information
- if the form is erroneous, then the errors appear in the form

 

