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
    var $address = null;
    var $phone = null;
    var $note = null;
    var $fullname = null;
    var $total_vocher = null;
    var $vocher_id = null;
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
        } else {
            return false;
        }
    }
    public function get_bill_id($bill_id)
    {
        $db = new connect();
        $select = "SELECT bd.*,us.username as username, 
        bd.phone as sdt, bd.address as address, p.name as name FROM bill_details bd
        join bills b ON bd.bill_id = b.bill_id 
        Join users us ON b.user_id = us.user_id
        join products p ON bd.product_id = p.product_id
        Where bd.bill_id =?;
        ";
        $result = $db->pdo_query($select, $bill_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function insert_bill_details($bill_id, $pay, $price, $day, $quantity, $product_id, $total, $address, $phone, $note, $fullname,$vocher_id)
    {
        $db = new connect();
        $select = "INSERT INTO bill_details (bill_id, pay, price,day,quantity,product_id,total,address,phone,note,fullname,vocher_id) values
         (?,?,?,?,?,?,?,?,?,?,?,?) ";
        $result = $db->pdo_execute($select, $bill_id, $pay, $price, $day, $quantity, $product_id, $total, $address, $phone, $note, $fullname,$vocher_id);
        if ($result) {
            if ($pay == 1) {
                return $result;
            } else {
                echo '<script>window.location.href = "index.php?act=pay";</script>';
                return $result;
            }
        } else {
            return false;
        }
    }
    public function insert_bill_details_no_vocher($bill_id, $pay, $price, $day, $quantity, $product_id, $total, $address, $phone, $note, $fullname)
    {
        $db = new connect();
        $select = "INSERT INTO bill_details (bill_id, pay, price,day,quantity,product_id,total,address,phone,note,fullname) values
         (?,?,?,?,?,?,?,?,?,?,?) ";
        $result = $db->pdo_execute($select, $bill_id, $pay, $price, $day, $quantity, $product_id, $total, $address, $phone, $note, $fullname);
        if ($result) {
            if ($pay == 1) {
                return $result;
            } else {
                echo '<script>window.location.href = "index.php?act=pay";</script>';
                return $result;
            }
        } else {
            return false;
        }
    }
    
    public function monthly_revenue()
    {
        $db = new connect();
        $select = "SELECT SUM(total) AS total_sum
        FROM bill_details
        WHERE MONTH(day) = MONTH(CURDATE()) AND YEAR(day) = YEAR(CURDATE()) ";
        $result = $db->pdo_query($select);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function growth()
    {
        $db = new connect();

        // Tính tổng cột total trong tháng hiện tại
        $currentMonthQuery = "SELECT SUM(total) AS total_sum
            FROM bill_details
            WHERE MONTH(day) = MONTH(CURDATE()) AND YEAR(day) = YEAR(CURDATE())";

        $currentMonthResult = $db->pdo_query_one($currentMonthQuery);

        // Tính tổng cột total trong tháng trước đó
        $lastMonthQuery = "SELECT SUM(total) AS total_sum
            FROM bill_details
            WHERE MONTH(day) = MONTH(CURDATE() - INTERVAL 1 MONTH) AND YEAR(day) = YEAR(CURDATE() - INTERVAL 1 MONTH)";

        $lastMonthResult = $db->pdo_query_one($lastMonthQuery);

        // Tính tỷ lệ phần trăm tăng trưởng
        $currentMonthSum = isset($currentMonthResult['total_sum']) ? $currentMonthResult['total_sum'] : 0;
        $lastMonthSum = isset($lastMonthResult['total_sum']) ? $lastMonthResult['total_sum'] : 0;

        $growthPercentage = 0;

        if ($lastMonthSum != 0) {
            $growthPercentage = (($currentMonthSum - $lastMonthSum) / $lastMonthSum) * 100;
        }

        return $growthPercentage;
    }
    public function get_new_bill_detai($bill_id){
        $db = new connect();
        $select ="SELECT total FROM bill_details WHERE bill_id=?";
        $result = $db->pdo_query($select,$bill_id);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function check_user_buy_product($user_id, $product_id) {
        $db = new connect();
        $select = "SELECT bd.product_id 
                   FROM bill_details bd
                   JOIN bills b ON bd.bill_id = b.bill_id
                   WHERE b.user_id = ? AND bd.product_id = ?";
        $result = $db->pdo_query($select, $user_id, $product_id);
        
        if($result){
            return TRUE;
        }else{
            return false;
        }
    }
    
    
}
