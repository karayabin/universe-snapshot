<?php


namespace Ling\Deploy\Command;


use Ling\Bat\BDotTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The CreateMapCommand class.
 *
 * This command creates a map for the current site.
 *
 * Options
 * ----------
 * - word=string. The word used in the sentence: "Creating $word to <b>$mapFile</b>.",
 *              which is the first sentence displayed by this command.
 *              This option allows other commands to customize this command message.
 *
 *
 */
class CreateMapCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $indentLevel = $this->application->getBaseIndentLevel();
        $applicationDir = $this->application->getProjectDirectory();
        $mapFile = $this->application->getMapPath();
        $conf = $this->application->getConf($output, $indentLevel);
        $word = $input->getOption("word", "map");


        $mapConf = BDotTool::getDotValue("map-conf", $conf);


        //--------------------------------------------
        //
        //--------------------------------------------
        H::info(H::i($indentLevel) . "Creating $word to <b>$mapFile</b>...", $output);


        $lines = [];


        if (file_exists($applicationDir)) {


            $files = $this->collectFiles($applicationDir, $mapConf);

            $heavyExtensions = ["mp4"];
            foreach ($files as $file) {
                $baseName = basename($file);
                $lastPos = strrpos($baseName, '.');
                if (false !== $lastPos) {
                    $ext = strtolower(substr($baseName, $lastPos + 1));
                    $absFile = $applicationDir . "/" . $file;
                    if (false === in_array($ext, $heavyExtensions, true)) {
                        $lines[] = $file . '::' . hash_file("haval160,4", $absFile);
                    } else {
                        $size = filesize($absFile);
                        $lines[] = $file . ' : ' . $size;
                    }
                }
            }
        }

        if (true === FileSystemTool::mkfile($mapFile, implode(PHP_EOL, $lines))) {
            $output->write("<success>ok</success>." . PHP_EOL);
        } else {
            $output->write("<error>oops</error>." . PHP_EOL);
            H::error(H::i($indentLevel) . "Could not create the map file." . PHP_EOL, $output);
        }


    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function collectFiles(string $applicationDir, array $mapConf)
    {
        $ignoreHidden = $mapConf['ignoreHidden'];
        $ignoreName = $mapConf['ignoreName'];
        $ignorePath = $mapConf['ignorePath'];
        $ignore[] = ".deploy";

        $files = YorgDirScannerTool::getFilesIgnoreMore($applicationDir, $ignoreName, $ignorePath, true, true, false, $ignoreHidden);

        return $files;
    }

}