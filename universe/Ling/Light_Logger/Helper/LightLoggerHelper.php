<?php


namespace Ling\Light_Logger\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light_Logger\Exception\LightLoggerException;

/**
 * The LightLoggerHelper class.
 */
class LightLoggerHelper
{


    /**
     * Copies the listeners from the given planet to our open registration system.
     * See the @page(Ling.Light_Logger conception notes) for more details.
     *
     * @param string $appDir
     * @param string $planetDotName
     */
    public static function copyListenersFromPluginToMaster(string $appDir, string $planetDotName)
    {
        $listenersFile = $appDir . "/config/data/$planetDotName/Ling.Light_Logger/listeners.byml";
        if (true === file_exists($listenersFile)) {
            $arr = BabyYamlUtil::readFile($listenersFile);


            foreach ($arr as $index => $item) {
                $instanceId = $planetDotName . "." . $index;

                if (true === array_key_exists('channels', $item)) {
                    $channels = $item['channels'];
                    if (true === array_key_exists('listener', $item)) {
                        $listenerArr = $item['listener'];

                        if (true === is_string($channels)) {
                            $channels = [$channels];
                        }
                        foreach ($channels as $channel) {
                            if ("*" === $channel) {
                                // not handled with open registration system
                                continue;
                            }
                            $dstFile = $appDir . "/config/open/Ling.Light_Logger/channels/$channel.byml";
                            $dstArr = [];
                            if (true === file_exists($dstFile)) {
                                $dstArr = BabyYamlUtil::readFile($dstFile);
                            }
                            $dstArr[$planetDotName][$instanceId] = $listenerArr;
                            BabyYamlUtil::writeFile($dstArr, $dstFile);
                        }


                    } else {
                        throw new LightLoggerException("Invalid listeners.byml file, \"listener\" property missing.");
                    }
                } else {
                    throw new LightLoggerException("Invalid listeners.byml file, \"channels\" property missing.");
                }

            }
        }
    }


    /**
     * Removes the listeners (defined by the given planet) from the master.
     *
     * This uses our open registration system.
     *
     * See the @page(Ling.Light_Logger conception notes) for more details.
     *
     * @param string $appDir
     * @param string $planetDotName
     */
    public static function removeListenersFromMaster(string $appDir, string $planetDotName)
    {
        $listenersFile = $appDir . "/config/data/$planetDotName/Ling.Light_Logger/listeners.byml";
        if (true === file_exists($listenersFile)) {
            $arr = BabyYamlUtil::readFile($listenersFile);


            foreach ($arr as $item) {
                if (true === array_key_exists('channels', $item)) {
                    $channels = $item['channels'];
                    if (true === array_key_exists('listener', $item)) {
                        if (true === is_string($channels)) {
                            $channels = [$channels];
                        }
                        foreach ($channels as $channel) {
                            if ("*" === $channel) {
                                // not handled with open registration system
                                continue;
                            }
                            $dstFile = $appDir . "/config/open/Ling.Light_Logger/channels/$channel.byml";
                            if (true === file_exists($dstFile)) {
                                $dstArr = BabyYamlUtil::readFile($dstFile);
                                if (true === array_key_exists($planetDotName, $dstArr)) {
                                    unset($dstArr[$planetDotName]);

                                    if (true === empty($dstArr)) {
                                        FileSystemTool::remove($dstFile);
                                    } else {
                                        BabyYamlUtil::writeFile($dstArr, $dstFile);
                                    }
                                }
                            }
                        }
                    }
                }

            }
        }
    }
}