<?php
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
    }
    else
    {
        $username = '';
        $password = '';
    }
?>
<!-- Navigation -->
<nav id="navbarExample" class="navbar navbar-expand-lg fixed-top " aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.html"><img
                    src="<?php echo constant('URL') ?>public/assets/images/logo.jpg" alt="alternative"></a>

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text" href="index.html">Ioniq</a> -->

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo constant('URL') ?>home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo constant('URL') ?>browse">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo constant('URL') ?>cart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo constant('URL') ?>profile">Me</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                            aria-expanded="false">More</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="article.html">Category</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item" href="terms.html">Author</a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li><a class="dropdown-item" href="privacy.html">Publisher</a></li>
                        </ul>
                    </li>
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm d-none" href="#" id="hidden-username"><span><i class="fas fa-user"></i> <span id="username"></span></span></a>
                    <a class="btn-outline-sm" href="<?php echo constant('URL')?>home/login" id="hidden-login">Log in</a>
                    <a class="btn-outline-sm d-none" href="<?php echo constant('URL')?>home/logout" id="hidden-logout">Log out</a>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        var username = '<?php echo $username ?>';
        var password = '<?php echo $password ?>';        
        if(username != '' && password !='')
        {
            $.ajax({
                type: "POST",
                url: '<?php echo constant('URL')?>home/getUser',
                data: {username:username},
                success: function(data)
                {                                        
                    var arr = JSON.parse(data);                    
                    document.getElementById("username").innerHTML = arr.data[0].name;
                    $("#hidden-username").even().removeClass( "d-none" );
                    $("#hidden-logout").even().removeClass( "d-none" );
                    document.getElementById("hidden-login").style.display = "none";                        
                }
            });
        }        
    })
</script>