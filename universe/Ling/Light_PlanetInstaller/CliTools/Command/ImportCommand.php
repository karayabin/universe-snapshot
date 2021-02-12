<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;


/**
 * The ImportCommand class.
 *
 */
class ImportCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * The operation mode.
     * Can be one of: import|install. Default is import.
     * @var string
     */
    protected $operationMode;

    /**
     * Builds the ImportCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->operationMode = "import";
    }


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $planetDefinition = $input->getParameter(2);

        $bernoni = $input->getOption("bernoni") ?? 'auto';
        $keepBuild = $input->hasFlag("keep-build");
        $useDebug = $input->hasFlag("d");
        $doNotUpdateLpiFile = $input->hasFlag("n");
        $force = $input->hasFlag("f");


        $updateLpiFile = false;


        $source = 'lpi';
        if (null !== $planetDefinition) {
            $source = $planetDefinition;
            $updateLpiFile = true;
        }

        $virtualBin = [];
        $this->application->updateApplicationByWishlist([
            'mode' => $this->operationMode,
            'force' => $force,
            //
            'source' => $source,
            'keepBuild' => $keepBuild,
            'useDebug' => $useDebug,
            'bernoni' => $bernoni,
        ], $virtualBin);


        if (true === $updateLpiFile && false === $doNotUpdateLpiFile) {

            $planetList = array_map(function ($v) {
                return $v . "+";
            }, $virtualBin);
            $output->write("Updating lpi file...");
            $this->application->addPlanetListToLpiFile($planetList);
            $output->write("<success>ok</success>." . PHP_EOL);
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
        $concept = LpiFormatHelper::getConceptFmt();
        $url = LpiFormatHelper::getUrlFmt();
        $ret = "With no argument, reads the <$concept>lpi.byml</$concept> file and makes sure every planet defined in it is imported (along with its dependencies, recursively) in the host app." . PHP_EOL;
        $ret .= "The <$concept>assets/map</$concept> (<$url>https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap</$url>)  are not copied." . PHP_EOL;
        return $ret;
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $concept = LpiFormatHelper::getConceptFmt();
        $url = LpiFormatHelper::getUrlFmt();
        $pmt = LpiFormatHelper::getCommandLineParameterFmt();


        $desc = <<<EEE
if defined, will <$concept>import</$concept> (<$url>https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary</$url>) 
the given planet (and its dependencies recursively), without the <$concept>assets/map</$concept>,and update the <$concept>lpi.byml</$concept> file accordingly, using a plus symbol at the end of every newly imported planet's version number.
  
<$pmt>planetDefinition</$pmt> stands for: planetDotName(:versionExpression)?

With:
- planetDotName: the <$concept>planetDotName</$concept> (<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>)
- versionExpression: the <$concept>versionExpression</$concept> defaults to <b>last</b> if not defined
EEE;


        return [
            "planetDefinition" => [
                $desc,
                false
            ],
        ];
    }


    /**
     * @overrides
     */
    public function getAliases(): array
    {
        return [
            "import" => 'lpi import',
        ];
    }


    /**
     * @overrides
     */
    public function getOptions(): array
    {
        $conceptFmt = LpiFormatHelper::getConceptFmt();

        return [
            "bernoni" => [
                'desc' => "Defines the mode to resolve <$conceptFmt>bernoni conflicts</$conceptFmt>.",
                'values' => [
                    'auto' => "This is the default value. Bernoni conflicts will be resolved using the highest version number.",
                    'manual' => "You will be prompted to choose which version to use every time a bernoni conflict occurs.",
                ],
            ],
        ];
    }


    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $concept = LpiFormatHelper::getConceptFmt();
        $pmt = LpiFormatHelper::getCommandLineParameterFmt();
        return [
            "d" => "Whether to use <b>debug</b> mode. In <b>debug</b> mode, the display is more verbose and shows the debug and trace messages.",
            "n" => "if set, doesn't update the <$concept>lpi file</$concept> when the <$pmt>planetDefinition</$pmt> parameter is defined",
            "f" => "if set, forces the reimporting of the planet, even if it's already in your app",
            "keep-build" => "if set, the <$concept>build directory</$concept> will not be automatically removed after a successful operation.",
        ];
    }


}