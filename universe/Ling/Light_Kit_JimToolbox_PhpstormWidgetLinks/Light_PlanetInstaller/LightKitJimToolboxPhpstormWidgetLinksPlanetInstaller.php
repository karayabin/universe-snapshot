<?php


namespace Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\Light_PlanetInstaller;


use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_JimToolbox\Service\LightJimToolboxService;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit2HookInterface;


/**
 * The LightKitJimToolboxPhpstormWidgetLinksPlanetInstaller class.
 */
class LightKitJimToolboxPhpstormWidgetLinksPlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit2HookInterface
{


    /**
     * @implementation
     */
    public function init2(string $appDir, OutputInterface $output, array $options = []): void
    {


        $planetDotName = "Ling.Light_Kit_JimToolbox_PhpstormWidgetLinks";


        $output->write("You are installing the <b>$planetDotName</b> planet." . PHP_EOL);


        /**
         * @var $_ji LightJimToolboxService
         */
        $_ji = $this->container->get("jim_toolbox");
        $info = $_ji->getJimToolboxItem("phpstorm_links");

        $writeItem = true;

        if (false !== $info) {
            $existingProject = $info['get']['project'] ?? null;
            if (null !== $existingProject) {
                if (false === QuestionHelper::askYesNo($output, "A phpstorm_links item already exists with project name: $existingProject, do you want to override it?")) {
                    $writeItem = false;
                }
            }
        }


        if (true === $writeItem) {

            $flavours = $_ji->getTemplateFlavours();
            $project = QuestionHelper::ask($output, "What's the name of your jetbrains project? ");
            $flavourKey = QuestionHelper::askSelectListItem($output, "Which template flavour do you want (type a number): ", $flavours);


            $flavour = $flavours[$flavourKey];
            switch ($flavour) {
                case "bootstrap":
                    $sIcon = "bi bi-code-square";
                    break;
                default:
                    $sIcon = "fas fa-code";
                    break;
            }


            $_ji->registerJimToolboxItem("phpstorm_links", [
                'label' => 'ide links',
                'icon' => $sIcon,
                'acp_class' => 'Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\JimToolbox\PhpstormWidgetLinksToolbox',
                'get' => [
                    "project" => $project,
                ],
            ]);
            $output->write("<success>The <b>$planetDotName</b> conf has been updated.</success>" . PHP_EOL);
        } else {
            $output->write("<success>Ok.</success>" . PHP_EOL);
        }

    }


    /**
     * @implementation
     */
    public function undoInit2(string $appDir, OutputInterface $output, array $options = []): void
    {


        $planetDotName = "Ling.Light_Kit_JimToolbox_PhpstormWidgetLinks";

        /**
         * @var $_ji LightJimToolboxService
         */
        $_ji = $this->container->get("jim_toolbox");
        $found = $_ji->unregisterJimToolboxItem("phpstorm_links");
        if (true === $found) {
            $output->write("<success>The <b>$planetDotName</b> jim toolbox conf has been removed successfully.</success>" . PHP_EOL);
        } else {
            $output->write("The <b>$planetDotName</b> jim toolbox conf was not found, skipping." . PHP_EOL);
        }
    }


}