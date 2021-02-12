[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\CliTools\Command\ListCommand class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand.md)


ListCommand::filterMatch
================



ListCommand::filterMatch — Returns whether the given filter matches the given expression.




Description
================


private [ListCommand::filterMatch](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand/filterMatch.md)(string $filter, string $expr) : bool




Returns whether the given filter matches the given expression.
If the dollar symbol ($) is the first char, it means that the expression must start with the rest of the filter.
Otherwise, it means that the expression must contain the filter.




Parameters
================


- filter

    

- expr

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [ListCommand::filterMatch](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Command/ListCommand.php#L373-L381)


See Also
================

The [ListCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand.md) class.

Previous method: [buildListFromCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Command/ListCommand/buildListFromCliApps.md)<br>

