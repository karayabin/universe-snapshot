<?php


namespace Authenticate\BadgeStore;

use Authenticate\BadgeStore\Exception\BadgeStoreException;

/**
 * This badge store stores the badges in a file.
 *
 * Here is the format used in the storage file.
 *
 * <?php
 *
 *
 * $store = [
 *      'profiles' => [
 *          "root" => [
 *              "groups" => [
 *                  "group3",
 *              ],
 *              "badge1",
 *              "badge2",
 *          ],
 *      ],
 *      'groups' => [
 *          "group1" => [
 *              "groups" => [],
 *              "badge3",
 *              "badge4",
 *          ],
 *          "group2" => [
 *              "groups" => [],
 *              "badge5",
 *              "badge6",
 *          ],
 *          "group3" => [
 *              "groups" => [
 *                  "group1",
 *              ],
 *              "badge7",
 *              "badge8",
 *          ],
 *      ],
 * ];
 *
 *
 * The "profiles" key is mandatory at the root level, and the "groups" keys are mandatory at every level.
 * This is not a recursive structure, the notation looks like this:
 *
 * - store:
 * ----- profiles:
 * --------- (profile)
 * ------------- groups: array of group names
 * ------------- *: badge name
 * ----- groups:
 * --------- (group)
 * ------------- groups: array of group names
 * ------------- *: badge name
 *
 *
 *
 */
class FileBadgeStore implements BadgeStoreInterface
{

    private $file;
    private $profile2Badgges;


    public function __construct()
    {
        $this->profile2Badgges = [];
    }

    public static function create()
    {
        return new static();
    }

    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }


    /**
     * @param string $profile
     * @return array of badges for the given profile
     */
    public function getBadges($profile)
    {
        $ret = [];
        if (file_exists($this->file)) {
            $store = [];
            include $this->file;
            $ret = self::getBadgesByProfile($profile, $store);
        }
        return $ret;
    }

    public function hasBadge($badge, $profile)
    {
        if (false === array_key_exists($profile, $this->profile2Badgges)) {
            $this->profile2Badgges[$profile] = $this->getBadges($profile);
        }
        return in_array($badge, $this->profile2Badgges[$profile], true);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($type, $param = null)
    {
        $msg = "";
        switch ($type) {
            case 'groupNotFound':
                $msg = "group not found: $param";
                break;
            default:
                break;
        }
        $this->executeError($msg);
    }

    protected function executeError($msg)
    {
        throw new BadgeStoreException($msg);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getBadgesByProfile($profile, array $store)
    {
        $ret = [];
        $profiles = $store['profiles'];

        if (array_key_exists($profile, $profiles)) {

            $flatGroups = self::getFlatGroups($store['groups']);
            $aProfile = $profiles[$profile];

            foreach ($aProfile as $k => $pro) {
                if ('groups' === $k) {
                    foreach ($pro as $groupName) {
                        if (array_key_exists($groupName, $flatGroups)) {
                            $ret = array_merge($ret, $flatGroups[$groupName]);
                        } else {
                            $this->error("groupNotFound", $groupName);
                        }
                    }
                } else {
                    $ret[] = $pro;
                }
            }
        }
        $ret = array_unique($ret);
        return $ret;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getFlatGroups(array $groups)
    {
        $ret = [];
        foreach ($groups as $name => $groupInfo) {
            $parsedGroups = [];
            $ret[$name] = self::getBadgesByGroup($name, $groups, $parsedGroups);
        }
        return $ret;
    }

    private static function getBadgesByGroup($groupName, array $groups, array &$parsedGroups = [])
    {
        $ret = [];
        $parsedGroups[$groupName] = true;
        if (array_key_exists($groupName, $groups)) {
            $groupInfo = $groups[$groupName];
            foreach ($groupInfo as $k => $v) {
                if ('groups' === $k) {
                    foreach ($v as $group) {
                        if (!array_key_exists($group, $parsedGroups)) {
                            $badges = self::getBadgesByGroup($group, $groups, $parsedGroups);
                            $ret = array_merge($ret, $badges);
                        }
                    }
                } else {
                    $ret[] = $v;
                }
            }
        }
        $ret = array_unique($ret);
        return $ret;
    }
}