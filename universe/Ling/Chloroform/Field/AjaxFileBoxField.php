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
 * however the ajax file box will control the javascript client.
 *
 * There are many potential js clients, and so we are trying to be as agnostic as we can here.
 * However, we impose one thing: the javascript client ultimately must come up with either an url (of the uploaded file),
 * or an array of urls (if the user can upload more than one file).
 *
 * And so we have one property: maxFile, which control how many files maximum can be uploaded (at once).
 * If maxFile is 1, the expected value (in the $_POST array) will be a scalar (i.e. a single url).
 * If maxFile is greater than 1, the expected value in the $_POST array will be an array of urls.
 *
 * Now depending on the js client, you might want to add some more properties.
 *
 *
 * An example of js client is the file uploader: https://github.com/lingtalfi/jFileUploader.
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
        ];
        $properties = array_replace($defaultValues, $properties);
        return new static($properties);
    }

    /**
     * @overrides
     */
    public function getFallbackValue()
    {
        if ($this->properties['maxFile'] <= 1) {
            return '';
        }
        return [];
    }


}