<?php	
	class CustomerModel extends DB_business
	{
            function __construct() 
            {
                  // Khai báo tên bảng
                  $this->_table_name = 'customer';
                  
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
            public function getUsername($id)
            {   
                  $this->_key = 'username';
                  return $this->select_by_stringID('*',$id);
            }
            public function add($data){
                  return $this->add_new($data);
            }
            public function updateByID($data,$id){
                  return $this->update_by_id($data, $id);
            }
            public function updateByUsername($data, $username) {
                  $this->_key = 'username';
                  return $this->update_by_stringID($data, $username);
            }
            public function delete($id){
                  return $this->delete_by_id($id);

            }            
	}
?> 