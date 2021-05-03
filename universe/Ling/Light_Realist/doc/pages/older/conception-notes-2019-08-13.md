Conception notes
==================
2019-08-13




The goal of realist is to be the medium between the developer and the (my)sql database as far as fetching rows 
is concerned.

In other words, realist's goal is to be an interface to the sql database when you fetch rows.





This is a work in progress.

I realized that I couldn't create a good enough implementation without concrete problems from my own applications.
My first try is some abstract thoughts around the subject, in [conception-notes-2019-08-12.md](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/conception-notes-2019-08-12.md).
But they are not based on a tangible reality, but rather on a vague remembering of it, and unfortunately this is not good enough,
because if you're not 100% sure of what you're doing during the conception, you're going to crash into a wall some day later 
(I'm specialized in that), so I don't like them.
I'd rather start over.


So now I'll wait for the problem to come before my eyes, and then implement the solution.


However, I've got some basic ideas to get started.


Nomenclature
-----------
- request: a sql request
             



Types of requests
------------------

Here are the types of requests I came across so far.

- dev request: 

        The name might change, but basically it's this request that the developer uses 
        for instance to get the list of users (or any other objects) that shes wants to display in a select for a form.
        The request is very precise and doesn't require external help.
        It's self contained.
        
        It looks like this:
            - select * from users u (inner join...) where u.type=whatever order by u.name asc
            
        Another name for this type of request could be:
        - non parametrized request
        - direct request
        - static request
        - single author request
        - standalone request
        - developer/application request
        
        Often, a human creates this request. However, when you create tools such as an auto-admin, your
        classes might create this request automatically for you, so it can be also the code itself that
        generates that request.
        
        Also, it can have some kind of dynamism, for instance if you want to list all the products that belongs to 
        a particular user, you need to inject the user id in the request:
            
            - select * from items i inner join users u on u.id=i.user_id where u.id=78 order by i.name asc
        
        And so there is some kind of dynamism, but the developer (or an object on the behalf of the developer)
        will be able to write it without external help.
        
        In other words, given the context of the application, it's still a static request inside that context.
        
        So that's the first type of request: a request created not collaboratively.             
        
- gui request:

        Again, the name might change, but basically this request is one which the gui can interact with.
        I've no special idea of the implementation at the moment, but you know those parameters:
        
        - sort                          (-> will update the order clause of the request)    
        - page, nb of items per page    (-> will update the limit clause of the request)     
        - search filters                (-> will update the where clause of the request)
            







Cache
--------------

Cache is an important aspect in almost any areas of an application: it's always a good thing if your app can perform better.

Rather than querying your database again and again, it might be faster to take the data from a file directly.

And so, we might want to cache some of our requests some days.

Hence, realist provides a cacheId option, which is just a cache identifier that you provide with your request if you want to cache
it (by default, and that's important, realist WILL NOT CACHE the request automatically).


What does realist do with the cacheId?

By default nothing, but it will pass it to whatever cache system you've hook to it.

So the idea here is that you can hook a cache service to realist.

I've not created a cache system, but I've thought of one that I would name Light_Cachalot, which would basically cache anything.
You just pass an identifier and a data, and that's it.

You can also attach some cache strategy to the identifier (using the service configuration), so that the cache knows more about 
when, how,... to perform.
  
But that's not our concern here.

Realist just provides a cacheId facade option for you to use it if you want to.  
  








