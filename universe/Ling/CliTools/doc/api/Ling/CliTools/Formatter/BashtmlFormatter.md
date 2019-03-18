[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The BashtmlFormatter class
================
2019-02-26 --> 2019-03-18






Introduction
============

The BashtmlFormatter class.

It interprets bashtml language described below, which basically allows you to write html like tags to get
colors and basic formatting (bold, underline, ...) in your console output.

![example screenshot](http://lingtalfi.com/img/universe/CliTools/bashtml-formatter-example.png)




Bashtml
----------
The bashtml notation uses html like tags to format text.
So for instance, in the following sentence:


- The word <red>red</red> and the word <yellow>yellow</yellow> would be colored as expected.


The list of available tags is presented below.
You can also extend this class to create your own tags.



- (logging)
- success
- info
- warning
- error
- (specials)
- bold
- b (alias for bold)
- dim
- underlined
- blink
- reverse
- hidden
- (foreground colors)
- default
- black
- red
- green
- yellow
- blue
- magenta
- cyan
- lightGray
- darkGray
- lightRed
- lightGreen
- lightYellow
- lightBlue
- lightMagenta
- lightCyan
- white
- (background colors)
- bgDefault
- bgBlack
- bgRed
- bgGreen
- bgYellow
- bgBlue
- bgMagenta
- bgCyan
- bgLightGray
- bgDarkGray
- bgLightRed
- bgLightGreen
- bgLightYellow
- bgLightBlue
- bgLightMagenta
- bgLightCyan
- bgWhite


Nested tags will also work, as you would expect.

So for instance:

- <bold>this sentence is in bold, and the word <red>red</red> is also colored.</bold>


Bashtml also let you combine tags using the colon (:) separator.

So for instance:

- The word <red:bgBlue>red with blue background</red:bgBlue> is equivalent to <bgBlue><red>red with blue background</red></bgBlue>.







How to use?
---------------


```php
#!/usr/bin/env php
<?php


use Ling\CliTools\Formatter\BashtmlFormatter;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe



// See ![the resulting screenshot](http://lingtalfi.com/img/universe/CliTools/bashtml-formatter-example.png)

$f = new BashtmlFormatter();
echo $f->format("Hello" . PHP_EOL); // prints hello in black
echo $f->format("<red>Hello</red>" . PHP_EOL); // prints hello in red
echo $f->format("<red>Hello</red>, how are you?" . PHP_EOL); // prints hello in red, and the rest of the sentence
echo $f->format("<red:bgLightGray>Hello</red:bgLightGray>" . PHP_EOL); // prints hello in red with a light gray background
echo $f->format("<black:bgYellow:bold>Hello</black:bgYellow:bold>" . PHP_EOL); // prints yellow in bold and black with a yellow background
echo $f->format("Hello, I'm <dim>dimmed</dim>" . PHP_EOL); // prints "Hello, I'm " in black, and "dimmed" with a dim formatting
echo $f->format("<underlined>Hello</underlined>" . PHP_EOL); // prints "Hello", underlined
echo $f->format("<blink>Hello</blink>" . PHP_EOL); // prints the word "Hello", blinking
echo $f->format("<reverse>Hello</reverse>" . PHP_EOL); // prints the word "Hello" in white, with black background
echo $f->format("<bold>All this is bold, <red>Hello</red> then.</bold>" . PHP_EOL); // prints "All this is bold, Hello then." in bold, and "Hello" in bold red
echo $f->format("<success>This is a success</success>" . PHP_EOL); // prints "This is a success" in green
echo $f->format("<info>This is an info</info>" . PHP_EOL); // prints "This is an info" in blue
echo $f->format("<warning>This is a warning</warning>" . PHP_EOL); // prints "This is a warning" in orange
echo $f->format("<error>This is an error</error>" . PHP_EOL); // prints "This is a warning" in orange
```



Class synopsis
==============


class <span class="pl-k">BashtmlFormatter</span> implements [FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md) {

- Properties
    - protected array [$formatCodes](#property-formatCodes) ;
    - protected string [$escapeSequence](#property-escapeSequence) ;
    - private array [$parents](#property-parents) = [] ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/__construct.md)() : void
    - public [format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/format.md)(string $expression) : string
    - private [addParent](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/addParent.md)(string $name) : void
    - private [removeParent](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/removeParent.md)(string $name) : void
    - private [getStartTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/getStartTag.md)(string $name, array $parents = []) : false | string
    - private [getStopTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/getStopTag.md)(string $name, array $parents = []) : bool | string
    - private [getFormatExpression](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/getFormatExpression.md)(array $codes) : string
    - private [checkCode](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/checkCode.md)(string $code) : bool

}




Properties
=============

- <span id="property-formatCodes"><b>formatCodes</b></span>

    This property holds the formatCodes for this instance.
    It's an array of html tag => "bash code".
    
    "Bash codes" are defined here (for instance): http://misc.flogisoft.com/bash/tip_colors_and_formatting?&#comment_8210c4fe2c90858ae913fd908184a2b2
    
    

- <span id="property-escapeSequence"><b>escapeSequence</b></span>

    This property holds the escapeSequence for this instance.
    It shouldn't be changed, except for testing purposes.
    
    

- <span id="property-parents"><b>parents</b></span>

    This property holds the parents for this instance.
    It's basically a stack to handle nested tags.
    
    



Methods
==============

- [BashtmlFormatter::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/__construct.md) &ndash; Builds the BashtmlFormatter instance.
- [BashtmlFormatter::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.
- [BashtmlFormatter::addParent](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/addParent.md) &ndash; Adds a parent to the stack.
- [BashtmlFormatter::removeParent](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/removeParent.md) &ndash; Removes a parent from the stack.
- [BashtmlFormatter::getStartTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/getStartTag.md) &ndash; Returns the formatted equivalent of the opening $name tag.
- [BashtmlFormatter::getStopTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/getStopTag.md) &ndash; Returns the formatted equivalent of the closing $name tag.
- [BashtmlFormatter::getFormatExpression](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/getFormatExpression.md) &ndash; Converts the given $codes to the bash code equivalent.
- [BashtmlFormatter::checkCode](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/checkCode.md) &ndash; Returns whether the given $code will resolve.





Location
=============
Ling\CliTools\Formatter\BashtmlFormatter


SeeAlso
==============
Previous class: [InvalidContextException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Exception/InvalidContextException.md)<br>Next class: [DumbFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/DumbFormatter.md)<br>
