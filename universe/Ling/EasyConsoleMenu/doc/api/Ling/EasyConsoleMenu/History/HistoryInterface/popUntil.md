[Back to the Ling/EasyConsoleMenu api](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu.md)<br>
[Back to the Ling\EasyConsoleMenu\History\HistoryInterface class](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface.md)


HistoryInterface::popUntil
================



HistoryInterface::popUntil — the given stepName, and including the stepName (i.e.




Description
================


abstract public [HistoryInterface::popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/popUntil.md)(string $stepName) : bool




If the given stepName is in the history, pops every steps (from the end) until it reaches
the given stepName, and including the stepName (i.e. it also pops the stepName).
Returns whether the given stepName was in the history in the first place.

Note: this method does nothing if the stepName is not in the history.




Parameters
================


- stepName

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [HistoryInterface::popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/History/HistoryInterface.php#L82-L82)


See Also
================

The [HistoryInterface](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface.md) class.

Previous method: [has](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface/has.md)<br>

