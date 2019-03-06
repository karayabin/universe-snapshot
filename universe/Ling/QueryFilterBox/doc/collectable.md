Collectable
===============
2017-10-04




The parameters that control the list appearance (search, sort, pagination) are passed via the uri.
However, they are passed as identifiers, not labels.


Some merchants might find useful to display (perhaps on a sidebar) a summary of the parameters currently used,
so that the customer has an overview of the criterion actually controlling her list.

This summary might even be interactive as well.

In order to do such a widget, we need to convert the params identifiers to params label (i.e. human friendly),
because the user will read them.


The collectable interface indicates that an object is willing to convert the params it handles to this human 
friendly version.

In other words, if we wanted to created such a widget, we could name it SummaryOfFilters (for instance),
and using hooks (or other means), we could attach all relevant Collectable objects to it.

Then, we just need to run a loop with each collectable, passing the used parameters, and we would obtain
all those friendly labels that the widget could use.

