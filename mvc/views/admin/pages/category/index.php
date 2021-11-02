<div id="content" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                        <li class="breadcrumb-item active">Thể loại</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category table</h3>

                            <button type="button" onclick="openModalCategory('')" href="#"
                                class="btn btn-primary btn-sm float-right" role="button" data-toggle="modal"
                                data-target="#AddModal">Add</button>

                            <button type="button" onclick="" href="#" class="btn btn-success btn-sm float-right mr-1"
                                role="button" data-toggle="modal" data-target="#">Import</button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="categorytable" class="table table-bordered table-striped dt-responsive nowrap display">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Detail</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                </tbody>
                                <tfoot>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Detail</th>
                                    <th>#</th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal" id="AddModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="formAdd" action="" method="post">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input name="txtName" type="text" class="form-control formUpdateInput"
                                    placeholder="Enter ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Detail</label>
                                <input name='txtDetail' type="text" class="form-control formUpdateInput"
                                    placeholder="Enter ">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button id='addbtn' name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="DeleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Delete</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="formDelete" action="" method="POST">

                        <div class="card-body">
                            <div class="form-check">
                                <input name="checkDelete" id="checkDelete" type="checkbox" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="UpdateModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="formUpdate" action="" method="POST">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input name="txtName" type="text" class="form-control" id="CategoryName"
                                    placeholder="Enter ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Detail</label>
                                <input name='txtDetail' type="text" class="form-control" id="CategoryDetail"
                                    placeholder="Enter ">
                            </div>                            
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="http://localhost:84/Bookstore/public/assets/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () { 
       alert("Hello")
       // category ------------------------------------------------------------------------
    //an thong bao 
    $("#success-alert").hide();
    //$('#authortable').destroy();
    $.fn.dataTable.ext.errMode = 'throw';
    //var editor;
    categorytable = $('#categorytable').DataTable( {
        dom: 'Bfrtip',
        "ajax": "http://localhost:84/Bookstore/category/getall",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "detail" },
            {   
                "data": "id",
                //"defaultContent": "<a onclick='openModal()' href='#' class='btn btn-warning btn-sm' role='button' data-toggle='modal' data-target='#UpdateModal'>Update</a>"
                "render": function ( data, type, row, meta ) {
                   
                        return (
                          "<button onclick='openModalCategory(this)' class='btn btn-warning btn-sm mr-1' role='button' data-toggle='modal' data-target='#UpdateModal' data_id='"+data+"'>" +
                            "Update"+
                          "</button>"+
                          "<button onclick='openModalCategory(this)' class='btn btn-danger btn-sm' role='button' data-toggle='modal' data-target='#DeleteModal' data_id='"+data+"'>" +
                          "Delete"+
                            "</button>"
                        );
              
                }
            }            
        ],
           
    });
    });

    function openModalCategory(e){
        $getCurrentUrl = 'http://localhost:84/Bookstore/Category';
        id=$(e).attr('data_id');
        const x = document.forms["formUpdate"];
        var name,detail;
        $.ajax({
            type: "POST",
            url: 'http://localhost:84/Bookstore/Category/getByID/'+id,
            dataType: 'json',
            success: function(data){
                console.log(data['data'][0].id);
                x.elements[0].value = data['data'][0].name;
                x.elements[1].value = data['data'][0].detail;
                x.elements[2].value = data['data'][0].prarentID;
            }
        });
        $formUpdate = document.querySelector("#formUpdate");
        $formDelete = document.querySelector("#formDelete");
        $formAdd = document.querySelector("#formAdd");
        $formAdd.action =  $getCurrentUrl+"/add";
        $formUpdate.action = $getCurrentUrl+"/update/"+id;
        $formDelete.action = $getCurrentUrl+"/delete/"+id;
    } 
</script>