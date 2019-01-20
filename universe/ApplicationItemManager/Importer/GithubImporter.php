<?php


namespace ApplicationItemManager\Importer;


use Bat\FileSystemTool;

class GithubImporter implements ImporterInterface
{


    private $githubRepoName;


    public static function create()
    {
        return new static();
    }

    public function setGithubRepoName($githubRepoName)
    {
        $this->githubRepoName = $githubRepoName;
        return $this;
    }


    /**
     * force: if true, will remove the possibly already existing item before importing
     */
    public function import($item, $importDirectory, $force = false)
    {

        if (true === $force) {
            $dir = $importDirectory . "/$item";
            if (is_dir($dir)) {
                if (is_link($dir)) {
                    unlink($dir);
                } else {
                    FileSystemTool::remove($dir);
                }
            }
        }


        $output = [];
        $returnVar = 0;
        $cmd = 'cd "' . $importDirectory . '"; git clone https://github.com/' . $this->githubRepoName . '/' . $item . '.git';
        exec($cmd, $output, $returnVar);

        if (0 === $returnVar) {
            return true;
        } else {
            return false;
        }
    }


    public function update($item, $importDirectory)
    {
        $dir = $importDirectory . "/$item";
        $output = [];
        $returnVar = 0;
        $cmd = 'cd "' . $dir . '"; git pull';
        a($cmd);
        exec($cmd, $output, $returnVar);

        if (0 === $returnVar) {
            return true;
        } else {
            return false;
        }
    }
}