[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)<br>
[Back to the Ling\Chloroform\Form\Chloroform class](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)


Chloroform::getPostedData
================



Chloroform::getPostedData — Returns an array of posted data (for this instance).




Description
================


public [Chloroform::getPostedData](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/getPostedData.md)() : array




Returns an array of posted data (for this instance).

The posted data is empty if no form was posted, and otherwise is the
array described in [the postedData section](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-posted-data).

Note: you should not override this method. If your postedData are "special", you should override the
createPostedData method.




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [Chloroform::getPostedData](https://github.com/lingtalfi/Chloroform/blob/master/Form/Chloroform.php#L114-L121)


See Also
================

The [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) class.

Previous method: [isPosted](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/isPosted.md)<br>Next method: [validates](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform/validates.md)<br>

