[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Input\CommandLineInput class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md)


CommandLineInput::prepare
================



CommandLineInput::prepare — Parses the command line and stores the flags, options and parameters to be accessed via the getter methods.




Description
================


private [CommandLineInput::prepare](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput/prepare.md)(array $argv) : void




Parses the command line and stores the flags, options and parameters to be accessed via the getter methods.




Parameters
================


- argv

    The argv argument provided with the $_SERVER super array (or manually generated).
The very first entry of this array must be the program name.


Return values
================

Returns void.








See Also
================

The [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) class.

Previous method: [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput/__construct.md)<br>

