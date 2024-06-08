<?php
if (isset($_GET['id'])) {
    require_once("../../Database/connDB.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM conference WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        
        mysqli_query($conn, "SET @count = 0");
        mysqli_query($conn, "UPDATE conference SET id = @count:= @count + 1");
        mysqli_query($conn, "ALTER TABLE conference AUTO_INCREMENT = 1");
        session_start();
        $_SESSION["delete"] = "會議論文刪除成功!";
        header("Location: ../conference.php");
    }else{
        die("Something went wrong");
    }
} else{
    echo "會議論文不存在";
}
?>