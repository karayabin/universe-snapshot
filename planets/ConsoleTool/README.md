ConsoleTool
==================
2017-03-22



A tool to help creating console programs.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).






How to install?
-------------------

Using the [universe naive importer](https://github.com/lingtalfi/universe-naive-importer):

```bash
cd /path/to/myapp
uni import ConsoleTool
```



How to use?
-------------------
```php
<?php

use ConsoleTool\ConsoleTool;



require "bigbang.php"; // or any autoloader you want


echo "What's your name? ";
$name = ConsoleTool::capture(); // typing ling
echo "hi $name" . PHP_EOL;


echo "Are you old (y/n)? ";
if (true === ConsoleTool::booleanCapture(false)) {
    echo "too sad" . PHP_EOL;
} else {
    echo "how lucky" . PHP_EOL;
}

```
 




History Log
------------------
    
- 1.0.0 -- 2017-03-22

    - initial commit
