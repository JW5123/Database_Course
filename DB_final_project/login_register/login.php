<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login_registration.css">
    <title>教職員登入</title>
</head>
<body>
    <div class="bg-image main">
        <div class="container">
            <h1>教職員登入</h1>
            <?php include_once "./login_alert.php" ?>
            <form action="../login_register/login.php" method="post">
                <div class="col-12 my-4">
                    <?php
                    if (isset($_GET['alertmsg'])) {
                        echo urldecode($_GET['alertmsg']);
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="serial_number" placeholder="輸入編號:">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="輸入密碼:">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="login" value="登入">
                </div>
                <div class="login-text">
                    <p class="text-dark">尚未註冊? <a href="registration.php">點擊前往註冊</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="../javascript/alertDisappear.js"></script>
</body>
</html>