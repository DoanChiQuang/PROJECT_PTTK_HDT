<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <h1 class="h1-large">50% Discount Phone<span class="replace-me">small, young,
                            boots</span></h1>
                    <p class="p-large"></p>
                    <a class="btn-solid-lg" href="sign-up.html">Buy now</a>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <div class="image-container">
                    <img class="img-fluid" src="<?php echo constant('URL') ?>public/assets2/images/img-1.png"
                        alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of header -->

<!--Spinner-->
<svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
    <circle class="circle" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
</svg>
<!--Best Seller-->
<div class="moviewpb-section">
    <div class="container-fluid">
        <h1>Best Seller</h1>
    </div>
    <div class="owl-carousel owl-theme cardbestseller" id="">
    </div>
</div>

<div class="moviewpb-section">
    <div class="container-fluid">
        <h1>Sale</h1>
    </div>
    <div class="owl-carousel owl-theme cardsale" id="">
    </div>
</div>

<div class="moviewpb-section">
    <div class="container-fluid">
        <h1>New Release</h1>
    </div>
    <div class="owl-carousel owl-theme cardnewrelease" id="">
    </div>
</div>

<!-- <div class="moviewpb-section">
    <div class="container-fluid">
        <h1>Hot</h1>
    </div>
    <div class="owl-carousel owl-theme cardhot" id="">
    </div>
</div> -->

<div class="moviewpb-section">
    <div class="container-fluid">
        <h1>Category</h1>
    </div>
    <div class="owl-carousel owl-theme cardcategory" id="">
    </div>
</div>

<!-- <div class="moviewpb-section">
    <div class="container-fluid">
        <h1>Author</h1>
    </div>
    <div class="owl-carousel owl-theme cardauthor" id="">
    </div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="ribbon-wrapper ribbon quickview_ribbon">            
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body quickview_content">                
            </div>
            <div class="modal-footer quickview_footer">                
            </div>
        </div>
    </div>

</div>

