ECP protocol
==================
2017-11-20



Ecp (Ekom communication protocol) is a protocol that I developed while creating
the ekom module (an e-commerce module for my company).


Ecp defines a simple communication protocol over http for your application to make ajax requests.





General organization 
==================

Ecp listens to an action identifier, and returns some json data.

The action identifier is a string passed as a $_GET parameter (using the action parameter).

It's composed of two elements:

- action identifier: <recommendedActionIdentifier> | <yourOwnId> 
- recommendedActionIdentifier: <serviceNamespace> <.> <serviceName>
- serviceNamespace: this should represent the object you are going to alter,
                    or the object of the api you want to interact with.
- serviceName: the name of the service you want to execute.
- yourOwnId: a string
                
 
Other params are passed via $_POST.                    



ECP
========

Ecp codifies the different outcomes of a script.
When an ecp service is called, it always return a json payload potentially containing the following:

- $$success$$: if this key exists, it's a success notification message intended for the public user 
- $$error$$: if this key exists, this is an error message intended for the 
            public user (i.e. the customer).
            It's assumed that a js layer displays this error message to the user.
            
            The idea is that if a dev error occurs server side, a public generic error message
            is shown to the user, while the error is logged server side.
            So that the devs can work on the errors, while the public user is not bothered with/aware of
            the technical details of a dev error.
            That explains why there is no $$devError$$ level.
             
            
- $$invalid$$: if this key exists, this means that the parameters passed to the service
                aren't sufficient to execute the service correctly.
                
                The js layer shall console.log the error message, that's a developer
                error which should be fixed asap.
                
                Server side, this type of error is not logged by default,
                but a hook allows you to do so with your modules. 
- ...all other properties expected by the caller. 
        Those are returned when the service was successfully executed.                 



Js layer
============

You are responsible for creating the corresponding the js api that interprets the ecp messages correctly ($$success$$,
$$error$$, ...)


