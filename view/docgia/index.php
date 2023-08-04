<?php
require 'view/template/header.php';
require_once 'view/docgia/message.php';
?>
<main>
    <div class="container">
        <div class="row">
            <div class="">
                <p><?php echo isset($_GET['tt']) ? $_GET['tt'] : ''?></p>
            </div>
            <div class="col-sm-8 mb-3" style="color: blue;">
                <h3>LIST OF EMPLOYEES</h3>
            </div>
            <div class="col-sm-3 mb-3">
                <a href="index.php?controller=docgia&action=add"><button class="btn btn-primary">Add New Employees</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dgonor as $dg) {
                            $urlEdit =
                            "index.php?controller=docgia&action=edit&stt=" . $dg['stt'];
                            $urlDelete =
                            "index.php?controller=docgia&action=delete&stt=" . $dg['stt'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $dg['stt'] ?></th>
                                <td><?php echo $dg['hoten'] ?></td>
                                <td><?php echo $dg['address'] ?></td>
                                <td><?php echo $dg['salary'] ?></td>
                                <td><a href="<?php echo $urlEdit ?>"><i class="bi bi-eye-fill"></i></a>
                                    <a href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-square"></i></a>
                                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo $urlDelete ?>"><i class="bi bi-trash"></i></a>
                                </td>
                                
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>