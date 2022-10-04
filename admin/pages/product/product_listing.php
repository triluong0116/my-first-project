<body>
<?php
    include './src/handle-form-product.php';
    $pdo = new BaseDB();
    $currentUser = $_SESSION['current_user'];
    $results = $pdo->showProduct('product', 20, 0);
    // var_dump($results);

    if (!empty($_SESSION['current_user'])) {
    } else { ?>
        <div class="container">
            <div class="login-box">
                Bạn chưa đăng nhập. Mời bạn quay lại đăng nhập quản trị <a href="./index.php">tại đây</a>
            </div>
        </div>
<?php } ?>

    <div class="col-12 col-lg-12">
        <nav class="navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../admin/index.php?page=user_manage" class="nav-link"><i class="fa-solid fa-user"></i> &nbsp; Xin chào <?= $currentUser['email'] ?></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="btn btn-block btn-primary" href="../admin/index.php?page=add-product"> <i class="fa-solid fa-plus"></i>&nbsp; Thêm sản phẩm</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/index.php?page=user_manage" class="nav-link"><i class="fa-solid fa-house"></i>&nbsp; Trang chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../admin/index.php?page=logout" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i>&nbsp; Đăng xuất</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Ngày cập nhật</th>
                        <th>Ngày tạo</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    for ($i = 0; $i < count($results); $i++) {
                ?>
                    <tr>
                        <td style="width: 120px;">
                            <img style="width: 100%;" src="../../admin/<?= $results[$i]['image']  ?>" alt="Product 1" class="">
                        </td>
                        <td>
                            <strong><?= $results[$i]['product_name'] ?></strong>
                        </td>
                        <td>
                            <span><?= $results[$i]['price'] ?></span>
                        </td>
                        <td>
                            <p><?= $results[$i]['product_detail'] ?></p>
                        </td>
                        <td>
                            <span><?= date('d/m/Y H:i', $results[$i]['update_time']) ?></span>
                        </td>
                        <td>
                            <span><?= date('d/m/Y H:i', $results[$i]['create_time']) ?></span>
                        </td>
                        <td>
                            <a href="../admin/index.php?page=edit_product&id=<?= $results[$i]['id'] ?>">&nbsp;&nbsp;<i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="../admin/index.php?page=delete_product&id=<?= $results[$i]['id'] ?>">&nbsp;&nbsp;<i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>