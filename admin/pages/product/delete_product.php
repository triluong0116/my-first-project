<?php
$pdo = new BaseDB();
// $currentUser = $_SESSION['current_user'];
    $_POST['id'] = $_GET['id'];
    $id = $_POST['id'];
    $deleteProduct = $pdo->selectProductById($id);
    // var_dump($deleteProduct);

?>

<body>
    <div id="edit-notify" class="box-content">
        <h2>Bạn muốn xóa sản phẩm <?= $deleteProduct['product_name'] ?> ?</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input style="width: 150px;" name="confirm_delete" type="submit" class="btn btn-block btn-primary" value="Xóa">
        </form>
        <br>
        <a href="/admin/index.php?page=list-product"><i class="fa-solid fa-left-long"></i>&nbsp; Quản lý sản phẩm</a>
    </div>
</body>