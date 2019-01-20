<?php


namespace ApplicationItemManager\Aware;


use ApplicationItemManager\ApplicationItemManagerInterface;

interface ApplicationItemManagerAwareInterface
{
    public function setApplicationItemManager(ApplicationItemManagerInterface $manager);
}