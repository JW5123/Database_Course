<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>編輯會議論文</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-center my-4">
            <h1>編輯會議論文</h1>
        </header>

        
        <form action="process.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                require_once("../../Database/connDB.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM conference WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
            ?>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="author" placeholder="作者:" value="<?php echo $row["作者"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="paper_name" placeholder="論文名稱:" value="<?php echo $row["論文名稱"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="conf_name" placeholder="會議名稱:" value="<?php echo $row["會議名稱"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="page" placeholder="會期及頁數:" value="<?php echo $row["會期及頁數"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" id="datepicker" name="date" placeholder="日期:" value="<?php echo $row["日期"]; ?>">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="local" placeholder="地點:" value="<?php echo $row["地點"]; ?>">
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="row justify-content-center">
                    <div class="form-element col-md-2 d-grid">
                        <input type="submit" name="update" value="更新" class="btn btn-primary">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <a href="../conference.php" class="btn btn-secondary">取消</a>
                    </div>
                </div>
            <?php
            } else {
                echo "<h3>會議論文不存在</h3>";
            }
            ?>
        </form>
    </div>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm'
        });
    </script>
</body>
</html>