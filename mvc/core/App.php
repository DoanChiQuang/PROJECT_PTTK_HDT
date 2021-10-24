<?php
error_reporting(0);
class App{
    
    protected $controller="Author";
    protected $action="";   
	protected $params = array();
	
    function __construct(){
 
        $arr = $this->UrlProcess();
        
        // Controller
        if(file_exists("mvc/controllers/".$arr[0].".php")){
            $this->controller = $arr[0];			
			//echo $arr[0];
            
            unset($arr[0]);
        }
        elseif(isset($arr[0])){
            $this->controller = "Pages";
        }
          
        require "mvc/controllers/".$this->controller.".php";
     

        //////
        
        $this->controller = new $this->controller;


        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
				//echo $arr[1];
                $this->action = $arr[1];				
            }
            unset($arr[1]);
        }
        
		$_SESSION['action'] = $this->action;
		
        
        //params
		$this->params = $arr?array_values($arr):array();
		//print_r($this->params);
		

        //Gọi hàm 
		call_user_func_array(array($this->controller, $this->action), $this->params);
    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>