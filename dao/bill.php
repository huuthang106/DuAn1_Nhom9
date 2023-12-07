<?php
    class bills{
        var $bill_id = null;
        var $user_id = null;
        var $status = null;
        var $total = null;
        public function get_bill_user_id($user_id){
            $db = new connect();
            $select = 'SELECT * FROM bills where user_id =?
            ORDER BY  bill_id DESC 
            ';
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
        public function update_status_bill_user( $bill_id, $status ){
            $db = new connect();
            $select = "UPDATE bills set status = ? WHERE bill_id = ?";
            $result = $db->pdo_execute($select,$status ,$bill_id);
            if ($result) {
                echo '<script>window.location.href = "index.php?act=user";</script>';
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

        
        public function insert_bill($user_id){
         $db = new connect();
         $select = "INSERT INTO bills (user_id) values (?)";
         $result = $db->pdo_execute($select,$user_id);
         if($result){
            return $result;
         }
         else{
            return false;
         }
        }
        public function new_bill($user_id){
            $db = new connect();
            $select = "SELECT bill_id FROM bills WHERE user_id = ? ORDER BY bill_id DESC LIMIT 1";
            $result = $db->pdo_query_one($select, $user_id); // Sử dụng pdo_query_one để trả về một bản ghi duy nhất
            if ($result) {
                return $result['bill_id'];
            } else { 
                return false;
            }
        }
        public function get_total_bill($bill_id){
            $db = new connect();
            $select = "SELECT total FROM bills WHERE bill_id = ?";
            $result = $db->pdo_query_one($select, $bill_id); // Sử dụng pdo_query_one để trả về một bản ghi duy nhất
            if ($result) {
                return $result;
            } else { 
                return false;
            }
        }
        

        public function approve_the_transfer_application($bill_id ){
            $db = new connect();
            $select = "UPDATE bills set status = 2 WHERE bill_id = ?";
            $result = $db->pdo_execute($select ,$bill_id);
            if ($result) {
                // echo '<script>window.location.href = "index.php?act=user";</script>';
                return $result;
            }else {
                return false;
            }
        }
        public function update_total_bill($bill_id,$total){
            $db = new connect();
            $select =" UPDATE bills set total =? where bill_id=?";
            $result = $db->pdo_execute($select,$total,$bill_id);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }
    function bill_selectall(){
        $sql =  "select * from bills order by bill_id DESC";
        return pdo_query($sql);
    }
    function bills_selectalls($bill_id){
        $sql =  "select * from bills where bill_id=?";
        return pdo_query($sql, $bill_id);
    }
    function bills_selectalls_detail($bill_id){
        $sql =  "select * from bill_details where bill_id=?";
        return pdo_query($sql, $bill_id);
    }
?>