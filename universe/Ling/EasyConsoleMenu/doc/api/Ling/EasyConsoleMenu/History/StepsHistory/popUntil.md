[Back to the Ling/EasyConsoleMenu api](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu.md)<br>
[Back to the Ling\EasyConsoleMenu\History\StepsHistory class](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory.md)


StepsHistory::popUntil
================



StepsHistory::popUntil — the given stepName, and including the stepName (i.e.




Description
================


public [StepsHistory::popUntil](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/popUntil.md)(string $stepName) : bool




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








See Also
================

The [StepsHistory](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory.md) class.

Previous method: [has](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory/has.md)<br>

