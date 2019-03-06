<?php


namespace Ling\Kamille\Utils\Umail;


use Ling\Kamille\Utils\Umail\TemplateLoader\KamilleTemplateLoader;
use Ling\Umail\Umail;

class KamilleUmail extends Umail
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateLoader(KamilleTemplateLoader::create());
    }


}
