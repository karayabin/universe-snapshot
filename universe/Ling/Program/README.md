Program
==============
2017-03-30 -> 2021-03-05



A class to help creating console programs.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).





Install
============
Download the repository where you want, or use the [uni tool](https://github.com/lingtalfi/universe-naive-importer),
like so:

```bash
uni import Ling/Program
```






Example
============


Here is a simple program to demonstrate how to use this class.


```php
#!/usr/bin/env php
<?php


use ApplicationItemManager\Importer\GithubImporter;
use ApplicationItemManager\Installer\KamilleWidgetInstaller;
use ApplicationItemManager\ItemList\KamilleWidgetsItemList;
use ApplicationItemManager\LingApplicationItemManager;
use ApplicationItemManager\Program\ApplicationItemManagerProgram;
use Ling\CommandLineInput\CommandLineInputInterface;
use Ling\CommandLineInput\ProgramOutputAwareCommandLineInput;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Ling\Output\ProgramOutput;
use Ling\Output\ProgramOutputInterface;
use Ling\Program\Program;
use Ling\Program\ProgramHelper;
use Ling\Program\ProgramInterface;


//--------------------------------------------
//
//--------------------------------------------


$_SERVER['APPLICATION_ENVIRONMENT'] = "dev"; // hack environment here depending on your prefs
require_once __DIR__ . "/../boot.php"; // start your autoloaders...

$output = ProgramOutput::create();
$input = ProgramOutputAwareCommandLineInput::create($argv)
    ->setProgramOutput($output)
    ->addFlag("s")
    ->addOption("word");


Program::create()
    ->setDefaultCommand("help")
    ->setInput($input)
    ->setOutput($output)
    ->addCommand("help", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) {
        $output->info(<<<HELP
This is the help.
With this program, you can do the following:

- help: displays the current help 
- hello: displays a hello world text
                Use the -s flag to shout instead of just saying the word.
                Use the --word option to change the word (--word=elisabeth)
HELP
        );
    })
    ->addCommand("hello", function (CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program) {
        $word = $input->getOptionValue("word", "word");
        $text = "Hello $word";
        if (true === $input->getFlagValue('s')) {
            $text = strtoupper($text);
        }
        $output->success($text);
    })
    ->start();




```

Testing this program, the output would look like this:

```bash
$ php -f /myphp/kaminos/app/www/program-copy.php hello
Hello 
$ php -f /myphp/kaminos/app/www/program-copy.php hello
Hello word
$ php -f /myphp/kaminos/app/www/program-copy.php hello --word=michel
Hello michel
$ php -f /myphp/kaminos/app/www/program-copy.php hello --word=michel -s
HELLO MICHEL

```














History Log
------------------

- 1.1.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2017-03-31

    - add ProgramHelper.highlight
    
- 1.0.0 -- 2017-03-30

    - initial commit
    
    
