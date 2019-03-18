[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The ProgramInterface class
================
2019-02-26 --> 2019-03-18






Introduction
============

The ProgramInterface interface.

It represents a console program, with which the human user will interact.

So the user will open a terminal, and type the name of the program followed by some options and parameters:

- php -f /path/to/my_program.php -- makeSomeCoffee --with-sugars=2

This line written above is called the command line, and it has a structure described in [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md),
which defines what is an option, what is an argument etc...


So after pressing enter, the program will be executed: doing the task it was designed for, with and/or without the user interaction (i.e. prompting the
user with more questions).


In this planet, we distinguish between two types of programs:

- a program
- an application


A program is what we've just described: a console oriented script that is called by an user to perform a specific task.

Generally, the name of the program indicates the purpose of the program:

- php -f make_some_coffee.php -- --with-sugars=2


Here, with the name "make_some_coffee", the user don't have any doubt about the purpose of this program.

An application is a multi-purpose program that can execute multiple tasks called commands.


So an application is composed of multiple commands.

For instance:

- php -f my_super_program.php -- makeSomeCoffee --with-sugars=2
- php -f my_super_program.php -- resizeImages -- dir=/tmp/src  dest=/tmp/dest size=640x480
- php -f my_super_program.php -- sendCriticalLogToAdmin -- log_dir=/my_app/log
- ...

So in the program above, there are at least three commands: makeSomeCoffee, resizeImages and sendCriticalLogToAdmin.
Note: usually, commands are logically related, and so the example above, with such non-related commands is a more theoretical than pragmatical.



Technically speaking, an application is just a particular case of the default program:
it's a program, which first argument is considered as the name of a command.

So again: an application IS a program (this will be reflected in the implementation).



By convention in this planet, I use the [bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) language to create programs, in the same manner that
I use html to write web applications.

That's because I believe that colors in the messages are IMPORTANT, since it's visually easier to read
a colored message than a non-colored message.

And without bashtml or a similar language, the program creator would have to cope with a non-user friendly syntax
just to write colors.

Here is a message with the red word colored in red in regular console language (bash), and the same message
in bashtml (which is more user-friendly):

- bash:   ```This word is [31mred[0m.```
- bashtml:   ```This word is <red>red</red>.```


So, I personally will use bashtml for all my programs/applications, but you could use any kind of [formatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md)
that you like.



All programs have one thing in common, they have a [run method](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface/run.md) which has two arguments:


- run ( InputInterface $input, OutputInterface $output )


The $input represents a command line from which we can get the options and arguments.
The $output represents the object which displays the strings to the console.

Having a dedicated output object allows us (amongst other things) to:
- mute the messages if necessary
- get the stripped (i.e. without bashtml) version of the whole history of messages



Class synopsis
==============


abstract class <span class="pl-k">ProgramInterface</span>  {

- Methods
    - abstract public [run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface/run.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void

}






Methods
==============

- [ProgramInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface/run.md) &ndash; Starts the interactive program.





Location
=============
Ling\CliTools\Program\ProgramInterface


SeeAlso
==============
Previous class: [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md)<br>Next class: [TableUtil](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil.md)<br>
