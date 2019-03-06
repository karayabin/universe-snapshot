Sic
========
2019-01-20 --> 2019-02-06


Sic stands for "Service instantiation code".

It's an array notation to describe services instantiation in a services oriented environment.

In this document, I will write arrays in [babyYaml notation](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/BabyYaml) for clarity.





Summary
=======

- [Notation (abstract)](#notation-abstract)
- [Examples](#examples)
    - [Example #1 an instance](#example-1-an-instance)
    - [Example #2 an instance with constructor arguments](#example-2-an-instance-with-constructor-arguments)
    - [Example #3 an instance with the same method called multiple times](#example-3-an-instance-with-the-same-method-called-multiple-times)
    - [Example #4 using a service in the args](#example-4-using-a-service-in-the-args)
    - [Example #5 a callable](#example-5-a-callable)
- [Description](#description)
- [Related tools](#related-tools)









Notation (abstract)
-------------------


To define a sic element (service or a callable), we use a sic block: an array
which notation is represented below:


```yml

instance: string, the class name
?constructor_args: array, each entry of which is passed as an argument to the constructor
?callable_method: string, the callable method name. This will return a callable (otherwise, the instance will be returned).
?methods:
    $method_name: # array of arguments, or empty if no argument is used
        - $arg1
        - $arg2
        - ...
?methods_collection: # same goal as methods, but allows us to call the same method name multiple times (it's an alternative notation of methods)
    - $n:   # any index
        method: name of the method
        args: # or empty if no argument is used, or empty if no argument is used
            - $arg1
            - $arg2
            - ...
?$passKey: any value, if defined, will invalidate the sic block. This is useful if you want to use an array in an argument that looks like
            a sic block but isn't really one (i.e. an array containing an instance key for instance).
            The pass key has to be chosen by the implementor, and should be consistent across her project/application.
            For instance, if it fits your case, you could use the following: __pass__.
            The pass key might be removed (if found) by an interpreter, so that the intent of the array is not altered.

```



See the [examples section](#examples) for more details.


Note: if both **methods** and **methods_collection** are defined, **methods** is executed first.


Note that **sic** is just a notation and doesn't provide any tool for implementing such a system.
See the [Related tools section](#tools) for more details.







Examples
----------

Here is what it looks like:


### Example #1 an instance

```yaml
instance: Jin\Log\Listener\FileLoggerListener
methods:
    configure:
        -
            file: ${appDir}/log/jin.log
            isFileRotationEnabled: true
            maxFileSize: 2M
            rotatedFileExtension: log
            zipRotatedFiles: true
```


### Example #2 an instance with constructor arguments

```yaml
instance: Jin\Log\Listener\FileLoggerListener
constructor_args:
    - arg1
    - arg2
methods:
    configure:
        -
            file: ${appDir}/log/jin.log
            isFileRotationEnabled: true
            maxFileSize: 2M
            rotatedFileExtension: log
            zipRotatedFiles: true
```



### Example #3 an instance with the same method called multiple times

```yaml
instance: Jin\Log\Listener\Imaginary
methods_collection:
    -
        method: askForMore
        args:
            - arg1
            - arg2
    -
        method: askForMore
        args:
            - arg3
            - arg4
```



### Example #4 using a service in the args

```yaml
instance: Jin\Log\Listener\Imaginary
methods:
    setMailer:
        0:
            instance: Imaginary\Mailer\MailerService

```

The example above will create an instance of **Jin\Log\Listener\Imaginary**,
and then call its **setMailer** method, with a new instance of **Imaginary\Mailer\MailerService** as the only argument.







### Example #5 a callable
```yaml
instance: Jin\HttpRequestLifecycle\PreRouting\RequestLog
callable_method: handleRequest
```
















Related Tools
-------------


- [Sic Tools](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/SicTools), low level tools to help you implement your own "sic" service containers
- [Octopus](https://github.com/lingtalfi/Octopus), a service container for your app


