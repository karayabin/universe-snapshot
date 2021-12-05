<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\Helper\LightServiceHelper;
use Ling\Light_Cli\Helper\LightCliFormatHelper;


/**
 * The EnableServiceCommand class.
 *
 *
 *
 */
class EnableServiceCommand extends LightCliDocCommand
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
        $code = LightServiceHelper::enableServiceByPlanetDotName($appDir, $planetDotName);
        if (1 === $code) {
            $this->successMsg("The service for planet <b>$planetDotName</b> has been successfully enabled." . PHP_EOL);
        } else {
            $this->infoMsg("No disabled service found for planet <b>$planetDotName</b>, skipping." . PHP_EOL);
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
        return " enables the service which <$co>planet dot name</$co> is given.";
    }

}