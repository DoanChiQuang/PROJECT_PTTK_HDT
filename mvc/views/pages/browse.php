<style>
.cardcategory ol {
    margin: 5px 30px;
    counter-reset: item
}
.cardcategory li {
  display: block;
}
.cardcategory li:before {
  content: counters(item, ".") " ";
  counter-increment:item;
}

.cardcategory ol li::before {
    margin-right: 0.5rem;
    background: #ff6f00;
    color: white;
    min-width:1.2em;
    height: 1.2em;
    border-radius:10%;
    display: inline-grid;
    place-items: center;
    line-height: 1.2em;
}
.cardcategory ol ol li::before {
    background: darkorchid;
}
.cardcategory ol ol ol li::before {
    background:blue ;
}
.cardcategory ol ol ol ol li::before {
    background:green ;
}
    

</style>
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <div class="input-group">
                            <input type="text" class="form-control searchtxt" value=""
                                placeholder="Search this blog">
                            <div class="input-group-append">
                                <button class="btn btn-primary searchbtn" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <!--Category-->
                            <div class="card">
                                <div class="card-heading">
                                    <h4 data-toggle="collapse" data-target="#collapseOne">Categories</h4>
                                </div>

                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">                                    
                                    <div class="card-body">
                                
                                            <button type="button" onclick="" href="#" class="btn btn-success btn-sm mr-1"
                                            role="button" data-toggle="modal" data-target="#CategoryModal">Show more</button>
                                         
                                    </div>
                                </div>
                            </div>
                            <!--Price-->
                            <div class="card">
                                <div class="card-heading">
                                    <h4 data-toggle="collapse" data-target="#collapseTwo">Price</h4>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="pricebody">
                                        <div class="middle">
                                            <div class="amount">
                                                <input type="text" class="inputvalue-min" id="minprice" value="0đ">
                                                <input type="text" class="inputvalue-max" id="maxprice" value="50000000đ">
                                            </div>
                                            <div class="multi-range-slider">
                                                <input type="range" class="rangechange" id="input-left" min="0"
                                                    max="50000000" value="0">
                                                <input type="range" class="rangechange" id="input-right" min="0"
                                                    max="50000000" value="50000000">

                                                <div class="slider">
                                                    <div class="track"></div>
                                                    <div class="range"></div>
                                                    <div class="thumb left"></div>
                                                    <div class="thumb right"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                        
                            <!--publisher-->
                            <div class="card">
                                <div class="card-heading">
                                    <h4 data-toggle="collapse" data-target="#collapseFive">Brand</h4>
                                </div>
                                <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                    <!-- <form class="formchange" data-name="publisher">
                                        <input type="checkbox" name="publisher" value="14" >
                                        <label>Quang</label>
                                        <input type="checkbox" name="publisher" value="22" >
                                        <label>Quắng</label>                                                                                
                                    </form> -->
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <form class="formchange" data-name="brand">
                                                <ul class="nice-scroll cardbrand" id="checkboxes">
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <!--sale-->
                            <div class="card">
                                <div class="card-heading">
                                    <h4 data-toggle="collapse" data-target="#collapseSeven">Sale</h4>
                                </div>
                                <div id="collapseSeven" class="collapse show" data-parent="#accordionExample">
                                    <!-- <form class="formchange" data-name="sale">
                                        <input type="checkbox" name="sale" value="discount20">
                                        <label>Sale 20%</label>
                                        <input type="checkbox" name="sale" value="discount50">
                                        <label>Sale 50%</label>                                                                                
                                    </form> -->
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <form class="formchange" data-name="sale">
                                                <ul class="nice-scroll cardsale" id="checkboxes">
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle class="circle" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30">
                    </circle>
                </svg>
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p id="amountproducts"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort:</p>
                                <select id="selectSort">
                                    <option value="nameASC">Low To High By Name</option>
                                    <option value="nameDESC">High To Low By Name</option>
                                    <option value="priceASC">Low To High By Price</option>
                                    <option value="priceDESC">High To Low By Price</option>
                                    <option value="bestSeller">Best Seller</option>
                                    <!-- <option value="hot">Hot</option> -->
                                    <option value="newRelease">New Release</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row cardproduct">
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <button type="button" class="btn btn-primary loadmore">Load More</button>
                        </div>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal" id="CategoryModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Category</h3>
                </div>
                <form class="formcategory" data-name="category">
                    <div class="card-body cardcategory" id="checkboxes">

                    </div>
                    <div class="card-footer">
                        <button id='addbtn' name="submit" type="button" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
            

        </div>
    </div>
