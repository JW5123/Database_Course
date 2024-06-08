<?php include 'includes/header.php';?>
<?php include 'includes/navbar.php';?>
<?php require_once("Database/connDB.php"); ?>

<div class="content">
    <div style="margin: auto;  max-width: 1200px;">
        <section>
            <div class="mycontainer">
                <h2 class="text-center mb-5 mt-5">目前剩餘名額</h2>
                <?php
                $sqlSelect = mysqli_query($conn, "SELECT * FROM quota");
                $numrow = mysqli_num_rows($sqlSelect);
                if ($numrow != 0) {
                    while ($data = mysqli_fetch_array($sqlSelect)) {
                ?>      
                        <div class="text-center">
                            <h3>國科會大專生研究計畫</h3>
                            <h4><?php echo $data['目前大專生名額']; ?> : <?php echo $data['大專生總名額']; ?> (目前名額/收取名額)</h4>
                            <br>
                            <h3>畢業專題</h3>
                            <h4><?php echo $data['目前專題名額']; ?> : <?php echo $data['專題總名額']; ?> (目前名額/收取名額)</h4>
                            <br>
                            <h3>說明</h3>
                            <h4><?php echo $data['補充說明']; ?></h4>
                        </div>
                <?php
                    }
                } else {
                    echo "<tr class='text-center'><td colspan='12'>目前無任何紀錄</td></tr>";
                }
                ?>
            </div>
        </section>


        <section>
            <div class="mycontainer" style="padding-bottom: 10%;">
                <header class="mt-5 mb-5">
                    <h2 class="text-center">歷屆畢業專題</h2>
                </header>
            
                <table class="table table-bordered table-hover table-striped"">
                    <thead>
                        <tr>
                            <th width="5%">年度</th>
                            <th>專題題目/方向</th>
                            <th width="6%">需求人數</th>
                            <th>學生須具備能力</th>
                            <th>專題說明</th>
                            <th width="10%">狀態</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlSelect = mysqli_query($conn, "SELECT * FROM seniorproject order by 年度 desc");
                        $numrow = mysqli_num_rows($sqlSelect);
                        if ($numrow != 0) {
                            while ($data = mysqli_fetch_array($sqlSelect)) {
                        ?>
                                <tr>
                                    <td><?php echo $data['年度']; ?></td>
                                    <td><?php echo $data['專題題目']; ?></td>
                                    <td><?php echo $data['需求人數']; ?></td>
                                    <td><?php echo $data['具備能力']; ?></td>
                                    <td><?php echo $data['專題說明']; ?></td>
                                    <td><?php echo $data['狀態']; ?></td>
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
        </section>
    </div>
</div>

<?php include 'includes/footer.php';?>