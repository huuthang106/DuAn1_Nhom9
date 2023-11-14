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
function user_selectall(){
    $sql =  "select * from users order by user_id DESC";
    return pdo_query($sql);
}
function user_register($username, $password, $email){
    $sql="insert into users(username, password, email) value(?, ?, ?)";
    pdo_execute($sql,$username,$password,$email);
}
// thêm mới loại
function user_insert($username, $password, $email){
    $sql="insert into users(username, password, email) value(?, ?, ?)";
    pdo_execute($sql,$username,$password,$email);
}
function check_user($username, $password){
    $sql = "select user_id, role from users where username= '".$username."' and password='".$password."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function check_email($email){
    $sql = "select * from users where email= '".$email."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
?>