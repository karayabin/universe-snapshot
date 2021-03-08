<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper;
use Ling\UniverseTools\PlanetTool;


/**
 * The DependencyCommand class.
 *
 */
class DependencyCommand extends LightPlanetInstallerSimpleCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $planetDotName = $input->getParameter(2);
        $version = $input->getOption("version");
        $uni = $input->hasFlag("u");
        $recursive = $input->hasFlag("r");
        $invert = $input->hasFlag("i");


        if (null !== $planetDotName) {


            $appDir = $this->application->getApplicationDirectory();
            $planetDir = PlanetTool::getPlanetDirByPlanetDotName($planetDotName, $appDir);

            if (true === is_dir($planetDir)) {


//                if (true === $uni) {
//                    $this->msg("$planetDotName uni dependencies:" . PHP_EOL);
//                    $u = new  LpiUniDependenciesHelper();
//                    $deps = $u->getUniDependenciesByPlanetDir($planetDir, [
//                        "recursive" => $recursive,
//                    ]);
//                    foreach ($deps as $dep) {
//                        $this->msg("- $dep" . PHP_EOL);
//                    }
//
//                } else {


                if (false === $invert) {

                    $u = new  LpiDependenciesHelper();
                    $lastVersion = null;
                    $deps = $u->getLpiDependenciesByPlanetDir($planetDir, [
                        "recursive" => $recursive,
                        "version" => $version,
                    ], $lastVersion);


                    if (null !== $version) {
                        $this->msg("$planetDotName $version:" . PHP_EOL);
                    } else {
                        $this->msg("$planetDotName $lastVersion (last version):" . PHP_EOL);
                    }


                    foreach ($deps as $pDotName => $ver) {
                        if (true === $uni) {
                            $this->msg("- $pDotName" . PHP_EOL);
                        } else {
                            $this->msg("- $pDotName:$ver" . PHP_EOL);
                        }
                    }
                } else {
                    $uniDir = $appDir . "/universe";
                    $noLpiFiles = [];
                    if (true === is_dir($uniDir)) {
                        $depHelper = new LpiDependenciesHelper();
                        $matches = $depHelper->getSubscribersList($planetDotName, $uniDir, $noLpiFiles);



                        //--------------------------------------------
                        // DISPLAYING
                        //--------------------------------------------
                        foreach ($matches as $dotName => $versionItems) {
                            $this->msg("- $dotName (");
                            $max = 3;
                            for ($i = 1; $i <= $max; $i++) {
                                $s = '';
                                if (1 !== $i) {
                                    $s .= ", ";
                                }
                                if (count($versionItems) > 1) {
                                    $versionItem = array_pop($versionItems);
                                    list($callerVersion, $calledVersionExpr) = $versionItem;
                                    $s .= "$callerVersion -> $calledVersionExpr";
                                    $this->msg($s);
                                }
                            }

                            if (count($versionItems) > 1) {
                                $this->msg(", ...");
                            }
                            $this->msg(")" . PHP_EOL);
                        }

                        if ($noLpiFiles) {
                            $this->msg(PHP_EOL);
                            $this->msg("The following planets didn't have a lpi-deps.byml file:" . PHP_EOL);
                            foreach ($noLpiFiles as $dotName) {
                                $this->msg("- $dotName" . PHP_EOL);
                            }
                        }


                    } else {
                        $this->msgError("No universe dir found in <b>$uniDir</b>. Aborting." . PHP_EOL);
                    }
                }


//                }

            } else {
                $this->msgError("Planet dir not found: <b>$planetDir</b>. Aborting." . PHP_EOL);
            }
        } else {
            $this->msgError("planetDotName parameter missing. Aborting." . PHP_EOL);
        }
    }


    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return " displays the dependencies of the given planet. By default, the <$co>lpi-dependencies</$co>(<$url>#the-lpi-depsbyml-file</$url>) for the latest version of the planet is displayed.";
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
                " the <$co>planetDotName</$co>(<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>) ",
                true,
            ],
        ];
    }


    /**
     * @overrides
     */
    public function getOptions(): array
    {
        return [
            "version" => [
                'desc' => " the version number to filter the result with. The special keyword \"all\" will show all the versions at once.",
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
            "u" => " uni, shows the dependencies in <$co>uni style</$co>(<$url>https://github.com/lingtalfi/Uni2#dependenciesbyml</$url>) instead of the lpi style.",
            "r" => " recursive, shows the uni dependencies recursively (only works when the \"u\" flag is raised)",
            "i" => " invert, lists the planets that have a dependency to the given planet.
 Note: when this flag is on, the \"version\" option and the \"r\" and \"u\" flags are ignored.",
        ];
    }


    /**
     * @overrides
     */
    public function getAliases(): array
    {
        return [
            "deps" => "lpi deps",
        ];
    }


}