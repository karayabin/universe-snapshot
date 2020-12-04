[Back to the Ling/Chloroform api](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform.md)



The FormAwareFieldInterface class
================
2019-04-10 --> 2020-12-01






Introduction
============

The FormAwareFieldInterface interface.

When a field implements this interface, it automatically gets injected the form instance.

This was done to help with the implementation of the password confirmation system, to create
a validator that is aware of another field that the one being validated.



Class synopsis
==============


abstract class <span class="pl-k">FormAwareFieldInterface</span>  {

- Methods
    - abstract public [setForm](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FormAwareFieldInterface/setForm.md)([Ling\Chloroform\Form\Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) $form) : void

}






Methods
==============

- [FormAwareFieldInterface::setForm](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FormAwareFieldInterface/setForm.md) &ndash; Sets the form instance.





Location
=============
Ling\Chloroform\Field\FormAwareFieldInterface<br>
See the source code of [Ling\Chloroform\Field\FormAwareFieldInterface](https://github.com/lingtalfi/Chloroform/blob/master/Field/FormAwareFieldInterface.php)



SeeAlso
==============
Previous class: [FileField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/FileField.md)<br>Next class: [HiddenField](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Field/HiddenField.md)<br>
