[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)<br>
[Back to the Ling\Deploy\Helper\MysqlHelper class](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper.md)


MysqlHelper::getDatabasesConfigurationInfo
================



MysqlHelper::getDatabasesConfigurationInfo — and returns an array of databaseIdentifier => info item for every database identifier, or false if an error occurred.




Description
================


public static [MysqlHelper::getDatabasesConfigurationInfo](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/getDatabasesConfigurationInfo.md)(array $databaseIdentifiers, array $databasesConf, Ling\CliTools\Output\OutputInterface $output, int $indentLevel) : array | false




Checks that every passed databaseIdentifier has proper configuration (user, name, pass),
and returns an array of databaseIdentifier => info item for every database identifier, or false if an error occurred.
Each info item has the following structure:

- 0: databaseIdentifier
- 1: name
- 2: user
- 3: pass



This method will also print a message explaining what happens on the console screen.
In case of success, the message will look something like this:

```txt
- Checking the databases configuration...ok
```


```txt
In case of failure, the message will look like this:
- Checking the databases configuration...oops
- The following errors occurred:
- ----> blabla
- ----> blabla
```




Parameters
================


- databaseIdentifiers

    

- databasesConf

    

- output

    

- indentLevel

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [MysqlHelper::getDatabasesConfigurationInfo](https://github.com/lingtalfi/Deploy/blob/master/Helper/MysqlHelper.php#L58-L105)


See Also
================

The [MysqlHelper](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper.md) class.

Next method: [getVersionNumber](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Helper/MysqlHelper/getVersionNumber.md)<br>

