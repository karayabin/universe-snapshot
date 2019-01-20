<?php


namespace Kamille\Architecture\Response\Web;


class PdfResponse extends HttpResponse
{

    protected $fileName;


    public function __construct($content = "", $code = 200)
    {
        parent::__construct($content, $code);
        header("Content-type:application/pdf");


    }

    public function setFileName(string $fileName)
    {
        $fileName = str_replace('"', '\"', $fileName);
        header("Content-Disposition:attachment;filename=$fileName");
    }


}