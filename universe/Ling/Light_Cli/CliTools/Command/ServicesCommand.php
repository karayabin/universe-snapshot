<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;


/**
 * The ServicesCommand class.
 *
 *
 *
 */
class ServicesCommand extends LightCliDocCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        $verbose = $input->hasFlag("v");


        $services = $this->container->all();
        sort($services);
        $nbItems = count($services);
        $this->msg("<b>$nbItems</b> service(s) found:" . PHP_EOL);
        foreach ($services as $service) {
            if (true === $verbose) {
                $instance = $this->container->get($service);
                $this->msg('- <b>' . $service . '</b>: ' . $instance::class . PHP_EOL);
            } else {
                $this->msg('- <b>' . $service . '</b>' . PHP_EOL);
            }
        }
    }



    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return " displays the list of services available in the current app.";
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "v" => " verbose, whether to display the class behind the services. Note that this method will instantiate all the services in order to access the classes.
 So, depending on what the service does when it's instantiated, one might generate side effects.",
        ];
    }


}