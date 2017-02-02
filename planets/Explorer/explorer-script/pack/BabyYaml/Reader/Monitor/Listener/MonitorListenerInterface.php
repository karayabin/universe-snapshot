<?php


namespace BabyYaml\Reader\Monitor\Listener;


/**
 * MonitorListenerInterface
 * @author Lingtalfi
 * 2015-05-07
 *
 */
interface MonitorListenerInterface
{

    public function listen($msg, array $tags);
}
