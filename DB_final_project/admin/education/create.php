<div id="specialty-form-container">
    <div class="card mb-5" style="display: <?php echo isset($_GET['form']) ? 'block' : 'none'; ?>;">
        <div class="card-header">
            <h5 class="card-title">新增資料</h5>
        </div>
        <div class="card-body">
            <form id="dynamicForm" action="education/process.php" method="post">
                <div class="row my-4" id="educationFields" style="display: <?php echo ($_GET['form'] ?? '') === 'education' ? 'flex' : 'none'; ?>;">
                    <div class="form-element col-md-5">
                        <input type="text" class="form-control" name="school" placeholder="學校">
                    </div>
                    <div class="form-element col-md-5">
                        <input type="text" class="form-control" name="department" placeholder="系所">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <select class="form-select" aria-label="Default select example" name="degree">
                            <option selected disabled>學位</option>
                            <option value="學士">學士</option>
                            <option value="碩士">碩士</option>
                            <option value="博士">博士</option>
                        </select>
                    </div>
                </div>
                <div class="row my-4" id="specialtyFields" style="display: <?php echo ($_GET['form'] ?? '') === 'specialty' ? 'flex' : 'none'; ?>;">
                    <div class="form-element col-md-12">
                        <input type="text" class="form-control" name="specialty" placeholder="專長">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-element col-md-2 d-grid">
                        <input type="submit" name="create" value="新增" class="btn btn-primary">
                    </div>
                    <div class="form-element col-md-2 d-grid">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='personal.php'">取消</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>