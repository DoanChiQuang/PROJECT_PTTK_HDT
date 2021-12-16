<?php	
	class PublisherModel extends DB_business
	{
            function __construct() 
            {
                  // Khai báo tên bảng
                  $this->_table_name = 'supplier';
                  
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
            public function addExcel($data){
                  return $this->add_new_excel($data);
            }
            public function getID2($id)
            {   
                  return $this->select_by_id2('*',$id);
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


	}
?> 