<script>
    const cardbestseller = document.querySelector('.cardbestseller');
    const cardsale = document.querySelector('.cardsale');
    const cardnewrelease = document.querySelector('.cardnewrelease');
    const cardcategory = document.querySelector('.cardcategory');
    const cardauthor = document.querySelector('.cardauthor');
    const quickview = document.querySelector('.exampleModal');

    const spinner = document.querySelector('.spinner');
    
    function slider() {
        $('.owl-carousel').owlCarousel({
            loop: false,
            stagePadding: 20,
            margin: 20,
            nav: true,
            navText: ['<span class="icon left">‹</span>', '<span class="icon right">›</span>'],
            responsive: {
                0: {
                    items: 1
                },
                500: {
                    items: 2
                },
                640: {
                    items: 3
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 5
                }
            }
        })
    }

    let URL_API_PRODUCT = '<?php echo constant('URL')?>product/getAllStatus';
    let URL_API_CATEGORY = '<?php echo constant('URL')?>category/getall';    
    let URL_API_CATEGORYTREE = '<?php echo constant('URL')?>category/getbuildTree';
    let URL_API_AUTHOR = '<?php echo constant('URL')?>author/getall';
    var arrayproducts;
    var arraycategory;
    function cardBestSeller(arr) {
        var products = arr.data;
        products.sort(function (a, b) {
            return b.sold - a.sold;
        });
        const html = products.map(product => {
            //let title = movie.title || movie.name;
            //let isMovieOrTv = (movie.title) ? 'movie' : 'tv';
            var saleStartDate = product.saleID.startdate;
            var saleEndDate = product.saleID.enddate;
            var startDateSale = new Date(saleStartDate);
            var endDateSale = new Date(saleEndDate);
            var currentDate = new Date();
            Number.prototype.format = function (n, x) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
            };
            var salehtml, pricehtml;
            if(product.quantity != 0)
            {
                if (currentDate.getTime() >= startDateSale.getTime() && currentDate.getTime() <= endDateSale.getTime()) {
                    var priceSale = parseInt(product.price - (product.price * (product.saleID.discount / 100))).format();
                    var price = parseInt(product.price).format();
                    salehtml = `
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-danger text-xl">
                                    Sale ${product.saleID.discount}%
                                </div>
                            </div>`;
                    pricehtml = `<span class="product-price">
                                    <b><s>${price}đ</s> ${priceSale}đ</b>
                                </span>`;    
                }
                else
                {
                    var price = parseInt(product.price).format();
                    salehtml = ``;
                    pricehtml = `<span class="product-price">
                                    <b>${price}đ</b>
                                </span>`;
                }
            }
            else
            {
                var price = parseInt(product.price).format();
                salehtml = `
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Hết Hàng
                            </div>
                        </div>`
                pricehtml = `<span class="product-price">
                                <b>${price}đ</b>
                            </span>`;                
            }
            return `
                    <div class="item moviewrap">
                        `+ salehtml + 
                        `<div class="genrecard card1">
                            <div class="wrapper">
                                <img src="<?php echo constant('URL')?>public/assets/images/${product.image}" data-toggle="modal" data-target="#exampleModal" data-id="${product.id}" class="img-responsive wp-post-image jetpack-lazy-image--handled quickviewclick" alt="Frozen II">
                                <div class="data">
                                    <div class="content">
                                        <div class="cardheader"> 
                                            <span class="headertitle">
                                                <h1 class="title"><a href="<?php echo constant('URL') ?>detail/product/${product.id}">${product.name}</a></h1>
                                            </span> 
                                            <span class="genre">
                                                
                                            </span> 
                                        </div>
                                                       
                                        <div class="moviefooter">
                                            
                                            `+ pricehtml +`
                                            
                                            <a class="btn-solid-sm add-to-cart" data_id="${product.id}" href="sign-up.html">Add to cart</a>               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
        }).join('');
        cardbestseller.innerHTML += html;

    }

    function cardNewRelease(arr) {
        var products = arr.data;
        products.sort(function (a, b) {                        
            return new Date(b.publishdate) - new Date(a.publishdate);
        });
        const html = products.map(product => {
            //let title = movie.title || movie.name;
            //let isMovieOrTv = (movie.title) ? 'movie' : 'tv';
            var saleStartDate = product.saleID.startdate;
            var saleEndDate = product.saleID.enddate;
            var startDateSale = new Date(saleStartDate);
            var endDateSale = new Date(saleEndDate);
            var currentDate = new Date();
            Number.prototype.format = function (n, x) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
            };
            var salehtml, pricehtml;
            if(product.quantity != 0)
            {
                if (currentDate.getTime() >= startDateSale.getTime() && currentDate.getTime() <= endDateSale.getTime()) {
                    var priceSale = parseInt(product.price - (product.price * (product.saleID.discount / 100))).format();
                    var price = parseInt(product.price).format();
                    salehtml = `
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-danger text-xl">
                                    Sale ${product.saleID.discount}%
                                </div>
                            </div>`;
                    pricehtml = `<span class="product-price">
                                    <b><s>${price}đ</s> ${priceSale}đ</b>
                                </span>`;    
                }
                else
                {
                    var price = parseInt(product.price).format();
                    salehtml = ``;
                    pricehtml = `<span class="product-price">
                                    <b>${price}đ</b>
                                </span>`;
                }
            }
            else
            {
                var price = parseInt(product.price).format();
                salehtml = `
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Hết Hàng
                            </div>
                        </div>`
                pricehtml = `<span class="product-price">
                                <b>${price}đ</b>
                            </span>`;                
            }
            return `
                    <div class="item moviewrap">
                        `+ salehtml + 
                        `<div class="genrecard card1">
                            <div class="wrapper">
                                <img src="<?php echo constant('URL')?>public/assets/images/${product.image}" data-toggle="modal" data-target="#exampleModal" data-id="${product.id}" class="img-responsive wp-post-image jetpack-lazy-image--handled quickviewclick" alt="Frozen II">
                                <div class="data">
                                    <div class="content">
                                        <div class="cardheader"> 
                                            <span class="headertitle">
                                                <h1 class="title"><a href="<?php echo constant('URL') ?>detail/product/${product.id}">${product.name}</a></h1>
                                            </span> 
                                            <span class="genre">
                                                
                                            </span> 
                                        </div>
                                                       
                                        <div class="moviefooter">
                                            
                                            `+ pricehtml +`
                                            
                                            <a class="btn-solid-sm add-to-cart" data_id="${product.id}" href="sign-up.html">Add to cart</a>               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
        }).join('');
        cardnewrelease.innerHTML += html;

    }

    function cardSale(arr) {
        var products = arr.data;
        products.sort(function (a, b) {
            return b.saleID.discount - a.saleID.discount;
        });
        const html = products.map(product => {
            //let title = movie.title || movie.name;
            //let isMovieOrTv = (movie.title) ? 'movie' : 'tv';
            var saleStartDate = product.saleID.startdate;
            var saleEndDate = product.saleID.enddate;
            var startDateSale = new Date(saleStartDate);
            var endDateSale = new Date(saleEndDate);
            var currentDate = new Date();
            Number.prototype.format = function (n, x) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
            };
            var salehtml, pricehtml;            
                if (currentDate.getTime() >= startDateSale.getTime() && currentDate.getTime() <= endDateSale.getTime()) {
                    var priceSale = parseInt(product.price - (product.price * (product.saleID.discount / 100))).format();
                    var price = parseInt(product.price).format();
                    salehtml = `
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-danger text-xl">
                                    Sale ${product.saleID.discount}%
                                </div>
                            </div>`;
                    pricehtml = `<span class="product-price">
                                    <b><s>${price}đ</s> ${priceSale}đ</b>
                                </span>`;    
                }
                else
                {
                    var price = parseInt(product.price).format();
                    salehtml = ``;
                    pricehtml = `<span class="product-price">
                                    <b>${price}đ</b>
                                </span>`;
                }
            // }
            // else
            // {
            //     var price = parseInt(product.price).format();
            //     salehtml = `
            //             <div class="ribbon-wrapper ribbon-xl">
            //                 <div class="ribbon bg-danger text-xl">
            //                     Hết Hàng
            //                 </div>
            //             </div>`
            //     pricehtml = `<span class="product-price">
            //                     <b>${price}đ</b>
            //                 </span>`;                
            // }
            if(product.quantity != 0)
            {
                if (currentDate.getTime() >= startDateSale.getTime() && currentDate.getTime() <= endDateSale.getTime()) {
                    return `
                        <div class="item moviewrap">
                            `+ salehtml + 
                            `<div class="genrecard card1">
                                <div class="wrapper">
                                    <img src="<?php echo constant('URL')?>public/assets/images/${product.image}" data-toggle="modal" data-target="#exampleModal" data-id="${product.id}" class="img-responsive wp-post-image jetpack-lazy-image--handled quickviewclick" alt="Frozen II">
                                    <div class="data">
                                        <div class="content">
                                            <div class="cardheader"> 
                                                <span class="headertitle">
                                                    <h1 class="title"><a href="<?php echo constant('URL') ?>detail/product/${product.id}">${product.name}</a></h1>
                                                </span> 
                                                <span class="genre">                                                    
                                                </span> 
                                            </div>
                                                        
                                            <div class="moviefooter">
                                                
                                                `+ pricehtml +`
                                                
                                                <a class="btn-solid-sm add-to-cart" data_id="${product.id}" href="sign-up.html">Add to cart</a>               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            }
        }).join('');
        cardsale.innerHTML += html;

    }        
    function cardCategory(arr) {        
        var categorys = arr.data;        
        const html = categorys.map(category => {
            //let title = movie.title || movie.name;
            //let isMovieOrTv = (movie.title) ? 'movie' : 'tv';
            return `                    
                    <div class="item moviewrap">
                        
                        <div class="genrecard card1">
                            <div class="wrapper-2">
                                <img src="<?php echo constant('URL')?>public/assets/images/${category.image}" class="img-responsive wp-post-image jetpack-lazy-image--handled" alt="Frozen II">
                                <div class="data">
                                    <div class="content">
                                        <div class="cardheader"> 
                                            <span class="headertitle">
                                                <h1 class="title"><a href="<?php echo constant('URL') ?>browse?&category=${category.id}">${category.name}</a></h1>
                                            </span> 
                                           
                                        </div>
                                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
        }).join('');
        cardcategory.innerHTML += html;

    }

    function cardAuthor(arr) {
        var authors = arr.data;
        const html = authors.map(author => {
            //let title = movie.title || movie.name;
            //let isMovieOrTv = (movie.title) ? 'movie' : 'tv';
            return `
                    
                    <div class="item moviewrap">
                        
                        <div class="genrecard card1">
                            <div class="wrapper-2">
                          
                                    <img src="<?php echo constant('URL')?>public/assets/images/${author.image}" class="img-responsive wp-post-image jetpack-lazy-image--handled" alt="Frozen II">
                            
                                
                                <div class="data">
                                    <div class="content">
                                        <div class="cardheader"> 
                                            <span class="headertitle">
                                                <h1 class="title"><a href="<?php echo constant('URL') ?>browse?&author=${author.id}">${author.name}</a></h1>
                                            </span> 
                                           
                                        </div>
                                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
        }).join('');
        cardauthor.innerHTML += html;

    }
    
    
    async function fetchProduct(urlEndpoint) {
        let data;
        try {
            const response = await fetch(urlEndpoint);
            data = await response.json();
            return (data);
        } catch (error) {
            console.log(error);
        }
        // return data.data;
        //return data.items || data.results;
    }
    
    (async () => {
        const products = await fetchProduct(URL_API_PRODUCT);
        const categories = await fetchProduct(URL_API_CATEGORY);
        const categoriestree = await fetchProduct(URL_API_CATEGORYTREE);        
        //const authors = await fetchProduct(URL_API_AUTHOR);        
        arrayproducts = products;
        arraycategory = categoriestree;        
        cardBestSeller(products);
        cardSale(products);
        cardNewRelease(products);
        cardCategory(categories);
        //cardAuthor(authors);
        slider();
        spinner.setAttribute("hidden","");
        
    })();
    $(function () {
        $(document).on('click', '.add-to-cart', function (e) {
            e.preventDefault();            
            id=$(e.target).attr('data_id');            
            $.ajax({
                type: "POST",
                url: '<?php echo constant('URL') ?>cartdetail/add',
                data:{
                    "productID" : id,
                    "quantity" : 1
                },
                success: function(data){
                    //console.log(data);
                    if(data==1){
                       sweetAlertCRUD(data, "Thêm vào giỏ hàng thành công"); 
                    }
                    else if(data==3){
                        sweetAlertCRUD(data,""); 
                    }
                    else{
                        sweetAlertCRUD(data, "Hết hàng"); 
                    }
                    
                }
            });
        })

        $(document).on('click', '.quickviewclick', function (e) {
            id=$(e.target).attr('data-id');
            var products = arrayproducts.data;            
            products.forEach(element => {                
                if(element.id === id)
                {
                    console.log(element);
                    var saleStartDate = element.saleID.startdate;
                    var saleEndDate = element.saleID.enddate;
                    var startDateSale = new Date(saleStartDate);
                    var endDateSale = new Date(saleEndDate);
                    var currentDate = new Date();
                    Number.prototype.format = function (n, x) {
                        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
                    };
                    if(element.quantity != 0)
                    {
                        if (currentDate.getTime() >= startDateSale.getTime() && currentDate.getTime() <= endDateSale.getTime()) {
                        var priceSale = parseInt(element.price - (element.price * (element.saleID.discount / 100))).format();
                        var price = parseInt(element.price).format();
                        salehtml = `<div class="ribbon bg-danger text">
                                          Sale ${element.saleID.discount}%
                                    </div>`;
                        pricehtml = `<span style="font-size:50px">${priceSale}đ</span><span
                                                                        style="text-decoration: line-through; vertical-align: top; color:gray;">${price}đ</span>`;                                                           
                        }
                        else
                        {
                            var price = parseInt(element.price).format();
                            salehtml = ``;
                            pricehtml = `<span style="font-size:50px">${price}đ</span>`;                
                        }
                    }
                    else
                    {
                        salehtml = `<div class="ribbon bg-danger text">
                                          Hết Hàng
                                    </div>`;
                        if (currentDate.getTime() >= startDateSale.getTime() && currentDate.getTime() <= endDateSale.getTime()) {
                            var priceSale = parseInt(element.price - (element.price * (element.saleID.discount / 100))).format();
                            var price = parseInt(element.price).format();                            
                            pricehtml = `<span style="font-size:50px">${priceSale}đ</span><span
                                                                            style="text-decoration: line-through; vertical-align: top; color:gray;">${price}đ</span>`;                                                           
                        }
                        else
                        {
                            var price = parseInt(element.price).format();                            
                            pricehtml = `<span style="font-size:50px">${price}đ</span>`;                
                        }
                    }                                                           
                    $('.quickview_ribbon').html(salehtml);
                    $('.quickview_content').html(`<div class="row">
                                                        <div class="col-lg-3">
                                                            <img src="<?php echo constant('URL') ?>public/assets/images/${element.image}" class="modelImg"
                                                                alt="Frozen II">
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="row">
                                                                <h2>${element.name}</h2>
                                                                <p> (Brand)</p>
                                                                <div>
                                                                    `+ pricehtml +`|
                                                                    <span>Quantity:</span><span> ${element.quantity}</span>
                                                                </div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="table-responsive-sm">

                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>                                                                        
                                                                        <th>Rated</th>
                                                                        <th>Brand</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>                                                                        
                                                                        <td>5 Star</td>
                                                                        <td>${element.publisherID.name}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>`);
                    $('.quickview_footer').html(`<a class="btn-solid-sm add-to-cart" data_id="${element.id}" href="sign-up.html">Add to cart</a>`);
                }
            });                
        })
    });
</script>