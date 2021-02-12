Ling/EasyConsoleMenu
================
2019-04-02 --> 2020-12-08




Table of contents
===========

- [EasyConsoleMenuException](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/Exception/EasyConsoleMenuException.md) &ndash; The EasyConsoleMenuException class.
- [VariableHelper](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/Helper/VariableHelper.md) &ndash; The VariableHelper class.
    - [VariableHelper::resolveVariables](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/Helper/VariableHelper/resolveVariables.md) &ndash; Resolves the variables in msg, and returns the resolved msg.
- [HistoryInterface](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface.md) &ndash; The HistoryInterface interface.
    - [HistoryInterface::pop](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/pop.md) &ndash; Returns the name of the last step, and removes it from the history.
    - [HistoryInterface::add](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/add.md) &ndash; Adds a step to the history.
    - [HistoryInterface::last](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/last.md) &ndash; Returns the name of the last step, or false if there is no step at all.
    - [HistoryInterface::first](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/first.md) &ndash; Returns the name of the first step, or false if there is no step at all.
    - [HistoryInterface::count](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/count.md) &ndash; Returns the number of elements in the history.
    - [HistoryInterface::clear](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/clear.md) &ndash; Clears the history.
    - [HistoryInterface::all](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/all.md) &ndash; Returns the history step names.
    - [HistoryInterface::has](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/has.md) &ndash; Returns whether the history contains the given stepName.
    - [HistoryInterface::popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/popUntil.md) &ndash; the given stepName, and including the stepName (i.e.
- [StepsHistory](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory.md) &ndash; The StepsHistory interface.
    - [StepsHistory::__construct](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/__construct.md) &ndash; Builds the StepsHistory instance.
    - [StepsHistory::pop](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/pop.md) &ndash; Returns the name of the last step, and removes it from the history.
    - [StepsHistory::add](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/add.md) &ndash; Adds a step to the history.
    - [StepsHistory::last](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/last.md) &ndash; Returns the name of the last step, or false if there is no step at all.
    - [StepsHistory::first](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/first.md) &ndash; Returns the name of the first step, or false if there is no step at all.
    - [StepsHistory::count](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/count.md) &ndash; Returns the number of elements in the history.
    - [StepsHistory::clear](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/clear.md) &ndash; Clears the history.
    - [StepsHistory::all](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/all.md) &ndash; Returns the history step names.
    - [StepsHistory::has](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/has.md) &ndash; Returns whether the history contains the given stepName.
    - [StepsHistory::popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/popUntil.md) &ndash; the given stepName, and including the stepName (i.e.
- [MenuExecutor](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor.md) &ndash; The MenuExecutor class.
    - [MenuExecutor::__construct](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/__construct.md) &ndash; Builds the MenuExecutor instance.
    - [MenuExecutor::executeMenu](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/executeMenu.md) &ndash; Executes the menu provided by the menuFile.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [KrankenStein](https://github.com/lingtalfi/KrankenStein)


