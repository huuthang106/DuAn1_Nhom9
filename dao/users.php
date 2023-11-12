<?php
    class users{
        var $user_id = null;
        var $username=null;
        var $password=null;
        var $address=null;
        var $phone =null;
        var $email=null;
        var $avarta = null;
        var $role = null;
        public function get_user_id($user_id){
            $db = new connect();
            $select = "SELECT * FROM users where user_id =?";
            $result = $db->pdo_query($select, $user_id);
            if($result){
                return $result;
            }else{
                return false;
            }


        }
    }
?>