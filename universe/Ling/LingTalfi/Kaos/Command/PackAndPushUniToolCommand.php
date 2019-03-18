<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Application\UniToolApplication;
use Ling\Uni2\Util\DependencyMasterBuilderUtil;
use Ling\Uni2\Util\DependencyMasterDiffUtil;
use Ling\UniverseTools\MetaInfoTool;

/**
 * The PackAndPushUniToolCommand class.
 *
 * This command does the following:
 *
 * - It builds the dependency master by parsing all planets in the local server (/myphp/universe).
 *          The dependency master file is first written at the Uni2 planet root.
 * - It rebuilds the universe-meta.byml file and also put it at the root of the Uni2 planet.
 * - Packs the uni directory of the universe-naive-importer planet (using the private:pack command of the uni tool).
 * - Copy the dependency master and universe meta files to the universe-naive-importer root.
 * - Updates the version in the universe-naive-importer's meta-info.byml.
 * - Updates the Uni2/info/uni-tool-info.byml information.
 * - Updates the universe-naive-importer README.md History Log section.
 * - Pushes the universe-naive-importer to github.com.
 *
 *
 */
class PackAndPushUniToolCommand extends KaosGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        H::info(H::i($indentLevel) . "Packing and Pushing the <b>uni-tool</b>:" . PHP_EOL, $output);


        //--------------------------------------------
        // DEPENDENCY MASTER
        //--------------------------------------------
        $universeDir = "/myphp/universe";
        $dependencyMasterFile = $universeDir . "/Ling/Uni2/dependency-master.byml";
        H::info(H::i($indentLevel + 1) . "Building the <b>dependency-master.byml</b> file in <b>$dependencyMasterFile</b>...", $output);
        $masterUtil = new DependencyMasterBuilderUtil();
        $errors = [];
        $masterUtil->createDependencyMasterByUniverseDir($universeDir, $dependencyMasterFile, $errors);
        $output->write('<success>ok</success>' . PHP_EOL);

        if ($errors) {
            H::warning(H::i($indentLevel + 2) . "The following warnings occurred:" . PHP_EOL, $output);
            foreach ($errors as $error) {
                H::warning(H::i($indentLevel + 3) . $error . PHP_EOL, $output);
            }

        }


        //--------------------------------------------
        // UNIVERSE-META.BYML
        //--------------------------------------------
        /**
         * As for now, there is no other input that mine.
         * The project is to create a website form through which other users
         * could post their planets.
         * When this system is in place, this part of the code will need to be refactored.
         */
        $universeMetaFile = $universeDir . "/Ling/Uni2/universe-meta.byml";
        H::info(H::i($indentLevel + 1) . "Building the <b>universe-meta.byml</b> file in <b>$universeMetaFile</b>...", $output);

        $universeMetaString = <<<EEE
# The importers section uses the sic notation
# https://github.com/lingtalfi/NotationFan/blob/master/sic.md
importers:
    Ling:
        instance: Ling\Uni2\DependencySystemImporter\GitGalaxyDependencySystemImporter
        methods:
            setBaseRepoName:
                - lingtalfi
    git:
        instance: Ling\Uni2\DependencySystemImporter\GitRepoDependencySystemImporter

EEE;
        if (true === FileSystemTool::mkfile($universeMetaFile, $universeMetaString)) {
            $output->write('<success>ok</success>' . PHP_EOL);


            //--------------------------------------------
            // REPACK UNI TOOL
            //--------------------------------------------
            $naiveImporterDir = "/myphp/universe-naive-importer";
            $uniToolUniDir = $naiveImporterDir . "/uni";
            H::info(H::i($indentLevel + 1) . "Packing the uni tool to <b>$uniToolUniDir</b>:" . PHP_EOL, $output);
            $application = new UniToolApplication();
            $myInput = new ArrayInput();
            $myInput->setItems([
                ":private:pack" => true,
                "-f" => true,
                "path" => $uniToolUniDir,
                "indent" => $indentLevel + 2,
            ]);
            $application->run($myInput, $output);


            H::success(H::i($indentLevel + 1) . "The uni-tool was packed successfully to <b>$uniToolUniDir</b>." . PHP_EOL, $output);


            //--------------------------------------------
            // COPYING DEPENDENCY MASTER AND UNIVERSE META TO UNI TOOL
            //--------------------------------------------
            $uni2Master = $dependencyMasterFile;
            $uni2UniverseMeta = $universeMetaFile;
            $uniToolMaster = $naiveImporterDir . "/dependency-master.byml";
            $uniToolUniverseMeta = $naiveImporterDir . "/universe-meta.byml";
            $oldMasterConf = BabyYamlUtil::readFile($uniToolMaster);
            $newMasterConf = BabyYamlUtil::readFile($uni2Master);

            H::info(H::i($indentLevel + 1) . "Copying <b>$uni2Master</b> to <b>$uniToolMaster</b>...", $output);
            if (true === FileSystemTool::copyFile($uni2Master, $uniToolMaster)) {
                $output->write('<success>ok</success>' . PHP_EOL);


                H::info(H::i($indentLevel + 1) . "Copying <b>$uni2UniverseMeta</b> to <b>$uniToolUniverseMeta</b>...", $output);
                if (true === FileSystemTool::copyFile($uni2UniverseMeta, $uniToolUniverseMeta)) {
                    $output->write('<success>ok</success>' . PHP_EOL);


                    //--------------------------------------------
                    // UPDATING THE VERSIONS
                    //--------------------------------------------
                    $uniToolMeta = MetaInfoTool::parseInfo($naiveImporterDir);
                    $currentUniToolVersion = $uniToolMeta['version'] ?? "0.0.0";
                    $p = explode('.', $currentUniToolVersion);
                    $last = array_pop($p);
                    $last++;
                    $newUniToolVersion = implode('.', $p) . '.' . $last;
                    H::info(H::i($indentLevel + 1) . "Updating version in <b>$naiveImporterDir/meta-info.byml</b> ($currentUniToolVersion-->$newUniToolVersion)...", $output);

                    $uniToolMeta['version'] = $newUniToolVersion;
                    MetaInfoTool::writeInfo($naiveImporterDir, $uniToolMeta);
                    $output->write('<success>ok</success>' . PHP_EOL);


                    $uni2InfoFile = $universeDir . "/Ling/Uni2/info/uni-tool-info.byml";
                    H::info(H::i($indentLevel + 1) . "Updating Uni2 info in <b>$uni2InfoFile</b>...", $output);

                    $newInfo = [
                        "last_update" => date("Y-m-d H:i:s"),
                        "local_version" => $newUniToolVersion,
                    ];
                    BabyYamlUtil::writeFile($newInfo, $uni2InfoFile);
                    $output->write('<success>ok</success>' . PHP_EOL);


                    H::info(H::i($indentLevel + 1) . "Updating <b>History Log</b> section in the <b>README.md</b> of the uni-tool...", $output);

                    $differ = new DependencyMasterDiffUtil();
                    $versionDiff = $differ->versionDiffByConf($oldMasterConf, $newMasterConf);
                    $commitLines = [];
                    if ($versionDiff) {
                        foreach ($versionDiff as $item) {
                            $planet = $item['planet'];
                            $sPlanet = $planet;
                            $p = explode("/", $planet);
                            if (2 === count($p)) {
                                list($galaxy, $planet) = $p;
                                if ('Ling' === $galaxy) {
                                    /**
                                     * boo, 0/10
                                     */
                                    $link = "https://github.com/lingtalfi/$planet";
                                    $sPlanet = '[' . $item['planet'] . '](' . $link . ')';
                                }
                            }

                            $commitLines[] = $sPlanet . " " . $item['old_version'] . " --> " . $item['new_version'];
                        }
                    } else {
                        $commitLines[] = "universe minor increment";
                    }

                    $s = '- ' . $newUniToolVersion . ' -- ' . date('Y-m-d') . PHP_EOL . PHP_EOL;
                    foreach ($commitLines as $line) {
                        $s .= '    - ' . $line . PHP_EOL;
                    }

//                        $s .= PHP_EOL . PHP_EOL;


                    $readMeFile = $naiveImporterDir . "/README.md";
                    $readMeContent = file_get_contents($readMeFile);
                    $readMeContent = str_replace('**&nbsp;**', '**&nbsp;**' . PHP_EOL . PHP_EOL . $s, $readMeContent);
                    FileSystemTool::mkfile($readMeFile, $readMeContent);

                    $output->write('<success>ok</success>' . PHP_EOL);


                    H::info(H::i($indentLevel + 1) . "Pushing uni-tool to github.com." . PHP_EOL, $output);
                    /**
                     * Note: I'm using git shortcut commands:
                     * https://github.com/lingtalfi/server-notes/blob/master/doc/my-git-local-flow.md
                     */
                    $commitText = array_shift($commitLines);
                    passthru("cd \"$naiveImporterDir\"; git snap update \"" . str_replace('"', '\"', $commitText) . "\"");
                    if ($newUniToolVersion !== $currentUniToolVersion) {
                        passthru("cd \"$naiveImporterDir\"; git t $newUniToolVersion");
                    }
                    passthru("cd \"$naiveImporterDir\"; git pp");
                    H::success(H::i($indentLevel + 1) . "Uni-tool was pushed successfully to github.com." . PHP_EOL, $output);


                } else {
                    $output->write('<error>oops</error>' . PHP_EOL);
                    H::error(H::i($indentLevel + 2) . "Couldn't copy the <b>universe meta file</b>." . PHP_EOL, $output);
                }
            } else {
                $output->write('<error>oops</error>' . PHP_EOL);
                H::error(H::i($indentLevel + 2) . "Couldn't copy the <b>dependency master file</b>." . PHP_EOL, $output);
            }


        } else {
            $output->write('<error>oops</error>' . PHP_EOL);
            H::error(H::i($indentLevel + 2) . "Couldn't create the <b>universe-meta</b> file." . PHP_EOL, $output);
        }


    }


}
