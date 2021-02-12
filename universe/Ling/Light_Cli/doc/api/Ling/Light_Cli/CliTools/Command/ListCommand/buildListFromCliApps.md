[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\CliTools\Command\ListCommand class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand.md)


ListCommand::buildListFromCliApps
================



ListCommand::buildListFromCliApps — Builds and returns a list of all appId command and aliases.




Description
================


private [ListCommand::buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand/buildListFromCliApps.md)(array $cliApps) : array




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




Parameters
================


- cliApps

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [ListCommand::buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Command/ListCommand.php#L305-L359)


See Also
================

The [ListCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand.md) class.

Previous method: [getIndexByCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand/getIndexByCommand.md)<br>Next method: [filterMatch](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand/filterMatch.md)<br>

