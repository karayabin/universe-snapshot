<?php


namespace OnTheFlyForm\DataAdaptor;


interface DataAdaptorInterface
{

    /**
     * @param array $data
     * @return array, an array of transformed data
     */
    public function transform(array $data);
}