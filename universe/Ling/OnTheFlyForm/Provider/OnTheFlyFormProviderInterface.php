<?php


namespace Ling\OnTheFlyForm\Provider;


use Ling\OnTheFlyForm\OnTheFlyFormInterface;

interface OnTheFlyFormProviderInterface
{


    /**
     * Returns an instance of a OnTheFlyFormInterface
     *
     * @return OnTheFlyFormInterface
     */
    public function getForm($namespace, $formName);

}