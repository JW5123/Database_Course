<?php
if (isset($_GET['id'])) {
    require_once("../../Database/connDB.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM experience WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        
        mysqli_query($conn, "SET @count = 0");
        mysqli_query($conn, "UPDATE experience SET id = @count:= @count + 1");
        mysqli_query($conn, "ALTER TABLE experience AUTO_INCREMENT = 1");
        session_start();
        $_SESSION["delete"] = "經歷刪除成功!";
        header("Location: ../personal.php");
    }else{
        die("Something went wrong");
    }
} else{
    echo "經歷不存在";
}
?>