Flue conception notes
=========================
2016-02-25



Front end - glue



Helper to organize your front end gui code. 



Flue is basically just an idea, and a tiny helper library.
The idea of approaching the coding of a front end user interface with javascript by starting by the events listeners,
and down to the code.





Personal motivation
-------------------

My client wanted to reproduce the neflix ui, and I could do it with plain js code (with help of jquery).
But, my code was quite big, and I was not happy with it, it started to be a little hard to think of all 
interactions at the same time.
What is it going to be in 6 months?


So I searched the web for structure and I found backbone.js, 
I tested it, but I felt like there were too much functionality that I didn't need, compared to my
straight forward big code.
I'd rather create something in between.


Also, I didn't even try angular or react because they do things totally unrelated what my original code does.
I don't need new functionality, just a little help with code organization.


The obvious way is to use objects, but how to assemble them? 
There is the who, what, when, where, why and how methodology.
But I want something than I can reapply to any js front end page.
I don't mind reapplying the tool on every page, that makes sense to me.



What
-------

The tool is about creating a front end js page.
A front end js page has user interactions in it: mouse click, hover, scrolls, etc.

I have personal opinions on how things should be done, or at least how I like them,
and the tool will be a companion for me, and maybe anyone that shares my points of views.

So let's talk about how I believe js front end code should be organized.
 
Basically, here are my motivational axises:
 
- simplicity
- delegate events as much as possible (perfs)
- easy to develop and maintain
- I'll be using jquery





Events listeners first concept 
------------------- 

First, I believe that any event should be delegated.
So my first idea would be to have a place in the code where all events listeners are initiated.
Why not implement the separation of concerns and create a separated file and put all events listeners there.
The role of that file would be to trigger every event listeners that we have.

By its nature, delegation reduce the number of needed events listeners, but what 
if we still have more than 10 events listeners?
Do we put all of them in the same file?
 
Since the main motivation was code organization, I will say that you can create as many as you want, and one 
is fine to start with.
 
 
Second, I believe that nowadays tools are sophisticated enough to let us combine and uglify all js files when deploying
to production, so I will assume that this is a simple operation that will be done when necessary, 
and will not limit the need to creating js files for organization purposes.


But how do we throw the event listeners in the listeners files, do we simply throw the code at global code level?
No, obviously not.
I propose a thin wrapper (basically just an array), just enough to collect all the event listeners from those files, and call them 
all during the init phase. 

This would be the first feature implemented in flue.


So here is the first concept: the (events) listeners initializer.

```
- myListeners1.js
- myListenersForSlider2.js
----- (example code)

    flue.listeners.add(function(){
        // put all your events initialization here
    });
        

- myListeners3.js
```


And the flue code would be a simple array being iterated:

```js 

flue.initListeners();
    
    for(var i in this.listeners){
        this.listeners[i]();
    }

```


One crucial things to notice here is that we should always call the initListeners method only when dom is ready,
that's because an event listener has better chance of working when the dom is ready.




Code bubbles 
------------------
@problem: v1.0.0.set_manager_dom_not_ready

Let's go a step further.
Our listeners will be calling some code.

Note: code that is triggered by a listener is called code bubble in the flue nomenclature.

A developer might as well want to dispatch her code in many files.
To help with organizing those files, flue will provide a flue.bubbles.add feature.
It works in the same way as the flue.listeners.add method, but for bubbles.




```
- myBubble1.js
- IamAComplexBubble.js
----- (example code)

    flue.bubbles.add(function(){ // the dom is ready here, by flue's convention
        // do some magic stuff with dom ready here...
    });
        

- myBubble3.js
```


And the flue code would be a simple array being iterated:

```js 

flue.initBubbles();
    
    for(var i in this.bubbles){
        this.bubbles[i]();
    }

```






Init
------

Actually, you know what, let's create one init method which will simply call the initEvents and initBubbles methods for us.
Otherwise we would have to do it manually everytime and that would be boring...
Here is the implementation of the new init feature of flue:

```js
flue.init = function(){
    flue.initBubbles(); // the bubbles are called before, because they should be ready when the events execute
    flue.initEvents();
};
```






Communication between files concept
---------------------------------------

Since we are potentially breaking our code into different files, a feature that we probably need at some point is 
a way to communicate from one file to the other.

This is the second feature of flue, I propose a simple registry with get set methods.
Actually I added a third getOr method (habit from php coding), which I find personally useful, see by yourself.

```js
flue.set( k, v );
flue.get( k );  // throws an exception if k is not set
flue.getOr( k, default=false ); // returns the default value if k is not set
```

