<?php


namespace StepFormBuilder\Step;


interface StepInterface
{
    public function isPosted();

    /**
     * Once the form is posted,
     * use the inject method to inject data in the form, creating
     * data persistency for the user.
     */
    public function inject(array $data);


    public function getModel(array $defaultValues);

    public function isValid(array $data);

    /**
     * Once the isValid method has been called,
     * call the getData method to get the data used for the form.
     *
     * They usually would be the same as the data passed to isValid,
     * but in some cases, the form will want to override them.
     *
     */
    public function getData();

}

