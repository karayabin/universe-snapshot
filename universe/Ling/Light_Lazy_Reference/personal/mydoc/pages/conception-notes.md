Lazy Reference
==============
2019-07-04





Intro
---------

How do you inject dynamic data in an array?


Disclaimer: there was already a system for that implemented in Light_Kit, named pageConfTransformers with a Dynamic variable transformer
(see the [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md) method for more details), but I forgot about it when I wrote this document,
so now we can choose between two different mechanisms to achieve similar results.

 




For instance, imagine you have a [babyYaml](https://github.com/lingtalfi/BabyYaml) file containing
the configuration of your page, and one of the entry is named user_messages and represents a list of messages.

You expect the list of messages to contain a dynamic list of messages coming from the database, and so you can't 
hardcode them in your configuration file, because the messages will change over time, but you only write
to your configuration file once.

And so a natural solution that comes to mind is to replace the list of messages by a call to the list of messages,
and then resolve this call only when the list of messages is actually called.


This is what this plugin proposes: a system to create lazy references, so that you can resolve dynamic data in your static data.



How does it work?
----------

We need two things:
- the lazy reference notation
- a mechanism to resolve the lazy reference notation

We will pack those two things into a service, so that when you want to resolve a potential lazy reference notation, you just
call the resolve method of the service.

The service instance will be prepared before hand with all the mechanisms bound/registered to it.


### The lazy reference notation


By convention, this plugin uses the following notation:

- user_messages: ```<TOKEN>whatever```


With:

- TOKEN being replaced with the name of the mechanism to call
- whatever being whichever argument should be passed to the called resolution mechanism



For instance:

- user_messages: <METHOD_CALL>MyNameSpace\DataExtractor\UserMessagesDataExtractor::extractForHeader(5)

 
The important bit is that the token is encapsulated within angular brackets, that's how this plugin knows that what follows
is a lazy reference.



### The lazy reference resolution mechanism

This plugin defines no particular rules for how you should create a resolution mechanism, except that this should be a callable.

This callable will be passed the "whatever" part of the notation as an argument, and should return whatever data you would expect from it.


Note: I hesitated between making the mechanism a callable or an instance of LazyReferenceResolverInterface (for instance).
I eventually opted for the first option, as it gives more flexibility, the developer doesn't have to reference an external interface,
it basically gives more freedom vs a well organized structure, freedom being the motivation behind Light. 







