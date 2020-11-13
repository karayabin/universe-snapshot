[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Tool\SqlWizardGeneralTool class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool.md)


SqlWizardGeneralTool::flattenBackticks
================



SqlWizardGeneralTool::flattenBackticks — - 0: string, the flattened expression, which is the expression in which the backtick escaped strings are replaced with variables in the form __ref1__, __ref2__, ...




Description
================


public static [SqlWizardGeneralTool::flattenBackticks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/flattenBackticks.md)(string $expression, ?array $options = []) : array




Parses the given expression, and returns an array containing:
- 0: string, the flattened expression, which is the expression in which the backtick escaped strings are replaced with variables in the form __ref1__, __ref2__, ...
- 1: array of references (i.e. like __ref1__) => original backtick escaped string (but without the backticks around)


Available options are:
- keyword: string=null, the keyword to use for the references. The default is "ref". The keyword is always preceded and followed with 2 consecutive underscores.




Parameters
================


- expression

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [SqlWizardGeneralTool::flattenBackticks](https://github.com/lingtalfi/SqlWizard/blob/master/Tool/SqlWizardGeneralTool.php#L126-L144)


See Also
================

The [SqlWizardGeneralTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool.md) class.

Previous method: [statementDisableFkChecksUqChecks](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/statementDisableFkChecksUqChecks.md)<br>

