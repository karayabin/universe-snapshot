Sic
========
2019-01-20


Sic stands for "Service instantiation code".

It's an array notation to describe services instantiation in a services oriented environment.

In this document, I will write arrays in [babyYaml notation](https://github.com/karayabin/universe-snapshot/tree/master/universe/BabyYaml) for clarity.





Summary
=======

- [Notation (abstract)](#notation-abstract)
- [Examples](#examples)
    - [Example #1 an instance](#example-1-an-instance)
    - [Example #2 a callable](#example-2-a-callable)
- [Description](#description)
- [Related tools](#related-tools)









Notation (abstract)
-------------------


To define a sic element (service or a callable), we use a sic block: an array
which notation is represented below:


```yml

instance: string, the class name
?callable_method: string, the callable method name. This will return a callable (otherwise, the instance will be returned).
?methods:
    $method_name:
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


### Example #2 a callable
```yaml
instance: Jin\HttpRequestLifecycle\PreRouting\RequestLog
callable_method: handleRequest
```
















Related Tools
-------------

Yep buddy, no tools for now, sorry (try again on march 1st 2019 maybe?).

- TODO...


