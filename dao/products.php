<?php
    class products{
        var $product_id = null;
        var $category_id = null;
        var $name = null;
        var $picture=null;
        var $color = null;
        var $size = null;
        var $price = null;
        var $content = null;

        function getProduct(){
            $db = new connect();
            $select = "SELECT * FROM products";
            $result = $db->pdo_query($select);
            if($result){
                return $result;
            }
            else{
                echo"no data";
            }
        }
        public function products_pagination($page, $items_per_page)
    {
        $db = new connect();
    
        // Tính toán vị trí bắt đầu của kết quả dựa trên trang hiện tại và số lượng sản phẩm trên mỗi trang
        $start = ($page - 1) * $items_per_page;
    
        // Truy vấn SQL để lấy danh sách sản phẩm với phân trang
        $select = "SELECT * FROM products ORDER BY product_id DESC LIMIT $start, $items_per_page";
        $result = $db->pdo_query($select);
    
        // Đếm tổng số sản phẩm
        $count_query = "SELECT COUNT(*) as total FROM products";
        $total_products = $db->pdo_query($count_query);
    
        return array('products' => $result, 'total_products' => $total_products);
    }
    }
    
?>