Chloroform array
================
2019-10-18 -> 2020-09-07




The chloroform array is the array returned when you call the Chloroform instance's **toArray** method.


It has the following structure:


```text
- isPosted: bool. Whether the form has been posted
- notifications: array. An array of notifications. Each notification is an array containing:
                    - type: string. The type of the notification (success, info, warning, error)
                    - msg: string, the message of the notification
- fields: array. An array of fields. Each field represent a form control.
                Each field is also an array, which structure depends on the field.
                However, a field array should have at least the following properties:
                    - id: string                  # the field id (https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-field-id)
                    - label: string|null          # the label
                    - hint: string|null           # the hint (often used in placeholder)
                    - errorName: string           # the label to use in an error message
                    - value: mixed                # the value of the field. Could be null, an array or a scalar.
                    - htmlName: string            # the html name (often used in the name attribute of html tags)
                    - errors: array               # the error messages. Each error message is a string.
                    - className: string           # the name of the field class (this is addressed to renderers, so that they know how to render the field)
                    - ...other properties might be added, depending on your field

                    


- errors: array. A summary of the form errors (for the templates to use).
                It's actually nothing more than the fields errors put altogether here.

- properties: array. An array of custom key/value pairs for the developers to use. I originally created this to implement the  
        [iframe signal technique](https://github.com/lingtalfi/TheBar/blob/master/discussions/iframe-signal.md).
- mode: string. Optional. One of:
        - insert
        - update
        - not_set (default value)
        You can set the mode (and I recommend it) to insert/update to help some field renderers to do their job.
        Or don't use it and use your own heuristics...
- jsCode: string=null. Some js code to add to handle the form. I first created it to implement a multiple edit system.
               The js code will be included inside some <script> tags provided by the renderer.        
- cssId: string=null. The css id of the form, if set. Null is returned by default or if the cssId was not set.
- id: string=chloroform_one. The id of the form. This is: 
    - used to know which form on the page was posted (given that a page could potentially contain multiple forms) 
    - defined by the [clever form initiative](https://github.com/lingtalfi/TheBar/blob/master/discussions/clever-form-initiative.md), which chloroform is designed to work with

```