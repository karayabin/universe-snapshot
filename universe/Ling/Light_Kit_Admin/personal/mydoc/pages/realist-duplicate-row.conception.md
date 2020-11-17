Realist Duplicate row, conception notes
=========
2020-11-13 -> 2020-11-17



My intent in this document is to define a duplication system, so that the lka user can duplicate rows.

The first part of this document has been moved to the [duplicate rows util](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/pages/duplicate-row.conception.md).







So by default in lka, a **duplicate row action** will duplicate the row in the database.

We have two flavours of duplication:

- **duplicate entity**, which performs a deep duplication
- **duplicate row**, which executes a simple duplication


The user chooses which flavour to execute by clicking the appropriate button(s) in the gui.




Duplicators
---------
2020-11-13 -> 2020-11-17


The developer might want to override the default **lka duplicate row action** behaviour entirely, or partially.

In order to do so, we provide a new type of objects, called **Duplicators**.


A **Duplicator** is a class which can implement one of the two interfaces:
 
- duplicator (LkaRowDuplicatorInterface)
- hooks (LkaRowDuplicatorHooksInterface)


If you implement the duplicator, it's assumed that you override entirely our default duplicator.

If you implement the hooks, then our default duplicate row behaviour will apply, and you can hook after a row is being inserted in the database.


