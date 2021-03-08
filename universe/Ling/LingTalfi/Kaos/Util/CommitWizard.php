<?php


namespace Ling\LingTalfi\Kaos\Util;


use Ling\CliTools\Output\Output;
use Ling\CliTools\Output\OutputInterface;
use Ling\LingTalfi\Exception\LingTalfiException;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;
use Ling\UniverseTools\Util\StandardReadmeUtil;

/**
 * The CommitWizard class.
 */
class CommitWizard
{


    /**
     * This property holds the output for this instance.
     * @var OutputInterface|null
     */
    protected ?OutputInterface $output;


    /**
     * Builds the CommitWizard instance.
     */
    public function __construct()
    {
        $this->output = null;
    }

    /**
     * Sets the output.
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }


    /**
     *
     * Commits the given planet with the given message.
     *
     * @param string $planetDotName
     * @param string $commitMessage
     */
    public function commit(string $planetDotName, string $commitMessage)
    {

        $uniDir = LocalUniverseTool::getLocalUniversePath();
        $planetDir = $uniDir . "/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName);
        if (false === is_dir($planetDir)) {
            $this->error("planet dir doesn't exist: $planetDir. Abort.");
        }


        $this->msg("add commit message to planet $planetDotName: $commitMessage." . PHP_EOL);
        $u = new StandardReadmeUtil();
        $u->addCommitMessageByPlanetDir($planetDir, $commitMessage);
        $this->commitCurrentByPlanetDir($planetDir);
    }


    /**
     * Commits the given planet.
     *
     * @param string $planetDir
     */
    public function commitCurrentByPlanetDir(string $planetDir)
    {


        $readMeFile = $planetDir . "/README.md";
        $readMeUtil = new ReadmeUtil();
        $this->msg("Parsing info from README.md...");
        $info = $readMeUtil->getLatestVersionInfo($readMeFile);

        if (false !== $info) {



            $this->msgSuccess("ok." . PHP_EOL);

            list($historyLogVersion, $commitText) = $info;


            $metaInfo = MetaInfoTool::parseInfo($planetDir);
            $oldVersion = $metaInfo['version'] ?? null;
            $newVersionAvailable = false;
            if ($historyLogVersion !== $oldVersion) {
                $newVersionAvailable = true;
            }

            /**
             * Note: I'm using git shortcut commands:
             * https://github.com/lingtalfi/server-notes/blob/master/doc/my-git-local-flow.md
             */
            $this->execc("cd \"$planetDir\"; git add -A 2>&1; git commit -m \"update ". str_replace('"', '\"', $commitText) ."\" 2>&1");


            if (true === $newVersionAvailable) {
                $this->execc("cd \"$planetDir\"; git tag -a \"$historyLogVersion\" -m \"$historyLogVersion\" 2>&1");
            }
            $this->execc("cd \"$planetDir\"; git push --tags -f origin master 2>&1");


        } else {
            $this->msgError("Parsing failed." . PHP_EOL);
            $errors = $readMeUtil->getErrors();
            foreach ($errors as $error) {
                $this->msgError($error);
            }
        }
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a message to the output.
     * @param string $msg
     */
    private function msg(string $msg)
    {
        $this->getOutput()->write($msg);
    }


    /**
     * Writes an error message to the output.
     * @param string $msg
     */
    private function msgError(string $msg)
    {
        $this->msg('<error>' . $msg . '</error>');
    }

    /**
     * Writes a success message to the output.
     * @param string $msg
     */
    private function msgSuccess(string $msg)
    {
        $this->msg('<success>' . $msg . '</success>');
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LingTalfiException(static::class . ": " . $msg, $code);
    }


    /**
     * Executes the given command, and writes its display to the output.
     * Also writes an additional message to indicate whether the command was successful.
     * @param string $cmd
     */
    private function execc(string $cmd)
    {
        $this->msg("Executing cmd: $cmd...");
        $res = [];
        $ret = 0;
        exec($cmd, $res, $ret);


        if (false === empty($res)) {
            $this->msg(implode(PHP_EOL, $res));
        }
        if (0 === $ret) {
            $this->msgSuccess("ok." . PHP_EOL);
        } else {
            $this->msg(PHP_EOL);
            $this->msgError("execution failed." . PHP_EOL);
        }
    }


    /**
     * Returns the current output interface.
     *
     * @return OutputInterface
     */
    private function getOutput(): OutputInterface
    {
        if (null === $this->output) {
            $this->output = new Output();
        }
        return $this->output;
    }
}