<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;


/**
 * The BuildCommand class.
 *
 */
class BuildCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $flagN = $input->hasFlag('n');
        $skipIfExist = $flagN;

        $f1 = LpiFormatHelper::getFileFmt();
        $f2 = $f1;


        $lpiPath = $this->application->getLpiPath();

        if (false === $this->application->hasLpiFile()) {
            $output->write("Creating the <$f1>lpi.byml</$f1> file at <$f2>$lpiPath</$f2>...");
        } else {
            if (true === $skipIfExist) {
                $output->write("The <$f1>lpi.byml</$f1> file was found, nothing to do :)" . PHP_EOL);
                return;
            } else {
                $output->write("Updating  the <$f1>lpi.byml</$f1> file at <$f2>$lpiPath</$f2>...");
            }

        }


        $this->application->createLpiFile([
            "skipIfExist" => $skipIfExist,
        ]);
        $output->write('...<success>ok</success>');
        $output->write(PHP_EOL);

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
        return "Creates/updates the <$concept>lpi.byml</$concept> file at the root of the application, based on the current planets found in the application.";
    }


    /**
     * @overrides
     */
    public function getFlags(): array
    {
        return [
            "n" => "if set, will only create the file if it doesn't exist already",
        ];
    }

}