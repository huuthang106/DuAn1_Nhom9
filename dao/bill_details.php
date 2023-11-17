<?php
class bill_details{
    var $billdetail_id = null;
    var $bill_id=null;
    var $pay = null;
    var $price = null;
    var $day = null;
    var $quantity=  null;
    var $product_id = null;
    var $total = null;
    public function avs_bill(){
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
    
}
?>