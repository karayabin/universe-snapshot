The ReflectionParameter class
================
2019-02-14




Introduction
---------------

The ReflectionParameter class retrieves information about function's or method's parameters.

To introspect function parameters, first create an instance of the ReflectionFunction or ReflectionMethod classes and then use their ReflectionFunctionAbstract::getParameters() method to retrieve an array of parameters. 


Class synopsis
----------------


ReflectionParameter implements [Reflector](#pou) {

- Properties
    - public [$name](#pou);

- Methods
    - public [allowsNull](#jp) ( void ) : bool
    - public [canBePassedByValue](#kok) ( void ) : bool
    - public [canBePassedByValue](#kok) ( void ) : bool
    - public [canBePassedByValue](#kok) ( void ) : bool

}


Properties
--------------

- name

    Name of the parameter. Read-only, throws ReflectionException in attempt to write.


Methods
--------------

- [ReflectionParameter::allowsNull](#pou) — Checks if null is allowed
- [ReflectionParameter::allowsNull](#pou) — Checks if null is allowed
- [ReflectionParameter::allowsNull](#pou) — Checks if null is allowed

