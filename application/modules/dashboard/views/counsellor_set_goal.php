<div class="m-content">
   <!--begin::Portlet-->
    <div class="m-portlet mb-0">
    	<div class="m-portlet__head pl-3">
    		<div class="m-portlet__head-caption">
    			<div class="m-portlet__head-title">
    				<h3 class="m-portlet__head-text p-0 m-0">
    					<!--Add Leads <button name="quick_access" id="quick_access"></button>-->
    					<ul class="nav nav-tabs  m-tabs-line mb-0" role="tablist">
                            <li class="nav-item m-tabs__item mr-3">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#new_lead_form" role="tab">Set goal of each counsellor</a>
                            </li>
                            
                        </ul>
    				</h3>
    			</div>
    		</div>
    	</div>
    	
	    <div class="tab-content">
            <div class="tab-pane active"role="tabpanel">
               <!--begin::Form-->
            	<form  action="<?=base_url().'dashboard/update_goal_set'?>" method='post'>
            		<div class="m-portlet__body mob-portlet__body">
            			
            			<div class="">
            			    <!--<div class="col-lg-6">-->
                                <?php
                                    $i=0;
                                    if(isset($_GET['msg'])){
                                        $msg = $_GET['msg'];
                                    }else{
                                        $msg = 0;
                                    }
                                    
                                    if($msg==1){
                                        echo '<div style="text-align:center; text-size:16px"><label style="color:green">Goal Set Updated Successfully!</label></div>';
                                    }elseif($msg==2 || $msg==3){
                                        echo '<div style="text-align:center; text-size:16px"><label style="color:red">Goal Set Not Updated Successfully!</label></div>';
                                    }
                                    foreach ($counsellor_goal as $key => $value) {
                                        if($this->session->balance_session['email_id']==$value['email_id']){
                                ?>
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <input type="text"  class="form-control m-input" name="<?=str_replace('.','###',$value['email_id']);?>[]" placeholder="Counsellor Name*" value="<?=$value['first_name'];?>" readonly required>
                                                    <span class="m-form__help"></span>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <input type="tel"  class="form-control m-input" name="<?=str_replace('.','###',$value['email_id']);?>[]"  placeholder="Counsellor Goal*" value="<?=$value['sale_goal'];?>" required>

                                                    <span class="m-form__help">Please enter only digits</span>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <input type="tel"  class="form-control m-input" name="<?=str_replace('.','###',$value['email_id']);?>[]"  placeholder="Counsellor Goal Unit*" value="<?=$value['unit_goal'];?>" required>

                                                    <span class="m-form__help">Please enter only digits</span>
                                                </div>
                                                
                                            </div>
                                    <!-- <hr style="border-top: 1px solid black;" /> -->
                                <?php
                                        }
                                    $i++;
                                    }//foreach ($counsellor_goal as $key => $value) {
                                ?>
                                <div class="form-group m-form__group row">
                			        <div class="btn w-100 px-5 mt-3 mb-5" role="group" aria-label="Button group">
                                        <button type="submit" class="btn btn-success w-50 ">Update</button>
                                    </div>
                                </div>
                    			
            			</div>
            			
            		</div>
            	</form>
            	<!--end::Form--> 
            </div>
            
        </div> 
    	
    </div>
    <!--end::Portlet-->
</div>