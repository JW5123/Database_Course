<?php
require_once("../../Database/connDB.php");
if (isset($_POST["create"])) {
    $industry_name = $_POST["industry_name"];
    $fromdate = $_POST["fromdate"];
    $todate = $_POST["todate"];
    $author = $_POST["author"];
    $industry_id = $_POST["industry_id"];
    $pid = "T113001";
    $sqlInsert = "INSERT INTO industry(產學名稱, 開始日期, 結束日期, 身分類別, 計畫代號, 教授編號) VALUES ('$industry_name', '$fromdate', '$todate', '$author', '$industry_id', '$pid')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "產學計畫新增成功!";
        header("Location: ../industry.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $industry_name = $_POST["industry_name"];
    $fromdate = $_POST["fromdate"];
    $todate = $_POST["todate"];
    $author = $_POST["author"];
    $industry_id = $_POST["industry_id"];
    $pid = "T113001";
    $id = $_POST["id"];
    $sqlUpdate = "UPDATE industry SET 產學名稱='$industry_name', 開始日期='$fromdate', 結束日期='$todate', 身分類別='$author', 計畫代號='$industry_id', 教授編號='$pid' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "產學計畫更新成功!";
        header("Location: ../industry.php");
    }else{
        die("Something went wrong");
    }
}
?>

?>