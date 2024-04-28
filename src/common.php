<?php
function DBconnect($host, $dsn, $username, $password, $options) {
    $connection = 0;
    try {
        $connection = new PDO($dsn, $username, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $connection;
}


function escape($data) {
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    $data = trim($data);
    $data = stripslashes($data);
    return ($data);
}

function read_products() {
    require 'config.php';
    $connection = DBconnect($host, $dsn, $username, $password, $options);
    $result = 0;
    $sql = "SELECT * FROM products";
    try {
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    return $result;
}

function login($user, $pass) {
    require 'config.php';
    $connection = DBconnect($host, $dsn, $username, $password, $options);
    $result = 0;
    $sql = "SELECT * FROM users WHERE username = :user AND password = :pass";
    try {
        $statement = $connection->prepare($sql);
        $statement->bindParam(':user', $user, PDO::PARAM_STR);
        $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    return $result;
}

function buy($idproduct) {
    require 'config.php';
    $connection = DBconnect($host, $dsn, $username, $password, $options);
    $result = 0;
    $sql = "SELECT * FROM products WHERE idproduct = :idproduct";
    try {
        $statement = $connection->prepare($sql);
        $statement->bindParam(':idproduct', $idproduct, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    return $result;
}

function register($user, $pass, $fullname) {
    require 'config.php';
    $connection = DBconnect($host, $dsn, $username, $password, $options);
    $sql = "INSERT INTO web_assessment.users (username, password, full_name) VALUES (:user, :pass, :fullname)";
    try {
        $statement = $connection->prepare($sql);
        $statement->bindParam(':user', $user, PDO::PARAM_STR);
        $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
        $statement->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $statement->execute();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    return 0;
}
?>