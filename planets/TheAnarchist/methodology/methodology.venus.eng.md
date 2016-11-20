Venus
---------
2015-12-03



Natural intro
-----------------

This is a methodology for oop developer that one can use while thinking about a class conception.
It's very pedantic (I believe).
The main goal is to be able to come back on your class a few months later and understand what this is about.



Commercial intro
--------------------

When you think about a class, all your thoughts are important.
The main goal of venus is to keep your thoughts all together for later use.

Say you create a system with a few classes, and a few months later you need to upgrade it.

The promise behind venus is that:

- you will have all your thoughts available when you come back on the project
- if another dev was given the responsibility to upgrade your project, she could read your notes and see 
        the conception main guidelines, maybe spotting some points that she doesn't like in a way you approached a problem,
        and therefore figure out the problems before she dives into the reading of the code (might be useful if you have a complex code)




Who is it for?
------------------

Me, sometimes.
You, sometimes?


How to
------------------

There are two parts in the development of a project:

- conception
- implementation

Since implementation comes from the conception, we only need to focus on conception.


Create a conception folder and put the following files in it, as you need them.

```
- conception
----- problematik.$tags
----- analysis.$tags
----- conception.$tags
----- prototype.$tags
----- reflections.$tags
```



With: 

```
- $tags: myProjectId.lang.fileExtension
example: kokonut.eng.txt
```


**problematik**:
- What's the problem you try to solve, be objective and concise. 
- A single sentence should do.

**analysis**:
- What's YOUR general interpretation of the problem.
- What are the main axis you are dividing the problem into.
 
**conception**:
- What are the different roles (objects) you will be using
    
**prototype**:
- Sketch the classes signatures.
- This is a pre-implementation in pseudo language, that helps the developer see the interaction between objects, and spot early problems.

**reflections**:
- Collection of your thoughts which are too big to fit in the other documents.
- The other documents make references to the thoughts located in the reflections document. 






### Reflections format 

At any time, if you have a thought that you are think it's worth writing down, put it in the reflections file.
You can organize them as you want, but if someone has really plenty of time, she could make a robot that would
parse your conception folder and make a clean html doc out of it.
Therefore, the standard format has the following intuitive form:

```
@1: 2015-02-27 General analysis: first essay
------------------------------------

blabla
```



The abstract form of it is:

```
- section: <@> <numericalIdentifier> <:> <complementarySectionTitleInfo>? <titleSeparator> <sectionContent>
- numericalIdentifier: an int 
- complementarySectionTitleInfo: a string that represents the idea described in the section content
- titleSeparator: n consecutive dashes, where n>=3 
- sectionContent: your thought 
```
 
 
 
 
To make a reference to a thought from a document, use the following intuitive notation:
 
- @2

which abstract form is:

```
- <@> <numericalIdentifier>
```
        
        
 
 








