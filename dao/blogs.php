<?php
    function blogs_selectall(){
        $sql =  "select * from blogs order by blog_id DESC";
        return pdo_query($sql);
    }
    function blogs_selectalls(){
        $sql =  "select * from blogs order by blog_id DESC limit 4";
        return pdo_query($sql);
    }
    function blogs_delete($blog_id){
        $sql = "delete from blogs where blog_id = '".$blog_id."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function blogs_insert($title, $content, $day){
        $sql="insert into blogs(title, content, day) value(?, ?, ?)";
        pdo_execute($sql,$title,$content,$day);
    }
    function blogs_update($blog_id, $title, $content, $day){
        $sql = "update blogs set title=?, content=?, day=?  where blog_id=?";
        pdo_execute($sql,$day,$content,$title,$blog_id);
    }
    function blogs_getinfo($blog_id){
        $sql = "select * from blogs where blog_id=?";
        return pdo_query_one($sql,$blog_id);
    }
?>