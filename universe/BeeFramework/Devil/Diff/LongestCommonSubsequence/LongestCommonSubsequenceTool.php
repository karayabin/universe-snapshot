<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Devil\Diff\LongestCommonSubsequence;


/**
 * LongestCommonSubsequenceTool
 * @author Lingtalfi
 * 2014-08-26
 *
 */
class LongestCommonSubsequenceTool
{


    public static function longestCommonSubsequence($a, $b)
    {
        if (is_string($a)) {
            if (is_string($b)) {


                $left = str_split($a);
                $right = str_split($b);

                $m = count($left);
                $n = count($right);

                // $a[$i][$j] = length of LCS of $left[$i..$m] and $right[$j..$n]
                $a = array();

                // compute length of LCS and all subproblems via dynamic programming
                for ($i = $m - 1; $i >= 0; $i--) {
                    for ($j = $n - 1; $j >= 0; $j--) {
                        if ($left[$i] == $right[$j]) {
                            $a[$i][$j] = (isset($a[$i + 1][$j + 1]) ? $a[$i + 1][$j + 1] : 0) + 1;
                        }
                        else {
                            $a[$i][$j] = max(
                                (isset($a[$i + 1][$j]) ? $a[$i + 1][$j] : 0)
                                , (isset($a[$i][$j + 1]) ? $a[$i][$j + 1] : 0)
                            );
                        }
                    }
                }

                // recover LCS itself
                $i = 0;
                $j = 0;
                $lcs = array();

                while ($i < $m && $j < $n) {
                    if ($left[$i] == $right[$j]) {
                        $lcs[] = $left[$i];

                        $i++;
                        $j++;
                    }
                    elseif (
                        (isset($a[$i + 1][$j]) ? $a[$i + 1][$j] : 0)
                        >= (isset($a[$i][$j + 1]) ? $a[$i][$j + 1] : 0)
                    ) {
                        $i++;
                    }
                    else {
                        $j++;
                    }
                }

                return implode('', $lcs);
            }
            else {
                throw new \InvalidArgumentException("argument b must be a string");
            }
        }
        else {
            throw new \InvalidArgumentException("argument a must be a string");
        }
    }
}
