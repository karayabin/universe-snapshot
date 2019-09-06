<?php


namespace Ling\Light_Kit_Admin\Chloroform;


use Ling\Chloroform\Field\CSRFField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\Validator\CSRFValidator;

/**
 * The LightKitAdminChloroform class.
 */
class LightKitAdminChloroform extends Chloroform
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->addField(CSRFField::create("csrf_token"), [CSRFValidator::create()]);

    }


    /**
     * Returns the posted data, except for the chloroform hidden key and the csrf token.
     *
     * @return array
     */
    public function getFilteredPostedData(): array
    {
        $postedData = $this->getPostedData();
        unset($postedData['csrf_token']);
        unset($postedData['chloroform_hidden_key']);
        return $postedData;
    }
}