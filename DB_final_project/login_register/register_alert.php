<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: ../admin/personal.php");
}
?>
<?php

if (isset($_POST["submit"])) {
    $serialNumber = $_POST["serial_number"];
    $fullName = $_POST["full_name"];
    $department = $_POST["department"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    if (empty($serialNumber) and empty($fullName) and empty($department) and empty($email) and empty($password) and empty($passwordRepeat)) {
        array_push($errors,"需要填寫資料");
    } else {
        if(empty($fullName)){
            array_push($errors, "姓名未填寫");
        }
        if(empty($department)){
            array_push($errors, "系所未填寫");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "信箱格式錯誤");
        }
        if (strlen($password) < 8) {
            array_push($errors,"密碼需要大於8位數");
        }
        if ($password !== $passwordRepeat) {
            array_push($errors,"密碼沒有相符");
        }
    }
    require_once "../Database/connDB.php";

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        array_push($errors,"您已註冊請登入帳號");
    }

    if (count($errors) > 0) {
        foreach ($errors as  $error) {
            echo "<div id='alertmsg' class='alert alert-danger'>$error</div>";
        }
    }else{
        $sql = "INSERT INTO users (id, name, department, email, password) VALUES ( ?, ?, ?, ?, ? )";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sssss", $serialNumber, $fullName, $department, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div id='alertmsg' class='alert alert-success'>您已成功註冊</div>";
            header("refresh:1.5;url=login.php");
            exit();
        }else{
            die("Something went wrong");
        }
    }
}

?>