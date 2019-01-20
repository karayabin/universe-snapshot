<?php


namespace SequenceMatcher\Util;


use SequenceMatcher\Element\AlternateGroupInterface;
use SequenceMatcher\Element\EntityInterface;
use SequenceMatcher\Element\GroupInterface;
use SequenceMatcher\Model;

class DebugUtil
{

    public static function modelToString(Model $model)
    {
        $s = self::groupToString($model);
        return $s;
    }

    private static function groupToString(GroupInterface $group)
    {
        $s = '';
        $els = $group->getElements();
        foreach ($els as $elInfo) {
            $el = $elInfo[0];
            $modificator = $elInfo[1];
            if ($el instanceof EntityInterface) {
                $s .= $el;
                $s .= $modificator;
            } else if ($el instanceof GroupInterface) {
                $s .= '(';
                $s .= self::groupToString($el);
                $s .= ')';
                $s .= $modificator;
            } elseif ($el instanceof AlternateGroupInterface) {
                $i = 0;

                $s .= '(';
                foreach ($el->getAlternatives() as $altInfo) {
                    if (0 !== $i++) {
                        $s .= '|';
                    }
                    $alt = $altInfo[0];
                    $modifi = $altInfo[1];
                    $s .= self::groupToString($alt);
                    $s .= $modifi;
                }
                $s .= ')';
                $s .= $modificator;
            }

        }
        return $s;
    }
}