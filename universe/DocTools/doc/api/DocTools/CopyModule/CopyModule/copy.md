CopyModule::copy
================

CopyModule::copy — Copies the $sourceDir recursively to the $destinationDir, using the given $interpreter during the transfer.

Description
---------------


public [CopyModule::copy](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/CopyModule/CopyModule/copy.md)(string $sourceDir, string $destinationDir, [DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md) $interpreter, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null, array $options = []) : void




Copies the $sourceDir recursively to the $destinationDir, using the given $interpreter during the transfer.


Available options are:

- filter: string|array of file names to ignore. For instance "about_markdown_language.md".




Parameters
--------------


- sourceDir

    

- destinationDir

    

- interpreter

    

- report

    

- options

    


Return values
----------------

Returns void.









See Also
-----------

The [CopyModule](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/CopyModule/CopyModule.md) class.
