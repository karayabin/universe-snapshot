Realform configuration example
==============
2019-10-24 -> 2019-10-31


Below is an example of a realform configuration file used by a plugin I'm working on at the moment.

I added a lot of comments so that this can serve as the documentation for the realform configuration file structure.




```yaml

# The form handler section is responsible for configuring the form handler (not to confound with the realform handler).
# Usually, the form handler ends up being a Chloroform instance.
form_handler:
    # The chloroform instance, otherwise the realform handler should provide a default instance.
    ?class: MyClass\Blabla

    # the formId (see Chloroform class source code), solves conflicts when multiple forms are on the same page.
    id: myFormId

    # An array to configure the chloroform instance.
    # Note: another option is to create a configured instance directly (see the class property),
    # and not using this fields property.
    # It's an array of fieldId (see the FieldInterface.getId method for more details) => fieldDescription.
    # fieldDescription is an array of:


    # - ?label: string|null         # the label of the field
    # - ?hint: string|null          # the hint (often used in placeholder)
    # - ?errorName: string          # the label to use in an error message
    # - ?value: mixed               # the initial value of the field. Could be null, an array or a scalar.
    # - type: string                # a type representing a class. The mapping type->class is defined by the realform handler interpreting this file.
    #                               # Usually some default types are available, which are the field classes of Chloroform planet,
    #                               # but without the Field suffix, and with the first letter lower case. For instance:
    #                               # - ajaxFileBox -> Ling\Chloroform\Field\AjaxFileBoxField
    #                               # - checkbox -> Ling\Chloroform\Field\CheckboxField
    #                               # - ...
    #                               # This list is (last update 2019-10-16):
    #                               # - ajaxFileBox
    #                               # - checkbox
    #                               # - color
    #                               # - csrf (the case is an exception, because cSRF would be impractical)
    #                               # - date
    #                               # - file
    #                               # - hidden
    #                               # - number
    #                               # - password
    #                               # - radio
    #                               # - select
    #                               # - string
    #                               # - text
    #                               # - time
    # - ?validators: array          # an array of validator id => validator parameters.
    #                               # The realform handler is responsible for mapping the id to the right Validator classes.
    #                               # Usually, the id is the name of the class, with first letter lower case and without the Validator suffix.
    #                               # For instance:
    #                               # - fileMimeType -> Ling\Chloroform\Validator\FileMimeTypeValidator
    #                               # - minMaxChar -> Ling\Chloroform\Validator\MinMaxCharValidator
    #                               # - ...
    #                               #
    #                               # This list is (last update 2019-10-16):
    #                               # - csrf (the case is an exception, because cSRF would be impractical)
    #                               # - fileMimeType
    #                               # - minMaxChar
    #                               # - minMaxDate
    #                               # - minMaxFileSize
    #                               # - minMaxItem
    #                               # - minMaxNumber
    #                               # - passwordConfirm
    #                               # - password
    #                               # - requiredDate
    #                               # - required
    #                               # - ...(other aliases can be added, using the "realform_handler_alias_helper" service)
    #
    #                               # The validator parameters depend on the validator being used.
    #                               # But there is a common validator parameter:
    #                               # - errorMessage: string|array, either the error message string, or an array of [errorMessage]
    #                               #                 an array of [errorMessage, messageIdentifier].
    #                               #                 The default messageIdentifier is main.
    #                               #                 See the Ling\Chloroform\Validator\AbstractValidator class for more details.
    # - ?dataTransformer: mixed     # an alias for the dataTransformer to use for this field. Aliases provided by external plugins are 
    #                               # resolved via the "realform_handler_alias_helper" service.
    #                               # 
    #                               # Note: I stated it as a mixed type in case the dataTransformer requires more than an alias in the future. 
    #                               # For instance, if it needs parameters too, then this dataTransformer option could also be an  
    #                               # array like [dataTransformerAlias, dataTransformerParams]...
    # 
    # - ... other properties, which are passed as properties of the field (see the Ling\Chloroform\Field\AbstractField constructor for more details).
    fields:
        identifier:
            type: string
            label: Identifier
            validators:
                required: []
        pseudo:
            type: string
            label: Pseudo
            constraints:
                required: []
        password:
            type: password
            label: Password
            constraints:
                required: []
        avatar_url:
            type: ajaxFileBox
            label: Avatar url
            maxFile: 1
            maxFileSize: null
            mimeType: null
            postParams: []
        extra:
            type: text
            label: Extra

# This section is used to configure the RealformSuccessHandlerInterface instance
on_success_handler:
    # The type is an arbitrary identifier representing the type of success handler required for this realform process.
    # The type is specific to the concrete realform handler instance (i.e. see the concrete realform handler class for the available types),
    type: database

    # The params is an array of parameters to go along with the type (see the type entry just above).
    # This is also specific to the concrete realform handler instance.
    params:
        table: lud_user



```