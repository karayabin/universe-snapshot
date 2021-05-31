InvoiceGenerator
===========
2021-05-07



A tool to generate invoices.

This is based on [wkhtmltopdf](https://wkhtmltopdf.org/), which must be installed on your machine before you can use this planet.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.InvoiceGenerator
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/InvoiceGenerator
```

Or just download it and place it where you want otherwise.






Summary
===========
- [InvoiceGenerator api](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/api/Ling/InvoiceGenerator.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Basic store classic](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/pages/basic_store-classic.md)
    - [Conception notes](https://github.com/lingtalfi/InvoiceGenerator/blob/master/doc/pages/conception-notes.md)






History Log
=============

- 1.0.2 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.1 -- 2021-05-07

    - fix basicStore/classic template not displaying client company in bold
  
- 1.0.0 -- 2021-05-07

    - initial commit