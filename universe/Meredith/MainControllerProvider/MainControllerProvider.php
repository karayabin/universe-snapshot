<?php

namespace Meredith\MainControllerProvider;

/*
 * LingTalfi 2016-01-01
 */
use Meredith\MainController\MainControllerInterface;

class MainControllerProvider implements MainControllerProviderInterface
{

    private $mainController;
    private $dir;

    public function __construct()
    {
        //
    }

    public static function create()
    {
        return new static();
    }

    /**
     * @return MainControllerInterface
     */
    public function getMainController($formId)
    {
        $f = $this->dir . "/" . $formId . ".php";
        if (file_exists($f)) {
            require_once $f;
            if (isset($mainController) && $mainController instanceof MainControllerInterface) {
                $this->mainController = $mainController;
            }
        }
        
        // ...
        
        
        if (!$this->mainController instanceof MainControllerInterface) {
            throw new \Exception("Couldn't find a mainController with formId $formId");
        }
        return $this->mainController;
    }

    public function setMainController(MainControllerInterface $mainController)
    {
        $this->mainController = $mainController;
        return $this;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }
    
    


}
