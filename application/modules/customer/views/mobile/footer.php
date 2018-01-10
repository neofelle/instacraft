<!-- Forgot password popup starts here -->
<section class="popup_overlay forgot_password" data-pop="forgot-pop">
    <div class="popup">
        <div class="pop_head">
            <h2 class="pop_head_txt">Forgot Password</h2>
            <span class="icon-close"></span>
        </div>
        <div class="popup_body">
            <div class="body_txt ">
                <p>Please enter you registered email address you use to access your account.</p>
                <p>An Email will be sent to the provided address with a link to change your password.</p>	
            </div>
            <div class="popup_form clearfix">
                <?= form_open_multipart('cus-forgot-password', array('class' => 'clearfix ajaxform', 'id' => '')) ?>    
                <div class="alert alert-info wait-div " style="display:none;"> <strong>Please wait! </strong> Your action is in proccess... </div>
                <div id="jGrowl" class="top-right jGrowl col-md-12"  style="display: none;">
                    <button class="close" aria-hidden="true" data-dismiss="alert" style="padding:10px;" type="button">&times;</button>
                    <div class="jGrowl-notification ">
                        <div class="jGrowl-message ajax_message"></div>
                    </div>
                </div>
                <label>
                    <input type="text" class="gradient_border" name="email" placeholder="Email ID"> 
                </label>
                <button class="btn gradient">Done</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>


<!-- Add to Cart popup starts here -->
<section class="popup_overlay" data-pop="addtocart-pop">
    <div class="popup">
        <div class="pop_head">
            <h2 class="pop_head_txt">Add To Cart</h2>
            <span class="icon-close"></span>
        </div>
        <div class="popup_body">
            <div class="body_txt cart-sec clearfix">
                <!--                <div class="pro_img left">
                                    <img id="popup_product_image" src="" alt="product">
                                </div>-->
                <div class="product_info right">
                    <h3 id="popup_product_name"></h3>
                    <p id="popup_product_price" ></p>
                </div>
                <div class="clearfix"></div>
                <div class="popup_form clearfix">
                    <?= form_open_multipart('cus-add-tocart-products', array('class' => '', 'id' => '')) ?> 
                    <input type="hidden" name="item_id" id="popup_product_id">
                    <div class="quant-sec">
                        <h3 class="text">Quantity</h3>
                        <p><input type="number" style="" class="gradient_border" name="quantity" id="popup_product_quntity" value="1" min="1"> </p>
                    </div>


                    <button type="submit" class="btn gradient">Save</button>
                    <?= form_close() ?>
                </div>
            </div>

        </div>
    </div>
</section>	

<!-- delivery date time popup -->
<section class="popup_overlay" data-pop="deliveryDateTime-pop">
    <div class="popup">
        <div class="pop_head">
            <h2 class="pop_head_txt">Select scheduled delivery date &amp; time</h2>
            <span class="icon-close"></span>
        </div>
        <div class="popup_body">

            <div class="popup_form clearfix">
                <form>
                    <div class="splited_field clearfix">
                        <i class="icon-calendar"></i>
                        <input type="text" name=""> <span>/</span> <input type="text" name=""> <span>/</span> <input type="text" name="">
                    </div>

                    <div class="splited_field clearfix">
                        <i class="icon-clock"></i>
                        <input type="text" name=""> <span>/</span> <input type="text" name=""> <span>/</span> <input type="text" name="">
                    </div>

                    <button class="btn gradient">Done</button>
                </form>
           </div>
        </div>
    </div>
</section>

<!-- Splash container -->
<!--<section class="splash_container">
    <div class="splash_logo"><img src="<?= $this->config->item('customerassets') ?>images/splash_logo.png" alt="logo"></div>
</section>-->


</div>

