[Back to the Ling/Light_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor.md)<br>
[Back to the Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageApiInterface class](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface.md)


CustomPageApiInterface::getAllWidgetsByPage
================



CustomPageApiInterface::getAllWidgetsByPage — Returns all rows owned by the page identified by the given identifier.




Description
================


abstract public [CustomPageApiInterface::getAllWidgetsByPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface/getAllWidgetsByPage.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns all rows owned by the page identified by the given identifier.


If the page row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value


Each returned row has the following structure:

(from lke_page)
- page_id
- page_identifier
- page_label
- page_layout
- page_layout_vars
- page_title
- page_description
- page_bodyclass


(from lke_page_has_block)
- position_name
- block_index

(from lke_block)
- block_id
- block_identifier

(from lke_block_has_widget)
- widget_position

(from lke_widget)
- widget_id
- widget_identifier
- widget_name
- widget_type
- widget_classname
- widget_dir
- widget_template
- widget_js
- widget_skin
- widget_vars
- widget_active




Parameters
================


- identifier

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [CustomPageApiInterface::getAllWidgetsByPage](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/Api/Custom/Interfaces/CustomPageApiInterface.php#L72-L72)


See Also
================

The [CustomPageApiInterface](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Api/Custom/Interfaces/CustomPageApiInterface.md) class.



