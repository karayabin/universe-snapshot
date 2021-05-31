<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PlanetInstaller\Util\UninstallUtil;


/**
 * The UninstallCommand class.
 *
 */
class UninstallCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $planetDotName = $input->getParameter(2);
        $appDir = $input->getOption("app", getcwd());

        if (null === $planetDotName) {
            $output->write("<error>The planetDotName parameter wasn't specified. Try again.</error>" . PHP_EOL);
            return 1;
        }


        //--------------------------------------------
        // UNINSTALL
        //--------------------------------------------
        $util = new UninstallUtil();
        $util->setOutput($output);
        $util->setContainer($this->container);
        $util->uninstall($planetDotName, [
            'app' => $appDir,
        ]);



        return 0;
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
        return "
 <$co>Uninstalls</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#uninstall-algorithm</$url>) a planet from your app.
 ";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "planetDotName" => [
                " the <$co>planetDotName</$co>(<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) of the planet to uninstall.",
                true,
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getOptions(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "app" => [
                'desc' => " string. The path of the application where your planet is located. By default, the current working directory (pwd) is assumed.",
                'values' => [
                ],
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "uninstall" => "lpi uninstall",
        ];
    }


}