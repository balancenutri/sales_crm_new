<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    font-weight:bold !important;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

tr:nth-child(2n) {
    background-color: #fff !important;
}

</style>
    <div class="m-accordion m-accordion--bordered" id="m_accordion_tracker" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item m-accordion__item--success">
            <div class="m-accordion__item-head px-3 py-1" role="tab" id="m_accordion_6_item_3_head" data-toggle="collapse" href="#m_accordion_all_tracker" aria-expanded="false" style="position: relative;">
                <!-- <span class="m-accordion__item-icon"><i class="fa flaticon-placeholder"></i></span> -->
                <span class="m-accordion__item-title">All Tracker </span>
                <div class="badge badge-light badge-pill" style="position: absolute; right: 50px; top: 9px; ">
                    <span style="color: #000 !important">Color: </span>
                    <span style="color:red;"> Gain | </span>
                    <span style="color:green;">Loss | </span>
                    <span style="color:black;">No Change </span>
                </div>
                     
                <span class="m-accordion__item-mode" style="color:#000 !important"></span>     
            </div>

            <div class="m-accordion__item-body collapse show p-3" id="m_accordion_all_tracker" role="tabpanel" aria-labelledby="m_accordion_6_item_3_head" data-parent="#m_accordion_tracker">
                <?php if(!empty($wmr_order_details['result'])) { ?>
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--full-height mb-2">
                    <div class="m-portlet__head py-2 px-3">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title w-100" style="position: relative;">
                                <h3 style="font-weight: bold;display: block;padding: 10px 0 0;font-size: 16px;" class="m-portlet__head-text">
                                    Weight Tracker &nbsp;&nbsp; <a class="inchloss-popover" tabindex="0" data-toggle="popover"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 1rem;color: #000;"></i></a>
                                    <a target="_blank" style="display: block; font-size: 14px; font-weight: normal;padding: 10px 0 0;text-decoration: none;color:#000000;" href="<?php echo base_url('client/view_diet_new/'.$diet_details[0]['diet_id']); ?>">Diet Sent: <?php echo $diet_details[0]['diet_name']; ?></a> 
                
                
                                    <!--<a target="_blank" href="<?php echo $weight_tracker_link; ?>" class="btn btn-info btn-sm" title="View Entire Weight Tracker" style="padding: 4px;line-height: 1;position: absolute;right: 0;top: 10px;"><i class="fa fa-eye"></i></a>-->
                                    
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
        <!--begin::Section-->                                            
        <div class="m-accordion m-accordion--bordered" id="m_accordion_6" role="tablist">   

            <?php $i=1; $bg_color=array('','success','warning','primary','danger','warning','primary','danger','warning','primary','danger'); foreach ($wmr_order_details['result'] as $wmr) { ?>
               

                <!--begin::Item-->              
            <div class="m-accordion__item m-accordion__item--<?php echo $bg_color[$i]; ?>">
                <div class="m-accordion__item-head <?php if($i!=1){ echo 'collapsed'; } ?>"  role="tab" id="m_accordion_1_item_<?php echo $i; ?>_head" data-toggle="collapse" href="#m_accordion_1_item_<?php echo $i; ?>_body" aria-expanded="<?php if($i=="1"){ echo 'true'; }else{ echo 'false'; }?>">
                    <span class="m-accordion__item-icon"><i class=""></i></span>
                    <span class="m-accordion__item-title"><?php echo ucwords(strtolower($wmr['program_name'])).' ('.$wmr['program_session'].'s)'; echo ($i==1)? ' (Current Program)':''; ?></span>                         
                    <span class="m-accordion__item-mode"></span>     
                </div>

                <div class="m-accordion__item-body collapse <?php if($i==1){ echo 'show'; } ?>" id="m_accordion_1_item_<?php echo $i; ?>_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_<?php echo $i; ?>_head" data-parent="#m_accordion_6"> 
                    <div class="m-accordion__item-content">
                        <!--begin::Section-->
                        <div class="m-section">
                            <div class="m-section__content table-responsive">
                                <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Session</th>
                                            <th class="text-center">Day</th>
                                            <th class="text-center">Weight (kg)</th>
                                            <th class="text-center">Difference (kg)</th>
                                            <th class="text-center" style="min-width:80px;position:relative">Mentor Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 


                                    foreach ($weight_tracker[0]['result'] as $key => $row) 
                                    {
                                        
                                        $status = array('Active','Onhold','Dormant','PreMaintenance','Expiry','Renewed','Transfer','notstarted');
                                        
                                        $prev = array_key_exists( ($key - 1), $weight_tracker[0]['result']) ? $weight_tracker[0]['result'][($key - 1)] : $row;

                                        $next = array_key_exists( ($key + 1), $weight_tracker[0]['result']) ? $weight_tracker[0]['result'][($key + 1)] : $row;




                                        if(isset($weight_tracker[0]['result'][$key-1]))
                                        {
                                            $prev_order = $weight_tracker[0]['result'][$key-1]['order_id'];
                                            $prev_weight = $weight_tracker[0]['result'][$key-1]['weight'];
                                        }
                                        else
                                        {
                                            $prev_order = 0;
                                        }

                                        if(isset($weight_tracker[0]['result'][$key+1]))
                                        {
                                            $next_order = $weight_tracker[0]['result'][$key+1]['order_id'];
                                        }
                                        else
                                        {
                                            $next_order = 0;
                                        }

                                        // if ($prev['weight'] > $row['weight'])
                                        // {
                                        // $color = "green";
                                        // }
                                        // elseif ($prev['weight'] < $row['weight']){
                                        //     $color = "red";
                                        // }
                                        // else{
                                        //     $color = "black";
                                        // }

                                        if($row['diffrence']<0)
                                        {
                                            $color="green";
                                        }elseif($row['diffrence']>0)
                                        {
                                            $color="red";
                                        }else{
                                            $color="black";
                                        }
                                        
                                        if($weight_tracker[0]['result'][$key]['order_id']==$wmr['order_id']){
                                    ?>
                                        <tr style="background-color:<?php echo ($row['weight_acknowledge']==1) ? '#efefef !important' : '#ffffff !important'; ?>">                                    
                                            <td class="text-center"><?php echo date('dS, M Y | h:i a',strtotime($row['posted_date'])); ?></td>
                                              
                                            <th class="text-center"><?php echo $row['session']; ?></th>
                                            <td class="text-center">
                                                <?php 
                                                    
                                                    $day=explode(' ',$row['session_days']); 
                                                    
                                                    if($day[0]==0)
                                                    {
                                                        echo "St. wt";
                                                    }elseif ($day[0]==2) {
                                                        # code...
                                                        echo "Ot. wt";
                                                    }else{
                                                        echo $day[0];    
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center"><?php echo $row['weight']; ?></td>
                                            <td class="text-center" style="color:<?php echo $color; ?>"><?php echo $row['diffrence']; ?></td>
                                            <td class="text-center">
                                            <?php if(date('Y-m-d H:i:s',strtotime('+2 days',strtotime($row['posted_date'])))>=date('Y-m-d H:i:s') || $row['weight_acknowledge']==0){ ?> 
                                            <span>
                                                <!--<a title="Edit" class="curser" href="<?php //echo base_url('client-details/edit-weight-tracker/').$row['user_id'].'/'.$row['wmr_id']; ?>" target="_blank"><i style="font-size: 20px;" class="text-info fa fa-edit fa-4x"></i></a>-->
                                            <span style="font-size: 20px;" >|</span>
                                                <!--<a title="Delete" onclick="del_common('wmr_id',<?php //echo $row['wmr_id']; ?>,'weight_monitor_record','<?php //echo base_url('client-details/').$row['user_id'].'/'.'weight-tracker'; ?>')"><i style="font-size: 20px;" class="fa fa-trash text-danger fa-4x curser"></i></a>-->
                                            <span style="font-size: 20px;" >|</span>
                                                <!--<a title="Reply" href="<?php //echo base_url('client-details/').$row['user_id'].'/chat'; ?>"><i style="font-size: 20px;" class="text-warning fa fa-reply curser fa-4x"></i></a>-->
                                            <?php if($row['weight_acknowledge']==0){ ?>
                                                <span style="font-size: 20px;" >|</span>
                                                    <!--<a title="Acknowledge" onclick="commonWmrAcknowledge('<?php //echo $row['user_id'];?>','<?php //echo $row['wmr_id']; ?>')";><i style="font-size: 20px;" class="text-success fa fa-check curser"></i></a>               -->
                                                    <?php } }else{
                                                    echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                                } ?>
                                            </span></td>  
                                        </tr> 
                                    <?php } }                   
                                    ?>
                                                                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                </div>
            </div>
            <!--end::Item-->


            <?php $i++; }?>
            

        </div>
        <!--end::Section-->   
    </div>
                </div>
                <!--end::Portlet-->
                
                <?php } ?>
                
                <?php if(!empty($ilt_order_details['result'])) { ?>
                <div class="m-portlet m-portlet--full-height mb-2">
                    <div class="m-portlet__head py-2 px-3" style="height: 40px;">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title w-100" style="position: relative;">
                                <h3 class="m-portlet__head-text" style="font-weight: bold;display: block;padding: 10px 0 0; font-size: 16px;">
                                    Inchloss Tracker 
                                    <a class="inchloss-popover" tabindex="0" data-toggle="popover" data-original-title="" title=""><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 1rem;color: #000;"></i></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                   
<div class="m-portlet__body">
        <!--begin::Section-->                                            
        <div class="m-accordion m-accordion--bordered" id="m_accordion_6" role="tablist">   

            <?php $i=1; $bg_color=array('','success','warning','primary','danger','warning','primary','danger','warning','primary','danger','success','warning','primary','danger'); foreach ($ilt_order_details['result'] as $ilt) { ?>
               

                <!--begin::Item-->              
            <div class="m-accordion__item m-accordion__item--<?php echo $bg_color[$i]; ?>">
                <div class="m-accordion__item-head <?php if($i!=1){ echo 'collapsed'; } ?>"  role="tab" id="m_accordion_2_item_<?php echo $i; ?>_head" data-toggle="collapse" href="#m_accordion_2_item_<?php echo $i; ?>_body" aria-expanded="<?php if($i=="1"){ echo 'true'; }else{ echo 'false'; }?>">
                    <span class="m-accordion__item-icon"><i class=""></i></span>
                    <span class="m-accordion__item-title"><?php echo ucwords(strtolower($ilt['program_name'])).' ('.$ilt['program_session'].'s)'; echo ($i=='1')? ' (Current Program )': ''; ?></span>                         
                    <span class="m-accordion__item-mode"></span>     
                </div>

                <div class="m-accordion__item-body collapse <?php if($i==1){ echo 'show'; } ?>" id="m_accordion_2_item_<?php echo $i; ?>_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_<?php echo $i; ?>_head" data-parent="#m_accordion_2"> 
                    <div class="m-accordion__item-content">
                        <!--begin::Section-->
                        <div class="m-section">
                            <div class="m-section__content table-responsive">
                           <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                              <thead>
                                 <tr>               
                                    <th class="text-center" style="min-width:180px;position:relative">Date</th>
                                    <th class="text-center" >Session</th>                
                                    <th class="text-center">Day</th>                
                                    <th class="text-center" >Chest</th>
                                    <th class="text-center">Waist</th>                
                                    <th class="text-center" >Hip</th>               
                                    <th class="text-center" style="min-width:80px;position:relative">Mentor Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $numItems = count($inch_loss_tracker[0]['result'] );
                                    $i=1;
                                    foreach ($inch_loss_tracker[0]['result'] as $key => $row) 
                                    { 
                                          if($ilt['order_id']==$row['order_id'])
                                          {
                                                   
                                                $prev = @$inch_loss_tracker[0]['result'][$key-1];
                                                                              
                                                if($prev['waist']<$row['waist'])
                                                {
                                                   $waist="style='color:red;'";
                                                } else if($prev['waist']>$row['waist']){ $waist="style='color:green;'"; }
                                                                                             else if($inch_loss_tracker[0]['result'][0])
                                                {
                                                   $waist="style='color:black;'";
                                                } 
                                                   else { $waist="style='color:black;'";} 


                                                if($prev['hip'] < $row['hip'])
                                                {
                                                   $hip = "style='color:red;'";
                                                } 
                                                else if($prev['hip'] > $row['hip']) {
                                                      $hip = "style='color:green;'";                                                  
                                                }
                                                else { 
                                                   $hip = "style='color:black;'";                                                
                                                }

                                                if($prev['chest'] < $row['chest'])
                                                {
                                                   $chest = "style='color:red;'";
                                                } 
                                                else if($prev['chest'] > $row['chest']) {
                                                      $chest = "style='color:green;'";                                                  
                                                }
                                                else { 
                                                   $chest = "style='color:black;'";                                                
                                                }

                                          
                                                if($i ==1)
                                                {

                                                      $chest="style='color:black;'";
                                                      $waist="style='color:black;'";
                                                      $lower_abdomen="style='color:black;'";
                                                      $hip = "style='color:black;'";
                                                      $navel = "style='color:black;'";
                                                      $flexed_biceps = "style='color:black;'";
                                                      $mid_arm = "style='color:black;'";
                                                      $upper_thigh = "style='color:black;'";
                                                      $calf = "style='color:black;'";
                                                }
                                          
                                                $inch_id=$row['inch_id']; $user_id=$row['user_id']; ?>
                                          <tr style="background-color:<?php echo ($row['ilt_acknowledge']==1) ? '#efefef !important' : '#ffffff !important'; ?>" >
                                                <td class="text-center"><?php echo date('dS, M Y | h:i a',strtotime($row['posted_date'])); ?></td>                                               
                                                <td class="text-center"><?php echo $row['actual_session']; ?></td>
                                                <td class="text-center">
                                                <?php 
                                                    
                                                         $day=explode(' ',$row['session_days']); 
                                                         
                                                         if($day[0]==0)
                                                         {
                                                            echo "St. In";
                                                         }elseif ($day[0]==2) {
                                                            # code...
                                                            echo "Ot. In";
                                                         }else{
                                                            echo $day[0];    
                                                         }
                                                      ?>
                                                </td>                        
                                                <td class="text-center" <?php echo $chest; ?>><?php echo $row['chest']; ?></td>
                                                <td class="text-center" <?php echo $waist; ?>><?php echo $row['waist']; ?></td>
                                                <td class="text-center" <?php echo $hip; ?>><?php echo $row['hip']; ?></td>
                                                <td class="text-center">
                                                <?php if(date('Y-m-d H:i:s',strtotime('+2 days',strtotime($row['posted_date'])))>=date('Y-m-d H:i:s') || $row['ilt_acknowledge']==0){ ?>  
                                                    <a title="Edit" target="_blank" class="update" style="padding: 5px 0px !important;" href="<?php echo base_url('client-details/edit-inchloss-tracker/').$user_id.'/'.$inch_id; ?>"><i style="font-size: 20px;" class="text-info fa fa-edit"></i></a> 
                                                    
                                                    <span style="font-size: 20px;" >|</span>
                                                   
                                                      <a title="Delete" class="delete" style="cursor: pointer; padding: 5px 0px !important;" onclick="del_common('inch_id',<?php echo $inch_id ?>,'inch_loss_tracker','<?php echo base_url('client-details/').$user_id.'/'.'inchloss-tracker'; ?>')"><i style="font-size: 20px;" class="text-danger fa fa-trash"></i></a>

                                                     <span style="font-size: 20px;" >|</span>

                                                      <a title="Reply" target="_blank" class="update" style="padding: 5px 0px !important;" href="<?php echo base_url('client-details/').$user_id.'/chat'; ?>"><i style="font-size: 20px;" class="text-warning fa fa-reply"></i></a> 

                                                     <?php if($row['ilt_acknowledge']==0){ ?>    
                                                     <span style="font-size: 20px;" >|</span>
                                                        <a title="Acknowledge" onclick="commonIltAcknowledge('<?php echo $row['user_id'];?>','<?php echo $row['inch_id'];?>')";>
                                                        <i style="font-size: 20px;" class="text-success fa fa-check curser"></i></a>
                                                        <?php } }else{
                                                            echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                                        } ?>                         
                                                </td>
                                                
                                          </tr>    
                        <?php $i++; } }
                                 ?>            
                              </tbody>
                           </table>
                        </div>
                     </div>
                        <!--end::Section-->
                    </div>
                </div>
            </div>
            <!--end::Item-->


            <?php $i++; }?>
            

        </div>
        <!--end::Section-->   
    </div>
                </div>
                
                <?php } ?>
                
                <?php if(!empty($photo_received)) { ?>
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--full-height mb-0">
                    <div class="m-portlet__head py-2 px-3">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title w-100" style="position: relative;">
                                <h3 class="m-portlet__head-text" style="font-weight: bold;display: block;padding: 10px 0 0; font-size: 16px;">
                                    Photo Tracker
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body px-3 py-4">
                        <div class="m-accordion__item-body collapse show" id="assessment_body" role="tabpanel" aria-labelledby="assessment_head" data-parent="" style="border-top: none;"> 
                            <div class="m-accordion__item-content p-0">
                                <!--begin::Section-->
                                <div class="m-section__content table-responsive">
                                    <?php foreach ($photo_received as $row) { ?>
                                    <div style="padding-top: 15px; padding-bottom: 40px; float: left; margin: 0 25px 0 0;position: relative; text-align:center">
                                            <h4>Session <?php echo $row['actual_session']; ?></h4>
                                        <div>
                                            <!-- <img height="237" width="119" src=""> -->
            
                                            <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox" data-id="https://www.balancenutrition.in/images/profile/progress/<?php echo $row['progress_photo']; ?>"> 
                                                <img height="237" width="115" src="https://www.balancenutrition.in/images/profile/progress/<?php echo $row['progress_photo']; ?>" alt="...">
                                            </a>
                                        </div>
                                    </div> 
                                    <?php } ?>      
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Section-->
                        </div>
                    </div>
                </div>
                <!--end::Portlet-->
                <?php } ?>
                
            </div>
        </div>   
        <!--end::Item-->
    </div>


    <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    

<script>

$(document).ready(function()
{

    var inchloss_popover_content = '<table class="table table-bordered weight-popover-table">\n\
                                     <thead>\n\
                                       <tr><th>Abbr</th><th>Meaning</th></tr>\n\
                                     </thead>\n\
                                     <tbody>\n\
                                       <tr><td>Wt</td><td>Weight</td></tr>\n\
                                       <tr><td>St. wt</td><td>Start Weight</td></tr>\n\
                                       <tr><td>Ot. wt</td><td>Other Weight</td></tr>\n\
                                     </tbody>\n\
                                   </table>';
   $('.inchloss-popover').popover({
   container: 'body',
   placement: 'top',
   targetOffset: '0 75%',
   trigger: 'hover',
   content: inchloss_popover_content,
   html: true
   });

});

$(document).ready(function() {
    var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': "100%",
                'maxHeight': "100%"
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': '100%'});
        $lightbox.find('.close').removeClass('hidden');
    });
});

</script>