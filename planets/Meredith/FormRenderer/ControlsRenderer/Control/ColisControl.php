<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

use Meredith\Exception\MeredithException;

/**
 * LingTalfi 2016-01-13
 *
 */
class ColisControl extends Control implements ColisControlInterface
{

    private $maxSize;
    private $extensions;
    private $profileId;
    private $itemNames;
    private $jsCallbacks;
    private $previewOptions;
    private $chunkSize;

    public function __construct()
    {
        parent::__construct();
        $this->itemNames = [];
        $this->maxSize = '2000mb';
        $this->chunkSize = '1mb';
        $this->extensions = '*';
        $this->profileId = 'default';
        $this->jsCallbacks = [];
        $this->previewOptions = [];

    }

    public function getExtensions()
    {
        return $this->extensions;
    }

    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
        return $this;
    }

    public function getItemNames()
    {
        return $this->itemNames;
    }

    public function setItemNames(array $itemNames)
    {
        $this->itemNames = $itemNames;
        return $this;
    }

    public function getMaxSize()
    {
        return $this->maxSize;
    }

    public function setMaxSize($maxSize)
    {
        $this->maxSize = $maxSize;
        return $this;
    }

    public function getProfileId()
    {
        return $this->profileId;
    }

    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
        return $this;
    }

    public function getOnPreviewDisplayAfterJsCallback()
    {
        return $this->getJsCallback('onPreviewDisplayAfter');
    }

    public function getChunkSize()
    {
        return $this->chunkSize;
    }


    public function setChunkSize($chunkSize)
    {
        $this->chunkSize = $chunkSize;
        return $this;
    }

    public function setJsCallback($name, $file)
    {
        $this->jsCallbacks[$name] = $file;
        return $this;
    }

    public function getPreviewOptions()
    {
        return $this->previewOptions;
    }

    public function setPreviewOptions(array $previewOptions)
    {
        $this->previewOptions = $previewOptions;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getJsCallback($name)
    {
        if (array_key_exists($name, $this->jsCallbacks)) {
            $file = $this->jsCallbacks[$name];
            if (file_exists($file)) {
                return file_get_contents($file);
            }
            else {
                throw new MeredithException("ColisControl: No callback found with name: $name");
            }
        }
        return 'function(){}';
    }

}