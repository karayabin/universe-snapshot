Ajax permission philosophy
==========
2020-08-21




Where do you check for permissions?


In a web application with users, users have different permissions, for instance the admin can edit a table where the user cannot.


So, where in your code should we check for those permissions.



The short answer is: as soon as you've identified the action to be executed.

Now for the long answer.


Although the short answer seems obvious now, I actually struggled a lot (i.e. until today) with this one, trying different things: trying to check the permissions at the lowest level in a crud plugin (i.e. the api level
when the actual call to the database was made). The problem is that I kept asking the same question every time I encountered the problem, coming with different solutions every time, and thus adding inconsistency paths to the framework in general.

Now it makes sense that this kind of question should have a unique answer, used consistently across the whole framework, and that's what I'm going for today, by writing down this unique answer.


I believe the best ideas come from a mind that has a global vision of things, and so below I describe the global elements involved in an ajax communication, with the intended goal of making the answer to the problem obvious.


So in a web application, ajax services are like standalone scripts that users can call whenever they want.

However, an ajax service has a very specific goal, such as for instance deleting a record, or updating the status of a record, etc...

This action can always be referred to by an identifier.

The actors of the ajax communication, in light, are most of the time the following:

- a [service provider](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#provider-service-subscriber-service)
- a [service subscriber](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#provider-service-subscriber-service)


The subscriber initiates the communication by sending via ajax this action identifier.

The provider receives the action identifier, and executes the corresponding method.

A good example of this mechanism is the wonderful [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler), which does exactly that.


Now back to the topic, where do you check the permissions?

You might be tempted to check the permissions inside the api method. Don't do that, ever (I did, and I paid the price).

A good reason to not doing that is that it will parasites your api method with code that has nothing to do with your business in the first place.

By that I mean the permission checking is an extra business layer that is added on top of your api logic, and you should never merge those, because
it will just add complexity to your business logic. 

Instead, the permission problem is really simple: when you know the action identifier, check if the user is allowed to execute it.
This is done by the service provider when it receives the action identifier.


Now, we took care of the permission problem, all that is left is to name your action identifiers correctly, and create the correlation between those action identifiers, and the permissions
necessary to execute them. 
 






