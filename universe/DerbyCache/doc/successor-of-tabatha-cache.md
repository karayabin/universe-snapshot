Derby Cache, successor of Tabatha Cache
=============================================
2017-11-17



Tabatha cache is no longer the sexiest cache: DerbyCache, the new kid on the block
takes it all.




It started today, when I realized that my application wouldn't make it without cache.
Cache is SOOOOOO important.

My system, an e-commerce module called Ekom, was all covered with the TabathaCache code, 
and I was wondering: 

- How can I delete all the caches related to products only?


With tabatha, you assign delete identifiers to every cache you create, and so if any of those identifiers
is called, the cache is cleaned.
While this is very organic and perhaps suitable for live/dynamic things, I knew that I couldn't answer my
simple question within 5 minutes, which forced me to admit that the system wasn't intuitive enough.


This made me realize that there are two types of cache (according to me):

- organic cache: you don't do nothing, it lives by itself
- persistent cache: it's there forever until you clean it (cron is your friend, and/or you can have bash command
            for your own debug sessions)
            

Actually, this is just a role distinction.
Any cache system can be used as an organic one and/or a persistent one.
            
            
And I figured that what I needed today was the persistent cache type.
I don't like doing persistent cache with tabatha, because of two things:

- the way I used it (I used table identifiers as delete identifiers, which now I consider a mediocreidea)
- tabatha cache REQUIRES the cache identifiers, that's a lot of attention that can be automated


So, therefore I'm going to create Derby cache, which is my persistent cache tool.

The name comes from a contraction of daily and rebuild (daiRebui=derby).
Rebuild being the name of the command I plan to implement in bash, so that I can simply type rebuild-product,
or rebuild-category to get the corresponding cache cleaned.            
            
            
The thing is, I figured, this type of cache is much simpler than Tabatha cache, since we don't need to assign
delete identifiers.

Instead, we need to rely on a rock solid name convention for cache identifiers.

Here is how I plan to name my cache identifiers, and this naming convention becomes the de-facto recommendation:

- cache identifier: <component> (</> <component> )* (<--> <garbageString>)?            
- component: if your application uses modules, the first component should be the name of the module.
                    A component cannot contain the slash character.
                    Basically, the cache identifier is some sort of relative path.
- garbage string: a string that identifies (uniquely) the cached item
                    (could be a simple identifier, or a hash string of an array, or whatever string you want)             



So now I can imagine myself making this kind of code:

```php
$myObject = DerbyCache::get("Ekom/product--a5n30egFihurze", function(){
    // returns the object to cache/use
});


$myObject2 = DerbyCache::get("Ekom/product--50zeeglky80rMe", function(){
    // returns the object to cache/use
});
```

Admittedly this is even sexier than Tabatha's one liner, because now we only deal with the cache identifier, 
not the delete tags (big win). 


See how those two objects are cached permanently in the filesystem (or at least imagine)?
Now, the beauty of this implementation relies in this simple trick: by putting the garbage string at the end
of the cache identifier (I missed that trick when creating Tabatha cache), we can now delete all cached product items
at once with a code that like this, simple and intuitive:


```php
MyHelper::cleanItems("Ekom/product")
```

Now we can imagine building the rebuild command.
We need to basically parse all products (or any item type), that's it.


So, to recap, this kind of persistent cache is more adapted to humans, and that's the reason why I'm striving
for it tonight (is this going to be a long night? probably...).
Simplicity is both the goal and the reward.







 







