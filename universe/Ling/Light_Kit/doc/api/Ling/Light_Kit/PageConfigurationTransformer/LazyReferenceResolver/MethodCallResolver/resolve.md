[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)<br>
[Back to the Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver\MethodCallResolver class](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.md)


MethodCallResolver::resolve
================



MethodCallResolver::resolve — Interprets the given $expr and returns the result.




Description
================


public [MethodCallResolver::resolve](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver/resolve.md)(string $expr) : mixed




Interprets the given $expr and returns the result.

The given $expr should have one of the following format:

- $class::$method
- $class::$method($args)


With:
- $class: the full class name (i.e. Ling\Light_Kit\PageConfigurationTransformer\Blabla)
- $method: the method name
- $args: a list of args written in [shortcode notation](https://github.com/lingtalfi/Bat/blob/master/ShortCodeTool.md#parse)




Parameters
================


- expr

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







See Also
================

The [MethodCallResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.md) class.



