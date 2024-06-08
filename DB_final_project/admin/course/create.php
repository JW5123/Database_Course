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

<div id="specialty-form-container">
    <div class="card" style="display: <?php echo isset($_GET['form']) ? 'block' : 'none'; ?>;">
        <div class="card-header">
            <h4>課程資料</h4>
        </div>
        <div class="card-body">
            <form id="dynamicForm" action="course/process.php" method="post" >
                <div class="row my-4" id="educationFields" style="display: <?php echo ($_GET['form'] ?? '') === 'course' ? 'flex' : 'none'; ?>;">
                    <div class="form-element col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">課程名稱</label>
                        <input type="text" class="form-control" name="courseName">
                    </div>
                    <div class="form-element col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">教室/班級/請益</label>
                        <input type="text" class="form-control" name="classlocal">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <label for="exampleFormControlInput1" class="form-label">星期</label>
                        <select class="form-select" aria-label="Default select example" name="week">
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
                    <div class="form-element col-md-2 d-grid">
                        <label for="exampleFormControlInput1" class="form-label">開始時段</label>
                        <select class="form-select" aria-label="Default select example" name="startnode">
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
                    <div class="form-element col-md-2 d-grid">
                        <label for="exampleFormControlInput1" class="form-label">結束時段</label>
                        <select class="form-select" aria-label="Default select example" name="endnode">
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
                <div class="row my-4 justify-content-center">
                    <div class="form-element col-md-2 d-grid">
                        <input type="submit" name="create" value="新增" class="btn btn-primary">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='courseData.php'">取消</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>