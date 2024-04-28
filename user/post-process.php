<?php
include("../config/database.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "insert into users(name, username, password) values ('$name', '$username', '$password')";
    $result = mysqli_query($db, $sql);

    try {
        if ($id) {
            $sql = "UPDATE users SET name='$name', username='$username', password='$password'
            WHERE id=$id";
        } else {
            $sql = "INSERT INTO users(name, username, password) VALUES ('$name', '$username', '$password')";
        }
        $result = mysqli_query($db, $sql);

        if($result) {
            header("Location: index.php?success=Add data success");
        } else {
            header("Location: index.php?error=Add data error");
        }
    } catch (Exception $exception) {
        header("Location: index.php?error=" . $exception->getMessage());
    }
}
?>