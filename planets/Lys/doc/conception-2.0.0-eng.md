Conception
==============
2016-01-31



Motivation
--------------

The current version of lys is messy, yet charming because of its simplicity.
The messy part comes from the skins.
The current skins shows some interesting behaviours that might be added not as a pack, but with more modularity.

For instance both the water and threshold skins come with the same kind of features:
they provide an auto count param system, and they handle an overlay.

I want to provide a more organized structure, with factorized functionality,
yet the code necessary to use the plugin should not involve the user too much. 




Conception notes
--------------------

Here are my thoughts about what should be the next version of lys.



The count parameter should be handled by lys itself.
Although not as pure as the original lys version, 
if we read carefully the lys concepts, we see that there are sensors, the provider service,
and the lys object that glues them together.

So clearly, be it a misconception or not, the intent is to fetch data from a service, as opposed to just perform any action.
Plus, the name infinite scroll suggests that we are going to repeat that fetch action.
Therefore it seems reasonable to think that the lys plugin itself would ease implementation of a count parameter,
which is likely to be used in most cases.

Some options and methods can handle that:

{
    useCount: bool=true
    countParamName: str=count
    countValue: int=1
}
+ void  setCountValue ( int:v )


Ok, we will imagine that this will do for now.
Extending the idea, there is also the urlParams, which accept a callback or an array of params.
I believe this also should be in the options:

{
    urlParams: callback|map = {}
                        Every time the data provider is called,
                        this urlParams option is merged with the params provided by the executing sensor,
                        and the result is passed to the data provider.
}



Then I would like to give back to the sensor a more legitimate role: sensor should be objects rather than just functions.
Take the waterball example, it needs the water height. 
This parameter belongs to the waterball sensor. So it's natural to encapsulate it into a sensor object.

Then we have the next thing: how to handle the overlay?
To be more exact, what actions are we taking before/after that the provider provides the new data?

From practise, we observe that in the case of water skin, we need to start/show the loader BEFORE the data are fetched,
and we need to stop/hide a loader (and the css animation that goes with it) AFTER the data are fetched, no matter 
how successful the response was.

So, different part of the core lys will be used.
Combine this info with the fact that in the last version of lys, there is this ugly thing: pluginParams,
which is a skin option to compensate the fact that the skin overrides the user's options. 


This leads me to the conclusion that we need a plugin system, with event listeners.
We will be able to bind many listeners to one event, thus resolving the last overriding problem.
A lys plugin would have a prepare(lys) method, so that it can register to any part that lys offers.
With this, we can imagine that a loader plugin would bind events to different parts of the lys.



### Css overlay

Also, I already had the cases with two css conflictual different overlays (using water and threshold skins 
on the same page).
Therefore, I would recommend that every overlay module uses its own namespace and use them in the css.

What I'm saying is:
- use .mymodule .overlay
- AND DO NOT USE: .overlay


### Sensor

To recap, a sensor is an object with a listen method.

listen (lys)
    //call lys.fetch when necessary
        



### Not polluting global space  

The multiplication of sensor/plugins will pollute global namespaces.
What we can do about it is provide a lys.sensors map and a lys.plugins map.



Do not forget the doc
-----------------------

As a good convention, emphasize that 
The element on which you call the plugin is the wall, as defined in the last version's readme.

And don't forget public properties (element, jElement).