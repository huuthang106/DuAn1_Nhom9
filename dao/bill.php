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
        public function get_bills(){
            $db = new connect();
            $select = "SELECT bills.*, users.fullname AS customer_name
            FROM bills
            JOIN users ON bills.user_id = users.user_id;
            "; 
            $result = $db->pdo_query($select);
            if ($result) {
                return $result;
            }   else{
                return false;
            }
        }
        public function update_status_bill( $bill_id, $status ){
            $db = new connect();
            $select = "UPDATE bills set status = ? WHERE bill_id = ?";
            $result = $db->pdo_execute($select,$status ,$bill_id);
            if ($result) {
                echo '<script>window.location.href = "index.php?act=bills";</script>';
                return true;
            }else {
                return false;
            }
        }
        public function update_status_bill_pagehome( $bill_id, $status ){
            $db = new connect();
            $select = "UPDATE bills set status = ? WHERE bill_id = ?";
            $result = $db->pdo_execute($select,$status ,$bill_id);
            if ($result) {
                echo '<script>window.location.href = "index.php?act=home";</script>';
                return true;
            }else {
                return false;
            }
        }

        public function get_newest_bills() {
            $db = new connect();
            $select = "SELECT bills.*, users.username AS customer_name
                       FROM bills
                       JOIN users ON bills.user_id = users.user_id
                       ORDER BY bills.bill_id ASC
                       LIMIT 5";
            $result = $db->pdo_query($select);
        
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }
        
        
    }
    
?>