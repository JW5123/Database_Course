<?php
require_once("../../Database/connDB.php");
if (isset($_POST["create"])) {
    $local = $_POST["local"];
    $unit = $_POST["unit"];
    $department = $_POST["department"];
    $position = $_POST["position"];
    $pid = "T113001";
    $sqlInsert = "INSERT INTO experience(區域, 單位名稱, 科系名稱, 職位, 教授編號) VALUES ('$local','$unit','$department', '$position', '$pid')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "經歷新增成功!";
        header("Location: ../personal.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $unit = $_POST["unit"];
    $department = $_POST["department"];
    $local = $_POST["local"];
    $position = $_POST["position"];
    $pid = "T113001";
    $id = $_POST["id"];
    $sqlUpdate = "UPDATE experience SET 區域='$local', 單位名稱='$unit', 科系名稱='$department', 職位='$position', 教授編號='$pid' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "經歷更新成功!";
        header("Location: ../personal.php");
    }else{
        die("Something went wrong");
    }
}
?>