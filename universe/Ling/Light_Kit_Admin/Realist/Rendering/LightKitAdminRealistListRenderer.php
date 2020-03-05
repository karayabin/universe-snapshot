<?php


namespace Ling\Light_Kit_Admin\Realist\Rendering;


use Ling\Bootstrap4AdminTable\Renderer\StandardBootstrap4AdminTableRenderer;

/**
 * The LightKitAdminRealistListRenderer class.
 */
class LightKitAdminRealistListRenderer extends StandardBootstrap4AdminTableRenderer
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->jsSnippets[] = file_get_contents(__DIR__ . "/js/js-vars.js");
    }


}