<?php

?>

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
                <h2 id="title_them_sp">Thêm sản phẩm:</h2>
                <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <tr>
                        <td>
                            <input type="file" class="" name="file">
                        </td>
                        <td>
                            <input type="text" class="form-control " name="product_name" id="" require>
                        </td>
                        <td>
                            <input type="number" name="price" class="form-control" placeholder="Giá tiền">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="product_detail" id="" require>
                        </td>
                        <input type="hidden" name="function" value="add_product" />
                    </tr>
                    <input type="submit" name="submit" id="edit-btn" class="btn btn-primary" value="Thêm">
                </form>
            </tbody>
        </table>
        <hr>
    </div>
</body>