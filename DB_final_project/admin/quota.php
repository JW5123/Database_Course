<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<main class="content">
    <div class="container" style="padding: 50px 80px;">
        <div class="" style="height: auto;">
            <header class="d-flex justify-content-between my-4">
                <h2>畢業專題題目</h2>
                <div>
                    <a href="./project/seniorproject/create.php" class="btn btn-primary">新增題目</a>
                </div>
            </header>

            <table class="table table-bordered table-hover table-striped" style="margin-bottom: 50px;">
                <thead>
                    <tr>
                        <th width="5%">序號</th>
                        <th>專題題目</th>
                        <th>專題說明</th>
                        <th width="10%">狀態</th>
                        <th width="12%">-</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // require_once("../Database/connDB.php");
                    $sqlSelect = mysqli_query($conn, "SELECT * FROM seniorproject order by 年度 desc");
                    $numrow = mysqli_num_rows($sqlSelect);
                    if ($numrow != 0) {
                        $serial = 1;
                        while ($data = mysqli_fetch_array($sqlSelect)) {
                    ?>
                            <tr>
                                <td><?php echo $serial; ?></td>
                                <td><?php echo $data['專題題目']; ?></td>
                                <td><?php echo $data['專題說明']; ?></td>
                                <td><?php echo $data['狀態']; ?></td>
                                <td class="justify-content-center">
                                    <a class="btn btn-warning btn-sm m-1" href="./project/seniorproject/edit.php?id=<?php echo $data['id']; ?>">編輯</a>
                                    <a class="btn btn-danger btn-sm m-1" href="./project/seniorproject/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
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

            <form id="data-form2" action="quota/process.php" method="post" enctype="multipart/form-data">
                <div class="d-flex justify-content-between my-4">
                    <h2>專題名額</h2>
                    <div>
                        <button type="submit" name="create" id="save-button" class="btn btn-primary">儲存</button>
                    </div>
                </div>
                <?php require_once("quota/create.php"); ?>
            </form>
        </div>
    </div>
</main>

<script src="../javascript/quota_form_save.js"></script>
<?php require_once "includes/jslink.php" ?>