Conception notes
================
2019-04-30





Summary
===========
   
* [What's the markup required for a website builder in Kit?](#whats-the-markup-required-for-a-website-builder-in-kit)
* [Transforming any widget into a website builder friendly widget](#transforming-any-widget-into-a-website-builder-friendly-widget)
    * [But what are those rules?](#but-what-are-those-rules)
         
         
         
         
This morning, I woke up with some thoughts about the website builder implementation.

Didn't want to loose those thoughts, hence this document. Those thoughts will wait here for the implementation day, I guess.



I don't have a one-fit-all methodology to resolve all possible problems,

however this morning, I felt that my thoughts were scattered, going in all directions, making it hard for me to make
sense of all this mess of random ideas.

To that particular solution, I forced myself to ask the one good question to get started, and luckily I believe I found one:


- What's the markup required for a website builder?



What's the markup required for a website builder in Kit?
------------------

In Kit, widgets belong to a page, then a zone, then they are referenced by a position (aka index) inside that zone.


And so this kind of "id" (page.zone.index) allows us to retrieve the configuration from a widget.

It's pretty obvious that a website builder will need the widget configuration at some point, when the user wants to update a widget.

And so the "widget id" (let's call it so for this document) needs to be there somehow.

Before I jump into the markup implementation for that, let's collect some other things we want for a website builder.

Most website builders I've come across seem to use a contextual overlay: an overlay which lays on top of the widget area on hover,
and which often has a mini contextual gui attached to it (meaning a gui depending on the type of widget that is hovered).

This mini gui resembles a bar with some buttons, and disappears with the overlay when hovering out of the widget area.

I'm not saying that it's the best implementation, or that it's bad either, but that's the most demanding implementation
I can think of in terms of markup, because if we were to implement that, we probably would need the widget type (or name in kit)
in the markup somewhere to achieve that.


That's because adding a gui on hovering needs to be fast, and if we were to query the widget configuration just to get the type
to display the appropriate gui, I fear that our resulting website builder would suffer lag times.
So personally, I would rather have the markup telling me which widget type it is, saving that query.



So to recap, we need two things:

- the widget id to get the widget configuration   
- the widget type, if we want to display a widget specific overlay on hover


I forgot to mention that an alternative to displaying a widget specific overlay on hover is to display a widget non-specific
overlay on hover, like an anonymous button, which then on click opens a specific gui panel. That's just an idea, I don't know
which one stands better for now, I need to think about it, later...   
 

Now what about the markup implementation.
I believe that we need this kind of markup (for instance):

- each widget's outer tag contains the following attributes:
    - kit-widget-id=$page.$zone.$index
    - kit-widget-type=$type



Now about the implementation, I thought of two ways to implement that markup, one being static, one being dynamic.

For the static implementation, well each widget writes its own markup, seems pretty simple and straight forward.

For the dynamic implementation, it's more convoluted, but I will explain why I thought about that in a second.
We would need that kind of static markup first:

- each zone's outer tag would contain the following attributes (for instance):
    - kit-zone-name=$name
- and each widget's outer tag would contain the following attributes (for instance):
    - class += kit-widget

    
Then, we would load once the page configuration in memory (when the page loads), 
and with the help of some js, we then inject the desired markup dynamically.


So the big question is: why the heck would we need dynamic markup when static markup seems more convenient?


Actually, first of all with kit we can disable widgets, something to be aware of.
Then, with a website builder, one common feature that we have is to reposition the widgets order.

And so with the static method, if we want to reposition the widgets, this also means that we need to update the markup (the kit-widget-id attribute
in my example above).
Now I realize that being written down like that, it doesn't seem hard at all, and in fact, it might be my chosen implementation.

But when I had the thoughts this morning, I must have believed that it would require a whole zone markup update, because I thought it was harder than that.

Anyway, with the dynamic approach, we would basically have a refreshPage method, that would recreate the "right" positions every time.


Writing down those things, I'm just realizing that I kind of prefer the static approach still, because it doesn't even require the first page configuration query.

Anyway, those are two options I thought of about markup implementation. The future me will know what to do...






Transforming any widget into a website builder friendly widget
---------------

Now another idea that I found very important, and actually even more important than the previous question: was the possibility
to turn any widget into a website builder widget.

If we can achieve this, this would be great, because it would mean that we don't need to create specifically tailored widgets for our website builder,
but rather that we could re-use any widgets in our widget library, and turn them into a website builder widget.

So, that's kind of the golden goal for me to achieve.

The stakes are raised.

And so I thought about that too.

Although sharing one's secret is bad for business, I decided that I don't care anymore about that, to me, now it's more about the best ideas and implementation
than winning the market.

So my secret idea is the following (quite simple actually):

In kit, we have this js-init and css directory, which basically decorate a given template by adding js code blocks or css code blocks.

Well, we could add a website-builder directory, which would decorate the template with website builder rules/directives to implement
to turn the widget in a website builder friendly widget.


### But what are those rules?

First, let's take a few examples of what a website builder widget (wbw) will be able to achieve:

- change the text (usually by just clicking on the text, then changing it, directly in the html)
- change another property
    - change an onmouseover property:
        - change the background color, and the background color updates in real time
    - change a non onmouseover property 
        - change the background image
        - change the alignment of a paragraph
    

So apart from the text property (let's call that live text edit), all other things that a wbw allows us to do is
done via buttons in the gui panel.

So when the live text edit mode is on, we need to change the text (i.e. meaning we need to target the text somehow),
and for other properties that we can change, we generally need to target a tag and attribute (for instance the img src attribute for an image,
or adding a css class for alignment).

So my secret idea would be to write those targeting rules in the website-builder directory.
Let's create an extension: the wbr (standing for website builder rules). 
So for instance for the default template, we would have this file:


```txt
- widget/
----- template/
--------- default.php
----- website-builder/
--------- default.wbr
```

And the **default.wbr** file would contain something like this (it's just an idea yet, I didn't think of the exact form yet):


(Imagine that we use jquery selectors, and the context/parent is the widget's outer tag)

```yaml

- 
    $feature_type: $rule (array depending on the feature type)
-
    live_edit_text:
        target: p.nth-child(2)
        value: $the_widget_varname_to_update
-
    live_edit_text: 
        target: p.nth-child(6)
        value: $the_widget_varname2_to_update (just showing that we can apply the same feature multiple times)
-
    img_change:
        target: img (in this example, there is just one img tag in the html markup of that widget, for instance)
                    # assuming that because it's an img_change feature, the wb will know to look for the src tag: we don't need to specify it manually
        value: $the_widget_varname3_to_update
```
    
    
    
    
That's it, that's all I've got for today.







 




 

      
    
    
    
 












