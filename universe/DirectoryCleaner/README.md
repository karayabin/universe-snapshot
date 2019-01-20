DirectoryCleaner
======================
2017-03-31



A tool to remove undesirable entries from a directory.


DirectoryCleaner is part of the [universe framework](https://github.com/karayabin/universe-snapshot).





Install 
===========
Download the repository directly, or use the [uni](https://github.com/lingtalfi/universe-naive-importer) command:

```bash
cd /my/app
uni import DirectoryCleaner
```








Usage
============

To clean a directory, do the following:

```php
$d = "/path/to/dir_to_clean";
$recursive = false;
DirectoryCleaner::create()->clean($d, $recursive);
```






History Log
------------------
    
- 1.0.0 -- 2017-03-31

    - initial commit
    

