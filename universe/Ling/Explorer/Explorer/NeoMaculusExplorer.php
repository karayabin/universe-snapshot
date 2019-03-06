<?php


namespace Ling\Explorer\Explorer;


use Ling\Explorer\Importer\GithubImporter;

class NeoMaculusExplorer extends MaculusExplorer
{

    public function __construct()
    {
        parent::__construct();
        $this->addImporter('git', new GithubImporter());
    }

    public static function create()
    {
        return new self();
    }
}