<?php


namespace Ling\Light_Events\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\SectionComment\BabyYamlSectionCommentUtil;


/**
 * The LightEventsHelper class.
 */
class LightEventsHelper
{

    /**
     * Dispatches the $eventName event using a LightEvent object filled with the given $variables.
     *
     * See the [LightEvent class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) for more details.
     *
     *
     * @param LightServiceContainerInterface $container
     * @param $eventName
     * @param array $variables
     */
    public static function dispatchEvent(LightServiceContainerInterface $container, $eventName, array $variables)
    {
        $ev = $container->get("events");
        $event = LightEvent::createByContainer($container);
        foreach ($variables as $k => $v) {
            $event->setVar($k, $v);
        }
        $ev->dispatch($eventName, $event);
    }


    /**
     * Adds open events.
     *
     * This method implements the @page(basic open events convention).
     *
     *
     * @param LightServiceContainerInterface $container
     * @param string $planetDotName
     */
    public static function registerOpenEventByPlanet(LightServiceContainerInterface $container, string $planetDotName)
    {
        $appDir = $container->getApplicationDir();
        $pluginFile = $appDir . "/config/data/$planetDotName/Ling.Light_Events/open-events.byml";
        if (true === is_file($pluginFile)) {
            $arr = BabyYamlUtil::readFile($pluginFile);


            $util = new BabyYamlSectionCommentUtil();


            foreach ($arr as $eventName => $listeners) {
                $destFile = $appDir . "/config/open/Ling.Light_Events/events/$eventName.byml";



                $content = BabyYamlUtil::getBabyYamlString($listeners);
                $util->setFile($destFile);
                $util->addSection($planetDotName, $content);


            }

        }
    }


}