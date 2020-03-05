[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The RealformHandlerInterface class
================
2019-10-21 --> 2020-02-28






Introduction
============

The RealformHandlerInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">RealformHandlerInterface</span>  {

- Methods
    - abstract public [setId](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/setId.md)(string $id) : mixed
    - abstract public [getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/getFormHandler.md)(?array $configuration = null) : [Chloroform](https://github.com/lingtalfi/Chloroform)
    - abstract public [getConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/getConfiguration.md)() : array
    - abstract public [getSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/getSuccessHandler.md)() : [RealformSuccessHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/SuccessHandler/RealformSuccessHandlerInterface.md)

}






Methods
==============

- [RealformHandlerInterface::setId](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/setId.md) &ndash; Sets the realform id.
- [RealformHandlerInterface::getFormHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/getFormHandler.md) &ndash; Returns a chloroform instance configured based on the realform id.
- [RealformHandlerInterface::getConfiguration](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/getConfiguration.md) &ndash; Returns the realform configuration based on the realform id.
- [RealformHandlerInterface::getSuccessHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/RealformHandlerInterface/getSuccessHandler.md) &ndash; Returns the success handler for this instance.





Location
=============
Ling\Light_Realform\Handler\RealformHandlerInterface<br>
See the source code of [Ling\Light_Realform\Handler\RealformHandlerInterface](https://github.com/lingtalfi/Light_Realform/blob/master/Handler/RealformHandlerInterface.php)



SeeAlso
==============
Previous class: [BaseRealformHandler](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Handler/BaseRealformHandler.md)<br>Next class: [RealformRendererInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Renderer/RealformRendererInterface.md)<br>
