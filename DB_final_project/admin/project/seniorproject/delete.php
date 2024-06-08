<?php
if (isset($_GET['id'])) {
    require_once("../../../Database/connDB.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM seniorproject WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        
        mysqli_query($conn, "SET @count = 0");
        mysqli_query($conn, "UPDATE seniorproject SET id = @count:= @count + 1");
        mysqli_query($conn, "ALTER TABLE seniorproject AUTO_INCREMENT = 1");
        session_start();
        $_SESSION["delete"] = "專題刪除成功!";
        header("Location: ../../quota.php");
    }else{
        die("Something went wrong");
    }
} else{
    echo "諸田不存在";
}
?>