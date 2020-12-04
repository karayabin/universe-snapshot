Light execute notation
=============
2020-08-14 -> 2020-12-03




The **light execute notation** allows for plugin authors to use a syntax to call methods from php classes and/or light services.


The notation must have one of the following format:


- $class::$method
- $class::$method ( $args )

- $class->$method
- $class->$method ( $args )

- @$service->$method
- @$service->$method ( $args )


With:

- $class: the full class name (example: Ling\Bat)
- $method: the name of the method to execute
- $args: a list of arguments written with [smartCode notation](https://github.com/lingtalfi/NotationFan/blob/master/smart-code.md).
             Note: we can use regular php notation as it's a subset of the smartCode notation.
- $service: the name of the service to call. The special name "container" is reserved to access the container itself (i.e. useful if you
    need to access the "has" method of the container for instance).


Note: if the class (i.e. not a service) needs to be instantiated, we just call the class constructor without arguments.




light execute notation with light pmp wrapper
-----------
2020-12-03


When there is a potential interpretation conflict with other notations, the **light execute notation** is often
wrapped inside what we call the **light pmp wrapper**.  The **light pmp wrapper** is a [pmp wrapper](https://github.com/lingtalfi/ParenthesisMirrorParser) with a double colon identifier (::).


So, for instance:

- ::(  $class->$method ( $args )  )::


You'll find this notation in configuration files for instance.


Note: in the above example I added extra whitespace for reading clarity, but usually you'll use a more compact form without
any whitespace, although both forms are functionally equivalent.



By convention, the double colon identifier inside configuration files is reserved for the **light execute notation**; other plugins
might use different notations with different pmp wrapper identifiers.
 




Using the notation in configuration files
-----------
2020-11-27 -> 2020-12-03


See the [light execute notation with light pmp wrapper](#light-execute-notation-with-light-pmp-wrapper) section.








Related tools
---------
2020-08-14


- [The LightHelper::executeMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeMethod.md)
- [The LightHelper::executeParenthesisWrappersByArray](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeParenthesisWrappersByArray.md)
