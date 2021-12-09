<?php
error_reporting(0);
class Product extends Controller{
    
    function __construct(){
        $this->product = $this->model("ProductModel");
        $this->author = $this->model("AuthorModel");
        $this->publisher = $this->model("PublisherModel");
        $this->sale = $this->model("SaleModel");
        $this->UserRole = $this->model("UserRoleModel");
        $this->esrb = $this->model("EsrbModel");
        $this->category = $this->model("CategoryProductModel");                                 
    }

    function index(){
        if($this->UserRole->checkRole("staff.product")!=1 && $this->UserRole->checkRole("admin")!=1)
        {
            $this->page500();
            exit();
        } 
        $this->view("admin/layout",array(
			"Page" => "product"
		));        
    }
    function getAll($number=null){
        $product = json_decode($this->product->getAll());
        
        for($i=0 ; $i< count($product->data) ; $i++ ){            
         
                $author = $product->data[$i]->authorID; // id author
                $publisher = $product->data[$i]->publisherID; // id publisher
                $sale = $product->data[$i]->saleID;
                $esrb = $product->data[$i]->esrbID;
                
                if(isset($author)){
                    $authorobj = json_decode($this->author->getID($author));
                    $product->data[$i]->authorID = array("id" => $authorobj->data[0]->id,"name" => $authorobj->data[0]->name);                    
                }
                else{
                    $product->data[$i]->authorID = array("id" => "Null" , "name" => "Null");
                }
                if(isset($publisher)){
                    $publisherobj = json_decode($this->publisher->getID($publisher));
                    $product->data[$i]->publisherID = array("id"=>$publisherobj->data[0]->id, "name" => $publisherobj->data[0]->name);
                }
                else{
                    $product->data[$i]->publisherID = array("id" => "Null" , "name" => "Null");
                }
                if(isset($esrb)){
                    $esrbobj = json_decode($this->esrb->getID($esrb));
                    $product->data[$i]->esrbID = array("id" => $esrbobj->data[0]->id,"name" => $esrbobj->data[0]->name);
                }
                else{
                    $product->data[$i]->esrbID = array("id" => "Null" , "name" => "Null");
                }
                if(isset($sale)){
                    $saleobj = json_decode($this->sale->getID($sale));
                    $product->data[$i]->saleID = array("id" => $saleobj->data[0]->id , "name" => $saleobj->data[0]->name , "discount" => $saleobj->data[0]->discount , "startdate" => $saleobj->data[0]->startdate,"enddate" => $saleobj->data[0]->enddate);
                }
                else{
                    $product->data[$i]->saleID = array("id" => "Null" , "name" => "Null" , "discount" => "0");
                }
              
        }
        //echo '<pre>';
        echo json_encode(["data" => $product->data],JSON_PRETTY_PRINT);
        

    }
    function getAllStatus($number=null){
        $product = json_decode($this->product->getStatus());
        
        for($i=0 ; $i< count($product->data) ; $i++ ){            
         
                $author = $product->data[$i]->authorID; // id author
                $publisher = $product->data[$i]->publisherID; // id publisher
                $sale = $product->data[$i]->saleID;
                $esrb = $product->data[$i]->esrbID;
                
                if(isset($author)){
                    $authorobj = json_decode($this->author->getID($author));
                    $product->data[$i]->authorID = array("id" => $authorobj->data[0]->id,"name" => $authorobj->data[0]->name);
                }
                if(isset($publisher)){
                    $publisherobj = json_decode($this->publisher->getID($publisher));
                    $product->data[$i]->publisherID = array("id"=>$publisherobj->data[0]->id, "name" => $publisherobj->data[0]->name);
                }
                if(isset($esrb)){
                    $esrbobj = json_decode($this->esrb->getID($esrb));
                    $product->data[$i]->esrbID = array("id" => $esrbobj->data[0]->id,"name" => $esrbobj->data[0]->name);
                }
                if(isset($sale)){
                    $saleobj = json_decode($this->sale->getID($sale));
                    $product->data[$i]->saleID = array("id" => $saleobj->data[0]->id , "name" => $saleobj->data[0]->name , "discount" => $saleobj->data[0]->discount , "startdate" => $saleobj->data[0]->startdate,"enddate" => $saleobj->data[0]->enddate);
                }
                else{
                    $product->data[$i]->saleID = array("id" => "Null" , "name" => "Null" , "discount" => "0");
                }
              
        }
        //echo '<pre>';
        echo json_encode(["data" => $product->data],JSON_PRETTY_PRINT);
        

    }
    function getByID($id){
        //$list = $this->product->getID($id);
        
        $product = json_decode($this->product->getID($id));
        $sale = $product->data[0]->saleID;        
        $publisher = $product->data[0]->publisherID; // id publisher        
        if(isset($publisher)){
            $publisherobj = json_decode($this->publisher->getID($publisher));
            $product->data[0]->publisherID = array("id" => $publisherobj->data[0]->id,"name" => $publisherobj->data[0]->name);
        }        
        if(isset($sale)){
            $saleobj = json_decode($this->sale->getID($sale));
            $product->data[0]->saleID = array("id" => $saleobj->data[0]->id , "name" => $saleobj->data[0]->name , "discount" => $saleobj->data[0]->discount, "startdate" => $saleobj->data[0]->startdate,"enddate" => $saleobj->data[0]->enddate);
        }
        else if(isset($product->data[0]->id)){
            $product->data[0]->saleID = array("id" => "Null" , "name" => "Null" , "discount" => "0");
        }        
        $arrCategory = array();
        array_push($arrCategory,"orange");
        array_push($arrCategory,"banana");
        $product->data[0]->category = $arrCategory;
        echo json_encode(["data" => $product->data],JSON_PRETTY_PRINT);
    }
    
