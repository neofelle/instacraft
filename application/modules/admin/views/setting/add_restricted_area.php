<div class="page-content-wrapper" style="width:100% !important;">
    <div class="page-content" style="padding: 5px 7px 10px 20px; position:fixed;">
        
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title setheading">
           Admin Setting 
        </h3>
        
        <!-- END PAGE HEADER-->

        <div class="clearfix">
        </div>

        <!-- BEGIN PAGE CONTENT-->


        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet-body">
                        <div class="panel with-nav-tabs panel-danger">
                            <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li><a href="#manageUsers" data-toggle="tab">Manage Users</a></li>
                                        <li><a href="<?php echo base_url();?>manage-products" >Manage Product Input</a></li>
                                        <li><a href="<?php echo base_url();?>manage-warehouses">Manage Warehouse</a></li>
                                        <li class="active"><a href="<?php echo base_url();?>restricted-areas">Restricted Area</a></li>
                                        <li><a href="<?php echo base_url(); ?>minimum-delivery-prices">Minimum Delivery Prices</a></li>
                                        <li><a href="<?php echo base_url(); ?>taxes">Taxes </a></li>
                                        <!--
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#tab4danger" data-toggle="tab">Danger 4</a></li>
                                                <li><a href="#tab5danger" data-toggle="tab">Danger 5</a></li>
                                            </ul>
                                        </li>
                                        -->
                                    </ul>
                            </div>
                            <div class="panel-body padMarZero">
                                <div class="tab-content ">
                                    <div class="tab-pane fade in active o" id="manageUsers">
                                        
                                        <?php echo validation_errors(); ?>
       
                                        <?php if ($this->session->userdata('SuccessMsg') != "") {  ?>
                                                    <div class="success alert-info toBeHidden custom-success" role="alert">
                                                        <?php echo $this->session->userdata('SuccessMsg');
                                                            $this->session->unset_userdata('SuccessMsg');
                                                        ?>
                                                    </div>
                                        <?php } ?>

                                        <?php if ($this->session->userdata('errorMsg') != "") { 
                                                ?>
                                                <div class="alert alert-danger toBeHidden custom-danger" role="alert"> 
                                                    <?php echo $this->session->userdata('errorMsg');
                                                        $this->session->unset_userdata('errorMsg');
                                                    ?>
                                                </div>

                                        <?php } ?>
                                        
                                        <div class="row-fluid top-act" >  
                                            <form action='' id="searchData" method="post" >  
                                                <ol class="breadcrumb breadcrumb-arrow">
                                                    <li><a href="<?php echo base_url();  ?>admin-dashboard" ><i class="glyphicon glyphicon-home"></i></a></li>
                                                    <li><a href="<?php echo base_url(); ?>restricted-areas">Delivery areas</a></li>
                                                    <!-- <li ><a href="#">Add-Users</a></li> -->
                                                    <li class="active"><span>Add Delivery Area </span></li>
                                                </ol>
                                                
                                              <!-- <input type="text" class="search-custom" style="width:32%;" value="<?php echo $this->input->post('searchText')!= '' ? $this->input->post('searchText'):'';?>" name="searchText"  placeholder="Search by message">
                                                    <a href="" style="margin-left: 5px;" class="btn red reset p-xl-pad red" id="start_button" type="button" ><i class="fa fa-refresh"></i></a>
                                                    <button class="btn red reset p-xl-pad" id="submitform" type="submit" value="Submit"><i class="fa  fa-check"></i></button>
                                              -->
                                            </form>
                                        </div>



                                        <!-- BEGIN FORM-->
                                        <div class="row row_mrg" id="myData">
                                            <div class="col-md-12">
                                                <span class="help-block hide colorshade" id="user_id-error" style="padding: 5px;color:white;"></span>
                                            <form class="form-horizontal" id="addRestrictedArea" name="addRestrictedArea" action=""  role="form" enctype='multipart/form-data' method="post">                         
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label for="resname" style="color:#666525;">Area Type </label>
                                                                <select id="resname" name="resname" class="form-control" onchange="areaType();">
                                                                    <option selected disabled>Select your choice</option>
                                                                    <option value="1">On-demand</option>
                                                                    <option value="2">Scheduled</option>
                                                                </select>
                                                                <span id="resname-error" class="help-block hide"></span>
                                                            </div>
                                                            <div class="form-group">
                                                               
                                                                <fieldset class="" style=" width:90%;display: inline-block;   padding: 0px 5px 5px 5px;border: 1px solid #78beff;">
                                                                <legend style="font-size:14px;margin-bottom: 5px;color:#666525;">  Feature coming soon </legend>
                                                                    
                                                                    <div id="googleMap" style="width:100%;height:400px;"></div> 
                                                                    
                                                                </fieldset>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <button type="submit" class="btn green" name="adddMessageBtn"><i class="fa fa-check"></i> Add </button>
                                                                <a type="button" href="<?php echo base_url(); ?>restricted-areas" class="btn default "><i class="fa fa-remove"></i> Cancel</a> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div id="onDemandBox" style="display: none;" class="form-group">
                                                                
                                                                <fieldset class="" style=" width:90%;display: inline-block;   padding: 0px 5px 5px 5px;border: 1px solid #78beff;">
                                                                <legend style="font-size:14px;margin-bottom: 5px;color:#666525;"> On-demand delivery areas</legend>
                                                                    <textarea id="restrictedCode" name="restrictedCode" rows="3" placeholder="Enter zip codes(comma separated) e:g; 111111, 222222" style="margin-top: 0px !important;"><?php echo isset($resArea['zip_codes']) ? $resArea['zip_codes'] : '' ;?></textarea>
                                                                    <span id="restrictedCode-error" class="help-block hide"></span>
                                                                </fieldset>
                                                            </div>
                                                            <div id="scheduledBox" style="display: none;" class="form-group">
                                                                <?php 
                                                                    $resAreaDel = array();
                                                                    foreach ($areainfo AS $row){
                                                                        if(isset($row['area_permission']) &&  $row['area_permission'] == 3){
                                                                            $resAreaDel = $row;
                                                                        } 
                                                                    }
                                                                ?>
                                                                <fieldset class="" style=" width:90%;display: inline-block;   padding: 0px 5px 5px 5px;border: 1px solid #78beff;">
                                                                <legend style="font-size:14px;margin-bottom: 5px;color:#666525;"> Scheduled deleveries</legend>
                                                                    
                                                                    <label class="width73" for="week3_1"><input class="groupchk" type="checkbox" id="week3_1" name="week3[]" value="1" <?php echo isset($resAreaDel['mon']) == 1 ? 'checked' : ''; ?> > Mon </label>
                                                                    <label class="width73" for="week3_2"><input class="groupchk" type="checkbox" id="week3_2" name="week3[]" value="2" <?php echo isset($resAreaDel['tue']) == 1 ? 'checked' : ''; ?> > Tue </label>
                                                                    <label class="width73" for="week3_3"><input class="groupchk" type="checkbox" id="week3_3" name="week3[]" value="3" <?php echo isset($resAreaDel['wed']) == 1 ? 'checked' : ''; ?> > Wed </label>
                                                                    <label class="width73" for="week3_4"><input class="groupchk" type="checkbox" id="week3_4" name="week3[]" value="4" <?php echo isset($resAreaDel['thu']) == 1 ? 'checked' : ''; ?> > Thu </label>
                                                                    <label class="width73" for="week3_5"><input class="groupchk" type="checkbox" id="week3_5" name="week3[]" value="5" <?php echo isset($resAreaDel['fri']) == 1 ? 'checked' : ''; ?> > Fri </label>
                                                                    <label class="width73" for="week3_6"><input class="groupchk" type="checkbox" id="week3_6" name="week3[]" value="6" <?php echo isset($resAreaDel['sat']) == 1 ? 'checked' : ''; ?> > Sat </label>
                                                                    <label class="width73" for="week3_7"><input class="groupchk" type="checkbox" id="week3_7" name="week3[]" value="7" <?php echo isset($resAreaDel['sun']) == 1 ? 'checked' : ''; ?> > Sun </label>
                                                                    <input type="hidden" id="resDelid" name="resDelid" value="<?php echo isset($resAreaDel['id']) ? $resAreaDel['id'] : ''; ?>">
                                                                    <span id="week3-error" class="help-block hide"></span>
                                                                    
                                                                    <textarea id="resDelCode" name="resDelCode" rows="3" placeholder="Enter zip codes(comma separated) e:g; 111111, 222222" style="margin-top: 0px !important;"><?php echo isset($resAreaDel['zip_codes']) ? $resAreaDel['zip_codes'] : '' ;?></textarea>
                                                                    <span id="resDelCode-error" class="help-block hide"></span>
                                                                    
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                <!------------------content end---------------------------------->            
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="manageProductInput">Danger 2</div>
                                    <div class="tab-pane fade" id="manageWarehouses">Danger 3</div>
                                    <div class="tab-pane fade" id="restrictedAreas">Restricted Area </div>
                                    <div class="tab-pane fade" id="minDeliveryPrices">Minimum Delivery Prices</div>
                                    <div class="tab-pane fade" id="taxes">Taxes</div>
                                    <div class="tab-pane fade" id="tab4danger">Danger 4</div>
                                    <div class="tab-pane fade" id="tab5danger">Danger 5</div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
    </div>
