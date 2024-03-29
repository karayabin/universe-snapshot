<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper;
use Ling\LingTalfi\Kaos\Tool\PreferencesTool;
use Ling\LingTalfi\Kaos\Util\CommitWizard;
use Ling\LingTalfi\Kaos\Util\ReadmeUtil;
use Ling\LingTalfi\Util\AppBoilerplateUtil;
use Ling\PlanetSitemap\PlanetSitemapHelper;
use Ling\SimpleCurl\SimpleCurl;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\Exception\UniverseToolsException;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The PushCommand class.
 *
 * This command does the following (for the given planet):
 *
 *
 * - Updates the version in meta-info.byml based on the **History Log** section in the README.md, or create it if necessary.
 * - Updates/creates the dependencies.byml file if necessary
 * - Builds the doc, if there is a corresponding LingTalfi/DocBuilder object.
 * - Creates/updates the sitemap.txt and robot.txt
 * - Pushes the planet to github.com.
 * - Ask google to crawl the sitemap.
 * - If the version number is greater than before, executes the PackAndPushUniTool command (see the @object(PackAndPushUniToolCommand) class for more details).
 *
 *
 * Note: this command assumes that the planet dir represents a planet only if it contains a README.md file with a **History Log** section.
 *
 *
 * Options, flags
 * ----------------
 *
 * - ?planet-dir=string. The path to the planet directory to push. If not set, will use the current directory.
 * - -n: no packing. If set, the PackAndPushUniTool command will NOT be executed.
 * - -?application=string. The path to the host application. This will be used to pack universe assets automatically for instance.
 *
 *
 */