I'm not sure whether or not having two types of getters will be useful at the moment, but that's not a big deal I think.






The end 
-------------------
I believe that's it.
The rest depends on your application and needs.


 






Final thoughts
----------------

Having the best tool does not make a great house if you don't know how to use it;
a little tool like flue can help you a little bit, but won't make the house for you.

flue puts your events listeners as the front door of your js code, like arms waiting 
to pull information from the user, and to your areas of code, where serious business begins.


Now, you still are responsible for the other areas of code, but I would personally 
follow the flue philosophy (I just made that up) that is to create well thoughts objects separated 
in different files.

Instantiating a flue object seems superfluous at the moment, I believe that if different surfaces cover 
different domains of your code, you should use namespacing.



Notice that every events and bubbles have to be declared at once: you cannot dynamically add bubbles/events;
and that's because I believe you shouldn't: that's the principle of delegated events: they already know what's 
going to happen in the future of the page.
 
 



And finally, if you want to create a backend with crud interactions, you probably want to look 
for other tools, flue is just for front end.







The sketching methodology
------------------------------

I accidentally found a methodology to actually document and create any front end gui at the same time.
Plus, it's fun to do, and anybody can do it.


The base idea is that a front end gui is a collaborative work between events listeners and managers.



You take a sheet of paper, and then you start to sketch the gui.
Only draw the most important elements, those which the user can interact with, this step shouldn't take long.


Then we want to draw any possible action.
Maybe not all actions will fit on the same sketch; that's not a problem, we can use another sheet of paper.

But to draw an action, remember the flue philosophy, events listener first: so ask yourself: what can the user do.

For instance, if she clicks on an slider left handle, the slider should move left.
Okay, but how you represent that?

Well, how do you represent an event listener? It's a person right?
So make a stick man, very small, hanging somewhere in your image.
Then, next to that guy, indicate the kind of event he's listening to (click, mouse enter, etc...),
but just one per stick man.
If you have multiple events listeners bound to an element, well, draw multiple stickmen, remember that 
ONE event listener is ONE person, so it's a simple rule there.

I like to think of the listener as a person with a single responsibility.
He sits on your design, and wait and wait and wait... until the thing he's waiting for happens,
in which case he shout out loud the one thing that is supposed to happen.


Now, the event listener will trigger some function, right?
How do you represent that?
Well, draw a bubble speech to your stick man and indicates which manager and which method he calls.

A manager?
Yes, to continue the metaphor, the event listener (the person) communicates with (one of) his manager,
only one at the time.
The manager is a person who has the technical knowledge of how the internal things of the ui work,
and it can do anything. But when the event listener call the manager, he always calls one simple method.

For the slider example, the slider event listener would call the sliderManager.moveLeft method, for instance.

Do that for all your events.
At the bottom of the page, draw your managers, they are also stick men. 
Next to the managers, recap the method that have been called by the listeners.

Sometimes, an event listener ends up by changing the state of an element.
Obviously, we cannot draw dynamic things on the paper, so we need to take another sheet of paper.
For instance, if a click on an image make a form appear, in the bubble speech of the event listener,
add a 2 number reference, that indicates that once called, the gui will be in the state of the page 2.
Then on page 2, re apply this methodology.


### The surprising benefits of this method
 
I was blown away by observing how incredibly benefit this method was.
Let me try to sum up those benefits.

If you stick to the rules I gave you, what you end up with is a map of what should be implemented.
You can use it a simple documentation of one or more sheets of papers, that anybody can 
understand, which is a very valuable asset when taking the project 6 months later.

Plus, the documentation is visual, so it's faster to understand than a long reading.

Plus, it's also faster to draw an image (even multiple images if you have multiple states) than creating 
a theoretical documentation.

Plus, when you look at the map, your attention immediately focuses on the stick men, where the action occurs.
Plus, you probably noticed that when you draw a speach bubble and you call a method, you actually have 
to make up this method, which doesn't exist yet.
This means that you will go to the essential; and therefore your api will carry those simple method names.
When doing so, you also had to think about which manager should be called, all this is important organizational
decision that you already take care of from your sketch.

Now, it requires some expertise to be able to sketch things that would actually work, but if you have some 
experience with coding, you will manage to call methods that you'll then be able to implement.
You have to know your objects very well, what's available to you, those sort of things.
Anyway, that's the idea, so if you call something that you cannot implement, you have to improve yourself,
the bottom line is that IT IS POSSIBLE, since you thought it (unless you are asking for the moon) 
that's the philosophy.
And of course, no need to say that you have to stick to the plan in the implementation phase.


