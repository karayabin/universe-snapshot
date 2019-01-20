CommandLineOutput
===========
2018-03-28



A tool for displaying messages on the console. It handles bashhtml format.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import CommandLineOutput
```

Or just download it and place it where you want otherwise.



About the CommandLineOutput
==========================

This is just a refresher of the [Komin](https://github.com/lingtalfi/Komin) planet's Komin/Component/Console/StreamWrapper/Writable/Formatter/BashtmlFormatter.php class.
I copied it because I wanted a simple stand alone tool, companion of the very useful [CommandLineInput](https://github.com/lingtalfi/CommandLineInput) planet.



How to?
==========

```php
$output = CommandLineOutput::create();

$output->error("This is an error"); // message in red
$output->info("This is an info"); // message in blue
$output->success("This is an success"); // message in green
$output->warning("This is an warning"); // message in yellow (orange)
$output->output("This is a <red>custom</red> message"); // message with the custom word in red
$output->output("This is a <red><bgYellow>custom</bgYellow></red> message"); // message with the custom word in red with yellow background
$output->output("This is a <red:bgYellow>custom</red:bgYellow> message"); // same output as previous line
```


What's bashtml?
================

It's a term I made up, it basically allows you to use html like tags to define bash special formatting tags.
Usually, those tags are color names, but you can also use the blink, underline and other bash formatting tags.

See this class for the whole list of code: `class/CommandLineOutput/Adaptor/BashtmlAdaptor.php` 





History Log
------------------
    
- 1.0.0 -- 2018-03-28

    - initial commit




