Laws Widget Instance Decorator
===============
2017-06-06




In kamille, widgets were created as dumb things: things with a small brain focused only on displaying variables,
not choosing them.

The Controller is responsible for displaying the whole page: it's the grandmaster that coordinates
all widgets.


In that context, what if an exception occurs?

If it's at the Widget level, the widget shall silently fail (to not bother the user with bogus messages),
maybe showing a generic standard human error text to indicate that something went wrong,
and log the error (so that the dev can investigate the problem in the background).

If it's at the Controller level, we have no choice other than displaying either the error, a blank page,
or a fallback page (like home for instance), while logging the data in the background too.
 
 
The problem with the current design is that, using Laws as the main system for handling widgets, 
the process of creating the widget conf can throw an exception, and when it does, the process
is not in the widget, but in the Laws code space, which basically means that the exception
is caught at the Controller level.

This is not what we want: a widget configuration logically belongs to a widget,
and so if an error occurs while we are creating the configuration of the widget,
we want the widget only to fail, not the whole controller.

However, for some reasons, we are not going to let every individual widget parse its own conf,
because we like the power of centralized widget conf handling provided by laws, so we have to 
find a workaround.


At an individual level, this work around can be find in the form of a hybrid model:
basically, a model with two faces:

- erroneous 
- regular

So, we catch any exception that occurs (during the creation of the widget conf or the displaying of the widget);
and turn it into the erroneous model, which the template knows how to interpret.
If there is no exception, then the template interprets the regular model.

That works, but there is an if condition block imposed to the template.
The template author must do an if block if we choose this solution.

Even though it doesn't sound too much of a trouble saying it like that,
at the framework level we can do better and abstract this problem, at the cost of a unnoticeable
performance loss.

What's that solution?

Let me introduce the LawsWidgetInstanceDecorator.


LawsWidgetInstanceDecorator
-----------------------
The LawsWidgetInstanceDecorator (let's call it decorator for brevity) is an object that
can decorate a widget.
So for instance we can use the decorator to change the template used by a widget.

In the parameters used by the decorate method, there is the configuration array of the widget.


So, this new element leads us to the pattern implemented in laws:

Basically, LawsUtil let you set the LawsWidgetInstanceDecorator.
The idea is that if the model (the widget configuration) is of a certain type (an erroneous
model that we need to define), then it triggers an application level widget error template,
otherwise, it doesn't affect the widget.

In kamille, most of the work is done by modules, and so each module could create its own 
convention about what an erroneous model is.

This flexibility might come handy in some situations, but for the most part it would be arguably 
more efficient to just have one standard error model.

Let me propose the error model (see in models directory).

So, that's it!
You can use this model as the base error model in your applications.


If you implement this solution, then if you have an error while creating the widget config, 
just send back this erroneous model and your widget will automatically use some common error template
defined at your application modules level.