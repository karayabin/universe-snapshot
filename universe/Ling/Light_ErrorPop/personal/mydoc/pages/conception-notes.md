Light_ErrorPop, conception notes
===============
2020-06-01




Having both the [Light_ErrorHandler](https://github.com/lingtalfi/Light_ErrorHandler) and
[Light_ExceptionHandler](https://github.com/lingtalfi/Light_ExceptionHandler/) plugins is good,
but sometimes the log files get crowdy and it can be hard to find the last error (you need to scroll down
a file...).



The goal of this plugin is to provide the last error, be it a regular php error or fatal error caught by the  
**Light_ErrorHandler** plugin, or an exception logged by the **Light_ExceptionHandler** plugin, 
in a clean file that contains just that error and nothing else.

This helps focusing on development.


Suggestion: then, with a bash alias, open a terminal, type **pop** to open that file containing
the last error info. 



Here is the alias I use:
```bash 
alias pop='touch /tmp/error_pop.txt; sublime /tmp/error_pop.txt'
```