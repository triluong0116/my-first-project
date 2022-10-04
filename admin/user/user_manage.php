<?php 
    if(isset($_SESSION)){
        $currentUser = $_SESSION['current_user'];
    };
?>
<div id="hello-box" class="login-box">
    <h2>Xin chào <?= $currentUser['email'] ?></h2><br>
    <a href="index.php?page=product-list">Quản lý sản phẩm</a><br>
    <a href="index.php?page=edit_user">Đổi mật khẩu</a><br>
    <a href="index.php?page=logout">Đăng xuất</a>
</div>