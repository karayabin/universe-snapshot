<?php


namespace Ling\LingTalfi\Util;


use Ling\CliTools\Input\WritableCommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\LingTalfi\Kaos\Application\KaosApplication;
use Ling\UniverseTools\Util\StandardReadmeUtil;

/**
 * The CommitUtil class.
 */
class CommitUtil
{

    /**
     * Commit all planets using the kpp routine.
     *
     * @param string $universeDir
     */
    public static function commitAllPlanets(string $universeDir)
    {
        az("See/execute my script in app/scripts/Ling/LingTalfi/commit-all.php");
    }


    /**
     * This methods emulates what I normally do when I manually commit a planet.
     *
     * I tried to execute this from the browser, but the git command didn't push.
     * I believe it doesn't recognize my .gitconfig, since the browser is not me/
     *
     * Anyway, calling this from a terminal on my local machine seems to work fine.
     *
     *
     * @param string $planetDir
     * @param string $commitMessage
     * @param string $appDir
     */
    public static function regularLingCommit(string $planetDir, string $commitMessage, string $appDir = null)
    {


        // first update the readme.md file, add a new the commit message and increment the version number
        $u = new StandardReadmeUtil();
        $u->addCommitMessageByPlanetDir($planetDir, $commitMessage, ['increment' => true]);


        // cd to the planet dir
        chdir($planetDir);


        // then call the kpp command, which basically does the following
        $output = new Output();
        $app = new KaosApplication();
        $input = new WritableCommandLineInput();
        $input->setParameters(["push"]);
        $input->setOptions(["application" => $appDir]);
        $app->run($input, $output);

    }
}