[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ErrorSummary class
================
2019-03-12 --> 2019-03-21






Introduction
============

The ErrorSummary class.

This class is used by complex commands to recap all the errors that occurred during their execution.
It basically gathers all errors that occur during the execution of a command,
and displays them when the user (i.e. dev) wants, usually at the end of the command.



Class synopsis
==============


class <span class="pl-k">ErrorSummary</span>  {

- Properties
    - protected array [$errorMessages](#property-errorMessages) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary/__construct.md)() : void
    - public [addErrorMessage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary/addErrorMessage.md)(string $errorMessage) : void
    - public [displayErrorRecap](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary/displayErrorRecap.md)(Ling\CliTools\Output\OutputInterface $output) : void

}




Properties
=============

- <span id="property-errorMessages"><b>errorMessages</b></span>

    This property holds an array of error messages.
    
    



Methods
==============

- [ErrorSummary::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary/__construct.md) &ndash; Builds the ErrorSummary instance.
- [ErrorSummary::addErrorMessage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary/addErrorMessage.md) &ndash; Adds an error message.
- [ErrorSummary::displayErrorRecap](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary/displayErrorRecap.md) &ndash; Writes the "error recap widget" to the given output.





Location
=============
Ling\Uni2\ErrorSummary\ErrorSummary


SeeAlso
==============
Previous class: [GitRepoDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter.md)<br>Next class: [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md)<br>
