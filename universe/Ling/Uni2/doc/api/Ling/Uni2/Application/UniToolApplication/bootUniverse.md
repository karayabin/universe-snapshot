[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Application\UniToolApplication class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md)


UniToolApplication::bootUniverse
================



UniToolApplication::bootUniverse — Ensure that the universe exists under the current application directory.




Description
================


public [UniToolApplication::bootUniverse](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/bootUniverse.md)(Ling\CliTools\Output\OutputInterface $output) : void




Ensure that the universe exists under the current application directory.

If the universe directory doesn't exist yet, a primitive universe is created,
containing:

- the bigbang.php script
- the Ling/BumbleBee autoloader




Parameters
================


- output

    


Return values
================

Returns void.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







Source Code
===========
See the source code for method [UniToolApplication::bootUniverse](https://github.com/lingtalfi/Uni2/blob/master/Application/UniToolApplication.php#L338-L375)


See Also
================

The [UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) class.

Previous method: [checkUniverseDirectory](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/checkUniverseDirectory.md)<br>Next method: [getConfFile](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication/getConfFile.md)<br>

