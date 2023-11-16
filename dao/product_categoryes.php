<?php
    class product_categoryes{
        var $product_id = null;
        var $categories= null;
        public function get_category($product_id) {
            $db = new connect();
            $select = "
                SELECT pc.*, c.name AS category_name
                FROM product_categories pc
                JOIN categories c ON pc.category_id = c.category_id
                WHERE pc.product_id = ?
            ";
        
            $result = $db->pdo_query($select, $product_id);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }
        
    }
?>