[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)



The SqlWizardGeneralTool class
================
2019-07-23 --> 2020-09-14






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
    - public static [flattenBackticks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/flattenBackticks.md)(string $expression, ?array $options = []) : array

}






Methods
==============

- [SqlWizardGeneralTool::getTablePrefix](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/getTablePrefix.md) &ndash; 
- [SqlWizardGeneralTool::removeDoubleDashComments](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/removeDoubleDashComments.md) &ndash; Removes the double-dash comments from the given content, and returns the stripped content.
- [SqlWizardGeneralTool::decorateStatement](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/decorateStatement.md) &ndash; Decorates the statement with some temporarily defined (system) variables.
- [SqlWizardGeneralTool::statementDisableFkChecksUqChecks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/statementDisableFkChecksUqChecks.md) &ndash; will be disabled for that statement.
- [SqlWizardGeneralTool::flattenBackticks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/flattenBackticks.md) &ndash; - 0: string, the flattened expression, which is the expression in which the backtick escaped strings are replaced with variables in the form __ref1__, __ref2__, ...





Location
=============
Ling\SqlWizard\Tool\SqlWizardGeneralTool<br>
See the source code of [Ling\SqlWizard\Tool\SqlWizardGeneralTool](https://github.com/lingtalfi/SqlWizard/blob/master/Tool/SqlWizardGeneralTool.php)



SeeAlso
==============
Previous class: [MysqlSerializeTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool.md)<br>Next class: [MysqlSelectQueryParser](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlSelectQueryParser.md)<br>
