[Back to the Ling/EasyConsoleMenu api](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu.md)



The HistoryInterface class
================
2019-04-02 --> 2021-03-05






Introduction
============

The HistoryInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">HistoryInterface</span>  {

- Methods
    - abstract public [pop](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/pop.md)() : string | false
    - abstract public [add](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/add.md)(string $stepName) : mixed
    - abstract public [last](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/last.md)() : string | false
    - abstract public [first](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/first.md)() : string | false
    - abstract public [count](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/count.md)() : int
    - abstract public [clear](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/clear.md)() : void
    - abstract public [all](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/all.md)() : array
    - abstract public [has](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/has.md)(string $stepName) : bool
    - abstract public [popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/popUntil.md)(string $stepName) : bool

}






Methods
==============

- [HistoryInterface::pop](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/pop.md) &ndash; Returns the name of the last step, and removes it from the history.
- [HistoryInterface::add](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/add.md) &ndash; Adds a step to the history.
- [HistoryInterface::last](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/last.md) &ndash; Returns the name of the last step, or false if there is no step at all.
- [HistoryInterface::first](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/first.md) &ndash; Returns the name of the first step, or false if there is no step at all.
- [HistoryInterface::count](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/count.md) &ndash; Returns the number of elements in the history.
- [HistoryInterface::clear](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/clear.md) &ndash; Clears the history.
- [HistoryInterface::all](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/all.md) &ndash; Returns the history step names.
- [HistoryInterface::has](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/has.md) &ndash; Returns whether the history contains the given stepName.
- [HistoryInterface::popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/popUntil.md) &ndash; the given stepName, and including the stepName (i.e.





Location
=============
Ling\EasyConsoleMenu\History\HistoryInterface<br>
See the source code of [Ling\EasyConsoleMenu\History\HistoryInterface](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/History/HistoryInterface.php)



SeeAlso
==============
Previous class: [VariableHelper](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/Helper/VariableHelper.md)<br>Next class: [StepsHistory](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory.md)<br>
