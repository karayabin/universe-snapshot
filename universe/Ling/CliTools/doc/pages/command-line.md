The command line
=====
2019-02-25



The command line is the command line typed when invoking the program, starting AFTER the program name.

For instance if we call the myprogram.php using the php cli tool:


```bash
php -f myprogram.php -- makecoffee -v --sugars=2 viennois --no-cream -qp -say_word="ok good"
```

Then the command line is:

```bash
makecoffee -v --sugars=2 viennois --no-cream -qp -say_word="ok good"
```



A command line is composed of 3 types of components:

- parameters: a parameter is a required argument. Like a required argument of a method in an class. A parameter is either set or not set.
- options: an option is a key/value pair. It is optional.
- flags: a flag is like a parameter, except that it's optional. It's either set or not set.



From that definition above, many implementations are possible.
In this planet, the implementations of this command line are:

- the [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md)