Another advantage is that you really have an eagle view of what has to be implemented, you have the architect map,
and that's very good to have when coding.



I will show you my two first drawings that were drawn actually before I wrote that section.
The drawings are awful, because I didn't know that I would publish them, but that will give you an idea 
of what it looks like anyway.

In the future, I will probably take the drawing more seriously, at least if this method happens to be 
a real helper to front end gui conception.



### Two things I forgot

I forgot to mention, an event listener can actually handle more complicated cases.
Imagine that there is an event listener that detects the mouse enter event on images.
If the image is in a certain state, the event listener should do one thing, and if the image is another
state, he should do another thing.
So, an event listener basically can deal with some if conditions to call a manager,
but that's pretty much the maximum complexity he will have to deal with.


Also, I forgot to say that if you have multiple states (pages), you might have conflict with your listeners.
If we take the example of the image listener with a conditional action, the two conflictual event listeners 
might actually be on different pages: one listener for the "normal" mode, and one on the page of 
the "other state" mode.
To better visualize this possible conflict, take a red pen and underline the type of 
events (click, mouse enter, etc...) on every page where they are conflictual.
By doing so, when you read the map and you see the red line, you know that you must read the other pages
to fully understand the end of the story.


Ayy, and one last note: the manager is called manager because it's not a single object, but rather 
the manager of a type of objects.
Remember that we are in a delegated events philosophy, so we don't need to have single objects,
we focus more on interactions.


In flue, nothing is implemented to help us with that new methodology, but we can implement it if we want,
as a convention.


Continue the sketching methodology in code
----------------------------------------------

Now if you like the sketching methodology and want to give it a try, 
there might be other things to say.


First, the managers internally use some common tools.
Those tools are common to the surface they have authority on, and is accessible through the api 
property of the flue registry (convention, all this is pure convention).
So the api could be defined as the internal tools for managers.

I would create an api.js file.

Also, for the surface's conf, I would use a map reachable via api.conf.





Use illustrator
------------------------

The fastest way to sketch is probably to use a pen and a paper.
However, if I work with teammates, I like the nice chromed look that an ai illustration has, 
plus it's easier to reedit, in case you want to update your sketch.

And on a second thought, ai might be even faster in the long run, because it has some drag and drop and clone features
that we don't have with a simple paper and pen, so if you design a gui with states, ai would probably be faster.

I recommend that you use your own sketches styles, but I will give you my ai work file, it has clones of humans (events listeners and managers)
on the left, and clones of ui elements on the right. 
So you can simply clone them into your gui.

The name of the style is ling style.
Style influences how you draw the stick men, the font family and size that you use, the colors, ...
Pull requests are welcome.




Other thoughts to insert in the document 
-----------------------------------------

When you use the sketching methodology, it forces you to have an easy to use api.
It's good, because you have a starting point (the listeners), and it gives you some orientation.
Now it doesn't mean that your code will be good or bad, it's just a starting point.
You can totally mess up the rest of your code if you want to, that's up to you.

Or, hopefully, you can make a simple api behind and have a nice and maintainable code.

The flue part is just the entry door to your real api.


---

While doing the neftlix sketch 2, I had to choose things like:
who is responsible for trigerring the play method of a video.
My first thought was that it should be a video manager that I would implement later.
On second thought, I visualized that the big card has to close when the video plays (my client didn't want page refresh),
so I would rather make the bigCard execute the call to the video api itself, after it has closed itself.
 
This is a work in progress and I might be wrong, but maybe this is an indication that when creating method names on the fly,
one should try to stick with he "surface" manager if the surface can potentially visually change upon the action.  



---- 
if you work with htpl (html templates), you can quickly have a lot of templates to call and manage.
It's a good idea to name your template in an intuitive manner, otherwise you can get overwhelmed by the numbers of 
templates, and your productivity degrades.

Since we use sketch methodology, you already have a visual map of the gui.
A good convention (work in progress) for a template name can be this:

- template name = $pageId/$surfaceName/$function.htpl

A function can be a simple thing like: 

- item
- handle
- slider
- ...








Cheatsheet
--------------


### Nomenclature

- surface: an html element that contains the ensemble of interactions for a given flue session.
            As an exception, events listeners bound to the window element are ignored for that matter of determining
            what is the working surface.

- flue session: an ensemble of flue based code that provides widgets for a given portion of the page (the surface) 
- page life: typically a page is killed when the user refreshes the browser.
                The page life is the time during which the page is still alive.

- bubble: a portion of code called by an event listener  


TODO



 
 
 
 




 

