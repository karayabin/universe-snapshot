[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)<br>
[Back to the Ling\Light_Kit\Helper\WidgetVariablesHelper class](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper.md)


WidgetVariablesHelper::doInjectWidgetVariables
================



WidgetVariablesHelper::doInjectWidgetVariables — Injects the given widget variables in the page conf.




Description
================


private static [WidgetVariablesHelper::doInjectWidgetVariables](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper/doInjectWidgetVariables.md)(array &$pageConf, array $widgetVariables, ?array $options = []) : void




Injects the given widget variables in the page conf.

Available options are:

- target: string(conf|var)=var, what to replace, it can be either the widget configuration itself, or the vars sub-section of it




Parameters
================


- pageConf

    

- widgetVariables

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [LightKitException](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Exception/LightKitException.md).&nbsp;







Source Code
===========
See the source code for method [WidgetVariablesHelper::doInjectWidgetVariables](https://github.com/lingtalfi/Light_Kit/blob/master/Helper/WidgetVariablesHelper.php#L68-L118)


See Also
================

The [WidgetVariablesHelper](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper.md) class.

Previous method: [injectWidgetConf](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/Helper/WidgetVariablesHelper/injectWidgetConf.md)<br>

