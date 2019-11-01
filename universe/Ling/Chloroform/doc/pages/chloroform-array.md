Chloroform array
================
2019-10-18




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

- errors: array. A summary of the form errors (for the templates to use).
                It's actually nothing more than the fields errors put altogether here. 

```