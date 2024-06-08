<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<main class="content">
    <div class="container-fluid">
        <div class="mycontainer">
            <header class="d-flex justify-content-between mt-5">
                <h2>校外獎勵及指導學生獲獎</h2>
                <div>
                    <a href="./outaward/create.php" class="btn btn-primary">新增資料</a>
                </div>
            </header>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="5%">序號</th>
                        <th width="5%">年度</th>
                        <th>獎項名稱</th>
                        <th width="20%">承辦組織</th>
                        <th width="15%">日期</th>
                        <th width="10%">-</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // require_once("../Database/connDB.php");
                $sqlSelect = mysqli_query($conn, "SELECT * FROM outaward order by 日期 desc");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    $serial = 1;
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <tr>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo $data['年度']; ?></td>
                            <td><?php echo $data['獎項名稱']; ?></td>
                            <td><?php echo $data['承辦組織']; ?></td>
                            <td><?php echo $data['日期']; ?></td>
                            <td class="justify-content-center">
                                <a class="btn btn-warning btn-sm m-1" href="outaward/edit.php?id=<?php echo $data['id']; ?>">編輯</a>
                                <a class="btn btn-danger btn-sm m-1" href="outaward/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
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