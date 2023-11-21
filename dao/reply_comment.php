<?php
class reply_comment
{
    var $reply_id = null;
    var $comment_id = null;
    var $content = null;
    var $status = null;
    var $day = null;
    var $user_id = null;
    public function get_reply_comment_id($comment_id)
    {
        $db = new connect();
        $select = "SELECT rc.*,us.fullname as fullname ,us.avarta as avarta,us.user_id as user_id 
        FROM reply_coments rc
        JOIN users us ON rc.user_id = us.user_id
        WHERE comment_id = ? AND status = 1
        ORDER BY rc.day DESC
        LIMIT 2";
        $result = $db->pdo_query($select, $comment_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function insert_reply($comment_id,$content,$day,$user_id,$product_id ){
        $db = new connect();
        $select = "INSERT INTO reply_coments (comment_id,content,day,user_id) VALUES (?,?,?,?)";
        $result = $db->pdo_execute($select,$comment_id,$content,$day,$user_id);
        if ($result) {
            # code...
            echo '<script>window.location.href = "index.php?act=single-product&product_id='.$product_id .'";</script>';
            return $result;
        }else{
            return false;
        }
    }
    public function dell_reply($reply_id,$product_id){
        $db = new connect();
        $select = "UPDATE reply_coments set status = 0 WHERE reply_id = ?";
        $result = $db->pdo_execute($select,$reply_id);
        if($result){
            
            echo '<script>window.location.href = "index.php?act=single-product&product_id='.$product_id .'";</script>';
            return $result;
        }else{
            return false;
        }
    }
}
