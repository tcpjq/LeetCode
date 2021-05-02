package pjq.leecode;

/**
 * 两数相加：
 */
public class AddTwoNumbers {

    public static void main(String[] args) {
        AddTwoNumbers addTwoNumbers = new AddTwoNumbers();
        int arr[] = {1, 2, 3};
        int arr1[] = {8, 8, 8};
        ListNode l1 = addTwoNumbers.addNode(arr);
        ListNode l2 = addTwoNumbers.addNode(arr1);

        ListNode res = addTwoNumbers.addTwoNumbers(l1, l2);
        while (res != null) {
            System.out.print(res.val + "->");
            res = res.next;
        }

    }

    public ListNode addNode(int[] arr) {
        ListNode listNode = new ListNode();
        listNode.val = arr[0];
        ListNode nextNode = listNode;
        for (int i = 1; i < arr.length; i++) {
            ListNode tmpNode = new ListNode();
            tmpNode.val = arr[i];
            nextNode.next = tmpNode;
            nextNode = tmpNode;
        }
        return listNode;
    }

    public ListNode addTwoNumbers(ListNode l1, ListNode l2) {
        ListNode res = new ListNode(-1);
        ListNode node = res;
        int addFlag = 0;
        int sum = 0; //进位
        while (l1 != null || l2 != null) {
            ListNode tmp = null;
            int num1 = (l1 == null) ? 0 : l1.val;
            int num2 = (l2 == null) ? 0 : l2.val;
            sum = num1 + num2 + addFlag;

            addFlag = sum >= 10 ? 1 : 0;//更新进位

            tmp = new ListNode(sum % 10);
            node.next = tmp;
            node = tmp;

            if (l1 != null) l1 = l1.next;
            if (l2 != null) l2 = l2.next;
        }

        if (sum >= 10) {
            node.next = new ListNode(1);
        }

        return res.next;
    }

}

class ListNode {
    int val;
    ListNode next;

    ListNode() {
    }

    ListNode(int val) {
        this.val = val;
    }

    ListNode(int val, ListNode next) {
        this.val = val;
        this.next = next;
    }
}





