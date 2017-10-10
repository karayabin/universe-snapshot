<?php


namespace Authenticate\BadgeStore;

/**
 * This is an experimental API and hasn't been tested yet.
 */
interface WritableBadgeStoreInterface extends BadgeStoreInterface
{
    /**
     * Commit changes performed by other methods
     */
    public function save();

    public function addProfile($name, array $badges, array $groups = []);

    public function addBadgesToProfile($name, array $badges);

    public function addGroupToProfile($name, array $group);

    public function addBadgesToGroup($name, array $badges);

    public function addGroupToGroup($name, array $group);

}