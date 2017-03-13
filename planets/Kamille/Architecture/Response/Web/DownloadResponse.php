<?php


namespace Kamille\Architecture\Response\Web;


class DownloadResponse implements HttpResponseInterface
{

    private $file;
    private $mime;


    public function __construct($file, $mime = null)
    {
        $this->file = $file;
        $this->mime = $mime;
    }


    public static function create($file, $mime = null)
    {
        return new static($file, $mime);
    }


    public function send()
    {
        header('Content-Description: File Transfer');

        $mime = $this->mime;
        if (null === $mime) {
            if (function_exists("mime_content_type")) {
                $mime = mime_content_type($this->file);
            }
        }
        if (null === $mime) {
            $mime = "application/octet-stream";
        }

        header('Content-Type: ' . $mime);
        header('Content-Disposition: attachment; filename="' . basename($this->file) . '"');
        header('Expires: 0');
        header('Content-Length: ' . filesize($this->file));
        header('Cache-Control: private');
        readfile($this->file);
    }


}