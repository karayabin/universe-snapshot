The CopyModuleInterface class
================
2019-02-21 --> 2019-02-26




Introduction
============

The CopyModuleInterface interface.

We use a copy module to copy a source directory to a destination directory.
The benefit of using a copy module is that it interprets the [docTool inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions),
and so we can write our doc with a compact/intuitive syntax (using docTool inline functions),
and when generating the doc, we use the copy module to resolve the inline functions on the fly.



Class synopsis
==============


abstract class <span class="pl-k">CopyModuleInterface</span>  {

- Methods
    - abstract public [copy](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/CopyModule/CopyModuleInterface/copy.md)(string $sourceDir, string $destinationDir, [DocTools\Interpreter\NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md) $interpreter, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null, array $options = []) : void

}






Methods
==============

- [CopyModuleInterface::copy](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/CopyModule/CopyModuleInterface/copy.md) &ndash; Copies the $sourceDir recursively to the $destinationDir, using the given $interpreter during the transfer.




Location
=============
DocTools\CopyModule\CopyModuleInterface