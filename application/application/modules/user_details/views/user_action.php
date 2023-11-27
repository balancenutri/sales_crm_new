

<style>
    
#msf_multiselect2>.logger,#msf_multiselect3>.logger,#msf_multiselect4>.logger,#msf_multiselect5>.logger {
    width: 295px !important;
    height: 40px;
    padding-top: 4px !important;
    /*border-color:black !important;*/
    border-radius:4px !important;
    border:none !important;
    background-color:white !important;
}    

#msf_multiselect2>.logger::before {
  content: " Life Style : ";
  font-family: sans-serif, Arial;
  padding-top: 4px;
  padding-left: 10px;
  line-height: 2 !important;
}

#msf_multiselect2>.logger::after {
    content: '\2335';
    font-family: sans-serif, Arial;
    color: black !important;
    background-color: #fff;
    margin-left: 200px;
    font-weight: bold;
}
#msf_multiselect3>.logger::before {
  content: " Clinical Condition : ";
  font-family: sans-serif, Arial;
  padding-top: 4px;
  padding-left: 10px;
  line-height: 2 !important;
}

#msf_multiselect3>.logger::after {
    content: '\2335';
    font-family: sans-serif, Arial;
    color: black !important;
    background-color: #fff;
    margin-left: 150px;
    font-weight: bold;
}
#msf_multiselect4>.logger::before {
  content: " Prev Health History : ";
  font-family: sans-serif, Arial;
  padding-top: 4px;
  padding-left: 10px;
  line-height: 2 !important;
}

#msf_multiselect4>.logger::after {
    content: '\2335';
    font-family: sans-serif, Arial;
    color: black !important;
    background-color: #fff;
    margin-left: 135px;
    font-weight: bold;
}

#msf_multiselect5>.logger::before {
  content: " Target Oriented : ";
  font-family: sans-serif, Arial;
  padding-top: 4px;
  padding-left: 10px;
  line-height: 2 !important;
}

#msf_multiselect5>.logger::after {
    content: '\2335';
    font-family: sans-serif, Arial;
    color: black !important;
    background-color: #fff;
    margin-left: 160px;
    font-weight: bold;
}

/*.logger::after {*/
/*    content: '\2335';*/
/*    font-family: sans-serif, Arial;*/
/*    color: black !important;*/
/*    background-color: #fff;*/
/*    margin-left: 275px;*/
/*    font-weight: bold;*/
/*}*/
</style>


