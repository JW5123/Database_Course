<?php
require_once("../../Database/connDB.php");

if (isset($_POST["create"])) {
    $file_name = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $name = $_POST["name"];
    $en_name = $_POST["en_name"];
    $position = $_POST['position'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $office = $_POST['office'];
    $introduce = $_POST['introduce'];

    $folder = '../../image/' .$file_name;

    if($file_name){
        move_uploaded_file($tempname, $folder);
    }

    $sqlCheck = "SELECT * FROM introduction";
    $result = mysqli_query($conn, $sqlCheck);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 0) {
        $sqlInsert = "INSERT INTO introduction(照片, 姓名, 英文姓名, 職稱, 簡介, 分機, 信箱, 辦公室) VALUES ('$file_name', '$name', '$en_name', '$position', '$introduce','$phone', '$mail', '$office')";
        if (mysqli_query($conn, $sqlInsert)) {
            session_start();
            $_SESSION["create"] = "儲存成功!";
            header("Location: ../personal.php");
        } else {
            die("Something went wrong");
        }
    } else {
        if ($file_name) {
            $sqlUpdate = "UPDATE introduction SET 照片='$file_name', 姓名='$name', 英文姓名='$en_name', 職稱='$position', 簡介='$introduce', 分機='$phone', 信箱='$mail', 辦公室='$office'";
        } else {
            $sqlUpdate = "UPDATE introduction SET 姓名='$name', 英文姓名='$en_name', 職稱='$position', 簡介='$introduce', 分機='$phone', 信箱='$mail', 辦公室='$office'";
        }
        if (mysqli_query($conn, $sqlUpdate)) {
            session_start();
            $_SESSION["update"] = "儲存成功!";
            header("Location: ../personal.php");
        } else {
            die("Something went wrong");
        }
    }
}
