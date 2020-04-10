[Back to the Ling/Light_Bullsheet api](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet.md)<br>
[Back to the Ling\Light_Bullsheet\Bullsheeter\LightBullsheeterInterface class](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md)


LightBullsheeterInterface::generateRows
================



LightBullsheeterInterface::generateRows — Populates the database with $nbRows random rows in the appropriate table(s).




Description
================


abstract public [LightBullsheeterInterface::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface/generateRows.md)(int $nbRows, ?array $options = []) : void




Populates the database with $nbRows random rows in the appropriate table(s).

The options is an extra array that the developer can pass to its bullsheeter instance.




Parameters
================


- nbRows

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;
When something goes wrong.






Source Code
===========
See the source code for method [LightBullsheeterInterface::generateRows](https://github.com/lingtalfi/Light_Bullsheet/blob/master/Bullsheeter/LightBullsheeterInterface.php#L25-L25)


See Also
================

The [LightBullsheeterInterface](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md) class.



