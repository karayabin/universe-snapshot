<?php


namespace Ling\Light_RealGenerator\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\SmartCodeTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;
use Ling\Light_RealGenerator\Generator\FormConfigGenerator;
use Ling\Light_RealGenerator\Generator\ListConfigGenerator;

/**
 * The LightRealGeneratorService class.
 */
class LightRealGeneratorService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightRealGeneratorService instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     * Generates the configuration files for both the @page(realist) and @page(realform) plugins,
     * according to the @page(configuration block) identified by the given file and identifier.
     *
     * The default identifier defaults to "main".
     *
     *
     * @param string $file
     * @param string|null $identifier
     * @throws \Exception
     */
    public function generate(string $file, string $identifier = null)
    {
        $conf = BabyYamlUtil::readFile($file);
        if (null === $identifier) {
            $identifier = 'main';
        }


        if (array_key_exists($identifier, $conf)) {
            $genConf = $conf[$identifier];


            if (array_key_exists("list", $genConf)) {
                $listGenerator = new ListConfigGenerator();
                $listGenerator->setContainer($this->container);
                $listGenerator->generate($genConf);
            }

            if (array_key_exists("form", $genConf)) {
                $formGenerator = new FormConfigGenerator();
                $formGenerator->setContainer($this->container);
                $formGenerator->generate($genConf);
            }


            $this->onGenerateAfter($genConf);


        } else {
            $this->error("Identifier not found: $identifier, in $file.");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception with the given error message.
     *
     * @param string $msg
     * @throws LightRealGeneratorException
     */
    protected function error(string $msg)
    {
        throw new LightRealGeneratorException($msg);
    }


    /**
     * Hook called at the end of the @page(generate method).
     *
     * @param array $configBlock
     * @overrideMe
     */
    protected function onGenerateAfter(array $configBlock)
    {

    }
}