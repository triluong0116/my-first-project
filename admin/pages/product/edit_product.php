<body>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 'false') { ?>
        <div id="error-notify" class="">
            <h2>Thông báo</h2>
            <h4><?= $_GET['message'] ?></h4>
        </div>
    <?php } ?>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                </tr>
            </thead>
            <tbody>
                <br>
                <h2 style="padding-left: 30px;" id="title_ten_sp">Sửa sản phẩm: </h2>
                <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <tr>
                        <td hidden>
                            <input type="text" name="function" value="edit_product">
                        </td>
                        <td hidden>
                            <input type="text" name="id" value="<?= $productId ?>">
                        </td>
                        <td>
                            <input type="file" class="" name="file_edit">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="product_name" id="">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="price">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="product_detail" id="">
                        </td>
                    </tr>
                    <input type="submit" id="edit-btn" class="btn btn-primary" value="Sửa">
                </form>
            </tbody>
        </table>
        <hr>
    </div>
</body>