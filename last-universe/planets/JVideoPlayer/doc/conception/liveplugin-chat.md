2016-04-04


What is it?
---------------

The goal of the live plugin is to play live events.
It's like if the user watched tv, except that the user can also pause the video if she wants to.



The pause problem
--------------------
2016-04-04

There is an obvious first problem here, imagine that there are two programs playing:

- A starts at 11:15 and has a duration of 20minutes
- B starts at 11:35

Now Alice watches the A movie for 10 minutes and then pause the video to go 
to the wc (so it's 11:25 when she pauses the video).

Her pause lasts 5 minutes.

When Alice comes back, it's 11:30, she resume the video.

What should be playing?

--> common sense: the last 10 minutes of A (since that's where she left A).

Ok, but then when A ends, it's 11:40.
So, what should be playing at 11:40?

--> common sense: assuming the possibility that Alice had planed to watch both A and B,
    B should be playing from its beginning at 11:40.
    In other words, by pausing the video, Alice has entered her own timeline.
    
    
Ok, but what if Alice's pause lasts more than one hour.
    
--> common sense: it might be wise to not try to guess what Alice is doing during her pause and just respect the 
    fact that she is taking a pause, and that the video should resume as expected.
    That's because maybe Alice wants to watch the movie, but she must go to the doctor, and she can come 
    back a few hours later.
    Program wise though, we should have the option of setting a threshold after which a pause expires, if our client 
    wanted to do so.
    

So, you are saying that if Alice's pause is 4 hours, then B, which was supposed to play at 11:35, would start at 15:35?
    
--> common sense: yes.
            I understand that it might feel strange;
            therefore, there could be a resync button, which Alice could push whenever she wants,
            and which would switch her back (from her personal timeline) to the common timeline.
            With that button, you have the better of both worlds.
    
 
Sounds good for the basics.
We shall implement this system, and I will come back to you whenever I found another problem.

--> common sense: sure
 




