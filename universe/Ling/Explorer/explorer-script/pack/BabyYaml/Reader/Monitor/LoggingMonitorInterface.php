<?php


namespace BabyYaml\Reader\Monitor;


/**
 * LoggingMonitorInterface
 * @author Lingtalfi
 * 2015-05-07
 *
 */
interface LoggingMonitorInterface extends MonitorInterface
{
    
    public function addListener($listener);

    public function setListeners(array $listeners);

    public function removeListeners();
}
