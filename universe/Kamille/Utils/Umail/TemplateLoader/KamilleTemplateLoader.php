<?php


namespace Kamille\Utils\Umail\TemplateLoader;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Umail\TemplateLoader\FileTemplateLoader;


class KamilleTemplateLoader extends FileTemplateLoader
{
    public function __construct()
    {
        parent::__construct();
        $this->setDir(ApplicationParameters::get("app_dir") . "/mails");
    }

    /**
     * Triggers the resolution of the given $templateName
     * to an html file, a plain file, or both.
     *
     * Then to access the files paths use the getHtmlFile
     * and/or getPlainFile methods.
     */
    public function load($templateName)
    {
        $htmlPath = null;
        $plainPath = null;
        if (null !== ($theme = ApplicationParameters::get("theme"))) {
            $htmlPath = $this->dir . "/themes/$theme/" . $this->getHtmlRelativePath($templateName);
            $plainPath = $this->dir . "/themes/$theme/" . $this->getPlainRelativePath($templateName);
        }

        if (null === $htmlPath || false === file_exists($htmlPath)) {
            $htmlPath = $this->dir . "/" . $this->getHtmlRelativePath($templateName);
        }

        if (null === $plainPath || false === file_exists($plainPath)) {
            $plainPath = $this->dir . "/" . $this->getPlainRelativePath($templateName);
        }

        $this->htmlContent = $this->getFileContent($htmlPath);
        $this->plainContent = $this->getFileContent($plainPath);

        return $this;
    }


}
