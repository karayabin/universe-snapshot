<?php

namespace BullSheet\Tool;

/*
 * LingTalfi 2016-02-11
 */
class ProbabilityTool
{

    /**
     * @param array $values2Weights
     *                  the value is a string
     *                  the weight is a positive int
     *
     * @return mixed - the randomly chosen value, with consideration of the given weights
     */
    public static function resolveWeight(array $values2Weights)
    {
        $ret = null;
        arsort($values2Weights);

        $sum = array_sum($values2Weights);
        $num = mt_rand(1, $sum);
        $inc = 0;
        foreach ($values2Weights as $k => $coef) {
            $coef += $inc;
            if ($num <= $coef) {
                $ret = $k;
                break;
            }
            $inc = $coef;
        }
        return $ret;
    }

    /**
     * Resolve an array of key => values2Weights (see the resolveWeight method arguments)
     * @param array $weights
     * @return array
     */
    public static function resolveWeights(array $weights)
    {
        $ret = [];
        foreach ($weights as $key => $info) {
            if (1 === count($info)) {
                $ret[$key] = key($info);
            }
            else {
                $ret[$key] = ProbabilityTool::resolveWeight($info);
            }
        }
        return $ret;
    }
}
