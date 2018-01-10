<section class="container">
    <div class="new_consultation">
        <h2>Please select the conditions for which you are seeking a consultation.</h2>
        <?php if (sizeof($allConsultationsTypes) > 0) { $selectedConsultations  =   explode(',',$this->session->userdata('selectedConsultations'));?>
            <ul class="clearfix diseases">
                <?php
                foreach ($allConsultationsTypes as $type) {
                    if ($type->is_other == '0') {
                        ?>
                        <li>
                            <label>
                                <input type="checkbox" name="prescription" value="<?= $type->id ?>" <?php if(in_array($type->id,$selectedConsultations)){ ?>checked="checked"<?php }?>>
                                <span class="tick_container"><i class="icon-checked"></i></span>
                                <span class="txt"><?= $type->name ?></span>
                            </label>
                        </li>
                    <?php }
                }
                ?>
                <li class="clear_left other_box <?php if(sizeof($selectedConsultations) > 0) {?>activated<?php }?>">
                    <label>
                        <input type="checkbox" name="other_prescription_main" class="others">
                        <span class="tick_container"><i class="icon-checked"></i></span>
                        <span class="txt">Others</span>
                    </label>
                    <?php
                    foreach ($allConsultationsTypes as $type) {
                        if ($type->is_other == '1') {
                            ?>

                            <ul class="clearfix diseases mt_20">

                                <li>
                                    <label>
                                        <input type="checkbox" name="prescription" value="<?= $type->id ?>" <?php if(in_array($type->id,$selectedConsultations)){ ?>checked="checked"<?php }?>>
                                        <span class="tick_container"><i class="icon-checked"></i></span>
                                        <span class="txt"><?= $type->name ?></span>
                                    </label>
                                </li>
                            </ul>
                        <?php }
                    }
                    ?>
                </li>
            </ul>
<?php } ?>
        <textarea placeholder="Please Specify the other conditions…" name="other_reason" id="other_reason"></textarea>
        <button class="btn gradient change_pass saveSelected">
            <span class="btn-txt">Submit</span>
        </button>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.others').change(function () {
            if ($(this).is(':checked')) {
                $(this).parents('li.other_box').addClass('activated')
            } else {
                $(this).parents('li.other_box').removeClass('activated')
            }
        })
    });


    $(document).on('click', '.saveSelected', function () {
        var selectedValues = [];
        $("input:checkbox[name=prescription]:checked").each(function () {
            selectedValues.push($(this).val());

        });
        if (selectedValues.length <= 0) {
            alert('Please select at least one consultation.');
            return false;
        }

        var other_reason = $('#other_reason').val();

        $.ajax({
            type: 'POST',
            data: {selectedValues: selectedValues, other_reason: other_reason},
            url: siteurl + 'save-selected-consultations',
            success: function () {
                window.location.href = 'cus-time-availability';
            }
        });
    });
</script>