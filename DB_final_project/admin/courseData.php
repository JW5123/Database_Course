<?php require_once("includes/header.php"); ?>
<?php require_once("includes/sidebar.php"); ?>

<main class="content">
    <div class="container" style="padding: 50px 80px;">
        <div class="" style="height: auto;">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button style="font-size: medium;" class="nav-link" id="nav-home-1" data-bs-toggle="tab" data-bs-target="#nav-1" role="tab" aria-controls="nav-1" aria-selected="false">預約名單</button>
                    <button style="font-size: medium;" class="nav-link" id="nav-profile-2" data-bs-toggle="tab" data-bs-target="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">課程資料</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-1" role="tabpanel" aria-labelledby="nav-home-1">
                    <div class="mt-5">
                        <h3 class="mb-3">預約申請名單</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <th width="5%">序號</th>
                                <th width="100px">姓名</th>
                                <th width="100px">班級</th>
                                <th width="100px">學號</th>
                                <th width="20%">信箱</th>
                                <th>描述</th>
                                <th width="180px">預約時間</th>
                                <th width="150px">狀態</th>
                            </thead>
                            <tbody>
                                <?php
                                $sqlSelect = mysqli_query($conn, "SELECT * FROM appointment WHERE 狀態='待審核'");
                                $numrow = mysqli_num_rows($sqlSelect);
                                if($numrow != 0){
                                    $serial = 1;
                                    while($res = mysqli_fetch_array($sqlSelect)){
                                        ?>
                                        <tr>
                                            <td><?php echo $serial; ?></td>
                                            <td><?php echo $res['姓名']; ?></td>
                                            <td><?php echo $res['班級']; ?></td>
                                            <td><?php echo $res['學號']; ?></td>
                                            <td><?php echo $res['信箱']; ?></td>
                                            <td><?php echo $res['問題描述']; ?></td>
                                            <td><?php echo $res['日期']; ?><br><?php echo $res['節數']; ?></td>
                                            <td class="justify-content-center">
                                                <a class="btn btn-warning btn-sm m-1" href="updateStatus/accept.php?id=<?php echo $res['id']; ?>">同意</a>
                                                <a class="btn btn-danger btn-sm m-1" href="updateStatus/reject.php?id=<?php echo $res['id']; ?>">拒絕</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $serial++;
                                    }
                                } else {
                                    echo "<tr class='text-center'><td colspan='12'>目前無任何預約申請</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
        
                    <div class="mt-5">
                        <h3 class="mb-3">預約申請紀錄</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <th width="5%">序號</th>
                                <th width="100px">姓名</th>
                                <th width="100px">班級</th>
                                <th width="100px">學號</th>
                                <th width="20%">信箱</th>
                                <th>描述</th>
                                <th width="180px">預約時間</th>
                                <th width="100px">狀態</th>
                            </thead>
                            <tbody>
                                <?php
                                $sqlSelect = mysqli_query($conn, "SELECT * FROM appointment WHERE 狀態='已通過' OR 狀態='未通過'");
                                $numrow = mysqli_num_rows($sqlSelect);
                                if($numrow != 0){
                                    $serial = 1;
                                    while($res = mysqli_fetch_array($sqlSelect)){
                                        ?>
                                        <tr>
                                            <td><?php echo $serial; ?></td>
                                            <td><?php echo $res['姓名']; ?></td>
                                            <td><?php echo $res['班級']; ?></td>
                                            <td><?php echo $res['學號']; ?></td>
                                            <td><?php echo $res['信箱']; ?></td>
                                            <td><?php echo $res['問題描述']; ?></td>
                                            <td><?php echo $res['日期']; ?><br><?php echo $res['節數']; ?></td>
                                            <td><?php echo $res['狀態']; ?></td>
                                        </tr>
                                        <?php
                                        $serial++;
                                    }
                                } else {
                                    echo "<tr class='text-center'><td colspan='12'>目前無任何預約紀錄</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-2">

                    <div class="d-flex justify-content-between my-4 mt-5">
                        <!-- <h3>課程資料</h3> -->
                        <p></p>
                        <button type="submit" name="create" class="btn btn-primary" onclick="window.location.href='?form=course'">新增</button>
                    </div>
                    
                    <?php require_once("course/create.php"); ?>
                    <?php require_once("course/edit.php"); ?>

                    <div class="mt-5">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <th width="5%">序號</th>
                                <th width="100px">課程名稱</th>
                                <th width="100px">教室地點</th>
                                <th width="100px">星期</th>
                                <th width="100px">時段</th>
                                <th width="13%">-</th>
                            </thead>
                            <tbody>
                                <?php
                                $sqlSelect = mysqli_query($conn, "SELECT * FROM course");
                                $numrow = mysqli_num_rows($sqlSelect);
                                if($numrow != 0){
                                    $serial = 1;
                                    while($res = mysqli_fetch_array($sqlSelect)){
                                        ?>
                                        <tr>
                                            <td><?php echo $serial; ?></td>
                                            <td><?php echo $res['課程名稱']; ?></td>
                                            <td><?php echo $res['教室地點']; ?></td>
                                            <td><?php echo $res['星期']; ?></td>
                                            <td>
                                            <?php 
                                            if ($res['開始節數'] == $res['結束節數']) {
                                                echo $res['開始節數'];
                                            } else {
                                                echo $res['開始節數'] . ' ~ ' . $res['結束節數'];
                                            }
                                            ?>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a class="btn btn-warning btn-sm m-1" href="courseData.php?id=<?php echo $res['id']; ?>">編輯</a>
                                                <a class="btn btn-danger btn-sm m-1" href="course/delete.php?id=<?php echo $res['id']; ?>">刪除</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $serial++;
                                    }
                                } else {
                                    echo "<tr class='text-center'><td colspan='12'>目前無任何課程</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../javascript/navbartab.js"></script>
<?php require_once "includes/jslink.php" ?>
