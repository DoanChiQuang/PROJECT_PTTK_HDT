<svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
    <circle class="circle" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
</svg>

<div class="displayproduct" style="min-height:600px">
</div>

<script>
    var pageURL = window.location.href;
    var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
    const spinner = document.querySelector('.spinner');
    const displayproduct = document.querySelector('.displayproduct');
    const cardComment = document.querySelector('.card-comments');

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
                    items: 5
                },
                1200: {
                    items: 6
                }
            }
        })
    }

    function display(arr) {
        return new Promise(resolve => { 
            setTimeout(function() {
                if(!arr){
                    displayproduct.innerHTML = "Không tồn tại sản phẩm";
                    //carttable.innerHTML = "Không có sản trong giỏ hàng"+"<a href='<?php echo constant('URL') ?>browse'>Continue Shopping</a>"
                    resolve('resolved');
                }
                var products = arr.data;
                var htmlsale;
                var currentdate = new Date();
                Number.prototype.format = function(n, x) {
                    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
                };   
                const html = products.map(product => {
                    var enddate = new Date(product.saleID.enddate);
                    var startdate = new Date(product.saleID.startdate);
                    var salePrice = parseInt(product.price) - parseInt(product.price*product.saleID.discount/100);
                    if(product.saleID.discount>0 && (startdate<=currentdate && currentdate<=enddate )){     
                        htmlsale = `
                            <div>
                                <span style="font-size:50px">${parseInt(salePrice).format()}đ</span>
                                <span style="text-decoration: line-through; vertical-align: top; color:gray;">${parseInt(product.price).format()}đ</span>
                                <span class="badge badge-danger">${'Sale '+product.saleID.discount+'%'}</span>
                            </div>
                        `
                    }
                    else{
                        htmlsale = `
                            <div>
                                <span style="font-size:50px">${parseInt(product.price).format()}đ</span>  
                            </div>
                        `
                    }
                    return `
                    <div class="container header">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo constant('URL')?>public/assets/images/${product.image}"
                                    class="custom-img img-responsive wp-post-image jetpack-lazy-image--handled" alt="Frozen II">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <h1>${product.name}</h1>
                                </div>
                                <div class="row">
                                    <div>
                                        `+htmlsale+`
                                    </div>
                                </div>
                                <div class="row w-50">
                                    <div class="input-group">
                                        <input id="quantity" type="number" min=1 value="1" class="form-control w-25">
                                        <div class="input-group-append">
                                            <a id="addtocart" class="btn-solid-sm" data_id="${product.id}">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="owl-carousel owl-theme" style="text-align: center;">                                
                                <div class="item">
                                    <div style="justify-content: center;">
                                        <h4>Publish Date</h4>
                                        <i class="fas fa-calendar-minus"></i>
                                        <p>${product.publishdate}</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div style="justify-content: center;">
                                        <h4>Rated</h4>
                                        <i class="fas fa-globe-americas"></i>
                                        <p>5 star</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div style="justify-content: center;">
                                        <h4>Publisher</h4>
                                        <i class="fas fa-user-tie"></i>
                                        <p>${product.publisherID.name}</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div style="justify-content: center;">
                                        <h4>Category</h4>
                                        <i class="fas fa-user-tie"></i>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <h1>Review</h1>
                                <a href="#review" class="btn btn-primary" data-toggle="collapse">View more</a>
                            </div>
                            <div class="collapse" id="review">
                                <div class="container">
                                    ${product.description}
                                </div>
                                
                            </div>

                        </div>
                        <div class="row">
                            <h1>Rating</h1>
                            <div class="row cardRating">
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <h1>Comment</h1>
                            <div class="comment">
                            <div class="col"> 
                                <div class="card card-widget"> 
                                    <div class="card-footer card-comments">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        `;
                }).join('');
                displayproduct.innerHTML += html;
                resolve('resolved');
            });
        });   
    }
    function displayComment(arr){
        return new Promise(resolve => { 
            setTimeout(function() {
                var cardComment = document.querySelector('.card-comments');
                var cardRating = document.querySelector('.cardRating');
                if(!arr){
                    cardComment.innerHTML = "Chưa có bình luận";
                    cardRating.innerHTML = "Chưa có đánh giá";
                    //carttable.innerHTML = "Không có sản trong giỏ hàng"+"<a href='<?php echo constant('URL') ?>browse'>Continue Shopping</a>"
                    resolve('resolved');
                }
                
                var ratings = arr.data;
                var star1 = 0;
                var star2 = 0;
                var star3 = 0;
                var star4 = 0;
                var star5 = 0;
                const html = ratings.map(rating => {
                    switch(parseInt(rating.rating)) {
                        case 1:
                            star1++;
                            break;
                        case 2:
                            star2++;
                            break;
                        case 3:
                            star3++;
                            break;
                        case 4:
                            star4++;
                            break;
                        case 5:
                            star5++;
                            break;
                    }
                    return `
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo constant('URL')?>public/assets/images/${rating.image}" alt="User Image" style="height:40px; width:40px!important;-webkit-border-radius: 100%;-moz-border-radius: 100%;object-fit: cover;overflow: hidden>
                                <div class="comment-text">
                                    <span class="username">
                                        ${rating.name}
                                            <span>
                                                <div class="Stars" style="--rating: ${rating.rating};" aria-label="Rating of this product is 2.3 out of 5."></div>
                                            </span>
                                            <span class="text-muted float-right">
                                                ${rating.date}
                                            </span>
                                    </span>
                                    ${rating.comment}
                                </div>
                        </div>
                        `;
                }).join('');
                cardComment.innerHTML += html;
                cardRating.innerHTML = `
                    <div class="Stars" style="--rating: 1; --star-size: 50px;" aria-label="Rating of this product is 2.3 out of 5.">${star1}</div>
                    <div class="Stars" style="--rating: 2; --star-size: 50px;" aria-label="Rating of this product is 2.3 out of 5.">${star2}</div>
                    <div class="Stars" style="--rating: 3; --star-size: 50px;" aria-label="Rating of this product is 2.3 out of 5.">${star3}</div>
                    <div class="Stars" style="--rating: 4; --star-size: 50px;" aria-label="Rating of this product is 2.3 out of 5.">${star4}</div>
                    <div class="Stars" style="--rating: 5; --star-size: 50px;" aria-label="Rating of this product is 2.3 out of 5.">${star5}</div>
                `;
                console.log(html)
                resolve('resolved');

            });
        });   
    }
    let URL_API_PRODUCT = '<?php echo constant('URL')?>product/getbyid/'+ lastURLSegment;
    let URL_API_RATING = '<?php echo constant('URL')?>rating/getByProduct/'+ lastURLSegment;
    async function fetchProduct(urlEndpoint) {
        let data;
        try {
            const response = await fetch(urlEndpoint);
            data = await response.json();
            return (data);
        } catch (error) {
            console.log(error);            
        }        
    }

    (async () => {
        const products = await fetchProduct(URL_API_PRODUCT);
        const ratings = await fetchProduct(URL_API_RATING);
        await display(products);
        await displayComment(ratings);
        spinner.setAttribute("hidden", "");
        slider();
    })();
</script>
<script src="<?php echo constant('URL') ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo constant('URL') ?>public/assets/js/main.js"></script>
<script>
    $(function () {
        $(document).on('click', '.btn-plus, .btn-minus', function (e) {
            const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
            const input = $(e.target).closest('.input-group').find('input');
            if (input.is('input')) {
                input[0][isNegative ? 'stepDown' : 'stepUp']()
            }
        })
    })

    $(function () {
        $(document).on('click', '#addtocart', function (e) {
            id=$(e.target).attr('data_id');
            $.ajax({
                type: "POST",
                url: '<?php echo constant('URL') ?>cartdetail/add',
                data:{
                    "productID" : id,
                    "quantity" : $("#quantity").val()
                },
                success: function(data){
                    console.log(data);
                    if(data==1){
                       sweetAlertCRUD(data, "Thêm vào giỏ hàng thành công"); 
                    }
                    else{
                        sweetAlertCRUD(data, "Hết hàng"); 
                    }
                    
                }
            });
        })
    })
</script>