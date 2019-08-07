<?php

namespace Ling\Chloroform\Field;


/**
 * The AjaxFileBoxField class.
 *
 * An ajax file box field doesn't work the same way as a traditional file field.
 *
 * With an ajax file box, the file is uploaded via ajax (thanks to a third-party javascript client)
 * to a backend upload service.
 *
 * Now how the backend service handles the response is outside the scope of this class,
 * however the ajax file box controls indirectly the javascript client, telling him the desired validation
 * rules to check for, such as the maximum number of files, the max file size, the allowed mime types, those kind of things.
 *
 * But the validation is not handled with php Validator (Chloroform/Validator) objects like other fields,
 * but rather by the javascript client.
 *
 * One other main difference with a traditional FileField is that when the form is posted with a FileField,
 * the resulting value is stored from the $_FILES.
 *
 * Not with an ajax box. The ajax box will drive the javascript client which basically will take care of sending
 * the ajax form to the backend service, however the js client also takes care of converting the response of the server
 * into one ore more input fields (usually of type hidden), depending on the max file value.
 *
 * That is, if maxFile is 1, the value of the file will be accessed from the $_POST array and will be a scalar.
 * And if maxFile is greater than 1, the value will be accessed from the $_POST array again, but will be an array of values.
 *
 * In fact, we don't even need to add the enctype=multipart/form-data on the form which contains an ajax box, because the
 * file sending is done in the background via ajax thanks to the javascript client.
 *
 * Now this chloroform doesn't provide a javascript client, but I've developing one that does all that called js file uploader
 * in the lingtalfi repository on github.com.
 * Note: you can use any js client, as long as you understand how this class works.
 *
 *
 * Special properties
 * ----------
 * The properties handled by this class (and passed to the js client) are the following:
 *
 * - maxFile: int=1, the maximum number of uploaded files.
 *          This property influences the result in the submitted data (the $_POST array).
 *          If maxFile=1, this field should return a scalar value (for instance $_POST[myfile] = /upload/img/the_file.kpg)
 *          However if maxFile > 1, this field should return an array of values;
 *          for instance $_POST[myfile] =
 *                  - /upload/img/the_file_one.jpg
 *                  - /upload/img/the_file_two.jpg
 *                  - ...
 * - maxFileSize: int=null, the maximum number of byte per file. If null, this means that there is no limitation for the file weight.
 * - mimeType: string|array=null the allowed mime types. If null, this means that there is no limitation for the file mime type.
 * - postParams: array=[]. An array of parameters to pass along with the uploaded file. The params are passed to the $_POST array.
 *
 *
 * Note: the backend service should have a validation layer too, and both layers (the one provided by javascript and
 * the backend service validation layer) should be synced, however this class doesn't handle the backend service at all,
 * so you should implement it yourself.
 *
 *
 *
 *
 *
 *
 */
class AjaxFileBoxField extends AbstractField
{


    /**
     *
     * Builds and returns the instance.
     *
     *
     *
     * @param string $label
     * @param array $properties
     * @return $this
     */
    public static function create(string $label, array $properties = [])
    {
        $properties['label'] = $label;
        $defaultValues = [
            "maxFile" => 1,
            "maxFileSize" => null,
            "mimeType" => null,
            "postParams" => [],
        ];
        $properties = array_replace($defaultValues, $properties);
        return new static($properties);
    }
}