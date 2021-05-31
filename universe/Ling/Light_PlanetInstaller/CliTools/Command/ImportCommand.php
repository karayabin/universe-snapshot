<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Util\ImportUtil;


/**
 * The ImportCommand class.
 *
 */
class ImportCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * Builds the ImportCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {
        $this->doTheImport($input, $output);
        return 0;
    }


    /**
     * Executes the import algorithm, and returns the "session dir" path.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string|false
     */
    protected function doTheImport(InputInterface $input, OutputInterface $output): string|false
    {

        if (true === $this->checkInsideAppDir($input, $output)) {


            $planetDotName = $input->getParameter(2);
            $versionNumber = $input->getParameter(3);

            $appPath = $input->getOption("app");
            $crm = $input->getOption("crm");
            $tim = $input->getOption("tim");

            $useDebug = $input->hasFlag("d");
            $noSymlinks = $input->hasFlag("no-symlinks");
            $noDeps = $input->hasFlag("no-deps");
            $test = $input->hasFlag("test");
            $force = $input->hasFlag("f");
            $testBuildDir = $input->hasFlag("test-build-dir");


            $possibleCrmValues = [
                "ask",
                "abort",
                "keep",
                "replace",
                "latest",
                "earliest",
            ];
            if (null !== $crm && false === in_array($crm, $possibleCrmValues)) {
                $output->write("<error>Invalid crm value: $crm. Possible values are: " . implode(", ", $possibleCrmValues) . ". Try again.</error>" . PHP_EOL);
                return 1;
            }


//            $theoreticalImportMapPath = LpiHelper::getSelfTmpDir() . "/theoretical_maps/" . date('Y-m-d--H-i-s') . ".byml";


            $importUtil = new ImportUtil();
            $importUtil->setOutput($output);

            if (true === $useDebug) {
                $importUtil->setDebug(true);
            }
            return $importUtil->import($planetDotName, [
                "version" => $versionNumber,
                "app" => $appPath,
                "crm" => $crm,
                "tim" => $tim,
                "sym" => !$noSymlinks,
                "deps" => !$noDeps,
                "test" => $test,
                "testBuildDir" => $testBuildDir,
                "force" => $force,
            ]);

        } else {
            // output already handled by the checkInsideAppDir method, nothing to do.
            exit(1);
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
        return "
 <$co>Imports</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-algorithm</$url>) a planet in your application.
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
                " the <$co>planetDotName</$co>(<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) of the planet to import.",
                true,
            ],
            "version" => [
                " the version of the planet to import. If null (by default), the planet will be imported in its latest version (this is called <$co>uni style mode</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#uni-style-vs-versioned-style</$url>))
 ",
                false,
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
                'desc' => " string. The path to the app in which to import the planet. By default, the current working directory (pwd) is assumed.",
                'values' => [
                ],
            ],
            "crm" => [
                'desc' => " string=latest. The <$co>application conflict resolution mode</$co>(<$url>application-conflict-resolution-mode</$url>). The possible values are:
 ",
                'values' => [
                    'ask' => " ask the user what to do",
                    'abort' => " abort",
                    'keep' => " keep the planet already existing in the app",
                    'replace' => " replace the planet existing in the app with the upcoming planet",
                    'latest' => " imports the planet only if its version number is higher than the version number of the planet existing in the app ",
                    'earliest' => " imports the planet only if its version number is lower than the version number of the planet existing in the app",
                ],
            ],
            "tim" => [
                'desc' => " string. The path to a file containing the <$co>theoretical import map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map</$url>) to use. If set, this will bypass the planetDotName argument passed to this command,
 and the planets imported will be the ones defined in the <b>theoretical import map</b>. 
",
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
            "d" => " if set, enables the debug mode, in which output is a bit more verbose",
            "no-symlinks" => " if set, the import command will not try to use symlinks to import your planet. See the <$co>symlinks workflow discussion</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#alternate-universe-and-symlink-speed-up-your-workflow</$url>) for more information. ",
            "no-deps" => " if set, the import command will only import the given planet, and will not try to import its dependencies (if any). ",
            "test" => " if set, the import command will stop after creating and displaying the <$co>concrete import map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map</$url>). In other words, nothing will be actually imported, but you will see the list of 
 what would have been imported if you didn't add the test flag. ",
            "f" => " if set, forces the reimporting of the planet, even if it's already in your app",
            "test-build-dir" => " if set, the import command will stop after creating the build dir. In other words, nothing will be actually imported, but you will not only have the <$co>concrete import map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map</$url>) created,
 but also the <b>build dir</b>. See the <$co>import algorithm</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-algorithm</$url>) section for more info about the <b>build dir</b>.",
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
            "import" => "lpi import",
        ];
    }


}