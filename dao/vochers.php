<?php
    class vochers{
        var $vocher_id = null;
        var $name = null;
        var $sale = null;
        var $status = null;
        

        public function get_vochers(){
            $db = new connect();
            $select = "SELECT * FROM vochers WHERE status = 1";
            $result = $db ->pdo_query($select);
            if($result){
                return $result;
            }else{
                return false;
            }


        }
        public function get_sale_vocher($vocher_id){
            $db= new connect;
            $select ="SELECT sale FROM vochers WHERE vocher_id =?";
            $result = $db->pdo_query($select,$vocher_id);
            if($result){
                return $result;
            }
            else{
                return false;
            }

        }
        public function update_status_vocher($vocher_id,$status){
            $db = new connect();
            $select ="UPDATE vochers set status =? WHERE vocher_id =?";
            $result = $db->pdo_execute($select,$status,$vocher_id);
            if($result){
                echo '<script>window.location.href = "index.php?act=vochers";</script>';
                return $result;

            }else {
                return false;
            }

        }
        public function get_vochers_all(){
            $db = new connect();
            $select = "SELECT * FROM vochers";
            $result = $db ->pdo_query($select);
            if($result){
                return $result;
            }else{
                return false;
            }


        }
        public function update_vocher_id($vocher_id,$name,$sale){
            $db = new connect;
            $select = "UPDATE vochers set name =?, sale=? WHERE vocher_id =?";
            $result = $db->pdo_execute($select,$name,$sale,$vocher_id);
            if($result){
                echo '<script>window.location.href = "index.php?act=vochers";</script>';
                return $result;
            }
            else{
                return false;
            }
        }
        public function get_vocher_id($vocher_id){
            $db = new connect();
            $select ="SELECT * FROM vochers WHERE vocher_id =?";
            $result = $db->pdo_query($select,$vocher_id);
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        

    }
    function select_all_vochers(){
        $sql =  "select * from vochers order by vocher_id DESC";
        return pdo_query($sql);
    }
    function ư($name,$sale){
        $sql="insert into vochers (name,sale) value(?,?)";
        pdo_execute($sql,$name,$sale);
        
        
    }

?>