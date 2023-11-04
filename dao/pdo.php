<?php
class connect {
    function pdo_get_connection(){
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        try {
            //code...
            $conn = new PDO ("mysql:host=$servername;dbname=duan1_n9",$username, $password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo"kết nối thành công";
            return $conn;
        } catch (PDOException $e) {
            //throw $th;
            echo "lỗi kết nối " . $e->getMessage();
        }
    }

}

?>