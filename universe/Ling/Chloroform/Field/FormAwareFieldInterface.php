<?php

namespace Ling\Chloroform\Field;


use Ling\Chloroform\Form\Chloroform;

/**
 * The FormAwareFieldInterface interface.
 *
 * When a field implements this interface, it automatically gets injected the form instance.
 *
 * This was done to help with the implementation of the password confirmation system, to create
 * a validator that is aware of another field that the one being validated.
 *
 *
 */
interface FormAwareFieldInterface
{

    /**
     * Sets the form instance.
     *
     *
     * @param Chloroform $form
     */
    public function setForm(Chloroform $form);
}