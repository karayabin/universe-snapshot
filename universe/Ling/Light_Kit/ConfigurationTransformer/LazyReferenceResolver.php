<?php


namespace Ling\Light_Kit\ConfigurationTransformer;


use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LazyReferenceResolver class.
 *
 * Note: this class is old and note used anymore.
 * It has been replaced entirely with the LightExecuteNotationResolver, which can do more and is more unified with the light framework.
 *
 * I keep the code below just for a reference for myself, and as an example of what transformers can do, but it should probably be removed.
 *
 */
class LazyReferenceResolver implements ConfigurationTransformerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the resolvers for this instance.
     * Each resolver is a callable.
     *
     *
     * @var array
     */
    protected $resolvers;

    /**
     * This property holds the strictMde for this instance.
     * See the resolve method for more details.
     * @var bool = false
     */
    protected $strictMode;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LazyReferenceResolver instance.
     */
    public function __construct()
    {
        $this->resolvers = [];
        $this->strictMode = false;
        $this->container = null;
    }


    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Sets the strictMde.
     *
     * @param bool $strictMode
     */
    public function setStrictMode(bool $strictMode)
    {
        $this->strictMode = $strictMode;
    }

    /**
     * Sets the resolvers.
     *
     * @param array $resolvers
     */
    public function setResolvers(array $resolvers)
    {
        $this->resolvers = $resolvers;
    }


    /**
     * Registers the resolver and assigns it to the given token.
     * Note: only one resolver max can be assigned to a given token.
     *
     * @param string $token
     * @param callable $resolver
     */
    public function registerResolver(string $token, callable $resolver)
    {
        $this->resolvers[$token] = $resolver;
    }




    //--------------------------------------------
    // ConfigurationTransformerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function transform(array &$conf)
    {


        if ($this->resolvers) {


            // example: ::(whatever)::
            $regex = '!\(::([^:]*)::\)(.*)!';

            BDotTool::walk($conf, function (&$v, $key, $dotPath) use (&$conf, $regex) {

                if (is_string($v)) {
                    if (0 === strpos($v, '(::')) {
                        if (preg_match($regex, $v, $match)) {

                            $token = $match[1];
                            $whatever = $match[2];

                            if (array_key_exists($token, $this->resolvers)) {
                                $resolver = $this->resolvers[$token];
                                $replace = call_user_func($resolver, $whatever, $this->container);
                                BDotTool::setDotValue($dotPath, $replace, $conf);
                            }
                        }
                    }
                }
            });
        }
    }
}