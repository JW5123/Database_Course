<?php
require_once("../../Database/connDB.php");
if (isset($_POST["create"])) {
    $courseName = $_POST["courseName"];
    $classlocal = $_POST["classlocal"];
    $week = $_POST["week"];
    $startnode = $_POST['startnode'];
    $endnode = $_POST['endnode'];
    $pid = "T113001";

    $sqlInsert = "INSERT INTO course(課程名稱, 教室地點, 星期, 開始節數, 結束節數, 教授編號) VALUES ('$courseName', '$classlocal', '$week', '$startnode', '$endnode', '$pid')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "新增成功!";
        header("Location: ../courseData.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $courseName = $_POST["courseName"];
    $classlocal = $_POST["classlocal"];
    $week = $_POST["week"];
    $startnode = $_POST['startnode'];
    $endnode = $_POST['endnode'];
    $pid = "T113001";
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE course SET 課程名稱='$courseName', 教室地點='$classlocal', 星期='$week', 開始節數='$startnode', 結束節數='$endnode', 教授編號='$pid' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "更新成功!";
        header("Location: ../courseData.php");
    }else{
        die("Something went wrong");
    }
}
?>