</div>
</section>
<!-- Forgot password popup end here -->
<script>
    $(document).ready(function () {
        //$('.icon-cart').attr('cart-value',<?= $this->session->userdata('total_item') ?>); 
        var cart_val    =   '<?php echo $this->session->userdata('total_item'); php?>';
        if(cart_val > 0){
            $('.cart-badge').html('<span class="cart_valu">'+cart_val+'</span> ');
        }
    });
    $(window).on('load', function () {

        var cookie = ReadCookie('splash_shown');
        if (cookie == null)
        {
            window.location.href = 'cus-splash';
//            window.setInterval(function () {
//                $(".splash_container").fadeOut('slow');
//            }, 10000);
        }
    });

    function ReadCookie(name)
    {
        name += '=';
        var parts = document.cookie.split(/;\s*/);
        for (var i = 0; i < parts.length; i++)
        {
            var part = parts[i];
            if (part.indexOf(name) == 0)
                return part.substring(name.length)
        }
        return null;
    }

    $(document).on('click', '.social_share', function () {
        //var isLogin = '<?= $this->session->userdata('CUSTOMER-SL') ?>';
        window.location.href = 'cus-social-share';

    });
    $(document).on('click', '#login', function () {
        $(this).addClass('active');
        $('#register').removeClass('active');
        $('.login_section').show();
        $('.register_section').hide();
    });
    $(document).on('click', '#register', function () {
        $(this).addClass('active');
        $('#login').removeClass('active');
        $('.login_section').hide();
        $('.register_section').show();
    });
    //code to show/hide nav bar
    $('.back-screen.icon-menu').click(function () {
        $('nav').addClass('open');
    });
    $(document).on('click', function (e) {
        if (!$(e.target).is('nav , nav *, .back-screen.icon-menu , .back-screen.icon-menu *')) {
            $('nav').removeClass('open');
        }
    });
    $(document).on('click', function (e) {
        if (!$(e.target).is('nav , nav *, .back-screen.icon-menu , .back-screen.icon-menu *')) {
            $('nav').removeClass('open');
        }
    });


