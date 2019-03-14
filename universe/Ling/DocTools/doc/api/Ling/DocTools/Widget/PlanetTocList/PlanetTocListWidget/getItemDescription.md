[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Widget\PlanetTocList\PlanetTocListWidget class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget.md)


PlanetTocListWidget::getItemDescription
================



PlanetTocListWidget::getItemDescription — Returns the item description, according to the given $mode.




Description
================


protected [PlanetTocListWidget::getItemDescription](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/getItemDescription.md)([Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) $comment, string $mode, callable $formatterCallable, string $debugString) : string




Returns the item description, according to the given $mode.

Mode can be one of:

- first_sentence: will return the first sentence of the main text (see [comment main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure) for more details).
- first_line: will return the first line of the main text (see [comment main text](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md#the-doc-comment-structure) for more details).
- format_text: will return the text formatted using the given $formatterCallable
- mixed: will try the first_sentence mode first, but if the result is an empty string, then uses the format_text mode as a fallback.




Parameters
================


- comment

    

- mode

    

- formatterCallable

    

- debugString

    


Return values
================

Returns string.


Exceptions thrown
================

- [BadWidgetConfigurationException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/BadWidgetConfigurationException.md).&nbsp;







See Also
================

The [PlanetTocListWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget.md) class.

Previous method: [render](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget/render.md)<br>

