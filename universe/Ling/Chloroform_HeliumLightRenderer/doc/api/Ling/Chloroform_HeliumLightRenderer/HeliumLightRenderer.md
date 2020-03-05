[Back to the Ling/Chloroform_HeliumLightRenderer api](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer.md)



The HeliumLightRenderer class
================
2019-10-21 --> 2020-02-27






Introduction
============

The HeliumLightRenderer class.



Class synopsis
==============


class <span class="pl-k">HeliumLightRenderer</span> extends [HeliumRenderer](https://github.com/lingtalfi/Chloroform_HeliumRenderer/blob/master/doc/api/Ling/Chloroform_HeliumRenderer/HeliumRenderer.md) implements [ChloroformRendererInterface](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Renderer/ChloroformRendererInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Inherited properties
    - protected array [HeliumRenderer::$options](#property-options) ;
    - protected bool [HeliumRenderer::$displayInlineErrors](#property-displayInlineErrors) ;
    - protected bool [HeliumRenderer::$displayErrorSummary](#property-displayErrorSummary) ;
    - protected string [HeliumRenderer::$_formCssId](#property-_formCssId) ;
    - protected array [HeliumRenderer::$_chloroform](#property-_chloroform) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/__construct.md)(?array $options = []) : void
    - public [setContainer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [render](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/render.md)(array $chloroform) : string
    - public [printField](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/printField.md)(array $field) : void
    - protected [printAjaxFileBoxField_FileUploader](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/printAjaxFileBoxField_FileUploader.md)(array $field) : void
    - protected [printTableListField](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/printTableListField.md)(array $field) : void

- Inherited methods
    - public HeliumRenderer::prepare(array $chloroform) : void
    - public HeliumRenderer::printFormContent() : void
    - public HeliumRenderer::printFormTagOpening() : void
    - public HeliumRenderer::printFormTagClosing() : void
    - public HeliumRenderer::printNotifications(array $notifications) : void
    - public HeliumRenderer::printErrorSummary(array $errors) : void
    - public HeliumRenderer::printFields(array $fields) : void
    - public HeliumRenderer::printStringField(array $field) : void
    - public HeliumRenderer::printTextField(array $field) : void
    - public HeliumRenderer::printNumberField(array $field) : void
    - public HeliumRenderer::printHiddenField(array $field) : void
    - public HeliumRenderer::printCSRFField(array $field) : void
    - public HeliumRenderer::printColorField(array $field) : void
    - public HeliumRenderer::printDateField(array $field) : void
    - public HeliumRenderer::printTimeField(array $field) : void
    - public HeliumRenderer::printDateTimeField(array $field) : void
    - public HeliumRenderer::printSelectField(array $field) : void
    - public HeliumRenderer::printCheckboxField(array $field) : void
    - public HeliumRenderer::printRadioField(array $field) : void
    - public HeliumRenderer::printFileField(array $field) : void
    - public HeliumRenderer::printPasswordField(array $field) : void
    - public HeliumRenderer::printDecorativeField(array $field) : void
    - public HeliumRenderer::printJsHandler(?array $options = null) : void
    - public HeliumRenderer::printCustomScripts() : void
    - protected HeliumRenderer::printInputField(array $field, string $type) : void
    - protected HeliumRenderer::printErrorsAndHint(array $field) : void
    - protected HeliumRenderer::printFieldLabel(array $field) : void
    - protected HeliumRenderer::getCssIdById(string $id) : string
    - protected HeliumRenderer::printJsCode(string $jsCode) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

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
    - printJsHandler: bool=true. Whether the render method should print the js handler. If false, you are responsible for printing the js handler manually wherever you see fit (usually just before the body tag).
    - printSubmitButton: bool=true. Whether to render the submit button.
    - printFormTag: bool=true. Whether to render the form tag.
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
    
    

- <span id="property-_chloroform"><b>_chloroform</b></span>

    This property holds the _chloroform array for this instance.
    This property becomes only available when the render method is called.
    
    



Methods
==============

- [HeliumLightRenderer::__construct](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/__construct.md) &ndash; Builds the HeliumLightRenderer instance.
- [HeliumLightRenderer::setContainer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/setContainer.md) &ndash; Sets the container.
- [HeliumLightRenderer::render](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/render.md) &ndash; Returns the html version of the passed chloroform array.
- [HeliumLightRenderer::printField](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/printField.md) &ndash; Prints the given field.
- [HeliumLightRenderer::printAjaxFileBoxField_FileUploader](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/printAjaxFileBoxField_FileUploader.md) &ndash; Prints an ajax file box field.
- [HeliumLightRenderer::printTableListField](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/HeliumLightRenderer/printTableListField.md) &ndash; Prints a table list file box field.
- HeliumRenderer::prepare &ndash; Stores the chloroform array in memory.
- HeliumRenderer::printFormContent &ndash; form tag itself.
- HeliumRenderer::printFormTagOpening &ndash; Prints the opening form tag.
- HeliumRenderer::printFormTagClosing &ndash; Prints the closing form tag.
- HeliumRenderer::printNotifications &ndash; Prints the given notifications.
- HeliumRenderer::printErrorSummary &ndash; Prints the given errors.
- HeliumRenderer::printFields &ndash; Prints the given fields.
- HeliumRenderer::printStringField &ndash; Prints the given string field.
- HeliumRenderer::printTextField &ndash; Prints the given text field.
- HeliumRenderer::printNumberField &ndash; Prints the given number field.
- HeliumRenderer::printHiddenField &ndash; Prints the given hidden field.
- HeliumRenderer::printCSRFField &ndash; Prints the given csrf field.
- HeliumRenderer::printColorField &ndash; Prints the given color field.
- HeliumRenderer::printDateField &ndash; Prints the given date field.
- HeliumRenderer::printTimeField &ndash; Prints the given time field.
- HeliumRenderer::printDateTimeField &ndash; Prints the given datetime field.
- HeliumRenderer::printSelectField &ndash; Prints the given select field.
- HeliumRenderer::printCheckboxField &ndash; Prints the given checkbox field.
- HeliumRenderer::printRadioField &ndash; Prints the given radio field.
- HeliumRenderer::printFileField &ndash; Prints the given file field.
- HeliumRenderer::printPasswordField &ndash; Prints the given password field.
- HeliumRenderer::printDecorativeField &ndash; Prints the given decorative field.
- HeliumRenderer::printJsHandler &ndash; and some fields behaviours.
- HeliumRenderer::printCustomScripts &ndash; Prints some custom scripts if necessary.
- HeliumRenderer::printInputField &ndash; Prints an input field.
- HeliumRenderer::printErrorsAndHint &ndash; Prints the errors and the hint if any.
- HeliumRenderer::printFieldLabel &ndash; Prints a standard label for a field.
- HeliumRenderer::getCssIdById &ndash; Returns the css id for a given field id.
- HeliumRenderer::printJsCode &ndash; Prints the js code of the form, if any.





Location
=============
Ling\Chloroform_HeliumLightRenderer\HeliumLightRenderer<br>
See the source code of [Ling\Chloroform_HeliumLightRenderer\HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/HeliumLightRenderer.php)



SeeAlso
==============
Previous class: [ChloroformHeliumLightRendererException](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer/blob/master/doc/api/Ling/Chloroform_HeliumLightRenderer/Exception/ChloroformHeliumLightRendererException.md)<br>
