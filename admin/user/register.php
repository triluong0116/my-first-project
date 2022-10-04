<body>
    <?php
    if (isset($_POST['function']) && $_POST['function'] == 'register') {
        $pdo = new BaseDB();
        $inputData = $_POST;
        $data = [
            'fullname' => $inputData['fullname'],
            'email' => $inputData['email'],
            'password' => md5($inputData['password'])
        ];
        if (!empty($_POST['fullname'] || !empty($_POST['email']) || !empty($_POST['password']))) {
        }
        $fullname = $_POST['fullname'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        
        

        $check_user = $pdo->checkUserExist($email);
        if (!$check_user || $check_user && $check_user['email'] != $email) {
            // dd($check_user);
            $register = $pdo->insertUser($fullname, $email, $password);
            // var_dump($check_user);
        ?>
            <div id="success-notify" class="register-box login-box">
                <h1>Chúc mừng</h1>
                <h4>Bạn đã tạo thành công tài khoản <?= $_POST['email'] ?></h4>
                <a href="./index.php">Đăng nhập</a>
            </div>
        <?php
        } else { //var_dump($check_user);
        ?>
            <div id="error-notify" class="register-box login-box">
                <h1>Thông báo</h1>
                <h4>Tài khoản đã tồn tại!</h4>
                <a href="../../admin/index.php?page=register">Tạo tài khoản khác</a>
            </div>

    <?php } ?>
    <?php } else { ?>

        <div class="register-box">
            <div class="register-logo">
                <a href="#"><b></b></a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Đăng ký thành viên mới</p>

                    <form action="" method="post">
                        <input type="hidden" name="function" value="register">
                        <div class="input-group mb-3">
                            <input type="text" name="fullname" class="form-control" placeholder="Họ Tên">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="retype_password" class="form-control" placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    Đã có tài khoản <a href="../../admin/index.php" class="text-center">Đăng nhập</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    <?php } ?>



</body>

</html>