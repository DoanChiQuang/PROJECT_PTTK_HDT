<?php
class User extends Controller{
    
    function __construct(){
        $this->User = $this->model("UserModel");                
        $this->UserRole = $this->model("UserRoleModel");
        $this->Employee = $this->model("EmployeeModel"); 
        $this->Customer = $this->model("CustomerModel");
        if($this->UserRole->checkRole("admin")!=1)
        {
            $this->page500();
            exit();
        } 
    }

    function index(){
        $this->view("admin/layout",array(
			"Page" => "user",            
		));        
    }
    function getAll(){
        $list = $this->User->getAll();        
        echo $list;
    }
    function getUserRoleByID($username){
        $list = $this->UserRole->getID($username);        
        echo $list;
    }    
    function getByID($id){
        $list = $this->User->getID($id);
        echo $list;
    }
    function add($username){
        if($this->UserRole->checkRole("admin")!=1)        
        {
            echo 2;
            return;
        }         
        $name = $_POST['selected'];
        $fag = 0;                  
        if(isset($_POST['selected']) && !empty($_POST['selected']))
        {         
            $this->UserRole->delete($username);   
            foreach($name as $value)
            {                
                $array = array('username' => $username, "rolename" => $value);
                if($this->UserRole->add($array)==1)
                {
                    $fag = 1;
                }
                else
                {
                    $fag = 0;
                }                    
            }                        
        }
        else
        {
            $this->UserRole->delete($username);
            $fag = 1;
        }
        if($fag == 1)
        {
            echo 1;        
            return;
        }
        echo 0;
    }
    function update($username) {
        if(isset($_POST['checkResetPass']))
        {            
            $employee = json_decode($this->Employee->getUsername($username));
            $customer = json_decode($this->Customer->getUsername($username));
            if(isset($employee->data[0]->birth))
            {
                $birth = $employee->data[0]->birth;
            }
            else
            {
                $birth = $customer->data[0]->birth;
            }
            $password = str_replace( '-', '', $birth );
            $array = array('password' => password_hash($password, PASSWORD_BCRYPT));
            if($this->User->update_by_stringID($array,$username)==1){
                echo 1;
                return;
            }
        }        
        echo 1;
    }
    function updateImage($username){
        
        if(isset($_FILES["txtImage"]["name"])){

            $image= basename($_FILES["txtImage"]["name"]);
            $array = array('image' => $image);

            if($this->User->update_by_stringID($array,$username)==1){
                echo 1;
                return;
            }
        }
        echo 0;
    }
    function updateStatus($username){
        if($this->UserRole->checkRole("admin")!=1)        
        {
            echo 2;
            return;
        }                
        if(isset($_POST['checkLock']))
        {            
            $array = array("status" => '0');    
            if($this->User->update_by_stringID($array,$username)==1){
                echo 1;
                return;
            }
            echo 0;
        }
        else if(isset($_POST['checkUnlock']))
        {
            $array = array("status" => '1');    
            if($this->User->update_by_stringID($array,$username)==1){
                echo 1;
                return;
            }
            echo 0;
        }
        
    }
    function updateRole($username){
        if($this->UserRole->checkRole("admin")!=1)        
        {
            echo 2;
            return;
        }
        if(isset($_POST['roleSelect'])){
            $roleID= $_POST['roleSelect'];
            $array = array("roleID" => $roleID);
            
            if($this->UserRole->updateByID($array,$username)==1){
                echo 1;
                return;
            }
        }
        echo 0;
    }

    function delete($username){
        if($this->UserRole->checkRole("admin")!=1)        
        {
            echo 2;
            return;
        }
        if(isset($_POST['checkDelete'])){
            
            if($this->UserRole->delete($username)==1 && $this->User->delete($username)==1){
                echo 1;
                return;
            }
        }
        echo 0;
    }        
    function pages() {
        $this->view("pages/404");
    }
    function page500() {
        $this->view("layout2",array(
            "Page" => "500"
        ));
    }
}
?>