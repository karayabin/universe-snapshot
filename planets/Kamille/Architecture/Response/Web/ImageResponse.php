<?php


namespace Kamille\Architecture\Response\Web;


use Bat\FileSystemTool;
use Kamille\Exception\KamilleException;

class ImageResponse extends HttpResponse
{

    protected $file;
    protected $extension;


    public function __construct($content = "", $code = 200)
    {
        parent::__construct($content, $code);
    }


    public function setFile(string $file, string $extension = null)
    {
        if (null === $extension) {
            $extension = FileSystemTool::getFileExtension($file);
        }
        $this->file = $file;
        $this->extension = $extension;
        return $this;
    }


    public function send()
    {
        header('Content-type: image/' . $this->extension);
        parent::send();
    }


    protected function sendContent()
    {
        if (file_exists($this->file)) {
            echo file_get_contents($this->file);
        } else {
            throw new KamilleException("File not found: " . $this->file);
        }
    }


}