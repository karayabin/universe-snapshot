[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\QuestionHelper class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md)


QuestionHelper::askYesNo
================



QuestionHelper::askYesNo — Asks the given question to the user, repeats it until the answer is either y or n, and returns whether the answer was y.




Description
================


public static [QuestionHelper::askYesNo](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askYesNo.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $question) : bool




Asks the given question to the user, repeats it until the answer is either y or n, and returns whether the answer was y.
If it's something else, ask to try again until the answer is y or n.




Parameters
================


- output

    

- question

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [QuestionHelper::askYesNo](https://github.com/lingtalfi/CliTools/blob/master/Helper/QuestionHelper.php#L133-L145)


See Also
================

The [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md) class.

Previous method: [askSelectListItem](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askSelectListItem.md)<br>

