<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div style="color: red">
                <?php echo $error; ?>
            </div>
            <div class="col-md-8 ms-auto me-auto">
                <h4>Sửa thông tin</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control" name="hovaten" id="validationCustom01" value="<?php echo isset($_POST['hovaten']) ? $_POST['hovaten'] : $BD['hovaten']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Address</label>
                        <input type="text" class="form-control" name="namsinh" id="validationCustom02" value="<?php echo isset($_POST['namsinh']) ? $_POST['namsinh'] : $BD['namsinh']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Salary</label>
                        <input type="text" class="form-control" name="nghenghiep" id="validationCustom02" value="<?php echo isset($_POST['nghenghiep']) ? $_POST['nghenghiep'] : $BD['nghenghiep']?>" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>