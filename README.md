Universe snapshot
=====================
2016-01-02 -- 2016-11-20



Personal collection of multi-purpose php classes.




Features
---------------

- one liner setup 
- unified naming convention based on psr-0 for all the classes
- easily extendable/organizable



Metaphor
-------------

The sum of all universes is called multi-verse.
A developer creates her own universe(s).
Each universe consists of a collection of classes called planets.




Guide for the new developer
-------------------

Here are the few guidelines I can think of:

- Every planet should be named using the [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) naming convention




Installation
-----------------

First, install the universe.

You can either install it once per machine, or install it on a per application basis.

```bash
cd /path/to/where/you/want/to/install
git clone https://github.com/karayabin/universe-snapshot.git
```

These commands will create a universe-snapshots directory with the following structure:


- universe-snapshots/
    - bigbang.php
    - planets/




Bigbang: the universe's one liner setup
------------------------------------------

To start using the universe in your php application, you need to call the bigbang.php script.

```php
require_once "bigbang.php";
```

This line will basically lazily register all the classes in the planets directory.

You will generally put this line once in your application init script.

Now to use a class in your project, just call it:


```php
// Note: most IDE will generate this line for you as you type the other line below...
use My\Awesome\MegaClass;

// ...therefore in most cases you just need to type this line (and this IDE mechanism is a huge time saver by the way)
$translator = new MegaClass();
```



### adding your own classes

When creating a php application, using my universe collection can be helpful,
but at some point you always need to create your own classes.


The good news is that the universe is easily expandable.

Start by creating a class directory in your project and put all your classes in there (using the BSR-0 naming convention).

```bash
cd /my/app
mkdir class
```

Then, you need to revisit the bigbang one liner setup, and turn it into this:

```php
$__butineurStart = false; 
require_once "bigbang.php";  
ButineurAutoloader::getInst()
->addLocation(__DIR__ . "/class")
// ->addLocation(__DIR__ . "/another_class_dir") // you could add other directories if needed...
->start();
```

We use the **$__butineurStart** variable to tell the bigbang.php script that we will start the universe manually.

Then we add our own dependencies (the **class** directory), and call the start method when ready.



### Bigbang bonus: a and az debug functions

If you look inside the bigbang.php script, you will see that there are two functions definitions at the end: a and az.



**a** is basically an alias for var_dump, since it's probably the function I use the most in php.

**az** does the same, plus it exits the current script.

I can't emphasize enough how much time those two aliases cut the debug time.


Anyway, if you don't use them, you can throw them away, no big deal.







Final words
------------------

Well, that's the end of the party.
See you next time (this paragraph is ridiculously useless and should have been deleted). 














