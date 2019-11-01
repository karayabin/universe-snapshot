<?php


namespace Ling\Light_UserData\Chloroform\Validator;


use Ling\Chloroform\Field\FieldInterface;
use Ling\Chloroform\Validator\AbstractValidator;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_User\LightUserInterface;
use Ling\Light_UserData\Service\LightUserDataService;

/**
 * The ValidUserDataUrlValidator class.
 *
 * Checks that the url belongs to the current user.
 *
 *
 * If the url is empty or not a string, it's ignored.
 *
 *
 *
 */
class ValidUserDataUrlValidator extends AbstractValidator
{

    /**
     * This property holds the currentUser for this instance.
     * @var LightUserInterface
     */
    protected $currentUser;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->currentUser = null;
        $this->container = null;
        $this->messagesDir = $this->getDefaultMessagesDir(__DIR__);
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (is_string($value) && !empty($value)) {


            $isValid = false;
            $components = parse_url($value);
            if (false !== $components) {

                if (
                    array_key_exists("query", $components) &&
                    array_key_exists("path", $components)
                ) {
                    $result = [];
                    parse_str($components['query'], $result);
                    if (
                        array_key_exists("file", $result) &&
                        array_key_exists("id", $result)
                    ) {
                        $id = $result['id'];
                        $userId = $this->getCurrentUser()->getIdentifier();

                        /**
                         * @var $userDataService LightUserDataService
                         */
                        $userDataService = $this->container->get("user_data");
                        $obfuscatedName = $userDataService->getUserObfuscatedDirectoryName($userId);
                        if ($id === $obfuscatedName) {
                            $isValid = true;
                        }
                    }
                }
            }

            if (false === $isValid) {
                $error = $this->getErrorMessage("main", [
                    "fieldName" => $fieldName,
                ]);
            }


            return $isValid;
        }
        return true;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the currentUser.
     *
     * @param LightUserInterface $currentUser
     * @return $this
     */
    public function setCurrentUser(LightUserInterface $currentUser): ValidUserDataUrlValidator
    {
        $this->currentUser = $currentUser;
        return $this;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return $this
     */
    public function setContainer(LightServiceContainerInterface $container): ValidUserDataUrlValidator
    {
        $this->container = $container;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the current user.
     * @return LightUserInterface
     * @throws \Exception
     */
    private function getCurrentUser(): LightUserInterface
    {
        if (null !== $this->currentUser) {
            return $this->currentUser;
        }
        return $this->container->get("user_manager")->getUser();
    }


}