<div id="form-container">
    <form id="data-form" action="" method="post" enctype="multipart/form-data">
        <div class="row my-4">
            <div class="form-element col-md-3">
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-element col-md-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="姓名" required>
            </div>
            <div class="form-element col-md-3">
                <input type="text" class="form-control" name="en_name" id="en_name" placeholder="英文姓名" required>
            </div>
            <div class="form-element col-md-3">
                <input type="text" class="form-control" name="position" id="position" placeholder="職稱" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="form-element col-md-4">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="分機" required>
            </div>
            <div class="form-element col-md-4">
                <input type="text" class="form-control" name="mail" id="mail" placeholder="信箱" required>
            </div>
            <div class="form-element col-md-4">
                <input type="text" class="form-control" name="office" id="office" placeholder="辦公室" required>
            </div>
        </div>
        <div class="form-element col-md-12">
            <textarea class="form-control" name="introduce" id="introduce" placeholder="簡介" rows="7"></textarea>
        </div>
    </form>
</div>