<?php
    class contacts{
        var $contact_id =null;
        var $name = null;
        var $email = null;
        var $content =null;
        var $day =null;
        public function get_all_contact($timeCondition)
        {
            $db = new connect;
            $select = "SELECT * FROM contacts where day =?";
            $result = $db->pdo_query($select,$timeCondition);
            if ($result) {
                # code...
                return $result;
            }
            else{
                return false;
            }
                    
          
        }
        
        
                
        

        public function get_contact()
        {
            $db = new connect;
            $select = "SELECT * FROM contacts";
            $result = $db->pdo_query($select);
            
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }}
      function contacts_insert($name, $email, $content, $day){
        $sql="insert into contacts(name, email, content, day) value(?, ?, ?, ?)";
        pdo_execute($sql,$name,$email,$content,$day);
    }
?>