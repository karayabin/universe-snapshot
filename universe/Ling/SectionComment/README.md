SectionComment
===========
2021-03-19 -> 2021-05-27



A utility class to work with [section comments](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.SectionComment
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SectionComment
```

Or just download it and place it where you want otherwise.






Summary
===========
- [SectionComment api](https://github.com/lingtalfi/SectionComment/blob/master/doc/api/Ling/SectionComment.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))






History Log
=============

- 1.0.3 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.2 -- 2021-05-27

    - add BabyYamlSectionCommentUtil->removeSection method
  
- 1.0.1 -- 2021-03-22

    - fix BabyYamlSectionCommentUtil->init not creating the dest file if it doesn't exist
  
- 1.0.0 -- 2021-03-19

    - initial commit