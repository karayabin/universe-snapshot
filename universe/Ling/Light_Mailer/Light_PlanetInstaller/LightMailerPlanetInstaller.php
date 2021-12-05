<?php


namespace Ling\Light_Mailer\Light_PlanetInstaller;


use Ling\Bat\LocalHostTool;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Logger\Helper\LightLoggerHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightMailerPlanetInstaller class.
 */
class LightMailerPlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Mailer";

        //--------------------------------------------
        // swiftmailer
        //--------------------------------------------
        $composerPath = LocalHostTool::getComposerPath();
        if (false === $composerPath) {
            $output->write("<warning>$planetDotName warning: composer was not found, you might need to install SwiftMailer manually: https://swiftmailer.symfony.com/docs/introduction.html.</warning>" . PHP_EOL);
        } else {
            $output->write("$planetDotName: installing SwiftMailer via composer..." . PHP_EOL);
            passthru('"' . $composerPath . '" require "swiftmailer/swiftmailer:^6.0"');
            $output->write("<success>ok.</success>" . PHP_EOL);
        }

        //--------------------------------------------
        // logger
        //--------------------------------------------
        $output->write("$planetDotName: registering Ling.Light_Logger listeners to open system...");
        LightLoggerHelper::copyListenersFromPluginToMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {

        $planetDotName = "Ling.Light_Mailer";

        //--------------------------------------------
        // swiftmailer
        //--------------------------------------------
        $output->write("<warning>$planetDotName warning: other planets might depend on SwiftMailer, so I didn't remove it for you.</warning>" . PHP_EOL);
        $output->write("<warning>You need to remove SwiftMailer manually if that's what you want.</warning>" . PHP_EOL);


//        if (false === "uninstall swiftmailer") {
//            // the code below hasn't been tested...
//            $composerPath = LocalHostTool::getComposerPath();
//            if (false === $composerPath) {
//                $output->write("<warning>$planetDotName warning: composer was not found, you might need to uninstall SwiftMailer manually.</warning>" . PHP_EOL);
//            } else {
//                $output->write("$planetDotName: removing SwiftMailer via composer..." . PHP_EOL);
//                passthru('"' . $composerPath . '" remove "swiftmailer/swiftmailer"');
//                $output->write("<success>ok.</success>" . PHP_EOL);
//            }
//        }

        //--------------------------------------------
        // logger
        //--------------------------------------------
        $output->write("$planetDotName: unregistering Ling.Light_Logger listeners from open system...");
        LightLoggerHelper::removeListenersFromMaster($appDir, $planetDotName);
        $output->write("<success>ok.</success>" . PHP_EOL);
    }


}