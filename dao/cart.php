<?php
class carts
{
    var $cart_id = null;
    var $user_id = null;
    var $quantity = null;
    var $status = null;
    var $product_id = null;
    public function cart_user_id($user_id)
    {
        $db = new connect();
        $select = "SELECT 
            carts.*, 
            SUBSTRING(products.name, 1, 10) AS short_product_name, 
            (carts.quantity * products.price) AS total_price
        FROM carts
        JOIN products ON carts.product_id = products.product_id
        WHERE carts.user_id = ? and carts.status = 2
        
            ";
        $result = $db->pdo_query($select, $user_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function total_price($user_id)
    {
        $db = new connect();
        $select = "SELECT 
            subquery.user_id,
            SUM(subquery.total_price) AS total_price_all_products
        FROM (
            SELECT 
                carts.user_id,
                SUBSTRING(products.name, 1, 10) AS short_product_name, 
                (carts.quantity * products.price) AS total_price
            FROM carts
            JOIN products ON carts.product_id = products.product_id
            WHERE carts.user_id = ? AND carts.status = 2
        ) AS subquery
        GROUP BY subquery.user_id;
        ";

        $result = $db->pdo_query($select, $user_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function sum_total_price($user_id)
    {
        //tính tổng tất cả sản phẩm có trong giỏ hàng với trạng thái = 2
        $db = new connect();
        $select = "SELECT 
        subquery.user_id,
        (SUM(subquery.total_price) + 20000) AS total_price_all_products
    FROM (
        SELECT 
            carts.user_id,
            SUBSTRING(products.name, 1, 10) AS short_product_name, 
            (carts.quantity * products.price) AS total_price
        FROM carts
        JOIN products ON carts.product_id = products.product_id
        WHERE carts.user_id = ? AND carts.status = 2
    ) AS subquery
    GROUP BY subquery.user_id
    
        ";

        $result = $db->pdo_query($select, $user_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getcart_user_id_inser_bill_details($user_id)
    {
        // lấy tổng tiền của sản phẩm 
        $db = new connect();
        $select = "SELECT 
        carts.*, 
        (carts.quantity * products.price)+20000 AS total_price,
        products.price as price, products.product_id as product_id

        FROM carts
        JOIN products ON carts.product_id = products.product_id
        WHERE carts.user_id = ? and carts.status = 2
        ";
        $result = $db->pdo_query($select,$user_id);
        if($result){
            return $result;
        }else{
            return false;
        }

    }
    public function dell_cart_user_id($user_id){
        $db= new connect();
        // tìm đúng user và có trạng thái là 2 sẽ xóa 
        $select ="DELETE FROM carts Where user_id=? and status = 2";
        $result = $db->pdo_execute($select,$user_id);
        if($result){
            echo '<script>window.location.href = "index.php?act=user";</script>';
            return $result;

        }else{
            return false;
        }
    }

    public function dell_cart_user_id_no_next_page($user_id){
        $db= new connect();
        // tìm đúng user và có trạng thái là 2 sẽ xóa 
        $select ="DELETE FROM carts Where user_id=? and status = 2";
        $result = $db->pdo_execute($select,$user_id);
        if($result){
          
            return $result;

        }else{
            return false;
        }
    }
}
function carts_insert($product_id, $user_id, $quantity, $status) {
    $sql = "insert into carts(product_id, user_id, quantity, status) values (?, ?, ?, ?)";
    pdo_execute($sql, $product_id, $user_id, $quantity, $status);
}

function carts_selectall()
{
    $sql =  "select * from carts order by cart_id DESC";
    return pdo_query($sql);
}
function cart_delete($cart_id){
    $sql = "delete from carts where cart_id = '".$cart_id."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function cart_all_delete(){
    $sql = "DELETE FROM carts";
    $sp = pdo_query_one($sql);
    return $sp;
}   
function carts_update_quantity($cart_id, $quantity) {
    $sql = "update carts set quantity = ? where cart_id = ?";
    pdo_execute($sql, $quantity, $cart_id);
}
function carts_insert_into($product_id,$user_id,$status){
    $sql = "insert into carts(product_id, user_id, status) values (?, ?, ?)";
    pdo_execute($sql, $product_id, $user_id, $status);
}
?>