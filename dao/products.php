<?php
class products
{
    var $product_id = null;
    var $category_id = null;
    var $name = null;
    var $picture = null;
    var $color = null;
    var $size = null;
    var $price = null;
    var $content = null;

    public function getProduct()
    {
        $db = new connect();

        // Sử dụng INNER JOIN để kết hợp thông tin từ cả hai bảng
        $select = "SELECT products.*, categories.name AS category_name
                   FROM products
                   INNER JOIN categories ON products.category_id = categories.category_id";

        $result = $db->pdo_query($select);

        if ($result) {
            return $result;
        } else {
            return false;
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
    public function get_product_id($product_id)
    {
        $db = new connect();
        $select =  "SELECT products.*, categories.name AS category_name  FROM products
        INNER JOIN categories ON products.category_id = categories.category_id Where product_id =?  ";
        $result = $db->pdo_query($select, $product_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_product_id_site($product_id)
    {
        $db = new connect();
        $select =  "SELECT * FROM products
       Where product_id =?";
        $result = $db->pdo_query($select, $product_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_nine_product()
    {
        $db = new connect();
        $select = "SELECT * FROM products
        ORDER BY RAND()
        LIMIT 9";
        $result = $db->pdo_query($select);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function seach_product($name, $page, $items_per_page)
    {
        $db = new connect();

        // Tính toán vị trí bắt đầu của kết quả dựa trên trang hiện tại và số lượng sản phẩm trên mỗi trang
        $start = ($page - 1) * $items_per_page;
        $name = '%' . $name . '%';
        // Truy vấn SQL để lấy danh sách sản phẩm với phân trang
        $select = "SELECT * FROM products Where name like ? ORDER BY product_id DESC LIMIT $start, $items_per_page";
        $result = $db->pdo_query($select, $name);

        // Đếm tổng số sản phẩm
        $count_query = "SELECT COUNT(*) as total FROM products";
        $total_products = $db->pdo_query($count_query);

        return array('products' => $result, 'total_products' => $total_products);
    }
    public function add_product($category_id, $name, $picture, $color, $size, $price, $content)
    {
        $db = new connect();
        $select = 'INSERT INTO products (category_id,name,picture,color,size,price,content) values (?,?,?,?,?,?,?)';
        $result = $db->pdo_execute($select, $category_id, $name, $picture, $color, $size, $price, $content);

        if ($result) {
            return $result;
        } else {
            echo '</br><div style="color:#721c24" class="error-message">
                                    <i class="fa-solid fa-circle-exclamation"></i> Thêm dữ liệu thất bại !
                                    </div>';
        }
    }
    public function update_status($product_id, $status)
    {
        $db = new connect();
        $select = ' UPDATE  products set status =? where product_id = ?';
        $result = $db->pdo_execute($select, $status, $product_id);
        if ($result) {
            echo '<script>window.location.href = "index.php?act=products";</script>';
            return $result;
        } else {
            return false;
        }
    }
    public function update_product($category_id, $name, $picture, $color, $size, $price, $content, $product_category, $product_id)
    {
        $db = new connect();
        $select = 'UPDATE products set category_id = ?, name= ?,picture=?, color =?, size=? ,price=?, content=? WHERE product_id = ?';
        $result = $db->pdo_execute($select, $category_id, $name, $picture, $color, $size, $price, $content, $product_id);
        $sql = 'INSERT INTO product_categories (product_id, category_id) VALUES (?,?)';
        $key = $db->pdo_execute($sql, $product_id, $product_category);
        if ($key && $result) {
            echo '<script>window.location.href = "index.php?act=products";</script>';
            return true;
        } else {
            return false;
        }
    }
}
