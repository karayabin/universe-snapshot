[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\Util\LightCliCommandDocUtility class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md)


LightCliCommandDocUtility::buildListFromCliApps
================



LightCliCommandDocUtility::buildListFromCliApps — Builds and returns a list of all appId command and aliases.




Description
================


public static [LightCliCommandDocUtility::buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/buildListFromCliApps.md)(array $cliApps, ?array $options = []) : array




Builds and returns a list of all appId command and aliases.

The array is the one described in the conception notes, it basically contains all information.

It's an array of trigger id (an int) => item, each item has the following structure:
- index: int, the index number for this command
- type: string (alias|appCommand), the type of the trigger
- name: string, the name of the appCommand or alias
- ?dest: string, only for alias: the full command the alias is referring to
- ?description: string, the description of the appCommand. This is just for appCommands, aliases don't have a description.

The extra properties below are only available when options.args=true, and for appCommands only (i.e. not aliases)

- flags: array of name => description
- options: array of name => description|list, with list an array of name => ?description.
- parameters: array of name => description


Available options are:
- includeAppId: bool=true, whether to include the appId in the command name.




Parameters
================


- cliApps

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightCliCommandDocUtility::buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/Util/LightCliCommandDocUtility.php#L301-L363)


See Also
================

The [LightCliCommandDocUtility](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md) class.

Previous method: [printListByApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/printListByApp.md)<br>Next method: [indent](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/indent.md)<br>

