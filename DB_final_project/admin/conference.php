<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<main class="content">
    <div class="container-fluid">
        <div class="mycontainer">
            <header class="d-flex justify-content-between mt-5">
                <h2>會議論文</h2>
                <div>
                    <a href="./confpaper/create.php" class="btn btn-primary">新增論文</a>
                </div>
            </header>

            <table class="table table-bordered table-hover table-striped"">
                <thead>
                    <tr>
                        <th width="5%">序號</th>
                        <th width="15%">作者</th>
                        <th>論文名稱</th>
                        <th width="20%">會議名稱</th>
                        <th width="10%">日期</th>
                        <th width="10%">-</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // require_once("../Database/connDB.php");
                $sqlSelect = mysqli_query($conn, "SELECT * FROM conference order by 日期 desc");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    $serial = 1;
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <tr>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo $data['作者']; ?></td>
                            <td><?php echo $data['論文名稱']; ?></td>
                            <td><?php echo $data['會議名稱']; ?></td>
                            <td><?php echo $data['日期']; ?></td>
                            <td class="justify-content-center">
                                <a class="btn btn-warning btn-sm m-1" href="confpaper/edit.php?id=<?php echo $data['id']; ?>">編輯</a>
                                <a class="btn btn-danger btn-sm m-1" href="confpaper/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
                            </td>
                        </tr>
                        <?php
                        $serial++;
                    }
                } else {
                    echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php require_once "includes/jslink.php" ?>