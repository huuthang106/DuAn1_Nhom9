<?php
class comments
{
    var $comment_id = null;
    var $product_id = null;
    var $blog_id = null;
    var $user_id = null;
    var $text = null;
    var $day = null;
    var $status = null;
    public function count_comments()
    {
        $db = new connect();
        $select = "SELECT COUNT(comment_id) as count_comment_id FROM comments";
        $result = $db->pdo_query($select);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function AVG_comment()
    {
        $db = new connect();
        $select = "SELECT 
        YEAR(day) as year, 
        MONTH(day) as month, 
        AVG(comment_id) as avg_comments
    FROM 
        comments
    WHERE 
        YEAR(day) = YEAR(CURRENT_DATE())
        AND MONTH(day) = MONTH(CURRENT_DATE())
    GROUP BY 
        YEAR(day), MONTH(day);
    
    ";
        $result = $db->pdo_query($select);
        if ($result) {
            return $result;
        } else {
            return $result;
        }
    }
    public function get_comment_product_id($product_id)
    {
        $db = new connect();
        $select = "SELECT cm.*, us.fullname as fullname, us.avarta as avarta, us.user_id as user_id 
        FROM comments cm
        JOIN users us ON cm.user_id = us.user_id
        WHERE cm.product_id = ? AND status = 1
        ORDER BY cm.day DESC
        LIMIT 5";
        $result = $db->pdo_query($select, $product_id);
        if ($result) {
            # code...
            return $result;
        } else {
            return false;
        }
    }
    public function insert_comment($product_id, $user_id, $content, $day)
    {
        $db = new connect;
        $select = "INSERT INTO comments (product_id,user_id,text,day) VALUES (?,?,?,?)";
        $result = $db->pdo_execute($select, $product_id, $user_id, $content, $day);
        if ($result) {
            echo '<script>window.location.href = "index.php?act=single-product&product_id=' . $product_id . '";</script>';
            return $result;
        } else {
            return false;
        }
    }
    public function dell_comment($comment_id, $product_id)
    {
        $db = new connect();
        $select = "UPDATE comments set status = 0 WHERE comment_id = ?";
        $result = $db->pdo_execute($select, $comment_id);
        if ($result) {
            echo '<script>window.location.href = "index.php?act=single-product&product_id=' . $product_id . '";</script>';
            return $result;
        } else {
            return false;
        }
    }
}
function comments_selectall($blog_id)
{
    $sql =  "select * from comments where 1";
    if ($blog_id > 0)
        $sql .= "  AND blog_id='" . $blog_id . "'";
    $sql .= " order by comment_id DESC";
    return pdo_query($sql);
}
function comment_selectall()
{
    $sql =  "select * from comments order by comment_id DESC";
    return pdo_query($sql);
}
function comment_insert($user_id, $blog_id, $text, $day, $status)
{
    $sql = "insert into comments (user_id, blog_id, text, day, status) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $user_id, $blog_id, $text, $day, $status);
}

function get_product_name($product_id)
{
    $sql = "select name from products where product_id = ?";
    $result = pdo_query_one($sql, $product_id);

    if ($result) {
        return $result['name'];
    } else {
        return null;
    }
}
function get_user_name($user_id)
{
    $sql = "select fullname from users where user_id = ?";
    $result = pdo_query_one($sql, $user_id);

    if ($result) {
        return $result['fullname'];
    } else {
        return null;
    }
}
function get_blog_title($blog_id)
{
    $sql = "select title from blogs where blog_id = ?";
    $result = pdo_query_one($sql, $blog_id);

    if ($result) {
        return $result['title'];
    } else {
        return null;
    }
}
function comments_delete($comment_id)
{
    $sql = "delete from comments where comment_id = '" . $comment_id . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function products_selectall()
{
    $sql =  "select * from products order by product_id DESC";
    return pdo_query($sql);
}
