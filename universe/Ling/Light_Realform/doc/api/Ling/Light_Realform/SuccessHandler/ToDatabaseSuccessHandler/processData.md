[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\SuccessHandler\ToDatabaseSuccessHandler class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler.md)


ToDatabaseSuccessHandler::processData
================



ToDatabaseSuccessHandler::processData — - ?updateRic: the array of key => value pairs representing the row to update (i.e.




Description
================


public [ToDatabaseSuccessHandler::processData](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/processData.md)(array $data, ?array $options = []) : mixed




The options used by this method are:
- ?updateRic: the array of key => value pairs representing the row to update (i.e. the old row).

If the updateRic key is defined in the options, then the class switches to update mode,
otherwise the class assumes insert mode.

See the notes in the class description for more details.





Process the given data, and throws an exception if something unexpected happens.




Parameters
================


- data

    

- options

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [ToDatabaseSuccessHandler::processData](https://github.com/lingtalfi/Light_Realform/blob/master/SuccessHandler/ToDatabaseSuccessHandler.php#L104-L134)


See Also
================

The [ToDatabaseSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/__construct.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/ToDatabaseSuccessHandler/setContainer.md)<br>

