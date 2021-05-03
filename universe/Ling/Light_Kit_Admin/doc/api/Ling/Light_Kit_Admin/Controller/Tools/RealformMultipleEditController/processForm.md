[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Controller\Tools\RealformMultipleEditController class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController.md)


RealformMultipleEditController::processForm
================



RealformMultipleEditController::processForm — and returns a chloroform instance.




Description
================


protected [RealformMultipleEditController::processForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/processForm.md)(string $realformIdentifier, array $rics, ?array $options = []) : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Applies a standard routine to the form identified by the given realformIdentifier,
and returns a chloroform instance.

The available options are:

- post: array. Optional = []. Some extra parameters to add to the form.
- onSuccess: callable to execute on success.
     The callable signature is this:
     - fn (  ): ?HttpResponseInterface

     If a response is returned, it will be the return of the processForm method as well.




Parameters
================


- realformIdentifier

    

- rics

    

- options

    


Return values
================

Returns [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [RealformMultipleEditController::processForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Controller/Tools/RealformMultipleEditController.php#L181-L577)


See Also
================

The [RealformMultipleEditController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController.md) class.

Previous method: [render](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/render.md)<br>Next method: [getProperty](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/getProperty.md)<br>

