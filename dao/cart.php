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
        $db = new connect();
        $select = "SELECT 
        carts.*, 
        (carts.quantity * products.price) AS total_price,
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
        $select ="DELETE FROM carts Where user_id=? and status = 2";
        $result = $db->pdo_execute($select,$user_id);
        if($result){
            echo '<script>window.location.href = "index.php?act=user";</script>';
            return $result;

        }else{
            return false;
        }
    }
}
