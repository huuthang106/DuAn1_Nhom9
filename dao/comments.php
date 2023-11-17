<?php
class comments{
    var $comment_id = null;
    var $product_id = null;
    var $blog_id = null;
    var $user_id = null;
    var $text = null;
    var $day = null;
    public function count_comments(){
        $db = new connect();
        $select = "SELECT COUNT(comment_id) as count_comment_id FROM comments";
        $result = $db->pdo_query($select);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function AVG_comment(){
        $db = new connect();
        $select = "SELECT 
        YEAR(day) as year, 
        MONTH(day) as month, 
        AVG(comment_id) as avg_comments
    FROM 
        comments
    WHERE 
        YEAR(day) = YEAR(CURRENT_DATE())
        AND MONTH(day) = MONTH(CURRENT_DATE())
    GROUP BY 
        YEAR(day), MONTH(day);
    
    ";
        $result = $db->pdo_query($select);
        if($result){
            return $result;
        }   else{
            return $result;
        }
    }


}
?>