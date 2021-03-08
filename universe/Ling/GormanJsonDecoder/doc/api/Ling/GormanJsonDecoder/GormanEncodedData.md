[Back to the Ling/GormanJsonDecoder api](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder.md)



The GormanEncodedData class
================
2020-05-28 --> 2021-03-05






Introduction
============

The GormanEncodedData class.



Class synopsis
==============


class <span class="pl-k">GormanEncodedData</span>  {

- Properties
    - protected array [$arr](#property-arr) ;
    - protected array [$callbackKeys](#property-callbackKeys) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/__construct.md)() : void
    - public [setPhpArray](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/setPhpArray.md)(array $arr) : void
    - public [setCallbackKeys](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/setCallbackKeys.md)(array $callbackKeys) : void
    - public [toPhpArray](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/toPhpArray.md)() : array
    - public [toJsCode](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/toJsCode.md)() : string

}




Properties
=============

- <span id="property-arr"><b>arr</b></span>

    The original php array.
    
    

- <span id="property-callbackKeys"><b>callbackKeys</b></span>

    The names of the keys to convert to js callbacks.
    
    



Methods
==============

- [GormanEncodedData::__construct](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/__construct.md) &ndash; Builds the GormanEncodedData instance.
- [GormanEncodedData::setPhpArray](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/setPhpArray.md) &ndash; Sets the arr.
- [GormanEncodedData::setCallbackKeys](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/setCallbackKeys.md) &ndash; Sets the callbackKeys.
- [GormanEncodedData::toPhpArray](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/toPhpArray.md) &ndash; Returns the php array corresponding to this instance.
- [GormanEncodedData::toJsCode](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanEncodedData/toJsCode.md) &ndash; Returns the js code representing this instance.





Location
=============
Ling\GormanJsonDecoder\GormanEncodedData<br>
See the source code of [Ling\GormanJsonDecoder\GormanEncodedData](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/GormanEncodedData.php)



SeeAlso
==============
Next class: [GormanJsonDecoder](https://github.com/lingtalfi/GormanJsonDecoder/blob/master/doc/api/Ling/GormanJsonDecoder/GormanJsonDecoder.md)<br>
