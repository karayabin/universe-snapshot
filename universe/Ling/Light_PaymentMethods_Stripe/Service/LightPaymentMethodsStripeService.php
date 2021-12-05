<?php


namespace Ling\Light_PaymentMethods_Stripe\Service;


use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ControllerHub\Helper\LightControllerHubHelper;
use Ling\Light_PaymentMethods_Stripe\Exception\LightPaymentMethodsStripeException;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;


/**
 * The LightPaymentMethodsStripeService class.
 */
class LightPaymentMethodsStripeService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_PaymentMethods_Stripe conception notes) for more details.
     *
     *
     * @var array
     */
    protected array $options;


    /**
     * Builds the LightPaymentMethodsStripeService instance.
     */
    public function __construct()
    {
        $this->options = [];
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Returns the options of this instance.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }


    /**
     * Returns the option value corresponding to the given key.
     * If the option is not found, the return depends on the throwEx flag:
     *
     * - if set to true, an exception is thrown
     * - if set to false, the default value is returned
     *
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     * @throws \Exception
     */
    public function getOption(string $key, $default = null, bool $throwEx = false)
    {
        $found = false;
        $value = BDotTool::getDotValue($key, $this->options, $default, $found);

        if (false !== $found) {
            return $value;
        }
        if (true === $throwEx) {
            $this->error("Undefined option: $key.");
        }
        return $default;
    }

    /**
     * Returns the key which type is given.
     *
     * The type can be one of:
     * - public
     * - secret
     *
     *
     *
     * @param string $type
     * @return string
     * @throws \Exception
     */
    public function getApiKey(string $type): string
    {
        $env = $this->getOption("env");
        return $this->getOption("keys.$env.$type", null, true);
    }


    /**
     * Returns a link to our Api controller.
     *
     * Available options are:
     * - escapeSlashes: bool=true, whether to escape the backslashes of the controller name.
     *      We do this to create a js ready string.
     *
     *
     *
     * @param string $action
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function getAlcpLink(string $action, array $options = []): string
    {

        $escapeSlashes = $options['escapeSlashes'] ?? true;

        /**
         * @var $_rr LightReverseRouterService
         */
        $_rr = $this->container->get("reverse_router");
        $controller = "Ling\Light_PaymentMethods_Stripe\Controller\LightPaymentMethodsStripeApiController";
        if (true === $escapeSlashes) {
            $controller = str_replace('\\', '\\\\', $controller);
        }


        $urlParams = [
            "execute" => $controller . "->execute",
            "action" => $action,
        ];
        return $_rr->getUrl(LightControllerHubHelper::getRouteName(), $urlParams, false);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightPaymentMethodsStripeException($msg);
    }

}