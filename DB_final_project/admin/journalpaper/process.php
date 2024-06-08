<?php
require_once("../../Database/connDB.php");
if (isset($_POST["create"])) {
    $author = $_POST["author"];
    $jour_name = $_POST["jour_name"];
    $jour_catego = $_POST["jour_catego"];
    $page = $_POST["page"];
    $date = $_POST["date"];
    $domain = $_POST["domain"];
    $pid = "T113001";
    $sqlInsert = "INSERT INTO journal(作者, 期刊名稱, 刊別, 刊期及頁數, 日期, 領域, 教授編號) VALUES ('$author','$jour_name','$jour_catego', '$page', '$date', '$domain', '$pid')";
    if(mysqli_query($conn, $sqlInsert)){
        session_start();
        $_SESSION["create"] = "期刊論文新增成功!";
        header("Location: ../journal.php");
    }else{
        die("Something went wrong");
    }
}

if (isset($_POST["update"])) {
    $author = $_POST["author"];
    $jour_name = $_POST["jour_name"];
    $jour_catego = $_POST["jour_catego"];
    $page = $_POST["page"];
    $date = $_POST["date"];
    $domain = $_POST["domain"];
    $pid = "T113001";
    $id = $_POST["id"];
    $sqlUpdate = "UPDATE journal SET 作者='$author', 期刊名稱='$jour_name', 刊別='$jour_catego', 刊期及頁數='$page', 日期='$date', 領域='$domain', 教授編號='$pid' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "期刊論文更新成功!";
        header("Location: ../journal.php");
    }else{
        die("Something went wrong");
    }
}
?>

?>