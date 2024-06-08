<?php
if (isset($_GET['id'])) {
    require_once("../../Database/connDB.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM outaward WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        
        mysqli_query($conn, "SET @count = 0");
        mysqli_query($conn, "UPDATE outaward SET id = @count:= @count + 1");
        mysqli_query($conn, "ALTER TABLE outaward AUTO_INCREMENT = 1");
        session_start();
        $_SESSION["delete"] = "獎項刪除成功!";
        header("Location: ../outaward.php");
    }else{
        die("Something went wrong");
    }
} else{
    echo "獎項不存在";
}
?>