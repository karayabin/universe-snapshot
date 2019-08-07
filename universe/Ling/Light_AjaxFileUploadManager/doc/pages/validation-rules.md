Validation rules
=============
2019-08-02



The validation rules is actually an array of id => validation rules.

Where validation rules is an array of validationRuleName => parameters

The id is just any string.

The main use of it is to validate/cancel the upload of a file before it's treated by the [actions](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md).

Each validation rule is basically a test which returns a boolean: whether the validation rule passed.

An id is bound to any number of validation rules.

So when the file is uploaded, if the id (passed along with the uploaded file) has some validation rules associated with it,
then all validation rules are tested. 
If at least one validation rule fails, then the file will not be uploaded, and the service will return an error message,
as defined in the [ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md).

When all the validation rules pass, then the file is processed by the actions, and is possibly stored to the server (if there is no problem with the actions). 
 

The available validation rules are the following (this might be expanded depending on our needs):

- maxFileSize: string, the maximum file size, using either an int (size in bytes), or an human notation recognized by the [Bat/ConvertTool::convertHumanSizeToBytes](https://github.com/lingtalfi/Bat/blob/master/ConvertTool.md#converthumansizetobytes) method.
                The validation test will fail if the size of the uploaded file is strictly more than the maxFileSize value.                                       
- mimeType: string|array, the mime type (or array of mime types) allowed.
                The validation test will fail if the mime type of the uploaded file doesn't match the value given by the mimeType validation rule. 
        