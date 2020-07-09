[Back to the Ling/HtmlPageTools api](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools.md)<br>
[Back to the Ling\HtmlPageTools\Copilot\HtmlPageCopilot class](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md)


HtmlPageCopilot::registerLibrary
================



HtmlPageCopilot::registerLibrary — Registers an asset library.




Description
================


public [HtmlPageCopilot::registerLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/registerLibrary.md)(string $name, ?array $js = [], ?array $css = [], ?array $options = []) : void




Registers an asset library.
The library will be added only if it's not already registered.

Please for the names of your library, use the camelNotation, examples:

- jquery
- jqueryUi
- bootstrap
- myLibrary

If you're using a library that comes from a universe planet, then use the planet name directly:

- Chloroform_HeliumRenderer
- JSortTable
- ...



Available options:
- override: bool=false.
     If true, the library will be overwritten in case of conflicts.


Tip with override
--------
If your template has a jquery link hardcoded in it, you can use override like this in your template,
so that all modules that use jquery use the version that's hardcoded in your template:

```php
$copilot->registerLibrary("Jquery", [], [], [
'    override' => true,
]);
```




Parameters
================


- name

    

- js

    

- css

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [HtmlPageCopilot::registerLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/Copilot/HtmlPageCopilot.php#L263-L269)


See Also
================

The [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) class.

Previous method: [hasLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasLibrary.md)<br>Next method: [getCssUrls](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssUrls.md)<br>