class PushCommand extends KaosGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $prefs = PreferencesTool::getPreferences();
        $docToolExtraLoaders = $prefs['docToolExtraLoaders'] ?? [];


        $indentLevel = $this->application->getBaseIndentLevel();
        $gitAccount = "lingtalfi";
        $githubBaseUrl = "https://github.com/$gitAccount";
        $uniDir = LocalUniverseTool::getLocalUniversePath();

        $planetDir = $input->getOption('planet-dir');
        $applicationDir = $input->getOption('application');
        $noPacking = $input->hasFlag('n');

        if (null === $planetDir) {
            $planetDir = $this->application->getCurrentDirectory();
        }


        $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        if (false !== $pInfo) {

            list($galaxyName, $planetName) = $pInfo;


            $gitDir = $planetDir . "/.git";
            if (false === is_dir($gitDir)) {
                $output->write("<error>oops, the .git directory was not found in $gitDir</error>" . PHP_EOL);
                return;
            }


            H::info(H::i($indentLevel) . "Pushing planet <blue>$galaxyName/$planetName</blue> ($planetDir):" . PHP_EOL, $output);
            H::info(H::i($indentLevel + 1) . "Scanning <b>README.md</b> file:" . PHP_EOL, $output);


            //--------------------------------------------
            // KAOS OPTIONS?
            //--------------------------------------------
            $kaosOptions = [];
            $kaosOptionsFile = $planetDir . "/kaos.options.byml";
            if (file_exists($kaosOptionsFile)) {
                $kaosOptions = BabyYamlUtil::readFile($kaosOptionsFile);
            }

            $hostingAppDir = $kaosOptions['hosting_app'] ?? null;

            //--------------------------------------------
            // SCANNING README.MD
            //--------------------------------------------
            $readMeFile = $planetDir . "/README.md";
            $readMeUtil = new ReadmeUtil();
            $info = $readMeUtil->getLatestVersionInfo($readMeFile);


            if (false !== $info) {
                list($historyLogVersion, $commitText) = $info;
                H::discover(H::i($indentLevel + 2) . "Found version <b>$historyLogVersion</b> with commit text: \"$commitText\"." . PHP_EOL, $output);

                //--------------------------------------------
                // META-INFO.BYML
                //--------------------------------------------
                $metaInfo = MetaInfoTool::parseInfo($planetDir);
                $oldVersion = $metaInfo['version'] ?? null;


                $error = false;
                $newVersionAvailable = false;
                if ($historyLogVersion !== $oldVersion) {
                    H::info(H::i($indentLevel + 1) . "Updating <b>meta-info.byml</b>...", $output);
                    $newVersionAvailable = true;
                    $metaInfo["version"] = $historyLogVersion;


                    $res = MetaInfoTool::writeInfo($planetDir, $metaInfo);
                    if (false === $res) {
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::error(H::i($indentLevel + 1) . "Couldn't write the meta-info file to the planet <bold>$planetDir</bold>." . PHP_EOL, $output);
                        $error = true;
                    } else {
                        $output->write('<success>ok</success>' . PHP_EOL);
                    }
                } else {
                    H::info(H::i($indentLevel + 1) . "The version didn't change." . PHP_EOL, $output);
                }


                if (false === $error) {
                    $mapDir = $planetDir . "/assets/map";


                    FileSystemTool::remove($mapDir);


                    //--------------------------------------------
                    // AUTOMATIC UNIVERSE ASSETS IMPORT
                    //--------------------------------------------
                    /**
                     * More about universe assets: https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md
                     */
                    if (null !== $hostingAppDir || null !== $applicationDir) {


                        // using hosting app dir first if defined
                        $_appDir = $hostingAppDir ?? $applicationDir;

                        $relPath = "www/libs/universe/$galaxyName/$planetName";
                        $applicationPlanetWebAssetsDir = $_appDir . "/$relPath";
                        if (is_dir($applicationPlanetWebAssetsDir)) {
                            $dst = $mapDir . "/" . $relPath;

                            H::info(H::i($indentLevel) . "Copying universe assets in <b>$relPath</b>...", $output);
                            if (true === FileSystemTool::copyDir($applicationPlanetWebAssetsDir, $dst)) {
                                $output->write('<success>ok</success>.' . PHP_EOL);
                            } else {
                                $output->write('<error>oops</error>.' . PHP_EOL);
                                H::info(H::i($indentLevel + 1) . "Couldn't copy the dir." . PHP_EOL, $output);
                            }
                        }
                    }


                    //--------------------------------------------
                    // DEPENDENCIES.BYML
                    //--------------------------------------------
                    H::info(H::i($indentLevel + 1) . "Updating <b>dependencies.byml</b>...", $output);

                    try {


                        $isLightPlugin = false;
                        if (
                            'Ling' === $galaxyName &&
                            (
                                "Light" === $planetName ||
                                "Light_" === substr($planetName, 0, 6)
                            )
                        ) {
                            $isLightPlugin = true;
                        }


                        /**
                         * We add the map if detected
                         */
                        $postInstall = [];
                        if (true === $isLightPlugin || is_dir($mapDir)) {
                            $postInstall['map'] = true;
                        }


                        $ignoreFilesStartingWith = $kaosOptions['ignoreFilesStartingWith'] ?? [];
                        $options = [
                            "ignoreFilesStartingWith" => $ignoreFilesStartingWith,
                        ];


                        if (true === DependencyTool::writeDependencies($planetDir, $postInstall, $options)) {


                            $output->write('<success>ok</success>' . PHP_EOL);


                            //--------------------------------------------
                            // LPI DEPENDENCIES
                            //--------------------------------------------
                            H::info(H::i($indentLevel + 1) . "Updating <b>lpi-deps.byml</b>...", $output);
                            LpiDepsFileHelper::updateLpiDepsByPlanetDir($planetDir);
                            $output->write('<success>ok</success>' . PHP_EOL);


                            $currentPwd = exec("pwd");
                            //--------------------------------------------
                            // LIGHT PACKING
                            //--------------------------------------------
                            if (true === $isLightPlugin) {
                                $currentUniverseDir = dirname(dirname($currentPwd));


                                $p = explode('/', $currentUniverseDir);
                                $currentUniverseDirName = array_pop($p);
                                if ('universe' === $currentUniverseDirName) {


                                    if (array_key_exists('map', $postInstall)) {


                                        $_appDir = $hostingAppDir ?? $applicationDir;


                                        H::info(H::i($indentLevel + 1) . "Light plugin with map assets detected, calling <b>kaos packlightmap</b> command." . PHP_EOL, $output);
                                        $myInput = new ArrayInput();
                                        $myInput->setItems([
                                            ":packlightmap" => true,
                                            "a" => $_appDir,
                                        ]);
                                        $this->application->run($myInput, $output);
                                    }
                                }
                            }


                            //--------------------------------------------
                            // DOC BUILDER
                            //--------------------------------------------
                            $docBuilderClass = "Ling\LingTalfi\DocBuilder\\$planetName\\$planetName" . "DocBuilder";
                            H::info(H::i($indentLevel + 1) . "Checking for documentation builder." . PHP_EOL, $output);

                            if (class_exists($docBuilderClass)) {


                                H::discover(H::i($indentLevel + 2) . "Found <b>$docBuilderClass</b>." . PHP_EOL, $output);
                                H::info(H::i($indentLevel + 2) . "Creating documentation....", $output);

                                if ($docToolExtraLoaders) {
                                    foreach ($docToolExtraLoaders as $docToolExtraLoader) {
                                        require_once $docToolExtraLoader;
                                    }
                                }

                                call_user_func([$docBuilderClass, "buildDoc"], false);
                                $output->write('<success>ok</success>' . PHP_EOL);

                            } else {
                                H::info(H::i($indentLevel + 2) . "No DocBuilder class found for planet <blue>$galaxyName/$planetName</blue>." . PHP_EOL, $output);
                            }

                            //--------------------------------------------
                            // CREATE SITEMAP.TXT
                            //--------------------------------------------
                            H::info(H::i($indentLevel + 1) . "Creating <b>sitemap</b> at <b>$planetDir/sitemap.txt</b>...", $output);
                            if (true === PlanetSitemapHelper::createGithubSitemap($planetDir, $githubBaseUrl)) {
                                $output->write('<success>ok</success>' . PHP_EOL);


                                //--------------------------------------------
                                // CREATING ROBOT.TXT
                                //--------------------------------------------
                                $sitemapUrl = "https://raw.githubusercontent.com/$gitAccount/$planetName/master/sitemap.txt";


                                H::info(H::i($indentLevel + 1) . "Creating <b>robots.txt</b> at <b>$planetDir/robots.txt</b>...", $output);
                                $robotsFile = $planetDir . "/robots.txt";
                                $robotsContent = <<<EEE
User-agent: *
Sitemap: $sitemapUrl
EEE;

                                if (true === FileSystemTool::mkfile($robotsFile, $robotsContent)) {
                                    $output->write('<success>ok</success>' . PHP_EOL);


                                    //--------------------------------------------
                                    // PUSH TO GITHUB.COM
                                    //--------------------------------------------
                                    H::info(H::i($indentLevel + 1) . "Pushing planet <blue>$galaxyName/$planetName</blue> to github.com." . PHP_EOL, $output);


                                    if (false === $newVersionAvailable) {
                                        $commitText = "Routine update.";
                                    }
                                    /**
                                     * Note: I'm using git shortcut commands:
                                     * https://github.com/lingtalfi/server-notes/blob/master/doc/my-git-local-flow.md
                                     */
                                    passthru("cd \"$planetDir\"; git snap update \"" . str_replace('"', '\"', $commitText) . "\"");
                                    if (true === $newVersionAvailable) {
                                        passthru("cd \"$planetDir\"; git t $historyLogVersion");
                                    }
                                    passthru("cd \"$planetDir\"; git pp");


                                    //--------------------------------------------
                                    // SEND SITEMAP TO GOOGLE
                                    //--------------------------------------------
                                    H::info(H::i($indentLevel + 1) . "Asking google to crawl the sitemap...", $output);


                                    // https://support.google.com/webmasters/answer/183668?hl=en&ref_topic=4581190
                                    $pingUrl = "http://www.google.com/ping?sitemap=$sitemapUrl";
                                    $curl = new SimpleCurl();
                                    $curlResponse = $curl->call($pingUrl);
                                    if (false !== $curlResponse) {
                                        $httpCode = $curlResponse->getHttpCode();
                                        $output->write('<success>ok</success> (httpCode=' . $httpCode . ')' . PHP_EOL);
                                        $body = $curlResponse->getBody();
                                        H::info(str_repeat('*', 50) . PHP_EOL, $output);
                                        $output->write($body . PHP_EOL);
                                        H::info(str_repeat('*', 50) . PHP_EOL, $output);


                                    } else {
                                        $output->write('<error>oops</error>' . PHP_EOL);
                                        H::warning(H::i($indentLevel + 2) . "The request didn't go well." . PHP_EOL, $output);
                                        $curlErrors = $curl->getErrors();
                                        if ($curlErrors) {
                                            H::warning(H::i($indentLevel + 2) . "The following errors occurred:" . PHP_EOL, $output);
                                            foreach ($curlErrors as $curlError) {
                                                H::warning(H::i($indentLevel + 3) . $curlError . PHP_EOL, $output);
                                            }
                                        }
                                    }


                                    //--------------------------------------------
                                    // REPACK AND PUSH UNI TOOL
                                    //--------------------------------------------
                                    if (false === $noPacking) {
                                        if (true === $newVersionAvailable) {

                                            $myInput = new ArrayInput();
                                            $myInput->setItems([
                                                ":packpushuni" => true,
                                            ]);
                                            $this->application->run($myInput, $output);
                                        }
                                    }


                                    H::success(H::i($indentLevel) . "The planet <blue>$galaxyName/$planetName</blue> was pushed." . PHP_EOL, $output);


                                    //--------------------------------------------
                                    // HOOKS TO Light_AppBoilerplate
                                    //--------------------------------------------
                                    $u = new AppBoilerplateUtil();
                                    $u->setOutput($output);
                                    H::info(H::i($indentLevel) . "Checking for hooks...", $output);
                                    $deps = $u->getBoilerplateDependencies();
                                    $planetDotName = $galaxyName . ".$planetName";
                                    if (true === in_array($planetDotName, $deps)) {
                                        $output->write("found hook to Light_AppBoilerplate." . PHP_EOL);


                                        H::info(H::i($indentLevel) . "Upgrading boilerplate." . PHP_EOL, $output);
                                        $u->upgradeBoilerplate();


                                        H::info(H::i($indentLevel) . "Committing boilerplate." . PHP_EOL, $output);

                                        $u = new CommitWizard();
                                        $u->commit("Ling.Light_AppBoilerplate", "wizard: update boilerplate for $planetDotName.");


                                    } else {
                                        $output->write("no hooks found, all good." . PHP_EOL);
                                    }


                                } else {
                                    $output->write('<error>oops</error>' . PHP_EOL);
                                    H::error(H::i($indentLevel + 2) . "Couldn't create the robots.txt file." . PHP_EOL, $output);
                                }


                            } else {
                                $output->write('<error>oops</error>' . PHP_EOL);
                                H::error(H::i($indentLevel + 2) . "Couldn't create the sitemap file." . PHP_EOL, $output);
                            }


                        } else {
                            $output->write('<error>oops</error>' . PHP_EOL);
                            H::error(H::i($indentLevel + 2) . "Couldn't write the dependencies.byml file." . PHP_EOL, $output);
                        }
                    } catch (UniverseToolsException $e) {
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::error(H::i($indentLevel + 2) . $e->getMessage() . PHP_EOL, $output);
                    }
                }
            } else {
                $errors = $readMeUtil->getErrors();
                H::warning(H::i($indentLevel + 2) . "The directory <bold>$planetDir</bold> does not contain a valid <bold>README.md</bold> file. " . PHP_EOL, $output);
                if ($errors) {
                    H::warning(H::i($indentLevel + 2) . "The ReadMeUtil object said: " . PHP_EOL, $output);
                    foreach ($errors as $error) {
                        H::warning(H::i($indentLevel + 3) . $error . PHP_EOL, $output);
                    }
                }
            }

        } else {
            H::error(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>." . PHP_EOL, $output);
        }


    }


}