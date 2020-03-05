SimplePdoWrapper, Conception notes
==============
2019-02-04 -> 2020-03-03







The has table information
---------------
2020-02-12


I found that **has** tables have valuable information to give us.

For instance, let's imagine this schema structure:

- resource
    - id: aik
    - path: str
- resource_has_tag
    - resource_id: fk
    - tag_id: fk
- tag
    - id: aik
    - name: str
    
    
A useful method to generate would be **getTagsByResourceId**.
Another would be **getTagNamesByResourceId**.

Before I go further, let me introduce some nomenclature that I'll use later.
The term **handle**.
In the case of the **getTagsByResourceId** method, there is one handle: the **id** column.
In the case of the **getTagNamesByResourceId** method, there are two handles: the **name** column from the left table, and the **id** column from the right table.

So, an handle is a column, or a set of columns that we use or that we get when using a certain method.
A handle can be either a unique index (which is an array of column names), or a single column guessed from the common sense (for instance the word "name" is a good candidate
for a handle).

Ok let's continue now.




In order to generate that method, a generator needs to understand the **has** relationship between the **resource** and the **tag** tables.

It's worth noticing that the relationship has a direction.
In particular, we can differentiate between the **owner** and the **owned** table, or the **left** and the **right** table (in this case the **resource** and the **tag** table respectively).

And so, detecting the **has** tables is important.



So somewhere in this plugin, there is a method that collects information about a table, and I will add a **getHasItems** method to id.
The **getHasItems** method will return an array of **has** items, each of which having the following structure:


- has: array. The information pertaining to the **has** table owned by or owning this table.
    Or false if the table isn't related to a **has** table at all.
    
    If the table owns a **has** table, the array has the following structure:
    
    - is_owner: bool, whether the current table owns the **has** table or is owned by it.
    - has_table: string, the name of the **has** table
    - left_table: string, the name of the owner table
    - right_table: string, the name of the owned table
    - left_fk: string, the name of the foreign key column of the **has** table pointing to the left table
    - right_fk: string, the name of the foreign key column of the **has** table pointing to the right table
    - referenced_by_left: string, the name of the column of the **left** table referencing the **has** table's foreign key
    - referenced_by_right: string, the name of the column of the **right** table referencing the **has** table's foreign key
    - left_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **left** table.
        This method will list the following handles:
        - the column of the **left** table referencing the **has** table's foreign key (same value as the **referenced_by_left** property)
        - the unique indexes of the **left** table
                
    - right_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **right** table.
        This method will list the following handles:
        - the column of the **right** table referencing the **has** table's foreign key (same value as the **referenced_by_right** property).  
        - a "natural" column that has a common name for a handle, based on a list which the developer can provide, and which defaults to:
            - name
            - label
            - identifier
        
        - the unique indexes of the **right** table that have only one column (i.e not the unique indexes with multiple columns).
            If the unique index column contains only the aforementioned "natural" column, this particular index is discarded (as to avoid redundancy).               
                
            
                    
    
    
    
Now to detect if a table is a **has** table, we basically use this system where it needs to fulfill all the following conditions:

- the table has at least two foreign keys    
- the table name contains a **hasKeyword**, which is a keyword from a list that the developer can customize, which defaults to:
    - has    
    
    Each **hasKeyword** must be surrounded by underscores.
    
        
Another difficulty bound to that method is how to detect that a table OWNS/IS OWNED BY a **has** table.
In order to do that, we will use the reversedForeignKeys information, that this plugin also provides somewhere.


         



The system call flag
--------------
2020-03-03


As this tool evolved, in turns out it has been a central piece (as far as database) in the [Light framework](https://github.com/lingtalfi/Light).
The light framework involves interaction between multiple plugins, and it seems like the "light community" has decided to hook into the following methods:

- insert
- replace
- update
- delete
- fetch
- fetchAll

This happens inside of the [Light_Database](https://github.com/lingtalfi/Light_Database) plugin, which basically is the light version of this tool.

By hooking with those methods, the plugins of the light ecosystem take decision, mainly permission based decisions.

As to help light developers with knowing whence the call to the aforementioned methods come from, we provide a system call flag, which we 
raise before we call our own methods in classes such as [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) for instance.


This flag might be turned back down on a method-basis by the light tools, shall they want to use this information.

In other words, we provide the systemCall flag as an extra bit of information, but if you want to use it, you need to turn it down after every call to the
aforementioned methods.

This flag is located in the [SimplePdoWrapper class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md),
as the public static isSystemCall property. 













