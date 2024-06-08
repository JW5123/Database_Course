<?php
require_once("../../Database/connDB.php");

if (isset($_POST["create"])) {
    $NSC = $_POST["NSC"];
    $NSC_Quota = $_POST["NSC_Quota"];
    $project = $_POST['project'];
    $project_quota = $_POST['project_quota'];
    $content = $_POST['content'];

    $sqlCheck = "SELECT * FROM quota";
    $result = mysqli_query($conn, $sqlCheck);
    $num_rows = mysqli_num_rows($result);

    $pid = "T113001";

    if ($num_rows == 0) {
        $sqlInsert = "INSERT INTO quota(大專生總名額, 目前大專生名額, 專題總名額, 目前專題名額, 補充說明, 教授編號) VALUES ('$NSC', '$NSC_Quota', '$project', '$project_quota', '$content', '$pid')";
        if (mysqli_query($conn, $sqlInsert)) {
            header("Location: ../quota.php");
        } else {
            die("Something went wrong");
        }
    } else {
        $sqlUpdate = "UPDATE quota SET 大專生總名額='$NSC', 目前大專生名額='$NSC_Quota', 專題總名額='$project', 目前專題名額='$project_quota', 補充說明='$content', 教授編號='$pid'";
        if (mysqli_query($conn, $sqlUpdate)) {
            header("Location: ../quota.php");
        } else {
            die("Something went wrong");
        }
    }
}
