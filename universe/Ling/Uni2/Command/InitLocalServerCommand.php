<?php


namespace Ling\Uni2\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;


/**
 * The InitLocalServerCommand class.
 *
 *
 * Creates the bigbang.php script at the root of the local server, if it doesn't exist already.
 *
 *
 */
class InitLocalServerCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $indentLevel = $this->application->getBaseIndent();
        $localServer = $this->application->getLocalServer();


        if (false === $localServer->isActive()) {
            H::warning(H::i($indentLevel) . "Local server inactive. Use the <bold>conf</bold> command to set a root dir and activate it. Aborting." . PHP_EOL, $output);
            return;
        } else {

            $srcPath = __DIR__ . "/../assets/uni-skeleton/universe/bigbang.php";
            $dstPath = $localServer->getRootDir() . "/bigbang.php";


            if (file_exists($dstPath)) {
                H::info(H::i($indentLevel) . "The local server's <b>bigbang</b> file already exists (<b>$dstPath</b>)...", $output);
            } else {
                H::info(H::i($indentLevel) . "Creating <b>bigbang</b> script in local server (<b>$dstPath</b>)...", $output);

                if (true === FileSystemTool::copyFile($srcPath, $dstPath)) {
                    $output->write('<success>ok</success>.' . PHP_EOL);
                } else {
                    $output->write('<error>oops</error>.' . PHP_EOL);
                    H::error(H::i($indentLevel + 1) . "Couldn't create the <b>bigbang</b> file." . PHP_EOL, $output);
                }
            }
        }
    }
}