</div>


<!-- Model for Block User -->
<div class="modal fade in" id="block" tabindex="-1" role="basic" aria-hidden="true" style="display: none; padding-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" id="closePop"></a>
                <h4 class="modal-title">Alert Message</h4>
            </div>
            <div class="modal-body">Are you sure you want to block the user? </div>
            <div class="modal-footer">
                <a href="" id="writeDeactivateURL"  class="btn green">Yes</a>
                <a class="btn red"  id="closePop">No</a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Model for Activate User -->
<div class="modal fade in" id="activate" tabindex="-1" role="basic" aria-hidden="true" style="display: none; padding-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" id="closePop"></a>
                <h4 class="modal-title">Alert Message</h4>
            </div>
            <div class="modal-body">Are you sure you want to activate the user again? </div>
            <div class="modal-footer">
                <a href="" id="writeActivateURL" class="btn green">Yes</a>
                <a class="btn red" id="closePop">No</a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Model for Delete User -->
<div class="modal fade in" id="deluser" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="">
        <div class="modal-content">
            <div class="modal-header  bg bg-primary">
                <a class="close" id="closePopForDel"></a>
                <h4 class="modal-title">Alert Message</h4>
            </div>
            <div class="modal-body">Are you sure you want to delete the user? </div>
            <div class="modal-footer">
                <a href="" id="writeDeleteURL"  class="btn green">Yes</a>
                <a class="btn red"  id="closePopForDel">No</a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/add-restricted-area.js"  type="text/javascript" ></script>
