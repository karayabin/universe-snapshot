<?php


namespace Ling\Light_Kit_Admin_Kit_Editor\Controller\Editor;

use Ling\Bat\ClassTool;
use Ling\Bat\StringTool;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_AjaxHandler\Exception\ClientErrorException;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_Kit_Admin\Service\LightKitAdminService;
use Ling\Light_Kit_Admin_Kit_Editor\Service\LightKitAdminKitEditorService;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;
use Ling\UniverseTools\PlanetTool;

/**
 * The LkeEditorController class.
 */
class LkeEditorController extends AdminPageController
{


    /**
     * Renders the lke editor page and returns the result.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        /**
         * @var $ke LightKitEditorService
         */
        $ke = $this->getContainer()->get("kit_editor");
        $websites = $ke->getWebsites();


        return $this->renderAdminPage('Ling.Light_Kit_Admin_Kit_Editor/lke_editor', [
            "widgetVariables" => [
                'body.w1' => [
                    "websites" => $websites,
                ],
            ],
        ]);
    }


    /**
     * Ajax service to remove a website.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function removeWebsite(HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->alcpResponse(function () use ($request) {
            $identifier = $request->getPostValue("identifier");
            $this->executeHandlerMethodByWebsiteIdentifier($identifier, "removeWebsite");
        });
    }


    /**
     * Updates the kit store token.
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     * This is a @page(alcp service).
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     * @throws \Exception
     */
    public function updateKitStoreToken(HttpRequestInterface $request): HttpJsonResponse
    {

        $csrf = $request->getPostValue("csrf", false);
        $token = $request->getPostValue("token", false);
        $error = null;

        if (null !== $csrf) {
            if (null !== $token) {
                /**
                 * @var $_cs LightCsrfSessionService
                 */
                $_cs = $this->getContainer()->get("csrf_session");
                if (true === $_cs->isValid($csrf)) {


                    /**
                     * @var $_ka LightKitAdminService
                     */
                    $_ka = $this->getContainer()->get("kit_admin");

                    $user = $_ka->getValidLightKitAdminUser();
                    if (false !== $user) {


                        $extra = $user->getExtra();
                        $extra[LightKitAdminKitEditorService::KIT_STORE_TOKEN_KEY] = $token;
                        $_ka->updateLightKitAdminUser($user, [
                            "extra" => $extra,
                        ]);

                    } else {
                        $error = "invalid light user.";
                    }
                } else {
                    $error = "invalid csrf token.";
                }
            } else {
                $error = "token missing.";
            }
        } else {
            $error = "csrf token missing.";
        }

        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,
            ];
        } else {
            $response = [
                "type" => "success",
            ];
        }
        return HttpJsonResponse::create($response);
    }


    /**
     * Ajax service to add a website.
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function addWebsite(HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->alcpResponse(function () use ($request) {
            $formValues = $request->getPostValue("data");
            if (true === array_key_exists("create_technique", $formValues)) {
                $createTechnique = $formValues['create_technique'];
                switch ($createTechnique) {
                    case "scratch":

                        $label = $formValues['label'] ?? "";
                        $identifier = $formValues['identifier'] ?? "";


                        if (true === empty($label)) {
                            $this->clientError("The \"label\" cannot be empty. Please try again.");
                        }

                        if (true === empty($identifier)) {
                            $this->clientError("The \"identifier\" cannot be empty. Please try again.");
                        }


                        $website = [
                            "identifier" => $identifier,
                            "provider" => "Ling.Light_Kit_Admin_Kit_Editor", // or should the user be able to customize it?
                            "engine" => "db",
                            "rootDir" => "",
                            "label" => $label,
                        ];


                        try {
                            $this->getKitEditorService()->registerWebsite($website, [
                                    "ignoreDuplicate" => false,
                                ]
                            );
                        } catch (\Exception $e) {
                            $this->handleHandyException($e);
                        }
                        break;
                    case "duplicate":

                        $identifier = $formValues['website_identifier'] ?? "";


                        $ke = $this->getKitEditorService();
                        $websites = $ke->getWebsites();
                        $found = false;
                        foreach ($websites as $website) {
                            if ($identifier === $website['identifier']) {
                                $found = true;
                                break;
                            }
                        }

                        if (true === $found) {

                            $label = $website['label'];


                            $newIdentifier = StringTool::getUniqueDuplicatedName($identifier, function ($id) use ($websites) {
                                foreach ($websites as $website) {
                                    if ($id === $website['identifier']) {
                                        return true;
                                    }
                                }
                                return false;
                            });

                            $newLabel = StringTool::getUniqueDuplicatedName($label, function ($id) use ($websites) {
                                foreach ($websites as $website) {
                                    if ($id === $website['label']) {
                                        return true;
                                    }
                                }
                                return false;
                            });

                            $website['identifier'] = $newIdentifier;
                            $website['label'] = $newLabel;

                            try {
                                $this->getKitEditorService()->registerWebsite($website, [
                                        "ignoreDuplicate" => false,
                                    ]
                                );
                            } catch (\Exception $e) {
                                $this->handleHandyException($e);
                            }


                        } else {
                            $this->clientError("Website not found with identifier: $identifier.");
                        }


                        break;
                    default:
                        $this->clientError("Unknown technique: $createTechnique. Aborting.");
                        break;
                }


            } else {
                $this->clientError("Missing create_technique property. Aborting.");
            }


        });


    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Executes a method of the lke handler corresponding to the website which identifier is given.
     *
     * Throws exception when something wrong occurs.
     *
     * Available options are:
     *
     * -
     *
     *
     * @param string $identifier
     * @param string $method
     * @param array $options
     * @return mixed
     * @throws \Exception
     */
    private function executeHandlerMethodByWebsiteIdentifier(string $identifier, string $method, array $options = []): mixed
    {
        $ke = $this->getKitEditorService();
        $website = $ke->getWebsiteByIdentifier($identifier);
        if (true === array_key_exists("provider", $website)) {
            $provider = $website['provider'];
            list($galaxy, $planet) = PlanetTool::extractPlanetDotName($provider);
            $tightName = PlanetTool::getTightPlanetName($planet);
            $handler = implode('\\', [
                $galaxy,
                $planet,
                'Light_Kit_Editor',
                $tightName . "LkeHandler",
            ]);

            if (true === ClassTool::isLoaded($handler)) {
                $inst = new $handler();
                if (true === $inst instanceof LightKitEditorHandlerInterface) {

                    switch ($method) {
                        case "removeWebsite":
                            $inst->removeWebsite($identifier);
                            break;
                        default:
                            $this->error("Unknown method $method.");
                            break;
                    }
                } else {
                    $this->error("Handler instance does not implement LightKitEditorHandlerInterface ($handler).");
                }
            } else {
                $this->error("Handler class not found: $handler.");
            }
        } else {
            $this->error("Provider not found with website identifier: $identifier.");
        }
    }


    /**
     * Throws a ClientErrorException exception.
     *
     * @param string $errorMessage
     * @return void
     */
    private function clientError(string $errorMessage): void
    {
        throw new ClientErrorException($errorMessage);
    }


    /**
     * Returns the kit editor service instance.
     * @return LightKitEditorService
     */
    private function getKitEditorService(): LightKitEditorService
    {
        return $this->getContainer()->get("kit_editor");
    }


    /**
     * Handles the given @page(handy exception).
     *
     * @param \Exception $e
     * @throws ClientErrorException
     */
    private function handleHandyException(\Exception $e)
    {
        if (2 === $e->getCode()) {
            $this->clientError($e->getMessage());
        } else {
            throw $e;
        }
    }


}