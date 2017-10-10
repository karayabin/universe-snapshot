Laws
===============
2017-05-30



Laws in kamille.

Work in progress.


[![laws-in-kamille.jpg](https://s19.postimg.org/yqudrrv8j/laws-in-kamille.jpg)](https://postimg.org/image/8ij92eb4v/)


Todo: rethink the role of each entity (core module, laws system, kamille framework),
the image is the goal, but the implementation sucks, or at least needs to be re-checked.


My 2cents: 
- LeeTheme: used to decorate common widgets
- think about what is a page, and the relationship with the Controller:
        A page has a main function: contact page, login page, product page, read blog page, ...
        and a Controller is always named after the MAIN FUNCTION of the page.
        
        So the viewId, since spawned by the Controller is also named after that MAIN FUNCTION in some degrees.
        
- think about how theme authors have different interpretation of the same page:
        Lee: I don't have a lang bar position, I have a language bar position. (what a prick!, but that happens...)
        
        How naming convention ease the process of collaborative work (what's collaborative work?).
        But at the same time, how the system must be able to handle individual specificity/needs.
        
- think about how the theme override at the viewId level is one of the greatest benefit we have.
- the laws config file is the center piece of the laws system (or this messy system should I say)

- Controller override, that's a good thing, why do we use addChange/commitChange system?
           That's because:
                - it's more powerful than simple array_replace_recursive on array
                
- differentiate between includes and positions's roles:
        - includes is organizational, but we still need all the widgets in this top.php
                        You can get away without creating the widgets in top.php, but if you take the time,
                        you'll see than creating widgets gives you the ability to share those with others, 
                        or with yourself in the future.
                        So, the point is that you need to define the positions inside the common parts (top, bottom),
                        which leads us to the point where theme authors disagree:
                            Lee: I don't have a langBar position...
                            
- Theme authors can agree/disagree at the layout level,
        for instance on layout convention lnc1 (I use sandwich_1c for contact page, Mali: No, me I use sandwich_2c)
- Theme authors can agree/disagree at the position level of implicit parts (top and bottom includes for instance in sandwich_1c) or not
        for instance Lee: I don't have a langBar, I have a languageBar, plus I have another topIconBar that other don't have...
- Theme authors can probably agree/disagree at the widget level too. 
            I'm out of time, you guys were awesome. clap clap clap. 

        
        
                        
                        
                        
        
        
        
