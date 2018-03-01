Morphic generator brainstorm 4
===========================
2018-02-21



This is a supposedly improved version of the brainstorm 3.

This is a recreate from scratch, with clearer concepts in mind.





Our goal is to generate form/lists for a given database, thus generating a primary but functional gui admin (aka backoffice).

We will use the morphic system, and we will be driven by the ekom module (our client is...).

My focus in this brainstorm is on generating:


- controller
- list config file
- form config file


The main difference with the previous version is that now we only consider one type of relationship: 
the parent-children relationship.


They are all treated the same way.




Form
---------
- each foreign key in the uri freezes the corresponding control's value
            Note: also inferred values (aka implicit values) do the same effect
- on the parent side, each referenced keys create a link to the child table list (with the corresponding fk set in the uri)
            Note: if the form is in insert mode, those pivot links are there (so that the user is aware of the capabilities) 
            but disabled


List
--------
- each fk in the uri affects the query


Controller
-------------
- on the child page, a given parent fk will create a link: back to the parent page
- the child controller expects the parent's referenced ric to be set in the uri,
        and will complain if they are not there.
        This is part of this specific brainstorm4 design.




Implicit values
-------------------
Your app might have some implicit values.
For instance in ekom we have the ekom context values which are always set (shop_id, lang_id, currency_id).
The implicit values are not passed in the uri; they are ignored by the default generator.
Use subclassing to hook implicit values in the generation process.