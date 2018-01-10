<link rel="stylesheet" href="<?= $this->config->item('customerassets') ?>css/owl.carousel.min.css">
<script src="<?= $this->config->item('customerassets') ?>js/owl.carousel.min.js" type="text/javascript"></script>
<section class="splash_container">
    <div class="splash_logo"><img src="<?= $this->config->item('customerassets') ?>images/splash_logo.png" alt="logo"></div>
</section>
<section class="container">
    <div class="owl-carousel owl-theme demo">
        <div class="item">
            <div class="slide-cotent">
                <div class="slide-cotent-inner">
                    <h3>After 10pm?</h3>
                    <p>We’ll still deliver <br>Right to you :) <br>See our driver on the way <br>Just like an Uber.</p>
                </div>
            </div>
            <img src="<?= $this->config->item('customerassets') ?>images/image_1@2x.png" alt="">
        </div>
        <div class="item">
            <div class="slide-cotent">
                <div class="slide-cotent-inner">
                    <p>We use a special drying &amp; curing method which boosts the flavor, essential oils, and medicinal value of our products.
                        For an unparalleled clean high</p>
                </div>
            </div>
            <img src="<?= $this->config->item('customerassets') ?>images/image_2@2x.png" alt="">
        </div>
        <div class="item">
            <div class="slide-cotent">
                <div class="slide-cotent-inner">
                    <p>Tired of bad weed? <br>That’s weak, old, harsh, or ineffective? <br>We got the good stuff. All lab-tested, fresh
                        Craft Cannabis... <br>Like craft beer, made in small batches <br>By caring true craftsmen, <br>Not cold corporations. <br>It’s Farm to Table, made with pride.</p>
                </div>
            </div>
            <img src="<?= $this->config->item('customerassets') ?>images/image_3@2x.png" alt="">
        </div>
        <div class="item">
            <div class="slide-cotent">
                <div class="slide-cotent-inner">
                    <p>Like a craft beer bar, <br>We’ll feature "exotics of the month". New strains. New edibles. Rare items. 
                        Brought to you by pastry chefs with culinary degrees &amp; years of experience.</p>
                </div>
            </div>
            <img src="<?= $this->config->item('customerassets') ?>images/image_4@2x.png" alt="">
        </div>
        <div class="item">
            <div class="slide-cotent">
                <div class="slide-cotent-inner">
                    <p>Like a craft beer bar, <br>We’ll feature "exotics of the month". New strains. New edibles. Rare items. 
                        Brought to you by pastry chefs with culinary degrees &amp; years of experience.</p>
                </div>
            </div>
            <img src="<?= $this->config->item('customerassets') ?>images/image_5@2x.png" alt="">
        </div>
        <div class="item">
            <div class="slide-cotent">
                <div class="slide-cotent-inner">
                    <p>We believe in challenging the status quo. 1% of profits will go to charity, funding cancer research &amp; making the world better. <br><br>We want to set the industry standard for quality, customer service, and social responsibility. Help us make that dream a reality…</p>
                </div>
            </div>
            <img src="<?= $this->config->item('customerassets') ?>images/image_6@2x.png" alt="">
        </div>
    </div>
    <P class="skip-btn"><a href="<?=base_url()?>cus-our-products">Skip</a></P>
</section>

</div>

</div>
</section>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        items: 1,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $(window).on('load', function () {
        
        var cookieValue = 'yes';
        var cookieName = 'splash_shown';
        var nDays = 30;
        var today = new Date();
        var expire = new Date();
        if (nDays == null || nDays == 0)
            nDays = 1;
        expire.setTime(today.getTime() + 3600000 * 24 * nDays);
        document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString();
        
        window.setInterval(function () {
            $(".splash_container").hide();
//            $(".splash_container").slideDown("up", function () {
//                // Animation complete.
//            });

        }, 3000);
    });
</script>
</body>
</html>