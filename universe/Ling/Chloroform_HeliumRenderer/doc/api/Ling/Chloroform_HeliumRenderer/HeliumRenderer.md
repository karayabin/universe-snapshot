[Back to the Ling/Chloroform_HeliumRenderer api](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer.md)



The HeliumRenderer class
================
2019-07-26 --> 2019-07-26






Introduction
============

The HeliumRenderer class.

I set print methods to public, in case you want to reuse this class bit by bit, instead
of using the render method.


This class has some external dependencies:

- jquery (I used 3.4 for development)

And some internal dependencies:
- the js file (helium.js is provided with this planet)
- the css file (helium.css is provided with this planet)

The helium.js file must be called AFTER jquery.



data-main=...
===============
For every field, I add a data-main attribute with value equals to the field identifier.
This is for the js validator: it basically tells the js validator: "hey, I'm the main field to update".
Why do I need this?
Because for some fields (like TimeField or even a simple CheckboxField), it might be confusing as to which element
to give the focus on when you click the link in the error summary for that field.

Reminder: the error summary is the list of errors at the top of the form. And so the idea is that each element of
this list is actually a link that focuses the culprit field. And so to the question: "what field exactly is the culprit field
that I should focus on?", then the answer is: "the field with data-main=1".

Important note: the focused element is not necessarily a control element, it can also be any html element (like a span for instance),
as this is the case with the CheckboxField and RadioField in this particular class.
And so in this case, the validator would anchor to the element, but not focus it (because afaik you can't focus a span for instance).




inline errors
============
Inline errors should be appended to:

- a label tag if this label tag contains a .field-label element (see the printFieldLabel method for more info)
- the .field-inline-errors element (see printCheckboxField and printRadioField methods for some examples).



Class synopsis
==============


class <span class="pl-k">HeliumRenderer</span> implements [ChloroformRendererInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Renderer/ChloroformRendererInterface.md) {

- Properties
    - protected array [$options](#property-options) ;
    - protected bool [$displayInlineErrors](#property-displayInlineErrors) ;
    - protected bool [$displayErrorSummary](#property-displayErrorSummary) ;
    - protected string [$_formCssId](#property-_formCssId) ;
    - protected array [$_chloroformFields](#property-_chloroformFields) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/__construct.md)(array $options = []) : void
    - public [render](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/render.md)(array $chloroform) : string
    - public [printNotifications](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printNotifications.md)(array $notifications) : void
    - public [printErrorSummary](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printErrorSummary.md)(array $errors) : void
    - public [printFields](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printFields.md)(array $fields) : void
    - public [printStringField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printStringField.md)(array $field) : void
    - public [printTextField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printTextField.md)(array $field) : void
    - public [printNumberField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printNumberField.md)(array $field) : void
    - public [printHiddenField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printHiddenField.md)(array $field) : void
    - public [printCSRFField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printCSRFField.md)(array $field) : void
    - public [printColorField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printColorField.md)(array $field) : void
    - public [printDateField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printDateField.md)(array $field) : void
    - public [printTimeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printTimeField.md)(array $field) : void
    - public [printDateTimeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printDateTimeField.md)(array $field) : void
    - public [printSelectField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printSelectField.md)(array $field) : void
    - public [printCheckboxField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printCheckboxField.md)(array $field) : void
    - public [printRadioField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printRadioField.md)(array $field) : void
    - public [printFileField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printFileField.md)(array $field) : void
    - public [printPasswordField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printPasswordField.md)(array $field) : void
    - public [printJsHandler](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printJsHandler.md)(array $options = null) : void
    - protected [printInputField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printInputField.md)(array $field, string $type) : void
    - protected [printErrorsAndHint](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printErrorsAndHint.md)(array $field) : void
    - protected [printFieldLabel](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printFieldLabel.md)(array $field) : void
    - protected [getCssIdById](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/getCssIdById.md)(string $id) : string

}




Properties
=============

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    The options array can contain the following:
    
    - method: string=POST. The value of the "method" attribute of the form tag.
    - action: string=<empty string>. The value of the "action" attribute of the form tag.
    - useEnctypeMultiformData: bool=false. Whether to use the enctype=multipart/form-data encoding on the form tag.
    - showOnlyFirstError: bool=true. For a given field, show only the first error (if the field contains multiple errors).
    - strict: bool=true. Defines the behaviour when the renderer doesn't know how to interpret a given field.
                 If true (strict mode), an exception is thrown.
                 If false (non strict mode), the field is ignored.
    - text: array containing all language specific related strings.
         - submitButtonValue: string=Submit. The value of the submit button.
         - errorSummaryTitle: string="There's a problem". The text of the error summary title (displayed only if the form contains static errors).
         - hours: string=hours. Text used in time and datetime fields.
         - minutes: string=minutes. Text used in time and datetime fields.
         - seconds: string=seconds. Text used in time and datetime fields.
    
    - displayErrorMode: string=both (both | inline | summary). How to display error messages: whether inline (i.e. above the form fields),
             in an error summary at the top of the form (summary mode), or both at the same time.
    - useValidation: bool=true. Set it to false to debug static validation, or if you don't need js validation at all.
    - renderPrintsJsHandler: bool=true. Whether the render method should print the js handler. If false, you are responsible for printing the js handler manually wherever you see fit (usually just before the body tag).
    - formStyle: string=stack (stack|horizontal). Which bootstrap 4 style to use to render the fields.
                     With stack, the form control is below the label,
                     with horizontal, the form control is to the right of the label.
    
    

- <span id="property-displayInlineErrors"><b>displayInlineErrors</b></span>

    This property holds the displayInlineErrors for this instance.
    
    

- <span id="property-displayErrorSummary"><b>displayErrorSummary</b></span>

    This property holds the displayErrorSummary for this instance.
    
    

- <span id="property-_formCssId"><b>_formCssId</b></span>

    This property holds the css id of the form.
    This property becomes only available when the render method is called.
    
    

- <span id="property-_chloroformFields"><b>_chloroformFields</b></span>

    This property holds the chloroform fields for this instance.
    This property becomes only available when the render method is called.
    
    



Methods
==============

- [HeliumRenderer::__construct](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/__construct.md) &ndash; Builds the HeliumRenderer instance.
- [HeliumRenderer::render](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/render.md) &ndash; Returns the html version of the passed chloroform array.
- [HeliumRenderer::printNotifications](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printNotifications.md) &ndash; Prints the given notifications.
- [HeliumRenderer::printErrorSummary](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printErrorSummary.md) &ndash; Prints the given errors.
- [HeliumRenderer::printFields](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printFields.md) &ndash; Prints the given fields.
- [HeliumRenderer::printStringField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printStringField.md) &ndash; Prints the given string field.
- [HeliumRenderer::printTextField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printTextField.md) &ndash; Prints the given text field.
- [HeliumRenderer::printNumberField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printNumberField.md) &ndash; Prints the given number field.
- [HeliumRenderer::printHiddenField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printHiddenField.md) &ndash; Prints the given hidden field.
- [HeliumRenderer::printCSRFField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printCSRFField.md) &ndash; Prints the given csrf field.
- [HeliumRenderer::printColorField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printColorField.md) &ndash; Prints the given color field.
- [HeliumRenderer::printDateField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printDateField.md) &ndash; Prints the given date field.
- [HeliumRenderer::printTimeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printTimeField.md) &ndash; Prints the given time field.
- [HeliumRenderer::printDateTimeField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printDateTimeField.md) &ndash; Prints the given datetime field.
- [HeliumRenderer::printSelectField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printSelectField.md) &ndash; Prints the given select field.
- [HeliumRenderer::printCheckboxField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printCheckboxField.md) &ndash; Prints the given checkbox field.
- [HeliumRenderer::printRadioField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printRadioField.md) &ndash; Prints the given radio field.
- [HeliumRenderer::printFileField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printFileField.md) &ndash; Prints the given file field.
- [HeliumRenderer::printPasswordField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printPasswordField.md) &ndash; Prints the given password field.
- [HeliumRenderer::printJsHandler](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printJsHandler.md) &ndash; and some fields behaviours.
- [HeliumRenderer::printInputField](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printInputField.md) &ndash; Prints an input field.
- [HeliumRenderer::printErrorsAndHint](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printErrorsAndHint.md) &ndash; Prints the errors and the hint if any.
- [HeliumRenderer::printFieldLabel](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/printFieldLabel.md) &ndash; Prints a standard label for a field.
- [HeliumRenderer::getCssIdById](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer/getCssIdById.md) &ndash; Returns the css id for a given field id.





Location
=============
Ling\Chloroform_HeliumRenderer\HeliumRenderer<br>
See the source code of [Ling\Chloroform_HeliumRenderer\HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/HeliumRenderer.php)



SeeAlso
==============
Previous class: [ChloroformHeliumRendererException](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/Exception/ChloroformHeliumRendererException.md)<br>