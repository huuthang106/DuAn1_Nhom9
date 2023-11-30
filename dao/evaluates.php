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
    public function dell_evaluate($evaluate_id){
        $db= new connect();
        $select= "DELETE FROM evaluates where evaluate_id =?";
        $result = $db->pdo_execute($select,$evaluate_id);
        if ($result) {
            # code...
            return $result;
        }else{
            return false;
        }
    }
    public function count_star($product_id){
        $db = new connect();
        $select = "SELECT star, COUNT(*) as star_count FROM evaluates WHERE product_id = ? GROUP BY star";
        $result = $db->pdo_query($select, $product_id);
        
        if ($result) {
            return $result;
        } else { 
            return false;
        }
    }
    public function medium($product_id) {
        $db = new connect();
    
        $select = "SELECT AVG(star) as average_star FROM evaluates WHERE product_id = ?";
        $result = $db->pdo_query_one($select, $product_id);  // Sử dụng pdo_query_one để chỉ lấy một bản ghi duy nhất
    
        if ($result && isset($result['average_star'])) {
            return ['average_star' => $result['average_star']];
        } else {
            return ['average_star' => 0]; // hoặc giá trị mặc định nếu không có đánh giá
        }
    }
    
    
    
 }

?>