Sic
========
2019-01-20 --> 2019-02-05


Sic stands for "Service instantiation code".

It's an array notation to describe services instantiation in a services oriented environment.

In this document, I will write arrays in [babyYaml notation](https://github.com/karayabin/universe-snapshot/tree/master/universe/BabyYaml) for clarity.





Summary
=======

- [Notation (abstract)](#notation-abstract)
- [Examples](#examples)
    - [Example #1 an instance](#example-1-an-instance)
    - [Example #2 an instance with constructor arguments](#example-2-an-instance-with-constructor-arguments)
    - [Example #3 an instance with the same method called multiple times](#example-3-an-instance-with-the-same-method-called-multiple-times)
    - [Example #4 a callable](#example-4-a-callable)
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

```


See the [examples section](#examples) for more details.


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




### Example #4 a callable
```yaml
instance: Jin\HttpRequestLifecycle\PreRouting\RequestLog
callable_method: handleRequest
```
















Related Tools
-------------

Yep buddy, no tools for now, sorry (try again on march 1st 2019 maybe?).

- TODO...


