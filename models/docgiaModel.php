<?php
require_once 'configs/dbconfig.php';
class docgiaModel{
    private $stt;
    private $hoten;
    private $address;
    private $salary;

    public function getAllDG(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM employees";
        $result = mysqli_query($conn, $sql);
        $arr_dg = [];
        if(mysqli_num_rows($result)>0){
            $arr_dg = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $arr_dg;
    }
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO employees (stt, hoten, address, salary)
        VALUES ('{$param['stt']}', '{$param['hoten']}', '{$param['address']}', '{$param['salary']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    public function getBDById($madg = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM employees WHERE stt={$stt}";
        $results = mysqli_query($connection, $querySelect);
        $dgArr = [];
        if (mysqli_num_rows($results) > 0) {
            $dgs = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $dgArr = $dgs[0];
        }
        $this->closeDb($connection);

        return $dgArr;
    }
    public function update($dg = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE employees
        SET  hoten = '{$dg['hoten']}', address = '{$dg['address']}',salary = '{$dg['salary']}'";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($madg = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM employees WHERE stt= {$stt}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
}

?>