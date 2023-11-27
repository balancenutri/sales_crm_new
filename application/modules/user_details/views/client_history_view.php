<div class="m-accordion m-accordion--default" id="m_accordion_profile" role="tablist">
    
    <div class="m-accordion__item m-accordion__item--success  position-relative">
       <div class="m-accordion__item-head p-1 px-2 collapsed" role="tab" id="m_accordion_current_head " data-toggle="collapse" href="#m_accordion_current_body" aria-expanded="false">
           <span class="m-accordion__item-title" style="color: #000 !important;">Current Program</span>
           <span class="m-accordion__item-mode" style="color: #343a40!important;"></span>     
       </div>
    
       <div class="m-accordion__item-body collapse" id="m_accordion_current_body" role="tabpanel" aria-labelledby="m_accordion_current_head" data-parent="#m_accordion_profile"> 
           <div class="m-accordion__item-content p-2">
               <div class="current_pro_data">
                    <?php
                
                       $i=count($current_program_history[0]['result']);
                       foreach ($current_program_history[0]['result'] as $key => $value) {
                           $total_session=$value['program_session'];
                           ?>
                
                         <table class="table table-bordered tabprofile_table m-table m-table--border-brand m-table--head-bg-brand text-left">
                            <tbody>
                                <tr>
                                    <th style="width:120px"><b>Session:</b></th>
                                    <td>
                                        <?php echo $value['program_session']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:120px"><b>Completed:</b></th>
                                    <td>
                                        <?php echo $completed_session=$value['session_count']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:120px"><b>Pending:</b></th>
                                    <td>
                                        <?php echo $total_session-$completed_session; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:120px"><b>Amount:</b></th>
                                    <td>
                                        <?php echo $value['amount']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:120px"><b>Balance:</b></th>
                                    <td>
                                        <?php echo $value['balance']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:120px"><b>Purchase Date:</b></th>
                                    <td>
                                        <?php echo date('dS, M Y',strtotime($value['date'])); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:120px"><b>Expiry Date:</b></th>
                                    <td>
                                        <?php $expdate = date('dS, M Y',strtotime($value['extended_date']));
                                            if($expdate == '01-01-1970')
                                               {
                                                  $expdate =  date('dS, M Y',strtotime($value['exp_date']));
                                               }
                                               echo $expdate;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:120px"><b>Diet Name Sent:</b></th>
                                    <td>
                                        <ul class="pl-3">
                                        <?php foreach($diet_names[0]['result'] as $diet_na)
                                       {
                                          if($value['order_id']==$diet_na['order_id'])
                                          {
                                             print_r('<li>'.$diet_na['diet_name'].'</li>');
                                          }                              
                                       } ?>
                                       </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                
                          <?php                      
                       $i--; }                   
                    ?>
                 </div>
           </div>
        </div>
    </div>
    
    <div class="m-accordion__item m-accordion__item--metal position-relative">
       <div class="m-accordion__item-head p-1 px-2 collapsed" role="tab" id="m_accordion_profile_item_2_head " data-toggle="collapse" href="#m_accordion_profile_item_2_body" aria-expanded="false">
           <!-- <span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span> -->
           <span class="m-accordion__item-title" style="color:#000 !important">Older Programs</span>
                
           <span class="m-accordion__item-mode" style="color: #343a40!important;"></span>     
       </div>
    
       <div class="m-accordion__item-body collapse" id="m_accordion_profile_item_2_body" role="tabpanel" aria-labelledby="m_accordion_profile_item_2_head" data-parent="#m_accordion_profile"> 
           <div class="m-accordion__item-content p-2">
               
               <div>
                <?php
            
                   $i=count($old_program_history[0]['result']);
                   
                   foreach ($old_program_history[0]['result'] as $key => $value) {
                       $total_session=$value['program_session'];
                       ?>
                       
                       <div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_oldPro_<?php echo $i; ?>" role="tablist">
                            <!--begin::Item-->              
                            <div class="m-accordion__item" style="border: 1px solid #000;">
                                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_oldPro_<?php echo $i; ?>_item_1_head" data-toggle="collapse" href="#m_oldPro_<?php echo $i; ?>_item_1_body" aria-expanded="false" style="background-color: transparent !important;">
                                    <span class="m-accordion__item-title" style="color: #000 !important;<?php if($value['order_id']==$active_order_id){ echo 'color:green'; } ?> "> <?php echo ucwords(strtolower($value['program_name'])).' ('.$value['program_session'].'S)'; ?> <?php if($value['order_id']==$active_order_id){ echo '<span><b>Current Program</b><br></span>'; } ?></span>
                                    <span class="m-accordion__item-mode"></span>     
                                </div>
        
                                <div class="m-accordion__item-body collapse" id="m_oldPro_<?php echo $i; ?>_item_1_body" role="tabpanel" aria-labelledby="m_oldPro_<?php echo $i; ?>_item_1_head" data-parent="#m_oldPro_<?php echo $i; ?>" style=""> 
                                    <div class="m-accordion__item-content p-2">
                                        <table class="table table-bordered tabprofile_table m-table m-table--border-brand m-table--head-bg-brand text-left">
                                            <tbody>
                                                <tr>
                                                    <th style="width:120px"><b>Session:</b></th>
                                                    <td>
                                                        <?php echo $value['program_session']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width:120px"><b>Completed:</b></th>
                                                    <td>
                                                        <?php echo $completed_session=$value['session_count']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width:120px"><b>Pending:</b></th>
                                                    <td>
                                                        <?php echo $total_session-$completed_session; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width:120px"><b>Amount:</b></th>
                                                    <td>
                                                        <?php echo $value['amount']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width:120px"><b>Balance:</b></th>
                                                    <td>
                                                        <?php echo $value['balance']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width:120px"><b>Purchase Date:</b></th>
                                                    <td>
                                                        <?php echo date('dS, M Y',strtotime($value['date'])); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width:120px"><b>Expiry Date:</b></th>
                                                    <td>
                                                        <?php $expdate = date('dS, M Y',strtotime($value['extended_date']));
                                                            if($expdate == '01-01-1970')
                                                               {
                                                                  $expdate =  date('dS, M Y',strtotime($value['exp_date']));
                                                               }
                                                               echo $expdate;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width:120px"><b>Diet Name Sent:</b></th>
                                                    <td>
                                                        <ul class="pl-3">
                                                        <?php foreach($diet_names[0]['result'] as $diet_na)
                                                       {
                                                          if($value['order_id']==$diet_na['order_id'])
                                                          {
                                                             print_r('<li>'.$diet_na['diet_name'].'</li>');
                                                          }                              
                                                       } ?>
                                                       </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>    
                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
            
                      <?php                      
                   $i--; }                   
                ?>
             </div>
                 
           </div>
        </div>
    </div>
    
    <div class="m-accordion__item m-accordion__item--info <?php if($value['order_id']==$active_order_id){ echo ''; } else{ echo ''; } ?>">
        <div class="m-accordion__item-head p-1 px-2 collapsed" role="tab" id="m_accordion_profile_item_1_head " data-toggle="collapse" href="#m_accordion_profile_item_1_body" aria-expanded="false">
          <!-- <span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span> -->
          <span class="m-accordion__item-title">Advanced Purchase Programs</span>
               
          <span class="m-accordion__item-mode" style="color: #343a40!important;"></span>     
        </div>
    
        <div class="m-accordion__item-body collapse" id="m_accordion_profile_item_1_body" role="tabpanel" aria-labelledby="m_accordion_profile_item_1_head" data-parent="#m_accordion_profile"> 
            <div class="m-accordion__item-content p-2">
                <?php
                    $i=1;
                    foreach ($program_history[0]['result'] as $key => $value) {
                ?>
                <table class="table table-bordered m-table <?php if($value['order_id']!=$active_order_id){ echo 'm-table--border-black m-table--head-bg-black'; } else{ echo 'm-table--border-brand  m-table--head-bg-brand'; } ?>">
                    <thead <?php if($value['order_id']!=$active_order_id){ echo 'style="text-align: center;"'; } else{ echo 'style="display:none"'; } ?>>
                        <tr>
                            <th colspan="2"><?php if($value['order_id']!=$active_order_id){ echo '<b>'. ucwords(strtolower($value['program_name'])).' ( '.$value['program_session'].'s )'.'</b>'; } if($value['program_type']==1){ ?> <a href="<?php echo base_url('client-details/'.$value['userid'].'/short-program'); ?>"><button class="btn-sm btn btn-warning float-right">Start Now</button><?php } ?></th>
                        </tr>
                    </thead>
                              <tbody>
                                 <tr style="display:none">
                                    <td><b><?php echo $i; ?>. Program Name:</b></td>
                                    <td><?php echo ucwords(strtolower($value['program_name'])).' ( '.$value['program_session'].'s )'; ?></td>
                                 </tr>
                                 
                                 <?php
                                  if($value['amount_type'] == 'D'){
                                      $amount_type = '$';
                                  }else{
                                      $amount_type = 'Rs.';
                                  }
                                  ?>
                                   <tr>
                                     <th><b>Amount Paid:</b></th>
                                     <td>
                                        <?php echo (!empty($value['amount']))?$amount_type.' '.$value['amount']:0; ?>
                                     </td>
                                  </tr>
                                  
                                 <tr <?php if($value['order_id']==$active_order_id){ echo 'style="display:none"'; }?>>
                                    <td><b>Balance:</b></td>
                                    <td>
                                       <?php echo $value['balance']; ?>
                                    </td>
                                 </tr>
                                 <tr <?php if($value['order_id']==$active_order_id){ echo 'style="display:none"'; }?>>
                                    <td><b>Purchase Date:</b></td>
                                    <td>
                                       <?php echo date('dS, M Y',strtotime($value['date'])); ?>
                                    </td>
                                 </tr>
                                 <tr <?php if($value['order_id']==$active_order_id){ echo 'style="display:none"'; }?>>
                                    <td><b>Start Date:</b></td>
                                    <td>
                                       <?php if($value['start_date_set'] == 0){ ?>    
                                        <span class="d-block"><?php echo date('dS, M Y',strtotime($value['start_date'])); ?> <span class="pr-2"><b>(System Date)</b></span><br><a id="" class="btn btn-primary btn-sm py-0 px-2 start_date_set_date text-white" href="#" style="font-size: larger;"><b>Please Change</b></a> </span>
                                       <?php }else if ($value['start_date_set'] == 1){ ?>
                                        <span class="d-block"><?php echo date('dS, M Y',strtotime($value['start_date'])); ?> <span class="pr-2"><b>(Set by Client)</b></span><br> <a id="" class="btn btn-primary btn-sm py-0 px-2 start_date_set_date" href="#" style="font-size: larger;"><b>Update Start Date</b></a></span>
                                       <?php }else if ($value['start_date_set'] == 2){ ?>
                                        <span class="d-block"><?php echo date('dS, M Y',strtotime($value['start_date'])); ?> <span class="pr-2"><b>(Set by Mentor)</b></span><br> <a id="" class="btn btn-primary btn-sm py-0 px-2 start_date_set_date" href="#" style="font-size: larger;"><b>Update Start Date</b></a></span>
                                        <?php } ?>
                                        <span class="d-none" id="set_date_profile_sec">
                                            <!--<div class="input-group date my-2">-->
                                         	  <!--  <input type="text" class="form-control m-input set_prog_start_date" readonly  placeholder="Select date" id="set_prog_start_date_<?=$value['order_id']?>"/>-->
                                        		  <!--  <div class="input-group-append">-->
                                        			 <!--   <button class="btn btn-success" id="save_prog_start_date" data-id="<?=$value['order_id'] ?>" data-name="<?=$value['program_name']?>">-->
                                        			 <!--       Submit-->
                                       				 <!--   </button>-->
                                       			  <!--  </div>-->
                                           	<!--	</div>-->
                                           	
                                           	<br>
                                           		<div class="input-daterange input-group">
                            						<input type="text" class="form-control m-input dpd1 text-left set_prog_start_date"  placeholder=" Select Date" id="set_prog_start_date_<?=$value['order_id']?>" >
                            						<div class="input-group-append">
                                						<span class="input-group-text">
                                        					<i class="la la-calendar"></i>
                                        				</span>
                                    				</div>
                            					</div>
                            					<br>
                            					<div class="text-center mb-2">
                                                      <button type="button" class="btn btn-success submitBtnCss btn-sm" id="save_prog_start_date" data-id="<?=$value['order_id'] ?>" data-name="<?=$value['program_name']?>">Submit</button>
                                                  </div>
                                           		
                                       </span>
                                       
                                    </td>
                                 </tr>
                                 <tr <?php //if($value['order_id']==$active_order_id){ echo 'style="display:none"'; }?> style="display:none">
                                    <td><b>Expiry Date:</b></td>
                                    <td>
                                       <?php $expdate = date('dS, M Y',strtotime($value['extended_date']));
                                           if($expdate == '01-01-1970')
                                             {
                                                $expdate =  date('dS, M Y',strtotime($value['exp_date']));
                                             }
                                             echo $expdate;
                                       ?>
                                    </td>
                                 </tr>
                              </tbody>
               </table>
            <?php $i++; } ?>
            </div>
        </div>
    </div>
</div>