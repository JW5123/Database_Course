<?php
session_start();
require_once("../../Database/connDB.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET["id"])) {
    $id = $_GET['id'];

    $sqlSelect = "SELECT 信箱 FROM appointment WHERE id='$id'";
    $result = mysqli_query($conn, $sqlSelect);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentMail = $row['信箱'];

        $sqlInsert = "UPDATE appointment SET 狀態='未通過' WHERE id='$id'";

        $mail = new PHPMailer(true);
        try {
            if (mysqli_query($conn, $sqlInsert)) {

                $mail->isSMTP();                                         
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;  
                $mail->Username   = '';
                $mail->Password   = '';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;      
                $mail->CharSet = "utf8";

                $mail->setFrom("", "葉春秀 教授");
                $mail->isHTML(true);         
                $mail->Subject = "預約申請未通過通知信";
                $mail->Body = "<h3>您的預約申請審核未通過</h3>";

                $mail->addAddress($studentMail);

                $mail->send();

                header("Location: ../courseData.php");
                exit();
            } else {
                die("Something went wrong with the database update");
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No record found with id $id";
    }
} else {
    echo "Invalid request";
}
?>
