<?php


namespace Ling\Deploy\Command;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Application\DeployApplication;
use Ling\Deploy\Helper\DiffHelper;
use Ling\Deploy\Util\DiffUtil;

/**
 * The DiffCommand class.
 *
 * This command displays the differences to have the site files mirrored on the remote.
 *
 * The differences are composed of 3 sections:
 *
 * - add: the files present in the site, not on the remote
 * - remove: the files present in the remote, not on the site
 * - replace: the files present in both the site and the remote, but they have a difference (i.e. their hash_id differs)
 *
 *
 * The diff command uses the @object(CreateMapCommand) under the hood.
 * The maps are recreated on the fly every time.
 *
 * Symlinks are not followed.
 *
 * Each map is created using its own configuration: the map on the site is created using the **map-conf** section of the site's conf,
 * whereas the remote map is created using the **map-conf** section of the remote's conf.
 *
 * As a way to have more control from the site (rather than the remote), the diff command also reuses the
 * **ignore** key of the **map-conf** section of the site's conf.
 *
 *
 *
 *
 *
 * Flags
 * ------------
 * - -f: files. If this flag is set, the diff command will write the diff to 3 files instead of displaying it
 *          to the screen. The 3 files are:
 *              - $app/.deploy/diff-add.txt
 *              - $app/.deploy/diff-remove.txt
 *              - $app/.deploy/diff-replace.txt
 *
 *
 *
 */
class DiffCommand extends DeployGenericCommand
{

    /**
     * This property holds the sentenceCreateDiff for this instance.
     * An informative sentence to display on the console.
     * @var string
     */
    protected $sentenceCreateDiff;

    /**
     * This property holds the reverse for this instance.
     * If false (by default), the diff is a map to transform the remote into the local application.
     * If true, the diff is a map to transform the local application into the remote application.
     *
     * @var bool = false
     */
    protected $reverse;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->sentenceCreateDiff = "Creating diff between current site and remote:";
        $this->reverse = false;
    }


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $createFiles = $input->hasFlag('f');


        $indentLevel = $this->application->getBaseIndentLevel();
        $conf = $this->application->getProjectConf();

        $appDir = $conf['root_dir'];
        $mapConf = $conf["map-conf"];
        $ignoreName = $mapConf['ignoreName'];
        $ignorePath = $mapConf['ignorePath'];


        $remoteSshConfigId = $conf['ssh_config_id'];
        $remoteRootDir = $conf['remote_root_dir'];


        H::info(H::i($indentLevel) . $this->sentenceCreateDiff . PHP_EOL, $output);


        //--------------------------------------------
        // CREATING LOCAL MAP
        //--------------------------------------------
        $appInput = new ArrayInput();
        $appInput->setItems([
            ":map" => true,
            "p" => $this->application->getProjectIdentifier(),
            "word" => "local map",
            "indent" => $indentLevel + 1,
        ]);
        $app = new DeployApplication();
        $app->run($appInput, $output);


        //--------------------------------------------
        // CREATING REMOTE MAP
        //--------------------------------------------
        H::info(H::i($indentLevel + 1) . "Executing the <b>map</b> command on the remote:" . PHP_EOL, $output);
        $appInput = new ArrayInput();
        $appInput->setItems([
            ":map" => true,
            "p" => $this->application->getProjectIdentifier(),
            "word" => "remote  map",
            "-r" => true,
            "indent" => $indentLevel + 2,
        ]);
        $app = new DeployApplication();
        $app->run($appInput, $output);


        //--------------------------------------------
        //
        //--------------------------------------------
        H::info(H::i($indentLevel + 1) . "Downloading remote map...", $output);
        $tmpFile = $appDir . "/.deploy/remote-map.txt";
        $mapBackCmd = "scp -q $remoteSshConfigId:$remoteRootDir/.deploy/map.txt \"$tmpFile\"";
        if (true === ConsoleTool::exec($mapBackCmd)) {
            $output->write("<success>ok</success>." . PHP_EOL);


            //--------------------------------------------
            // CREATING THE DIFF
            //--------------------------------------------
            H::info(H::i($indentLevel + 1) . "Creating diff map (from $tmpFile)...", $output);
            $src = $appDir . "/.deploy/map.txt";
            $util = new DiffUtil();


            if (false === $this->reverse) {
                $theSourceFile = $src;
                $theDestFile = $tmpFile;
            } else {
                $theSourceFile = $tmpFile;
                $theDestFile = $src;

            }
            $diffMap = $util->getDiffMap($theSourceFile, $theDestFile, [
                "ignoreName" => $ignoreName,
                "ignorePath" => $ignorePath,
            ]);
            $output->write("<success>ok</success>." . PHP_EOL);


            $add = $diffMap['add'];
            $remove = $diffMap['remove'];
            $replace = $diffMap['replace'];

            if (false === $createFiles) {

                DiffHelper::showDiff($output, $add, $remove, $replace);
                $output->write(PHP_EOL);


            } else {
                //--------------------------------------------
                // ...OR CREATING THE FILES
                //--------------------------------------------
                $addFile = $appDir . '/.deploy/diff-add.txt';
                $removeFile = $appDir . '/.deploy/diff-remove.txt';
                $replaceFile = $appDir . '/.deploy/diff-replace.txt';
                FileSystemTool::mkfile($addFile, implode(PHP_EOL, $add));
                FileSystemTool::mkfile($removeFile, implode(PHP_EOL, $remove));
                FileSystemTool::mkfile($replaceFile, implode(PHP_EOL, $replace));
            }

            return 0;

        } else {
            $output->write("<error>oops</error>." . PHP_EOL);
            H::error(H::i($indentLevel + 2) . "Couldn't download the remote map. The command <b>$mapBackCmd</b> failed." . PHP_EOL, $output);
        }

        return 2;

    }

}