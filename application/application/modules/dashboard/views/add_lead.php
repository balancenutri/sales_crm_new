<div class="m-content">
       <!--begin::Portlet-->
        <div class="m-portlet mb-0">
        	<div class="m-portlet__head">
        		<div class="m-portlet__head-caption">
        			<div class="m-portlet__head-title">
        				<h3 class="m-portlet__head-text">
        					Add Leads
        				</h3>
        			</div>
        		</div>
        	</div>
        	<!--begin::Form-->
        	<form class="m-form m-form--fit m-form--label-align-right" id="m_form_1">
        		<div class="m-portlet__body">
        			<div class="m-form__content">
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
        			</div>
        			
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">First Name *</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                					<input type="text" class="form-control m-input" name="first_name" placeholder="Enter your First Name">
                				</div>
                			</div>
        			    </div>
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Last Name</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                					<input type="text" class="form-control m-input" name="last_name" placeholder="Enter your Last Name">
                				</div>
                			</div>
        			    </div>
        			</div>
        			
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                					<input type="text" class="form-control m-input" name="email" placeholder="Enter your email">					
                					<!--<span class="m-form__help">We'll never share your email with anyone else.</span>-->
                				</div>
                			</div>
        			    </div>
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Phone No. *</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                					<div class="m-input-icon m-input-icon--left">
                						<input type="text" class="form-control m-input" name="phone" placeholder="Please enter only digits">
                						<span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                					</div>
                					<!--<span class="m-form__help">Please enter only digits</span>-->
                				</div>
                			</div>
        			    </div>
        			</div>
        			
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Age</label>
                				<div class="col-lg-2 col-md-9 col-sm-12">
                					<input type="text" class="form-control m-input" name="age" placeholder="Enter your email">
                				</div>
                			    
                			    
                				<label class="col-form-label col-lg-2 col-sm-12">DOB</label>
                				<div class="col-lg-5 col-md-9 col-sm-12">
                				    <input type="text" class="form-control m-input custom_datepicker" name="birth_date" placeholder="Enter DOB" readonly>
                					<!--<div class="m-input-icon m-input-icon--left">
                						<input type="text" class="form-control m-input" name="dob" placeholder="Enter digits">
                						<span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                					</div>-->
                				</div>
                			</div>
        			    </div>
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Gender</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                				    <div class="m-radio-inline">
                						<label class="m-radio">
                						<input type="checkbox" name="gender"> Male
                						<span></span>
                						</label>
                						<label class="m-radio">
                						<input type="checkbox" name="gender"> Female
                						<span></span>
                						</label>
                					</div>
                				</div>
                			</div>
        			    </div>
        			</div>
        			
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Country</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                				    <select name="country_id" id="country" class="form-control select2" name="country">
                                        <option selected="selected" value="">Select Country</option>
                                        <?php for ($j=0; $j <count($countries) ; $j++) { ?>
                                          <option value="<?php echo $countries[$j]['country_id']; ?>" <?php echo(set_value('country_id') == $countries[$j]['country_id'])?'selected':''; ?>><?php echo $countries[$j]['country_name']; ?></option>
                                        <?php } ?>
                                    </select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
        			    </div>
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">State</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                					<select class="form-control m-input" id="state" name="state_id">
                						<option value="">Select</option>
                					</select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
        			    </div>
        			</div>
        			
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">City</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                					<select class="form-control m-input" id="cities" name="city">
                						<option value="">Select</option>
                					</select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
        			    </div>
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Source *</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                				    <select class="form-control m-input select2 source_id" name="enquiry_from">
                                        <option value="">Select Source</option>
                                        <?php for ($i=0; $i <count($lead_source) ; $i++) { ?>
                                          <option value="<?php echo $lead_source[$i]['source_id']; ?>" <?php echo($lead_source[$i]['source_id'] == set_value('source_id'))?'selected':'' ?>><?php echo ucfirst($lead_source[$i]['source_name']); ?></option>
                                        <?php } ?>
                                    </select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
        			    </div>
        			</div>
        			
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Height</label>
                				<div class="col-lg-4 col-md-9 col-sm-12">
                					<select class="form-control m-input heightClass" name="height">
                						<option value="0"> 0 (ft) </option> 
                                        <option value="1"> 1 (ft) </option>
                                        <option value="2"> 2 (ft) </option>
                                        <option value="3"> 3 (ft) </option>
                                        <option value="4"> 4 (ft) </option>
                                        <option value="5" selected="selected"> 5 (ft) </option>
                                        <option value="6"> 6 (ft) </option>
                                        <option value="7"> 7 (ft) </option>
                					</select>
                				</div>
                				<div class="col-lg-4 col-md-9 col-sm-12">
                				    <select class="form-control m-input" name="inch">
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
        			    </div>
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Weight</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                				    <input type="text" class="form-control m-input" name="weight" placeholder="Enter Weight">
                				</div>
                			</div>
        			    </div>
        			</div>
        			
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Medical Issue</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                				    <input type="text" class="form-control m-input" name="medical_isuue" placeholder="Enter Medical Issue">
                				</div>
                			</div>
        			    </div>
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Lead Status</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                				    <select name="status_id" class="form-control m-input statusClass">
                                        <option value="">Select Lead Status</option>
                                        <?php for ($k=0; $k <count($lead_status) ; $k++) { ?>
                                          <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    
                				</div>
                			</div>
        			    </div>
        			</div>
        			<div class="row desk_form_padding">
        			    <div class="col-lg-6">
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12">Assign To</label>
                				<div class="col-lg-9 col-md-9 col-sm-12">
                				    <select class="form-control m-input" name="assign_to_add">
                						<option value="">Select</option>
                						<?php
                						
                						    foreach ($assign_to_list as $key => $value) {
                						        if($this->session->balance_session['first_name'] == $value['crm_user']){
                						            echo '<option value='.$value['admin_id'].' selected>'.$value['crm_user'].'</option>';
                						        }else{
                						        echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>';
                						        }
                                            }
                                        ?>
                					</select>
                				</div>
                			</div>
        			    </div>
        			</div>
        			
        		</div>
        		<div class="m-portlet__foot m-portlet__foot--fit">
        			<div class="m-form__actions m-form__actions">
        				<div class="row">
        					<div class="col-lg-12 text-center">
        					    <!--<input type=="submit" name="submit" value="submit" class="btn btn-success">-->
        						<input type="submit" name='submit' class="btn btn-success"></button>
        						<button type="reset" id="reset_form" class="btn btn-secondary">Reset</button>
        					</div>
        				</div>
        			</div>
        		</div>
        	</form>
        	<!--end::Form-->
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
                    state_html += '<option value="'+response.states[i].state_id+'">'+response.states[i].state_name+'</option>';
                    
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
                    state_html += '<option value="'+response.cities[i].city_id+'">'+response.cities[i].city_name+'</option>';
                    
                });
                
                $('#cities').html(state_html);
                
           }
          });
    });
    
    $(document).ready(function(){
        $("#reset_form").on('click',function(){
            $("#state option").remove();
            $("#cities option").remove();
        });
        
        $("#m_form_1").on("submit", function(){
            var form = $(this);
            var url = "<?= base_url('dashboard/add_lead_data')?>"; 
            $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
            //   dataType:'json',
               beforeSend:function(){
                 $("#cover-spin").show();  
               },
               success: function(response){
                   alert(response);
                   
                   $("#cover-spin").hide();  
                }
            });
            
        });
    });
    
    </script>