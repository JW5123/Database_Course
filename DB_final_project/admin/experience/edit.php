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
    <title>編輯經歷</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-center my-4">
            <h1>編輯經歷</h1>
        </header>

        
        <form action="process.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                require_once("../../Database/connDB.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM experience WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
            ?>
                <div class="row">
                    <div class="form-elemnt col-md-6 d-grid">
                        <input type="text" class="form-control" name="unit" placeholder="單位:" value="<?php echo $row["單位名稱"]; ?>">
                    </div>
                    <div class="form-elemnt col-md-6 d-grid">
                        <input type="text" class="form-control" name="department" placeholder="科系:" value="<?php echo $row["科系名稱"]; ?>">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="form-elemnt col-md-2 d-grid">
                        <select class="form-select" aria-label="Default select example" name="local" id="localSelect">
                            <option selected disabled>區域</option>
                            <option value="校內">校內</option>
                            <option value="校外">校外</option>
                        </select>
                    </div>
                    <div class="form-elemnt col-md-10 d-grid">
                        <input type="text" class="form-control" name="position" placeholder="職位:" value="<?php echo $row["職位"]; ?>">
                    </div>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="row mt-5 justify-content-center">
                    <div class="form-element col-md-2 d-grid">
                        <input type="submit" name="update" value="更新" class="btn btn-primary">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <a href="../personal.php" class="btn btn-secondary">取消</a>
                    </div>
                </div>
            <?php
            } else {
                echo "<h3>經歷不存在</h3>";
            }
            ?>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var stateSelect = document.getElementById("localSelect");

            var savedState = "<?php echo $row["區域"]; ?>";

            for (var i = 0; i < stateSelect.options.length; i++) {
                if (stateSelect.options[i].value === savedState) {
                    stateSelect.selectedIndex = i;
                    break;
                }
            }
        });
    </script>
</body>
</html>