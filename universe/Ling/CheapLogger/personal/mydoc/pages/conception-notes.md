CheapLogger, conception notes
===============
2019-12-19


Sometimes, when in quick debug mode, you just want to be able to log some information in a file.

That's all CheapLogger does: it allows to you to make that one line that does that, no question asked.


```php 
CheapLogger::log( "my message");
CheapLogger::log( $exception );
CheapLogger::log( ["a" => 123, "b" => 456] );
```


To configure it, you need to open the CheapLogger class and hardcode the path where it should log to.
By default, it logs to "/tmp/CheapLogger.txt".





Note: I personally use this bash alias:

```bash
alias cheap='open /tmp/CheapLogger.txt'
```

So that when I'm in a hurry, I just type my log line in the php code, then I can visualize the result by typing "cheap" in the terminal. 