</div>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const cardproduct = document.querySelector('.cardproduct');
    const cardcategory = document.querySelector('.cardcategory');    
    const cardbrand = document.querySelector('.cardbrand');
    const cardsale = document.querySelector('.cardsale');    
    const spinner = document.querySelector('.spinner');

    let URL_API_PRODUCT = '<?php echo constant('URL')?>product/getAllStatus';
    let URL_API_CATEGORY = '<?php echo constant('URL')?>category/getbuildTree';
    let URL_API_CATEGORY_PRODUCT = '<?php echo constant('URL')?>category/getCategoryProductAll';    
    let URL_API_BRAND = '<?php echo constant('URL')?>publisher/getall';
    let URL_API_SALE = '<?php echo constant('URL')?>sale/getSaleByType/0';    
    const paramsString = window.location;
    let searchParams = new URLSearchParams(paramsString.search);
    // for (let p of searchParams) {
    //     console.log(p);
    // }
    var searchURL = paramsString.search;

    var arrayproducts;
    var arraycategory_product;
    var filterarr = {};
    var pagenum = 12;

    async function loadpage(arr, pagenum) {
        return new Promise(resolve => {
            setTimeout(function () {
                var arrayload = {};
                var i = 0;
                var arraypage = [];
                //console.log(arr.data);
                arr.data.forEach(element => {
                    if (i < pagenum) {
                        arraypage[i++] = element;                
                    }
                });
                arrayload.data = arraypage;
                cardproduct.innerHTML = '';
                //console.log(arrayload);
                cardProduct(arrayload);
                showresults();
                resolve('resolved');
            },1000);
        });
    }
    function buildCategoryTree(arr) {
        var categories = arr;
        var htmlchild = "";
        const html = categories.map(category => {
            if (category.children) {
                htmlchild = buildCategoryTree(category.children);
                //htmlchild.join('');
            } else {
                htmlchild = "";
            }
            return `
                        <li>
                            <input class="listCheckbox" type="checkbox" name="${category.id}" id="${category.id}">
                            <label class="whatever" for="${category.id}">${category.name}</label>` 
                                +htmlchild +
                                `
                        </li>
                    `;
        }).join('');
        htmlchild = "";
        return `<ol>`+html+`</ol>`;
    }

    function cardCategory(arr) {
        const html = buildCategoryTree(arr);
        //console.log(html);
        cardcategory.innerHTML = html;
    }    

    function cardBrand(arr) {
        var publishers = arr.data;
        const html = publishers.map(publisher => {
            return ` 
                        <li><input type="checkbox" name="publisher" value="${publisher.id}" id="publisher_${publisher.id}" /><label class="whatever" for="publisher_${publisher.id}">${publisher.name}</label></li>                                                    
                        `;
        }).join('');
        cardbrand.innerHTML += html;
    }

    function cardSale(arr) {
        var sales = arr.data;
        const html = sales.map(sale => {
            return ` 
                        <li><input type="checkbox" name="sale" value="${sale.id}" id="sale_${sale.id}" /><label class="whatever" for="sale_${sale.id}">${sale.name}</label></li>                                                    
                        `;
        }).join('');
        cardsale.innerHTML += html;
    }    

    function cardProduct(arr) {
        var products = arr.data;
        const html = products.map(product => {
            //let title = movie.title || movie.name;
            //let isMovieOrTv = (movie.title) ? 'movie' : 'tv';                                    
            var saleStartDate = product.saleID.startdate;
            var saleEndDate = product.saleID.enddate;
            var startDateSale = new Date(saleStartDate);
            var endDateSale = new Date(saleEndDate);
            var currentDate = new Date();
            // console.log(endDateSale.getTime());
            // console.log(currentDate.getTime());
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
                salehtml = `<div class="ribbon-wrapper ribbon">
                                <div class="ribbon bg-danger text">
                                    Sale ${product.saleID.discount}%
                                </div>
                            </div>`;
                pricehtml = `<div class="price">
                                <s>${price}đ</s>${priceSale}đ
                            </div>`;
                } else {
                    var price = parseInt(product.price).format();
                    salehtml = ``;
                    pricehtml = `<div class="price">
                                    ${price}đ
                                </div>`;
                }
            }
            else
            {
                var price = parseInt(product.price).format();
                salehtml = `<div class="ribbon-wrapper ribbon">
                                <div class="ribbon bg-danger text">
                                    Hết Hàng
                                </div>
                            </div>`;
                pricehtml = `<div class="price">
                                ${price}đ
                            </div>`;
            }
            
            if (product.status != 0) {
                return `                
                    <figure class="snip1396">
                        <img src="<?php echo constant('URL')?>/public/assets/images/${product.image}"
                            alt="pr-sample13" />` +
                    salehtml +
                    `<figcaption>
                            <h7>${product.name}</h7>
                        </figcaption>` +
                    pricehtml +
                    `<a class="add-to-cart" data_id="${product.id}">
                            Add to Cart<i class="ion-android-checkbox-outline"></i></a>
                    </figure> 
                `;
            }
        }).join('');
        cardproduct.innerHTML += html;
    }    
    function showresults() {
        var results = document.getElementById("amountproducts");
        if(pagenum >= Object.keys(arrayproducts.data).length)
        {
            results.innerHTML = 'Showing 1-'+ Object.keys(arrayproducts.data).length +' of ' + Object.keys(arrayproducts.data).length + ' results'; 
            document.querySelector('.loadmore').style.display ="none";
        }
        else
        {
            results.innerHTML = 'Showing 1-'+ pagenum +' of ' + Object.keys(arrayproducts.data).length + ' results';
        }
    }
    function unique(arr) {
        var newArr = []
        for (var i = 0; i < arr.length; i++) {
            if (!newArr.includes(arr[i])) {
            newArr.push(arr[i])
            }
        }
        return newArr
    }    
    async function changeURL() {
        //var sort = '', category = '', price = '', language = '', esrb = '', publisher = '', sale = '';
        if (searchParams.has('sort')) {
            var sort = '&sort=' + searchParams.get('sort');
        } else {
            var sort = '';
        }
        if (searchParams.has('category')) {
            var category = '&category=' + searchParams.get('category');
        } else {
            var category = '';
        }
        if (searchParams.has('price')) {
            var price = '&price=' + searchParams.get('price');
        } else {
            var price = '';
        }                
        if (searchParams.has('brand')) {
            var brand = '&brand=' + searchParams.get('brand');
        } else {
            var brand = '';
        }
        if (searchParams.has('sale')) {
            var sale = '&sale=' + searchParams.get('sale');
        } else {
            var sale = '';
        }
        if (searchParams.has('search')) {
            var search = '&search=' + searchParams.get('search');
        } else {
            var search = '';
        }
        searchURL = sort + category + price + brand + sale + search;
        //console.log(searchURL);            
        history.replaceState(paramsString.href, '', paramsString.origin + paramsString.pathname + '?' + searchURL);
        
        filter();
    }
    async function filter() {
        spinner.style.display = "block";        
        arrayfilter = arrayproducts;
        if (searchURL !== '') {
            //cardproduct.innerHTML = '';
            if (searchParams.has('sort')) {

                arrayfilter = await sortarr(searchParams.get('sort'), arrayfilter);
            }
            if (searchParams.has('category')) {
                // console.log(searchParams.get('category'));
                arrayfilter = await categoryfilter(searchParams.get('category'), arrayfilter);                
            }
            if (searchParams.has('price')) {
                //console.log(searchParams.get('sort'));                        
                arrayfilter = await pricefilter(searchParams.get('price'), arrayfilter);
            }                        
            if (searchParams.has('brand')) {
                //console.log(searchParams.get('language'));
                arrayfilter = await brandfilter(searchParams.get('brand'), arrayfilter);
            }            
            if (searchParams.has('sale')) {
                //console.log(searchParams.get('language'));
                arrayfilter = await salefilter(searchParams.get('sale'), arrayfilter);
            }
            if (searchParams.has('search')) {
                //console.log(searchParams.get('language'));
                arrayfilter = await searchfilter(searchParams.get('search'), arrayfilter);
            }            
            await loadpage(arrayfilter, pagenum);
            //cardproduct.innerHTML = '';
            //cardProduct(arrayfilter);                         
        }
        else
        {
            await loadpage(arrayfilter, pagenum);   
        }        
        spinner.style.display = "none";
    }
    async function sortarr(by, arrayproducts) {
        return new Promise(resolve => {
            setTimeout(function () {
                var selected = by;
                var products = arrayproducts.data;                
                if (selected === "nameASC") {
                    products.sort(function (a, b) {
                        return a.name.localeCompare(b.name);
                    });

                } else if (selected === "nameDESC") {
                    products.sort(function (a, b) {
                        return b.name.localeCompare(a.name);
                    });
                } else if (selected === "priceASC") {
                    products.sort(function (a, b) {
                        return (a.price - ((a.price * a.saleID.discount) / 100)) - (b.price - ((b.price * b.saleID.discount) / 100));
                    });
                } else if (selected === "priceDESC") {
                    products.sort(function (a, b) {
                        return (b.price - ((b.price * b.saleID.discount) / 100)) - (a.price - ((a.price * a.saleID.discount) / 100));
                    });
                } else if (selected === "bestSeller") {
                    products.sort(function (a, b) {
                        return b.sold - a.sold;
                    });                    
                } else if (selected === "hot") {
                    // chưa xong
                } else {
                    products.sort(function (a, b) {                        
                        return new Date(b.publishdate) - new Date(a.publishdate);
                    });
                }
                filterarr.data = products;
                resolve(filterarr);
            });
        });

    }
    async function categoryfilter(selected, arrayproducts) {
        return new Promise(resolve => {
            setTimeout(function () {
                var arr = selected.split('_');                
                var array = [];
                var arrayout = [];
                var i = 0;
                console.log(arraycategory_product);                                                
                arraycategory_product.data.forEach(element => {
                    //console.log(element.categoryID);
                    arr.forEach(key => {                        
                        if (element.categoryID === key) {                            
                            array[i++] = element.productID;                            
                        }
                    });                    
                });                
                var array = unique(array);                
                arrayproducts.data.forEach(element => {                    
                    array.forEach(key => {                        
                        if (element.id === key) {
                            arrayout[i++] = element;
                        }
                    });
                });
                console.log(arrayout);                                              
                filterarr.data = arrayout;
                resolve(filterarr);
            });
        });
    }
    async function pricefilter(value, arrayproducts) {
        return new Promise(resolve => {
            setTimeout(function () {
                var arrprice = value.split(',');
                let min = arrprice[0].replace(/[^0-9]/g, '');
                let max = arrprice[1].replace(/[^0-9]/g, '');
                var array = [];
                var i = 0;
                arrayproducts.data.forEach(element => {
                    var saleStartDate = element.saleID.startdate;
                    var saleEndDate = element.saleID.enddate;
                    var startDateSale = new Date(saleStartDate);
                    var endDateSale = new Date(saleEndDate);
                    var currentDate = new Date();
                    var saleprice;
                    if (currentDate.getTime() >= startDateSale.getTime() && currentDate.getTime() <= endDateSale.getTime()) {
                        saleprice = element.price - ((element.price * element.saleID.discount) / 100);
                    } else {
                        saleprice = element.price;
                    }
                    if (saleprice >= parseInt(min) && saleprice <= parseInt(max)) {
                        array[i++] = element;
                    }
                })
                filterarr.data = array;
                resolve(filterarr);
            });
        });
    }        
    async function brandfilter(selected, arrayproducts) {
        return new Promise(resolve => {
            setTimeout(function () {
                var arr = selected.split('_');
                var array = [];
                var i = 0;
                arrayproducts.data.forEach(element => {
                    arr.forEach(key => {
                        if (element.publisherID.id === key) {
                            array[i++] = element;
                        }
                    });
                })
                //console.log(array);                              
                filterarr.data = array;
                resolve(filterarr);
            });
        });
    }    
    async function salefilter(selected, arrayproducts) {
        return new Promise(resolve => {
            setTimeout(function () {
                var arr = selected.split('_');
                var array = [];
                var i = 0;
                arrayproducts.data.forEach(element => {
                    arr.forEach(key => {
                        if (element.saleID.id === key) {
                            array[i++] = element;
                        }
                    });
                })
                //console.log(array);                              
                filterarr.data = array;
                resolve(filterarr);
            });
        });
    }
    async function searchfilter(value, arrayproducts) {
        return new Promise(resolve => {
            setTimeout(function () {                
                var array = [];
                var i = 0;
                arrayproducts.data.forEach(element => {                                        
                    if (element.name.includes(value)) {
                        array[i++] = element;
                    }                    
                })
                console.log(array);                              
                filterarr.data = array;
                resolve(filterarr);
            });
        });
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
        const brand = await fetchProduct(URL_API_BRAND);
        const sale = await fetchProduct(URL_API_SALE);
        const category = await fetchProduct(URL_API_CATEGORY);        
        const category_product = await fetchProduct(URL_API_CATEGORY_PRODUCT);
        arrayproducts = products;
        arraycategory_product = category_product;
        cardCategory(category);        
        cardBrand(brand);        
        cardSale(sale);
        await loadpage(products, pagenum);
        showresults();
        await filter();
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
        $(document).on('change', '#selectSort', function (e) {
            var selected = $(e.target).val();
            if (searchParams.has('sort') || !searchParams.has('sort')) {
                searchParams.set('sort', selected);
                spinner.removeAttribute("hidden");
                changeURL();
            }
        });
        $(document).on('change', '#selectLanguage', function (e) {
            var selected = $(e.target).val();
            if (searchParams.has('language') || !searchParams.has('language')) {
                searchParams.set('language', selected);
                changeURL();
            }
        });
        $(document).on('mouseup', '.rangechange', function () {
            var inputmin = document.getElementById("input-left").value;
            var inputmax = document.getElementById("input-right").value;
            if (searchParams.has('price') || !searchParams.has('price')) {
                searchParams.set('price', inputmin + ',' + inputmax);
                changeURL();
            }
        });
        $(document).on('change', '.formchange', function (e) {
            var arr = $(this).serializeArray();
            var value;
            var name = $(this).attr("data-name");
            //console.log(arr);
            if (arr != '') {
                arr.forEach(element => {
                    value += '_' + element.value;                    
                });
                if (searchParams.has(name) || !searchParams.has(name)) {
                    searchParams.set(name, value.replace('undefined_', ''));
                    changeURL();
                }
            } else {
                searchParams.delete(name);
                changeURL();
            }
        });
        $(document).on('click','.loadmore', function(e){
            pagenum += 12;//console.log(pagenum)
            if(searchURL !== '')
            {
                filter();
            }            
            else
            {
                (async () => {
                    spinner.style.display = "block";
                    await loadpage(arrayproducts,pagenum);       
                    spinner.style.display = "none";
                })();
            }             
        });
        $(document).on('click','#addbtn', function () {
            var selected = $(".formcategory").serializeArray();            
            var value = '';
            var name = $(".formcategory").attr("data-name");                        
            if(selected != '') {
                selected.forEach(element => {
                    value += '_' + element.name;                
                });
                if (searchParams.has(name) || !searchParams.has(name)) {
                    searchParams.set(name, value.replace('_', ''));
                    changeURL();
                }                        
            }
            else
            {                
                searchParams.delete(name);
                changeURL();
            }                                       
        });        
        // $(window).scroll(function () {
        //     if ($(window).scrollTop() > $(".shop").outerHeight() - $(window).height()) {
        //         pagenum += 3;//console.log(pagenum)
        //         if(searchURL !== '')
        //         {
                    
        //             filter();
        //         }            
        //         else
        //         {
        //             (async () => {
        //                 spinner.style.display = "block";
        //                 await loadpage(arrayproducts,pagenum);       
        //                 spinner.style.display = "none";
        //             })();
                             
        //         }                    
        //     }
        // });
        $(document).on('change', '.listCheckbox', function (e) {
            var checked = $(this).prop("checked"),
            container = $(this).parent(),
            siblings = container.siblings();            
            container.find('.listCheckbox').prop({
                indeterminate: false,
                checked: checked
            });            

            function checkSiblings(el) {

                var parent = el.parent().parent(),
                    all = true;            
                el.siblings().each(function() {
                let returnValue = all = ($(this).children('.listCheckbox').prop("") === checked);            
                return returnValue;
                });
                
                if (all && checked) {

                parent.children('.listCheckbox').prop({
                    indeterminate: false
                    //checked: checked
                });

                checkSiblings(parent);

                } else {

                el.parents("li").children('.listCheckbox').prop({
                    indeterminate: true,
                    checked: false
                });

                }

            }

            checkSiblings(container);  

        });
        $(document).on('click', '.searchbtn', function (e) {
            var search = $('.searchtxt').val();
            if (searchParams.has('search') || !searchParams.has('search')) {
                searchParams.set('search', search);
                changeURL();
            }                        
        })
    });
