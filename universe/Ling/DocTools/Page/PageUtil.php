<?php


namespace Ling\DocTools\Page;


use Ling\Bat\FileSystemTool;
use Ling\DocTools\Exception\DocToolsException;
use Ling\DocTools\TemplateWizard\TemplateWizard;
use Ling\DocTools\Translator\MarkdownTranslatorInterface;
use Ling\DocTools\Widget\WidgetInterface;

/**
 * The PageUtil class is a tool to create pages of your documentation.
 * You will need this tool when creating your own @kw(DocBuilder).
 *
 *
 */
class PageUtil
{

    /**
     * This property holds the rootDir for this instance.
     * The root dir is the directory containing all generated files.
     *
     * @var string
     */
    protected $rootDir;

    /**
     * This property holds the inserts root directory.
     * See @concept(inserts) for more details.
     *
     * @var string
     */
    protected $insertsRootDir;

    /**
     * This property holds the markdown translator for this instance.
     * If null, no translation will occur.
     *
     * @var MarkdownTranslatorInterface
     */
    protected $translator;


    /**
     * Builds the PageUtil instance.
     */
    public function __construct()
    {
        $this->rootDir = null;
        $this->insertsRootDir = null;
        $this->translator = null;
    }


    /**
     * Sets the root dir.
     *
     * @param string $rootDir
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    /**
     * Sets the insertsRootDir.
     *
     * @param string $insertsRootDir
     */
    public function setInsertsRootDir(string $insertsRootDir)
    {
        $this->insertsRootDir = $insertsRootDir;
    }


    /**
     * Sets the translator.
     *
     * @param MarkdownTranslatorInterface $translator
     */
    public function setTranslator(?MarkdownTranslatorInterface $translator)
    {
        $this->translator = $translator;
    }


    /**
     * Creates the page in $file, based on the given $template and $variables.
     *
     * @param string $file
     * @param string $template
     * @param array $variables
     * @throws DocToolsException
     * @throws \Ling\DocTools\Exception\BadWidgetConfigurationException
     */
    public function createPage(string $file, string $template, array $variables)
    {
        if (null === $this->rootDir) {
            throw new DocToolsException("Root directory must be set.");
        }

        $fileAbs = $this->rootDir . "/" . $file;

        $z = [];
        foreach ($variables as $k => $v) {
            if ($v instanceof WidgetInterface) {
                $v = $v->render();
            }
            $z[$k] = $v;
        }


        //--------------------------------------------
        // EXTRA VARS
        //--------------------------------------------
        $z["date"] = date("Y-m-d") . PHP_EOL;

        //--------------------------------------------
        // WIZARD
        //--------------------------------------------


        $insertDir = null;
        if (null !== $this->insertsRootDir) {
            $insertFileAbs = $this->insertsRootDir . "/" . $file;
            $insertDir = FileSystemTool::removeExtension($insertFileAbs);
            if (false === is_dir($insertDir)) {
                $insertDir = null;
            }
        }

        $wizard = new TemplateWizard($insertDir);


        //--------------------------------------------
        //
        //--------------------------------------------
        $content = $this->renderPage($template, $z, $wizard);


        if (null !== $this->translator) {
            $content = $this->translator->translate($content);
        }

        FileSystemTool::mkfile($fileAbs, $content);
    }


    /**
     * Calls the given $template file, with the user defined variables,
     * and returns the rendered result.
     *
     *
     *
     * @param string $template
     *
     * @param array $z
     * Array of user defined variables.
     *
     * @param TemplateWizard $zz
     * @return false|string
     */
    private function renderPage(string $template, array $z, TemplateWizard $zz): string
    {
        ob_start();
        include $template;
        return (string)ob_get_clean();
    }
}