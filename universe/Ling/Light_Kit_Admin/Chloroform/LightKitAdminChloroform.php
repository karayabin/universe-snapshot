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


}