</script>
<script>
    var inputLeft = document.getElementById("input-left");
    var inputRight = document.getElementById("input-right");

    var inputmin = document.getElementById("minprice");
    var inputmax = document.getElementById("maxprice");

    var thumbLeft = document.querySelector(".slider > .thumb.left");
    var thumbRight = document.querySelector(".slider > .thumb.right");
    var range = document.querySelector(".slider > .range");

    function setLeftValue() {
        var _this = inputLeft,
            min = parseInt(_this.min),
            max = parseInt(_this.max);

        _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

        var percent = ((_this.value - min) / (max - min)) * 100;

        thumbLeft.style.left = percent + "%";
        range.style.left = percent + "%";
    }
    setLeftValue();

    function setRightValue() {
        var _this = inputRight,
            min = parseInt(_this.min),
            max = parseInt(_this.max);

        _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

        var percent = ((_this.value - min) / (max - min)) * 100;

        thumbRight.style.right = (100 - percent) + "%";
        range.style.right = (100 - percent) + "%";
    }
    setRightValue();

    inputLeft.addEventListener("input", setLeftValue);
    inputRight.addEventListener("input", setRightValue);

    inputLeft.addEventListener("mouseover", function () {
        thumbLeft.classList.add("hover");
    });
    inputLeft.addEventListener("mouseout", function () {
        thumbLeft.classList.remove("hover");
    });
    inputLeft.addEventListener("mousedown", function () {
        thumbLeft.classList.add("active");
    });
    inputLeft.addEventListener("mouseup", function () {
        thumbLeft.classList.remove("active");
    });

    inputRight.addEventListener("mouseover", function () {
        thumbRight.classList.add("hover");
    });
    inputRight.addEventListener("mouseout", function () {
        thumbRight.classList.remove("hover");
    });
    inputRight.addEventListener("mousedown", function () {
        thumbRight.classList.add("active");
    });
    inputRight.addEventListener("mouseup", function () {
        thumbRight.classList.remove("active");
    });

    inputLeft.oninput = function () {
        inputmin.value = this.value + "đ";
    }
    inputRight.oninput = function () {
        inputmax.value = this.value + "đ";
    }
</script>