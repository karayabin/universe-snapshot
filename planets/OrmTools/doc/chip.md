Chip
===========
2017-08-30


What is chip?

Chip is an experimental code that helps interacting with a database model.

Sometimes, it happens that what you can describe as ONE action with human words actually
interacts with more than one table in your model.

The idea of chip is to do the dirty work of translating your human intent in code instructions.

- create this
- create that...


General philosophy
==================

There are really two objects in the chip approach:

- chip: a configuration object: it contains only properties, you will have to manually configure it...
- chipProcessor: this guy will do the dirty work.


The ChipProcessor approach is a transactional approach: either all succeeds, or all fails.
So, inside ChipProcessor, throwing exception all over the place is the norm.
    
    