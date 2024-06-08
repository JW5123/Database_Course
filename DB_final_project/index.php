<?php include 'includes/header.php';?>
<?php include 'includes/navbar.php';?>
<?php require_once("Database/connDB.php"); ?>
<div class="root">
    <header class="bg-image e-master pt-5 pb-4">
        <?php 
        $sqlSelect = mysqli_query($conn, "SELECT * FROM introduction");
        while($data = mysqli_fetch_array($sqlSelect)){
            ?>
            <div class="text-uppercase e-title"><?php echo $data['英文姓名']; ?>&nbsp&nbspE-PORTFOLIO</div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xl-4 mx-auto mt-5 text-center">
                        <img src="image/<?php echo $data['照片']; ?>" class="e-teacherImg" alt="逢甲大學 葉春秀">
                    </div>

                    <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mt-5">
                            <div class="e-teacher-intro">
                                <h1><?php echo $data['姓名']; ?>&nbsp&nbsp<?php echo $data['職稱']; ?></h1>
                            </div>

                            <div class="intro-cont mt-4">
                                <p><?php echo $data['簡介']; ?></p>
                            </div>

                            <div class="">
                                <a role="button" class="btn btn-outline-light me-2" href="#expertise"><strong>專長</strong></a>
                                <a role="button" class="btn btn-outline-light me-2" href="#experience"><strong>經歷</strong></a>
                                <a role="button" class="btn btn-outline-light me-2" href="#conference"><strong>論文</strong></a>
                            </div>
                            <div class="e-mesage pt-3">
                                <p class="text-muted">
                                    <h6><i class="fa-solid fa-phone fa-custom-width mr-2"></i>分機&nbsp&nbsp#<?php echo $data['分機']; ?></h6>
                                    <h6><i class="fa-solid fa-envelope fa-custom-width mr-2"></i>信箱&nbsp&nbsp<?php echo $data['信箱']; ?></h6>
                                    <h6><i class="fa-solid fa-building fa-custom-width mr-2"></i>辦公室&nbsp&nbsp<?php echo $data['辦公室']; ?></h6>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
            <?php 
        } 
        ?>
    </header>

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center">
                    <h2 class="mb-5">學歷</h2>
                    <?php
                    $sqlSelect = mysqli_query($conn, "SELECT * FROM educations WHERE 分類='學歷'");
                    $numrow = mysqli_num_rows($sqlSelect);
                    if($numrow != 0){
                        while($data = mysqli_fetch_array($sqlSelect)){
                            ?>
                            <p><?php echo $data['學校']; ?>&nbsp&nbsp<?php echo $data['系所']; ?>&nbsp&nbsp<?php echo $data['學位']; ?></p>
                            <?php
                        }
                    } else {
                        echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                    }
                    ?>
                </div>

                <div class="col-lg-6 text-center">
                    <h2 class="mb-5" id="expertise">專長</h2>
                    <?php
                    $sqlSelect = mysqli_query($conn, "SELECT * FROM educations WHERE 分類='專長'");
                    $numrow = mysqli_num_rows($sqlSelect);
                    if($numrow != 0){
                        while($data = mysqli_fetch_array($sqlSelect)){
                            ?>
                            <p><?php echo $data['專長']; ?></p>
                            <p><?php echo $data['專長英文']; ?></p>
                            <?php
                        }
                    } else {
                        echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section" style="background-color: #f0f0f0;">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-5" id="experience">本校經歷</h2>
                <?php
                $sqlSelect = mysqli_query($conn, "SELECT * FROM experience WHERE 區域='校內'");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <p><?php echo $data['單位名稱']; ?>&nbsp&nbsp<?php echo $data['職位']; ?></p>
                        <?php
                    }
                } else {
                    echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                }
                ?>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-5">外校經歷</h2>
                <?php
                $sqlSelect = mysqli_query($conn, "SELECT * FROM experience WHERE 區域='校外'");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <p><?php echo $data['單位名稱']; ?>&nbsp&nbsp<?php echo $data['科系名稱']; ?>&nbsp&nbsp<?php echo $data['職位']; ?></p>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                }
                ?>
            </div>
        </div>
    </section>

    <section class="page-section" style="background-color: #f0f0f0;">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-5" id="conference">期刊論文</h2>
                <?php
                $sqlSelect = mysqli_query($conn, "SELECT * FROM journal order by 日期 desc");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    $serial = 1;
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <div class="list">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list">
                                <?php echo $data["作者"]?>, <span class="text-primary">"<?php echo $data["期刊名稱"]?>"</span><i>, <?php echo $data["刊別"]?></i><span>, <?php echo $data["刊期及頁數"]?>, </span><span><?php echo $data["日期"]?>.</span><span><?php echo $data["領域"]?></span></li>
                                <style>
                                    .list-group-item.list.with-border {
                                        border-bottom: 1px solid #dee2e6;
                                    }
                                </style>
                            </ul>
                        </div>
                        <?php
                        $serial++;
                    }
                } else {
                    echo "<div class='text-center'>目前無任何紀錄</div>";
                }
                ?>  
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-5">會議論文</h2>
                <?php
                $sqlSelect = mysqli_query($conn, "SELECT * FROM conference order by 日期 desc");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    $serial = 1;
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <div class="list">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list">
                                <?php echo $data["作者"]?>, <span class="text-primary">"<?php echo $data["論文名稱"]?>"</span><span>, <?php echo $data["會議名稱"]?></span><span>, <?php echo $data["會期及頁數"]?>, </span><span><?php echo $data["日期"]?>.</span><span><?php echo $data["地點"]?>.</span>
                                </li>
                                <style>
                                    .list-group-item.list.with-border {
                                        border-bottom: 1px solid #dee2e6;
                                    }
                                </style>
                            </ul>
                        </div>
                        <?php
                        $serial++;
                    }
                } else {
                    echo "<div class='text-center'>目前無任何紀錄</div>";
                }
                ?>  
            </div>
        </div>
    </section>

    <section class="page-section" style="background-color: #f0f0f0;">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-5">產學合作計畫</h2>
                <?php
                $sqlSelect = mysqli_query($conn, "SELECT * FROM industry order by 開始日期 desc");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    $serial = 1;
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <div class="list">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list">
                                <?php echo $data["產學名稱"]?> /<span><?php echo $data["開始日期"]?>~<?php echo $data["結束日期"]?></span> /<span><?php echo $data["身分類別"]?></span></li>
                                <style>
                                    .list-group-item.list.with-border {
                                        border-bottom: 1px solid #dee2e6;
                                    }
                                </style>
                            </ul>
                        </div>
                        <?php
                        $serial++;
                    }
                } else {
                    echo "<div class='text-center'>目前無任何紀錄</div>";
                }
                ?> 
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-5">校外獎勵及指導學生獲獎</h2>
                <?php
                $sqlSelect = mysqli_query($conn, "SELECT * FROM outaward order by 日期 desc");
                $numrow = mysqli_num_rows($sqlSelect);
                if($numrow != 0){
                    $serial = 1;
                    while($data = mysqli_fetch_array($sqlSelect)){
                        ?>
                        <div class="list">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list">
                                <?php echo $data["年度"]?>/ <span><?php echo $data["獎項名稱"]?></span>/ <span><?php echo $data["承辦組織"]?></span>/ <span><?php echo $data["日期"]?></span>/ <span><?php echo $data["補充說明"]?></span></li>
                                <style>
                                    .list-group-item.list.with-border {
                                        border-bottom: 1px solid #dee2e6;
                                    }
                                </style>
                            </ul>
                        </div>
                        <?php
                        $serial++;
                    }
                } else {
                    echo "<div class='text-center'>目前無任何紀錄</div>";
                }
                ?> 
            </div>
        </div>
    </section>
</div>
    
<?php include 'includes/footer.php';?>