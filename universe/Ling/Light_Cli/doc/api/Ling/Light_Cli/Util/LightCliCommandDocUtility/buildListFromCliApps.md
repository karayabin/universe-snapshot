[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\Util\LightCliCommandDocUtility class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md)


LightCliCommandDocUtility::buildListFromCliApps
================



LightCliCommandDocUtility::buildListFromCliApps — Builds and returns a list of all appId commands.




Description
================


public static [LightCliCommandDocUtility::buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/buildListFromCliApps.md)(array $cliApps, ?array $options = []) : array




Builds and returns a list of all appId commands.

It's an array of index (an int) => item, each item has the following structure:
- index: int, the index number for this command
- name: string, the name of the appCommand
- description: string, the description of the appCommand
- flags: array of name => description
- options: array of name => description|list, with list an array of name => ?description.
- parameters: array of name => [description, isMandatory]


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
See the source code for method [LightCliCommandDocUtility::buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/Util/LightCliCommandDocUtility.php#L292-L332)


See Also
================

The [LightCliCommandDocUtility](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md) class.

Previous method: [printListByApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/printListByApp.md)<br>Next method: [indent](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/indent.md)<br>

