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
    <title>畢業專題題目</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-center my-4">
            <h1>新增專題題目</h1>
        </header>
        
        <form action="process.php" method="post">
            <div class="row">
                <div class="form-elemnt col-md-2">
                    <input type="text" class="form-control" name="year" placeholder="年度:">
                </div>
                <div class="form-elemnt col-md-10">
                    <input type="text" class="form-control" name="name" placeholder="專題題目:">
                </div>
            </div>
            <div class="row my-4">
                <div class="form-element col-md-2 d-grid">
                    <select class="form-select" aria-label="Default select example" name="state">
                        <option selected disabled>目前狀態</option>
                        <option value="未分配">未分配</option>
                        <option value="已分配">已分配</option>
                    </select>
                </div>
                <div class="form-elemnt col-md-2 d-grid">
                    <select class="form-select" aria-label="Default select example" name="number">
                        <option selected disabled>需求人數</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-elemnt col-md-8 d-grid">
                    <input type="text" class="form-control" name="ability" placeholder="須具備能力:">
                </div>
            </div>
            <div class="form-element my-4">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="專題說明" name="additional"></textarea>
            </div>
            <div class="row justify-content-center">
                <div class="form-element col-md-2 d-grid">
                    <input type="submit" name="create" value="新增" class="btn btn-primary">
                </div>
                <div class="form-element col-md-2 d-grid">
                    <a href="../../quota.php" class="btn btn-secondary">取消</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>