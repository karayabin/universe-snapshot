[Back to the Ling/GormanJsonDecoder api](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder.md)<br>
[Back to the Ling\GormanJsonDecoder\GormanJsonDecoder class](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanJsonDecoder.md)


GormanJsonDecoder::decode
================



GormanJsonDecoder::decode — Returns the js code representing the given array.




Description
================


public static [GormanJsonDecoder::decode](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanJsonDecoder/decode.md)(array $array) : string




Returns the js code representing the given array.

The given array can be either:

- a regular php array, in which case the plain json_encode will be applied to it
- a gorman array, in which case the gorman encoding will be applied to it


See the [GormanJsonDecoder conception notes](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- array

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [GormanJsonDecoder::decode](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/GormanJsonDecoder.php#L61-L68)


See Also
================

The [GormanJsonDecoder](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanJsonDecoder.md) class.

Previous method: [encode](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanJsonDecoder/encode.md)<br>

