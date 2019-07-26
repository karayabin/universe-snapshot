[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\CopyModule\CopyModule class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModule.md)


CopyModule::copy
================



CopyModule::copy — Copies the $sourceDir recursively to the $destinationDir, using the given $interpreter during the transfer.




Description
================


public [CopyModule::copy](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModule/copy.md)(string $sourceDir, string $destinationDir, [Ling\DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) $interpreter, [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null, array $options = []) : void




Copies the $sourceDir recursively to the $destinationDir, using the given $interpreter during the transfer.


Available options are:

- filter: string|array of file names to ignore. For instance "about_markdown_language.md".




Parameters
================


- sourceDir

    

- destinationDir

    

- interpreter

    

- report

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [CopyModuleException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/CopyModuleException.md).&nbsp;







Source Code
===========
See the source code for method [CopyModule::copy](https://github.com/lingtalfi/DocTools/blob/master/CopyModule/CopyModule.php#L23-L75)


See Also
================

The [CopyModule](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModule.md) class.



