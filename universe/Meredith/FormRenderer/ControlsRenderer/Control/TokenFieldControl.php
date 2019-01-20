<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-17
 */
class TokenFieldControl extends Control implements TokenFieldControlInterface
{

    private $suggestions;

    public function __construct()
    {
        parent::__construct();
        $this->suggestions = [];
    }

    public function setSuggestions(array $suggestions)
    {
        $this->suggestions = $suggestions;
        return $this;
    }

    public function getSuggestions()
    {
        return $this->suggestions;
    }

}