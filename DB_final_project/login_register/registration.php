<!-- register_alert.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login_registration.css">
    <title>教職員註冊</title>
</head>
<body>
    <div class="bg-image main">
        <div class="container">
            <h1>教職員註冊</h1>
            <?php include_once "./register_alert.php" ?>
            <form action="../login_register/registration.php" method="post">
                <div class="col-12 my-4">
                    <?php
                    if (isset($_GET['alertmsg'])) {
                        echo urldecode($_GET['alertmsg']);
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="serial_number" placeholder="編號:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="full_name" placeholder="姓名:">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="department" placeholder="系所:">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="信箱:">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="密碼:">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="repeat_password" placeholder="確認密碼:">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="註冊">
                </div>
                <div class="login-text">
                    <p class="text-dark">已註冊? <a href="login.php">返回登入</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="../javascript/alertDisappear.js"></script>
</body>
</html>