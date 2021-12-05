<?php


namespace Ling\Light_Kit_JimToolbox_LingTools\JimToolbox;


use Ling\Light_EasyRoute\Helper\LightEasyRouteHelper;
use Ling\Light_JimToolbox\Item\JimToolboxItemBaseHandler;
use Ling\Light_Kit_JimToolbox_LingTools\Exception\LightKitJimToolboxLingToolsException;


/**
 * The LingToolsToolbox class.
 */
class LingToolsToolbox extends JimToolboxItemBaseHandler
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function getPaneBody(array $params): string
    {

        $conf = [
            'routesPath' => LightEasyRouteHelper::getMasterRelativePath(),
            'project' => $params['project'],
        ];

        ob_start();
        require_once __DIR__ . "/pane_body.inc.php";
        return ob_get_clean();
    }

    /**
     * @implementation
     */
    public function getPaneTitle(): string
    {
        return "Ling Tools";
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitJimToolboxLingToolsException(static::class . ": " . $msg, $code);
    }

}