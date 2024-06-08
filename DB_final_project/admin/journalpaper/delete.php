<?php
if (isset($_GET['id'])) {
    require_once("../../Database/connDB.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM journal WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        
        mysqli_query($conn, "SET @count = 0");
        mysqli_query($conn, "UPDATE journal SET id = @count:= @count + 1");
        mysqli_query($conn, "ALTER TABLE journal AUTO_INCREMENT = 1");
        session_start();
        $_SESSION["delete"] = "期刊論文刪除成功!";
        header("Location: ../journal.php");
    }else{
        die("Something went wrong");
    }
} else{
    echo "期刊論文不存在";
}
?>