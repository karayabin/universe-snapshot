infinite slider
==================
2016-02-15



The goal is to create a slider, which contains items, 
and two buttons that move the slider to the left or right.

The items appears to be infinite on both sides.
This means the user can click forever on any button, she will always see items sliding...




Conception
--------------


First, let's start with a requirement for this plugin to work: items must have the same width (otherwise
some things might not work as expected).





The trick that we use for the infinite part of the plugin is cloning.


Our goal is to make sure there is always 2 mi after the right boundary of the visible area, 
and 2 mi before its left boundary.


mi: move increment, the length representing by how much we move the slider each time we push a slider's control button.
it's basically the width of the visible portion of the slider.


So for instance, if the slider container has a width of 450px,
and our mi is 450px too, then when the plugin starts, we want to be sure that the slider's width goes from -900px to 1350px.
Visually, this would look like this.


```
-1800       -1350       -900        -450        0       +450        +900        +1350       +1800       
                                                -----------    
                          +++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
```

The dash line represents the visible portion of the items.
The plus line represents the portion that we want to cover with generated items (if necessary).
 
From there, if the user goes right, we want this. 

```
-1800       -1350       -900        -450        0       +450        +900        +1350       +1800       
                                                          ------------    
                          ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
```


But if the user went left instead we would have this. 

```
-1800       -1350       -900        -450        0       +450        +900        +1350       +1800       
                                     -----------    
               +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
```


An important thing to notice is that the plus line can only expand, not shrink.

Now, to know when to expand, and on which side, we basically keep track of the left and right boundaries of 
the plus lines, and we also keep track of the left and right boundaries of the visible part (the dash line).

Note that when the user resizes the screen, the mi might change, but our base algorithm is still valid, on the condition
that we operate the change before we actually slide (otherwise, there is an edge case where the user could see the item being
generated after a slide, and we don't want that).



Tip: since our technique is to clone items, do not use css ids on items, but rather data-ids...
Also, just the html is cloned, not events, so please rely on delegation techniques.




