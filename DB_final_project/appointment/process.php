<?php
require_once("../Database/connDB.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

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

    $sql = "SELECT * FROM appointment WHERE 日期='$date' AND 節數='$node'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        $alertmsg = "<div id='alertmsg' class='alert alert-danger text-center'>該時段已有預約</div>";
    } else {
        $query = "INSERT INTO appointment(學號, 班級, 姓名, 信箱, 問題描述, 日期, 節數, 狀態) VALUES('$studentID','$class','$name', '$email','$content','$date', '$node', '$status')";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = '';
                $mail->Password   = '';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                $mail->CharSet    = "utf8";                              

                $mail->setFrom($email, $name);
                $mail->addAddress("");
                
                $mail->isHTML(true);                                  
                $mail->Subject = '預約申請通知信';
                $mail->Body    = '<h3>您有新的預約申請</h3><br>'.
                                '申請人 : ' . $name . '<br>'.
                                '班級 : ' . $class . '<br>'. 
                                '學號 : ' . $studentID . '<br>'.
                                '問題描述 : ' . $content;

                $mail->send();
                $alertmsg = "<div id='alertmsg' class='alert alert-success text-center'>預約成功，等待教授審核</div>";
            } catch (Exception $e) {
                $alertmsg = "<div id='alertmsg' class='alert alert-warning text-center'>預約成功，但郵件發送失敗: {$mail->ErrorInfo}</div>";
            }
        } else {
            die("Something went wrong");
        }
    }
    header("Location: ../course.php?alertmsg=$alertmsg#appointment");
    exit();
}
?>
