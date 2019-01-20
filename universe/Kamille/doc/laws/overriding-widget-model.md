Overriding widget model
============================
2017-05-03






Widgets use models.

A model has a fixed representation.

But sometimes, it might be useful to extend the model.


For instance, imagine a widget that displays a gauge.

Fine.

But now, I want to re-use that gauge model, but I want to insert it in a panel, add a title, and a close button.
So basically, I just need to add two properties (title, showCloseButton) to the existing gauge model.

The question that arise is:

- Should I recreate a BRAND NEW model for that, or can I EXTEND the existing model?


In kamille, we gives ourselves the right to extend a model.

This extended model will be used only in the context of the renderer this extended model version was created for.

As long as the extended version of the model doesn't cross those context boundaries, we are free to do whatever we want,
because by definitions it will have no repercussions on the global design (at least that's what we believe).



