<?php session_start(); ?>
<?php
include './const.php';
include './pages/common/header.php';
include './src/function.php';
include './src/connect_db.php';
include './src/handle-form-product.php';

$page = @$_GET['page'];
$except = ['login', 'register'];
if (empty($_SESSION['current_user']) && !in_array($page, $except)) {
    header("Location: /admin/index.php?page=login");
    exit;
}
?>

<body>
    <?php
    switch ($page) {
        case "login":
            include  ADMIN_DIR . '/user/login.php';
            break;
        case "user_manage":
            include  ADMIN_DIR . '/user/user_manage.php';
            break;
        case "register":
            include  ADMIN_DIR . '/user/register.php';
            break;
        case "edit_user":
            include './user/edit_user.php';
            break;
        case "logout":
            include './user/logout.php';
            break;
        case "product-list":
            include './pages/product/product_listing.php';
            break;
        case "add-product":
            include './pages/product/add_product.php';
            break;
        case "edit_product":
            include './pages/product/edit_product.php';
            break;
        case "delete_product":
            include './pages/product/delete_product.php';
            break;
        default:
            include './pages/product/product_listing.php';
            break;
    }
    ?>

    <?php

    ?>
</body>

</html>