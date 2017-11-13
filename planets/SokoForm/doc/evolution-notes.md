Evolution notes
============
2017-10-29

 
Notes to myself.



SokoFileControl
-------------------
could also handle ajax based solution.
Maybe adding an identifier?


```php
    ->addControl(SokoFileControl::create()
        ->setLabel("Your diploma (pdf)")
        ->setName("diploma")
        ->setIdentifier("form1-diploma")
        ->setAccept(".pdf") // same as html accept attribute
    )
```