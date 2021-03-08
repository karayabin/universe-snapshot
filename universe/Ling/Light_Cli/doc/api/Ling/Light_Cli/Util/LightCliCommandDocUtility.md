[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)



The LightCliCommandDocUtility class
================
2021-01-07 --> 2021-03-05






Introduction
============

The LightCliCommandDocUtility class.



Class synopsis
==============


class <span class="pl-k">LightCliCommandDocUtility</span>  {

- Properties
    - private int [$indentInc](#property-indentInc) ;
    - private array [$listCache](#property-listCache) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/__construct.md)() : void
    - public [printListByApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/printListByApp.md)(array $apps, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - public static [buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/buildListFromCliApps.md)(array $cliApps, ?array $options = []) : array
    - private [indent](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/indent.md)(string $s, int $indentLevel) : string
    - private [trimLongText](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/trimLongText.md)(?string $description = null) : string
    - private [getIndexByCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/getIndexByCommand.md)(string $cmdName, array $list) : int
    - private [filterMatch](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/filterMatch.md)(string $filter, string $expr) : bool
    - private [error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-indentInc"><b>indentInc</b></span>

    This property holds the indentInc for this instance.
    
    

- <span id="property-listCache"><b>listCache</b></span>

    This property holds the listCache for this instance.
    
    



Methods
==============

- [LightCliCommandDocUtility::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/__construct.md) &ndash; Builds the LightCliCommandDocUtility instance.
- [LightCliCommandDocUtility::printListByApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/printListByApp.md) &ndash; Prints the list of commands for the given app(s) to the output.
- [LightCliCommandDocUtility::buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/buildListFromCliApps.md) &ndash; Builds and returns a list of all appId commands.
- [LightCliCommandDocUtility::indent](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/indent.md) &ndash; Returns the given string with the first line indented by the given indentLevel, and subsequent lines indented with the given number + $indentInc.
- [LightCliCommandDocUtility::trimLongText](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/trimLongText.md) &ndash; Returns a trimmed version of the given description.
- [LightCliCommandDocUtility::getIndexByCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/getIndexByCommand.md) &ndash; Returns the index number of the given command.
- [LightCliCommandDocUtility::filterMatch](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/filterMatch.md) &ndash; Returns whether the given filter matches the given expression.
- [LightCliCommandDocUtility::error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Cli\Util\LightCliCommandDocUtility<br>
See the source code of [Ling\Light_Cli\Util\LightCliCommandDocUtility](https://github.com/lingtalfi/Light_Cli/blob/master/Util/LightCliCommandDocUtility.php)



SeeAlso
==============
Previous class: [LightCliService](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService.md)<br>
