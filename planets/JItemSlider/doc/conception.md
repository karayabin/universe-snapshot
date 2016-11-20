item slider
==================
2016-02-23




Item slider is a variation on the [jInfiniteSlider](https://github.com/lingtalfi/jInfiniteSlider).
It is inspired by netflix's slider system as of 2016-02-23.



Features
-----------

The main features are:

- per item approach: the base unit for a slide move is an arbitrary number of items, as opposed to an arbitrary number of pixels
- handles infinite/finite modes
- handles responsive designs (you can vary the number of items per page depending on the page width for instance)






The main concepts
----------------------

- the slider structure


### The slider structure

A typical slider's html looks like this.


```html
<slider>
    <handle prev/>
    <sliderMask>
        <sliderContent>
            <item/>
            <item/>
            <item/>
            ...
        </sliderContent>
    </sliderMask>
    <handle next/>
</slider>
```


There are only 3 necessary elements to make the slider functional:

- the slider mask: is the visible window through which one can see the items slide 
- the slider content: is the items container. It's position is updated dynamically to create the actual slide illusion 
- the items 

The handles here allows for a netflix like configuration, but you can put them anywhere.
The slider top level element also is not part of the necessary structure.

See the demo examples to see the base css required.

 
 
 
 
            
            


Internal concepts
---------------------

The item slider plugin gravitates around a few functions:

- initial paint: draw the initial items in the slider
- resize: handle actions on window resize (to handle responsive design changes)
- move left
- move right
- first page, last page flags


### initial paint

drawing the initial items in the slider.

The basic idea is to paint this:


```abap
<prev items>   <prev extra>   <main items>   <next extra>    <next items>
```


The main items are fully visible through the slider mask (this is done via css).
The extras components are partially visible (also via css).
The prev and next items are not visible, but they are painted to smooth the slide movement illusion.


Note: things get a little bit more complicated with the finite mode, where we emulate fake "prev items"
to ease computation, and then we have to deal with those after; but the same concept applies.



### resize
 
If the css has some media queries, then the js code should be updated accordingly.
There is the nbItemsPerPage option, which is a callback, which returns the number of items per page at any time.
So this option is the door to the responsive behaviour provided by the item slider plugin.

Basically, the plugin detects a nbOfElementsPerPage change, and rebuild the whole structure (see initial paint) when 
such a change occurs.


### move left/right 

Both moves have in common that they try to keep the original structure (initial paint) in place.
This is to avoid having too many items in the slider, which could potentially slow down the whole animation.
 
Recycling would be the main idea here.



### move left
 
The move operation is composed of the following steps:
 
 
- append new items to the left
- then fix the offset to cancel the gap (if you add 3 items to the left, this will naturally push all your items to the right,
            so  you have to push the slider content to the left by a distance of 3 items)  
- remove the obsolete right most items 
- rename the items consistently to ensure that the initial structure is maintained  
- slide (we use css3 transform: translate for that)
 
 
Note: the slider content is affected by two means:

- left position (relative positioning): to counter balance the extra items being appended/removed to/from the left side,
            and also to adjust the margin position (very tiny adjustments, see the alignMargin option below)
- translate (css transform): to slide the slider content. This is done via css, so that we have full control on the visual transition
                of the slider (transition: transform 2s ease; ...)


### move right

Almost like move left, although technically, the offset fix is executed after the remove of the leftmost obsolete items 
rather than after the appending new items on the right.
That's because, the offset if only affected from the left (think about it).



### first page, last page flags



When in finite mode, you have the notion of start and end.
So the main idea here is to allow the developer to switch the visibility of the handles on and off when appropriate.
Typically, on the first page we don't display the previous handle, and on the last page we don't display the next handle.

Note that this does not affect the functional behaviour of the slider.
The slider implementation is so that it will refute to slide out of boundaries (i.e. you cannot have a blank page). 


We would pass those flags to the onLeftSlideAfter and onRightSlideAfter callbacks, where the developer can make 
use of them.
To save one argument, we will pass them as one argument:
 
- boundaryValue: 0|1|2|3   (only relevant in finite mode, is set to 0 in infinite mode)
                    0: not a first page, not a last page 
                    1: first page 
                    2: last page 
                    3: first page AND last page 



Also, the dev might want to know the states of those flags when the plugin is instantiated.
For instance, she might assume that the first slide page shown is always a "first page" (because there is no 
"start at page" option yet), but she might wonder if it is also a "last page".


Therefore, we will add the getBoundaryValue method for that purpose.
We will internally update the getBoundaryValue at the end of a slider move, just before the onLeftSlideAfter and 
onRightSlideAfter callbacks are updated (no particular reason, could be changed).
  




Align margin option 
-------------------------

The align margin option is an adjustment that allows you to decide how you align the first main item to the 
left boundary of the slider content.

Note that the margin of an item is dictated by your css, so we have control on it.

You have 3 possibilities:

- full: the distance between the left boundary of the slider content and the left boundary of the first main item is 
            equal to the item margin.
- half: ... equal to half the item margin            
- none: ... equal to zero (they are perfectly aligned)            
            



Internal problems
========================


finite problem specific:

- first item looses leftmost position 
- reforge down can strip main





first item looses leftmost position
--------------------------------------

Reproduce:


- be in finite mode
- be in responsive context and have 4 items per page (ipp) and 3 ipp choices.
- have 10 items 
- start with 4 ipp and move right
- switch to 3 ipp
- move left
- move left

```
--> the first item is in position 3 instead of desired position 1.
--> the problem is that there is a gap between the slider mask's left boundary and the first item:
        a blank that we don't like.
```        

This is not a problem in infinite mode because there is always more item to fill up the left gap to the left of item 1.


Observation:
we can also reproduce the same problem by doing the following sequence (which is faster ro reproduce):

- 3ipp move right
- 4ipp 
- move left


I noticed that in both cases, we end up in a state where the blank space is actually some items with classes main and invisible,
and data-id=0


We need more details before taking a decision, but my global wish is to make the slide smoothly slide 
the right distance rather than fixing the distance in an abrupt motion afterward.
 
So in the second scenario, we do 3ipp move right, and then switch to 4ipp, at which point the state 
of the slider looks like this (i stands for invisible, and triple pluses indicates a pemen separator,
numbers are data-id):


0i 0i 0 1  +++ 2 +++ 3 4 5 6 +++ 7 +++ 8 9  

In the current state of things (which are buggy), the last left move gives us the following slide state:

0i 0i 0i 0i +++ 0i +++ 0i 0 1 2 +++ 3 +++ 4 5 6 7
 
The part of interest is the main part, which is 
 
0i 0 1 2

We can observe that we end in that state where the first item is invisible, and the first main item (0)
is therefore at the second position: there is a blank before it, and we don't want that.

What we want instead is that the first item is at the first position of the main section.
So here is what we want:

0i 0i 0i 0i +++ 0i +++ 0 1 2 3 +++ 4 +++ 5 6 7 8

 
 
 Let's examine the left move:
 
     paintPrevSlice
        (basically add 4 items of type 0i to the left)
     repositionSlider
     cutRight 
        remove the next items in the end 
     renameItems
        restabilize to a consistent pemen state
     moveSlider
        slide a distance of pageWidth()
     
Let's debug pause our state again, to enable visual cues:
 
initial state:     
0i 0i 0 1  +++ 2 +++ 3 4 5 6 +++ 7 +++ 8 9

paintPrevSlice
0i 0i 0i 0i 0i 0i 0 1  +++ 2 +++ 3 4 5 6 +++ 7 +++ 8 9
 
cutRight
0i 0i 0i 0i 0i 0i 0 1  +++ 2 +++ 3 4 5 6 +++ 7 +++ 
 
rename
0i 0i 0i 0i +++ 0i +++ 0i 0 1 2 +++ 3 +++ 4 5 6 7  


Now let's replay it again, but imagining paths to the desired final state (brainstorm mode).

initial state:     
0i 0i 0 1  +++ 2 +++ 3 4 5 6 +++ 7 +++ 8 9


The first main is 3.
If we slide to the left, we push 4 items to the right and the main item at position 1 would be 
the current last 0i.
We know that we have 4 prev items and 1 extra (pemen structure), so we can establish:
 
if finite 
    if firstMain.id != 0
        if (item 0).index (which is 2 in this case) > 1
            then our left move will end with a first main NOT in the first position.
            
We can fix it with this:
    
nbItemsToAddToTheLeft = nbItemsPerPage + 1 - (item 0).index                

Let's see now if it would work.

nbItemsToAddToTheLeft = 4 + 1 - 2 = 3


paintPrevSlice (using 3)
0i 0i 0i 0i 0i 0 1  +++ 2 +++ 3 4 5 6 +++ 7 +++ 8 9


cutRight
0i 0i 0i 0i 0i 0 1  +++ 2 +++ 3 4 5 6 +++ 7 +++  

rename
0i 0i 0i 0i +++ 0i +++ 0 1 2 3 +++ 4 +++ 5 6 7   


Well, almost, we just need to append the last 8 to get:
0i 0i 0i 0i +++ 0i +++ 0 1 2 3 +++ 4 +++ 5 6 7 8


In code we could raise a flag if the first main NOT in the first position situation would occur,
and then the cutRight method would react to this flag, and instead of removing all .next items,
it would only remove the necessary items.





















reforge down can strip main
-----------------------------

- be in responsive context and have 4 items per page (ipp) and 3 ipp choices.
- have 10 items 
- be in 4 ipp and move to the right
- move to the right, and during the sliding, resize down to 3 ipp


```
--> you end up with a blank screen,
--> that's because of current implementation of reforge (called when 4 to 3 ipp is detected).
--> The problem can be understood visually.  

        
        - have 10 items with 4 ipp
        
            pppp e m0 m1 m2 m3 e4 n5 n6 n7 n8
             
        - move right after     
    
            p p0 p1 p2 e3 m4 m5 m6 m7 e8 n9
    
            From there, a normal right move with 4 ipp would normally lead to this:
    
            p3 p4 p5 p6 e7 m8 m9
            
                where the first main item m8 is at (visible) position 1.
                So we have two visible items: m8 m9 and everything is fine.
                 
            However, if we resize during this second right move; we end up with this.     
                             
            p4 p5 p6 e7
            
                and we get a js error: 
                    Uncaught TypeError: Cannot read property 'left' of undefined  line 199
                that's because there is no main element anymore. 
                This is an error from the alignByFirstItem method, called after the slide move is executed.
            
            
            Due to the implementation of reforge, this is the expected behaviour.
            Note that from that state, we can switch from 3 ipp context to 4 ipp context indefinitely,
                    p4 p5 p6 e7
                    p3 p4 p5 p6 e7 m8 m9
            and observe the real problem.
            
            In fact, due to the right move implementation, the slide movement is actually performed AFTER 
            that the actual slide computational stuff is done, which means that the state of the slider is 
            already in its final state before the slide visually slides.
            
            This behaviour is not what we would intuitively expect though.
            What we would expect is to have the two main items still visible in the screen, on the left,
            like with a regular 4 ipp move.
                    
                    The regular 4 ipp move would give:
                    
                        p3 p4 p5 p6 e7 m8 m9
            
                    Switching to 3 ipp during the move, we would expect this:
            
                        p4 p5 p6 e7 m8 m9
                        
                        
            Note that if we had 11 items, the problem wouldn't occur, because one main item
            would remain visible.                                    
                        
    
--> this is not a problem in finite mode, because there is always enough main items.
```


Implemented solution:


During the reforge,
detect if the actual reforge would lead us to the case where no main items would be visible.
IF this is the case, do not strip the right most items.







