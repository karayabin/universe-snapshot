Light_ErrorHandler
===========
2020-06-01 -> 2020-11-30


This plugin is the little brother of the [Light_ExceptionHandler](https://github.com/lingtalfi/Light_ExceptionHandler/) plugin.


While the **Light_ExceptionHandler** plugin catches exceptions, we will focus on catching regular php errors, fatal errors.
In addition to that we listen to the **error** channel of the logger, and intercept those messages too.

For more about the **error** channel, see the [error logging convention](https://github.com/lingtalfi/TheBar/blob/master/discussions/error-logging-convention.md) document.


So with those two plugins (**Light_ExceptionHandler**, **Light_ErrorHandler**), you can potentially handle any error 
that your application may trigger.



In terms of implementation, we use the same system as the **Light_ExceptionHandler**: we basically send all errors
via a [Light_Logger](https://github.com/lingtalfi/Light_Logger)'s **error_handler** channel (and **fatal_error_handler** for
fatal errors) that we create and listen to at the same time.

In addition to that, we also listen to the **error** channel of the logger by default, and write the error messages to our log file. 




The configuration
==========
2020-11-30


By default, our plugin will log all three types of errors.

You can set the options of our service to choose which type of error you want to log:

- handleFatalErrors: bool=true, whether to log fatal errors, and write them to our log file
- handleErrors: bool=true, whether to log regular php errors, and write them to our log file
- handleLogErrors: bool=true, whether to listen to the "error" channel of the log, and write them the messages our log file








More details
=========
2020-06-01


The default configuration of this service will write all errors to a dated file, which is the way I like to personally have my application
configured in production, so that I miss zero error. I do the same with exceptions (with the help of the **Light_ExceptionHandler** plugin), so that
all my error/exceptions are logged in the log directory of my applications, should I need to troubleshoot the application.




Also, implementation wise, this plugin uses the following php functions:


- set_error_handler     (this one might be overridden by any php code, so make sure it is not if you want this plugin to function properly)
- register_shutdown_function



We call Those functions during the initialization phase of the Light instance (the **Ling.Light.initialize_1** event).



Also, we've normalized a php error, be it a regular php error or a fatal error, so that it appears more consistent in the logs.

Our php error look like this (it's an array):

- int level: the error level (https://www.php.net/manual/en/errorfunc.constants.php)
- string levelh: the human version of the error level 
- str msg: the error message
- str file: the filename that the error was raised in
- int line: the line number the error was raised at
 




About fatal errors
===========
2020-06-01

My personal opinion about fatal errors is this:
in the web php literature, I've always seen people saying that catching fatal errors was a "bad thing",
we shouldn't do so, and that they aren't meant to be caught, hence the name "fatal".


I would argue that not catching them is worse, as the application maintainer is not aware of them (unless he's monitoring
them through another mean), which means the application could be broken without the maintainer being aware of it.











