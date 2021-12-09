<?php

// Thư Viện Xử Lý Database
class DB_driver
{
    // Biến lưu trữ kết nối
    private $__conn;
     
    // Hàm Kết Nối
    function connect()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = mysqli_connect('localhost:3307', 'root', '', 'telephonestore') or die ('Lỗi kết nối');
 
            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
            mysqli_set_charset($this->__conn, 'UTF8');
        }
    }

    // Hàm Ngắt Kết Nối
    function dis_connect(){
        // Nếu đang kết nối thì ngắt
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }
 
    // Hàm Insert
    function insert($table, $data)
    {
        // Kết nối
        $this->connect();
 
        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
 
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->__conn,$value)."'";
        }
 
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
        return mysqli_query($this->__conn, $sql);
    }
    function insertAdvanced($table, $data)
    {
        // Kết nối
        $this->connect();
 
        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
 
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->__conn,$value)."'";
        }
 
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').') ON DUPLICATE KEY UPDATE quantity=quantity+VALUES(quantity)';

        return mysqli_query($this->__conn, $sql);
    }
    function insertExcel($table, $data)
    {

        // Kết nối
        $this->connect();

        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
 
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->__conn,$value)."'";
        }
 
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT IGNORE INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
     
        return mysqli_query($this->__conn, $sql);
    }
    // Hàm Update
    function update($table, $data, $where)
    {
        // Kết nối
        $this->connect();
        $sql = '';
        // Lặp qua data
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_real_escape_string($this->__conn,$value)."',";
        }
 
        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;

        return mysqli_query($this->__conn, $sql);
    }
    function updatebysql($sql) {
        $this->connect();
        return mysqli_query($this->__conn, $sql);
    }
    // Hàm delete
    function remove($table, $where){
        // Kết nối
        $this->connect();
         
        // Delete
        $sql = "DELETE FROM $table WHERE $where";
        
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm lấy danh sách
    function get_list($sql)
    {
        // Kết nối
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        return $result;
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        return $result;
        
    }
 
    // Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
    function get_row($sql)
    {
        //echo $sql;
        // Kết nối
        $this->connect();
        
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
     
    
        //$row = mysqli_fetch_array($result);
        $arr = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($arr, $row);
            }
        }
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
 
        if ($arr){
            return json_encode(['data' => $arr]);
        }
 
        return false;
    }
}

?>