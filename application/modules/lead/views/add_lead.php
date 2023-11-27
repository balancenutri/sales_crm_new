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
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#new_lead_form" role="tab">Add New Lead</a>
                            </li>
                            <li class="nav-item m-tabs__item mr-3">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#quick_access_form" role="tab" id="get_all_chats">Quick access</a>
                            </li>
                        </ul>
    				</h3>
    			</div>
    		</div>
    	</div>
    	
	    <div class="tab-content">
            <div class="tab-pane active show" id="new_lead_form" role="tabpanel">
               <!--begin::Form-->
            	<form class="m-form m-form--fit m-form--label-align-right" id="m_form_1">
            		<div class="m-portlet__body mob-portlet__body">
            			<!--<div class="m-form__content">
            				<div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
            					<div class="m-alert__icon">
            						<i class="la la-warning"></i>
            					</div>
            					<div class="m-alert__text">
            						Oh snap! Change a few things up and try submitting again.
            					</div>
            					<div class="m-alert__close">
            						<button type="button" class="close" data-close="alert" aria-label="Close">
            						</button>	
            					</div>
            				</div>
            			</div>-->
            			
            			<div class="first_mobPage_form desk_form_padding">
            			    <!--<div class="col-lg-6">-->
            			        <div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">First Name *</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    					<input type="text" class="form-control m-input" name="first_name" id="first_name" placeholder="Lead Name*">
                    				</div>
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">Phone No. *</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    					<input type="tel"  class="form-control m-input" name="phone" id="phone" placeholder="Phone No*">
                    					<span class="m-form__help">Please enter only digits</span>
                    				</div>
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    					<input type="text" class="form-control m-input" name="email_id" id="email_id" placeholder="Email*">					
                    					<!--<span class="m-form__help">We'll never share your email with anyone else.</span>-->
                    				</div>
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">Source *</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    				    <select class="form-control m-input select2 source_id" name="source_id" id="source_id">
                                            <option value="">Select Source</option>
                                            <?php for ($i=0; $i <count($lead_source) ; $i++) { ?>
                                              <option value="<?php echo $lead_source[$i]['source_name']; ?>" <?php echo($lead_source[$i]['source_id'] == set_value('source_id'))?'selected':'' ?>><?php echo ucfirst($lead_source[$i]['source_name']); ?></option>
                                            <?php } ?>
                                        </select>
                    					<!--<span class="m-form__help">Please select an option.</span>-->
                    				</div>
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">Lead Status</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    				    <select name="status_id" id="status_id" class="form-control m-input statusClass">
                                            <option value="">Select Lead Status</option>
                                            <?php for ($k=0; $k <count($lead_status) ; $k++) { ?>
                                              <option value="<?php echo $lead_status[$k]['status_name']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option>
                                            <?php } ?>
                                        </select>
                    				</div>
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">Assign To</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    				    <select class="form-control m-input" name="assign_to_add">
                    						<option value="">Select</option>
                    						<?php
                    						
                    						    foreach ($assign_to_list as $key => $value) {
                    						        if($this->session->balance_session['first_name'] == $value['crm_user']){
                    						            echo '<option value='.$value['crm_user'].' selected>'.$value['crm_user'].'</option>';
                    						        }else{
                    						        echo '<option value='.$value['crm_user'].'>'.$value['crm_user'].'</option>';
                    						        }
                                                }
                                            ?>
                    					</select>
                    				</div>
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">Medical Issue</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    				    <input type="text" class="form-control m-input" name="health_category" placeholder="Enter Medical Issue">
                    				</div>
                    			</div>
                    			
                    			<div class="btn-group btn-group-lg w-100 px-3 mt-3" role="group" aria-label="Large button group">
                				   	<button type="submit" name='submit' class="btn btn-success w-50">Submit</button>
                				   	<button type="button" class="btn btn-outline-success w-50 next_show_form">Next</button>
                				</div>
                    			
                    			
            			    <!--</div>-->
            			    <!--<div class="col-lg-6">
            			        <div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12">Last Name</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    					<input type="text" class="form-control m-input" name="last_name" placeholder="Last Name">
                    				</div>
                    			</div>
            			    </div>-->
            			</div>
            			
            			
            			<div class="second_mobPage_form desk_form_padding d-none">
            			    
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Age</label>
                				<div class="col-lg-3 col-md-3 col-sm-12 col-3">
                					<input type="text" class="form-control m-input" name="age" placeholder="Age">
                				</div>
                			    
                			    
                				<label class="col-form-label col-lg-2 col-sm-12">DOB</label>
                				<div class="col-lg-9 col-md-9 col-sm-12 col-9">
                				    <input type="text" class="form-control m-input custom_datepicker" name="dob" placeholder="Enter DOB" readonly>
                					<!--<div class="m-input-icon m-input-icon--left">
                						<input type="text" class="form-control m-input" name="dob" placeholder="Enter digits">
                						<span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                					</div>-->
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Gender</label>
                				<div class="col-lg-12 col-md-12 col-sm-12">
                				    <select class="form-control m-input" name="gender">
                						<option value="">Select gender</option>
                						<option value="Male">Male</option>
                                        <option value="Female">Female</option>
                					</select>
                				    
                				    <!--<div class="m-radio-inline">
                						<label class="m-radio">
                						<input type="radio" name="gender" value="Male"> Male
                						<span></span>
                						</label>
                						<label class="m-radio">
                						<input type="radio" name="gender" value="Female"> Female
                						<span></span>
                						</label>
                					</div>-->
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Weight</label>
                				<div class="col-lg-12 col-md-12 col-sm-12">
                				    <input type="text" class="form-control m-input" name="weight" placeholder="Enter Weight">
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Height</label>
                				<div class="col-lg-6 col-md-6 col-sm-12 col-6">
                					<select class="form-control m-input heightClass" name="height">
                						<option value="">Select Feet</option>
                						<option value="0"> 0 (ft) </option> 
                                        <option value="1"> 1 (ft) </option>
                                        <option value="2"> 2 (ft) </option>
                                        <option value="3"> 3 (ft) </option>
                                        <option value="4"> 4 (ft) </option>
                                        <option value="5"> 5 (ft) </option>
                                        <option value="6"> 6 (ft) </option>
                                        <option value="7"> 7 (ft) </option>
                					</select>
                				</div>
                				<div class="col-lg-6 col-md-6 col-sm-12 col-6">
                				    <select class="form-control m-input" name="inches">
                						<option value="">Select Inches</option>
                						<option value="0">0 (in)</option>
                                        <option value="1">1 (in)</option>
                                        <option value="2">2 (in)</option>
                                        <option value="3">3 (in)</option>
                                        <option value="4">4 (in)</option>
                                        <option value="5">5 (in)</option>
                                        <option value="6">6 (in)</option>
                                        <option value="7">7 (in)</option>
                                        <option value="8">8 (in)</option>
                                        <option value="9">9 (in)</option>
                                        <option value="10">10 (in)</option>
                                        <option value="11">11 (in)</option>
                					</select>
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Country</label>
                				<div class="col-lg-12 col-md-12 col-sm-12">
                				    <select name="country_id" id="country" class="form-control select2">
                                        <option selected="selected" value="">Select Country</option>
                                        <?php for ($j=0; $j <count($countries) ; $j++) { ?>
                                          <option rel="<?php echo $countries[$j]['country_id']; ?>" value="<?php echo $countries[$j]['country_name']; ?>" <?php echo(set_value('country_id') == $countries[$j]['country_id'])?'selected':''; ?>><?php echo $countries[$j]['country_name']; ?></option>
                                        <?php } ?>
                                    </select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">State</label>
                				<div class="col-lg-12 col-md-12 col-sm-12">
                					<select class="form-control m-input" id="state" name="state_id">
                						<option value="">Select</option>
                					</select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">City</label>
                				<div class="col-lg-12 col-md-12 col-sm-12">
                					<select class="form-control m-input" id="cities" name="city_id">
                						<option value="">Select</option>
                					</select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
            				
            				<div class="btn-group btn-group-lg w-100 px-3 mt-3" role="group" aria-label="Large button group">
            				   	<button type="submit" name='submit' class="btn btn-success w-50">Submit</button>
            				   	<!--<input type="submit"  class="btn btn-success">-->
            				   	<button type="button" class="btn btn-outline-success w-50 back_show_form">Back</button>
            				</div>
            				
            		    </div>
            		    <!--<div class="m-portlet__foot m-portlet__foot--fit">
            			<div class="m-form__actions m-form__actions">
            				<div class="row">
            					<div class="col-lg-12 text-center">
            						<button type="submit" class="btn btn-success">Submit</button>
            						<button type="reset" id="reset_form" class="btn btn-secondary">Reset</button>
            					</div>
            				</div>
            			</div>-->
            		</div>
            	</form>
            	<!--end::Form--> 
            </div>
            <div class="tab-pane" id="quick_access_form" role="tabpanel">
                <form class="m-form m-form--fit m-form--label-align-right" id="bulk_lead_add">
                    <div class="form-group m-form__group p-3">
						<textarea class="form-control m-input" name="bulk_add_task" placeholder="name,number,source,email,status," id="bulk_add_task" rows="9"></textarea>
					</div>
					
					<div class="btn-group btn-group-lg w-100 px-3 mt-3 mb-4" role="group" aria-label="Large button group">
    				   	<button type="button" name="submit" class="btn btn-success w-50 bulk_add_task_btn">Submit</button>
    				</div>
    				
                </form>
            </div>
        </div> 
    	
    </div>
    <!--end::Portlet-->
