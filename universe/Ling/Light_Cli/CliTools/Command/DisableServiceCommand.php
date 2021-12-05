<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\Helper\LightServiceHelper;
use Ling\Light_Cli\Helper\LightCliFormatHelper;


/**
 * The DisableServiceCommand class.
 *
 *
 *
 */
class DisableServiceCommand extends LightCliDocCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        $retCode = 0;

        $planetDotName = $input->getParameter(2);
        if (null === $planetDotName) {
            $output->write("<error>planetDotName parameter missing.</error>" . PHP_EOL);
            goto end;
        }


        $appDir = $this->application->getCurrentDirectory();
        $code = LightServiceHelper::disableServiceByPlanetDotName($appDir, $planetDotName);
        if (1 === $code) {
            $this->successMsg("The service for planet <b>$planetDotName</b> has been successfully disabled." . PHP_EOL);
        } else {
            $this->infoMsg("The service for planet <b>$planetDotName</b> doesn't exist, skipping." . PHP_EOL);
        }


        end:
        return $retCode;
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
        return " disables the service which <$co>planet dot name</$co> is given.";
    }

}