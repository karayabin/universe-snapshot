[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Input\ArrayInput class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput.md)


ArrayInput::setItems
================



ArrayInput::setItems — Sets the items (parameters, options, flags) for this instance.




Description
================


public [ArrayInput::setItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput/setItems.md)(array $items) : void




Sets the items (parameters, options, flags) for this instance.

Each item can be one of the following type:

- parameter (the key of the item starts with a colon ":", the value must be true)
- flag (the key of the item starts with a dash "-", the value must be true)
- option (a regular key/value pair, no prefix)




Parameters
================


- items

    


Return values
================

Returns void.








See Also
================

The [ArrayInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput.md) class.



