<?php
class bill_details
{
    var $billdetail_id = null;
    var $bill_id = null;
    var $pay = null;
    var $price = null;
    var $day = null;
    var $quantity =  null;
    var $product_id = null;
    var $total = null;
    public function avs_bill()
    {
        $db = new connect();
        $select = "SELECT (AVG(subquery.bill_count) / DAY(LAST_DAY(CURRENT_DATE()))) * 100 as avg_bills_percentage
        FROM (
            SELECT DAY(day) as day, COUNT(bill_id) as bill_count
            FROM bill_details
            WHERE YEAR(day) = YEAR(CURRENT_DATE())
                AND MONTH(day) = MONTH(CURRENT_DATE())
            GROUP BY DAY(day)
        ) as subquery";
        $result = $db->pdo_query($select);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function top_product()
    {
        $db = new connect();
        $select = "SELECT 
        p.name AS TenSP,
        COUNT(bd.product_id) AS SoLuongMua
    FROM 
        bill_details bd
    JOIN 
        products p ON bd.product_id = p.product_id
    GROUP BY 
        bd.product_id, p.name
    ORDER BY 
        SoLuongMua DESC
    LIMIT 3;
    ";
    $result = $db->pdo_query($select);
    if ($result) {
        return $result;
    }
    else {
        return false;
    }
    }
    public function get_bill_id($bill_id){
        $db = new connect();
        $select = "SELECT bd.*,us.username as username, 
        us.phone as sdt, us.address as address, p.name as name FROM bill_details bd
        join bills b ON bd.bill_id = b.bill_id 
        Join users us ON b.user_id = us.user_id
        join products p ON bd.product_id = p.product_id
        Where bd.bill_id =?;
        ";
        $result = $db->pdo_query($select,$bill_id);
        if ($result) {
            return $result;

        }
        else {
            return false;
        }
    }
    

}
