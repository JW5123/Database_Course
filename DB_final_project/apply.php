<?php
require_once("Database/connDB.php");

if (isset($_POST['create'])) {
    
    $studentID = $_POST["studentID"];
    $class = $_POST["class"];
    $name = $_POST["name"];
    $content = $_POST["descr"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $node = $_POST["node"];

    $status = "待審核";

    $check_query = "SELECT * FROM appointment WHERE 學號='$studentID'";
    $check_result = mysqli_query($conn, $check_query);
    $check_rowCount = mysqli_num_rows($check_result);

    if($check_rowCount > 0) {
        $alertmsg = "<div id='alertmsg' class='alert alert-danger text-center'>重複提交</div>";
    } else {
        $sql = "SELECT * FROM appointment WHERE 日期='$date' AND 節數='$node'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
    
        if ($rowCount > 0) {
            $alertmsg = "<div id='alertmsg' class='alert alert-danger text-center'>該時段已有預約</div>";
        } else {
            $query = "INSERT INTO appointment(學號, 班級, 姓名, 問題描述, 日期, 節數, 狀態) VALUES('$studentID','$class','$name', '$content','$date', '$node', '$status')";
            $execute = mysqli_query($conn, $query);
            if ($execute) {
                $alertmsg = "<div id='alertmsg' class='alert alert-success text-center'>預約成功，等待教授審核</div>";
                session_start();
                $_SESSION["create"] = "提交成功!";
                header("Location: appointment.php");
            } else {
                echo "Query Error : " . $query . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>
