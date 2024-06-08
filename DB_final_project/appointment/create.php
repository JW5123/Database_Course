<div id="form-container">
    <form id="data-form" action="" method="post" enctype="multipart/form-data">
        <div class="row my-4">
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="name" placeholder="姓名" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="class" id="class" placeholder="班級" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-6">
                <input type="text" class="form-control" name="studentID" id="studentID" placeholder="學號" required>
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="信箱" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-6">
                <input type="text" class="form-control" id="datepicker" name="date" placeholder="日期" required>
            </div>
            <div class="col-md-6">
                <select name="node" id="node" class="form-select" placeholder="節數" required>
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
        </div>
        <div class="col-md-12">
            <textarea class="form-control" name="descr" id="descr" rows="4" placeholder="輸入..." required></textarea>
        </div>
        <div class="col-12 my-4">
            <?php
            if (isset($_GET['alertmsg'])) {
                echo urldecode($_GET['alertmsg']);
            }
            ?>
        </div>
        <div class="col-md-12 my-4">
            <button type="submit" name="create" id="save-button" class="btn btn-primary">提交</button>
        </div>
    </form>
</div>