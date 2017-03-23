<?php


namespace Kamille\Architecture\Controller\Web;



use Kamille\Architecture\Controller\ControllerInterface;
use Kamille\Architecture\Controller\Exception\ControllerException;
use Kamille\Architecture\Response\Web\HttpResponse;
use Kamille\Architecture\Response\Web\HttpResponseInterface;
use Kamille\Ling\Z;

class StaticPageController implements ControllerInterface
{

    private $pagesDir;



    public function handlePage()
    {

        $page = Z::getUrlParam('page', null, true);

        $file = $this->pagesDir . "/" . $page;
        if (file_exists($file)) {
            $response = $this->getFileContent($file);
            if ($response instanceof HttpResponseInterface) {
                while (ob_get_level()) {
                    ob_end_clean();
                }
                return $response;
            } else {
                throw new ControllerException("Controller did not return an HttpResponseInterface with page $page");
            }
        } else {
            throw new ControllerException("File not found: $file, for page $page");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setPagesDir($pagesDir)
    {
        $this->pagesDir = $pagesDir;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getFileContent($file)
    {
        ob_start();
        /**
         * Note: from inside file, you can return a Response directly (RedirectResponse, DownloadResponse, ...)
         */
        include $file;
        $s = ob_get_clean();
        return HttpResponse::create($s);
    }

}