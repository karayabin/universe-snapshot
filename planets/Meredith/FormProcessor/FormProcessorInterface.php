<?php

namespace Meredith\FormProcessor;

/*
 * LingTalfi 2015-12-21
 * 
 * 
 * Synopsis:
 * You first call the process method,
 * then you can call the getSuccessMsg and check it's value;
 * if it's null, this means that the form data are invalid.
 * In this case, you can get the error message using the getErrorMsg method.
 * 
 */
interface FormProcessorInterface
{

    /**
     *
     * @param array $data
     * @return void
     */
    public function process(array $data);

    /**
     * @return string|null
     */
    public function getSuccessMsg();

    /**
     * @return string|null
     */
    public function getErrorMsg();

}
