Light_UserRowRestriction, conception notes
==========
2020-02-28 -> 2020-03-05


This is a simple implementation of a defense mechanism to the [database-identity-usurpation](https://github.com/lingtalfi/TheBar/blob/master/discussions/database-identity-usurpation.md) problem.

Our service basically implements the guidelines suggested in the ["A possible defense mechanism in light" section](https://github.com/lingtalfi/TheBar/blob/master/discussions/database-identity-usurpation.md#a-possible-defense-mechanism-in-light).


We introduce a new concept though, the concept of row restriction.

Basically, the plugins author can add the restrictions they want.

A restriction restricts a certain operation to be applied on a given row of a given table.

We use the four "crud" operations (create, read, update, delete), the replace method will use the update operation.


The restriction can be thought as a function that returns a boolean to the question: is the current user allowed to do the
given operation on the given table (and the given parameters).

The answer to this question is subjective and defined by the (subscribers of our service) plugins. 
  
  
This "restriction" system allows us to encapsulate the problems into the aforementioned function, problems such as:

- is the current user some kind of admin? In which case he/she might be considered an owner too
- is the read operation allowed for this particular table (which might/might not contain confidential info), or the delete operation, etc...




The service mode
------------
2020-03-05


By default, the service is now inactive (for now), because I believe there are more actions that don't require
row restriction checking than actions that do require it.

Most of the time, only impersonal scripts generated for auto-admin need this,
and plugins often do their checking themselves, so it feels to me that user row restriction
is more a fallback solution than a checking that should be permanent.

And therefore, having it inactive by default saves a few cpu performance.

When your script needs user row restriction checking, you need to activate this mode.
There are two suggested active modes, which plugin could implement:

- strict (aka admin mode)
- permissive (aka user mode)

The strict mode is for gui tools like auto-admin, where basically the admin can do anything,
and the regular user can't do anything.

The permissive mode is like the strict mode, except that the user now is granted to operate
on rows he/she owns, and the plugins can add extra restrictions if it wants to.
At least that's the basic idea that we suggest plugin implement.

Note: those are just suggestions, please refer to the plugins documentation to know exactly
what they are doing with those modes.


Note2: it's also normal if some other plugins bypass the rules of those two modes:
I believe that granting permissions depends from the context, and so some plugin author (the author
of the same plugin or another plugin) might want to provide the user with some affordances that overrule
the row restrictions defined with the plugin's two modes.
