<?php


namespace Ling\ApplicationItemManager\Aware;


use Ling\ApplicationItemManager\ApplicationItemManagerInterface;

interface ApplicationItemManagerAwareInterface
{
    public function setApplicationItemManager(ApplicationItemManagerInterface $manager);
}