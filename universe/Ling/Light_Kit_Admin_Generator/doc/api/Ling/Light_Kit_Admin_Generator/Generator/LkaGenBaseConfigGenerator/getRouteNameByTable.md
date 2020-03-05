[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)<br>
[Back to the Ling\Light_Kit_Admin_Generator\Generator\LkaGenBaseConfigGenerator class](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator.md)


LkaGenBaseConfigGenerator::getRouteNameByTable
================



LkaGenBaseConfigGenerator::getRouteNameByTable — Returns the route name based on the given table.




Description
================


protected [LkaGenBaseConfigGenerator::getRouteNameByTable](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator/getRouteNameByTable.md)(string $table, array $config, ?bool $isListRoute = true) : string




Returns the route name based on the given table.
By default, it returns the list route.
To return the form route, set isListRoute to false.




Parameters
================


- table

    

- config

    

- isListRoute

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LkaGenBaseConfigGenerator::getRouteNameByTable](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Generator/LkaGenBaseConfigGenerator.php#L29-L37)


See Also
================

The [LkaGenBaseConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/LkaGenBaseConfigGenerator.md) class.



