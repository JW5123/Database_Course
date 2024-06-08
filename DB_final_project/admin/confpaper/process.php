<?php
require_once("../../Database/connDB.php");
if (isset($_POST["create"])) {
    $author = $_POST["author"];
    $paper_name = $_POST["paper_name"];
    $conf_name = $_POST["conf_name"];
    $page = $_POST["page"];
    $date = $_POST["date"];
    $local = $_POST["local"];
    $pid = "T113001";
    $sqlInsert = "INSERT INTO conference(作者, 論文名稱, 會議名稱, 會期及頁數, 日期, 地點, 教授編號) VALUES ('$author','$paper_name','$conf_name', '$page', '$date', '$local', '$pid')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "會議論文新增成功!";
        header("Location: ../conference.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $author = $_POST["author"];
    $paper_name = $_POST["paper_name"];
    $conf_name = $_POST["conf_name"];
    $page = $_POST["page"];
    $date = $_POST["date"];
    $local = $_POST["local"];
    $pid = "T113001";
    $sqlUpdate = "UPDATE conference SET 作者='$author', 論文名稱='$paper_name', 會議名稱='$conf_name', 會期及頁數='$page', 日期='$date', 地點='$local', 教授編號='$pid' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "期刊論文更新成功!";
        header("Location: ../conference.php");
    }else{
        die("Something went wrong");
    }
}
?>

?>