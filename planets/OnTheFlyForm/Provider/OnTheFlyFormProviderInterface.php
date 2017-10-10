<?php


namespace OnTheFlyForm\Provider;


use OnTheFlyForm\OnTheFlyFormInterface;

interface OnTheFlyFormProviderInterface
{


    /**
     * Returns an instance of a OnTheFlyFormInterface
     *
     * @return OnTheFlyFormInterface
     */
    public function getForm($namespace, $formName);

}