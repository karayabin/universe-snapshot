[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The DuelistEngineInterface class
================
2019-08-12 --> 2021-07-30






Introduction
============

The DuelistEngineInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">DuelistEngineInterface</span>  {

- Methods
    - abstract public [getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface/getRowsInfo.md)(string $requestId, array $duelistDeclaration, array $tags) : array | false
    - abstract public [getError](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface/getError.md)() : string | null

}






Methods
==============

- [DuelistEngineInterface::getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface/getRowsInfo.md) &ndash; Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.
- [DuelistEngineInterface::getError](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface/getError.md) &ndash; Returns the error message if any, or null otherwise.





Location
=============
Ling\Light_Realist\DuelistEngine\DuelistEngineInterface<br>
See the source code of [Ling\Light_Realist\DuelistEngine\DuelistEngineInterface](https://github.com/lingtalfi/Light_Realist/blob/master/DuelistEngine/DuelistEngineInterface.php)



SeeAlso
==============
Previous class: [DeveloperVariableProviderInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DeveloperVariableProvider/DeveloperVariableProviderInterface.md)<br>Next class: [MysqlDuelistEngine](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine.md)<br>
