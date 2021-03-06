<?php	
	class ImportModel extends DB_business
	{
            function __construct() 
            {
                  // Khai báo tên bảng
                  $this->_table_name = 'import';
                  
                  // Khai báo tên field id
                  $this->_key = 'id';
                  
                  // Gọi hàm khởi tạo cha
                  parent::__construct();
            }
            public function getAll()
            {   
                  return $this->selectAll('*');
            }
            public function getID($id)
            {   
                  return $this->select_by_id('*',$id);
            }	
            public function add($data){
                  return $this->add_new($data);
            }
            public function updateByID($data,$id){
                  return $this->update_by_id($data, $id);
            }
            public function delete($id){
                  return $this->delete_by_id($id);

            }
            public function selectLast(){
                  $sql = "SELECT Max(id) as id FROM import";
                  $list = $this->selectQuery($sql);
                  foreach($list as $row){
                        return $row['id'];
                  }

            }
            


	}
?> 