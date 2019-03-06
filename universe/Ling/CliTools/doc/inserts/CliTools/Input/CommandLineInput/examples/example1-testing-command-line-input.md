Example 1: testing the command line input
-------------------


```php

#!/usr/bin/env php
<?php


use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Uni2\Application\UniToolApplication;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe





// php -f myprogram.php -- makecoffee -v --sugars=2 viennois --no-cream -pq --rs say_word="ok good"


$line = new CommandLineInput();

a($line->getParameter(1)); // string(10) "makecoffee"
a($line->getParameter(2)); // string(8) "viennois"
a($line->getParameter(3)); // NULL
a($line->getParameter(3, "default value")); // string(13) "default value"

a($line->getOption("sugars")); // string(1) "2"
a($line->getOption("say_word")); // string(7) "ok good"
a($line->getOption("not_an_option")); // NULL
a($line->getOption("not_an_option", 678)); // int(678)


a($line->hasFlag("v")); // bool(true)
a($line->hasFlag("-v")); // bool(false)
a($line->hasFlag("no-cream")); // bool(true)


a($line->hasFlag("pq")); // bool(false)
a($line->hasFlag("p")); // bool(true)
a($line->hasFlag("q")); // bool(true)

a($line->hasFlag("rs")); // bool(true)
a($line->hasFlag("r")); // bool(false)
a($line->hasFlag("s")); // bool(false)

a($line->hasFlag("z")); // bool(false)

```