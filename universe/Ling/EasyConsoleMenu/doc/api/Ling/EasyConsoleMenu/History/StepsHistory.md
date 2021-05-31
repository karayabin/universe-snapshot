[Back to the Ling/EasyConsoleMenu api](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu.md)



The StepsHistory class
================
2019-04-02 --> 2021-05-31






Introduction
============

The StepsHistory interface.



Class synopsis
==============


class <span class="pl-k">StepsHistory</span> implements [HistoryInterface](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface.md) {

- Properties
    - protected array [$steps](#property-steps) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/__construct.md)() : void
    - public [pop](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/pop.md)() : string | false
    - public [add](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/add.md)(string $stepName) : mixed
    - public [last](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/last.md)() : string | false
    - public [first](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/first.md)() : string | false
    - public [count](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/count.md)() : int
    - public [clear](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/clear.md)() : void
    - public [all](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/all.md)() : array
    - public [has](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/has.md)(string $stepName) : bool
    - public [popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/popUntil.md)(string $stepName) : bool

}




Properties
=============

- <span id="property-steps"><b>steps</b></span>

    This property holds the steps names for this instance.
    
    



Methods
==============

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





Location
=============
Ling\EasyConsoleMenu\History\StepsHistory<br>
See the source code of [Ling\EasyConsoleMenu\History\StepsHistory](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/History/StepsHistory.php)



SeeAlso
==============
Previous class: [HistoryInterface](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface.md)<br>Next class: [MenuExecutor](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor.md)<br>
