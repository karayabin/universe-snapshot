<?php


namespace Authenticate\BadgeStore;


interface BadgeStoreInterface
{

    /**
     * @param string $profile
     * @return array of badges for the given profile
     */
    public function getBadges($profile);
    public function hasBadge($badge, $profile);
}