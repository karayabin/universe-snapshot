[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Tool\SqlWizardGeneralTool class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool.md)


SqlWizardGeneralTool::decorateStatement
================



SqlWizardGeneralTool::decorateStatement — Decorates the statement with some temporarily defined (system) variables.




Description
================


public static [SqlWizardGeneralTool::decorateStatement](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/decorateStatement.md)(string $stmt, ?array $variables = []) : string




Decorates the statement with some temporarily defined (system) variables.

The available variables are the following:

- foreign_key_checks: bool = false
- unique_checks: bool = false
- sql_mode: string = null. A comma separated list of sql modes (https://dev.mysql.com/doc/refman/8.0/en/sql-mode.html).


https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html




Parameters
================


- stmt

    

- variables

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [SqlWizardGeneralTool::decorateStatement](https://github.com/lingtalfi/SqlWizard/blob/master/Tool/SqlWizardGeneralTool.php#L59-L91)


See Also
================

The [SqlWizardGeneralTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool.md) class.

Previous method: [removeDoubleDashComments](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/removeDoubleDashComments.md)<br>Next method: [statementDisableFkChecksUqChecks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/statementDisableFkChecksUqChecks.md)<br>

