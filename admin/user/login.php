<?php

if (isset($_POST['function']) && $_POST['function'] = 'login') {
    $pdo = new BaseDB();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = $pdo->getUserByEmail($email);
    if ($user && $user['email'] == $email && $user['password'] == $password) {
        $_SESSION['current_user'] = $user;
    }
    header("Location: /admin/index.php?page=user_manage");
    exit;
    //Ok thanh cong
}
if (empty($_SESSION['current_user'])) {
?>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập vào trang quản trị</p>

                <form action="" method="post" autocomplete="off">
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
                    <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Nhớ tài khoản
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="function" value="login">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">Quên mật khẩu</a>
                </p>
                <p class="mb-0">
                    <a href="?page=register" class="text-center">Đăng ký tài khoản mới</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
<?php } ?>