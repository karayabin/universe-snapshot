[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)<br>
[Back to the Ling\Light_Realform\Routine\LightRealformRoutineTwo class](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo.md)


LightRealformRoutineTwo::processForm
================



LightRealformRoutineTwo::processForm — and returns a chloroform instance.




Description
================


public [LightRealformRoutineTwo::processForm](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/processForm.md)(string $realformIdentifier, string $table, array $rics, ?array $options = []) : [Chloroform](https://github.com/lingtalfi/Chloroform) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




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

    

- table

    

- rics

    

- options

    


Return values
================

Returns [Chloroform](https://github.com/lingtalfi/Chloroform) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealformRoutineTwo::processForm](https://github.com/lingtalfi/Light_Realform/blob/master/Routine/LightRealformRoutineTwo.php#L105-L447)


See Also
================

The [LightRealformRoutineTwo](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/__construct.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/setContainer.md)<br>

