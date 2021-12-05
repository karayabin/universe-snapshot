[Back to the Ling/Light_Kit_JimToolbox_LingTools api](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/api/Ling/Light_Kit_JimToolbox_LingTools.md)<br>
[Back to the Ling\Light_Kit_JimToolbox_LingTools\JimToolbox\LingToolsToolbox class](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/api/Ling/Light_Kit_JimToolbox_LingTools/JimToolbox/LingToolsToolbox.md)


LingToolsToolbox::getPaneBody
================



LingToolsToolbox::getPaneBody — Returns the pane body.




Description
================


public [LingToolsToolbox::getPaneBody](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/api/Ling/Light_Kit_JimToolbox_LingTools/JimToolbox/LingToolsToolbox/getPaneBody.md)(array $params) : string




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
See the source code for method [LingToolsToolbox::getPaneBody](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/JimToolbox/LingToolsToolbox.php#L31-L42)


See Also
================

The [LingToolsToolbox](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/api/Ling/Light_Kit_JimToolbox_LingTools/JimToolbox/LingToolsToolbox.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/api/Ling/Light_Kit_JimToolbox_LingTools/JimToolbox/LingToolsToolbox/__construct.md)<br>Next method: [getPaneTitle](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/api/Ling/Light_Kit_JimToolbox_LingTools/JimToolbox/LingToolsToolbox/getPaneTitle.md)<br>

