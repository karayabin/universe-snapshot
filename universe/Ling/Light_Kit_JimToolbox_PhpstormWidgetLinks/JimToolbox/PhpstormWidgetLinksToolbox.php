<?php


namespace Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\JimToolbox;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_JimToolbox\Item\JimToolboxItemBaseHandler;
use Ling\Light_Kit_DebugTrace\Service\LightKitDebugTraceService;
use Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\Exception\LightKitJimToolboxPhpstormWidgetLinksException;


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


            $file = 'none';
            $arr = $this->getKitConf($currentUri, $file);

            if (true === array_key_exists("kit_conf", $arr)) {

                $conf = $arr['kit_conf'];
                $conf['controller'] = null;


                $controller = $arr['route']['controller'] ?? null;
                if (null !== $controller) {
                    $info = $this->getControllerInfoByControllerString($controller);
                    $conf['controller'] = $info['relPath'];
                    $conf['controllerShortName'] = $info['shortName'];
                }


                if (true === array_key_exists("babyYamlPage", $conf)) {
                    $babyPage = $conf['babyYamlPage'];
                    $conf['babyPagePath'] = $babyPage['file'];
                    $conf['babyPageLabel'] = $babyPage['name'];

                }


                ob_start();
                require_once __DIR__ . "/pane_body.inc.php";
                return ob_get_clean();
            } else {
                $this->error("kit_conf property not found in the debug trace file: $file.");
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
     * Returns the kit conf array for the given uri, and sets the file it came from (if any).
     *
     * @param string $uri
     * @param string|null $file
     * @return array
     * @throws \Exception
     */
    protected function getKitConf(string $uri, string &$file = null): array
    {
        /**
         * @var $deb LightKitDebugTraceService
         */
        $deb = $this->container->get("kit_debugtrace");
        $file = $deb->getTargetDirFilePathByUri($uri);
        if (true === file_exists($file)) {
            return BabyYamlUtil::readFile($file);
        }
        return [];
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
        throw new LightKitJimToolboxPhpstormWidgetLinksException(static::class . ": " . $msg, $code);
    }


    /**
     * Returns an array of info about the controller identified by the given controller string.
     *
     * The returned array has the following structure:
     *
     * - relPath: string, the relative path to the controller file (from the app root dir)
     * - shortName: string, the short name of the controller class
     *
     *
     * Example of controller string:
     *
     * - Ling\Light_Kit_Store\Controller\Front\StoreSearchResultsController->render
     *
     *
     *
     * @param string $controllerString
     * @return array
     */
    private function getControllerInfoByControllerString(string $controllerString): array
    {
        $p = explode("->", $controllerString, 2);
        $controller = array_shift($p);
        $relPath = "universe/" . str_replace('\\', '/', $controller) . ".php";


        $p = explode("\\", $controller);
        $shortName = array_pop($p);

        return [
            'relPath' => $relPath,
            'shortName' => $shortName,
        ];
    }
}