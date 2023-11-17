



<body class="bg-gradient-login">
  <!-- Login Content -->
  <?php
    $us = user_selectall();
    if(isset($_POST['username'])&&isset($_POST['password'])){ 
       $username=$_POST['username'];
       $password=$_POST['password'];
      
         $checkuser=check_user($username, $password);
         if(is_array($checkuser)){
           $_SESSION['user_id']=$checkuser;
           $role = $checkuser['role'];
           if($role == "0"){
            $_SESSION['user_id']=$checkuser;
             include 'home.php';
           }else{
             echo ' 
             <div class="container-login">
             <div class="row justify-content-center">
               <div class="col-xl-6 col-lg-12 col-md-9">
                 <div class="card shadow-sm my-5">
                   <div class="card-body p-0">
                     <div class="row">
                       <div class="col-lg-12">
                         <div class="login-form">
                           <div class="text-center">
                             <h1 class="h4 text-gray-900 mb-4">Đăng nhập ADMIN</h1>
                           </div>
                           <form action="index.php?act=login" method="post" class="user">
                              <div class="error-message">
                              <i class="fa-solid fa-circle-exclamation"></i> Thông tin đăng nhập không chính xác !
                              </div><br>
                             <div class="form-group">
                               <input required  type="text" class="form-control" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Tên tài khoản">
                             </div>
                             <div class="err"></div>
                              <div class="form-group">
                                <input required  type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Mật khẩu" placeholder="Tên tài khoản">
                             </div>
                             <div class="err"></div>
                             <div class="form-group">
                               <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                 <input type="checkbox" class="custom-control-input" id="customCheck">
                                 <label class="custom-control-label" for="customCheck">Lưu thông tin của tôi</label>
                               </div>
                             </div>
                             <div class="form-group">
                              <button type="submit" onclick="checkform()" value="submit" class="btn btn-primary">Đăng Nhập</button>
                             </div>
                             <hr>
                           </form>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
             ';
           }
         }else{
           echo ' 
           <div class="container-login">
           <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-12 col-md-9">
               <div class="card shadow-sm my-5">
                 <div class="card-body p-0">
                   <div class="row">
                     <div class="col-lg-12">
                       <div class="login-form">
                         <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Đăng nhập ADMIN</h1>
                         </div>
                         <form action="index.php?act=login" method="post" class="user">
                            <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i> Thông tin đăng nhập không chính xác !
                            </div><br>
                            <div class="form-group">
                              <input required  type="text" class="form-control" name="username" id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Tên tài khoản">
                            </div>
                            <div class="err"></div>
                            <div class="form-group">
                              <input required  type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Mật khẩu">
                            </div>
                            <div class="err"></div>
                            <div class="form-group">
                              <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Lưu thông tin của tôi</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" value="submit" class="btn btn-primary">Đăng Nhập</button>
                            </div>
                           <hr>
                         </form>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
             ';
       }
    }else{
       echo '
            <div class="container-login">
            <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                  <div class="card-body p-0">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="login-form">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Đăng nhập ADMIN</h1>
                          </div>
                          <form action="index.php?act=login" method="post" class="user">
                            <div class="form-group">
                              <input required  type="text" class="form-control" name="username" id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Tên tài khoản">
                            </div>
                            <div class="err"></div>
                            <div class="form-group">
                              <input required  type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Mật khẩu">
                            </div>
                            <div class="err"></div>
                            <div class="form-group">
                              <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Lưu thông tin của tôi</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" value="submit" class="btn btn-primary">Đăng Nhập</button>
                            </div>
                            <hr>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
       ';
    }
  ?>
  
  <!-- Login Content -->
  
</body>

