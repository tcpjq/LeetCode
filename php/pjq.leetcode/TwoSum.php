<?php

/**
 * 两数之和：
 * @desc https://leetcode-cn.com/problems/two-sum/
 * Class TwoSum
 */

class TwoSum
{
    function __construct()
    {
    }

    /**
     * 暴力算法
     * @param $nums
     * @param $target
     */
    function twoSum(array $nums, $target) {
        for($i = 0; $i < sizeof($nums); ++$i) {
            for($j = $i + 1; $j < sizeof($nums); ++$j) {
                if($nums[$i] + $nums[$j] == $target) {
                    return [$i,$j];
                }
            }
        }
        return [];
    }

    /**
     * 哈希表
     * @param $nums
     * @param $target
     * @return array
     */
    function twoSum1($nums,$target) {
        $result = [];
        $nums_match = [];
        foreach ($nums as $_k => $_v) {
            if (!isset($nums_match[$target - $_v])) {
                $nums_match[$target - $_v] = $_k;
            }

            if (isset($nums_match[$_v]) && $nums_match[$_v] != $_k) {
                $result = [
                    $_k,
                    $nums_match[$_v],
                ];
                break;
            }
        }

        return $result;
    }
}

$obj = new TwoSum();
$nums = [3,2,4];
$target = 6;
$res = $obj->twoSum1($nums,$target);
foreach ($res as $i) {
    echo $i . " ";
}