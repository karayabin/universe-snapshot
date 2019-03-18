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






Examples
================

Example 1: simple ask example
---------------------------



```php
#!/usr/bin/env php
<?php


use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\Output;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\AbstractProgram;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


class MakeCoffeeProgram extends AbstractProgram
{

    protected function runProgram(InputInterface $input, OutputInterface $output)
    {

        if ("y" === QuestionHelper::ask($output, ">> Do you really want this coffee? (y/n)")) {
            $output->write("Alright, I'll do your coffee.");
        } else {
            $output->write("That's what I thought.");
        }
        $output->write(PHP_EOL);
    }

}


$input = new CommandLineInput();
$output = new Output();
$program = new MakeCoffeeProgram();
$program->run($input, $output);



```



Example of a console session with this program:


```bash
$ php -f program.php 
>> Do you really want this coffee? (y/n)y
Alright, I'll do your coffee.
$ php -f program.php 
>> Do you really want this coffee? (y/n)n
That's what I thought.

```

Example 2: ask example with validate
---------------------------

If the validate callable is set (third argument of the ask method),
then the question gets repeated until the callback returns true.



```php
#!/usr/bin/env php
<?php


use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\Output;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\AbstractProgram;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


class MakeCoffeeProgram extends AbstractProgram
{

    protected function runProgram(InputInterface $input, OutputInterface $output)
    {

        if ("no" === QuestionHelper::ask($output, ">> Do you really want this coffee? (no)", function (string $response) {
                return "no" === $response;
            })) {
            $output->write("Alright, I won.");
        }

        $output->write(PHP_EOL);
    }

}

$input = new CommandLineInput();
$output = new Output();
$program = new MakeCoffeeProgram();
$program->run($input, $output);


```



Example of a console session with this program:


```bash
$ php -f program.php 
>> Do you really want this coffee? (no)f
>> Do you really want this coffee? (no)y
>> Do you really want this coffee? (no)tes
>> Do you really want this coffee? (no)n
>> Do you really want this coffee? (no)no
Alright, I won.
```



See Also
================

The [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md) class.



