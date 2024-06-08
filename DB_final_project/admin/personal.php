<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<main class="content">
    <div class="container" style="padding: 50px 80px;">
        <div class="" style="height: auto;">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button style="font-size: medium;" class="nav-link" id="nav-home-1" data-bs-toggle="tab" data-bs-target="#nav-1" role="tab" aria-controls="nav-1" aria-selected="false">基本資料</button>
                    <button style="font-size: medium;" class="nav-link" id="nav-profile-2" data-bs-toggle="tab" data-bs-target="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">基本資料更新</button>
                    <button style="font-size: medium;" class="nav-link" id="nav-contact-3" data-bs-toggle="tab" data-bs-target="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">學歷專長</button>
                    <button style="font-size: medium;" class="nav-link" id="nav-contact-4" data-bs-toggle="tab" data-bs-target="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">校內外經歷</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-1" role="tabpanel" aria-labelledby="nav-home-1">
                    
                    <!-- <h1 class="text-center fw-bold mt-5">個人基本資料</h1> -->
                    <div class="row mt-5 justify-content-center">
                        <?php 
                        $sqlSelect = mysqli_query($conn, "SELECT * FROM introduction");
                        while($data = mysqli_fetch_array($sqlSelect)){
                            ?>
                            <div class="col-md-auto align-items-center" style="margin-right: 50px;">
                                <img src="../image/<?php echo $data['照片']; ?>" class="e-teacherImg img-fluid" alt="逢甲大學 葉春秀" style="width: 200px; height: 200px;">
                            </div>
                            <div class="col-md-auto align-items-center">
                                <div>
                                    <h2 class="mb-5"><?php echo $data['姓名']; ?></h2>
                                    <h4 class="my-3">分機 : <?php echo $data['分機']; ?></h4>
                                    <h4 class="my-3">信箱 : <?php echo $data['信箱']; ?></h4>
                                    <h4 class="my-3">辦公室 : <?php echo $data['辦公室']; ?></h4>
                                </div>
                            </div>
                        <?php 
                        } 
                        ?>
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <table class="table table-bordered table-striped text-center" style="margin-bottom: 0; padding-bottom: 0;">
                                <tbody>
                                    <tr>
                                        <td rowspan="0" style="vertical-align: middle;" width="100px">
                                            <h4 class="text-center">學歷</h4>
                                        </td>
                                    </tr>
                                    <?php
                                    $sqlSelect = mysqli_query($conn, "SELECT * FROM educations WHERE 分類='學歷'");
                                    $numrow = mysqli_num_rows($sqlSelect);
                                    if($numrow != 0){
                                        while($data = mysqli_fetch_array($sqlSelect)){
                                            ?>
                                            <tr>
                                                <td><?php echo $data['學校']; ?>&nbsp&nbsp<?php echo $data['系所']; ?>&nbsp&nbsp<?php echo $data['學位']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-bordered table-striped text-center" style="margin-bottom: 0; padding-bottom: 0;">
                                <tbody>
                                    <tr>
                                        <td rowspan="0" style="vertical-align: middle;" width="100px">
                                            <h4 class="text-center">專長</h4>
                                        </td>
                                    </tr>
                                    <?php
                                    $sqlSelect = mysqli_query($conn, "SELECT * FROM educations WHERE 分類='專長'");
                                    $numrow = mysqli_num_rows($sqlSelect);
                                    if($numrow != 0){
                                        while($data = mysqli_fetch_array($sqlSelect)){
                                            ?>
                                            <tr>
                                                <td><?php echo $data['專長']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-bordered table-striped text-center" style="margin-bottom: 0; padding-bottom: 0;">
                                <tbody>
                                    <th colspan="3">校內經歷</th>
                                    <tr>
                                        <th>單位</th>
                                        <th>職位</th>
                                    </tr>
                                    <?php
                                    $sqlSelect = mysqli_query($conn, "SELECT * FROM experience WHERE 區域='校內'");
                                    $numrow = mysqli_num_rows($sqlSelect);
                                    if($numrow != 0){
                                        while($data = mysqli_fetch_array($sqlSelect)){
                                            ?>
                                            <tr>
                                                <td><?php echo $data['單位名稱']; ?></td>
                                                <td><?php echo $data['職位']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-bordered table-striped text-center" style="margin-bottom: 0; padding-bottom: 0;">
                                <tbody>
                                    <th colspan="4">校外經歷</th>
                                    <tr>
                                        <th>學校</th>
                                        <th>科系</th>
                                        <th>職位</th>
                                    </tr>
                                    <?php
                                    $sqlSelect = mysqli_query($conn, "SELECT * FROM experience WHERE 區域='校外'");
                                    $numrow = mysqli_num_rows($sqlSelect);
                                    if($numrow != 0){
                                        while($data = mysqli_fetch_array($sqlSelect)){
                                            ?>
                                            <tr>
                                                <td><?php echo $data['單位名稱']; ?></td>
                                                <td><?php echo $data['科系名稱']; ?></td>
                                                <td><?php echo $data['職位']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-2">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>個人資料</h4>
                        </div>
                        <div class="card-body">
                            <form id="data-form" action="introduce/process.php" method="post" enctype="multipart/form-data">
                                <div class="d-flex justify-content-end">
                                    <div>
                                        <button type="submit" name="create" id="save-button" class="btn btn-primary">儲存</button>
                                    </div>
                                </div>
                                <?php require_once("introduce/create.php"); ?>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-3">
                    <div class="d-flex justify-content-between my-4 mt-5">
                        <!-- <h2>學歷專長</h2> -->
                        <p></p>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                新增
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="?form=education">學歷</a></li>
                                <li><a class="dropdown-item" href="?form=specialty">專長</a></li>
                            </ul>
                        </div>
                    </div>

                    <?php require_once("education/create.php"); ?>
                    <?php require_once("education/edit.php"); ?>
                    
                    <div>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>學歷</th>
                                    <th width="13%">-</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sqlSelect = mysqli_query($conn, "SELECT * FROM educations WHERE 分類='學歷'");
                            $numrow = mysqli_num_rows($sqlSelect);
                            if($numrow != 0){
                                while($data = mysqli_fetch_array($sqlSelect)){
                                    ?>
                                    <tr>
                                        <td><?php echo $data['學校']; ?>&nbsp&nbsp<?php echo $data['系所']; ?>&nbsp&nbsp<?php echo $data['學位']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-warning btn-sm m-1" href="personal.php?id=<?php echo $data['id']; ?>">編輯</a>
                                            <a class="btn btn-danger btn-sm m-1" href="education/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
        
                        <table class="table table-bordered table-hover table-striped mt-5">
                            <thead>
                                <tr>
                                    <th>專長</th>
                                    <th width="13%">-</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sqlSelect = mysqli_query($conn, "SELECT * FROM educations WHERE 分類='專長'");
                            $numrow = mysqli_num_rows($sqlSelect);
                            if($numrow != 0){
                                while($data = mysqli_fetch_array($sqlSelect)){
                                    ?>
                                    <tr>
                                        <td><?php echo $data['專長']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-warning btn-sm m-1" href="personal.php?id=<?php echo $data['id']; ?>">編輯</a>
                                            <a class="btn btn-danger btn-sm m-1" href="education/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-contact-4">
                    <div class="d-flex justify-content-between my-4 mt-5">
                        <h2>校內外經歷</h2>
                        <div>
                            <a href="./experience/create.php" class="btn btn-primary">新增</a>
                        </div>
                    </div>
                    
                    <div>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th colspan="4">校內</th>
                                </tr>
                                <tr>
                                    <th width="5%">序號</th>
                                    <th>單位</th>
                                    <th width="20%">職位</th>
                                    <th width="13%">-</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sqlSelect = mysqli_query($conn, "SELECT * FROM experience WHERE 區域='校內'");
                            $numrow = mysqli_num_rows($sqlSelect);
                            if($numrow != 0){
                                $serial = 1;
                                while($data = mysqli_fetch_array($sqlSelect)){
                                    ?>
                                    <tr>
                                        <td><?php echo $serial; ?></td>
                                        <td><?php echo $data['單位名稱']; ?></td>
                                        <td><?php echo $data['職位']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-warning btn-sm m-1" href="experience/edit.php?id=<?php echo $data['id']; ?>">編輯</a>
                                            <a class="btn btn-danger btn-sm m-1" href="experience/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
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

                        <table class="table table-bordered table-hover table-striped mt-5">
                            <thead>
                                <tr>
                                    <th colspan="5">校外</th>
                                </tr>
                                <tr>
                                    <th width="5%">序號</th>
                                    <th>學校</th>
                                    <th>科系</th>
                                    <th width="20%">職位</th>
                                    <th width="13%">-</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sqlSelect = mysqli_query($conn, "SELECT * FROM experience WHERE 區域='校外'");
                            $numrow = mysqli_num_rows($sqlSelect);
                            if($numrow != 0){
                                $serial = 1;
                                while($data = mysqli_fetch_array($sqlSelect)){
                                    ?>
                                    <tr>
                                        <td><?php echo $serial; ?></td>
                                        <td><?php echo $data['單位名稱']; ?></td>
                                        <td><?php echo $data['科系名稱']; ?></td>
                                        <td><?php echo $data['職位']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-warning btn-sm m-1" href="experience/edit.php?id=<?php echo $data['id']; ?>">編輯</a>
                                            <a class="btn btn-danger btn-sm m-1" href="experience/delete.php?id=<?php echo $data['id']; ?>">刪除</a>
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
            </div>
        </div>
    </div>
</main>

<script src="../javascript/intro_form_save.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../javascript/navbartab.js"></script>
<?php require_once "includes/jslink.php" ?>