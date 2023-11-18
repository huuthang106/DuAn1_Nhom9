<?php
class comments
{
    var $comment_id = null;
    var $product_id = null;
    var $blog_id = null;
    var $user_id = null;
    var $text = null;
    var $day = null;
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
}
function comments_selectall()
{
    $sql =  "select * from comments order by comment_id DESC";
    return pdo_query($sql);
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
