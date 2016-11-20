<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-13
 *
 */
interface ColisControlInterface extends ControlInterface
{

    /**
     * @return string, the plupload corresponding setting (2000mb for instance)
     */
    public function getMaxSize();

    /**
     * @return string, the plupload corresponding setting (jpg,jpeg,png,gif for instance)
     */
    public function getExtensions();

    /**
     * @return string
     */
    public function getProfileId();

    /**
     * @return array, item names to start with
     */
    public function getItemNames();

    public function getOnPreviewDisplayAfterJsCallback();

    /**
     * @return array
     */
    public function getPreviewOptions();
    
    public function getChunkSize();

    
}