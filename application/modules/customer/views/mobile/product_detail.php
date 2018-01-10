 <?php
            if ($productDetail->item_unit == '1')
                $weight_in = 'ounce';
            if ($productDetail->item_unit == '2')
                $weight_in = 'gram';
            if ($productDetail->item_unit == '3')
                $weight_in = 'ml';
            if ($productDetail->item_unit == '4')
                $weight_in = 'piece';
            ?>
<section class="container">
    <div class="order_detail_container">
        <div class="product-det-thumb">
            <img src="<?=$productDetail->item_image?>"/>
        </div>
        <div class="prod-deta">
            <h1><?=$productDetail->item_name?></h1>
            <p class="prod-cat"><?=$productDetail->category_name?></p>
            <span class="prod-price"><label>Price</label><span>$X per 1/8 oz.</span><span>$Y/ ounce</span></span>
        </div>
        <ul class="tabs_menu three-tabs">
            <li class="active">Info</li>
            <li>Effects</li>
<!--            <li>Family</li>-->
        </ul>
        <div class="detail_tab">
            <div class="product_container">
                <h2 class="description-head">Description:</h2>
                <p class="description">
                    <?=$productDetail->review?>
                </p>
                <button class="btn gradient change_pass">
                    <span class="btn-txt add_to_cart add_add_to_cart" data-productId="<?= $productDetail->item_id ?>" data-productname="<?= $productDetail->item_name ?>" data-productprice="<?= $productDetail->price_one ?>" data-productweight="<?= $weight_in ?>" data-attribute="addtocart-pop">Add to cart</span>
<!--                    <a href="javascript:;" data-productId="<?= $product->item_id ?>" data-productimage="<?= $product->item_image ?>" data-productname="<?= $product->item_name ?>" data-productprice="<?= $product->price_one ?>" data-productweight="<?= $weight_in ?>" class="add_to_cart add_add_to_cart" data-attribute="addtocart-pop" >Add to Cart</a>-->
                </button>
            </div>
            <div class="driver_detail">
                <div class="lab-group">
                    <label class="bab-lable">Recommended Uses:</label>
                    <p class="lab-deta"><?= $productDetail->recommended_uses?$productDetail->recommended_uses:"-NA-" ?></p>
                    <label class="bab-lable">Flavor:</label>
                    <p class="lab-deta"><?=$productDetail->flavor?$productDetail->flavor:"-NA-"?></p>
                    <label class="bab-lable">Smell:</label>
                    <p class="lab-deta"><?=$productDetail->smell?$productDetail->smell:"-NA-"?></p>
                    <label class="bab-lable">Effect:</label>
                    <p class="lab-deta"><?=$productDetail->effect?$productDetail->effect:"-NA-"?></p>

                </div>
                <button class="btn gradient change_pass">
                    <span class="btn-txt add_to_cart add_add_to_cart" data-productId="<?= $productDetail->item_id ?>" data-productname="<?= $productDetail->item_name ?>" data-productprice="<?= $productDetail->price_one ?>" data-productweight="<?= $weight_in ?>" data-attribute="addtocart-pop">Add to cart</span>
<!--                    <span class="btn-txt">Add to cart</span>-->
                </button>
            </div>
        </div>

    </div>
</section>
<script type="text/javascript">
    $(function() {
        $('.tabs_menu li').click(function() {
            $(this).addClass('active').siblings().removeClass('active');
            $(".detail_tab > div").eq($(this).index()).show().siblings().hide()
        });
        if ($('.profile_img img').get(0).naturalWidth > $('.profile_img img').get(0).naturalHeight) {
            $('.profile_img').addClass('vertical');
        } else {
            $('.profile_img').addClass('horizontal');
        }
        $('.container').enscroll(); 
    });
    </script>