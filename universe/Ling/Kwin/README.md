Kwin
===========
2021-02-18 -> 2021-05-31



Some tools to work with the [kwin](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md) syntax.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Kwin
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Kwin
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Kwin api](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))






History Log
=============

- 1.0.7 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.6 -- 2021-05-31

    - update KwinParser, add more verbose debug messages. Fix KiwnParser triggering error when more than one kwin definition is parsed.
  
- 1.0.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.4 -- 2021-02-19

    - update api, adapt for aliases feature of kwin
  
- 1.0.3 -- 2021-02-18

    - fix MiniMarkdownToBashtmlTranslator::convertArrayRecursive converting non string values to strings
  
- 1.0.2 -- 2021-02-18

    - update api to reflect new kwin notation (with multiple of four indentation)
  
- 1.0.1 -- 2021-02-18

    - update MiniMarkdownToBashtmlTranslator::convertArray, add options argument
  
- 1.0.0 -- 2021-02-18

    - initial commit