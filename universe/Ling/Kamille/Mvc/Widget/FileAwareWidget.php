<?php


namespace Ling\Kamille\Mvc\Widget;


use Ling\Loader\PublicFileLoaderInterface;


class FileAwareWidget extends Widget
{


    protected function prepareVariables(array &$variables)
    {
        if ($this->loader instanceof PublicFileLoaderInterface) {
            $variables['__FILE__'] = $this->loader->getFile();
        }
    }

}