<?php


namespace Ling\Light_PrettyError\Initializer;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;
use Ling\Light_PrettyError\Exception\LightPrettyErrorException;
use Ling\UniversalTemplateEngine\UniversalTemplateEngineInterface;


/**
 * The PrettyErrorInitializer class.
 */
class PrettyErrorInitializer implements LightInitializerInterface
{


    /**
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        $light->registerErrorHandler(function ($errorType, \Exception $e, &$response) use ($light) {

            $container = $light->getContainer();
            if ($container->has("template")) {
                if ('404' === $errorType) {

                    /**
                     * @var $templateEngine UniversalTemplateEngineInterface
                     */
                    $templateEngine = $container->get("template");
                    $res = $templateEngine->render("templates/Light_PrettyError/error_pages/404.html", []);
                    if (false !== $res) {
                        $response = $res;
                    } else {
                        $s = "PrettyErrorInitializer: The following errors occurred: " . PHP_EOL;
                        $s .= implode(", " . PHP_EOL, $templateEngine->getErrors());
                        throw new LightPrettyErrorException($s);
                    }
                }
            } else {
                throw new LightPrettyErrorException("This class only works when the \"template\" service is available. Consider installing Light_ZephyrTemplate planet.");
            }
        });

    }


}