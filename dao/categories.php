<?php
    class categories{
        var $category_id = null ;
        var $name = null ;
        var $status = null ;
        public function get_all_categories(){
            $db = new connect();
            $select = "SELECT * from categories";
            $result = $db->pdo_query($select);
            if($result){
                return $result;
            }else{
                return false ;
            }

        }
        
    }
?>