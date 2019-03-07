[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\CopyModule\CopyModuleInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md)


CopyModuleInterface::copy
================



CopyModuleInterface::copy — Copies the $sourceDir recursively to the $destinationDir, using the given $interpreter during the transfer.




Description
================


abstract public [CopyModuleInterface::copy](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface/copy.md)(string $sourceDir, string $destinationDir, [Ling\DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) $interpreter, [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null, array $options = []) : void




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







See Also
================

The [CopyModuleInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md) class.



