[Back to the Ling/Light_JimToolbox api](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox.md)<br>
[Back to the Ling\Light_JimToolbox\Item\JimToolboxItemHandlerInterface class](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface.md)


JimToolboxItemHandlerInterface::getPaneBody
================



JimToolboxItemHandlerInterface::getPaneBody — Returns the pane body.




Description
================


abstract public [JimToolboxItemHandlerInterface::getPaneBody](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneBody.md)(array $params) : string




Returns the pane body.



The parameters are basically the received $_GET params.

However some extra-parameters might be added depending on which method you use.


If you use the acp_class and current_uri $_GET parameters, then the extra-params are:

- currentUri: the current_uri you passed, which represents the main page uri (i.e. not the ajax uri)


Otherwise, there are no extra params.


This method throws exception to signal something wrong happened.




Parameters
================


- params

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [JimToolboxItemHandlerInterface::getPaneBody](https://github.com/lingtalfi/Light_JimToolbox/blob/master/Item/JimToolboxItemHandlerInterface.php#L39-L39)


See Also
================

The [JimToolboxItemHandlerInterface](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface.md) class.

Next method: [getPaneTitle](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneTitle.md)<br>

