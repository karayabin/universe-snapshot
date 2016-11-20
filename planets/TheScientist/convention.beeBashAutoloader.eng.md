Bee Bash Autoloader
=========================
2015-10-20



A few days ago, I shared with you the 
[portable autoloader technique](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md),
which is interesting.


I now have switched to another technique which might be even more interesting, depending on your needs.

While the portable autoloader technique is the fastest (once the setup is done), 
this one does not require any particular setup at all.



The technique
-----------------

This technique is still based on the [ButineurAutoloader](https://github.com/lingtalfi/BumbleBee/tree/master/Autoload).
It consists of creating the following structure in your application directory:

    - _bb_autoload/
    ----- autoload.php
    ----- BeeAutoloader.php
    ----- ButineurAutoloader.php
    - modules/
 

And the autoload.php has the following content in it:

```php
use BumbleBee\Autoload\ButineurAutoloader;

require_once __DIR__ . '/BeeAutoloader.php';
require_once __DIR__ . '/ButineurAutoloader.php';

ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/../modules") 
    ->start();
```

The script can be found [autoload.php](https://github.com/lingtalfi/TheScientist/blob/master/_bb_autoload/autoload.php).


The other scripts are 
[BeeAutoloader.php](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/BeeAutoloader.php)
and 
[ButineurAutoloader.php](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/ButineurAutoloader.php) 
which are well known public scripts. 


Once you have this structure ready, you simply need to include the _bb_autoload/autoload.php script 
from your application init file, and then you can put any 
[BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md)
class in the modules directory,
and they will be immediately available in your php working space. 



The bash script 
-------------------

The good news is that this structure can be created automatically using a simple bash script.
Here is the [bee bash script](https://github.com/lingtalfi/TheScientist/blob/master/_bb_autoload/bbstart.sh),
which creates the structure for you. 


I personally like to type the following command: bb to get started, so here are the steps to do so in bash:
 
 
```bash

# cd to the directory where you want to put the bee bash script, 
# it should be in your $PATH.
# If you haven't done so yet, I recommend you add ~/bin to your path, 
# because then your changes are enclosed to your user (so you don't accidentally affect other users)

cd ~/bin

# download the bee bash <script>
wget https://raw.githubusercontent.com/lingtalfi/TheScientist/master/_bb_autoload/bbstart.sh
    
# create the bb command 
ln -s bbstart.sh bb     
    
# now if you like a customized output, create an alias
# (in your .bashrc or any other file sourced when your terminal starts)    
alias bb='bb -v -v'    
    

``` 


