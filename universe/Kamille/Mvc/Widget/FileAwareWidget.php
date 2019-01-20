<?php


namespace Kamille\Mvc\Widget;


use Loader\PublicFileLoaderInterface;


class FileAwareWidget extends Widget
{


    protected function prepareVariables(array &$variables)
    {
        if ($this->loader instanceof PublicFileLoaderInterface) {
            $variables['__FILE__'] = $this->loader->getFile();
        }
    }

}