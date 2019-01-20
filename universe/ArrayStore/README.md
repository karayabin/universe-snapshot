ArrayStore
===============
2016-12-05



Store/retrieve an array to/from a file.


ArrayStore is part of the [universe](https://github.com/karayabin/universe-snapshot) framework.


Intent
----------

Apart from databases, you can store/retrieve data from a file using serialization/deserialization.

One problem with serialization/deserialization is that the stored data is ugly: it is not meant to be edited manually
by a user.

Another problem is that you cannot store a closure.

Those two problems are fixed by this class, which uses a human readable format (a simple php array) to store
your data.

Also, it handles closures (aka anonymous functions).




How does it work?
--------------------

The ArrayStore object has two methods:

- store (array store), which stores an array to the storePath, and returns a boolean (whether or not the data could be stored)
- retrieve, which returns an array


The setup phase consist of setting the store path.
Then, you can are good to go.






Dependencies
---------------

- [ArrayExport 1.0.0](https://github.com/lingtalfi/ArrayExport)
- [Bat 1.33](https://github.com/lingtalfi/Bat)



History Log
------------------
    
   
- 1.1.0 -- 2016-12-05

    - forgot store method returns a boolean 
    
- 1.0.1 -- 2016-12-05

    - fix constant store name 
    
- 1.0.0 -- 2016-12-05

    - initial commit
    
    
    



