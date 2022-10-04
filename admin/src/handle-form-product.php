<?php

if (isset($_POST['function']) && $_POST['function'] == 'add_product') {
    $dataForm = $_POST;
    $data = [
        'product_name' => $dataForm['product_name'],
        'price' => $dataForm['price'],
        'product_detail' => $dataForm['product_detail'],
        'update_time' => time(),
        'create_time' => time()
    ];
    if (isset($_FILES['file'])) {
        $data['image'] = uploadFile($_FILES['file']);
    }
    return createProduct($data);
}

// edit product
if (isset($_POST['function']) && $_POST['function'] == 'edit_product') {
    $dataForm = $_POST;
    $productId = $_GET['id'];
    $editData = [
        'product_name' => $dataForm['product_name'],
        'price' => $dataForm['price'],
        'product_detail' => $dataForm['product_detail'],
        'update_time' => time(),
    ];
    if (isset($_FILES['file_edit'])) {
        $editData['image'] = uploadFile($_FILES['file_edit']);
    }
    return editProduct($editData['image'], $editData['product_name'], $editData['price'], $editData['product_detail'], $editData['update_time'], $productId);
}

// select by id to delete
if(isset($_POST['product_id'])){
        $id = $_POST['product_id'];
        return selectProduct($id);
}

//delete product
if(isset($_POST['confirm_delete'])){
    $id = $_POST['id'];
    return deleteProduct($id);
}


