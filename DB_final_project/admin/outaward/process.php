<?php
require_once("../../Database/connDB.php");
if (isset($_POST["create"])) {
    $year = $_POST["year"];
    $award_name = $_POST["award_name"];
    $organize = $_POST["organize"];
    $date = $_POST["date"];
    $pid = "T113001";
    $additional = $_POST["additional"];
    $sqlInsert = "INSERT INTO outaward(年度, 獎項名稱, 承辦組織, 日期, 教授編號, 補充說明) VALUES ('$year','$award_name','$organize', '$date', '$pid', '$additional')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "獎項新增成功!";
        header("Location: ../outaward.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $year = $_POST["year"];
    $award_name = $_POST["award_name"];
    $organize = $_POST["organize"];
    $date = $_POST["date"];
    $pid = "T113001";
    $additional = $_POST["additional"];
    $id = $_POST["id"];
    $sqlUpdate = "UPDATE outaward SET 年度='$year', 獎項名稱='$award_name', 承辦組織='$organize', 日期='$date', 教授編號='$pid' 補充說明='$additional' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "獎項更新成功!";
        header("Location: ../outaward.php");
    }else{
        die("Something went wrong");
    }
}
?>