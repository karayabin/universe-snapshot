[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)<br>
[Back to the DocTools\Info\ClassInfo class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md)


ClassInfo::getOwnMethods
================



ClassInfo::getOwnMethods — Returns the list of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) declared by this class (i.e.




Description
================


public [ClassInfo::getOwnMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo/getOwnMethods.md)($filter = null) : [MethodInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md)




Returns the list of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md) declared by this class (i.e. not inherited).




Parameters
================


- filter

    The methods visibility(ies) to return (public, protected, private).
Can be expressed either as an array (to combine multiple visibilities) or a string (single visibility).


Return values
================

Returns [MethodInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/MethodInfo.md).







See Also
================

The [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/ClassInfo.md) class.
