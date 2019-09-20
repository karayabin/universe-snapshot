Light Database Info, conception notes
===================
2019-09-12


I've done this already with the [SaveOrmGenerator](https://github.com/lingtalfi/SaveOrm/blob/master/Generator/SaveOrmGenerator.php), 
but it's only used in the very narrow context of the SaveOrm tool. 

This is about accessing database information quickly.

Some information, such as the indexes or the foreign keys, or reverse foreign keys, take some time, and so 
caching them, especially when used in the context of a generator (which calls a lot of tables), can saves us tons of time.


Now I use a light plugin to benefit the clean babyYaml file configuration (no other reasons, really).
Also, as a light service, this tool will be re-usable by any other tool in the future that needs that kind of information.

I will add methods as I need them.






