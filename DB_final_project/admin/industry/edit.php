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
    <title>編輯產學計畫</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-center my-4">
            <h1>編輯產學計畫</h1>
        </header>

        
        <form action="process.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                require_once("../../Database/connDB.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM industry WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
            ?>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="industry_name" placeholder="產學名稱:" value="<?php echo $row["產學名稱"]; ?>">
                </div>
                <div class="row">
                    <div class="form-element col-md-6 d-grid">
                        <input type="text" class="form-control" id="datepicker1" name="fromdate" placeholder="開始日期:" value="<?php echo $row["開始日期"]; ?>">
                    </div>
                    <div class="form-element col-md-6 d-grid">
                        <input type="text" class="form-control" id="datepicker2" name="todate" placeholder="結束日期:" value="<?php echo $row["結束日期"]; ?>">
                    </div>
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="author" placeholder="身分別:" value="<?php echo $row["身分類別"]; ?>">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="industry_id" placeholder="計畫代號:" value="<?php echo $row["計畫代號"]; ?>">
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="row justify-content-center">
                    <div class="form-element col-md-2 d-grid">
                        <input type="submit" name="update" value="更新" class="btn btn-primary">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <a href="../industry.php" class="btn btn-secondary">取消</a>
                    </div>
                </div>
            <?php
            } else {
                echo "<h3>產學計畫不存在</h3>";
            }
            ?>
        </form>
    </div>
    <script>
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm'
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm'
        });
    </script>
</body>
</html>