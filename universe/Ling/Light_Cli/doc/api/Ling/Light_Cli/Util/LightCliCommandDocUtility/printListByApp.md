[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\Util\LightCliCommandDocUtility class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md)


LightCliCommandDocUtility::printListByApp
================



LightCliCommandDocUtility::printListByApp — Prints the list of commands for the given app(s) to the output.




Description
================


public [LightCliCommandDocUtility::printListByApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/printListByApp.md)(array $apps, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void




Prints the list of commands for the given app(s) to the output.

The apps array is an array of appId => LightCliApplicationInterface instance.

For more details about appId, read the [Light_Cli conception notes](https://github.com/lingtalfi/Light_Cli/blob/master/doc/pages/conception-notes.md).



Available options are:
- filter: string|int = null. A filter to apply to the list result. Only the results that match the filter (if defined) will be displayed.
     - If the filter is null, by default, the whole list of commands will be displayed
     - If the filter is an int, it will match only one command by its index (where index=given int)
     - If the filter is a string, the list will contain only results which match that string.
         We search in commands and aliases (see our conception notes for more details).
         By default, the filter matches if it's contained anywhere in the string.
         The special dollar symbol ($), when positioned at the beginning of the filter, indicates that the filter
         should match only if the rest of the filter is found at the beginning of the command name/alias.
         So for instance:

         - don will match "abandon" and "donut"
         - $don will match only "donut"

- verbose: bool=false. If true, the list will display all the information available about the command(s).
- displayIndexes: bool=true. Whether to display index numbers before the command names.
- displayAliases: bool=true. Whether to display alias commands.
- includeAppId: bool=true. Whether to prefix the appId in the command name (and a space separator).




Parameters
================


- apps

    

- output

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightCliCommandDocUtility::printListByApp](https://github.com/lingtalfi/Light_Cli/blob/master/Util/LightCliCommandDocUtility.php#L76-L259)


See Also
================

The [LightCliCommandDocUtility](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/__construct.md)<br>Next method: [buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/buildListFromCliApps.md)<br>

