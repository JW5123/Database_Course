<?php require_once("apply.php"); ?>
<div class="container mb-5 mx-auto tab-interview">
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label class="form-label">姓名</label>
            <input type="text" class="form-control" name="name" id="inputName" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">班級</label>
            <input type="text" class="form-control" name="class" id="inputClass" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">學號</label>
            <input type="text" class="form-control" name="studentID" id="inputID" placeholder="D1234567" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">信箱</label>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="12345@o365.fcu.edu.tw" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">日期</label>
            <input type="date" class="form-control" name="date" id="inputDate" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">節數</label>
            <select name="node" id="inputState" class="form-select" required>
                <option selected>請選擇</option>
                <option>第一節</option>
                <option>第二節</option>
                <option>第三節</option>
                <option>第四節</option>
                <option>第五節</option>
                <option>第六節</option>
                <option>第七節</option>
                <option>第八節</option>
                <option>第九節</option>
                <option>第十節</option>
            </select>
        </div>
        <div class="col-md-12">
            <label class="form-label">問題描述</label>
            <textarea class="form-control" name="descr" id="leaveDesc" rows="4" placeholder="輸入..." required></textarea>
        </div>
        <div class="col-12">
            <?php if (isset($alertmsg)) { echo $alertmsg; } ?>
        </div>
        <div class="col-12">
            <input type="submit" name="create" value="送出" class="btn btn-primary">
        </div>
    </form>
</div>
