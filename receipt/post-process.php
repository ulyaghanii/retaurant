<?php

include("../config/database.php");

$sql = "SELECT id, name FROM receipts";
$result = mysqli_query($db, $sql);
$categories_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $receipt_date = $_POST['receipt_date'];
    $customer_name = $_POST['customer_name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $user = $_POST['user'];

    try
    {
        if($id){
        $sql = "UPDATE receipts SET receipt_date= '$receipt_date', customer_name='$customer_name', price='$price', status='$status', user='$user' WHERE id=$id";
        }else {
        $sql = "INSERT INTO receipts(receipt_date, customer_name, price, status, user) VALUES ('$receipt_date', '$customer_name', '$price', '$status', '$user')";
    
    }
    $result = mysqli_query($db, $sql);

    if ($result) {
        header("Location: index.php?success=Data tersimpan");
        } else {
            header("Location: index.php?error=Data tidak tersimpan");
        }
    } catch (Exception $exception) {
        header('Location: index.php?error=' . $exception->getMessage());
    }
    
    }
?>