<div class="m-accordion m-accordion--default m-accordion--padding-sm" id="m_section_1_content">
<!--<h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Lead Action</h4>-->
<!--<form method="POST" action="<?php echo base_url('update-lead-action');?>">-->
<input type="hidden" name="email_id" value="<?php echo $get_user_details[0]['email_id']; ?>">
<input type="hidden" name="assign_to" value="<?php echo $get_user_details[0]['counsellor']; ?>">
<input type="hidden" name="new_assign_to" id="new_assign_to" value="0">
<input type="hidden" name="sub_status_value" id="sub_status_value" value="0">
<input type="hidden" name="sub_status_date" id="sub_status_date" value="0">
<div id="order_form_section">
	<div class="form-group m-form__group row">
		<?php if($get_user_details[0]['counsellor']=="" || $get_user_details[0]['counsellor']=='NA'){ ?>
		<label class="col-form-label col-lg-3 col-sm-12">Lead Assign to :</label>
		<?php }else{ ?>
		<label class="col-form-label col-lg-3 col-sm-12">Reassign to :</label>
		<?php }?>
		<div class="col-lg-9 col-md-9 col-sm-12">
			<select class="form-control m-input assign_to_add" name="assign_to_add" id="assign_to_add">
				<option value="">Select</option>
				<?php
					foreach ($assign_to_list as $key => $value) {
					    if($get_user_details[0]['counsellor'] == $value['crm_user']){
					        echo '<option value='.$value['crm_user'].' selected>'.$value['crm_user'].'</option>';
					    }else{
					        echo '<option value='.$value['crm_user'].'>'.$value['crm_user'].'</option>';
					    }
					               }
					           ?>
			</select>
		</div>
	</div>
	
	 	<?php if ($get_user_details[0]['primary_source'] == "" || $get_user_details[0]['primary_source']  == null) { ?>
	 		<div class="form-group m-form__group row">
    		<label class="col-form-label col-lg-3 col-sm-12">Primary Source:</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    		 <span id="source_id_<?=$get_user_details[0]['id'];?>">
                                           <select  name="source_id" class="form-control m-input" onchange="leadChangeSource(this)" data-lead_id="<?=$get_user_details[0]['id'];?>" data-lead_email="<?=$get_user_details[0]['email_id'];?>" data-stage="<?=$get_user_details[0]['stage'];?>">
                                     <option value="">Select Source</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Zopim">Zopim</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                    <option value="Phone Enquiry">Phone Enquiry</option>
                                    <option value="HS Stage 1/2">HS Stage 1/2</option>
                                    <option value="HS Stage 3/4">HS Stage 3/4</option>
                                    <option value="Registration">Registration</option>
                                    <option value="Walk-in">Walk-in</option>
                                    <option value="Khyati Ma\'am">Khyati Ma\'am</option>
                                    <option value="Reference">Reference</option></select> 
                                    </span>
    		</div>
    	</div>
	 	
                                
                             <?php   }else{   ?>
                             	<div class="form-group m-form__group row">
    		<label class="col-form-label col-lg-3 col-sm-12">Primary Source:</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    		<b><?=$get_user_details[0]['primary_source'];?></b>
    		</div>
    	</div>
                             
                            <?php  }  ?>
	<div class="form-group m-form__group row">
    		<label class="col-form-label col-lg-3 col-sm-12">Lead Status :</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    			<select name="status_name" class="form-control m-input statusClass status_id">
    				<option value="">Select Status</option>
    				<?php for ($k=0; $k <count($lead_status) ; $k++) { ?>
    				<option data-id="<?php echo $lead_status[$k]['id']; ?>" value="<?php echo $lead_status[$k]['status_name']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option>
    				<?php } ?>
    			</select>
    		</div>
    	</div>
    	
    	<div class="form-group m-form__group row d-none" id="status_pay_later">
    		<label class="col-form-label col-lg-3 col-sm-12">Sub Status :</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    			<select name="pay_later" class="form-control m-input status_pay_later sub_status">
    				<option value="">Select</option>
    				<?php
    					$hot_sub_status = $lead_status[1]['sub_status'];
    					$hot_sub_status_explode = explode(",", $hot_sub_status);
    					
    					for($i= 0; $i < count($hot_sub_status_explode); $i++) {
    					    echo '<option value="'.$hot_sub_status_explode[$i].'">'.$hot_sub_status_explode[$i].'</option>';
    					}
    					?>
    			</select>
    			<input type="text" name="pay_dt" id="sub_status_date_picker" class="add_datepicker mt-2 form-control m-input bg-white sub_status_date" placeholder="add date" readonly />
    		</div>
    	</div>
    	<div class="form-group m-form__group row d-none" id="status_warm">
    		<label class="col-form-label col-lg-3 col-sm-12">Sub Status :</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    			<!--<select name="status_warm" class="form-control m-input status_warm">
    				</select>-->
    			<select name="sub_status" class="form-control m-input status_warm sub_status">
    				<option value="">Select</option>
    				<?php
    					$warm_sub_status = $lead_status[3]['sub_status'];
    					$warm_sub_status_explode = explode(",", $warm_sub_status);
    					
    					for($i= 0; $i < count($warm_sub_status_explode); $i++) {
    					    echo '<option value="'.$warm_sub_status_explode[$i].'">'.$warm_sub_status_explode[$i].'</option>';
    					}
    					?>
    			</select>
    		</div>
    	</div>
    	<div class="form-group m-form__group row d-none" id="cold_sub_status">
    		<label class="col-form-label col-lg-3 col-sm-12">Sub Status :</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    			<select name="cold_sub_status" class="form-control m-input cold_sub_status sub_status">
    				<option value="">Select</option>
    				<?php
    					$cold_sub_status = $lead_status[2]['sub_status'];
    					$cold_sub_status_explode = explode(",", $cold_sub_status);
    					
    					for($i= 0; $i < count($cold_sub_status_explode); $i++) {
    					    echo '<option value="'.$cold_sub_status_explode[$i].'">'.$cold_sub_status_explode[$i].'</option>';
    					}
    					?>
    			</select>
    			<input type="text" name="other_cold_status" style="display:none" class="mt-2 form-control m-input" placeholder="others details" />
    		</div>
    	</div>
    	
    	<!--avinash add this for update leadaction form update 07-12-2021  start-->
    	<div class="form-group m-form__group row sub_status_note_div d-none">
    		<label class="col-form-label col-lg-3 col-sm-12">Sub Status Note:</label>
    		<div class="col-lg-9 col-md-9 col-sm-12 sub_status_note">
    			<select class="form-control m-input">
    				
    			</select>
    		</div>
    	</div>
    	
    	<div class="form-group m-form__group row d-none not_on_whatsapp">
    			<label class="col-form-label col-lg-3 col-sm-12"></label>
    			<div class="col-lg-9 col-md-9 col-sm-12">
    				<div class="m-radio-inline">
    					<label class="m-radio">
    					<input type="radio" name="not_on_whatsapp" value="text"> Text
    					<span></span>
    					</label>
    					<label class="m-radio">
    					<input type="radio" name="not_on_whatsapp" value="email"> Email
    					<span></span>
    					</label>
    				</div>
    			</div>
    		</div>
    	
    	<!--avinash add this for update leadaction form update 07-12-2021  end -->
    	<div class="form-group m-form__group row d-none" id="status_warm">
    		<label class="col-form-label col-lg-3 col-sm-12">Sub Status :</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    			<!--<select name="status_warm" class="form-control m-input status_warm">
    				</select>-->
    			<select name="sub_status" class="form-control m-input status_warm sub_status">
    				<option value="">Select</option>
    				<?php
    					$warm_sub_status = $lead_status[3]['sub_status'];
    					$warm_sub_status_explode = explode(",", $warm_sub_status);
    					
    					for($i= 0; $i < count($warm_sub_status_explode); $i++) {
    					    echo '<option value="'.$warm_sub_status_explode[$i].'">'.$warm_sub_status_explode[$i].'</option>';
    					}
    					?>
    			</select>
    		</div>
    	</div>
    	<div class="form-group m-form__group row d-none" id="cold_sub_status">
    		<label class="col-form-label col-lg-3 col-sm-12">Sub Status :</label>
    		<div class="col-lg-9 col-md-9 col-sm-12">
    			<select name="cold_sub_status" class="form-control m-input cold_sub_status sub_status">
    				<option value="">Select</option>
    				<?php
    					$cold_sub_status = $lead_status[2]['sub_status'];
    					$cold_sub_status_explode = explode(",", $cold_sub_status);
    					
    					for($i= 0; $i < count($cold_sub_status_explode); $i++) {
    					    echo '<option value="'.$cold_sub_status_explode[$i].'">'.$cold_sub_status_explode[$i].'</option>';
    					}
    					?>
    			</select>
    			<input type="text" name="other_cold_status" style="display:none" class="mt-2 form-control m-input" placeholder="others details" />
    		</div>
    	</div>
    	
	<!--avinash added this for consultation note 08-12-2021 start-->
	<div class="form-group m-form__group row">
		<label class="col-form-label col-lg-3 col-sm-12">Tags :</label>
		<div class="col-lg-9 col-md-9 col-sm-12">
		    <div class="row form-group">
				<div class="col-12">
					<label class="col-form-label d-none" style="font-weight: 400;">Regional Diet :</label>
					<select id="regional_diet" name="regional_diet" class="form-control m-input" title="Regional Diet" placeholder="Regional Diet">
						<option value="">Select Ethnicity</option>
						<option value="South Indian">South Indian</option>
						<option value="North Indian">North Indian</option>
						<option value="Bengali">Bengali</option>
						<option value="Punjabi">Punjabi</option>
						<option value="Joint Family">sindhi</option>
						<option value="Gujarati">Gujarati</option>
						<option value="Rajasthani">Rajasthani</option>
						<option value="Maharashtrian">Maharashtrian</option>
						<option value="Muslim">Muslim</option>
						<option value="Christianity">Christianity</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-12">
					<label class="col-form-label d-none" style="font-weight: 400;">Life Style :</label>
					<select id="lifestyle" name="lifestyle[]" class="form-control m-input" multiple="Life Style" title="Life Style" placeholder="Life Style">
						<option value="Sedentary">Sedentary</option>
						<option value="Homemaker">Homemaker</option>
						<option value="Working out">Working Out</option>
						<option value="Nuclear">Nuclear</option>
						<option value="Joint Family">Joint Family</option>
						<option value="Busy executive">Busy executive</option>
						<option value="Traveller">Traveller</option>
						<option value="Windows Shopping">Windows Shopping</option>
						<option value="Household Responsibilities">Household Responsibilities</option>
						<option value="Student Life / Living Alone">Student Life / Living Alone</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
			    <div class="col-12">
			        <label class="col-form-label d-none" style="font-weight: 400;">Clinical Conditions :</label>
					<select id="clinical_condition" name="clinical_condition[]" class="form-control m-input" multiple="Clinical condition" title="Clinical Condition" placeholder="Clinical Conditions">
						<option value="DM">DM</option>
						<option value="Thyroid">Thyroid</option>
						<option value="Pcos">Pcos</option>
						<option value="BP">BP</option>
						<option value="Cholestrol">Cholestrol</option>
						<option value="Post Pregnency">Post Pregnency</option>
						<option value="PMS">PMS</option>
						<option value="HTN">HTN</option>
						<option value="Dislypedemia">Dislypedemia </option>
						<option value="Cancer">Cancer</option>
						<option value="Liver Disorders">Liver Disorders</option>
					</select>
			    </div>
			</div>
			<div class="row form-group">
				<div class="col-12">
					<label class="col-form-label d-none" style="font-weight: 400;">Prev Health Histtory :</label>
					<select id="diet_history" name="diet_history[]" class="form-control m-input" multiple="diet history" title="Diet History" placeholder="Diet History">
						<option value="Tried Diet But No Result">Tried Diet But No Result</option>
						<option value="Tried Diet But No Sustainability">Tried Diet But No Sustainability</option>
						<option value="Never Tried Diets">Never Tried Diets</option>
						<option value="Gyming">Gyming</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
			    <div class="col-12">
					<label class="col-form-label d-none" style="font-weight: 400;">Target Oriented :</label>
					<select id="target_oriented" name="target_oriented[]" class="form-control m-input" multiple="traget oriented" title="Target Oriented" placeholder="Target Oriented">
						<option value="Health management">Health management</option>
						<option value="Weight Loss">Weight Loss</option>
					</select>
				</div>
			    <?php if($get_user_details[0]['age']=="") {?>
				<div class="col-12" style="margin-top:15px;">
					<!--<label class="col-form-label d-none" style="font-weight: 400;">Age Group :</label>-->
					<!--<select id="age_group" name="age_group" class="form-control m-input" style="width:295px;">-->
					<!--	<option value="">Age Group</option>-->
					<!--	<option value="Male Upto 28">Male Upto 28</option>-->
					<!--	<option value="28-32">28-32</option>-->
					<!--	<option value="32-40">32-40</option>-->
					<!--	<option value="40-50">40-50</option>-->
					<!--	<option value="Female Upto 25">Female Upto 25</option>-->
					<!--	<option value="25-35">25-35</option>-->
					<!--	<option value="35-45">35-45</option>-->
					<!--	<option value="45 & Above">45 & Above</option>-->
					<!--</select>-->
				</div>
				<?php } ?>
				</div>
			</div>
			</div>
			<div class="form-group m-form__group row">
        		<label class="col-form-label col-lg-3 col-sm-12">Consultation Note :</label>
        		<div class="col-lg-9 col-md-9 col-sm-12">
        			<textarea class="form-control m-input" rows="3" name="key_insight" placeholder="Key Insights.."></textarea>
        		</div>
    		</div>
	        
	<div class="form-group m-form__group row">
		<label class="col-form-label col-lg-3 col-sm-12">Suggested Program :</label>
		<div class="col-lg-9 col-md-9 col-sm-12">
		    
			<select name="suggested_program" class="form-control m-input  suggested_program" style="margin-top: 10px;">
				<option value="">Program Suggested</option>
				<option data-id="5" value="Active">Active</option>
				<option data-id="2" value="Beat PCOS">Beat PCOS</option>
            	<option data-id="4" value="Body Transformation">Body Transformation</option>
            	<option data-id="74" value="Plateau Breaker">Plateau Breaker</option>
            	<option data-id="91" value="Reform Intermittent">Reform Intermittent</option>
            	<option data-id="6" value="Reneu">Reneu</option>
            	<option data-id="1" value="Weight Loss-Pro">Weight Loss-Pro</option>
            	<option data-id="3" value="Weight Loss +">Weight Loss +</option>
            	<option data-id="132" value="SlimPossible60">Slim Possible</option>
            	<option data-id="119" value="Shape Up">Shape Up</option>
            	<option data-id="131" value="Post-Festive Detox Cleanse">Post-Festive Detox Cleanse</option>
            	<option data-id="112" value="Weight Loss Cleanse">Weight Loss Cleanse</option>
            	<option data-id="113" value="Sugar Detox Cleanse">Sugar Detox Cleanse</option>
            	<option data-id="114" value="Flat Stomach Cleanse">Flat Stomach Cleanse</option>
            	<option data-id="115" value="Acidity Correction Cleanse">Acidity Correction Cleanse</option>
            	<option data-id="116" value="Immune Boosting Cleanse">Immune Boosting Cleanse</option>
            	<option data-id="121" value="Constipation Correction Cleanse">Constipation Correction Cleanse</option>
            	<option data-id="117" value="10 Day Weight Loss Diet Plan" plan="">10 Day Weight Loss Diet Plan</option>
            	<option data-id="118" value="10 Day Intermittent Fasting">10 Day Intermittent Fasting</option>
            	<option data-id="120" value="Transform (weight loss)">Transform (weight loss)</option>
            	<option data-id="133"value="14-Day Fitness Challenge">14-Day Fitness Challenge</option>
            	<option data-id="17" value="Nourish">Nourish</option>
            	<option data-id="18" value="Satvaa">Satvaa</option>
            	<option data-id="19" value="Sphoorti">Sphoorti</option>
            				
			</select>
		</div>
	</div>
			<div class="form-group m-form__group row">
        		<label class="col-form-label col-lg-3 col-sm-12">Program Days:</label>
        		<div class="col-lg-9 col-md-9 col-sm-12">
        			<select name="program_days" class="form-control m-input program_days" id="program_sessions" onchange="get_amount(this)" style="margin-top: 10px;">
        				<option value="">Select Days</option>
        			</select>
        		</div>
        	</div>
        	
        	<div class="form-group m-form__group row">
        		<label class="col-form-label col-lg-3 col-sm-12">Program Amount:<i class="fas fa-edit"></i></label>
        		<div class="col-lg-9 col-md-9 col-sm-12">
        			<input type="text" class="form-control m-input program_amount" name="program_amount" id="program_amount" value=""/>
        		</div>
        	</div>
        	<div class="form-group m-form__group row">
    			<label class="col-form-label col-lg-4 col-sm-4">Payment link?</label>
    			<div class="col-lg-8 col-md-8 col-sm-12">
    				<div class="m-radio-inline">
    					<label class="m-radio">
    					<input type="radio" class="payment_link_option" name="payment_link_option" value="yes"> Yes
    					<span></span>
    					</label>
    					<label class="m-radio">
    					<input type="radio" class="payment_link_option" name="payment_link_option" value="no"> No
    					<span></span>
    					</label>
    				</div>
    			</div>
    		</div>
    		<div class="form-group m-form__group row d-none" id="link_expiry">
    			<label class="col-form-label col-lg-4 col-sm-12">Expiry Date:</label>
    			<div class="col-lg-8 col-md-8 col-sm-12">
    				<input type="text" class="form-control m-input custom_datepicker" name="expiry_dt" id="expiry_dt" placeholder="Pick Date.." readonly>
    			</div>
    		</div>
			<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Motivational Level :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="m-radio-inline" style="margin-left: 25px;">
					<label class="m-radio" style="font-weight: 500;">
					<input type="radio" name="motivational_lavel" value="low"> Low
					<span></span>
					</label>
					<label class="m-radio" style="font-weight: 500;">
					<input type="radio" name="motivational_lavel" value="medium"> Medium
					<span></span>
					</label>
					<label class="m-radio" style="font-weight: 500;">
					<input type="radio" name="motivational_lavel" value="high"> High
					<span></span>
					</label>
				</div>
			</div>
		    </div>
			
			
	
		<!--avinash added this for consultation note 08-12-2021 end-->
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">FollowUp Note (FU) :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<textarea class="form-control m-input" rows="3" name="fu_note" placeholder="Please add your FollowUp note"></textarea>
			</div>
		</div>
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Any Special Note :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<textarea class="form-control m-input" rows="3" name="fu_other_note" placeholder="Other Note.."></textarea>
			</div>
		</div>
		<hr>
		<?php // if($get_user_details[0]['next_action']==''){?>
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Next Fu Date:</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<input type="text" class="form-control m-input custom_datepicker" name="reminder_dt" id="reminder_dt" placeholder="Pick Date.." readonly required>
			</div>
		</div>
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Next Fu Time:</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<select class="form-control m-input" name="reminder_time" id="reminder_time">
				</select>
			</div>
		</div>
		
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Followup From :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="m-radio-inline">
					<!--<label class="m-radio">-->
					<!--<input type="radio" name="followup_on" value="Facebook"> Facebook-->
					<!--<span></span>-->
					<!--</label>-->
					<label class="m-radio">
					<input type="radio" name="followup_from" value="Whatsapp"> Whatsapp
					<span></span>
					</label>
					<label class="m-radio">
					<input type="radio" name="followup_from" value="Call"> Call
					<span></span>
					</label>
					<label class="m-radio">
					<input type="radio" name="followup_from" value="App"> Bn App
					<span></span>
					</label>
				</div>
			</div>
		</div>
		
		<?php //} ?>
		<!--<hr>
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Action Assign_to :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<select class="form-control m-input" name="fu_assigned">
					<option value="">Select</option>
					<?php
					/*	foreach ($assign_to_list as $key => $value) {
						    if($this->session->balance_session['first_name'] != $value['crm_user']){
						        echo '<option value='.$value['crm_user'].'>'.$value['crm_user'].'</option>';
						    }
						               }
						       */    ?>
				</select>
			</div>
		</div>
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Action Assign :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<select class="form-control m-input" name="action_type">
					<option value="">Select</option>
					<option value="followups">Follow Up</option>
					<option value="consultation">Consultation</option>
				</select>
			</div>
		</div>
		<div class="form-group m-form__group row">
			<label class="col-form-label col-lg-3 col-sm-12">Contact Type :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="m-radio-inline">
					<label class="m-radio m-radio--state-success">
					<input type="radio" name="c_type" value="is_c"> Contact
					<sup data-toggle="tooltip1" title="Actual Contact Done"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>
					<span></span>
					</label>
					<label class="m-radio m-radio--state-brand">
					<input type="radio" name="c_type" value="is_nc"> New Contact
					<sup data-toggle="tooltip1" title="New Contact"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>
					<span></span>
					</label>
				</div>
			</div>
		</div>
		<hr>-->
		<!--<div class="form-group m-form__group row d-none"  id="status_pay_later_other">
			<label class="col-form-label col-lg-3 col-sm-12">Pay Later - Others :</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
			    <select name="pay_later_others" class="form-control m-input">
			                 <option value="">Select</option>
			                 <option value="exam">Exam</option>
			                 <option value="wedding">Wedding</option>
			                 <option value="holiday">Holiday</option>
			             </select>
			</div>
			</div>-->
		<button class="btn btn-success btn-sm mt-3" id="action_submit">Submit</button>
	</div>
	<!--</form>-->
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(document).ready(function (){
	    /*var link = 'https://www.bn.com';
	    Swal.fire({
          title: '',
          html:
            'Payment Link created Successfully!<br><br><b>'+link+'</b>',
          showCloseButton: true,
          showCancelButton: false,
          focusConfirm: true,
          confirmButtonText:
            '<a href="https://wa.me/+919870282723/?text=Hi" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Share on WhatsApp!</a>',
          confirmButtonAriaLabel: 'Share on WhatsApp!'
        });
        */
        $('.suggested_program').on('change',function(){
            var program = $(this).val();
            var program_options = '<option value="">Select Days</option>';
            if(program== '10 Day Weight Loss Diet Plan' || program== '10 Day Intermittent Fasting'){
                program_options += '<option value="1">10 Day</option>';
            }else if(program== 'Flat Stomach Cleanse' || program== 'Sugar Detox Cleanse' || program== 'Weight Loss Cleanse' || program== 'Post-Festive Detox Cleanse'){
                program_options += '<option value="1">1 Day</option>';
            }else if(program== 'Acidity Correction Cleanse' || program== 'Immune Boosting Cleanse' || program== 'Constipation Correction Cleanse'){
                program_options += '<option value="1">3 Day</option>';
            }else if(program== 'Transform (weight loss)' || program== '14-Day Fitness Challenge' || program=='Shape Up'){
                program_options += '<option value="1">14 Days</option>';
            }else{
                program_options += '<option value="1">10 Day</option> <option value="3">30 Days</option> <option value="6">60 Days</option> <option value="9">90 Days</option>';
            }
            
            $('#program_sessions').html(program_options);
            
        })
        
	    $("#client_app_panel_form").submit(function(e){
            /* 
            if($('#reminder_dt').val()==''){
    	        alert('Please Set Next Fu!');
    	        return false;
    	    }else{
    	        return true;
    	    }
    	    */
        });
	    /*$('#action_submit').click(function(e){
	    e.preventDefault();
	    
	    });*/
	    const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success'
          },
          buttonsStyling: true
        })
	   
        //$("#cover-spin").hide();
	    var msg = "<?= $this->session->flashdata('lead_update'); ?>";
	    var payment_link = "<?= $this->session->flashdata('payment_link'); ?>";
	    var days = "<?= $this->session->flashdata('days'); ?>";
	    var program = "<?= $this->session->flashdata('program'); ?>";
	    var amount = "<?= $this->session->flashdata('amount'); ?>";
	    var expiry = "<?= $this->session->flashdata('expiry'); ?>";
	    if(payment_link!=''){
	    Swal.fire({
          title: '',
          html:
            'Payment Link Created Successfully!<br><br><b>'+payment_link+'</b>',
          showCloseButton: true,
          showCancelButton: false,
          focusConfirm: false,
          confirmButtonText:
            '<a href="https://wa.me/<?= $contact; ?>/?text=Hi,%0aPFA your payment link for the '+days+'0-days '+program+' program with us at Balance Nutrition for the amount Rs.'+amount+' %0aClick here: '+payment_link+' Once you make the payment, do send me a screenshot and I shall get the program registered. %0aLink expires on: '+expiry+'. %0a %0aRegards, %0a %0a<?=$_SESSION['balance_session']['first_name'];?> %0aSr. Nutrition Counselor" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Share on WhatsApp!</a>',
          confirmButtonAriaLabel: 'Share on WhatsApp!'
        })
        $("#cover-spin").hide();
	    }
	    $('.payment_link_option').click(function(e){
	        var sel = $('input[name="payment_link_option"]:checked').val();
	        //console.log(sel);
	        /*Swal.fire({
              title: 'Do you want to save the changes?',
              showDenyButton: true,
              showCancelButton: true,
              confirmButtonText: 'Save',
              denyButtonText: `Don't save`,
            }).then((result) => {
              
              if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
              } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
              }
            });*/
	        var prog_amt = $('#program_amount').val();
	        if(prog_amt=='' || prog_amt < 0){
	          alert("Please Suggest the Program & Amount for Creating Payment Link!");
	          $('#program_amount').focus();
	          return false;
	        }else{
    	        if(sel=='yes'){
    	            $('#link_expiry').removeClass('d-none');
    	        }else{
    	            $('#link_expiry').addClass('d-none');
    	            $('#link_expiry').val('');
    	        }
	        }
	    });
	    $('#action_submit').click(function(e){
	       event.preventDefault();
	       var lead_old_status="<?= $get_user_details[0]['user_status'] ?>";
	       var status_id=$('#action_status_id').val();
	       var fu_date =$('#reminder_dt').val(); 
	       //sub_status_date_picker
	       //console.log("form submitted");
	       var arr = [ "To Engage", "Hot", "Warm" ];
	       var arr2 = [ "Hot", "Warm" ];
	       if ($.inArray( lead_old_status, arr2 )!=-1 && status_id=='To Engage'){
	           alert("Lead cannot be Downgraded to 'To Engage' status!");
	           $('#action_status_id').focus();
	           return false;
	       }else if($.inArray( status_id, arr )!=-1 && fu_date==''){
	           alert("Please Set the Next FU!");
	           $('#reminder_dt').focus();
	           return false;
	       }else{
	          $('#client_app_panel_form').submit(); 
	       }
	       
	       //console.log("status : "+status_id);
	       
	       //$('#client_app_panel_form').submit();
	       
	    });
	    $('#reminder_dt').on('change',function(){
	        // console.log('<?php echo base_url()?>sales_crm/user_details/user_details/getPendingCallSlots');
	        var date = $(this).val();
	        var counsellor_id = "<?php echo $_SESSION['balance_session']['admin_id'];  ?>";
	        $.ajax({
	          type : 'post',
	           url: '<?php echo base_url()?>user_details/getPendingCallSlots',
	           data: {date:date,counsellor_id:counsellor_id},
	           dataType: 'text',
	           success:function(response){
	            //   alert('yess');
	            //  alert(response);
	              $('#reminder_time').html(response);
	            //   if(response.status == 200){
	            //         get_client_details();
	            //         }
	               
	                //console.log(html);
	           }
	        }) ;
	    })
	    
	    
	   // avinash added this for add lead popup=============================================
	   
	   // $('#reminder_dt1').on('change',function(){
	   //     // console.log('<?php echo base_url()?>sales_crm/user_details/user_details/getPendingCallSlots');
	   //     var date = $(this).val();
	   //     var counsellor_id = "<?php echo $_SESSION['balance_session']['admin_id'];  ?>";
	   //     $.ajax({
	   //       type : 'post',
	   //        url: '<?php echo base_url()?>user_details/getPendingCallSlots',
	   //        data: {date:date,counsellor_id:counsellor_id},
	   //        dataType: 'text',
	   //        success:function(response){
	   //         //   alert('yess');
	   //         //  alert(response);
	   //           $('#reminder_time1').html(response);
	   //         //   if(response.status == 200){
	   //         //         get_client_details();
	   //         //         }
	               
	   //             //console.log(html);
	   //        }
	   //     }) ;
	   // })
	   
	   //=========================================================================================
	    
	    
	    
	    $('.sub_status').on('change',function(){
	        $(".sub_status_note_div").addClass('d-none');
	        $(".sub_status_note").html();
	        var status = $(this).val();
	        var status = $(this).find("option:selected").val();
	        //alert(status);
	        var option=0;
	        var html='<select name="sub_status_note" class="form-control m-input" id="sub_status_note"><option value="">Select a Reason</option>';
	        if(status=='To Pay' || status=='Pay Later'){
	            option++;
	            html+='<option value="Need Time Think">Need Time Think</option><option value="Need Time To Pay">Need Time To Pay</option>';
	        }else if(status == 'Rate Shared'){
	            option++;
	            html+='<option value="Speak To The Family">Speak To The Family</option><option value="Get Back Later">Get Back Later</option><option value="Comparision">Comparision</option>';
	        }else if(status == 'Need Convincing'){
	            option++;
	            //alert(status);
	            html+='<option value="With The Program Purchase">With The Program Purchase</option><option value="USP/Head Mentor">USP/Head Mentor</option>';
	        }else if(status == 'Price Sensitive'){
	            option++;
	            // alert(status);
	            html+='<option value="Comparision">Comparision</option><option value="No Basic Stack">No Basic Stack</option><option value="Need Convencing">Need Convencing</option><option value="Not In Range">Not In Range</option>';
	        }else if(status == 'Not Comfortable Online'){
	            option++;
	             //alert(status);
	            html+='<option value="Need 1 To 1 Consultation">Need 1 To 1 Consultation</option><option value="Tried & Failed Online">Tried & Failed Online</option>';
	        }else if(status == 'Build faith/trust'){
	            option++;
	             //alert(status);
	            html+='<option value="Result Assurance">Result Assurance</option><option value="Google Reviews">Google Reviews</option>';
	        }else if(status == 'Not interested'){
	            option++;
	            //alert(status);
	            html+='<option value="Not Affordable">Not Affordable</option><option value="Not A Priority">Not A Priority</option>';
	        }else if(status == 'Doing plan some where else'){
	            option++;
	            //alert(status);
	            html+='<option value="Price Range">Price Range</option><option value="Better Reviews">Better Reviews</option>';
	        }else if(status == 'Unr(Un responsive)'){
	            option++;
	            //alert(status);
	            html+='<option value="Swapped Leads">Swapped Leads</option><option value="0-15 Days">0-15 Days</option><option value="15-30 Days">15-30 Days</option><option value="Not On Whatsapp">Not On Whatsapp</option>';
	        }else if(status == 'Discard'){
	            option++;
	            //alert(status);
	            html+='<option value="Wrong Number">Wrong Number</option><option value="Incorrect Number">Incorrect Number</option><option value="Spam/Number Unwanted">Spam/Number Unwanted</option>';
	        }
	        html+="</select>";	  
	        //alert(html);
	        if(option!='0'){
    	        $(".sub_status_note").html(html);
    	        $(".sub_status_note_div").removeClass('d-none');
	        }
	    });
	    
	    $('.sub_status_note').on('change',function(){
	        var status_note = $(this).find("option:selected").val();
	        if(status_note == 'Not On Whatsapp'){
	            $('.not_on_whatsapp').removeClass('d-none');
	        }else{
	            $('.not_on_whatsapp').addClass('d-none');
	        }
	        
	    });
	})
	
	
	var lifestyle = new MSFmultiSelect(
    document.querySelector('#lifestyle'),
    {
      theme: 'theme2',
      selectAll: true,
      searchBox: true,
      width: '340px',
      // readOnly: true,
      onChange:function(checked, value, instance) {
        console.log(checked, value, instance);
        transform: 'rotate(0deg)';
      },
      
      // appendTo: '#myselect',
      //readOnly:true,
      autoHide: true
    }
    
    
  ); 
  var clinical_condition = new MSFmultiSelect(
    document.querySelector('#clinical_condition'),
    {
      theme: 'theme2',
      selectAll: true,
      searchBox: true,
      width: '340px',
      // readOnly: true,
      onChange:function(checked, value, instance) {
        console.log(checked, value, instance);
        transform: 'rotate(0deg)';
      },
      
      // appendTo: '#myselect',
      //readOnly:true,
      autoHide: true
    }
    
    
  ); 
  var diet_history = new MSFmultiSelect(
    document.querySelector('#diet_history'),
    {
      theme: 'theme2',
      selectAll: true,
      searchBox: true,
      width: '340px',
      // readOnly: true,
      onChange:function(checked, value, instance) {
        console.log(checked, value, instance);
        transform: 'rotate(0deg)';
      },
      
      // appendTo: '#myselect',
      //readOnly:true,
      autoHide: true
    }
    
    
  );
  
  var target_oriented = new MSFmultiSelect(
    document.querySelector('#target_oriented'),
    {
      theme: 'theme2',
      selectAll: true,
      searchBox: true,
      width: '340px',
      // readOnly: true,
      onChange:function(checked, value, instance) {
        console.log(checked, value, instance);
        transform: 'rotate(0deg)';
      },
      
      // appendTo: '#myselect',
      //readOnly:true,
      autoHide: true
    }
    
    
  );
  
  function get_amount(id){
           //console.log($(id).find(':selected').attr('data-id'));
           if(typeof $('.suggested_program').find(':selected').attr('data-id') === 'undefined') {
            console.log('if');
            var a=$('#suggested_program').find(':selected').attr('data-id');
           }else{
            console.log('else');
            var a=$('.suggested_program').find(':selected').attr('data-id');
           }
            var b=$('.program_days').val()+$('#program_days1').val();
              
           console.log(a+" :: "+b);
           
           $.ajax({
	          type : 'post',
	           url: '<?php echo base_url()?>lead/get_amount',
	           data: {prog:a,days:b},
	           dataType: 'text',
	           success:function(response){
	            //   alert('yess');
	            const myArray = response.split("||");
	            //console.log(myArray);
                var disc = myArray[0];
	            var mrp = myArray[1];
	            //console.log(myArray[0]+"::"+myArray[1]);
	                $('#program_amount1').val(disc);
	                $('.program_amount').val(disc);
	                $('#mrp').val(mrp);
	           }
	        }) ;
        }
	
	
</script>