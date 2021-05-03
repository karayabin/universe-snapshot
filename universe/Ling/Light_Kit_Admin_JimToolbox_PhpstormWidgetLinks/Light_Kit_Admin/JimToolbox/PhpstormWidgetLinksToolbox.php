<?php


namespace Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Light_Kit_Admin\JimToolbox;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_Kit_Admin\JimToolbox\JimToolboxItemBaseHandler;
use Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService;
use Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Exception\LightKitAdminJimToolboxPhpstormWidgetLinksException;


/**
 * The PhpstormWidgetLinksToolbox class.
 */
class PhpstormWidgetLinksToolbox extends JimToolboxItemBaseHandler
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

        if (true === array_key_exists('currentUri', $params)) {

            $currentUri = $params['currentUri'];
            $jetbrainProject = $params['project'];


            /**
             * @var $deb LightKitAdminDebugTraceService
             */
            $deb = $this->container->get("kit_admin_debugtrace");
            $file = $deb->getTargetDirFilePathByUri($currentUri);
            $arr = BabyYamlUtil::readFile($file);
            if (true === array_key_exists("kit_admin_conf", $arr)) {

                $conf = $arr['kit_admin_conf'];


                ob_start();
                require_once __DIR__ . "/pane_body.inc.php";
                return ob_get_clean();
            } else {
                $this->error("kit_admin_conf property not found in the lka debug trace file: $file.");
            }
        } else {
            $this->error("Missing currentUri parameter.");
        }
    }

    /**
     * @implementation
     */
    public function getPaneTitle(): string
    {
        return "Phpstorm widget links";
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
        throw new LightKitAdminJimToolboxPhpstormWidgetLinksException(static::class . ": " . $msg, $code);
    }
}