</div>

<script>
$(document).on('change', '#country', function(){
    
    var country_id = $(this).val();
    var url = "<?= base_url('dashboard/get_states')?>";
    $('#state').val('');
    $.ajax({
       type: "POST",
       url: url,
       data: {country_id: country_id},
       dataType:'json',
       success: function(response){
           
           var state_html = "";
           $.each(response.states, function(i, item) 
            {
                state_html += '<option rel="'+response.states[i].state_id+'" value="'+response.states[i].state_name+'">'+response.states[i].state_name+'</option>';
                
            });
            
            $('#state').html(state_html);
            
       }
      });
});

$(document).on('change', '#state', function(){
    
    var state_id = $(this).val();
    var url = "<?= base_url('dashboard/get_city')?>";
    $('#cities').val('');
    
    $.ajax({
       type: "POST",
       url: url,
       data: {state_id: state_id},
       dataType:'json',
       success: function(response){
           
           var state_html = "";
           $.each(response.cities, function(i, item) 
            {
                state_html += '<option value="'+response.cities[i].city_name+'" rel="'+response.cities[i].city_id+'">'+response.cities[i].city_name+'</option>';
                
            });
            
            $('#cities').html(state_html);
            
       }
      });
});

$(document).ready(function(){
    
    $('.next_show_form').on('click',function(){
        $('.second_mobPage_form').removeClass('d-none');
        $('.first_mobPage_form').addClass('d-none');
    });
    
    $('.back_show_form').on('click',function(){
        $('.second_mobPage_form').addClass('d-none');
        $('.first_mobPage_form').removeClass('d-none');
    });
    
    $("#reset_form").on('click',function(){
        $("#state option").remove();
        $("#cities option").remove();
    });
    
    
    
    $("#m_form_1").on("submit", function(){
        if($("#first_name").val()==''){
            //alert("please fill the name");
            return false;    
        }else if($("#phone").val()==''){
            alert("please fill the phone number");
            return false;    
        }else if($("#email_id").val()==''){
            return false;    
        }else if($("#source_id").val()==''){
            return false;    
        }else{
            var form = $(this);
            var url = "<?= base_url('lead/add_lead_data')?>"; 
            $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
            //   dataType:'json',
               success: function(response){
                   swal({
                         text: response,
                         timer: 3000
                     });
                  window.location.reload();
                }
            });
        }
    });
    
    $(".bulk_add_task_btn").on("click", function(){
        var lead_bulk_text = $("#bulk_lead_add textarea").val();
        // alert(form.serialize());return false;
        var url = "<?= base_url('lead/add_lead_data')?>"; 
        $.ajax({
           type: "POST",
           url: url,
           data: {quick_access:1,lead_data:lead_bulk_text},
           dataType:'json',
           success: function(response){
               swal({text:'Submit Successfully !',timer:5e1});
               window.location.reload();
            }
        });
    });
});

</script>