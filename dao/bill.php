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
    
?>