<script>
jQuery(document).ready(function () {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features

    $(document).on("click","#blockUser",function() {//enable disabled driver message popup
        var userId = $(this).attr('userId');//get driver Id
        var status = $(this).attr('status');//get driver status
        //var url = 'activeDeactiveDriver/'+status+'/'+userId+'?searchText=<?php// echo $_GET['searchText']; ?>';//write new url to deactivate for popup
        var url = 'activeDeactiveUser/'+status+'/'+userId;
        $('#writeDeactivateURL').attr("href", url);//write new generated url
        $('#block').show();//show popup
    });

    $(document).on("click","#activeUser",function() {//enable activate driver message popup
        var userId = $(this).attr('userId');//get driver Id
        var status = $(this).attr('status');//get driver status
        //var url = 'activeDeactiveDriver/'+status+'/'+driverId+'?searchText=<?php //echo $_GET['searchText']; ?>'; //write new url to activate for popup
        var url = 'activeDeactiveUser/'+status+'/'+userId;
        $('#writeActivateURL').attr("href", url);//write new generated url
        $('#activate').show();//show popup
    });

    $(document).on("click","#closePop",function() {//disable both popup
        $('#block').hide();//hide deactive driver popup
        $('#activate').hide();//hide deactive driver popup
    });
    //--- Delete User
    $(document).on("click","#userDel",function() {//enable disabled driver message popup
        var xhref = $(this).attr('href');//get driver Id
        //var status = $(this).attr('status');//get driver status
        //var url = 'activeDeactiveDriver/'+status+'/'+userId+'?searchText=';//write new url to deactivate for popup
        //var url = 'activeDeactiveUser/'+status+'/'+userId
        $('#writeDeleteURL').attr("href", xhref);//write new generated url
        $('#deluser').show();//show popup
    });

    $(document).on("click","#closePopForDel",function() {//disable both popup
        $('#deluser').hide();//hide deactive driver popup
        $('#ActivateDriver').hide();// hide activate driver popup
    });

    
});
</script>
<script type="text/javascript">
    function areaType() {
        if (document.getElementById("resname").value == "1") {
            document.getElementById("onDemandBox").style.display = "initial";
            document.getElementById("scheduledBox").style.display = "none";
        } else if (document.getElementById("resname").value == "2") {
            document.getElementById("onDemandBox").style.display = "none";
            document.getElementById("scheduledBox").style.display = "initial";
        } else {
            document.getElementById("onDemandBox").style.display = "none";
            document.getElementById("scheduledBox").style.display = "none";
        }
    }
</script>
<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
