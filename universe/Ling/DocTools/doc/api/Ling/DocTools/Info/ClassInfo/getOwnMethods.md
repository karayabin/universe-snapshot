[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Info\ClassInfo class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md)


ClassInfo::getOwnMethods
================



ClassInfo::getOwnMethods — Returns the list of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) declared by this class (i.e.




Description
================


public [ClassInfo::getOwnMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo/getOwnMethods.md)(?$filter = null) : [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md)




Returns the list of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md) declared by this class (i.e. not inherited).




Parameters
================


- filter

    The methods visibility(ies) to return (public, protected, private).
     Can be expressed either as an array (to combine multiple visibilities) or a string (single visibility).


Return values
================

Returns [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md).








Source Code
===========
See the source code for method [ClassInfo::getOwnMethods](https://github.com/lingtalfi/DocTools/blob/master/Info/ClassInfo.php#L166-L176)


See Also
================

The [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) class.

Previous method: [getMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo/getMethods.md)<br>Next method: [setComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo/setComment.md)<br>

