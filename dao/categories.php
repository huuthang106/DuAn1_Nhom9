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
function categories_insert($name){
    $sql="insert into categories(name) value(?)";
    pdo_execute($sql,$name);
    
    
}
function categories_selectall(){
    $sql =  "select * from categories order by category_id DESC";
    return pdo_query($sql);
}

// xóa
function categories_delete($category_id, $status){
    $sql= "update categories set status=? WHERE category_id=?";
    pdo_execute($sql, $status, $category_id);
}
// cập nhật dữ liệu
function categories_update($category_id, $name){
    $sql = "update categories set name=? where category_id=?";
    pdo_execute($sql,$name,$category_id);
}
function categories_updated($category_id, $name){
    $sql = "update categories set status=? WHERE category_id=?";
    pdo_execute($sql,$name,$category_id);
}
function categories_getinfo($category_id){
    $sql = "select * from categories where category_id=?";
    return pdo_query_one($sql,$category_id);
}


?>