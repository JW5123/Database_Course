<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM educations WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="container mb-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">編輯資料</h5>
            </div>
            <div class="card-body">
                <form id="editForm" action="education/process.php" method="post">
                    <?php if ($row['分類'] == '學歷') { ?>
                        <div class="row my-4">
                            <div class="form-element col-md-5 mb-3">
                                <input type="text" class="form-control" name="school" placeholder="學校" value="<?php echo $row['學校']; ?>">
                            </div>
                            <div class="form-element col-md-5 mb-3">
                                <input type="text" class="form-control" name="department" placeholder="系所" value="<?php echo $row['系所']; ?>">
                            </div>
                            <div class="form-element col-md-2 mb-3 d-grid">
                                <select class="form-select" aria-label="Default select example" name="degree" id="degreeSelect">
                                    <option disabled>學位</option>
                                    <option value="學士" <?php if ($row['學位'] == '學士') echo 'selected'; ?>>學士</option>
                                    <option value="碩士" <?php if ($row['學位'] == '碩士') echo 'selected'; ?>>碩士</option>
                                    <option value="博士" <?php if ($row['學位'] == '博士') echo 'selected'; ?>>博士</option>
                                </select>
                            </div>
                        </div>
                    <?php } elseif ($row['分類'] == '專長') { ?>
                        <div class="row my-4">
                            <div class="form-element col-md-12 mb-3">
                                <input type="text" class="form-control" name="specialty" placeholder="專長" value="<?php echo $row['專長']; ?>">
                            </div>
                        </div>
                    <?php } ?>
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <div class="row justify-content-center">
                        <div class="form-element col-md-2 d-grid">
                            <input type="submit" name="update" value="更新" class="btn btn-primary">
                        </div>
                        <div class="form-element col-md-2 d-grid">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='personal.php'">取消</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var stateSelect = document.getElementById("degreeSelect");

        var savedState = "<?php echo $row["學位"]; ?>";

        for (var i = 0; i < stateSelect.options.length; i++) {
            if (stateSelect.options[i].value === savedState) {
                stateSelect.selectedIndex = i;
                break;
            }
        }
    });
</script>