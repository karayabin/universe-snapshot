<?php

namespace ArrayStore;


use ArrayExport\ArrayExport;
use Bat\FileSystemTool;

class ArrayStore
{


    private $_path;

    private function __construct()
    {
        $this->_path = null;
    }

    public static function create()
    {
        return new self();
    }

    public function path($path)
    {
        $this->_path = $path;
        return $this;
    }


    public function store(array $store)
    {
        $content = '<?php' . PHP_EOL . PHP_EOL;
        $content .= '$store = ';
        $content .= ArrayExport::export($store);
        $content .= ';' . PHP_EOL;
        return FileSystemTool::mkfile($this->_path, $content);
    }

    public function retrieve()
    {
        $store = [];
        if (file_exists($this->_path)) {
            require $this->_path;
        }
        return $store;
    }


}