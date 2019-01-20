<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2015-12-31
 *
 */
interface InputControlInterface extends ControlInterface
{

    /**
     *
     * An indication on how to render the control.
     * (Not necessarily the html attribute type)
     * Suggestions:
     *
     * - text
     * - color
     * - email
     * - password
     * - hidden
     *
     */
    public function getType();
}