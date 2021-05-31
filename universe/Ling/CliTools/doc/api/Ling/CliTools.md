Ling/CliTools
================
2019-02-26 --> 2021-05-31




Table of contents
===========

- [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) &ndash; The CommandInterface interface.
    - [CommandInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface/run.md) &ndash; Runs the command.
- [ApplicationException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Exception/ApplicationException.md) &ndash; The ApplicationException exception is thrown when a problem occurs in the [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) class.
- [CliToolsException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Exception/CliToolsException.md) &ndash; The base class for all CliTools exceptions.
- [InvalidContextException](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Exception/InvalidContextException.md) &ndash;          probably meaning that it was executed from a web context instead of a cli context.
- [BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md) &ndash; The BashtmlFormatter class.
    - [BashtmlFormatter::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/__construct.md) &ndash; Builds the BashtmlFormatter instance.
    - [BashtmlFormatter::setFormatMode](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/setFormatMode.md) &ndash; Sets the format mode.
    - [BashtmlFormatter::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.
- [DumbFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/DumbFormatter.md) &ndash; The DumbFormatter class.
    - [DumbFormatter::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/DumbFormatter/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.
- [FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md) &ndash; The FormatterInterface interface.
    - [FormatterInterface::format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface/format.md) &ndash; Parses the given $expression and returns its formatted/interpreted version.
- [BashtmlStringTool](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md) &ndash; The BashtmlStringTool class.
    - [BashtmlStringTool::fixTrimmedStringFormatting](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/fixTrimmedStringFormatting.md) &ndash; then it can happen that the bashtml formatting of the trimmed string is incorrect, leading to bleeding formatting.
    - [BashtmlStringTool::removeLastIncompleteTag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool/removeLastIncompleteTag.md) &ndash; Returns the given string, after removing an incomplete bashtml tag if it ends the given string.
- [CommandLineInputHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper.md) &ndash; The CommandLineInputHelper class.
    - [CommandLineInputHelper::getInputWritableCopy](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getInputWritableCopy.md) &ndash; Returns a WritableCommandLineInput instance, copy of the given input.
    - [CommandLineInputHelper::paramStringToArgv](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/paramStringToArgv.md) &ndash; Returns the argv array version of the given param string.
    - [CommandLineInputHelper::getCommandLineByInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getCommandLineByInput.md) &ndash; Returns the [command line input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) version of the [command line](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md) from the given input.
- [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md) &ndash; The QuestionHelper class.
    - [QuestionHelper::ask](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/ask.md) &ndash; Asks the given $question to the $user, and returns the answer (string).
    - [QuestionHelper::askClear](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askClear.md) &ndash; Prints a question to the terminal.
    - [QuestionHelper::askYesNo](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askYesNo.md) &ndash; Asks the given question to the user, repeats it until the answer is either y or n, and returns whether the answer was y.
- [VirginiaMessageHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper.md) &ndash; The VirginiaMessageHelper class.
    - [VirginiaMessageHelper::success](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/success.md) &ndash; Writes a success message to the output.
    - [VirginiaMessageHelper::info](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/info.md) &ndash; Writes an info message to the output.
    - [VirginiaMessageHelper::command](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/command.md) &ndash; Writes a command message to the output.
    - [VirginiaMessageHelper::warning](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/warning.md) &ndash; Writes a warning message to the output.
    - [VirginiaMessageHelper::error](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/error.md) &ndash; Writes an error message to the output.
    - [VirginiaMessageHelper::discover](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/discover.md) &ndash; Writes a discover message to the output.
    - [VirginiaMessageHelper::i](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/i.md) &ndash; Returns an indent string which $length is proportional to the given $level.
    - [VirginiaMessageHelper::j](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/j.md) &ndash; Returns another indent string which $length is proportional to the given $level.
    - [VirginiaMessageHelper::s](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/s.md) &ndash; Returns an indent block of white space, which $length is proportional to the given $level.
- [AbstractInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput.md) &ndash; The AbstractInput class is a base class that abstracts the base logic for an InputInterface implementation.
    - [AbstractInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/__construct.md) &ndash; Builds the class instance.
    - [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [ArrayInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput.md) &ndash; The ArrayInput class is an implementation of the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).
    - [ArrayInput::setItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput/setItems.md) &ndash; Sets the items (parameters, options, flags) for this instance.
    - [AbstractInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/__construct.md) &ndash; Builds the class instance.
    - [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) &ndash; The CommandLineInput class is an implementation of the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).
    - [CommandLineInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput/__construct.md) &ndash; Builds the class instance.
    - [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) &ndash; The InputInterface class.
    - [InputInterface::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [InputInterface::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [InputInterface::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [InputInterface::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [InputInterface::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [InputInterface::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [WritableCommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput.md) &ndash; The WritableCommandLineInput class.
    - [WritableCommandLineInput::setFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setFlags.md) &ndash; Sets the flags.
    - [WritableCommandLineInput::setOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setOptions.md) &ndash; Sets the options.
    - [WritableCommandLineInput::setParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setParameters.md) &ndash; Sets the parameters.
    - [CommandLineInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput/__construct.md) &ndash; Builds the class instance.
    - [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
    - [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
    - [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
    - [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
    - [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
    - [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.
- [BufferedOutput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput.md) &ndash; The BufferedOutput class.
    - [BufferedOutput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/__construct.md) &ndash; Builds the Output instance.
    - [BufferedOutput::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/write.md) &ndash; Writes a message to the output.
    - [BufferedOutput::reset](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/reset.md) &ndash; Resets the messages buffer.
    - [BufferedOutput::writeMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/writeMessages.md) &ndash; Prints the buffered messages.
    - [BufferedOutput::getMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/getMessages.md) &ndash; Returns the buffered messages.
- [Output](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output.md) &ndash; The Output class.
    - [Output::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/__construct.md) &ndash; Builds the Output instance.
    - [Output::setFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/setFormatter.md) &ndash; Sets the formatter.
    - [Output::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/write.md) &ndash; Writes a message to the output.
- [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) &ndash; The OutputInterface interface.
    - [OutputInterface::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface/write.md) &ndash; Writes a message to the output.
- [AbstractProgram](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram.md) &ndash; The Program class.
    - [AbstractProgram::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/__construct.md) &ndash; Builds the AbstractProgram instance.
    - [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
    - [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
    - [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
    - [AbstractProgram::setUseExitStatus](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md) &ndash; Sets the useExitStatus.
    - [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md) &ndash; Executes the program, and returns the exit code, if defined by the concrete class.
- [Application](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application.md) &ndash; The Application class.
    - [Application::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/__construct.md) &ndash; Builds the Application instance.
    - [Application::registerCommand](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/Application/registerCommand.md) &ndash; Registers a command with the given aliases.
    - [AbstractProgram::setLogger](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLogger.md) &ndash; Sets the logger.
    - [AbstractProgram::setLoggerChannel](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setLoggerChannel.md) &ndash; Sets the loggerChannel.
    - [AbstractProgram::setErrorIsVerbose](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setErrorIsVerbose.md) &ndash; Sets the errorIsVerbose.
    - [AbstractProgram::setUseExitStatus](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/setUseExitStatus.md) &ndash; Sets the useExitStatus.
    - [AbstractProgram::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/AbstractProgram/run.md) &ndash; Executes the program, and returns the exit code, if defined by the concrete class.
- [ProgramInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface.md) &ndash; The ProgramInterface interface.
    - [ProgramInterface::run](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Program/ProgramInterface/run.md) &ndash; Starts the interactive program.
- [LoaderUtil](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil.md) &ndash; The LoaderUtil class.
    - [LoaderUtil::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/__construct.md) &ndash; Builds the LoaderUtil instance.
    - [LoaderUtil::setOutput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setOutput.md) &ndash; Sets the output.
    - [LoaderUtil::setNbTotalItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setNbTotalItems.md) &ndash; Sets the nbTotalItems.
    - [LoaderUtil::setDisplayMode](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/setDisplayMode.md) &ndash; Sets the displayMode.
    - [LoaderUtil::incrementBy](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/incrementBy.md) &ndash; Increments the loader by the given amount.
    - [LoaderUtil::start](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/LoaderUtil/start.md) &ndash; Starts running the loader, which displays the widget to the output.
- [TableUtil](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil.md) &ndash; The TableUtil class.
    - [TableUtil::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/__construct.md) &ndash; Builds the TableUtil instance.
    - [TableUtil::setHeaders](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setHeaders.md) &ndash; Sets the headers.
    - [TableUtil::setOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setOptions.md) &ndash; Sets the options.
    - [TableUtil::setRows](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/setRows.md) &ndash; Sets the rows.
    - [TableUtil::render](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Util/TableUtil/render.md) &ndash; Writes a html like table to the given $output.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [UniversalLogger](https://github.com/lingtalfi/UniversalLogger)


