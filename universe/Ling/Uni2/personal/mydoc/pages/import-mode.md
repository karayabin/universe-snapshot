The import mode
===================
2019-03-12


The import mode can be one of the following:

- reimport: will import the planet if either:
     - it does not exist in the application yet
     - there is a newer version defined in the local dependency master file
     - the force flag is set to true

- import: will import the planet if either:
     - it does not exist in the application yet
     - the force flag is set to true

- store: same as reimport, but imports to the local server rather than to the current application.

Whichever algorithm is chosen, it will apply recursively to dependencies
as well.

For non-planet items, the algorithm is different: it is imported if:
     - it does not exist in the application yet
The force flag doesn't have an effect on non-planet items.