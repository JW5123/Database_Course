<?php
$headers = ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日'];
$timeslots = [
    '第一節 8:10~9:00',
    '第二節 9:10~10:00',
    '第三節 10:10~11:00',
    '第四節 11:10~12:00',
    '第五節 12:10~13:00',
    '第六節 13:10~14:00',
    '第七節 14:10~15:00',
    '第八節 15:10~16:00',
    '第九節 16:10~17:00',
    '第十節 17:10~18:00',
    '第十一節 18:10~19:00',
    '第十二節 19:10~20:00',
    '第十三節 20:10~21:00',
    '第十四節 21:10~22:00'
];
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM course WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="card">
        <div class="card-header">
            <h4>編輯課程</h4>
        </div>
        <div class="card-body">
            <form id="editForm" action="course/process.php" method="post">
                <div class="row my-4">
                    <div class="form-element col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">課程名稱</label>
                        <input type="text" class="form-control" name="courseName" value="<?php echo $row['課程名稱']; ?>">
                    </div>
                    <div class="form-element col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">教室/班級/請益</label>
                        <input type="text" class="form-control" name="classlocal" value="<?php echo $row['教室地點']; ?>">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <label for="exampleFormControlInput1" class="form-label">星期</label>
                        <select class="form-select" aria-label="Default select example" name="week" id="weekSelect">
                            <option selected disabled>請選擇</option>
                            <?php
                            foreach ($headers as $header) {
                                ?>
                                <option value='<?= $header ?>'><?= $header ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-element col-md-2">
                        <label for="exampleFormControlInput1" class="form-label">開始時段</label>
                        <select class="form-select" aria-label="Default select example" name="startnode" id="startSelect">
                            <option selected disabled>請選擇</option>
                            <?php
                            foreach ($timeslots as $timeslot) {
                                ?>
                                <option value='<?= $timeslot ?>'><?= $timeslot ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-element col-md-2">
                        <label for="exampleFormControlInput1" class="form-label">結束時段</label>
                        <select class="form-select" aria-label="Default select example" name="endnode" id="endSelect">
                            <option selected disabled>請選擇</option>
                            <?php
                            foreach ($timeslots as $timeslot) {
                                ?>
                                <option value='<?= $timeslot ?>'><?= $timeslot ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="row mb-5 justify-content-center">
                    <div class="form-element col-md-2 d-grid">
                        <input type="submit" name="update" value="更新" class="btn btn-primary">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='courseData.php'">取消</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var stateSelect = document.getElementById("weekSelect");

        var savedState = "<?php echo $row["星期"]; ?>";

        for (var i = 0; i < stateSelect.options.length; i++) {
            if (stateSelect.options[i].value === savedState) {
                stateSelect.selectedIndex = i;
                break;
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        var stateSelect = document.getElementById("startSelect");

        var savedStart = "<?php echo $row["開始節數"]; ?>";

        for (var i = 0; i < stateSelect.options.length; i++) {
            if (stateSelect.options[i].value === savedStart) {
                stateSelect.selectedIndex = i;
                break;
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        var stateSelect = document.getElementById("endSelect");

        var savedEnd = "<?php echo $row["結束節數"]; ?>";

        for (var i = 0; i < stateSelect.options.length; i++) {
            if (stateSelect.options[i].value === savedEnd) {
                stateSelect.selectedIndex = i;
                break;
            }
        }
    });
</script>