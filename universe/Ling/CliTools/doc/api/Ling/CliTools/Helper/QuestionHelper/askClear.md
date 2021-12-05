[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\QuestionHelper class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md)


QuestionHelper::askClear
================



QuestionHelper::askClear — Prints a question to the terminal.




Description
================


public static [QuestionHelper::askClear](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askClear.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $question, string $retryMessage, ?callable $validate = null) : string




Prints a question to the terminal.
If the validate callback is defined, the user's response is passed to the callback.
If the callback returns false, the retryMessage is displayed, asking for the user to retry.

The main idea of this method is that the retry message is always printed on the same line, thus not adding
to the total number of printed lines, thus saving screen space.

Depending on your taste, you might end the question with a PHP_EOL (I personally tend to prefer to have the user's response
on the same line, but adding the PHP_EOL at the end will put the user response on the next line).
Same with the retry message, you can end it with a PHP_EOL or not.
The retry message should probably re-introduce the question, or part of it.

For instance, a typical question/retryMessage would be:

- (question:) Which map do you want to restore? (type a number):
- (retryMessage:) Invalid number, try again (type a number):




Parameters
================


- output

    

- question

    

- retryMessage

    

- validate

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [QuestionHelper::askClear](https://github.com/lingtalfi/CliTools/blob/master/Helper/QuestionHelper.php#L78-L92)


See Also
================

The [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md) class.

Previous method: [ask](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/ask.md)<br>Next method: [askSelectListItem](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askSelectListItem.md)<br>

