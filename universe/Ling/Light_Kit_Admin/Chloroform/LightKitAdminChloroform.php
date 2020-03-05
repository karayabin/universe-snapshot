<?php


namespace Ling\Light_Kit_Admin\Chloroform;


use Ling\Chloroform\Form\Chloroform;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_CsrfSession\Chloroform\Field\LightCsrfSessionField;
use Ling\Light_CsrfSession\Chloroform\Validator\LightCsrfSessionValidator;


/**
 * The LightKitAdminChloroform class.
 */
class LightKitAdminChloroform extends Chloroform
{


    /**
     * Prepares this instance.
     * This method should be called just after the __construct method.
     *
     *
     * @param LightServiceContainerInterface $container
     * @throws \Exception
     *
     */
    public function prepare(LightServiceContainerInterface $container)
    {
        $this->addField(
            LightCsrfSessionField::create("csrf_token")->setContainer($container)->setHasVeryImportantData(false),
            [LightCsrfSessionValidator::create()->setContainer($container)]
        );
    }


    /**
     * Returns the posted data, except for the chloroform hidden key and the csrf token.
     *
     * @return array
     */
//    public function getFilteredPostedData(): array
//    {
//        $postedData = $this->getPostedData();
//        unset($postedData['csrf_token']);
//        unset($postedData['chloroform_hidden_key']);
//        return $postedData;
//    }
}