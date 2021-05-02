<?php

/**
 * 两数相加
 * @desc https://leetcode-cn.com/problems/add-two-numbers/
 * Class AddTwoNumbers
 */

class AddTwoNumbers
{

    function __construct()
    {
    }

    function addTwoNumbers($l1, $l2)
    {
        $root = new ListNode(-1);
        $node = $root;
        $i = 0;  //进位
        $sum = 0;

        while ($l1 != null || $l2 != null) {
            $tmp = null;
            $num1 = ($l1 == null) ? 0 : $l1->val;
            $num2 = ($l2 == null) ? 0 : $l2->val;
            $sum = $num1 + $num2 + $i;

            $i = $sum >= 10 ? 1 : 0;


            $tmp = new ListNode($sum % 10);

            $node->next = $tmp;
            $node = $node->next;

            if ($l1 != null) $l1 = $l1->next;
            if ($l2 != null) $l2 = $l2->next;
        }

        if ($sum >= 10) {
            $node->next = new ListNode(1);
        }
        return $root->next;
    }

    public function createListNode1() {
        $node1 = new ListNode(2);
        $node2 = new ListNode(4);
        $node3 = new ListNode(3);

        $node1->next = $node2;  $node2->next = $node3;
        return $node2;
    }
    public function createListNode2() {
        $node1 = new ListNode(5);
        $node2 = new ListNode(6);
        $node3 = new ListNode(4);

        $node1->next = $node2;  $node2->next = $node3;
        return $node2;
    }
}

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

$obj = new AddTwoNumbers();
$node1 = $obj->createListNode1();
$node2 = $obj->createListNode2();
$res_node = $obj->addTwoNumbers($node1,$node2);
while($res_node != null) {
    echo $res_node->val . " ";
    $res_node = $res_node->next;
}

