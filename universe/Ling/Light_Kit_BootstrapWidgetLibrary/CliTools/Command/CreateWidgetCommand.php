<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command;


use Ling\Bat\CaseTool;
use Ling\Bat\StringTool;
use Ling\Bat\TemplateTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;


/**
 * The CreateWidgetCommand class.
 *
 */
class CreateWidgetCommand extends LightKitBootstrapWidgetLibraryBaseCommand
{

    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        $this->checkInsideAppDir($input, $output);


        $retCode = 0;
        $appDir = getcwd();


        $widgetName = $input->getParameter(2);

        if (null !== $widgetName) {


            $type = "picasso";


            switch ($type) {
                case "picasso":


                    $planetDir = __DIR__ . "/../../";


                    //--------------------------------------------
                    // WIDGET CLASS
                    //--------------------------------------------
                    $widgetClassFile = $planetDir . "/Widget/Picasso/$widgetName.php";
                    if (true === file_exists($widgetClassFile)) {
                        $widgetClassFile = realpath($widgetClassFile);
                        $this->write("Widget class file already exists, skipping ($widgetClassFile)." . PHP_EOL);
                    } else {
                        $this->write("Creating the widget class in <blue>$widgetClassFile</blue>." . PHP_EOL);

                        $srcFile = __DIR__ . "/../../assets/templates/widget/WidgetClass.php";
                        TemplateTool::copy($srcFile, $widgetClassFile, [
                            "ZeroAdminHeaderWidgetXXX" => $widgetName,
                        ]);
                    }

                    //--------------------------------------------
                    // WIDGET TEMPLATE
                    //--------------------------------------------
                    $widgetFile = $appDir . "/templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/$widgetName/templates/default.php";
                    if (true === file_exists($widgetFile)) {
                        $sWidgetFile = StringTool::getSymbolicPath($widgetFile, $appDir);
                        $this->write("Widget template  already exists, skipping ($sWidgetFile)." . PHP_EOL);
                    } else {
                        $this->write("Creating default picasso wudget in <blue>$widgetFile</blue>." . PHP_EOL);
                        $srcFile = __DIR__ . "/../../assets/templates/widget/default-template.php";

                        $underscoreName = CaseTool::toUnderscoreLow($widgetName);

                        TemplateTool::copy($srcFile, $widgetFile, [
                            "ZeroAdminHeaderNewNotificationsIconLinkWidget" => $widgetName,
                            "zeroadmin_new_notifications" => $underscoreName,
                        ]);


                        $this->write("Here is an example snippet on how to use it:" . PHP_EOL);
                        $snippet = <<<EEE
    name: $underscoreName
    type: picasso
    className: Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\\$widgetName
    widgetDir: templates/Ling.Light_Kit_BootstrapWidgetLibrary/widgets/picasso/$widgetName
    template: default.php
    vars: 
        icon: fas fa-bell
        badge: badge badge-pill badge-danger
        header_text_format: You have %s notifications
        model: ::(Ling\Light_Kit_Admin\DataExtractor\NotificationsDataExtractor->extractNewest(5))::
        view_all_link: ::(@reverse_router->getUrl(/pages/u-issue-tracker))::
        view_all_text: View All notifications
EEE;

                        $this->write($snippet . PHP_EOL);


                    }


                    break;
                default:
                    $this->error("Unknown widget type: $type.");
                    break;
            }


        } else {
            $output->write("<error>widget parameter missing.</error>" . PHP_EOL);
            $retCode = 1;
        }


        return $retCode;

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
 Creates a basic widget in our planet. This command was designed for widget authors who want to extend our library.
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
            "widgetClassName" => [
                " the short classname of the widget to create. Example: KitStoreHeaderWidget.",
                true,
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
            "create_widget" => "bwl create_widget",
        ];
    }


}