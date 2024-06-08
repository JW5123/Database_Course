<?php
if (isset($_GET['id'])) {
    require_once("../../Database/connDB.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM industry WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        
        mysqli_query($conn, "SET @count = 0");
        mysqli_query($conn, "UPDATE industry SET id = @count:= @count + 1");
        mysqli_query($conn, "ALTER TABLE industry AUTO_INCREMENT = 1");
        session_start();
        $_SESSION["delete"] = "產學計畫刪除成功!";
        header("Location: ../industry.php");
    }else{
        die("Something went wrong");
    }
} else{
    echo "產學計畫不存在";
}
?>