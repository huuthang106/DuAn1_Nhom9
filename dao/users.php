<?php
class users
{
    var $user_id = null;
    var $username = null;
    var $password = null;
    var $address = null;
    var $phone = null;
    var $email = null;
    var $avarta = null;
    var $role = null;
    var $token = null;
    public function get_user_id($user_id)
    {
        $db = new connect();
        $select = "SELECT * FROM users where user_id =?";
        $result = $db->pdo_query($select, $user_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_user_id_fullname($user_id)
    {
        $db = new connect();
        $select = "SELECT fullname FROM users where user_id =?";
        $result = $db->pdo_query($select, $user_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function change_password($user_id, $old_password, $new_password)
    {
        $db = new connect();

        // Lấy mật khẩu hiện tại từ cơ sở dữ liệu
        $select_current_password = "SELECT password FROM users WHERE user_id = ?";
        $current_password_result = $db->pdo_query($select_current_password, $user_id);

        // Kiểm tra nếu có kết quả và ít nhất một dòng dữ liệu được trả về
        if ($current_password_result && count($current_password_result) > 0) {
            // Lấy mật khẩu từ dòng đầu tiên của kết quả
            $current_password = $current_password_result[0]['password'];

            // Kiểm tra mật khẩu cũ
            if (password_verify($old_password, $current_password)) {
                // Mã hóa mật khẩu mới
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Cập nhật mật khẩu mới vào cơ sở dữ liệu
                $update_password = "UPDATE users SET password = ? WHERE user_id = ?";
                $result = $db->pdo_execute($update_password, $hashed_new_password, $user_id);

                if ($result) {
                    echo '
                        </br><div class="success-message">
                        <i class="fa-solid fa-circle-check"></i>Thay đổi mật khẩu thành công
                        </div>
                    ';
                    return true;
                } else {
                    echo '
                        <div class="error-message">
                        <i class="fa-solid fa-circle-exclamation"></i> Lỗi khi cập nhật mật khẩu mới
                        </div><br>
                    ';
                    return false;
                }
            } else {
                echo '
                    <div class="error-message">
                    <i class="fa-solid fa-circle-exclamation"></i> Mật khẩu cũ không đúng
                    </div><br>
                ';
                return false; // Mật khẩu cũ không đúng
            }
        } 
    }


    public function count_user()
    {
        $db = new connect();
        $select = "SELECT COUNT(user_id) AS total_users FROM users
        ";
        $result = $db->pdo_query($select);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function update_user($fullname, $address, $phone, $email, $avarta, $user_id)
    {
        $db = new connect();
        $select = "UPDATE users SET fullname =?, address =?, phone =?, email =?, avarta =? WHERE user_id=?";
        $result = $db->pdo_execute($select, $fullname, $address, $phone, $email, $avarta, $user_id);
        if ($result) {
            # code...
            echo '<script>window.location.href = "index.php?act=user";</script>';
            return $result;
        } else {
            return false;
        }
    }
    public function update_users($fullname, $address, $phone, $email, $avarta, $user_id)
    {
        $db = new connect();
        $select = "UPDATE users SET fullname =?, address =?, phone =?, email =?, avarta =? WHERE user_id=?";
        $result = $db->pdo_execute($select, $fullname, $address, $phone, $email, $avarta, $user_id);
        if ($result) {
            # code...
            echo '<script>window.location.href = "index.php?act=info_admin";</script>';
            return $result;
        } else {
            return false;
        }
    }
    public function get_phone()
    {
        $db = new connect();
        $select = "SELECT phone FROM users";
        $result = $db->pdo_query($select);
        if ($result) {
            # code...
            return $result;
        } else {
            return false;
        }
    }
    public function fogot_password($email, $new_password)
    {
        $db = new connect();
    
        // Mã hóa mật khẩu mới
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
        // Cập nhật mật khẩu mới vào cơ sở dữ liệu dựa trên email
        $update_password = "UPDATE users SET password = ? WHERE email = ?";
        $result = $db->pdo_execute($update_password, $hashed_new_password, $email);
    
        if ($result) {
            echo '
                </br><div class="success-message">
                <i class="fa-solid fa-circle-check"></i> Thay đổi mật khẩu thành công
                </div>
            ';
            return true;
        } else {
            echo '
                <div class="error-message">
                <i class="fa-solid fa-circle-exclamation"></i> Lỗi khi cập nhật mật khẩu mới
                </div><br>
            ';
            return false;
        }
    }
    public function change_new_password($password, $token,$email)
    {
        $db = new connect();
    
        // Mã hóa mật khẩu mới
        $hashed_new_password = password_hash($password, PASSWORD_DEFAULT);
    
        $select = "UPDATE users SET password = ? WHERE token = ?";
        $result = $db->pdo_execute($select, $hashed_new_password, $token);
        $db = new connect();
        $delete= "UPDATE users SET token =null WHERE email=?";
        $start_delete=$db->pdo_execute($delete,$email);
    
        if ($start_delete) {
            
            echo '<script>window.location.href = "index.php?act=login";</script>';
            return $result;
        } else {
            return false;
        }
    }
    public function get_email_user($user_id){
        $db = new connect();
        $select ="SELECT email from users WHERE user_id=?";
        $result = $db->pdo_query_one($select,$user_id);
        if ($result) {
            # code...
            return $result;
        }else{
            return false;
        }
    }
    
}
function user_selectall()
{
    $sql =  "select * from users order by user_id DESC";
    return pdo_query($sql);
}
function user_register($username, $password, $email, $fullname)
{
    // Băm mật khẩu sử dụng password_hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Sử dụng prepared statement để tránh tấn công SQL injection
    $sql = "INSERT INTO users (username, password, email, fullname) VALUES (?, ?, ?, ?)";

    // Thực hiện truy vấn với giá trị đã được băm
    pdo_execute($sql, $username, $hashed_password, $email, $fullname);
}

// thêm mới loại
function user_insert($username, $password, $email)
{
    $sql = "insert into users(username, password, email) value(?, ?, ?)";
    pdo_execute($sql, $username, $password, $email);
}
// function check_user($username, $password)
// {
//     $sql = "select user_id, role from users where username= '" . $username . "' and password='" . $password . "'";

//     $sp = pdo_query_one($sql);}

// thêm mới 
function staff_insert($username, $password, $email, $role, $fullname, $phone)
{
    // Băm mật khẩu sử dụng password_hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Sử dụng prepared statement để tránh tấn công SQL injection
    $sql = "INSERT INTO users (username, password, email, role, fullname, phone) VALUES (?, ?, ?, ?, ?, ?)";

    // Thực hiện truy vấn với giá trị đã được băm
    pdo_execute($sql, $username, $hashed_password, $email, $role, $fullname, $phone);
}

function check_user($username, $password)
{
    $sql = "select user_id, role from users where username= '" . $username . "' and password='" . $password . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function get_user_info_by_username($username)
{
    $sql = "SELECT user_id, role, password FROM users WHERE username = ?";
    $sp = pdo_query_one($sql, $username);
    return $sp;
}
function check_email($email)
{
    $sql = "select * from users where email= '" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function clients_selectall()
{
    $sql =  "select * from user order by use_id DESC";
    return pdo_query($sql);
}
function staff_delete($user_id)
{
    $sql = "delete from users where user_id = '" . $user_id . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function users_selectall($user_id)
{
    $sql = "select * from users where user_id = '" . $user_id . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function insert_token($new_token, $check_email)
{
    $sql = "UPDATE users SET token = ? WHERE email = ?";
    pdo_execute($sql, $new_token,  $check_email);
}
function select_token($check_email)
{
    $sql = "select token from users where email = ?";
    $sp = pdo_query_one($sql, $check_email);
    return $sp;
}