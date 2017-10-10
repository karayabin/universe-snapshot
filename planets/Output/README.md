Output
===================
2017-03-22



Object representing an output.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



How to install?
==================
To import in your application, you can use the [universe naive importer](https://github.com/lingtalfi/universe-naive-importer) (uni), or simply
download the planet and put it in your planets directory.
With the importer, do this:

```bash
cd /your/app
uni import Output
```



How to use?
===============
The idea of having an output is to be able to write to this output.
I created this object because while I was creating a program that would import modules in an application.
I wanted to be able to use this importer (kamille naive importer) from a web application (gui) AND
from the console (as a command line tool). 

So the output allows me to re-use the same importer in various contexts.
Basically, the importer writes everything to the output.

Now, in a web context, the output would be displayed to a file, and a javascript process would
regularly fetch the content of this file as it's being written (at least that's the idea but I haven't
implemented it yet).
 
And yet, in the console context, I can have a normal "echoing" output, which displays everything on 
the console screen.

So, if you don't understand what I'm trying to explain, this probably means that you don't need this object.






History Log
------------------
    
- 1.5.0 -- 2017-04-01

    - change warn color code from red to yellow
    
- 1.4.0 -- 2017-03-31

    - fix WebProgramOutput nl2br
    
- 1.3.0 -- 2017-03-29

    - fix WebProgramOutput br instead of PHP_EOL
    
- 1.2.0 -- 2017-03-26

    - add WebProgramOutput
    
- 1.1.0 -- 2017-03-22

    - add ProgramOutput.setDampened
    
- 1.0.0 -- 2017-03-22

    - initial commit
