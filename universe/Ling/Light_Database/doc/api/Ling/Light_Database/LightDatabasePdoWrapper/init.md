[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::init
================



LightDatabasePdoWrapper::init — Creates the pdo instance and attaches it to this instance.




Description
================


public [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md)(array $settings) : void




Creates the pdo instance and attaches it to this instance.
The settings array expects the following keys:

- ?pdo_driver: the pdo driver to use (i.e. mysql, sqlite, ...). The default is mysql.
     See the pdo documentation for more details.
- pdo_database: the name of the (main) database.
- pdo_user: the name of the database user.
- pdo_pass: the password for the database user.
- ?pdo_host: the host of the pdo dsn if any. For instance: localhost, or 127.0.0.1.
         By default the value will be localhost.
- ?pdo_socket: the path to socket to use (this replaces the pdo_host setting).
- ?pdo_port: the number of the port to connect to.
- ?pdo_options: an array of options to pass to the pdo instance.
     Available options are the based on the php pdo options.
     The currently implemented options are the following:
     - persistent: bool
     - errmode: string (warning|exception|silent)
     - initCommand: string, example: SET NAMES 'UTF8'   (the initCommand option is specific to the mysql driver)



Note: as for now, only the driver invocation technique is used to create the DSN (i.e. the
uri invocation and aliasing technique are not yet implemented).


If the pdo connection fails, a LightDatabaseException exception is thrown,
which doesn't reveal the pdo credentials, for security reason.
Note: if you want to get the error message of the original exception, you can access it using the
getConnectionException method.




Parameters
================


- settings

    


Return values
================

Returns void.


Exceptions thrown
================

- [LightDatabaseException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Exception/LightDatabaseException.md).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L92-L149)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/__construct.md)<br>Next method: [getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)<br>

