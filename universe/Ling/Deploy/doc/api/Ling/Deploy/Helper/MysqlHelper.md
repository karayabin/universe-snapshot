[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The MysqlHelper class
================
2019-04-03 --> 2021-03-05






Introduction
============

The MysqlHelper class.



Class synopsis
==============


class <span class="pl-k">MysqlHelper</span>  {

- Methods
    - public static [getDatabasesConfigurationInfo](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/getDatabasesConfigurationInfo.md)(array $databaseIdentifiers, array $databasesConf, Ling\CliTools\Output\OutputInterface $output, int $indentLevel) : array | false
    - public static [getVersionNumber](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/getVersionNumber.md)() : string | false
    - public static [alterCollate](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/alterCollate.md)(string $file, string $newCollation) : void

}






Methods
==============

- [MysqlHelper::getDatabasesConfigurationInfo](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/getDatabasesConfigurationInfo.md) &ndash; and returns an array of databaseIdentifier => info item for every database identifier, or false if an error occurred.
- [MysqlHelper::getVersionNumber](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/getVersionNumber.md) &ndash; number can't be obtained.
- [MysqlHelper::alterCollate](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/alterCollate.md) &ndash; Replaces the collations found in the given $file with the given $newCollation.





Location
=============
Ling\Deploy\Helper\MysqlHelper<br>
See the source code of [Ling\Deploy\Helper\MysqlHelper](https://github.com/lingtalfi/Deploy/blob/master/Helper/MysqlHelper.php)



SeeAlso
==============
Previous class: [MapHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MapHelper.md)<br>Next class: [OptionHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/OptionHelper.md)<br>
