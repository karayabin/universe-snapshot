[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Util\ImportUtil class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil.md)


ImportUtil::importPlanet
================



ImportUtil::importPlanet — Imports a planet using the algorithm defined in the **importItem** method of this class.




Description
================


public [ImportUtil::importPlanet](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importPlanet.md)(string $longPlanetName, [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application, Ling\CliTools\Output\OutputInterface $output, array $options = []) : void




Imports a planet using the algorithm defined in the **importItem** method of this class.
See the [importItem method](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importItem.md) for more details.




Parameters
================


- longPlanetName

    The long planet name: galaxy/planetShortName.

- application

    

- output

    

- options

    See the importItem method options argument for more details.


Return values
================

Returns void.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







See Also
================

The [ImportUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil.md) class.

Previous method: [setErrorSummary](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/setErrorSummary.md)<br>Next method: [importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importItem.md)<br>

