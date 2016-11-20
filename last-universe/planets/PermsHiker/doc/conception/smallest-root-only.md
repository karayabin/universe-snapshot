Brainstorm 2016-06-22 - Smallest root only
============================


Main idea
------------
If a parent and all its children & grandchildren have the same permissions,
then we just need to write one entry.


Context
-----------

So I used PermsHikerParser to migrate my websites from host A to host B.
It created a permsmap.txt file containing 209000+ lines.

That seemed a lot to me.
Every file that had special perms was listed.

I thought about that, and understood that I don't need that much precision,
that's because I know that I never apply special perms on a specific file,
but rather on a directory, at least for this specific migration from A to B.

So I added a dirsOnly option to the PermsHikerParser, and now I have 83000+ lines.
Well, better, but still it doesn't feel right: it does not reflect the way I think
of how perms were applied.

When I apply perms on an directory, I implicitly mean recursively.
The problem that my current permsmap has is that it list every folder, including children.

So my goal here is to create a permsmap that only lists the necessary children, so that 
I can chmod/chown them recursively.
This would make the permsmap more human friendly, and will reflect the general map of perms that was applied to the application
in the first place.




Thoughts on how to implement it
-------------------------------

The underlying parsing techno used by PermsHikerParser is the DirScanner, which lists directories before files.
I want to leverage that particularity.


By jumping from a line to the other, we know:
    - is the current line a children of the previous line?
    





I assume the dirsOnly mode is used (this won't work otherwise).

In mind, I have this idea of a two steps process:

- sum
- rewrite


sum will prepare data for the rewrite phase.
rewrite will read the data from sum and know what permsmap entry to create.


Sum will parse the existing dirsOnly permsmap, line by line, and determine whether a line is a children (of the previous line)
or just a regular dir with no children (leaf).

Then I use the concept of score.
Each line will have a score attached to it, which represents its conformance to its direct parent.
If a parent has a score of 0, then this means that none of its children has a different permission.
In other words, we can apply permissions recursively on that folder.

Every line adds 1 to the score if they have different perms than their direct parents.

Here is a visual example/idea:


- dir1 (ling:ling:0755): total=0, we can apply perms recursively (during the rewrite phase)
----- subdir1 (ling:ling:0755): +0 
----- subdir2 (ling:ling:0755): +0 
---------subsubdir1 (ling:ling:0755): +0 
----- subdir3 (ling:ling:0755): +0

- dir2 (ling:ling:0755): total=1 (induced by subdir1), we can NOT apply perms recursively (during the rewrite phase)
----- subdir1 (ling:admin:0755): +0 
----- subdir2 (ling:ling:0755): +0 (we can apply perms recursively on this folder)
---------subsubdir1 (ling:ling:0755): +0 
----- subdir3 (ling:ling:0755): +0


- dir3 (ling:ling:0755): total=2 (induced by subsubdir1 and subsubsubdir1), we can NOT apply perms recursively (during the rewrite phase)
----- subdir1 (ling:ling:0755): +0 
----- subdir2 (ling:ling:0755): +1 (induced by its child) 
---------subsubdir1 (www-data:www-data:0755): +0 
----- subdir3 (0755): +1 (induced by subsubsubdir1)
---------subsubdir2 (ling:ling:0755): +0 
---------subsubdir3 (ling:ling:0755): +1 (induced by its child) 
------------- subsubsubdir1 (ling:admin:0755): +0 



The main question is: is the score 0 or different than 0?
  
  
Here is an early/brainstormed algorithm:
  
  
foreach lines:
    hasPreviousLine?
        is it a children of the previous line?
            is it different than parent?
                +1 every ancestor
            else 
                // doesn't matter                         
        else
            // doesn't matter                         
    else
        (it's the first line, nothing special...)





After toughts
-------------------
So, just implemented that tool, and I've got 1352 lines,
which is more than I expected, but the tool is doing it's job.

Actually, it pointed out that I had some messed up permissions in one of my application (and therefore acted 
like a debug helper).
Fixing the app's perms error manually, I get down to 119 lines, which is more in the range of what I expected.

Nice and clean.
So, it's a useful tool ;)