//    check for upcoming appointments
    window.setInterval(function () {
        checkForUpcomingAppointment();
    }, 60000);

    function checkForUpcomingAppointment() {
        checkUserLogin();
        var userId = '<?= $this->session->userdata('CUSTOMER-ID') ?>';
        $.ajax({
            type: 'POST',
            data: {userId: userId},
            url: siteurl + 'check-upcoming-appointment',
            dataType: "json",
            beforeSend: function () {
                //$('.wait-div').show();
            },
            success: function (data) {

                //$('.wait-div').hide();
                if (data != null) {
                    if (data.appointment_id != '') {
                        if (data.status == '0')
                            var status = 'Pending';
                        if (data.status == '1')
                            var status = 'Confirm';
                        if (data.status == '2')
                            var status = 'Rescheduled';
                        if (data.status == '3')
                            var status = 'Cancel';
                        $('#upcoming_appointment').show();
                        $('#appointment_time').text(data.appointment_time);
                        $('#appointment_date').text(data.appointment_date);
                        $('#status').text(status);
                        $('#make_video_call').attr('data-appointmentId', data.appointment_id);
                        $('#appointment_id_video').val(data.appointment_id);
                    } else {

                    }
                }
            }
        });

    }
    $(document).on('click', '#make_video_call', function () {
        var appointment_id = $('#make_video_call').attr('data-appointmentId');
        document.getElementById("form_for_video_call").submit();
    });

    $(document).on('click', '#add_to_cart', function () {
        checkUserLogin();
    });

    $(document).on('click', '#more_info', function () {
        checkUserLogin();
    });

    $(document).on('click', '#download_prescription', function () {
        checkUserLogin();
        var appointment_id = $(this).attr('data-value');
        $.ajax({
            type: 'POST',
            data: {appointment_id: appointment_id},
            url: siteurl + 'download-recommended-prescription',
            dataType: "json",
            beforeSend: function () {
                $('.wait-div').show();
            },
            success: function (data) {
                $('.wait-div').hide();
                // alert(data);
            }
        });

    });

    $(document).on('click', '.facebook_btn', function () {
        fbs_click(this);
    });
    $(document).on('click', '.insta_btn', function () {
        insta_click(this);
    });
    $(document).on('click', '.twitter_btn', function () {
        twt_click(this);
    });

    function fbs_click($this)
    {
        u = $($this).attr('data-url');
        t = $($this).attr('data-title');

        window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(t),
                'sharer',
                'toolbar=0,status=0,top=150,left=200,width=626,height=400');

        return false;
    }



    function insta_click($this)
    {
        u = $($this).attr('data-url');
        t = $($this).attr('data-title');

        window.open('http://www.instagram.com/sharer.php?u=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(t),
                'sharer',
                'toolbar=0,status=0,top=150,left=200,width=626,height=400');

        return false;
    }


    function twt_click($this)
    {
        u = $($this).attr('data-url');
        t = $($this).attr('data-title');
        window.open('http://www.twitter.com/share?url=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(t),
                'sharer',
                'toolbar=0,status=0,top=150,left=200,width=626,height=400');

        return false;
    }

    $(document).on('click', '.main-cat', function () {
        $('.main-cat').removeClass('gradient');
        $(this).addClass('gradient');
        $('#page_name_header').text($(this).text());
        $('.back-screen').attr('href', siteurl + 'cus-our-products');
        var cat_id = $(this).attr('data-value');
        $.ajax({
            type: 'POST',
            data: {cat_id: cat_id},
            url: siteurl + 'get-sub-categories',
            dataType: "json",
            beforeSend: function () {
                $('.wait-div').show();
            },
            success: function (data) {
                $('.wait-div').hide();
                var cat_html = '';
                var product_html = '';
                var isSelected = '';
                if (data.subCats.length > 0) {
                    $.each(data.subCats, function (i, j) {
                        if (i == 0) {
                            isSelected = 'gradient';
                        } else {
                            isSelected = '';
                        }
                        cat_html += '<li class="sub-cat ' + isSelected + '" data-value=' + j.category_id + '>' + j.name + '</li>';
                    });
                } else {
                    cat_html += 'No further categories...';
                }
                if (data.products.length > 0) {
                    var weight_in = '';
                    $.each(data.products, function (i, j) {
                        if (j.item_unit == '1')
                            weight_in = 'ounce';
                        if (j.item_unit == '2')
                            weight_in = 'gram';
                        if (j.item_unit == '3')
                            weight_in = 'ml';
                        if (j.item_unit == '4')
                            weight_in = 'piece';
                        product_html += '<div class="product_card clearfix">';
                        product_html += '<div class="product_detail clearfix" style="background:' + j.color_code + '">';
                        product_html += '<span class="certificate_ico icon-badge"></span>';
                        product_html += '<div class="pro_img left"><img src="' + j.item_image + '" alt="product"></div>';
                        product_html += '<div class="product_info right">';
                        product_html += '<h3>' + j.item_name + '</h3>';
                        product_html += '<p><b>Price:</b> $' + j.price_one + '/1 ' + weight_in + '</p>';
                        product_html += '<p class="about">' + j.family + '</p>';
                        product_html += '<h4>In Stock</h4>';
                        product_html += '<p><b>Amount:</b> $20/g- $200/ ounce</p>';
                        product_html += '</div>';
                        product_html += '</div>';
                        product_html += '<div class="card_buttons clearfix">';
                        product_html += '<a href="javascript:;" data-productId="' + j.item_id + '" data-productimage="' + j.item_image + '" data-productname="' + j.item_name + '" data-productprice="' + j.price_one + '" data-productweight="' + weight_in + '" class="add_to_cart add_add_to_cart" data-attribute="addtocart-pop" >Add to Cart</a>';
                        product_html += '<a href="' + siteurl + 'cus-product-detail/' + j.item_id + '" class="add_to_cart">More Info</a>';
                        product_html += '</div>';
                        product_html += '</div>';

                    });
                } else {
                    product_html += 'No products';
                }

                $('.cats-container').hide();
                $('.sub-cats').html();
                $('.sub-cats').html(cat_html);
                $('.sub-cats').show();
                $('.filter_container').show();

                $('.product_list').html();
                $('.product_list').html(product_html);
            }
        });
    });

    $(document).on('click', '.sub-cat', function () {
        $('.sub-cat').removeClass('gradient');
        $(this).addClass('gradient');
        var cat_id = $(this).attr('data-value');
        var family_id = $('#search_product_family').val();
        var main_cat_id = $('.main-cat.gradient').attr('data-value');
        $.ajax({
            type: 'POST',
            data: {cat_id: main_cat_id, sub_cat_id: cat_id, family_id: family_id},
            url: siteurl + 'get-products-by-subcat',
            dataType: "json",
            beforeSend: function () {
                $('.wait-div').show();
            },
            success: function (data) {
                $('.wait-div').hide();
                var product_html = '';
                if (data.products.length > 0) {
                    var weight_in = '';
                    $.each(data.products, function (i, j) {
                        if (j.item_unit == '1')
                            weight_in = 'ounce';
                        if (j.item_unit == '2')
                            weight_in = 'gram';
                        if (j.item_unit == '3')
                            weight_in = 'ml';
                        if (j.item_unit == '4')
                            weight_in = 'piece';
                        product_html += '<div class="product_card clearfix">';
                        product_html += '<div class="product_detail clearfix" style="background:' + j.color_code + '">';
                        product_html += '<span class="certificate_ico icon-badge"></span>';
                        product_html += '<div class="pro_img left"><img src="' + j.item_image + '" alt="product"></div>';
                        product_html += '<div class="product_info right">';
                        product_html += '<h3>' + j.item_name + '</h3>';
                        product_html += '<p><b>Price:</b> $' + j.price_one + '/1 ' + weight_in + '</p>';
                        product_html += '<p class="about">' + j.family + '</p>';
                        product_html += '<h4>In Stock</h4>';
                        product_html += '<p><b>Amount:</b> $20/g- $200/ ounce</p>';
                        product_html += '</div>';
                        product_html += '</div>';
                        product_html += '<div class="card_buttons clearfix">';
                        product_html += '<a href="javascript:;" data-productId="' + j.item_id + '" data-productimage="' + j.item_image + '" data-productname="' + j.item_name + '" data-productprice="' + j.price_one + '" data-productweight="' + weight_in + '" class="add_to_cart add_add_to_cart" data-attribute="addtocart-pop" >Add to Cart</a>';
                        product_html += '<a href="' + siteurl + 'cus-product-detail/' + j.item_id + '" class="add_to_cart">More Info</a>';
                        product_html += '</div>';
                        product_html += '</div>';

                    });
                } else {
                    product_html += 'No products';
                }

                $('.product_list').html();
                $('.product_list').html(product_html);
            }
        });
    });

    $(document).on('click', '#search_product_family', function () {
        var main_cat_id = $('.main-cat.gradient').attr('data-value');
        var cat_id = $('.sub-cat.gradient').attr('data-value');
        var family_id = $(this).val();
        $.ajax({
            type: 'POST',
            data: {cat_id: main_cat_id, sub_cat_id: cat_id, family_id: family_id},
            url: siteurl + 'get-products-by-subcat',
            dataType: "json",
            beforeSend: function () {
                $('.wait-div').show();
            },
            success: function (data) {
                $('.wait-div').hide();
                var product_html = '';
                if (data.products.length > 0) {
                    var weight_in = '';
                    $.each(data.products, function (i, j) {
                        if (j.item_unit == '1')
                            weight_in = 'ounce';
                        if (j.item_unit == '2')
                            weight_in = 'gram';
                        if (j.item_unit == '3')
                            weight_in = 'ml';
                        if (j.item_unit == '4')
                            weight_in = 'piece';
                        product_html += '<div class="product_card clearfix">';
                        product_html += '<div class="product_detail clearfix" style="background:' + j.color_code + '">';
                        product_html += '<span class="certificate_ico icon-badge"></span>';
                        product_html += '<div class="pro_img left"><img src="' + j.item_image + '" alt="product"></div>';
                        product_html += '<div class="product_info right">';
                        product_html += '<h3>' + j.item_name + '</h3>';
                        product_html += '<p><b>Price:</b> $' + j.price_one + '/1 ' + weight_in + '</p>';
                        product_html += '<p class="about">' + j.family + '</p>';
                        product_html += '<h4>In Stock</h4>';
                        product_html += '<p><b>Amount:</b> $20/g- $200/ ounce</p>';
                        product_html += '</div>';
                        product_html += '</div>';
                        product_html += '<div class="card_buttons clearfix">';
                        product_html += '<a href="javascript:;" data-productId="' + j.item_id + '" data-productimage="' + j.item_image + '" data-productname="' + j.item_name + '" data-productprice="' + j.price_one + '" data-productweight="' + weight_in + '" class="add_to_cart add_add_to_cart" data-attribute="addtocart-pop" >Add to Cart</a>';
                        product_html += '<a href="' + siteurl + 'cus-product-detail/' + j.item_id + '" class="add_to_cart">More Info</a>';
                        product_html += '</div>';
                        product_html += '</div>';

                    });
                } else {
                    product_html += 'No products';
                }

                $('.product_list').html();
                $('.product_list').html(product_html);
            }
        });
    });


