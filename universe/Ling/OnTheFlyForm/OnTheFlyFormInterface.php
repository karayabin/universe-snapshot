<?php


namespace Ling\OnTheFlyForm;


interface OnTheFlyFormInterface
{

    /**
     * @return array, the model representing the form, to pass to the template
     */
    public function getModel();

    /**
     * @return array, the data, injected via the inject method, and potentially formatted for better interoperability
     * with the application
     */
    public function getData();


    /**
     * @return bool
     */
    public function validate();


    /**
     * set $useAdaptor to true when you want to display the default values;
     * let $useAdaptor be to false when the data comes from the user.
     * More info: https://github.com/lingtalfi/OnTheFlyForm/blob/master/doc/adaptors.md
     *
     */
    public function inject(array $data, $useAdaptor = false);

    /**
     * Returns whether or not this form was posted.
     * This is mostly useful if there are potentially multiple form instances on the same page.
     *
     * @return bool
     */
    public function isPosted();

    public function setSuccessMessage($message);

    public function setErrorMessage($message);

    /**
     * @param array $rules , define the validation rules to execute when the validate method is called.
     *                      See the documentation for more details.
     * @return void
     */
    public function setValidationRules(array $rules);

    /**
     * @param array $labels, array of id => label
     *          Labels are mostly used for validation error messages.
     * @return void
     */
    public function setLabels(array $labels);

}

