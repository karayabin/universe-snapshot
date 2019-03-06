<?php


namespace Ling\Explorer\Importer;


use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;

class GithubImporter implements ImporterInterface
{
    public function import($planetIdentifier, $dstDir)
    {
        if (false === function_exists('curl_init')) {
            throw new \Exception("GithubImporter: curl extension not found, don't know how to handle that case");
        }

        $p = explode('/', $planetIdentifier, 2);
        if (2 === count($p)) {

            $author = $p[0];
            $planet = $p[1];

            // http://stackoverflow.com/questions/9504791/is-there-anyway-to-programmatically-fetch-a-zipball-of-private-github-repo
            // curl -L https://api.github.com/repos/lingtalfi/bashmanager/zipball > bashmanager.zip

            $url = 'https://api.github.com/repos/' . $author . '/' . $planet . '/zipball/master';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Universe Explorer'); // required by the github api
            $data = curl_exec($ch);
            curl_close($ch);

            $tmpDir = FileSystemTool::tempDir();
            $tmpFile = $tmpDir . "/tmp.zip";
            file_put_contents($tmpFile, $data);
            return ZipTool::unzip($tmpFile, $dstDir);
        } else {
            throw new \Exception("Invalid planetIdentifier: $planetIdentifier");
        }
    }
}