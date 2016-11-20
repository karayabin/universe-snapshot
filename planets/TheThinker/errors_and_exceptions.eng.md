Errors and exceptions
==========================
2015-12-20


When would you return false, when would you throw an exception?


I've been striving for the answer for a long time, but I still haven't found the perfect answer yet.
So here are just a couple of random thoughts which I believe, should be considered when 
designing an application error handling system.







Easing work with specific exceptions
--------------------------------------
 
Some developers like to catch specific exceptions:

```php
try{}
catch(MySpecificException $e){

}
```
For the sake of simplicity, it's better when you use a tool called ZZTool
that this tool thrown only exceptions of type ZZToolException for instance (otherwise, you will have 
to check for every method which exception is thrown).
Therefore, in this perspective, it makes sense that low level tools have the flexibility to not throw 
an exception (so that both end users and developers can use them), 
while high level tools could throw specific exceptions.
 




Pros and coins of exceptions vs traditional errors
------------------------------------

Assuming your code is well documented.



### errors, returning false

+ You don't need to create an error message.
+ The user of your method has a lot of flexibility



Who is the target?
------------------------
2015-12-29


Considering two targets: the developer and the front end user,
if you know for sure the target of your code,
then as a general rule of thumb, I use this simple rule:

    - target is the developer: throw exception
    - target is front end user: think again



