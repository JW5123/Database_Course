<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<main class="content">
    <div class="container-fluid">
        <div class="mycontainer">
            <header class="d-flex justify-content-between mt-5">
                <h2>產學合作計畫</h2>
                <div>
                    <a href="./industry/create.php" class="btn btn-primary">新增計畫</a>
                </div>
            </header>

            <table class="table table-bordered table-hover table-striped"">
                <thead>
                    <tr>
                        <th width="5%">序號</th>
                        <th>產學名稱</th>
                        <th width="15%">日期</th>
                        <th width="10%">身分別</th>
                        <th width="10%">-</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // require_once("../Database/connDB.php");
                $sqlSelect = mysqli_query($conn, "SELECT * FROM industry order by 開始日期 desc");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    $serial = 1;
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <tr>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo $data['產學名稱']; ?></td>
                            <td><?php echo $data['開始日期']; ?> ~ <?php echo $data['結束日期']; ?></td>
                            <td><?php echo $data['身分類別']; ?></td>
                            <td class="justify-content-center">
                                <a class="btn btn-warning btn-sm m-1" href="industry/edit.php?id=<?php echo $data['id']; ?>">編輯</a>
                                <a class="btn btn-danger btn-sm m-1" href="industry/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
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