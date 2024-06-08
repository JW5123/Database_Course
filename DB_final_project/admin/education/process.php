<?php
require_once("../../Database/connDB.php");
require_once '../../translation/GoogleTranslateForFree.php';
if (isset($_POST["create"])) {
    $school = $_POST["school"];
    $department = $_POST["department"];
    $degree = $_POST["degree"];
    $specialty = $_POST['specialty'];
    $category = "";
    if($school && $department && $degree != NULL){
        $category = "學歷";
    } else {
        $category = "專長";
    }
    $pid = "T113001";

    $tr = new GoogleTranslateForFree();
    $spe_english = $tr->translate("zh-TW", "en", "$specialty", 5);

    $sqlInsert = "INSERT INTO educations(學校, 系所, 學位, 專長, 專長英文, 分類, 教授編號) VALUES ('$school', '$department', '$degree', '$specialty', '$spe_english', '$category', '$pid')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "新增成功!";
        header("Location: ../personal.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $school = $_POST["school"];
    $department = $_POST["department"];
    $degree = $_POST["degree"];
    $specialty = $_POST['specialty'];
    $category = "";
    if($school && $department && $degree != NULL){
        $category = "學歷";
    } else {
        $category = "專長";
    }
    $pid = "T113001";
    $id = $_POST["id"];

    $tr = new GoogleTranslateForFree();
    $spe_english = $tr->translate("zh-TW", "en", "$specialty", 5);

    $sqlUpdate = "UPDATE educations SET 學校='$school', 系所='$department', 學位='$degree', 專長='$specialty', 專長英文='$spe_english', 分類='$category', 教授編號='$pid' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "更新成功!";
        header("Location: ../personal.php");
    }else{
        die("Something went wrong");
    }
}
?>