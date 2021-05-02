<?php

/**
 * 无重复字符的最长子串
 * @desc https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/
 * Class LengthOfLongestSubstring
 */
class LengthOfLongestSubstring
{
    function __construct()
    {
    }

    /**
     * pjq:滑动窗口 + 哈希判断
     * 思路：
     * @param String $s
     */
    function lengthOfLongestSubstring($s)
    {
        $hash = [];
        $rk = -1;  //右指针
        $max = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($i != 0) {
                unset($hash[substr($s, $i - 1, 1)]);
            }
            while ($rk + 1 < strlen($s) && !isset($hash[substr($s, $rk + 1, 1)])) {
                $hash[substr($s, $rk + 1, 1)] = 1;  //1无实际意义,占位
                $rk++;
            }
            $max = max($max, $rk + 1 - $i);
        }
        return $max;
    }

    /**
     * 维护一个 tmp，循环字符串，判断当前字符与tmp是否有重复的
     * 1、无重复的，添加到tmp后面
     * 2、有重复的，获取tmp与当前字符重复的下标。
     *      将下标之前的tmp都去除掉，添加该字符到新的tmp后面
     * 本质还是使用到滑动窗口的思想
     * 与上面差别：1、上面使用到哈希表判断重复，这里使用到strpos方法
     *          2、若是有重复的，则将重复之前的去掉（为什么可以去掉，LeetCode中有讲解）
     *          3、省了一层循环，效率加快
     * @param $s
     * @return int
     */
    function lengthOfLongestSubstring1($s) {
        $lens = strlen($s);//总的字符串有多长
        $tmp  = '';       //用于存储子串  当前里面不会有重复的字符
        $len  = 0;        //最长子串的长度
        for($i=0; $i<$lens; $i++) {
            $re = strpos($tmp,$s[$i]);//判断 是否有重复的
            if(false !== $re) {//有重复
                $tmp .= $s[$i];//先追加上去 例如pww ,有可能是 pwp
                $tmp  = substr($tmp,$re+1);//从重复位置开始 截取后 pww=>w  pwp=>wp
            }else {//无重复字符
                $tmp .= $s[$i];//追加到后面
            }
            //每一次过去后，比较当前的tmp 与上一次的 len 谁更大
            $len = strlen($tmp)>$len ? strlen($tmp) : $len;
        }
        return $len;//最后返回的长度 不一定是$tmp

// 作者：tacks
// 链接：https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/solution/php-wu-zhong-fu-zi-fu-de-zui-chang-zi-chuan-by-tac/
// 来源：力扣（LeetCode）
// 著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
    }
}

$s = ""; //abcabcbb:3;  bbbbb:1;  pwwkew:3

$obj = new LengthOfLongestSubstring();
$max = $obj->lengthOfLongestSubstring($s);
echo $max;