<?php


namespace Kamille\Utils\Umail;


use Kamille\Utils\Umail\TemplateLoader\KamilleTemplateLoader;
use Umail\Umail;

class KamilleUmail extends Umail
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateLoader(KamilleTemplateLoader::create());
    }


}
