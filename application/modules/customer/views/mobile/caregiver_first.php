<section class="container mobile-view-container">
    <div class="caregiver-details">
        <p><b>Section 1:</b> Qualifying Patient Information</p>
        <div class="form-container">
            <?= form_open_multipart('cus-caregiver-step1', array('class' => 'clearfix ajaxform', 'id' => '')) ?>    
                <div class="alert alert-info wait-div " style="display:none;"> <strong>Please wait! </strong> Your action is in proccess... </div>
                <div id="jGrowl" class="top-right jGrowl col-md-12"  style="display: none;">
                    <button class="close" aria-hidden="true" data-dismiss="alert" style="padding:10px;" type="button">&times;</button>
                    <div class="jGrowl-notification ">
                        <div class="jGrowl-message ajax_message"></div>
                    </div>
                </div>                
                <label class="txt_input">
                    <input type="text" id="first_name" name="first_name" placeholder="first name on your ID"  required="">
                </label>
                <label class="txt_input">
                    <input type="text" id="last_name" name="last_name" placeholder="last name on your ID"  required="">
                </label>
                <label class="txt_input right_ico">
                    <input type="text" name="dob" id="dob" placeholder="Date of Birth"  required="">
                    <!--<span class="input_ico icon-calendar"></span>-->
                </label>
                <label class="txt_input">
                    <input type="text" id="phone_number" name="phone_number" placeholder="Telephone Number"  required="">
                </label>
                <label class="txt_input">
                    <input type="text" name="home_address" placeholder="Home Address" value="<?= $delivery_address ?>" required="">
                    <!--<textarea name="home_address" placeholder="Home Address" rows="5" required=""></textarea>-->
                </label>
                <div class="half_input clearfix">
                    <label class="txt_input left">
                        <input type="text" id="city" name="city" placeholder="City"  required="">
                    </label>
                    <label class="txt_input right">
                        <input type="text" id="state" name="state" placeholder="State"  required="">
                    </label>
                </div>
                <div class="half_input clearfix">
                    <label class="txt_input left">
                        <input type="number" id="zip" min="0" name="zip" placeholder="ZIP"  maxlength="6" onKeyDown="if(this.value.length==6) return false;" required="">
                    </label>
<!--                    <label class="txt_input right">
                        <input type="text" name="country" placeholder="Country" value="" required="">
                    </label>-->
                </div>
<!--                <label class="txt_input">
                    <input type="text" name="medical_certification" placeholder="Medical Provider Written Certification" value="" required="">
                </label>-->
                <!--                <div class="half_input clearfix">
                                    <label class="txt_input right_ico left">
                                        <input type="text" name="" placeholder="Issued Date">
                                        <span class="input_ico icon-calendar"></span>
                                    </label>
                                    <label class="txt_input right_ico right">
                                        <input type="text" name="" placeholder="Expiration Date">
                                        <span class="input_ico icon-calendar"></span>
                                    </label>
                                </div>-->
                <div class="half_input clearfix">
                </div>

                <button class="btn gradient change_pass">
                    <span onclick="saveVals();" class="btn-txt">Next</span>
                </button>
            <?= form_close();?>

        </div>
    </div>
</section>
<script type="text/javascript">
    function saveVals() {
        $.cookie('firstName', document.getElementById("first_name").value);
        $.cookie('lastName', document.getElementById("last_name").value);
        $.cookie('dateOB', document.getElementById("dob").value);
        $.cookie('phno', document.getElementById("phone_number").value);
        $.cookie('cityC', document.getElementById("city").value);
        $.cookie('stateC', document.getElementById("state").value);
        $.cookie('zipC', document.getElementById("zip").value);
    }
    if (typeof $.cookie('firstName') != 'undefined' && $.cookie('firstName') != "") {
        document.getElementById("first_name").value = $.cookie('firstName');
    }
    if (typeof $.cookie('lastName') != 'undefined' && $.cookie('lastName') != "") {
        document.getElementById("last_name").value = $.cookie('lastName');
    }
    if (typeof $.cookie('dateOB') != 'undefined' && $.cookie('dateOB') != "") {
        document.getElementById("dob").value = $.cookie('dateOB');
    }
    if (typeof $.cookie('phno') != 'undefined' && $.cookie('phno') != "") {
        document.getElementById("phone_number").value = $.cookie('phno');
    }
    if (typeof $.cookie('cityC') != 'undefined' && $.cookie('cityC') != "") {
        document.getElementById("city").value = $.cookie('cityC');
    }
    if (typeof $.cookie('stateC') != 'undefined' && $.cookie('stateC') != "") {
        document.getElementById("state").value = $.cookie('stateC');
    }
    if (typeof $.cookie('zipC') != 'undefined' && $.cookie('zipC') != "") {
        document.getElementById("zip").value = $.cookie('zipC');
    }
</script>
<script>
    $('#dob').datepicker({
        dateFormat: 'yy-m-d',
        defaultDate: '1980-01-01',
        mask: '',
        timepicker: false,
        //autoSize:true,
        //changeMonth: true,
        //changeYear: true
    });
    $('input').on('keydown', function(event) {
        if ( event.keyCode == 13 )
        {
            $('#dob').datepicker("hide")
        }
    })
</script>