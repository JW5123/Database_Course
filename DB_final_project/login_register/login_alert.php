<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: ../admin/personal.php");
}
?>
<?php
if (isset($_POST["login"])) {
    $serialNumber = $_POST["serial_number"];
    $password = $_POST["password"];
    require_once "../Database/connDB.php";
    $sql = "SELECT * FROM users WHERE id = '$serialNumber'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $rowCount = mysqli_num_rows($result);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = "yes";
            header("refresh:1.2;url=../admin/personal.php");
            echo "<div id='alertmsg' class='alert alert-success'>您已成功登入</div>";
            exit();
        }else{
            echo "<div id='alertmsg' class='alert alert-danger'>密碼錯誤</div>";
        }
    }else{
        if(empty($serialNumber) and empty($password)){
            echo "<div id='alertmsg' class='alert alert-danger'>請輸入編號和密碼</div>";
        }
        else if(empty($serialNumber)){
            echo "<div id='alertmsg' class='alert alert-danger'>編號錯誤</div>";
        } else {
            echo "<div id='alertmsg' class='alert alert-danger'>尚未註冊</div>";
        }
    }
}
?>