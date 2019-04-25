Conception notes
==============
2019-04-25


So my technique to create a website based on widgets is:


- first create a prototype template
- make a copy of the template
- rename the template into layout.php 
- progressively replace the html static features with php dynamic features, which means:
    - replace the html elements with the printZone methods
    - inject copilot statements for the top and bottom parts of the html page
- ...


And so when I'm at the step where I replace a bunch of html code with a printZone statement,
suddenly the html page doesn't render well anymore, because all the static code is gone.

Now what I'm supposed to do is configure the zones in the page configuration (file if babyYaml),
each zone containing an arbitrary number of widgets. 

Now especially at this moment of the conception where I have exactly 0 widget created yet, it takes a long time
to create all widgets, this basically interrupts my flow defined above.

So in order to not interrupt my flow, I use the prototype technique, where I basically put all static html code in files,
and then just reference the file to print it as is. 
It's not dynamic, it's still need to be dynamised with php later on, but at least I can cut my layout in zones and widgets,
and have the html page render correctly.


So that's all there is to it, the prototype widget is just a tool which belongs to this prototype methodology;
I use it to have a workflow I'm comfortable with, when creating widget based websites. 



