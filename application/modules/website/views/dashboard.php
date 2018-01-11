<?php include('templates/header.php')  ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
   <section class="main-body">
        <div class="ground-elements">
            <ul class="dashbord-items">
                <li><span class="rel-val">17</span><p>Upcoming Appointments</p></li>
                <li><span class="rel-val">15</span><p>Preceptions Issued</p></li>
                <li><span class="rel-val">03</span><p>Appointments Completed</p></li>
                <li class="gap-left"><span class="rel-val">15</span><p>Appointments Cancelled</p></li>
                <li><span class="rel-val">12</span><p>Total Appointments</p></li>
            </ul>
            
            <?php
              
              $checkAvail = checkDoctorStatus($this->session->userdata('doctor_id'));
              $checked = $checkAvail['availablity'];
              
                if($checked == '1'){
                    $checked = "checked";//Available
                }else{
                    $checked = "";//Not available
                }
                
                $dashboradChecks = checkDoctorDashBoardAvail($this->session->userdata('doctor_id'));                
                if($dashboradChecks['from_time']){
                    $from = date("g:i A", strtotime($dashboradChecks['from_time']));
                }else{
                    $from = '';
                }                
                
                if($dashboradChecks['to_time']){
                    $to = date("g:i A", strtotime($dashboradChecks['to_time']));
                }else{
                    $to = '';
                }
            ?>
            <form action="<?php echo base_url(); ?>updateDaysAndTime" method="post">
                <div class="availability">
                    
                <h3>Availability</h3>
                    <input type="text" id="textbox1" value="" />
                    <div class="avl">
                        <span class="status"><strong>Available</strong>
                            <span class="switch"><input id="aval" type="checkbox" class="checker" value="true" name="onoffswitch" <?php echo $checked; ?>  >
                                <label for="aval" class="side-label avali"></label>
                            </span>
                        </span>
                    </div>
                    <br style="clear: both;">


                    <div class="avail-time">
                        <div class="row-1">
                            <table class="time" style="width: 100%;">
                                <tr>
                                    <td style="width: 20%;"><span class="table-tr-header">Date</span></td>
                                    <td style="width: 80%;"><span class="table-tr-header">Time</span></td>
                                </tr>
                                <tr>
                                    <td>                            
                                        <input id="mon" type="checkbox" name="mon" <?php if($dashboradChecks['mon']=='1'){echo "checked";} ?> >
                                        <label for="mon" class="side-label"><span class="week-day">Mon</span></label>
                                    </td>
                                    <td>
                                        <div class="time-select mon-group-time">
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[mon][0][from]" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <strong>to</strong>
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[mon][0][to]" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <a class="add-time-select" href="javascript:void(0);" data-key='mon'>
                                                <img class="add-btn" src="<?php echo base_url() ?>assets/img/add.png">
                                            </a>
                                        </div>
                                    </td>
                                </tr>                                                                
                                <tr>
                                    <td>                            
                                        <input id="tue" type="checkbox" name="tue" <?php if($dashboradChecks['tue']=='1'){echo "checked";} ?> >
                                        <label for="tue" class="side-label"><span class="week-day">Tue</span></label>
                                    </td>
                                    <td>
                                        <div class="time-select tue-group-time">
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[tue][0][from]" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <strong>to</strong>
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[tue][0][to]" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <a class="add-time-select" href="javascript:void(0);" data-key='tue'>
                                                <img class="add-btn" src="<?php echo base_url() ?>assets/img/add.png">
                                            </a>
                                        </div>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>                            
                                        <input id="wed" type="checkbox" name="wed" <?php if($dashboradChecks['wed']=='1'){echo "checked";} ?> >
                                        <label for="wed" class="side-label"><span class="week-day">Wed</span></label>
                                    </td>
                                    <td>
                                        <div class="time-select wed-group-time">
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[wed][0][from]" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <strong>to</strong>
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[wed][0][to]" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <a class="add-time-select" href="javascript:void(0);" data-key='wed'>
                                                <img class="add-btn" src="<?php echo base_url() ?>assets/img/add.png">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>                            
                                        <input id="thu" type="checkbox" name="thu" <?php if($dashboradChecks['thu']=='1'){echo "checked";} ?> >
                                        <label for="thu" class="side-label"><span class="week-day">Thu</span></label>
                                    </td>
                                    <td>
                                        <div class="time-select thu-group-time">
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[thu][0][from]" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <strong>to</strong>
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[thu][0][to]" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <a class="add-time-select" href="javascript:void(0);" data-key='thu'>
                                                <img class="add-btn" src="<?php echo base_url() ?>assets/img/add.png">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="row-2">
                         <table class="time" style="width: 100%;">
                                <tr class="mobile-r">
                                    <td style="width: 20%;"><span class="table-tr-header">Date</span></td>
                                    <td style="width: 80%;"><span class="table-tr-header">Time</span></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">                            
                                        <input id="fri" type="checkbox" name="fri" <?php if($dashboradChecks['fri']=='1'){echo "checked";} ?> >
                                        <label for="fri" class="side-label"><span class="week-day">Fri</span></label>
                                    </td>
                                    <td style="width: 70%;">
                                        <div class="time-select fri-group-time">
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[fri][0][from]" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <strong>to</strong>
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[fri][0][to]" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <a class="add-time-select" href="javascript:void(0);" data-key='fri'>
                                                <img class="add-btn" src="<?php echo base_url() ?>assets/img/add.png">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>                            
                                        <input id="sat" type="checkbox" name="sat" <?php if($dashboradChecks['sat']=='1'){echo "checked";} ?> >
                                        <label for="sat" class="side-label"><span class="week-day">Sat</span></label>
                                    </td>
                                    <td>
                                        <div class="time-select sat-group-time">
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[sat][0][from]" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <strong>to</strong>
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[sat][0][to]" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <a class="add-time-select" href="javascript:void(0);" data-key='sat'>
                                                <img class="add-btn" src="<?php echo base_url() ?>assets/img/add.png">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>                            
                                        <input id="sun" type="checkbox" name="sun" <?php if($dashboradChecks['sun']=='1'){echo "checked";} ?> >
                                        <label for="sun" class="side-label"><span class="week-day">Sun</span></label>
                                    </td>
                                    <td>
                                        <div class="time-select sun-group-time">
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[sun][0][from]" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <strong>to</strong>
                                            <span class="from-date">
                                                <input type="text" placeholder="00:00" name="time[sun][0][to]" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}else{echo "12:00 AM";}  ?>" />
                                            </span>
                                            <a class="add-time-select" href="javascript:void(0);" data-key='sun'>
                                                <img class="add-btn" src="<?php echo base_url() ?>assets/img/add.png">  
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                               
                            </table>
                        </div>
                    </div>

                    <br style="clear: both;">


                    <!-- OLD TIMECHECKER
                    <ul class="unstyled centered">
                        <li>
                            <input id="mon" type="checkbox" name="mon" <?php if($dashboradChecks['mon']=='1'){echo "checked";} ?> >
                            <label for="mon" class="side-label"><span class="week-day">Mon</span></label>
                        </li>
                        <li>
                            <input id="tue" type="checkbox" name="tue" <?php if($dashboradChecks['tue']=='1'){echo "checked";} ?>>
                            <label for="tue" class="side-label"><span class="week-day">Tue</span></label>
                        </li>
                        <li>
                            <input id="wed" type="checkbox" name="wed" <?php if($dashboradChecks['wed']=='1'){echo "checked";} ?>>
                            <label for="wed" class="side-label"><span class="week-day">Wed</span></label>
                        </li>
                        <li>
                            <input id="thu" type="checkbox" name="thu" <?php if($dashboradChecks['thu']=='1'){echo "checked";} ?>>
                            <label for="thu" class="side-label"><span class="week-day">Thur</span></label>
                        </li>
                        <li>
                            <input id="fri" type="checkbox" name="fri" <?php if($dashboradChecks['fri']=='1'){echo "checked";} ?>>
                            <label for="fri" class="side-label"><span class="week-day">Fri</span></label>
                        </li>
                        <li>
                            <input id="sat" type="checkbox" name="sat" <?php if($dashboradChecks['sat']=='1'){echo "checked";} ?>>
                            <label for="sat" class="side-label"><span class="week-day">Sat</span></label>
                        </li>
                        <li>
                            <input id="sun" type="checkbox" name="sun" <?php if($dashboradChecks['sun']=='1'){echo "checked";} ?>>
                            <label for="sun" class="side-label"><span class="week-day">Sun</span></label>
                        </li>
                    </ul>

                    <div class="time-duration">
                        <h3>Time Duration</h3>
                        <div class="time-select">
                            <span class="from-date">
                                <input type="text" placeholder="00:00" name="fromTime" class="timepicker" value="<?php if($dashboradChecks['from_time']){echo $dashboradChecks['from_time'];}  ?>" />
                            </span>
                            <strong>to</strong>
                            <span class="from-date">
                                <input type="text" placeholder="00:00" name="toTime" class="timepicker2" value="<?php if($dashboradChecks['to_time']){echo $dashboradChecks['to_time'];}  ?>" />
                            </span>
                        </div>
                    </div>
                    END OF OLD TIME CHECKER --> 
                </div>
                <br/>
                <div class="btn-bg-grad">
                    <!--<a href="#" class="btn-insta">Login</a>-->
                    <input type="submit" class="btn-insta-sub" name="save"  value="Save" />
                </div>
