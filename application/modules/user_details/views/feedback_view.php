<?php
    $comment=array('1'=>'Can Do Better','2'=>'Fair','3'=>'Good','4'=>'Very Good','5'=>'Excellent');
?>

<div class="m-accordion m-accordion--default" id="m_accordion_feedback" role="tablist">
    <div class="m-accordion__item m-accordion__item--metal">
       <div class="m-accordion__item-head p-2 collapsed" role="tab" id="m_accordion_feedback_1_head " data-toggle="collapse" href="#m_accordion_feedback_1_body" aria-expanded="false">
           
           <span class="m-accordion__item-title" style="color:#000 !important">Halftime  Feedback</span>
           
           <span class="m-accordion__item-mode" style="color: #343a40!important;"></span>     
       </div>
    
       <div class="m-accordion__item-body collapse" id="m_accordion_feedback_1_body" role="tabpanel" aria-labelledby="m_accordion_feedback_1_head" data-parent="#m_accordion_feedback"> 
           <div class="m-accordion__item-content p-2">
               <table class='table table-bordered tabprofile_table m-table m-table--border-brand'>
                    <?php 
                    foreach ($halftime_feedback[0]['result'] as $value) { ?>
                    <tr>
                        <th>Program Name</th>
                        <td><?php echo $value['program_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email-id</th>
                        <td><?php echo $value['email_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Diet Feedback</th>
                        <td><?php echo $comment[$value['diet_feedback']];  ?></td>
                    </tr>
                    <tr>
                        <th>Tracker Feedback</th>
                        <td><?php echo $comment[$value['tracker_feedback']]; ?></td>
                    </tr>
                    <tr>
                        <th>Mentor Chat Feedback</th>
                        <td><?php echo $comment[$value['mentor_chat_feedback']]; ?></td>
                    </tr>
                    <tr>
                        <th>Refer BN Restaurant Guide</th>
                        <td><?php echo ($value['refer_bn_restaurant_guide']!=0) ? 'Yes' : 'No' ; ?></td>
                    </tr>
                    <tr>
                        <th>Refer BN Eat_in Portion</th>
                        <td><?php echo ($value['refer_bn_eat_in_portion']!=0) ? 'Yes' : 'No' ; ?></td>
                    </tr>
                    <tr>
                        <th>Refer BN Faq</th>
                        <td><?php echo ($value['refer_bn_faq']!=0) ? 'Yes' : 'No' ; ?></td>
                    </tr>
                    <tr>
                        <th>Refer BN Daily Essentials</th>
                        <td><?php echo ($value['refer_bn_daily_essentials']!=0) ? 'Yes' : 'No' ; ?></td>
                    </tr>
                    <tr>
                        <th>Follow Social Media</th>
                        <td><?php echo ($value['follow_social_media']!=0) ? 'Very Much' : 'Not Much' ; ?></td>
                    </tr>
                    <tr>
                        <th>Mentor Star Rating</th>
                        <td><?php for ($i=0; $i < $value['mentor_star_rating']; $i++) { ?>
                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                        <?php }; ?></td>
                    </tr>
                    <tr>
                        <th>Improvement Needed</th>
                        <td><?php echo $value['improvement_needed']; ?></td>
                    </tr>
                    <tr>
                        <th>Milestone</th>
                        <td><?php echo !empty($value['milestone']) ? $value['milestone'] : 'NA'; ?></td>
                    </tr>
                    <tr>
                        <th>Posted Date</th>
                        <td><?php echo $value['added_date']; ?></td>
                    </tr>        
                    <?php } ?>
                </table>
           </div>
        </div>
    </div>
    
    <div class="m-accordion__item m-accordion__item--metal">
       <div class="m-accordion__item-head p-2 collapsed" role="tab" id="m_accordion_feedback_3_head " data-toggle="collapse" href="#m_accordion_feedback_3_body" aria-expanded="false">
           
           <span class="m-accordion__item-title" style="color:#000 !important">Program Feedback</span>
           
           <span class="m-accordion__item-mode" style="color: #343a40!important;"></span>     
       </div>
    
       <div class="m-accordion__item-body collapse" id="m_accordion_feedback_3_body" role="tabpanel" aria-labelledby="m_accordion_feedback_3_head" data-parent="#m_accordion_feedback"> 
           <div class="m-accordion__item-content p-2">
               <table class='table table-bordered tabprofile_table m-table m-table--border-brand'>
                    <?php
                        foreach ($final_feedback[0]['result'] as  $values) { ?>
                       <tr>
                            <th>Program Name</th>
                            <td><?php echo  ucwords(strtolower($values['program_name'])); ?></td>
                        </tr>
                        <tr>
                            <th>Email-id</th>
                            <td><?php echo $values['email_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Online Health Program</th>
                            <td><?php echo $comment[$values['online_health_program']]; ?></td>
                        </tr>
                        <tr>
                            <th>Ekit Feedback</th>
                            <td><?php echo $comment[$values['ekit_feedback']]; ?></td>
                        </tr>
                        <tr>
                            <th>Follow Up</th>
                            <td><?php echo $comment[$values['follow_up']]; ?></td>
                        </tr>
                        <tr>
                            <th>Mentor Feedback	</th>
                            <td><?php echo $comment[$values['mentor_feedback']]; ?></td>
                        </tr>
                        <tr>
                            <th>Favourite Recipe</th>
                            <td><?php echo $values['favourite_recipe']; ?></td>
                        </tr>
                        <tr>
                            <th>Super Food</th>
                            <td><?php echo $values['superfood']; ?></td>
                        </tr>
                        <tr>
                            <th>Unhealthy Food</th>
                            <td><?php echo $values['unhealthy_food']; ?></td>
                        </tr>
                        <tr>
                            <th>Restaurant Guide Usage</th>
                            <td><?php echo $values['restaurant_guide_usage']; ?></td>
                        </tr>
                        <tr>
                            <th>Recipe and Blog Usage</th>
                            <td><?php echo $values['recipe_and_blog_usage']; ?></td>
                        </tr>
                        <tr>
                            <th>Most used My-account Section</th>
                            <td><?php echo $values['most_used_myaccount_section']; ?></td>
                        </tr>
                        <tr>
                            <th>Friend Recommendation</th>
                            <td><?php echo ($values['friend_recommendation']!=0) ? 'Yes' : 'No'; ?></td>
                        </tr>   
                        <tr>
                            <th>Posted Date </th>
                            <td><?php echo $values['added_date']; ?></td>
                        </tr>     
                    <?php }
                    ?>
                </table>
           </div>
        </div>
    </div>
</div>
