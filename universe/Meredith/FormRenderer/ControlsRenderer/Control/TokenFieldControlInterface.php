<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-17
 */
interface TokenFieldControlInterface extends ControlInterface
{
    /**
     * @return array of suggestions for typeahead feature
     */
    public function getSuggestions();
}