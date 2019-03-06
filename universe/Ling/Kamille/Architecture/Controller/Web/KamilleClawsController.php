<?php


namespace Ling\Kamille\Architecture\Controller\Web;


use Ling\Kamille\Architecture\Controller\Exception\ClawsHttpResponseException;
use Ling\Kamille\Architecture\Response\Web\HttpResponse;
use Ling\Kamille\Utils\Claws\Claws;
use Ling\Kamille\Utils\Claws\Renderer\ClawsRenderer;

class KamilleClawsController extends KamilleController
{


    protected $claws;
    protected $clawsRenderer;
    protected $clawsReturn;


    public function renderClaws($prepareMethod = null)
    {
        try {
            if (null === $prepareMethod) {
                $prepareMethod = 'prepareClaws';
            }
            $this->$prepareMethod();
            $ret = $this->doRenderClaws();
        } catch (\Exception $e) {
            $ret = $this->handleClawsException($e);
        }
        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getClaws()
    {
        if (null === $this->claws) {
            $this->claws = new Claws();
        }
        return $this->claws;
    }


    protected function handleClawsException(\Exception $e)
    {
        if ($e instanceof ClawsHttpResponseException) {
            return $e->getHttpResponse();
        }
        return false;
    }


    protected function prepareClaws() // override me
    {

    }

    protected function doRenderClaws()
    {
        if (null !== $this->clawsReturn) {
            return $this->clawsReturn;
        }
        $claws = $this->getClaws();
        $renderer = $this->getClawsRenderer();
        $content = $renderer->setClaws($claws)->render();
        return HttpResponse::create($content);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getClawsRenderer()
    {
        if (null === $this->clawsRenderer) {
            $this->clawsRenderer = new ClawsRenderer();
        }
        return $this->clawsRenderer;
    }


}