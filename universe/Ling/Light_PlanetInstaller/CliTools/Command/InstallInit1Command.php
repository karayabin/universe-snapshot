<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ClassTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit1HookInterface;
use Ling\UniverseTools\AssetsMapTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The InstallInit1Command class.
 *
 */
class InstallInit1Command extends InstallCommand
{


    /**
     * Executes the init 1 phase of the install procedure.
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * If an exception is thrown during this process, we catch it and write it at the root of the session dir,
     * in file named:
     *
     * - init1.error.txt
     *
     * If such an error is written, this method return the code 33 (otherwise if no problem it returns 0).
     *
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Exception
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        return $this->processInitPhase($input, $output, 1);
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
 This is not meant to be used by you directly (it's used internally by the <b>install</b> command). Here is its documentation nonetheless.
 This command triggers the <$co>init 1 phase of the install procedure</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#init-1</$url>).
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
            "sessionDir" => [
                " the session directory to use.",
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
                'desc' => " string. The application directory. Defaults to the current working directory.",
                'values' => [
                ],
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "d" => " if set, enables the debug mode, in which the output is a bit more verbose.
 
 ",
        ];
    }

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        return [];
    }



}