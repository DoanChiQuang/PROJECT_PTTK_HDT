<?php
class Home extends Controller{
    
    function __construct(){
        $this->Home = $this->model("UserModel");        
        $this->Customer = $this->model("CustomerModel"); 
        $this->Employee = $this->model("EmployeeModel");
        $this->User = $this->model("UserModel");
    }
    function index(){
        $this->view("layoutHome",array(
            "Page" => "home"
        ));
    }
    function Login(){
        if(isset($_SESSION['username']) && isset($_SESSION['password']))
        {
            header("Location: ".constant('URL')."home/index");
        }        
        $this->view("layoutHome",array(
            "Page" => "login"
        ));
    }
    function Register(){        
        if(isset($_SESSION['username']) && isset($_SESSION['password']))
        {
            header("Location: ".constant('URL')."home/index");
        }
        $this->view("layoutHome",array(
            "Page" => "signup"
        ));
    }    
    function Logout(){                        
        session_destroy();
        header("Location: ".constant('URL')."home/Login");
    }
    // function register(){
    //     $this->view("layout",array(
    //         "Page" => "register"
    //     ));
    // }
    function ForgotPassword(){
        $this->view("admin/layout2",array(
            "Page" => "login/forgot-password"
        ));
    }
    function VerifyEmail(){
        $this->view("admin/layout2",array(
            "Page" => "login/verifyEmail"
        ));
    }
    function ChangePassword(){
        $this->view("admin/layout2",array(
            "Page" => "login/change-password"
        ));
    }
    function UpdatePassword() {
        if(isset($_POST['password']) && isset($_POST['retypepassword']))
        {            
            $username = $_SESSION['username'];        
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);     
            
            $array = array('password' => $password);        
            
            if($this->Home->update_by_stringID($array,$username)==1)
            {
                echo 1;                
                return;
            }
        }
        echo 0;
    }
    function checkEmail(){
        if(isset($_POST['txtEmail']))
        {
            $txtusername = $_POST['txtEmail'];            
            $sql = "SELECT * FROM `user` WHERE `email` = '$txtusername' LIMIT 1";            
            if(mysqli_num_rows($this->Home->getToCheckLogin($sql))==1)
            {  
                $code = rand (1000 , 9999);
                setcookie("verifycode", $code, time() + 60, "/");                
                $result = mysqli_fetch_array($this->Home->getToCheckLogin($sql));
                $_SESSION['username'] = $result['username'];
                $to = $_POST['txtEmail'];
                $subject = "Confirm Verifition Code";
                $txt = "Verify Code:".$code;
                $headers = "From: dzeamtechie@gmail.com";        
                if(mail($to,$subject,$txt,$headers)==true)
                {
                    echo 1;
                    return;
                }                
            }            
        }
        echo 0;
    } 
    function checkLogin() {
        if(isset($_POST['txtUsername']) && $_POST['txtPassword'])
        {
            $txtusername = $_POST['txtUsername'];
            $txtpassword = $_POST['txtPassword'];            
            $sql = "SELECT * FROM `user` WHERE (`username` = '$txtusername' OR `email` = '$txtusername') AND `status`=1 LIMIT 1";            
            if(mysqli_num_rows($this->Home->getToCheckLogin($sql))==1)
            {                                
                $result = mysqli_fetch_array($this->Home->getToCheckLogin($sql));                
                if(password_verify($txtpassword, $result['password']))                
                {
                    $sqlcart = "SELECT * FROM `cart`,`user` WHERE `cart`.`username` = `user`.`username` AND (`user`.`username` = '$txtusername' OR `user`.`email` = '$txtusername')";
                    $cart = mysqli_fetch_array($this->Home->getToCheckLogin($sqlcart));                
                    if(isset($cart["id"]))
                    {                    
                        $_SESSION['cart'] =  $cart["id"];                    
                    }
                    $_SESSION['username'] = $txtusername;
                    $_SESSION['password'] = $txtpassword;
                    // if(isset($_POST['checkremember']))
                    // {
                        setcookie("username", $txtusername, time() + (86400 * 7), "/");                                                            
                    //}
                    echo 1;
                    return;
                }                
            }            
        }
        echo 0;        
    }
    function checkRegister() {
        if(isset($_POST['username']))
        {
            $txtusername = $_POST['username'];
            $sql = "SELECT * FROM `user` WHERE `username` = '$txtusername' LIMIT 1";
            if(mysqli_num_rows($this->Home->getToCheckLogin($sql))==1)
            {                
                echo 0;
                return;
            }
        }
        else if(isset($_POST['email']))
        {
            $txtemail = $_POST['email'];
            $sql = "SELECT * FROM `user` WHERE `email` = '$txtemail' LIMIT 1";
            if(mysqli_num_rows($this->Home->getToCheckLogin($sql))==1)
            {                
                echo 0;
                return;
            }
        }
        echo 1;
    }
    function addRegister() {        
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['retypepassword']) && isset($_POST['name']) && isset($_POST['phone'])){
            if($_POST['password'] != $_POST['retypepassword'])
            {
                echo 4;
                return;
            }
            $username = $_POST['username'];
            $email = $_POST['email']; 
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $date = date("Y-m-d");

            $sql1 = "SELECT * FROM `user` WHERE `username` = '$username' LIMIT 1";
            if(mysqli_num_rows($this->Home->getToCheckLogin($sql1))==1)
            {                
                echo 2;
                return;
            }
            $sql2 = "SELECT * FROM `user` WHERE `email` = '$email' LIMIT 1";
            if(mysqli_num_rows($this->Home->getToCheckLogin($sql2))==1)
            {                
                echo 3;
                return;
            }

            $arrayuser = array("username" => $username, "password" => $password, "email" => $email, "date" => $date, "status" => "1");
            $arraycustomer = array("name" => $name, "phone" => $phone, "email" => $email, "username" => $username);
            if($this->Home->add($arrayuser)==1 && $this->Customer->add($arraycustomer)==1){
                echo 1;
                return;
            }
        }
        echo 0;        
    }
    function getUser() {            
        if(isset($_POST['username']))
        {
            $username = $_POST['username'];            
            if($this->User->getInfo('customer',$username))
            {   
                echo $this->User->getInfo('customer',$username);
            }
            else if ($this->User->getInfo('employee',$username))
            {
                echo $this->User->getInfo('employee',$username);
            }
        }              
    }
    function updateprofile() {
        if(isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['birth']) && isset($_POST['email']) && isset($_POST['address']))
        {
            $name = $_POST['fullname'];
            $phone = $_POST['phone'];
            $birth = $_POST['birth'];
            $email = $_POST['email']; 
            $address = $_POST['address'];
            $username = $_SESSION['username'];
            $array = array('name' => $name, "phone" => $phone, "email" => $email, "address" => $address, "birth" => $birth);
            if($this->Customer->updateByUsername($array,$username)==1)
            {
                echo 1; 
                return;
            }            
        }
        echo 0;
    }           
    function pages() {
        $this->view("pages/404");
    }
}
?>