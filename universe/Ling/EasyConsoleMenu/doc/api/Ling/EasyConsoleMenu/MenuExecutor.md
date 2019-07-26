[Back to the Ling/EasyConsoleMenu api](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu.md)



The MenuExecutor class
================
2019-04-02 --> 2019-07-18






Introduction
============

The MenuExecutor class.



Class synopsis
==============


class <span class="pl-k">MenuExecutor</span>  {

- Properties
    - protected array [$steps](#property-steps) ;
    - protected [Ling\EasyConsoleMenu\History\HistoryInterface](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/HistoryInterface.md) [$stepsHistory](#property-stepsHistory) ;
    - protected array [$commands](#property-commands) ;
    - protected array [$settings](#property-settings) ;
    - protected array [$variables](#property-variables) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/__construct.md)() : void
    - public [executeMenu](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/executeMenu.md)(string $menuFile, Ling\CliTools\Output\OutputInterface $output) : void
    - protected [getFirstStepName](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/getFirstStepName.md)(array $steps) : string | false
    - protected [executeStep](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/executeStep.md)(string $stepName, Ling\CliTools\Output\OutputInterface $output, int $indentLevel) : void
    - protected [getUserChoice](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/getUserChoice.md)(string $question, array $choicesIndexes, Ling\CliTools\Output\OutputInterface $output) : string
    - protected [decorateStepChoices](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/decorateStepChoices.md)(array &$choices, string $stepName) : void
    - protected [resolveMessage](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/resolveMessage.md)(string $msg) : string
    - protected [executeCommand](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/executeCommand.md)(string $commandName, Ling\CliTools\Output\OutputInterface $output, int $indentLevel) : bool

}




Properties
=============

- <span id="property-steps"><b>steps</b></span>

    This property holds the steps for this instance.
    
    

- <span id="property-stepsHistory"><b>stepsHistory</b></span>

    This property holds the stepsHistory for this instance.
    
    

- <span id="property-commands"><b>commands</b></span>

    This property holds the commands for this instance.
    
    

- <span id="property-settings"><b>settings</b></span>

    This property holds the settings for this instance.
    
    

- <span id="property-variables"><b>variables</b></span>

    This property holds the variables for this instance.
    
    



Methods
==============

- [MenuExecutor::__construct](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/__construct.md) &ndash; Builds the MenuExecutor instance.
- [MenuExecutor::executeMenu](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/executeMenu.md) &ndash; Executes the menu provided by the menuFile.
- [MenuExecutor::getFirstStepName](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/getFirstStepName.md) &ndash; Returns the name of the first step.
- [MenuExecutor::executeStep](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/executeStep.md) &ndash; Executes a step.
- [MenuExecutor::getUserChoice](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/getUserChoice.md) &ndash; Asks a choice question to the user and returns the valid answer.
- [MenuExecutor::decorateStepChoices](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/decorateStepChoices.md) &ndash; Decorates the given step choices.
- [MenuExecutor::resolveMessage](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/resolveMessage.md) &ndash; Resolves the variables in the given msg.
- [MenuExecutor::executeCommand](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/MenuExecutor/executeCommand.md) &ndash; the output of the command was a success.





Location
=============
Ling\EasyConsoleMenu\MenuExecutor<br>
See the source code of [Ling\EasyConsoleMenu\MenuExecutor](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/MenuExecutor.php)



SeeAlso
==============
Previous class: [StepsHistory](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/History/StepsHistory.md)<br>
