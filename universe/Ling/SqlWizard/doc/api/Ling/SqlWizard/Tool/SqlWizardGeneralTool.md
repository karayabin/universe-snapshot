[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)



The SqlWizardGeneralTool class
================
2019-07-23 --> 2020-07-07






Introduction
============

The SqlWizardGeneralTool class.



Class synopsis
==============


class <span class="pl-k">SqlWizardGeneralTool</span>  {

- Methods
    - public static [getTablePrefix](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/getTablePrefix.md)(string $table) : string | null
    - public static [removeDoubleDashComments](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/removeDoubleDashComments.md)(string $content) : string
    - public static [decorateStatement](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/decorateStatement.md)(string $stmt, ?array $variables = []) : string
    - public static [statementDisableFkChecksUqChecks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/statementDisableFkChecksUqChecks.md)(string $stmt) : string

}






Methods
==============

- [SqlWizardGeneralTool::getTablePrefix](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/getTablePrefix.md) &ndash; 
- [SqlWizardGeneralTool::removeDoubleDashComments](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/removeDoubleDashComments.md) &ndash; Removes the double-dash comments from the given content, and returns the stripped content.
- [SqlWizardGeneralTool::decorateStatement](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/decorateStatement.md) &ndash; Decorates the statement with some temporarily defined (system) variables.
- [SqlWizardGeneralTool::statementDisableFkChecksUqChecks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/statementDisableFkChecksUqChecks.md) &ndash; will be disabled for that statement.





Location
=============
Ling\SqlWizard\Tool\SqlWizardGeneralTool<br>
See the source code of [Ling\SqlWizard\Tool\SqlWizardGeneralTool](https://github.com/lingtalfi/SqlWizard/blob/master/Tool/SqlWizardGeneralTool.php)



SeeAlso
==============
Previous class: [MysqlSerializeTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool.md)<br>Next class: [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)<br>
