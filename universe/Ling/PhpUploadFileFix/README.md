PhpUploadFileFix
==================
2019-01-20 -> 2021-03-05


This planet flattens the $_FILES array.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.PhpUploadFileFix
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PhpUploadFileFix
```

Or just download it and place it where you want otherwise.



What is it about?
=================

When you post an html form containing a file, like this one for instance:

```html
<form enctype="multipart/form-data" action="" method="post">
    <label>
        File: <input type="file" name="the_file" value=""/>
    </label>
    <input type="submit" value="Submit">
</form>
```

You end up with the php $_FILES super array being populated like this:

```txt
array(1) {
  ["the_file"] => array(5) {
    ["name"] => string(8) "ekom.pdf"
    ["type"] => string(15) "application/pdf"
    ["tmp_name"] => string(36) "/Applications/MAMP/tmp/php/phpcyQno3"
    ["error"] => int(0)
    ["size"] => int(48869)
  }
}
```

So far, everything is fine.
However, if you go deeper, things start to get nasty.
For instance, if instead of ```the_file```, you name your input  ```the_file[jar]``` (a basic array notation),
then your $_FILES looks like this:

```txt
array(1) {
  ["the_file"] => array(5) {
    ["name"] => array(1) {
      ["jar"] => string(8) "ekom.pdf"
    }
    ["type"] => array(1) {
      ["jar"] => string(15) "application/pdf"
    }
    ["tmp_name"] => array(1) {
      ["jar"] => string(36) "/Applications/MAMP/tmp/php/phpQLotm9"
    }
    ["error"] => array(1) {
      ["jar"] => int(0)
    }
    ["size"] => array(1) {
      ["jar"] => int(48869)
    }
  }
}
```

Weird isn't it?
For the record, if you name your input ```the_file[]``` , which is equivalent to ```the_file[0]``` as far as I know,
your $_FILES will look like this:

```txt
array(1) {
  ["the_file"] => array(5) {
    ["name"] => array(1) {
      [0] => string(8) "ekom.pdf"
    }
    ["type"] => array(1) {
      [0] => string(15) "application/pdf"
    }
    ["tmp_name"] => array(1) {
      [0] => string(36) "/Applications/MAMP/tmp/php/php38yCXN"
    }
    ["error"] => array(1) {
      [0] => int(0)
    }
    ["size"] => array(1) {
      [0] => int(48869)
    }
  }
}
```

Which is consistent with the previous example (but still nasty).
And what if you go one level deeper?

Here is what we get with a name of ```the_file[jar][mac]``` :


```txt
array(1) {
  ["the_file"] => array(5) {
    ["name"] => array(1) {
      ["jar"] => array(1) {
        ["mac"] => string(8) "ekom.pdf"
      }
    }
    ["type"] => array(1) {
      ["jar"] => array(1) {
        ["mac"] => string(15) "application/pdf"
      }
    }
    ["tmp_name"] => array(1) {
      ["jar"] => array(1) {
        ["mac"] => string(36) "/Applications/MAMP/tmp/php/php5B6BiS"
      }
    }
    ["error"] => array(1) {
      ["jar"] => array(1) {
        ["mac"] => int(0)
      }
    }
    ["size"] => array(1) {
      ["jar"] => array(1) {
        ["mac"] => int(48869)
      }
    }
  }
}
```


By now you get the idea, this is hard to use.

So what this planet propose is to linearize the $_FILES entries, so that they all look like in the first example.
So for instance a name of ```the_file[jar][mac]``` would look like this:



```txt
array(1) {
  ["the_file[jar][mac]"] => array(5) {
    ["name"] => string(8) "ekom.pdf"
    ["type"] => string(15) "application/pdf"
    ["tmp_name"] => string(36) "/Applications/MAMP/tmp/php/phpcyQno3"
    ["error"] => int(0)
    ["size"] => int(48869)
  }
}
```

Much cleaner isn't it?
Optionally, you can also return the dot variation, which would look like this:

```txt
array(1) {
  ["the_file.jar.mac"] => array(5) {
    ["name"] => string(8) "ekom.pdf"
    ["type"] => string(15) "application/pdf"
    ["tmp_name"] => string(36) "/Applications/MAMP/tmp/php/phpcyQno3"
    ["error"] => int(0)
    ["size"] => int(48869)
  }
}
```

That might be useful in some cases.
Note that if your original name already contains a dot, php will automatically convert it to underscores.
So for instance if your name is **casi.mir**, it will become **casi_mir** in the $_FILES array
(see http://php.net/manual/en/language.variables.external.php for more details).



What about implicit indexing?

With the name ```the_file[]```, we would have the following array:

```txt
array(1) {
  ["the_file[0]"] => array(5) {
    ["name"] => string(8) "ekom.pdf"
    ["type"] => string(15) "application/pdf"
    ["tmp_name"] => string(36) "/Applications/MAMP/tmp/php/phpcyQno3"
    ["error"] => int(0)
    ["size"] => int(48869)
  }
}
```



And easier to work with too, or so I believe.

Alright, that's all you need to know.
Enjoy!



How to use
==========

```php
$fixedFiles = PhpUploadFileFixTool::fixPhpFiles($_FILES);
```




History Log
------------------

- 1.0.5 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.3 -- 2021-02-11

    - fix PhpUploadFileFixTool::fixPhpFile to not trigger deprecation notice in php8
  
- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2019-01-20

    - initial commit

