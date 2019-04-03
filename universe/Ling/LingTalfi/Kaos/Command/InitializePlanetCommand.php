<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\Bat\FileSystemTool;
use Ling\Bat\StringTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\LingTalfi\Kaos\Util\ReadmeUtil;
use Ling\UniverseTools\PlanetTool;

/**
 * The InitializePlanetCommand class.
 *
 * This command does the following (for the given planet):
 *
 *
 * - if the current planet is not in the local server yet:
 *      - copy the current planet to the local server in /myphp/universe
 *      - replace the current planet with a symlink to the local server version
 * - create a default README.md file at the root of the planet
 * - if the -d option is set, create a DocBuilder class for the given planet in myphp/universe/Ling/LingTalfi/DocBuilder
 *
 *
 */
class InitializePlanetCommand extends KaosGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $createDocBuilder = $input->hasFlag('d');
        $success = true;

        $planetDir = $this->application->getCurrentDirectory();


        $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        if (false !== $pInfo) {

            list($galaxyName, $planetName) = $pInfo;

            H::info(H::i($indentLevel) . "Initializing planet <blue>$galaxyName/$planetName</blue>:" . PHP_EOL, $output);


            //--------------------------------------------
            // MOVING THE PLANET TO THE LOCAL SERVER
            //--------------------------------------------
            $dstDir = "/myphp/universe/$galaxyName/$planetName";

            if (false === is_dir($dstDir)) {
                H::info(H::i($indentLevel + 1) . "Moving planet to the local server...", $output);
                if (true === FileSystemTool::copyDir($planetDir, $dstDir)) {
                    $output->write('<success>ok</success>' . PHP_EOL);


                    //--------------------------------------------
                    // CREATING SYMLINK
                    //--------------------------------------------
                    FileSystemTool::remove($planetDir);
                    H::info(H::i($indentLevel + 1) . "Creating symlink <b>$planetDir</b> --> <b>$dstDir</b>...", $output);
                    if (true === symlink($dstDir, $planetDir)) {
                        $output->write('<success>ok</success>' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::warning(H::i($indentLevel + 2) . "Couldn't copy the planet from <b>$planetDir</b> to the local server." . PHP_EOL, $output);
                    }

                } else {
                    $output->write('<error>oops</error>' . PHP_EOL);
                    H::warning(H::i($indentLevel + 2) . "Couldn't copy the planet from <b>$planetDir</b> to the local server." . PHP_EOL, $output);
                }
            } else {
                H::info(H::i($indentLevel + 1) . "Planet already exists in the local server." . PHP_EOL, $output);
            }


            //--------------------------------------------
            // CREATING README.MD
            //--------------------------------------------
            $readMeDst = $planetDir . "/README.md";
            if (false === file_exists($readMeDst)) {
                H::info(H::i($indentLevel + 1) . "Creating <b>README.md</b> file...", $output);
                $readMeUtil = new ReadmeUtil();


                if ('Ling' === $galaxyName) {

                    $repoUrl = "https://github.com/lingtalfi";

                    //--------------------------------------------
                    // add docTools pages in the summary
                    //--------------------------------------------
                    $summaryLinks = "";


                    $pagesDir = $dstDir . "/personal/mydoc/pages";
                    if (is_dir($pagesDir)) {
                        $s = '';
                        $pageFiles = YorgDirScannerTool::getFilesWithExtension($pagesDir, "md", false, true, true);
                        if ($pageFiles) {
                            $s .= "- Pages" . PHP_EOL;
                            foreach ($pageFiles as $relPath) {
                                $text = StringTool::humanizeFileName(basename($relPath), true);
                                $url = "$repoUrl/$planetName/blob/master/doc/pages/$relPath";
                                $s .= "    - [$text]($url)" . PHP_EOL;
                            }
                        }
                        $summaryLinks = $s;
                    }


                    //--------------------------------------------
                    // Adding docTools examples into the summary
                    //--------------------------------------------
                    $insertDir = $dstDir . "/personal/mydoc/inserts/$galaxyName/$planetName";
                    if (is_dir($insertDir)) {

                        $allInserts = YorgDirScannerTool::getFilesWithExtension($insertDir, "md", false, true, true);
                        $allInserts = array_filter($allInserts, function ($rpath) {
                            return ('examples' === basename(dirname($rpath)));
                        });

                        // group by dirnames
                        $groups = [];
                        foreach ($allInserts as $rpath) {
                            $stripped = str_replace('/examples/', '/', $rpath);
                            $dir = dirname($stripped);
                            $file = basename($stripped);

                            $p = explode('/', $dir);
                            $last = $p[count($p) - 1];
                            if (ctype_lower(substr($last, 0, 1))) {
                                $method = array_pop($p);
                                $dir = implode('\\', $p) . ".$method";
                            } else {
                                $dir = implode('\\', $p);
                            }
                            $dir = $planetName . "\\" . $dir;
                            if (false === array_key_exists($dir, $groups)) {
                                $groups[$dir] = [];
                            }
                            $groups[$dir][] = [$file, $rpath];
                        }
                        if ($groups) {

                            $s = "- Examples" . PHP_EOL;
                            foreach ($groups as $groupName => $fileInfos) {
                                $s .= "    - $groupName" . PHP_EOL;
                                foreach ($fileInfos as $fileInfo) {
                                    list($fileName, $relPath) = $fileInfo;

                                    if (preg_match('!^([0-9]+)\.(.*)!', $fileName, $match)) {
                                        $text = $match[1] . "." . " " . StringTool::humanizeFileName($match[2], true);
                                    } else {
                                        $text = StringTool::humanizeFileName($fileName, true);
                                    }


                                    $url = "$repoUrl/$planetName/blob/master/doc/inserts/$galaxyName/$planetName/$relPath";
                                    $s .= "        - [$text]($url)" . PHP_EOL;
                                }
                            }
                            $summaryLinks .= $s;
                        }
                    }
                }


                if (true === $readMeUtil->createBasicReadmeFile($readMeDst, [
                        "galaxy" => $galaxyName,
                        "planet" => $planetName,
                        "date" => date("Y-m-d"),
                        "summaryLinks" => $summaryLinks,
                    ])) {

                    $output->write('<success>ok</success>' . PHP_EOL);


                } else {
                    $output->write('<error>oops</error>' . PHP_EOL);
                    H::error(H::i($indentLevel + 2) . "Couldn't write the <b>README.md</b> file." . PHP_EOL, $output);
                }
            } else {
                H::info(H::i($indentLevel + 1) . "<b>README.md</b> file already exists." . PHP_EOL, $output);
            }


            //--------------------------------------------
            // CREATING DOC BUILDER CLASS
            //--------------------------------------------
            if (true === $createDocBuilder) {
                $docBuilderFile = "/myphp/universe/Ling/LingTalfi/DocBuilder/$planetName/{$planetName}DocBuilder.php";
                if (false === file_exists($docBuilderFile)) {

                    H::info(H::i($indentLevel + 1) . "Creating a <b>DocBuilder</b> class in <b>$docBuilderFile</b>...", $output);

                    $docBuilderTpl = __DIR__ . "/../assets/docbuilder.tpl.php";
                    $content = file_get_contents($docBuilderTpl);
                    $content = str_replace([
                        "CliTools",
                        "2019-02-26",
                    ], [
                        $planetName,
                        date("Y-m-d"),
                    ], $content);
                    if (true === FileSystemTool::mkfile($docBuilderFile, $content)) {
                        $output->write('<success>ok</success>' . PHP_EOL);
                    } else {
                        $success = false;
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::error(H::i($indentLevel + 2) . "Couldn't create the <b>DocBuilder</b> class." . PHP_EOL, $output);
                    }
                } else {
                    H::info(H::i($indentLevel + 1) . "A <b>DocBuilder</b> class already exists." . PHP_EOL, $output);
                }
            }


            if (true === $success) {
                H::success(H::i($indentLevel) . "The planet <blue>$galaxyName/$planetName</blue> was successfully initialized in <b>$planetDir</b>." . PHP_EOL, $output);
            }


        } else {
            H::error(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>." . PHP_EOL, $output);
        }


    }


}