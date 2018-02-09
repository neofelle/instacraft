<link rel="stylesheet" href="<?= $this->config->item('customerassets') ?>css/signature-pad.css">
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39365077-1']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
<section class="container mobile-view-container">
    <div class="caregiver_container accordion">
        <?php if ( isset($careGivers) ): ?>
            <?php foreach($careGivers as $key => $care): ?>
                <a href="javascript:;" data-toggle="modal" data-target="#modalCareGiver<?= $care->caregiver_id ?>" class="btn-link d-block text-center mb-4" data-id="<?php echo $care->caregiver_id ?>">Link to caregiver designation form</a>
                <!-- Modal -->
                <div class="modal fade" id="modalCareGiver<?= $care->caregiver_id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle<?= $care->caregiver_id ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalLongTitle<?= $care->caregiver_id ?>">Designation Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div id="accordion">
                            <div class="card mb-3">
                                <div class="card-header" id="headingOne">
                                  <p class="mb-0">
                                    <a href="javascript:;" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                      SECTION 1: Qualifying PatientInformation
                                    </a>
                                  </p>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body px-0">
                                        <div class="form-group">
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Legal Name:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo $userRecord->first_name . ' ' . $userRecord->last_name ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Date of Birth:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Telephone Number:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo $userRecord->phone_number ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Home Address:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo $userRecord->address ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <div class="row mb-2 mx-0">
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">City:</label>
                                                        <input class="form-control" value="<?php echo $userRecord->city ?>" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">State:</label>
                                                        <input class="form-control" value="<?php echo $userRecord->state ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mx-0">
                                                     <div class="col-6">
                                                        <label class="col-12 label-control">Zip:</label>
                                                        <input class="form-control" value="<?php echo $userRecord->zip ?>" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">Country:</label>
                                                        <input class="form-control" value="<?php echo $userRecord->country ?: "United State" ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Mailing Address:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo $userRecord->email ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="headingTwo">
                                  <p class="mb-0">
                                    <a href="javascript:;" class="btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      SECTION 2: Cultivation Designation
                                    </a>
                                  </p>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body px-0">
                                        <div class="form-group">
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control"># of plants I will cultivate:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="0" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control"># of plants my caregiver will cultivate:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="6" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control"># of plants my dispensary will cultivate:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="0" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="headingThree">
                                  <p class="mb-0">
                                    <a href="javascript:;" class="btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      SECTION 3A: Cultivating Caregiver Information
                                    </a>
                                  </p>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body px-0">
                                        <div class="form-group">
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Legal Name:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo $care->name ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Telephone Number:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo $care->telephone_number ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Mailing Address:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo $care->email ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <div class="row mb-2 mx-0">
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">City:</label>
                                                        <input class="form-control" value="<?php echo $care->city ?>" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">State:</label>
                                                        <input class="form-control" value="<?php echo $care->state ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mx-0">
                                                     <div class="col-6">
                                                        <label class="col-12 label-control">Zip:</label>
                                                        <input class="form-control" value="<?php echo $care->zip_code ?>" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">Country:</label>
                                                        <input class="form-control" value="United States" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <div class="col-2 readonly">
                                                    <input class="form-control" type="checkbox" checked>
                                                </div>
                                                <label class="col-10 label-control">Caregiver MMMP Registration # assigned to this patient:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="headingFour">
                                  <p class="mb-0">
                                    <a href="javascript:;" class="btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                      SECTION 3B: Non Cultivating Caregiver Information
                                    </a>
                                  </p>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="card-body px-0">
                                        <div class="form-group">
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Legal Name:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Telephone Number:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Mailing Address:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <div class="row mb-2 mx-0">
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">City:</label>
                                                        <input class="form-control" value="<?php echo '' ?>" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">State:</label>
                                                        <input class="form-control" value="<?php echo '' ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mx-0">
                                                     <div class="col-6">
                                                        <label class="col-12 label-control">Zip:</label>
                                                        <input class="form-control" value="<?php echo '' ?>" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">Country:</label>
                                                        <input class="form-control" value="United States" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <div class="col-2 readonly">
                                                    <input class="form-control" type="checkbox" checked>
                                                </div>
                                                <label class="col-10 label-control">Caregiver MMMP Registration # assigned to this patient:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="headingFive">
                                  <p class="mb-0">
                                    <a href="javascript:;" class="btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                      SECTION 4: Dispensary Information
                                    </a>
                                  </p>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                    <div class="card-body px-0">
                                        <div class="form-group">
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Name of Dispensary:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Physical Address:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Telephone Number:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Name of Dispensary Representative:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <div class="row mb-2 mx-0">
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">Start Date:</label>
                                                        <input class="form-control" value="<?php echo '' ?>" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="col-12 label-control">End Date:</label>
                                                        <input class="form-control" value="<?php echo '' ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <label class="col-12 label-control">Termination of Designation Date:</label>
                                                <div class="col-12">
                                                    <input class="form-control" value="<?php echo '' ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-start py-3">
                                                <div class="col-2 readonly">
                                                    <input class="form-control" type="checkbox" checked>
                                                </div>
                                                <label class="col-10 label-control">Caregiver MMMP Registration # assigned to this patient:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingSix">
                                  <p class="mb-0">
                                    <a href="javascript:;" class="btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                      SECTION5: Patient Rights and Responsibilities
                                    </a>
                                  </p>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="input_container">
                                            <p>My providerhas certified that I have a condition that entitles me to participate in the Maine Medical Use of Marijuana Program until <input type="text" disabled value=""></p>
                                            <p>I have provided you witha copy of my Maine Medical Use of Marijuana Program identification card/MMMP certificationand my original designation cardas proof that I am authorized to participate in the program. I have also provided you a copy of my Maine issued driver license or other Maine issued photo identification card as proof of my identity.</p>
                                            <p>If I am visiting from another state, I have provided you with a copy of the medical use of marijuanacertificationissued by my stateof <input type="text" disabled value=""> as evidence that I live in a state that authorizes marijuana for medical purposes and have a debilitating condition authorized under Maine law. I have also provided you with a copyof my Maine provider certification and a copyof my photographic identification card or driver’s license frommy home jurisdiction. As a visiting qualifying patient, I agree to abide byall terms and conditions of the Maine Medical Use of Marijuana Program.</p>
                                            <p>You are hereby authorized to share this caregiver designation form and any copies of documents that I am required to provide to a member of the law enforcement community in order toverify the services you are providing to me are authorized under Maine law. I have the right to terminate this agreement at anytime. This MMMP designation formand designation cardis my property, and any authorized activity conveyed to you through this designation form terminates upon my notice. You must either dispose of the excess marijuana in your possession on my behalf, or replace me with another qualified patient. You will have 10 days from the date of notice to return this form to me. In the event I terminate this agreement and you do not return this designation form to me, I authorize the Maine Department of Health and Human Services to demand the return of this designation formand cardor take other action to enforce the Rules Governing the Maine Medical Use of Marijuana Program, which includes terminating the caregiver number that they assigned to you and that you have listed on this designation form. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="checkout_container px-3">
        <p class="fs_15" style="margin-bottom:12px;"><b>Section 5:</b> Patient Rights &nbsp; Responsibilities</p>
        <p class="fs_15" style="margin-bottom:8px;">By signing here, you sign the attached caregiver designation documents, which allows the caregiver to provide you with the medical marijuana you selected.</p>
        <div class="signature">
            <div class="signature-view">
                
                <div id="signature-pad" class="signature-pad">
                    <div class="signature-pad--body">
                        <canvas></canvas>
                    </div>
                    <div class="signature-pad--footer">
                        <div class="description">Sign above</div>

                        <div class="signature-pad--actions">
                            <div class="d-felx align-items-center justify-content-start flex-nowrap px-2">
                                <button type="button" class="btn col-4 rounded-0 mb-3" data-action="clear">Clear</button>
                                <button type="button" class="btn col-4 rounded-0 mb-2" data-action="change-color" style="display: none">Change color</button>
                                <button type="button" class="btn col-4 rounded-0" data-action="undo">Undo</button>
                            </div>
                            <div>
                                <button type="button" class="button save save_png" data-action="save-png" style="display: none">Save as PNG</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="input_container">
            My provider has certified that I have a condition that entitles me to participate in the Maine Medical Use of Marijuana Program until
            <input type="text" name="" disabled="">. I have provided you witha copy of my Maine Medical Use of Marijuana Program identification card/MMMP certificationand my original designation cardas proof that I am authorized to participate in the program. I have also provided you a copy of my Maine issued driver license or other Maine issued photo identification card as proof of my identity.
        </div>
        <div class="input_container">
            If I am visiting from another state, I have provided you with a copy of the medical use of marijuana certification issued by my state of
            <input type="text" name="" disabled=""> as evidence that I live in a state that authorizes marijuana for medical purposes and have a debilitating condition authorized under Maine law. I have also provided you with a copy of my Maine provider certification and a copy of my photographic identification card or driver’s license frommy home jurisdiction. As a visiting qualifying patient, I agree to abide by all terms and conditions of the Maine Medical Use of Marijuana Program.
        </div>
        <p>You are hereby authorized to share this caregiver designation form and any copies of documents that I am required to provide to a member of the law enforcement community in order toverify the services you are providing to me are authorized under Maine law.</p>

        <p>I have the right to terminate this agreement at anytime. This MMMP designation formand designation cardis my property, and any authorized activity conveyed to you through this designation form terminates upon my notice. You must either dispose of the excess marijuana in your possession on my behalf, or replace me with another qualified patient. You will have 10 days from the date of notice to return this form to me.</p>

        <p>In the event I terminate this agreement and you do not return this designation form to me, I authorize the Maine Department of Health and Human Services to demand the return of this designation formand cardor take other action to enforce the Rules Governing the Maine Medical Use of Marijuana Program, which includes terminating the caregiver number that they assigned to you and that you have listed on this designation form.</p>-->
        
        <form id="myAwesomeForm" method="post" action="" style="display: none">
            <input type="text" id="filename" name="filename" />  Filename 
        </form>

        <button class="btn gradient change_pass submit_caregiver_second">
            <span class="btn-txt">NEXT</span>
        </button>

    </div>
</section>

<script src="<?= $this->config->item('customerassets') ?>js/signature_pad.js"></script>
<script src="<?= $this->config->item('customerassets') ?>js/app.js"></script>
<script>
    // icheck
    $('input[type=checkbox]').each(function(){
        var self = $(this)

        self.iCheck({
            checkboxClass: 'icheckbox_square-purple readonly',
            increaseArea: '20%'
        });
    });
    $(document).on('click', '.submit_caregiver_second', function () {
        $('.save_png').click();
    });
</script>