//    add to cart

    $(document).on('click', '.add_add_to_cart', function () {
        checkUserLogin();
        var productId = $(this).data('productid');
        var productImage = $(this).data('productimage');
        var productName = $(this).data('productname');
        var productPrice = $(this).data('productprice');
        var productWeight = $(this).data('productweight');

        var pricehtml = '<b>Price:</b>$<input type="hidden" id="old_product_price" value="' + productPrice + '"><span id="popup_product_one_amount">' + productPrice + '</span>/<span id="product_quantity">1</span>' + productWeight;

        $("#popup_product_image").attr("src", productImage);
        $("#popup_product_name").html(productName);
        $("#popup_product_price").html(pricehtml);
        $("#popup_product_quntity").val(1);
        $("#popup_product_id").val(productId);

    });

    $(document).on("keyup keydown change", "#popup_product_quntity", function () {

        var quantity = $("#popup_product_quntity").val();
        var price = $("#old_product_price").val();

        $("#popup_product_one_amount").html(parseInt(price) * parseInt(quantity));
        $("#product_quantity").html(quantity);
    });

    $(document).on('click', '.cart_checkout', function () {
        var total_amount = $('#total_cart_value').text();
        //window.location.href = 'cus-caregiver-step1';
        window.location.href = 'cus-delivery-datetime';
    });

    $(document).on('click', '.redirect_to_caregiver', function () {
        var delivery_date_time = $('#delivery_date_time').val();
        var delivery_address = $('#delivery_address').val();
        var delivery_lat_lng = $('#delivery_lat_lng').val();

        if (delivery_date_time != '' && delivery_address != '') {
            $.ajax({
                type: 'POST',
                data: {delivery_date_time: delivery_date_time, delivery_address: delivery_address, delivery_lat_lng: delivery_lat_lng},
                url: siteurl + 'cus-delivery-datetime',
                dataType: "json",
                beforeSend: function () {
                    $('.wait-div').show();
                },
                success: function (data) {
                    $('.wait-div').hide();
                    if (data.success == '1') {
                        window.location.href = 'cus-caregiver-step1';
                    } else {
                        alert('Something went wrong, Please try again.');
                    }
                }
            });
        } else {
            alert('Please select Delivery address and date time.');
        }
    });
    $(function () {
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        if (!isMobile) {
            $('.container').enscroll();
        }

    })
    function checkUserLogin() {
        var isLogin = '<?= $this->session->userdata('CUSTOMER-SL') ?>';
        if (isLogin == '' || isLogin == undefined) {
            window.location.href = 'cus-login';
        }
    }

    $(document).on('click', '.get_cannabis_now', function () {
        window.location.href = 'cus-our-products';
    });

    $(document).on('click', '.delete_cart_item', function () {
        var cart_id = $(this).attr('data-value');
        $.ajax({
            type: 'POST',
            data: {cart_item_id: cart_id},
            url: siteurl + 'cus-delete-from-cart',
            dataType: "json",
            beforeSend: function () {
                $('.wait-div').show();
            },
            success: function (data) {
                $('.wait-div').hide();
                $('#product_card_' + cart_id).remove();
                var numItems = $('.product_card_small').length;
                if (numItems <= 0) {
                    $('.my_cart.product_list').html('Nothing in cart...');
                }
            }
        });
    });

    $(document).on('click', '.empty-cart', function () {
        $.ajax({
            type: 'POST',
            url: siteurl + 'cus-delete-all-cart',
            dataType: "json",
            beforeSend: function () {
                $('.wait-div').show();
            },
            success: function (data) {
                $('.wait-div').hide();
                $('.my_cart.product_list').html('Nothing in cart...');
            }
        });
    });

</script>
</body>
</html>

