[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Info\ClassInfo class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md)


ClassInfo::getMethods
================



ClassInfo::getMethods — Returns an array of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md).




Description
================


public [ClassInfo::getMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo/getMethods.md)(?$filter = null) : [MethodInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md)




Returns an array of [MethodInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md).




Parameters
================


- filter

    The methods visibility(ies) to return (public, protected, private).
     Can be expressed either as an array (to combine multiple visibilities) or a string (single visibility).


Return values
================

Returns [MethodInfo[]](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/MethodInfo.md).








Source Code
===========
See the source code for method [ClassInfo::getMethods](https://github.com/lingtalfi/DocTools/blob/master/Info/ClassInfo.php#L136-L154)


See Also
================

The [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) class.

Previous method: [getProperties](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo/getProperties.md)<br>Next method: [getOwnMethods](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo/getOwnMethods.md)<br>

