[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\QuestionHelper class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md)


QuestionHelper::ask
================



QuestionHelper::ask — Asks the given $question to the $user, and returns the answer (string).




Description
================


public static [QuestionHelper::ask](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/ask.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $question, callable $validate = null) : string




Asks the given $question to the $user, and returns the answer (string).
If the $validate callback is set, will repeat the question until the callback returns true.




Parameters
================


- output

    

- question

    

- validate

    A callable which takes the user answer as its sole argument.
Returns bool: whether the user response is valid.


Return values
================

Returns string.








See Also
================

The [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md) class.



