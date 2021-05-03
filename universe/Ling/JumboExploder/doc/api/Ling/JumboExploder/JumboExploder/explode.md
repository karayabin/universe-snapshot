[Back to the Ling/JumboExploder api](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder.md)<br>
[Back to the Ling\JumboExploder\JumboExploder class](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/JumboExploder.md)


JumboExploder::explode
================



JumboExploder::explode — Parses the given string, and returns an array of strings delimited by the given delimiter.




Description
================


public static [JumboExploder::explode](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/JumboExploder/explode.md)(string $delimiter, string $s, ?array $scopes = [], ?array $options = []) : array




Parses the given string, and returns an array of strings delimited by the given delimiter.

Scopes can be given to hide some content from the parser.
See the [JumboExploder conception notes](https://github.com/lingtalfi/JumboExploder/blob/master/doc/pages/conception-notes.md) for more details.


The options are the following:

- trim: bool=true. Whether to trim every returned component.




Parameters
================


- delimiter

    

- s

    

- scopes

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [JumboExploder::explode](https://github.com/lingtalfi/JumboExploder/blob/master/JumboExploder.php#L37-L156)


See Also
================

The [JumboExploder](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/JumboExploder.md) class.

Next method: [lookahead](https://github.com/lingtalfi/JumboExploder/blob/master/doc/api/Ling/JumboExploder/JumboExploder/lookahead.md)<br>