    function add(){
        if($this->UserRole->checkRole("admin")!=1 && $this->UserRole->checkPermission($_SESSION['username'],"staff.product.add","add")!=1 && $this->UserRole->checkPermission($_SESSION['username'],"staff.product","add")!=1)        
        {
            echo 2;
            return;
        }
        if(isset($_POST['txtName']) && $_POST['txtPrice']){
            $name = $_POST['txtName'];
            $description= $_POST['txtDescription'];
            $price= $_POST['txtPrice'];            
            
            $quantity= 0;

            
            $publishdate = $_POST['txtPublishdate'];            
            $status = 0;

            
            $publisherID= $_POST['selectPublisher'];            
            $saleID= $_POST['selectSale'];            

            $image= basename($_FILES["txtImage"]["name"]);
            $array = array('name' => $name, 'description' => $description, 'quantity' => $quantity , 'price' => $price  , 'image' => $image , 'publisherID' => $publisherID, 'publishdate' => $publishdate, 'status' => $status);
            if(isset($saleID)){
                $array+=array('saleID' => $saleID);
            }

            
            if($this->product->add($array)==1){
                $target_dir = "./public/assets/images/";
                $target_file = $target_dir.basename($_FILES["txtImage"]["name"]);
                move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file);
                echo 1;
                return;
            }
        }
        echo 0;
        
        
    }
    function addExcel(){
        
        // $target_dir = "./public/assets/images/";
        // $target_file = $target_dir.basename($_FILES["txtExcelImport"]["name"]);
        // move_uploaded_file($_FILES["txtExcelImport"]["tmp_name"], $target_file);
        if(isset($_FILES["txtExcelImport"]["tmp_name"])){
            //Đường dẫn file
            $file = './public/assets/images/'.basename($_FILES["txtExcelImport"]["name"]);
            
            //Tiến hành xác thực file
            $objFile = PHPExcel_IOFactory::identify($file);            
            $objData = PHPExcel_IOFactory::createReader($objFile);
            
            //Chỉ đọc dữ liệu
            $objData->setReadDataOnly(true);
            
            // Load dữ liệu sang dạng đối tượng
            $objPHPExcel = $objData->load($file);

            //Lấy ra số trang sử dụng phương thức getSheetCount();
            // Lấy Ra tên trang sử dụng getSheetNames();

            //Chọn trang cần truy xuất
            $sheet = $objPHPExcel->setActiveSheetIndex(0);
            //Lấy ra số dòng cuối cùng
            $Totalrow = $sheet->getHighestRow();
            //Lấy ra tên cột cuối cùng
            $LastColumn = $sheet->getHighestColumn();
            //Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            //Tạo mảng chứa dữ liệu
            $data = [];
            //Tiến hành lặp qua từng ô dữ liệu
            //----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
            for ($i = 2; $i <= $Totalrow; $i++) {
                //----Lặp cột
                for ($j = 0; $j < $TotalCol; $j++) {
                    // Tiến hành lấy giá trị của từng ô đổ vào mảng
                    $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
                }
            }

            for($i = 0 ; $i < count($data) ; $i++){
                $arrayProduct = array('id'=>$data[$i][0],'name'=>$data[$i][1],'price'=>$data[$i][2],'pagenumber'=>$data[$i][3],'publishdate'=>$data[$i][4],'language'=>$data[$i][5],'image'=>$data[$i][6]);
                $this->product->addExcel($arrayProduct);    
            }
        }  
        echo 0;
    }
    function updateStatus($id){
        if($this->UserRole->checkRole("admin")!=1 && $this->UserRole->checkPermission($_SESSION['username'],"staff.product","update")!=1)        
        {
            echo 2;
            return;
        }
        if(isset($_POST['txtStatus'])){
            $status = $_POST['txtStatus'];
            $array = array('status' => $status);
            if($this->product->updateByID($array,$id)==1){
                echo 1;
                return;
            }
        }
        echo 0;
    }
    function update($id){
        if($this->UserRole->checkRole("admin")!=1 && $this->UserRole->checkPermission($_SESSION['username'],"staff.product.update","update")!=1 && $this->UserRole->checkPermission($_SESSION['username'],"staff.product","update")!=1)
        {
            echo 2;
            return;
        }
        if(isset($_POST['txtName']) && $_POST['txtPrice']){
            $name = $_POST['txtName'];
            $description= $_POST['txtDescription'];
            $price= $_POST['txtPrice'];            
            
            
            $image= basename($_FILES["txtImage"]["name"]);

            $publishdate = $_POST['txtPublishdate'];            
            $status = $_POST['txtStatus'];

            $publisherID= $_POST['selectPublisher'];            
            $saleID= $_POST['selectSale'];

            $array = array('name' => $name, 'description' => $description, 'price' => $price , 'publishdate' => $publishdate, 'status' => $status);
            if(!empty($image)){
                $array += array('image' => $image);
            }
            if(!empty($saleID)){
                $array+=array('saleID' => $saleID);
            }
            if(!empty($publisherID)){
                $array+=array('publisherID' => $publisherID);
            }
            
            if($this->product->updateByID($array,$id)==1){
                $target_dir = "./public/assets/images/";
                $target_file = $target_dir.basename($_FILES["txtImage"]["name"]);
                move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file);
                echo 1;
                return;
            }
        }
        echo 0;
    }
    function delete($id){
        if($this->UserRole->checkRole("admin")!=1 && $this->UserRole->checkPermission($_SESSION['username'],"staff.product.delete","delete")!=1 && $this->UserRole->checkPermission($_SESSION['username'],"staff.product","delete")!=1)        
        {
            echo 2;
            return;
        }
        if(isset($_POST['checkDelete'])){
            
            if($this->product->delete($id)==1){
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