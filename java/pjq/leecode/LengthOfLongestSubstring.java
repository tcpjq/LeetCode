package pjq.leecode;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Set;

/**
 * 最长子串：
 */
public class LengthOfLongestSubstring {


    public int lengthOfLongestSubstring(String s) {
        HashMap<Character,Integer> hashMap = new HashMap<>();
        char[] arr = s.toCharArray();
        int start = 0;
        int max = 0;
        for (int rk = 0; rk < arr.length; rk++) {

            if (hashMap.containsKey(arr[rk])) {
                start = Math.max(hashMap.get(arr[rk])  + 1, start);
            }
            max = Math.max(rk - start + 1, max);

            hashMap.put(arr[rk], rk);
        }
        return max;
    }

    /**
     * 滑动窗口
     * @param s
     * @return
     */
    public int lengthOfLongestSubstring2(String s) {
        HashSet<Character> hashSet = new HashSet<>();
        char[] arr = s.toCharArray();
        int rk = -1; //右指针
        int res = 0;
        for (int i = 0; i < arr.length; i++) {
            if (i != 0) {
                hashSet.remove(arr[i - 1]);
            }

            while (rk + 1 < arr.length && !hashSet.contains(arr[rk + 1])) {
                hashSet.add(arr[rk + 1]);
                ++rk;
            }

            res = Math.max(res, rk - i + 1);
        }
        return res;
    }

    /**
     * 暴力匹配
     * @param s
     * @return
     */
    public int lengthOfLongestSubstring1(String s) {
        int len = s.length();
        if (len == 0 || len == 1) {
            return len;
        }

        char[] arr = s.toCharArray();
        int max = 1;
        for (int i = 0; i < arr.length; i++) {
            HashSet<Character> hashSet = new HashSet<Character>();
            hashSet.add(arr[i]);
            for (int j = i+1; j < arr.length; j++) {
                boolean res = hashSet.add(arr[j]);
                if (res) {
                   if (j - i + 1> max) {
                       max = j - i + 1;
                   }
                } else {
                    break;
                }
            }
        }
        return max;
    }

    public static void main(String[] args) {
        String s = "bbbbb"; //abcabcbb:3;  bbbbb:1;  pwwkew:3
        LengthOfLongestSubstring obj = new LengthOfLongestSubstring();
        int max = obj.lengthOfLongestSubstring(s);
        System.out.println(max);

    }
}
