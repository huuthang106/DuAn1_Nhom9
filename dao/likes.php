<?php
    function favourite_insert($user_id, $product_id){
        $sql = "insert into favourites (user_id, product_id) VALUES (?, ?)";
        pdo_execute($sql, $user_id, $product_id);
    }
    function favourite_selectalls(){
        $sql =  "select * from favourites order by favourite_id DESC";
        return pdo_query($sql);
    }
    function favourite_selectall_products($product_id){
        $sql =  "select * from products where product_id='" . $product_id . "'";
        return pdo_query($sql, $product_id);
    }
    function favourite_delete($favourite_id)
{
    $sql = "delete from favourites where favourite_id = '" . $favourite_id . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

    
?>