<?php

require_once 'models/docgiaModel.php';
class docgiaController{
    function index(){
        $dgModal = new docgiaModel();
        $dgonor = $dgModal->getAllDG();
        require_once 'view/docgia/index.php';
    }
    function admin(){
        $dgModal = new docgiaModel();
        $dgonor = $dgModal->getAllDG();
        require_once 'view/docgia/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
          
            $hoten = $_POST['hoten'];
            $address = $_POST['address'];
            $salary = $_POST['salary'];
            if(empty($hoten) ||  empty($address) || empty($salary)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $dgModal = new docgiaModel();
                $dgArr = [
                 
                    'hoten' => $hoten,
                    'address' => $address,
                    'salary' => $salary,
                ];
                $isAdd = $dgModal->insert($dgArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }

        }
        require_once 'view/docgia/add.php';
    }
    function edit(){
        if (!isset($_GET['stt'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        if (!is_numeric($_GET['stt'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        $stt = $_GET['stt'];
        $dgModal = new docgiaModel();
        $BD = $dgModal->getBDById($stt);
        $error = '';
        if (isset($_POST['submit'])) {
            
            $hoten = $_POST['hovaten'];
            $address = $_POST['address'];
            $salary= $_POST['salary'];
            if(empty($hoten) ||  empty($address) || empty($salary)){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else {
                $dgModal = new docgiaModel();
                $dgArr = [
                    'stt' => $stt,
                    'hoten' => $hoten,
                    'address' => $address,
                    'salary' => $salary,
                ];
                $isAdd = $dgModal->update($dgArr);

                if ($isAdd) {
                    $TT= "Sửa thành công";
                }
                else {
                    $TT = "Sửa thất bại";
                }
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }
        }
        require_once 'view/docgia/edit.php';
    }
    function delete(){
        $stt = $_GET['stt'];
        if (!is_numeric($stt)) {
            header("Location: index.php?controller=book&action=index");
            exit();
        }
        $dgModal = new docgiaModel();
        $isDelete = $dgModal->delete($stt);
        if ($isDelete) {
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=docgia&action=admin&tt=$TT");
        exit();
    }
}

?>