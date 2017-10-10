<?php


namespace Umail\TemplateLoader;

/**
 * This loader loads templates from filesystem files.
 * By default, if a file ends with ".php", it will be interpreted as such (so that you can use condition blocks, loops, etc...),
 * otherwise, if the file ends with any other extension, it will be read as a regular template file.
 */
class FileTemplateLoader implements TemplateLoaderInterface
{

    /**
     * @var string $dir ,
     * the root dir containing all the templates.
     *
     * A template file's path is actually the root dir plus a relative path.
     *
     * By default, it assumes that there is a "mails" directory at the
     * root of your application.
     *
     */
    protected $dir;
    protected $suffix;

    /**
     * htmlPath, plainPath are locations to the actual template files
     */
    protected $htmlContent;
    protected $plainContent;


    public function __construct()
    {
        $this->dir = __DIR__ . "/../../../mails";
        $this->suffix = '';
    }

    public static function create()
    {
        return new static();
    }

    public function setDir($d)
    {
        $this->dir = $d;
        return $this;
    }

    public function setSuffix($s)
    {
        $this->suffix = $s;
        return $this;
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
        $htmlPath = $this->dir . "/" . $this->getHtmlRelativePath($templateName);
        $plainPath = $this->dir . "/" . $this->getPlainRelativePath($templateName);

        $this->htmlContent = $this->getFileContent($htmlPath);
        $this->plainContent = $this->getFileContent($plainPath);

        return $this;
    }


    /**
     * Returns the html file path, or null.
     * Be sure to call the load method first.
     */
    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    /**
     * Returns the plain/text file path, or null.
     * Be sure to call the load method first.
     */
    public function getPlainContent()
    {
        return $this->plainContent;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function getHtmlRelativePath($templateName)
    {
        return $templateName . '.html' . $this->suffix;
    }

    protected function getPlainRelativePath($templateName)
    {
        return $templateName . '.txt' . $this->suffix;
    }

    /**
     * @param $path
     * @return null|string, the file content
     */
    protected function getFileContent($path)
    {
        $content = null;
        if (file_exists($path)) {
            $content = file_get_contents($path);
        }
        return $content;
    }
}