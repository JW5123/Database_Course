<?php
require_once("../../../Database/connDB.php");
if (isset($_POST["create"])) {
    $year = $_POST["year"];
    $name = $_POST["name"];
    $number = $_POST["number"];
    $ability = $_POST["ability"];
    $additional = $_POST["additional"];
    $state = $_POST["state"];
    $pid = "T113001";
    $sqlInsert = "INSERT INTO seniorproject(年度, 專題題目, 需求人數, 具備能力, 專題說明, 狀態, 教授編號) VALUES ('$year','$name','$number', '$ability', '$additional', '$state', '$pid')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "專題新增成功!";
        header("Location: ../../quota.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $year = $_POST["year"];
    $name = $_POST["name"];
    $number = $_POST["number"];
    $ability = $_POST["ability"];
    $additional = $_POST["additional"];
    $state = $_POST["state"];
    $pid = "T113001";
    $id = $_POST["id"];
    $sqlUpdate = "UPDATE seniorproject SET 年度='$year', 專題題目='$name', 需求人數='$number', 具備能力='$ability', 專題說明='$additional', 狀態='$state',教授編號='$pid' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "專題更新成功!";
        header("Location: ../../quota.php");
    }else{
        die("Something went wrong");
    }
}
?>

?>