<?php


namespace Ling\Light_PrettyError\Service;


use Ling\Light\Events\LightEvent;
use Ling\Light\Exception\LightException;
use Ling\Light_PrettyError\Exception\LightPrettyErrorException;
use Ling\Light_ZephyrTemplate\Service\LightZephyrTemplateService;
use Whoops\Exception\Inspector;


/**
 * The LightPrettyErrorService class.
 */
class LightPrettyErrorService
{


    /**
     * Returns the html code for a beautiful error page showing the exception.
     * All credits goes to: https://github.com/filp/whoops
     *
     * @param \Exception $e
     * @return string
     * @throws \Exception
     */
    public function renderPage(\Exception $e)
    {

        $whoops = new \Whoops\Run;
        $inspector = new Inspector($e);
        $handler = new \Whoops\Handler\PrettyPageHandler;
        $handler->setRun($whoops);
        $handler->setException($e);
        $handler->setInspector($inspector);
        ob_start();
        $handler->handle();
        return ob_get_clean();
    }


    /**
     * This method is a callable to execute when the @page(Ling.Light.on_exception_caught event) is triggered.
     * It will basically try to return a prettier exception response (rather than the awful default debugging blank screen).
     *
     * @param LightEvent $event
     * @param string $eventName
     * @throws \Exception
     */
    public function onLightExceptionCaught(LightEvent $event, string $eventName)
    {
        $exception = $event->getVar('exception', null, true);

        $container = $event->getContainer();
        if ($container->has("zephyr_template")) {

            $errorCode = null;
            if ($exception instanceof LightException) {
                $errorCode = $exception->getLightErrorCode();
            }


            if ('404' === $errorCode) {

                /**
                 * @var $templateEngine LightZephyrTemplateService
                 */
                $templateEngine = $container->get("zephyr_template");
                $res = $templateEngine->render("templates/Ling.Light_PrettyError/error_pages/404.html", []);
                if (false !== $res) {
                    $event->setVar('httpResponse', $res);

                } else {
                    $s = "PrettyErrorInitializer: The following errors occurred: " . PHP_EOL;
                    $s .= implode(", " . PHP_EOL, $templateEngine->getErrors());
                    throw new LightPrettyErrorException($s);
                }
            }


        } else {
            throw new LightPrettyErrorException("This class only works when the \"zephyr_template\" service is available. Consider installing Light_ZephyrTemplate planet.");
        }
    }


}