<!--                <a href="#" class="btn-insta save right">Save</a>-->
            </form>
        </div>
       
    </section>
<?php include('templates/footer.php')  ?>
<script>
    $(document).ready(function() {        
        $(".add-time-select").click(function(){
            var day = $(this).attr('data-key');
            var row_name = day + '-group-time';            
            var total_day_row = $('.' + row_name).length + 1;                       
            var add_row = "<div class='time-select " + row_name + " new-group-time'><span class='from-date'><input type='text' placeholder='00:00' name='time[" + day + "][" + total_day_row + "][from]' class='timepicker' value='' /></span><strong>to</strong><span class='from-date'><input type='text' placeholder='00:00' name='time[" + day + "][" + total_day_row + "][to]' class='timepicker2' value='' /></span><a href='javascript:void(0);' class='remove-time-select'><img class='add-btn' src='assets/img/remove.png'></div>";
            $(this).closest('td').append(add_row);       

            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 60,
                //minTime: '0',
                //maxTime: '11:00pm',
                defaultTime: '12:00am',
                startTime: '12:00am',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });  

            $('.timepicker2').timepicker({
                timeFormat: 'h:mm p',
                interval: 60,
                //minTime: '0',
                //maxTime: '11:00pm',
                defaultTime: '12:00am',
                startTime: '12:00am',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            }); 

            $(".remove-time-select").click(function(){
                $(this).closest('.new-group-time').remove()
            }); 
        });

        $("#aval:checkbox").change(function() {
            var Availablity;
            if($('#aval').is(':checked')){
                Availablity = '0';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>updateStatus",
                    data: {availablity: Availablity},
                    success: function (data) {
                        console.log(data);
                        return false;
                    }
                });
            }else{
                Availablity = '1';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>updateStatus",
                    data: {availablity: Availablity},
                    success: function (data) {
                        console.log(data);
                        return false;
                    }
                });
            }
        });    
        
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            //minTime: '0',
            //maxTime: '11:00pm',
            defaultTime: '<?php echo $from;?>',
            startTime: '12:00 am',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        
        $('.timepicker2').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            //minTime: '0',
            //maxTime: '11:00pm',
            defaultTime: '<?php echo $to; ?>',
            startTime: '12:00 am',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        

    });
</script>