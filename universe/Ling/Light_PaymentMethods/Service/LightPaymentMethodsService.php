<?php


namespace Ling\Light_PaymentMethods\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_PaymentMethods\Exception\LightPaymentMethodsException;
use Ling\Light_PaymentMethods\Handler\LightPaymentMethodHandlerInterface;


/**
 * The LightPaymentMethodsService class.
 */
class LightPaymentMethodsService
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
     * See the @page(Light_PaymentMethods conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * A cache for payment method handlers.
     * It's only null if never accessed before.
     *
     * @var LightPaymentMethodHandlerInterface[]
     */
    private array|null $handlers;


    /**
     * This property holds the getCartInfoCallback for this instance.
     *
     * This callback provides the return of the getCartInfo method.
     * It receives the container as its first argument.
     *
     *
     * @var callable|null
     */
    private $getCartInfoCallback;


    /**
     * Builds the LightPaymentMethodsService instance.
     */
    public function __construct()
    {
        $this->options = [];
        $this->handlers = null;
        $this->getCartInfoCallback = null;
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
     * Returns the array of registered payment methods handler instances.
     *
     * @return LightPaymentMethodHandlerInterface[]
     */
    public function getHandlers(): array
    {
        if (null === $this->handlers) {
            $this->handlers = [];
            $handlersPath = $this->getHandlersMasterPath();
            if (true === file_exists($handlersPath)) {
                $arr = BabyYamlUtil::readFile($handlersPath);
                $handlers = $arr['handlers'] ?? [];

                foreach ($handlers as $identifier => $handler) {
                    $instance = new $handler['class'];
                    if ($instance instanceof LightServiceContainerAwareInterface) {
                        $instance->setContainer($this->container);
                    }
                    $this->handlers[$identifier] = $instance;
                }

            }

        }
        return $this->handlers;
    }

    /**
     * Sets the getCartInfoCallback.
     *
     * @param callable $getCartInfoCallback
     */
    public function setCartInfoCallback(callable $getCartInfoCallback)
    {
        $this->getCartInfoCallback = $getCartInfoCallback;
    }


    /**
     * Returns the cart info.
     * It's an array with the following structure:
     *
     *
     * - amount: float, the total amount of the cart
     * - currency: string, the currency used for the amount and all the items in the cart, it's a 4217 iso code
     * - items: array of items of the cart, each of which being an array:
     *      - reference: string, a unique string identifying the item
     *
     * @return array
     * @throws \Exception
     */
    public function getCartInfo(): array
    {

        if (null === $this->getCartInfoCallback) {
            $this->error("undefined getCartInfoCallback.");
        }
        return call_user_func($this->getCartInfoCallback, $this->container)();
    }


    /**
     * Returns the default payment method handler identifier if defined, or null otherwise.
     * @return string|null
     */
    public function getDefaultHandlerIdentifier(): string|null
    {
        return $this->options['default_handler_identifier'] ?? null;
    }


//    /**
//     * Returns the default payment method handler instance, or null if not defined.
//     *
//     * @return LightPaymentMethodHandlerInterface|null
//     */
//    public function getDefaultHandler(): LightPaymentMethodHandlerInterface|null
//    {
//        $defaultHandlerId = $this->options['default_handler_identifier'] ?? null;
//        $handlers = $this->getHandlers();
//        foreach ($handlers as $id => $h) {
//            if ($defaultHandlerId === $id) {
//                return $h;
//            }
//        }
//        return null;
//    }


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
        throw new LightPaymentMethodsException($msg);
    }


    /**
     * Returns the path to the file where all handlers are registered.
     * @return string
     */
    private function getHandlersMasterPath(): string
    {
        return $this->container->getApplicationDir() . "/config/open/Ling.Light_PaymentMethods/handlers.byml";
    }
}