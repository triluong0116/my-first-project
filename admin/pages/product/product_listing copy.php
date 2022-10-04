
<body>
    <?php
    session_start();
    require_once '../connect_db.php';
    $error = false;
    $currentUser = $_SESSION['current_user'];
    $result = mysqli_query($connect, "SELECT * FROM `product`;");
    $row = mysqli_fetch_array($result);
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $products = mysqli_query($connect, "SELECT * FROM `product` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "");
    $totalRecords = mysqli_query($connect, "SELECT * FROM `product`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if (!empty($_SESSION['current_user'])) {
    ?>
    <?php } else { ?>
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
                    <a href="./index.php" class="nav-link"><i class="fa-solid fa-user"></i> &nbsp; Xin chào <?= $currentUser['email'] ?></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="btn btn-block btn-primary" href="./add_product.php">Thêm sản phẩm</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index.php" class="nav-link"><i class="fa-solid fa-house"></i>&nbsp; Trang chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="./logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i>&nbsp; Đăng xuất</a>
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
                <?php
                while ($row = mysqli_fetch_array($products)) {
                ?>
                    <tbody>
                        <tr>
                            <td style="width: 120px;">
                                <img style="width: 100%;" src="<?=$row['image']?>" alt="Product 1" class="">
                            </td>
                            <td>
                                <strong><?=$row['product_name']?></strong>
                            </td>
                            <td>
                                <span><?=$row['price']?></span>
                            </td>
                            <td>
                                <p><?=$row['product_detail']?></p>
                            </td>
                            <td>
                                <span><?= date('d/m/Y H:i', $row['update_time']) ?></span>
                            </td>
                            <td>
                                <span><?= date('d/m/Y H:i', $row['create_time']) ?></span>
                            </td>
                            <td>
                                <a href="./edit_product.php?id=<?= $row['id'] ?>">&nbsp;&nbsp;<i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="./delete_product.php?id=<?= $row['id'] ?>">&nbsp;&nbsp;<i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php require_once './pagination.php'; ?>

</body>
