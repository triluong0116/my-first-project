<?php

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

function uploadFile($file)
{
    $uploadFolder = "uploads/";
    if (!is_dir($uploadFolder)) {
        mkdir($uploadFolder, 0777);
    }
    $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $fileName = md5($file['name'] . time()) . '.' . $fileType;
    $fullPathFile = $uploadFolder . $fileName;
    return move_uploaded_file($file["tmp_name"], $fullPathFile) ? $fullPathFile : null;
}



function registerUser($data)
{
    $pdo = new BaseDB();

    if (isset($_POST['function']) && $_POST['function'] == 'register') {
        $inputData = $_POST;
        $data = [
            'fullname' => $inputData['fullname'],
            'email' => $inputData['email'],
            'password' => md5($inputData['password'])
        ];
        if (isset($data['fullname']) && !empty($data['fullname']) && isset($data['email']) && !empty($data['email'])  && isset($data['password']) && !empty($data['password'])) {
            return $pdo->insertUser($data['fullname'], $data['email'], $data['password']);
        }
    }
}


function createProduct($data)
{
    $pdo = new BaseDB();

    if (!$pdo->insert('product', $data)) {
        return header("Location: /admin/index.php?page=list-product&success=false&message=Co Loi");
    }

    return header("Location: /admin/index.php?page=list-product&success=true&message=Thanh Cong");
}


function editProduct($image, $name, $price, $detail, $update_time, $id)
{
    $pdo = new BaseDB();

    if (!$pdo->editProductById($image, $name, $price, $detail, $update_time, $id)) {
        return header("Location: /admin/index.php?page=list-product&success=false&message=Co Loi");
    }
    return header("Location: /admin/index.php?page=list-product&success=true&message=Thanh Cong");
}


function selectProduct($id){
    $pdo = new BaseDB();
    if($pdo->selectProductById($id)){
        // return header("Location: /admin/index.php?page=delete_product");
    }
}

 function deleteProduct($id)
{
    $pdo = new BaseDB();
    if(!$pdo->deleteProductById($id)){
        return header("Location: /admin/index.php?page=list-product");
    }
    return header("Location: /admin/index.php?page=list-product&success=true&message=Thanh Cong");
}