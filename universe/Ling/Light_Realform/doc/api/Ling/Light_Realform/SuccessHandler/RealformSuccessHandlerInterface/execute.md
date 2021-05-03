[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\SuccessHandler\RealformSuccessHandlerInterface class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)


RealformSuccessHandlerInterface::execute
================



RealformSuccessHandlerInterface::execute — Process the given data, and throws an exception if something unexpected happens.




Description
================


abstract public [RealformSuccessHandlerInterface::execute](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface/execute.md)(array $data, ?array $options = []) : mixed




Process the given data, and throws an exception if something unexpected happens.
This method can return information if necessary.



It is assumed that the given data is valid (it's generally posted by the user
and validated by some validation rules first before it arrives here).

Available options are:
- updateRic: array|false=false, see [the updateRic definition in the Light_Realform conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/conception-notes.md#the-updateric-concept) for more details.
     It's false if the form is not in update mode.
- storageId: string=null, the storage id that you defined in your configuration file.
- multiplier: array, the multiplier form array. See [the multiplier form document](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md#the-form-multiplier-array) for more details.
- ...or you can add your own options




If an exception is thrown, it's message shall be displayed to the user.




Parameters
================


- data

    

- options

    


Return values
================

Returns mixed.








Source Code
===========
See the source code for method [RealformSuccessHandlerInterface::execute](https://github.com/lingtalfi/Light_Realform/blob/master/SuccessHandler/RealformSuccessHandlerInterface.php#L43-L43)


See Also
================

The [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md) class.



