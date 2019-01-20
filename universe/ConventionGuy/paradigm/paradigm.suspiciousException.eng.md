Suspicious Exception Paradigm
=================
2016-01-20



Ok, you know how we are all paranoids with data coming from the users;
you might have heard: never trust users data.

And that's for a good reason.

So now the mood is set.

Your app probably has a system to convert a caught exception to a log.

Sometimes, you want to have more information in your log, than just the exception message.
For instance, sometimes I would like to have the IP of the user, or the content of some environments variables
(like the $_POST and $_GET arrays in php). 

But on the other end, I don't want to manually pass those variables to my log system, there should be a more intuitive way
to do it. 


So this paradigm is a workflow that does just that.

1. Create a log function in your application, that logs every caught exception.
2. Create an exception interface called SuspiciousExceptionInterface, or whatever name works for you.
3. In your application's log function, do once the special treatment when you detect the suspicious exception:
            for instance, append the server environment variables to the log message.
4. Now, your system is ready. Just throw an exception that implements the SuspiciousExceptionInterface 
        every time you want extra info in your log files.
        




Note: 
pushing the concept further, you can easily create multiple levels of Exception, with a different handling 
for every type of exception.




                
                
Related
-------------

- [SuspiciousException](https://github.com/lingtalfi/SuspiciousException), a php implementation of the SuspiciousExceptionInterface.







 



