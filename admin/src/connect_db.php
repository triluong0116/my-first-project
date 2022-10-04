<?php

class BaseDB
{
    protected $conn;

    function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'db_test';
        $this->conn = new PDO("mysql:host=$host; dbname=$database; charset=utf8", $user, $password);
    }

    public function selectTable($tableName, $column = '*', $limit = 20, $offset = 0)
    {
        $sql = "SELECT {$column} FROM {$tableName} LIMIT {$limit} OFFSET {$offset}";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectProductById($id){
        $sql = "SELECT * FROM `product` WHERE `id` = '$id'";
        return $this->conn->query($sql)->fetch();
    }

    public function showProduct($tableName, $limit = 20, $offset = 0)
    {
        $sql = "SELECT * FROM {$tableName} LIMIT {$limit} OFFSET {$offset}";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProductById($id){
        $sql = "DELETE FROM `product` WHERE `id` = '$id'";
        return $this->conn->query($sql);
    }

    public function insert($table, $data)
    {
        $columns = "";
        $values = "";

        $totalItem = count($data);
        $i = 1;
        foreach ($data as $key => $value) {
            $comma = $i < $totalItem ? "," : "";
            $columns .= "{$key}" . $comma;
            $values .= "'{$value}'" . $comma;
            $i++;
        }

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        // var_dump($sql);
        return $this->conn->query($sql);
    }

    public function editProductById($image, $name, $price, $detail, $update_time, $id)
    {
        $sql = "UPDATE `product` SET `image`= '$image', `product_name` = '$name', `price` = '$price', `product_detail` = '$detail' WHERE `id` = '$id' ";
        $query = $this->conn->query($sql);
        // var_dump($query);
        return $query->fetch();
    }


    public function getUserByEmail($email)
    {
        $sql = "SELECT `email`, `password` FROM `user` WHERE `email` = '$email' limit 1";
        $query = $this->conn->query($sql);
        //Thieu -> fetch 
        return $query->fetch();
    }

    public function editUserByEmai($email, $password)
    {
        $sql = "UPDATE `user` SET `password` = '$password' WHERE `email` = '$email' ";
        return $this->conn->query($sql);
    }

    public function insertUser($fullname, $email, $password)
    {
        $sql = "INSERT INTO `user`(`fullname`, `email`, `password`) VALUES ('$fullname','$email','$password')";
        return $this->conn->query($sql);
    }

    public function checkUserExist($email)
    {
        $query = $this->conn->prepare("SELECT * FROM user WHERE email=:email limit 1");
        $query->bindParam(':email', $email);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
