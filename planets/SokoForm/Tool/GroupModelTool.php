<?php


namespace SokoForm\Tool;


use Bat\ArrayTool;
use SokoForm\Exception\SokoException;

class GroupModelTool
{


    /**
     * @param array $groups
     * @param string $groupName
     * @return bool|array, the controls for the given group
     */
    public static function getGroupControls(array $groups, string $groupName)
    {
        $index = self::getIndexByGroupName($groups, $groupName);
        return $groups[$index]['controls'];
    }

    public static function hasGroup(array $groups, string $groupName)
    {
        foreach ($groups as $k => $group) {
            $name = $group['name'] ?? null;
            if ($groupName === $name) {
                return true;
            }
        }
        return false;
    }


    /**
     * @param array $groups , as returned by the SokoFormInterface.getGroups method
     * @param string $sectionName
     * @param array $controls
     */
    public static function changeGroupControls(array &$groups, string $sectionName, array $controls)
    {
        foreach ($groups as $k => $section) {
            $name = $section['name'] ?? null;
            if ($sectionName === $name) {
                $groups[$k]['controls'] = $controls;
            }
        }
    }


    /**
     * @param array $groups
     * @param string $groupName , the group name after which the new section will be inserted
     * @param array $sectionModel
     */
    public static function addGroupAfter(array &$groups, string $groupName, array $sectionModel)
    {
        $index = self::getIndexByGroupName($groups, $groupName);
        ArrayTool::insertRowAfter($index, $sectionModel, $groups);
    }


    public static function removeGroup(array &$groups, string $groupName)
    {
        $index = self::getIndexByGroupName($groups, $groupName);
        unset($groups[$index]);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getIndexByGroupName(array $groups, string $groupName)
    {
        foreach ($groups as $k => $group) {
            $name = $group['name'] ?? null;
            if ($groupName === $name) {
                return $k;
            }
        }
        throw new SokoException("group not found with name $groupName");
    }

}