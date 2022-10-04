<body>
    <?php
    $user = $_SESSION['current_user'];

    $error = false;
    if (isset($_POST['function']) && $_POST['function'] == 'edit_user') {
        if (
            isset($_POST['old_password']) && !empty($_POST['old_password'])
            && isset($_POST['new_password']) && !empty($_POST['new_password'])
        ) {
            $pdo = new BaseDB();
            $userEdit = $user['email'];
            $old_password =  md5($_POST['old_password']);
            $new_password =  md5($_POST['new_password']);
            $userResult = $pdo->getUserByEmail($user['email']);
            if($old_password != $new_password){
                $error = 'Mật khẩu nhập vào không đúng!';
            }
            $result = $pdo->editUserByEmai($user['email'], $new_password);
            // var_dump($result);
            if ($error !== false) {
    ?>
                <div id="error-notify" class="login-box">
                    <h2>Thông báo</h2>
                    <h4><?= $error ?></h4>
                    <a href="../../admin/index.php?page=edit_user">Đổi lại mật khẩu</a>
                </div>
            <?php } else { ?>
                <div id="edit-notify" class="login-box">
                    <h2><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h2>
                    <a href="../../admin/index.php?page=user_manage">Quay lại tài khoản</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div id="edit-notify" class="login-box">
                <h2>Vui lòng nhập đủ thông tin để sửa tài khoản</h2>
                <a href="./edit_user.php">Quay lại sửa tài khoản</a>
            </div>
        <?php }
    } else {
        $user = $_SESSION['current_user'];
        if (!empty($user)) { ?>
            <div id="edit_user" class="login-box">
                <h2>Xin chào "<?= $user['email'] ?>". </br> Bạn đang thay đổi mật khẩu</h2>
                <form action="?page=edit_user" method="post">
                    <input type="hidden" name="function" class="form-control" value="edit_user">
                    <label for="">Password cũ</label><br>
                    <input type="password" name="old_password" class="form-control" id=""><br>
                    <label for="">Password mới</label><br>
                    <input type="password" name="new_password" class="form-control" id=""><br>
                    <p><?=$error?></p>
                    <br><br>
                    <input type="submit" class="btn btn-primary btn-block" value="Edit">
                </form>
            </div>
    <?php }
    }
    ?>
</body>