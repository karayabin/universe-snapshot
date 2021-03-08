NaturallySimpleXmlElement
===========
2018-06-17 -> 2021-03-05



A subclass of php's SimpleXMLElement class.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.NaturallySimpleXmlElement
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/NaturallySimpleXmlElement
```

Or just download it and place it where you want otherwise.



How to use?
==========================

NaturallySimpleXmlElement just adds the following methods to the SimpleXMLElement class:


- addChildCData ( string childName,  string cDataText )
    - childName: The name of the child element to add
    - cDataText: The CDATA value of the child element
    This method returns a NaturallySimpleXmlElement instance






History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2018-06-17

    - initial commit




