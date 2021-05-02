package pjq.leecode;

import java.util.HashMap;
import java.util.Hashtable;
import java.util.Map;

/**
 * 两数之和:https://leetcode-cn.com/problems/two-sum/
 */
public class TwoSum {
    /**
     * 暴力破解
     *
     * @param nums
     * @param target
     * @return
     */
    public int[] twoSum(int[] nums, int target) {
        for (int i = 0; i < nums.length; ++i) {
            for (int j = i + 1; j < nums.length; ++j) {
                if (nums[i] + nums[j] == target) {
                    return new int[]{i, j};
                }
            }
        }
        return new int[0];
    }

    /**
     * 哈希表  对数组循环，查看哈希表中是否有存在 匹配的数字。
     * 如果没有，则将(当前值，下表)存到哈希表中。
     * 判断是否匹配：target-当前值 作为key，判断哈希表中是否存在，存在则说明匹配
     * @param nums
     * @param target
     * @return
     */
    public int[] twoSum1(int[] nums, int target) {
        Map<Integer,Integer> hashtable = new HashMap<Integer,Integer>();
        for(int i = 0; i < nums.length; ++i) {
            int tmp = target - nums[i];
            if(hashtable.containsKey(tmp)) {
                return new int[]{hashtable.get(tmp),i};
            }
            hashtable.put(nums[i],i);
        }
        return new int[0];
    }

    public static void main(String[] args) {
        int[] nums = new int[]{5, 7, 11, 15,2};
        int target = 9;
        TwoSum twoSum = new TwoSum();
        int[] res = twoSum.twoSum(nums, target);
        for (int i = 0; i < res.length; ++i) {
            System.out.print(res[i] + "  ");
        }
    }
}
