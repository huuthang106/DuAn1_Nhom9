<?php
 class Evaluates{
    var $evaluates_id = null;
    var $product_id = null;
    var $user_id = null;
    var $star = null;
    var $content = null;

    public function insert_evaluates($product_id,$user_id,$star,$content){
        $db = new connect();
        $select = " INSERT INTO evaluates (product_id,user_id,star,content) values (?,?,?,?)";
        $result = $db->pdo_execute($select,$product_id,$user_id,$star,$content);
        if($result){
            echo '<script>window.location.href = "index.php?act=single-product&product_id='.$product_id .'";</script>';
            return $result;
        }else{
            return false;
        }
    }
    public function get_five_evaluates($product_id){
        $db = new connect();
        $select = "SELECT ie.*, u.fullname as fullname, u.avarta as avarta 
                   FROM evaluates ie
                   JOIN users u ON ie.user_id = u.user_id 
                   WHERE ie.product_id = ?";
        $result = $db->pdo_query($select, $product_id);
        if($result){
            return $result;
        } else {
            return false;
        }
    }
    
 }

?>