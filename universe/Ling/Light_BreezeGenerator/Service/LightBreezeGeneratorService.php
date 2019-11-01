<?php


namespace Ling\Light_BreezeGenerator\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_BreezeGenerator\Generator\BreezeGeneratorInterface;

/**
 * The LightBreezeGeneratorService class.
 */
class LightBreezeGeneratorService
{

    /**
     * This property holds the generators for this instance.
     * It's an array of generator style => BreezeGeneratorInterface
     * @var BreezeGeneratorInterface[]
     */
    protected $generators;

    /**
     * This property holds the conf for this instance.
     * @var array
     */
    protected $conf;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightBreezeGeneratorService instance.
     */
    public function __construct()
    {
        $this->generators = [];
        $this->conf = [];
        $this->container = null;
    }

    /**
     *
     * Calls a generator and uses it to generate some php classes.
     *
     * @param string $style
     */
    public function generate(string $style)
    {
        $conf = $this->conf[$style];
        $class = $conf['class'];
        $genConf = $conf['conf'];
        /**
         * @var $generator BreezeGeneratorInterface
         */
        $generator = new $class();
        if ($generator instanceof LightServiceContainerAwareInterface) {
            $generator->setContainer($this->container);
        }
        $generator->generate($genConf);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the conf.
     *
     * @param array $conf
     */
    public function setConf(array $conf)
    {
        $this->conf = $conf;
    }


    /**
     * Adds a configuration entry referenced by the given key, and which content is defined in the given @page(babyYaml) file.
     *
     *
     * @param string $key
     * @param string $file
     */
    public function addConfigurationEntryByFile(string $key, string $file)
    {
        $this->conf[$key] = BabyYamlUtil::readFile($file);
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
}