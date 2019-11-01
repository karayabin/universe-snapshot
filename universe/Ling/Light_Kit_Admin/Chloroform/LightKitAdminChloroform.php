<?php


namespace Ling\Light_Kit_Admin\Chloroform;


use Ling\Chloroform\Field\CSRFField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Chloroform\Validator\CSRFValidator;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Csrf\Service\LightCsrfService;

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

        /**
         * @var $csrf LightCsrfService
         */
        $csrf = $container->get('csrf');
        $this->addField(CSRFField::create("csrf_token")->setCsrfProtector($csrf)->setHasVeryImportantData(false), [CSRFValidator::create()->setCsrfProtector($csrf)]);
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