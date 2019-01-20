<?php


namespace Kamille\Architecture\Response\Web;


class JsonResponse extends HttpResponse
{

    public function __construct($content = "", $code = 200)
    {
        parent::__construct($content, $code);
        header('Content-Type: application/json');
    }


    protected function sendContent()
    {
        echo json_encode($this->content);
    }

}