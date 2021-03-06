<?php


namespace Ling\Updf;


use Ling\Updf\Exception\UpdfException;
use Ling\Updf\Model\BodyModelInterface;
use Ling\Updf\Model\FooterModel;
use Ling\Updf\Model\FooterModelInterface;
use Ling\Updf\Model\ModelInterface;
use Ling\Updf\Model\TemplateAwareModelInterface;
use Ling\Updf\Tcpdf\Utcpdf;
use Ling\Updf\TemplateLoader\TemplateLoader;
use Ling\Updf\TemplateLoader\TemplateLoaderInterface;


/**
 * This class requires tcpdf to be loaded.
 *          require_once __DIR__ . "/TCPDF/tcpdf.php";
 */
class Updf
{

    protected $templateName;
    protected $footerTemplateName;
    protected $templateLoader;
    protected $vars;

    /**
     * @var ModelInterface
     */
    protected $model;
    protected $footerModel;

    private $tcpdf;
    private $footerDisabled;
    private $pdfName;

    public function __construct()
    {
        $this->tcpdf = new Utcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->vars = [];
        $this->tcpdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $this->tcpdf->SetFont('dejavusans', '', 10);
        $this->tcpdf->setHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
        $this->tcpdf->AddPage();
        $this->footerDisabled = false;
    }

    public static function create()
    {
        return new static();
    }


    public function setName($name)
    {
        $this->pdfName = $name;
        return $this;
    }

    public function setTemplate($templateName, $footerTemplateName = null)
    {
        $this->templateName = $templateName;
        $this->footerTemplateName = $footerTemplateName;
        return $this;
    }

    public function setTemplateLoader(TemplateLoaderInterface $loader)
    {
        $this->templateLoader = $loader;
        return $this;
    }

    public function setVariables(array $vars)
    {
        $this->vars = $vars;
        return $this;
    }

    public function setModel(ModelInterface $model)
    {
        $this->model = $model;
        return $this;
    }


    public function setFooterModel(FooterModelInterface $model = null)
    {
        $this->footerModel = $model;
        return $this;
    }

    public function disableFooter()
    {
        $this->footerDisabled = true;
        return $this;
    }


    /**
     * @param null|false|string $type
     *          Defines how the pdf should be rendered.
     *          The default value is null, which means
     *          the pdf is rendered in the browser (using any pdf plugin
     *          the browser has).
     *
     *          If the $type is a string, then it's the path of the pdf file to create.
     *          If it's false, the tcpdf instance is returned, so that you can yourself call
     *          it's Output method with your options.
     *
     *
     *
     *
     *
     */
    public function render($path = null)
    {


        $this->injectFooter();


        if (null !== $this->model) {

            $fontName = $this->model->getFont();
            if (null !== $fontName) {
                $this->tcpdf->SetFont($fontName, '', 10);
            }
        }


        $html = $this->renderModel($this->model, $this->templateName);

        $this->tcpdf->writeHTML($html, true, 0, true);


        if (false === $path) {
            return $this->tcpdf;
        }


        /**
         * Output the pdf
         */
        if (is_string($path)) {
            $fileName = $path;
            $dest = 'F';
        } else {
            $fileName = (null !== $this->pdfName) ? $this->pdfName : 'output.pdf';
            $dest = 'I';
        }
        $this->tcpdf->Output($fileName, $dest);
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function renderModel(ModelInterface $model = null, $templateName)
    {

        if ($model instanceof TemplateAwareModelInterface) {
            $model->setTemplate($templateName);
        }

        /**
         * prepare the variables
         */
        $vars = $this->vars;
        if ($model instanceof ModelInterface) {
            $vars = array_merge($model->getVariables(), $vars);
        }
        /**
         * Interpret the content and inject the variables
         */
        return $this->renderTemplate($templateName, $vars, $model);

    }


    /**
     * This method is responsible for injecting the variables
     * into the template (and thus resolving them).
     *
     * Inside a template, you can call other templates using {this} notation,
     * with the template name inside the curly braces (for instance {invoice.addresses}).
     *
     */
    protected function renderTemplate($templateName, array $vars, $context = null)
    {


        /**
         * get the uninterpreted content
         */
        $content = '';

        $loader = $this->getTemplateLoader();


        if (false !== ($_content = $loader->load($templateName, $context))) {
            $content = $_content;
        } else {
            throw new UpdfException("Couldn't load the template content for " . $templateName);
        }


        if (false !== ($path = $this->tmpFile($content))) {
            /**
             * Prepare vars
             */
            $varsKeys = [];
            $varsValues = [];
            foreach ($vars as $k => $v) {
                if (!is_array($v)) {
                    $varsKeys[] = '__' . $k . '__';
                    $varsValues[] = $v;
                }
            }


            /**
             * Convert all variables accessible as objects.
             * (i.e. $v->my_var withing the template)
             *
             */
            $v = json_decode(json_encode($vars), false);

            /**
             * First interpret the template's php if any
             */

            ob_start();
            include $path;
            $content = ob_get_clean();


            /**
             * Then inject variables into the template
             */
            $content = str_replace($varsKeys, $varsValues, $content);
            $content = preg_replace_callback('!{([a-zA-Z_][a-zA-Z0-9._-]*)}!', function ($m) use ($vars, $context) {
                $tplName = $m[1];
                return $this->renderTemplate($tplName, $vars, $context);
            }, $content);


            return $content;


        } else {
            throw new UpdfException("Cannot create the temporary file to create content");
        }
    }


    /**
     * @return TemplateLoaderInterface
     */
    protected function getTemplateLoader()
    {
        if (null === $this->templateLoader) {
            $this->templateLoader = new TemplateLoader();
        }
        return $this->templateLoader;
    }


    /**
     * @return FooterModelInterface
     */
    public function getFooterModel()
    {
        if (false === $this->footerDisabled) {
            if (null === $this->footerModel) {
                $this->footerModel = new FooterModel();
            }
            return $this->footerModel;
        }
        return null;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function tmpFile($content)
    {
        $tmpfname = @tempnam("/tmp/updf", "FOO"); // https://github.com/Glavin001/atom-beautify/issues/1108
        file_put_contents($tmpfname, $content);
        return $tmpfname;
    }

    private function injectFooter()
    {

        $footerModel = $this->getFooterModel();
        if ($footerModel instanceof FooterModelInterface) {
            $this->tcpdf->setFooterCallback(function (Utcpdf $utcpdf) use ($footerModel) {
                // Position at 15 mm from bottom
                $utcpdf->SetY(-15);

                // Set font
                $utcpdf->SetFont('helvetica', 'I', 8);

                $footerModel->setPageNumber($utcpdf->getAliasNumPage());
                $footerModel->setNbTotalPages($utcpdf->getAliasNbPages());
                $html = $this->renderModel($footerModel, 'footer');
                $utcpdf->writeHTML($html, true, 0, true);
            });
        }
    }


}