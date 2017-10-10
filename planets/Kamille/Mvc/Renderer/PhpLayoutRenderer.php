<?php


namespace Kamille\Mvc\Renderer;

use Kamille\Mvc\Layout\LayoutAwareInterface;
use Kamille\Mvc\Layout\LayoutInterface;
use Kamille\Mvc\LayoutProxy\LayoutProxy;
use Kamille\Mvc\LayoutProxy\LayoutProxyInterface;
use Kamille\Mvc\LayoutProxy\VariablesAwareLayoutProxyInterface;
use Kamille\Mvc\Renderer\Exception\RendererException;


/**
 * In this class, to interpret the uninterpreted php content,
 * I chose to create a tmp file first, because it's easier to debug (you get an actual file rather than
 * an eval error that you cannot open).
 *
 * Variables passed to the template are:
 *
 * - $v, an object containing all the variables
 * - $l, a layout proxy which allows a call to the widget(widgetName) method, which renders a given widget in place
 *
 * The template can also use a standard {tag} replacement mechanism, instead of/in addition to
 * the $v variable.
 *
 * Both methods ($v or {tag}) allow access to variables, but the variable form is more flexible since
 * it can be manipulated with php (the {tag} form is just part of the html).
 *
 *
 *
 */
class PhpLayoutRenderer extends LayoutRenderer
{

    protected $layoutProxy;


    public static function create()
    {
        return new static();
    }

    public function render($uninterpretedContent, array $variables)
    {

        if (false !== ($path = $this->tmpFile($uninterpretedContent))) {


            /**
             * Prepare vars
             */
            $v = $variables;
            $__varsKeys = [];
            $__varsValues = [];
            foreach ($v as $k => $v1) {
                if (!is_array($v1) && !is_object($v1)) {
                    $__varsKeys[] = '{' . $k . '}';
                    $__varsValues[] = $v1;
                } else {

                    // use namespaces?

                    $p = explode(':', $k, 2);
                    if (array_key_exists(1, $p)) {

                        $key = $p[1];
                        unset($v[$k]);
                        $v[$key] = $v1;

                        if (is_array($v1)) {
                            foreach ($v1 as $k2 => $v2) {
                                if (!is_array($v2) && !is_object($v2)) {
                                    $__varsKeys[] = '{' . $p[0] . ':' . $k2 . '}';
                                    $__varsValues[] = $v2;
                                }
                            }
                        }
                    }
                }
            }

            /**
             * Convert all variables accessible as objects.
             * (i.e. $v->my_var withing the template)
             */
            $l = $this->getLayoutProxy();
            if ($l instanceof VariablesAwareLayoutProxyInterface) {
                $l->setVariables($v);
            }


            /**
             * First interpret the template's php if any
             */
            ob_start();
            $__exCEption_ = false;
            try {
                include $path;
            } catch (\Exception $e) {
                $__exCEption_ = $e;
            }
            $content = ob_get_clean();


            /**
             * Then replace tags
             */
            $content = str_replace($__varsKeys, $__varsValues, $content);

            if (false !== $__exCEption_) {
                throw $__exCEption_;
            }

            return $content;

        } else {
            throw new RendererException("Cannot create the temporary file to create content");
        }
    }


    /**
     * The layout proxy is the object passed to the template:
     * the object that the template can refer to via the $l variable.
     */
    public function setLayoutProxy(LayoutProxyInterface $proxy)
    {
        $this->layoutProxy = $proxy;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function replaceTags(&$content)
    {

    }

    public function setLayout(LayoutInterface $layout)
    {
        if ($this->layoutProxy instanceof LayoutAwareInterface) {
            $this->layoutProxy->setLayout($layout);
        }
        return parent::setLayout($layout);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function tmpFile($content)
    {
        $tmpfname = @tempnam("/tmp/PhpLayoutRenderer", "FOO"); // @ to avoid: Notice: tempnam(): file created in the system's temporary directory
        file_put_contents($tmpfname, $content);
        return $tmpfname;
    }


    protected function getLayoutProxy()
    {
        if (null === $this->layoutProxy) {
            $this->layoutProxy = new LayoutProxy();
            $this->layoutProxy->setLayout($this->layout);
        }
        return $this->layoutProxy;
    }
}