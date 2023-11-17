<?php
    class bills{
        var $bill_id = null;
        var $user_id = null;
        var $status = null;
        public function get_bill_user_id($user_id){
            $db = new connect();
            $select = 'SELECT * FROM bills where user_id =?';
            $result = $db->pdo_query($select, $user_id);
            if ($result) {
                return $result;
                # code...
            }else{
                return false;
            }
        }
        public function count_bill(){
            $db = new connect();
            $select = "SELECT COUNT(bill_id) as bill_count FROM bills";
            $result = $db->pdo_query($select);
            if ($result) {
                return $result;
            }else{
                return false;
            }
        }
    }
    class bill_detail{
        var $billdetail_id = null;
        var $bill_id=null;
        var $pay = null;
        var $price = null;
        var $day = null;
        var $quantity=  null;
        var $product_id = null;
        var $total = null;
        public function avs_bill(){
            $db = new connect();
            $select = "SELECT YEAR(day) as year, MONTH(day) as month, COUNT(bill_id) as bill_count
            FROM bill_details
            GROUP BY YEAR(day), MONTH(day);
            ";
            $result = $db->pdo_query($select);
            if ($result) {
                return $result;
            }else{
                return false;

            }

        }
    }
?>