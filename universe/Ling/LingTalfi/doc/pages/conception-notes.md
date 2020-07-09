Conception notes
=============
2020-06-01



The kaos tools are already done, so too late for conception notes;
however here are the newest concepts.






Kaos preferences
---------


Some commands might want to use some configuration.
It would be beneficial for the developer to store configuration in a babyYaml file rather than typing it via the terminal every time.

For instance, I like to create my planets using the following command:

```php
kaos init -d application=/komin/jindemo
```

Specifying the application parameter helps the command importing the service snippet in the README.md, so it's useful.
However, it's very cumbersome to type all that everytime I want to create a planet.

Therefore from now on the application parameter will be stored in a configuration file.


The kaos configuration file is: **~/kaos.byml**.


Note: like all my tools, they are meant to be used for me, which means it only works on mac, and the 
unix systems I might use, windows machines are not my concern.


If found, it will be parsed by the commands that use it.

So far here are the commands that use the kaos prefs file, and the available preference parameters:

- **InitializePlanetCommand**
    - application: string, the name of the target application
    
    
     
    
    
And so now with the preferences setup, the command is shortened to:
  
```php
kaos init -d
```

which is much easier to manage.
