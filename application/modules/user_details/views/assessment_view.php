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
<?php
    if(count($assessment[0]['result']) > 0){
        $ass=$assessment[0]['result'][0];
    }
?>

    <div class="m-accordion m-accordion--bordered" id="m_accordion_tracker" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2" role="tab" id="m_accordion_assessment_item_1_head" data-toggle="collapse" href="#m_accordion_assessment_item_1_body" aria-expanded="true">                        
                    <span class="m-accordion__item-title w-100 text-black">Personal Details
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit" data-section= "Personal Details" title="Edit Right" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse show" id="m_accordion_assessment_item_1_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_1_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <?php
                            if(count($assessment[0]['result']) > 0){
                        ?>
                        <div class="table-responsive">
                            <table class="table assessment_tbl table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <tbody>
                                    <?php if($ass['name']!=""){ ?><tr>
                                        <td class="table_col"> Name </td>
                                        <td class="table_cont">
                                            <?php echo ($ass['name'] != "") ? ucfirst($ass['name']) : "--NA--"; ?>
                                        </td>
                                    </tr><?php } ?>
                                    <?php if($ass['address']!="address"){ ?><tr>
                                        <td class="table_col"> Address </td>
                                        <td class="table_cont">
                                            <?php echo ($ass['address'] != "") ? ucfirst($ass['address']) : "--NA--"; ?>
                                        </td>
                                    </tr><?php } ?>
                                    <?php if($ass['country'] !=""){ ?><tr>
                                        <td class="table_col"> Country </td>
                                        <td class="table_cont"><?php echo ($ass['country'] != "") ? ucfirst($ass['country']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['state']!=""){ ?><tr>
                                        <td class="table_col"> State </td>
                                        <td class="table_cont"><?php echo ($ass['state'] != "") ? ucfirst($ass['state']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['city']!=""){ ?><tr>
                                        <td class="table_col"> City </td>
                                        <td class="table_cont"><?php echo ($ass['city'] != "") ? ucfirst($ass['city']) : '--NA--'; ?></td>
                                    </tr><?php } ?>
                                    <?php /* if(1==1){ ?><tr>
                                        <td class="table_col"> Weather </td>
                                        <td class="table_cont"><?php echo (@$temperature['max_temp']!="") ? round(@$temperature['max_temp']) : 0 ;?> C째 <img style="float:left;height:64px;width:64px" alt="Smoke" src="//ssl.gstatic.com/onebox/weather/64/fog.png" id="wob_tci" onload="typeof google === 'object' & amp; & amp; google.aft & amp; & amp; google.aft(this)"></td>
                                    </tr><?php } */?>
                                    <?php if($ass['birth_date']!=""){ ?><tr>
                                        <td class="table_col"> Birth date </td>
                                        <td class="table_cont"><?php echo ($ass['birth_date'] != "") ? ucfirst($ass['birth_date']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['age']!=""){ ?><tr>
                                        <td class="table_col"> Age </td>
                                        <td class="table_cont"><?php echo ($ass['age'] != "") ? ucfirst($ass['age']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['mobile_no']!=""){ ?><tr>
                                        <td class="table_col"> Phone Number </td>
                                        <td class="table_cont"><?php echo ($ass['mobile_no'] != "") ? ucfirst($ass['mobile_no']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['email_id']!=""){ ?><tr>
                                        <td class="table_col"> Email </td>
                                        <td class="table_cont"><?php echo ($ass['email_id'] != "") ? ucfirst($ass['email_id']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['gender']!=""){ ?><tr>
                                        <td class="table_col"> Gender </td>
                                        <td class="table_cont"><?php echo ($ass['gender'] != "") ? ucfirst($ass['gender']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['caste']!=""){ ?><tr>
                                        <td class="table_col"> Caste </td>
                                        <td class="table_cont"><?php echo ($ass['caste'] != "") ? ucfirst($ass['caste']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['other_caste']!=""){ ?><tr>
                                        <td class="table_col">Other Caste</td>
                                        <td class="table_cont"><?php echo ($ass['other_caste'] != "") ? ucfirst($ass['other_caste']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['height']!=""){ ?><tr>
                                        <td class="table_col"> Height </td>
                                        <td class="table_cont"><?php echo ($ass['height'] != "") ? ucfirst($ass['height']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['weight']!=""){ ?><tr>
                                        <td class="table_col"> Weight </td>
                                        <td class="table_cont"><?php echo ($ass['weight'] != "") ? ucfirst($ass['weight']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['goal_weight']!=""){ ?><tr>
                                        <td class="table_col">Target Weight </td>
                                        <td class="table_cont"><?php echo ($ass['goal_weight'] != "") ? ucfirst($ass['goal_weight']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['other_goal']!=""){ ?><tr>
                                        <td class="table_col">Other Goal</td>
                                        <td class="table_cont"><?php echo ($ass['other_goal'] != "") ? ucfirst($ass['other_goal']) : "--NA--"; ?></td>
                                    </tr><?php } ?>            
                                    <?php if($ass['family']!=""){ ?><tr>
                                        <td class="table_col"> Type of family </td>
                                        <td class="table_cont"><?php echo ($ass['family']) ? ucfirst($ass['family']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['martial_status']!=""){ ?><tr>
                                        <td class="table_col"> Marital Status </td>
                                        <td class="table_cont"><?php echo ($ass['martial_status'] != "") ? ucfirst($ass['martial_status']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if(strtolower($ass['child_status'])=="yes"){ if($ass['child_status']!=""){ ?><tr>
                                        <td class="table_col">Do you have child</td>
                                        <td class="table_cont"><?php echo ($ass['child_status'] != "") ? ucfirst($ass['child_status']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php /* if(strtolower($ass['child_status'])=="yes"){ if($ass['no_children']!=""){ ?><tr>
                                        <td class="table_col"> No of Child </td>
                                        <td class="table_cont"><?php echo ($ass['no_children'] != "") ? ucfirst($ass['no_children']) : "--NA--"; ?></td>
                                    </tr><?php } */ ?>
                                    <?php if($ass['no_children']>="1" || $ass['age_child1']!=""){ ?><tr>
                                        <td class="table_col"> Age of Youngest Child </td>
                                        <td class="table_cont"><?php echo ($ass['age_child1'] != "") ? ucfirst($ass['age_child1']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php /*  if($ass['no_children']>="2" && $ass['age_child2']!=""){ ?><tr>
                                        <td class="table_col"> Age of child 2 </td>
                                        <td class="table_cont"><?php echo ($ass['age_child2'] != "") ? ucfirst($ass['age_child2']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['no_children']>="3" && $ass['age_child3']!=""){ ?><tr>
                                        <td class="table_col"> Age of child 3 </td>
                                        <td class="table_cont"><?php echo ($ass['age_child3'] != "") ? ucfirst($ass['age_child3']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['no_children']>="4" && $ass['age_child4']!=""){ ?><tr>
                                        <td class="table_col"> Age of child 4 </td>
                                        <td class="table_cont"><?php echo ($ass['age_child4'] != "") ? ucfirst($ass['age_child4']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['no_children']>="5" && $ass['age_child5']!=""){ ?><tr>
                                        <td class="table_col"> Age of child 5 </td>
                                        <td class="table_cont"><?php echo ($ass['age_child5'] != "") ? ucfirst($ass['age_child5']) : "--NA--"; ?></td>
                                    </tr><?php } } */ ?>
                                    <?php if($ass['breast_feed']!=""){ ?><tr>
                                        <td class="table_col">Breast Feed</td>
                                        <td class="table_cont"><?php echo ($ass['breast_feed'] != "") ? ucfirst($ass['breast_feed']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['excl_breastfeed']!=""){ ?><tr>
                                        <td class="table_col">Exclusive Breast Feed</td>
                                        <td class="table_cont"><?php echo ($ass['excl_breastfeed'] != "") ? ucfirst($ass['excl_breastfeed']) : "--NA--"; ?></td>
                                    </tr><?php }?>
                                    <?php if($ass['breast_feed_freq']!=""){ ?><tr>
                                        <td class="table_col">Breast Feed Frequency</td>
                                        <td class="table_cont"><?php echo ($ass['breast_feed_freq'] != "") ? ucfirst($ass['breast_feed_freq']) : "--NA--"; ?></td>
                                    </tr><?php }?>
                                    <?php if($ass['breast_feed_other_freq']!=""){ ?><tr>
                                        <td class="table_col">Other Breast Feed Frequency</td>
                                        <td class="table_cont"><?php echo ($ass['breast_feed_other_freq'] != "") ? ucfirst($ass['breast_feed_other_freq']) : "--NA--"; ?></td>
                                    </tr><?php }?>
                                    <?php if($ass['breast_feed_food']!=""){ ?><tr>
                                        <td class="table_col">Food to Enhance Breast Milk</td>
                                        <td class="table_cont"><?php echo ($ass['breast_feed_food'] != "") ? ucfirst($ass['breast_feed_food']) : "--NA--"; ?></td>
                                    </tr><?php } }?>

                                    <?php if(strtolower($ass['current_status'])!=""){ ?><tr>
                                        <td class="table_col"> Currently Working </td>
                                        <td class="table_cont"><?php echo ($ass['current_status'] != "") ? ucfirst($ass['current_status']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['occupation']!=""){ ?><tr>
                                        <td class="table_col">Occupation</td>
                                        <td class="table_cont"><?php echo ($ass['occupation'] != "") ? ucfirst($ass['occupation']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['other_occupation']!=""){ ?><tr>
                                        <td class="table_col">Other Occupation</td>
                                        <td class="table_cont"><?php echo ($ass['other_occupation'] != "") ? ucfirst($ass['other_occupation']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['job_type']!=""){ ?><tr>
                                        <td class="table_col">Job Type</td>
                                        <td class="table_cont"><?php echo ($ass['job_type'] != "") ? ucfirst($ass['job_type']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['other_job_type']!=""){ ?><tr>
                                        <td class="table_col">Other Job Type</td>
                                        <td class="table_cont"><?php echo ($ass['other_job_type'] != "") ? ucfirst($ass['other_job_type']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['job_time']!=""){ ?><tr>
                                        <td class="table_col">Job start Timing</td>
                                        <td class="table_cont"><?php echo ($ass['job_time'] != "") ? ucfirst($ass['job_time']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['job_end_time']!=""){ ?><tr>
                                        <td class="table_col">Job End Timing</td>
                                        <td class="table_cont"><?php echo ($ass['job_end_time'] != "") ? ucfirst($ass['job_end_time']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['job_meal']!=""){ ?><tr>
                                        <td class="table_col">Do you carry meal</td>
                                        <td class="table_cont"><?php echo ($ass['job_meal'] != "") ? ucfirst($ass['job_meal']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php /* if($ass['meal_quantity']!=""){ ?><tr>
                                        <td class="table_col">How many meal you carry</td>
                                        <td class="table_cont"><?php echo ($ass['meal_quantity'] != "") ? ucfirst($ass['meal_quantity']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } */ ?>
                                    <?php if($ass['meal_type']!=""){ ?><tr>
                                        <td class="table_col">What meals you carry</td>
                                        <td class="table_cont"><?php echo ($ass['meal_type'] != "") ? ucfirst($ass['meal_type']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['meals_other']!=""){ ?><tr>
                                        <td class="table_col">Other meals</td>
                                        <td class="table_cont"><?php echo ($ass['meals_other'] != "") ? ucfirst($ass['meals_other']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['canteen']!=""){ ?><tr>
                                        <td class="table_col">Canteen Meal(Breakfast)</td>
                                        <td class="table_cont"><?php echo ($ass['canteen'] != "") ? ucfirst($ass['canteen']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['canteen_2']!=""){ ?><tr>
                                        <td class="table_col">Canteen Meal(Lunch)</td>
                                        <td class="table_cont"><?php echo ($ass['canteen_2'] != "") ? ucfirst($ass['canteen_2']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <?php if($ass['canteen_3']!=""){ ?><tr>
                                        <td class="table_col">Canteen Meal(Snacks)</td>
                                        <td class="table_cont"><?php echo ($ass['canteen_3'] != "") ? ucfirst($ass['canteen_3']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <?php if($ass['canteen_4']!=""){ ?><tr>
                                        <td class="table_col">Canteen Meal(Dinner)</td>
                                        <td class="table_cont"><?php echo ($ass['canteen_4'] != "") ? ucfirst($ass['canteen_4']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if($ass['job_travel']!=""){ ?><tr>
                                        <td class="table_col">Does Your Job Include Travel</td>
                                        <td class="table_cont"><?php echo ($ass['job_travel'] != "") ? ucfirst($ass['job_travel']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['travel_inmonth']!=""){ ?><tr>
                                        <td class="table_col">No. of times in month you travel</td>
                                        <td class="table_cont"><?php echo ($ass['travel_inmonth'] != "") ? ucfirst($ass['travel_inmonth']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                    <?php if($ass['travel_country']!=""){ ?>
                                        <tr>
                                            <td class="table_col">Within The Country / Foreign Travel</td>
                                            <td class="table_cont"><?php echo ($ass['travel_country'] != "") ? ucfirst($ass['travel_country']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                            }else{
                        ?>
                            <div><h4>No data found!</h4></div>
                        <?php
                            }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_accordion_assessment_item_2_head" data-toggle="collapse" href="#m_accordion_assessment_item_2_body" aria-expanded="false">                        
                    <span class="m-accordion__item-title text-black">Nutrition & Lifestyle Analysis
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit" data-section = "Nutrition And Lifestyle Analysis" title="Edit Right" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_assessment_item_2_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_2_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <?php
                            if(count($assessment[0]['result']) > 0){
                        ?>
                        <div class="table-responsive">
                            <table class="table assessment_tbl table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <tbody>
                                    <?php if ($ass['lifestyle'] != "") { ?>
                                    <td class="table_col"> Lifestyle  </td>
                                    <td class="table_cont">
                                        <?php 
                                                $daily_activity = array('4' => 'Sedentary','7' => 'Lightly Active','12' => 'Moderately Active', '14' => 'Very Active');
                                                
                                                if(array_key_exists($ass['lifestyle'],$daily_activity))
                                                {
                                                    echo $daily_activity[$ass['lifestyle']];
                                                }else{

                                                    echo ($ass['lifestyle'] != "") ? ucfirst($ass['lifestyle']) : "--NA--"; 
                                                }
                                        ?>
                                    </td>
                                    </tr><?php } ?>
                                <?php if ($ass['eating_habit'] != "") { ?>
                                    <td class="table_col"> Eating Habits  </td>
                                    <td class="table_cont"><?php echo ($ass['eating_habit'] != "") ? ucfirst($ass['eating_habit']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php /* if ($ass['egg_frequency'] != "") { ?>
                                    <td class="table_col">Frequency of eating eggs</td>
                                    <td class="table_cont"><?php echo ($ass['egg_frequency'] != "") ? ucfirst($ass['egg_frequency']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } */ ?>
                                <?php if ($ass['fnonveg'] != "") { ?>
                                    <td class="table_col">Frequency of eating Non-veg</td>
                                    <td class="table_cont"><?php echo ($ass['fnonveg'] != "") ? ucfirst($ass['fnonveg']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php if ($ass['pmeat'] != "") { ?>
                                    <td class="table_col">Preffered Meat</td>
                                    <td class="table_cont"><?php echo ($ass['pmeat'] != "") ? ucfirst($ass['pmeat']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php if ($ass['smoke'] != "") { ?>
                                    <td class="table_col"> Smoking </td>
                                    <td class="table_cont"><?php echo ($ass['smoke'] != "") ? ucfirst($ass['smoke']) : "No"; ?></td>
                                    </tr><?php } ?>
                                <?php 
                                    $smoke_frequency = array('4' => 'More than 2 times a day','7' => 'A few times a week','12' => 'Quit since 2 years', '14' => 'Never');
                                    if ($ass['smoke_habit'] != "") { ?>
                                    <td class="table_col"> Smoking Frequency</td>
                                    <td class="table_cont">
                                        <?php 
                                                if(array_key_exists($ass['smoke_habit'] ,$smoke_frequency))
                                                {
                                                    echo $smoke_frequency[$ass['smoke_habit'] ];
                                                }else{

                                                    echo ($ass['smoke_habit'] != "") ? ucfirst($ass['smoke_habit']) : "No"; 
                                                }
                                        ?>
                                    </td>
                                    </tr>
                                <?php } ?>
                                <?php /* if ($ass['other_smoke_habit'] != "") { ?>
                                    <td class="table_col">Other Smoking Habits</td>
                                    <td class="table_cont"><?php echo ($ass['other_smoke_habit'] != "") ? ucfirst($ass['other_smoke_habit']) : "No"; ?></td>
                                    </tr>
                                <?php } */ ?>
                                <?php /* if ($ass['no_of_cigarettes'] != "") { ?>
                                    <td class="table_col">Number Of Cigarates</td>
                                    <td class="table_cont"><?php echo ($ass['no_of_cigarettes'] != "") ? ucfirst($ass['no_of_cigarettes']) : "No"; ?></td>
                                    </tr>
                                <?php } */ ?>
                                <?php /* if ($ass['other_no_of_cigarettes'] != "") { ?>
                                    <td class="table_col">Other Number Of Cigarates</td>
                                    <td class="table_cont"><?php echo ($ass['other_no_of_cigarettes'] != "") ? ucfirst($ass['other_no_of_cigarettes']) : "No"; ?></td>
                                    </tr>
                                <?php } */ ?>
                                

                                <?php /* if ($ass['alcohol'] != "") { ?>
                                    <td class="table_col">Drinking Alcohol</td>
                                    <td class="table_cont"><?php echo ($ass['alcohol'] != "") ? ucfirst($ass['alcohol']) : "--NA--"; ?></td>
                                    </tr><?php } */ ?>
                                <?php if ($ass['alco_frequency'] != "") { ?>
                                    <td class="table_col"> Frequency of Alcohol consumption </td>
                                    <td class="table_cont">
                                        <?php 

                                            $alcohol_frequency = array('4' => 'Daily','7' => 'Occasionally','12' => 'Quit since 1 year', '14' => 'Never');

                                            if(array_key_exists($ass['alco_frequency'] ,$smoke_frequency))
                                                {
                                                    echo $alcohol_frequency[$ass['alco_frequency'] ];
                                                }else{
                                                    
                                                    echo ($ass['alco_frequency'] != "") ? ucfirst($ass['alco_frequency']) : "--NA--"; 
                                                }

                                        ?>
                                    </td>
                                    </tr>
                                <?php } ?>
                                <?php /* if ($ass['alco_frequency_other'] != "") { ?>
                                    <td class="table_col"> Other Frequency of Alcohol consumption </td>
                                    <td class="table_cont"><?php echo ($ass['alco_frequency_other'] != "") ? ucfirst($ass['alco_frequency_other']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } */ ?>

                                <?php /* if ($ass['alco_intake'] != "") { ?>
                                    <td class="table_col"> Alcohol Intake Per Week </td>
                                    <td class="table_cont"><?php echo ($ass['alco_intake'] != "") ? ucfirst($ass['alco_intake']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } */ ?>
                                <?php if ($ass['do_you_fast'] != "") { ?>
                                    <td class="table_col">Do You Fast</td>
                                    <td class="table_cont"><?php echo ($ass['do_you_fast'] != "") ? ucfirst($ass['do_you_fast']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['fast'] != "") { ?>
                                    <td class="table_col"> Frequency of fasting </td>
                                    <td class="table_cont"><?php echo ($ass['fast'] != "") ? ucfirst($ass['fast']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php if ($ass['fast_other'] != "") { ?>
                                    <td class="table_col">Other Fast</td>
                                    <td class="table_cont"><?php echo ($ass['fast_other'] != "") ? ucfirst($ass['fast_other']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['fasting_food'] != "") { ?>
                                    <td class="table_col">Food consume during fast</td>
                                    <td class="table_cont"><?php echo ($ass['fasting_food'] != "") ? ucfirst($ass['fasting_food']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['fasting_window'] != "") { ?>
                                    <td class="table_col">Suitable Fasting Window:</td>
                                    <td class="table_cont"><?php echo ($ass['fasting_window'] != "") ? ucfirst($ass['fasting_window']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>

                                <?php /* if ($ass['drink_preference'] != "") { ?>
                                    <td class="table_col">Preferred Drinks</td>
                                    <td class="table_cont"><?php echo ($ass['drink_preference'] != "") ? ucfirst($ass['drink_preference']) : "--NA--"; ?></td>
                                    </tr><?php } */ ?>
                                <?php if ($ass['water_intake'] != "") { ?>
                                    <td class="table_col"> Water intake per day </td>
                                    <td class="table_cont">
                                    <?php 

                                        $water_intake = array('4' => '< 4 glasses','7' => '4 - 6 glasses','12' => '6 - 12 glasses', '14' => '12 > glasses');

                                        if(array_key_exists($ass['water_intake'] ,$water_intake))
                                        {
                                            echo $water_intake[$ass['water_intake'] ];
                                        }else{
                                            
                                            echo ($ass['water_intake'] != "") ? ucfirst($ass['water_intake']) : "--NA--"; 
                                        }
                                    ?>    
                                    </td>
                                    </tr><?php } ?>
                                
                                <?php if ($ass['visit_hotel'] != "") { ?>
                                    <td class="table_col"> Frequency of restaurant visits </td>
                                    <td class="table_cont"><?php echo ($ass['visit_hotel'] != "") ? ucfirst($ass['visit_hotel']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['visit_hotel_other'] != "") { ?>
                                    <td class="table_col"> Other restaurant visits </td>
                                    <td class="table_cont"><?php echo ($ass['visit_hotel_other'] != "") ? ucfirst($ass['visit_hotel_other']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['cuisine'] != "") { ?>
                                    <td class="table_col">Preferred Cuisine</td>
                                    <td class="table_cont"><?php echo ($ass['cuisine'] != "") ? ucfirst($ass['cuisine']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php if ($ass['whocook_meal'] != "") { ?>
                                    <td class="table_col"> Who cook meal at home </td>
                                    <td class="table_cont"><?php echo ($ass['whocook_meal'] != "") ? ucfirst($ass['whocook_meal']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['whocook_meal_any_other'] != "") { ?>
                                    <td class="table_col"> Other Who cook meal at home </td>
                                    <td class="table_cont"><?php echo ($ass['whocook_meal_any_other'] != "") ? ucfirst($ass['whocook_meal_any_other']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php /* if ($ass['eater'] != "") { ?>
                                    <td class="table_col"> Quick Eater/Slow Eater </td>
                                    <td class="table_cont"><?php echo ($ass['eater'] != "") ? ucfirst($ass['eater']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php if ($ass['hunger'] != "") { ?>
                                    <td class="table_col"> Hunger Peak Time </td>
                                    <td class="table_cont"><?php echo ($ass['hunger'] != "") ? ucfirst($ass['hunger']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['hunger_2'] != "") { ?>
                                    <td class="table_col">Other Hunger Peak Time </td>
                                    <td class="table_cont"><?php echo ($ass['hunger_2'] != "") ? ucfirst($ass['hunger_2']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['activity'] != "") { ?>
                                    <td class="table_col"> Activity During Meals </td>
                                    <td class="table_cont"><?php echo ($ass['activity'] != "") ? ucfirst($ass['activity']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if ($ass['activity_other'] != "") { ?>
                                    <td class="table_col">Other Activity During Meals </td>
                                    <td class="table_cont"><?php echo ($ass['activity_other'] != "") ? ucfirst($ass['activity_other']) : "--NA--"; ?></td>
                                    </tr>
                                <?php } */ ?>
                                <?php if ($ass['food_aversion'] != "") { ?>
                                    <td class="table_col"> Food Aversions </td>
                                    <td class="table_cont"><?php echo ($ass['food_aversion'] != "") ? ucfirst($ass['food_aversion']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php if ($ass['food_preference'] != "") { ?>
                                    <td class="table_col"> Food preferences </td>
                                    <td class="table_cont"><?php echo ($ass['food_preference'] != "") ? ucfirst($ass['food_preference']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php if ($ass['food_allergy'] != "") { ?>
                                    <td class="table_col"> Food Allergy </td>
                                    <td class="table_cont"><?php echo ($ass['food_allergy'] != "") ? ucfirst($ass['food_allergy']) : "--NA--"; ?></td>
                                    </tr><?php } ?>
                                <?php /* if ($ass['bowel_movement'] != "") { ?>
                                    <td class="table_col">Bowel Movement </td>
                                    <td class="table_cont"><?php echo ($ass['bowel_movement'] != "") ? ucfirst($ass['bowel_movement']) : "--NA--"; ?></td>
                                    </tr><?php } */ ?>
                                <?php
                                if (strtolower($ass['gender']) == 'female') {
                                    ?>
                                    <?php if ($ass['periods'] != "") { ?>
                                        <td class="table_col">Regular Periods </td>
                                        <td class="table_cont"><?php echo ($ass['periods'] != "") ? ucfirst($ass['periods']) : "--NA--"; ?></td>
                                        </tr><?php } ?>
                                    <?php if ($ass['lmp'] != "") { ?>
                                        <td class="table_col">LMP</td>
                                        <td class="table_cont"><?php echo ($ass['lmp'] != "") ? ucfirst($ass['lmp']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($ass['pms'] != "") { ?>
                                        <td class="table_col">PMS</td>
                                        <td class="table_cont"><?php echo ($ass['pms'] != "") ? ucfirst($ass['pms']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($ass['menopause'] != "") { ?>
                                        <td class="table_col">Menopause</td>
                                        <td class="table_cont"><?php echo ($ass['menopause'] != "") ? ucfirst($ass['menopause']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>

                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                            }else{
                        ?>
                            <div><h4>No data found!</h4></div>
                        <?php
                            }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <?php
            if(count($assessment[0]['result']) > 0){
        ?>
            <?php if(($ass['walk_duration']!='')  ||  ($ass['swim_duration']!='')   || ($ass['cardio_duration']!='')  || ($ass['yoga_duration']!='')   || ($ass['jogging_duration']!='') || ($ass['arobic_duration']!='') )  {
            ?>

            <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_accordion_assessment_item_3_head" data-toggle="collapse" href="#m_accordion_assessment_item_3_body" aria-expanded="false">                        
                    <span class="m-accordion__item-title text-black">Exercise Frequency
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit" data-section = "Nutrition And Lifestyle Analysis" title="Edit Right" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_assessment_item_3_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_3_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center"> Type </th>
                                        <th class="text-center"> Duration</th>
                                        <th class="text-center"> Frequency</th>
                                        <th class="text-center"> Other Frequency</th>
                                        <?php /* <th  class="bold"> Timing (AM/PM)</th> */ ?>
                                    </tr>
                                </thead>
                                <tbody>                        
                                    <?php if(strtolower($ass['cardio'])=="yes"){ ?> 

                                    <?php 
                                        if($ass['cardio_duration']!="" || $ass['cardio_frequency']!="" || $ass['cardio_frequency_other']!=""){ ?>    
                                        <tr>                                
                                            <td><strong><strong>Cardio (Cycling/Running/Swimming)</strong></strong></td>
                                            <td><?php echo ($ass['cardio_duration']!="") ? ucfirst($ass['cardio_duration']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['cardio_frequency']!="") ? ucfirst($ass['cardio_frequency']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['cardio_frequency_other']!="") ? ucfirst($ass['cardio_frequency_other']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>

                                        <?php /* if($ass['cycling_duration']!=""){ ?>    
                                        <tr>                                
                                            <td><strong><strong>Cycling</strong></strong></td>
                                            <td><?php echo ($ass['cycling_duration']!="") ? ucfirst($ass['cycling_duration']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['cycling_frequency']!="") ? ucfirst($ass['cycling_frequency']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['cycling_frequency_other']!="") ? ucfirst($ass['cycling_frequency_other']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['cycling_time']!="") ? ucfirst($ass['cycling_time']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <?php if($ass['dance_duration']!=""){ ?>    
                                        <tr>                                
                                            <td><strong><strong>Dance</strong></strong></td>
                                            <td><?php echo ($ass['dance_duration']!="") ? ucfirst($ass['dance_duration']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['dance_frequency']!="") ? ucfirst($ass['dance_frequency']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['dance_frequency_other']!="") ? ucfirst($ass['dance_frequency_other']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['dance_time']!="") ? ucfirst($ass['dance_time']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <?php if($ass['zumba_duration']!=""){ ?>
                                    <tr>         
                                        <td><strong><strong>Zumba</strong></strong></td>
                                        <td><?php echo ($ass['zumba_duration']!="") ? ucfirst($ass['zumba_duration']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['zumba_frequency']!="") ? ucfirst($ass['zumba_frequency']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['zumba_frequency_other']!="") ? ucfirst($ass['zumba_frequency_other']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['zumba_time']!="") ? ucfirst($ass['zumba_time']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if($ass['skipping_duration']!=""){ ?>
                                    <tr>         
                                        <td><strong><strong>Skipping</strong></strong></td>
                                        <td><?php echo ($ass['skipping_duration']!="") ? ucfirst($ass['skipping_duration']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['skipping_frequency']!="") ? ucfirst($ass['skipping_frequency']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['skipping_frequency_other']!="") ? ucfirst($ass['skipping_frequency_other']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['skipping_time']!="") ? ucfirst($ass['skipping_time']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>


                                    <?php if($ass['eliptical_duration']!=""){ ?>    
                                        <tr>                                
                                            <td><strong><strong>Elliptical</strong></strong></td>
                                            <td><?php echo ($ass['eliptical_duration']!="") ? ucfirst($ass['eliptical_duration']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['eliptical_frequency']!="") ? ucfirst($ass['eliptical_frequency']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['eliptical_frequency_other']!="") ? ucfirst($ass['eliptical_frequency_other']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['eliptical_time']!="") ? ucfirst($ass['eliptical_time']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>


                                    <?php if($ass['gym_cycle_duration']!=""){ ?>    
                                        <tr>                                
                                            <td><strong><strong>Gym Cycle [Gym Stepper]</strong></strong></td>
                                            <td><?php echo ($ass['gym_cycle_duration']!="") ? ucfirst($ass['gym_cycle_duration']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['gym_cycle_frequency']!="") ? ucfirst($ass['gym_cycle_frequency']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['gym_cycle_frequency_other']!="") ? ucfirst($ass['gym_cycle_frequency_other']) : "--NA--"; ?></td>
                                            <td><?php echo ($ass['gym_cycle_time']!="") ? ucfirst($ass['gym_cycle_time']) : "--NA--"; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <?php if($ass['jogging_duration']!=""){ ?>
                                    <tr>         
                                        <td><strong><strong>Running</strong></strong></td>
                                        <td><?php echo ($ass['jogging_duration']!="") ? ucfirst($ass['jogging_duration']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['jogging_frequency']!="") ? ucfirst($ass['jogging_frequency']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['jogging_frequency_other']!="") ? ucfirst($ass['jogging_frequency_other']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['jogging_time']!="") ? ucfirst($ass['jogging_time']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if($ass['swim_duration']!=""){ ?>
                                    <tr>         
                                        <td><strong><strong>Swimming</strong></strong></td>
                                        <td><?php echo ($ass['swim_duration']!="") ? ucfirst($ass['swim_duration']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['swim_frequency']!="") ? ucfirst($ass['swim_frequency']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['swim_frequency_other']!="") ? ucfirst($ass['swim_frequency_other']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['swim_time']!="") ? ucfirst($ass['swim_time']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>  

                                    <?php if($ass['trademil_duration']!=""){ ?>
                                    <tr>         
                                        <td><strong><strong>Treadmill</strong></strong></td>
                                        <td><?php echo ($ass['trademil_duration']!="") ? ucfirst($ass['trademil_duration']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['trademil_frequency']!="") ? ucfirst($ass['trademil_frequency']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['trademil_frequency_other']!="") ? ucfirst($ass['trademil_frequency_other']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['trademil_time']!="") ? ucfirst($ass['trademil_time']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if($ass['walk_duration']!=""){ ?>
                                    <tr>         
                                        <td><strong><strong>Walk</strong></strong></td>
                                        <td><?php echo ($ass['walk_duration']!="") ? ucfirst($ass['walk_duration']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['walk_frequency']!="") ? ucfirst($ass['walk_frequency']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['walk_frequency_other']!="") ? ucfirst($ass['walk_frequency_other']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['walk_time']!="") ? ucfirst($ass['walk_time']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } */ }?>

                                     <?php if(strtolower($ass['weight_training_frequency'])=='yes')
                                            { 
                                                if($ass['weight_training_duration']!="" || $ass['weight_training_frequency']!="" || $ass['weight_training_frequency_other']!=""){ ?>
                                                    <tr>         
                                                        <td><strong><strong>Weight Training</strong></strong></td>
                                                        <td><?php echo ($ass['weight_training_duration']!="") ? ucfirst($ass['weight_training_duration']) : "--NA--"; ?></td>
                                                        <td><?php echo ($ass['weight_training_frequency']!="") ? ucfirst($ass['weight_training_frequency']) : "--NA--"; ?></td>
                                                        <td><?php echo ($ass['weight_training_frequency_other']!="") ? ucfirst($ass['weight_training_frequency_other']) : "--NA--"; ?></td>                                            
                                                    </tr>
                                    <?php   } }?>        

                                    <?php if( strtolower($ass['other_exercise'])=='yes'){ ?>
                                        
                                        <?php if($ass['pilates_duration']!="" || $ass['pilates_frequency']!="" || $ass['pilates_frequency_other']!=""){ ?>
                                            <tr>         
                                                <td><strong><strong>Pilates</strong></strong></td>
                                                <td><?php echo ($ass['pilates_duration']!="") ? ucfirst($ass['pilates_duration']) : "--NA--"; ?></td>
                                                <td><?php echo ($ass['pilates_frequency']!="") ? ucfirst($ass['pilates_frequency']) : "--NA--"; ?></td>
                                                <td><?php echo ($ass['pilates_frequency_other']!="") ? ucfirst($ass['pilates_frequency_other']) : "--NA--"; ?></td>
                                            </tr>
                                        <?php } ?>

                                        <?php if($ass['yoga_duration']!="" || $ass['yoga_frequency']!="" || $ass['yoga_frequency_other']!=""){ ?>
                                            <tr>         
                                                <td><strong><strong>Yoga</strong></strong></td>
                                                <td><?php echo ($ass['yoga_duration']!="") ? ucfirst($ass['yoga_duration']) : "--NA--"; ?></td>
                                                <td><?php echo ($ass['yoga_frequency']!="") ? ucfirst($ass['yoga_frequency']) : "--NA--"; ?></td>
                                                <td><?php echo ($ass['yoga_frequency_other']!="") ? ucfirst($ass['yoga_frequency_other']) : "--NA--"; ?></td>
                                            </tr>
                                        <?php } ?>

                                        
                                        <?php if($ass['other_workout_duration']!="" || $ass['other_workout_frequency']!="" || $ass['any_other_workout_frequency']!=""){ ?>
                                            <tr>
                                                <td><strong>Other</strong></td>
                                                <td><?php echo ($ass['other_workout_duration']!="") ? ucfirst($ass['other_workout_duration']) : "--NA--"; ?></td>
                                                <td><?php echo ($ass['other_workout_frequency']!="") ? ucfirst($ass['other_workout_frequency']) : "--NA--"; ?></td>
                                                <td><?php echo ($ass['any_other_workout_frequency']!="") ? ucfirst($ass['any_other_workout_frequency']) : "--NA--"; ?></td>
                                               
                                            </tr>
                                        <?php } ?>    

                                    <?php }?>

                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>           

            <?php } ?>


            <?php if(strtolower($ass['medical_issue'])!=""){?>
            <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_accordion_assessment_item_4_head" data-toggle="collapse" href="#m_accordion_assessment_item_4_body" aria-expanded="false">                        
                    <span class="m-accordion__item-title text-black">Medical History
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit" data-section = "Medical History" title="Edit Right" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_assessment_item_4_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_4_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <div class="table-responsive">
                            <table class="table assessment_tbl table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="table_col bold">Problem</th>
                                        <th class="table_cont bold">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php /* if(strtolower($ass['heart_problem'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Heart Problem</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['heart_problem']!="") ? ucfirst($ass['heart_problem']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['orthopedic_aliment'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Orthopedic Aliment</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['orthopedic_aliment']!="") ? ucfirst($ass['orthopedic_aliment']) : "No"; ?></td>
                                    </tr>
                                    <?php } */ ?>
                                    <?php if(strtolower($ass['hypertension'])!=""){ ?>
                                    <tr>                    
                                        <td class="table_col">Hyper tension</td>
                                        <td  class="table_cont text-danger"><?php echo ($ass['hypertension']!="") ? ucfirst($ass['hypertension']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['thyroid'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Thyroid</td>
                                        <td  class="table_cont text-danger"><?php echo ($ass['thyroid_type']!="") ? ucfirst($ass['thyroid_type']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php /* if(strtolower($ass['high_bp'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">High BP</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['high_bp']!="") ? ucfirst($ass['high_bp']) : "No"; ?></td>
                                    </tr>
                                    <?php } */ ?>
                                    <?php /* if(strtolower($ass['low_bp'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Low BP</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['low_bp']!="") ? ucfirst($ass['low_bp']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['high_prolactive'])!=""){ ?>
                                    <tr>                    
                                        <td class="table_col">High Prolactive</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['high_prolactive']!="") ? ucfirst($ass['high_prolactive']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['uric'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">uric</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['uric']!="") ? ucfirst($ass['uric']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['stroke'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">stroke</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['stroke']!="") ? ucfirst($ass['stroke']) : "No"; ?></td>

                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['kidney_disorder'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Kidney Disorder</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['kidney_disorder']!="") ? ucfirst($ass['kidney_disorder']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>                        

                                    <?php if(strtolower($ass['kidney_disorder'])=="yes"){ ?>
                                    <tr>                     
                                        <td class="table_col">Kidney Disorder Type</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['kidney_disorder_type']!="") ? ucfirst($ass['kidney_disorder_type']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if(strtolower($ass['faulty_liver'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Fatty Liver</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['faulty_liver']!="") ? ucfirst($ass['faulty_liver']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['infertility'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Infertility</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['infertility']!="") ? ucfirst($ass['infertility']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['chronic_fatigue'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Chronic Fatigue</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['chronic_fatigue']!="") ? ucfirst($ass['chronic_fatigue']) : "No"; ?></td>
                                    </tr>
                                    <?php } */ ?>
                                    <?php if(strtolower($ass['pcod'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">PCOD</td>
                                        <td  class="table_cont text-danger"><?php echo ($ass['pcod']!="") ? ucfirst($ass['pcod']) : "No"; ?></td>

                                    </tr>
                                    <?php } ?>
                                    <?php /* if(strtolower($ass['phyexercise_diff'])!=""){ ?>
                                    <tr >                     
                                        <td class="table_col">Phyexercise Diff</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['phyexercise_diff']!="") ? ucfirst($ass['phyexercise_diff']) : "No"; ?></td>

                                    </tr>
                                    <?php } */ ?>
                                    
                                    <?php if(strtolower($ass['diabetes'])=="yes"){ ?>
                                    <tr>                     
                                        <td class="table_col">Diabetes Type</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['diabetes_type']!="") ? ucfirst($ass['diabetes_type']) : "No"; ?></td>

                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['constipation'])=="yes"){ ?>
                                    <tr>                     
                                        <td class="table_col">Constipation Type</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['constipation_type']!="") ? ucfirst($ass['constipation_type']) : "No"; ?></td>

                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['acidity'])=="yes"){ ?>
                                    <tr>                    
                                        <td class="table_col">Acidity Type</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['acidity_type']!="") ? ucfirst($ass['acidity_type']) : "No"; ?></td>

                                    </tr>
                                    <?php } ?>
                                    <?php /* if(strtolower($ass['bloating'])=="yes"){ ?>
                                    <tr>                    
                                        <td class="table_col">Bloating Type</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['bloating_type']!="") ? ucfirst($ass['bloating_type']) : "No"; ?></td>

                                    </tr>
                                    <?php } */ ?>

                                    <?php /* if(strtolower($ass['gas_or_flatulence'])!=""){ ?>
                                    <tr>                    
                                        <td class="table_col">Gas Or Flatulence</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['gas_or_flatulence']!="") ? ucfirst($ass['gas_or_flatulence']) : "No"; ?></td>

                                    </tr>
                                    <?php } ?>
                                    
                                    <?php if(strtolower($ass['any_surgery'])=="yes"){ ?>
                                    <tr>                    
                                        <td class="table_col">Surgery Type</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['surgery_type']!="") ? ucfirst($ass['surgery_type']) : "No"; ?></td>

                                    </tr>                        
                                    <?php } ?>

                                     <?php if(strtolower($ass['is_allergy'])!=""){ ?>
                                    <tr>                    
                                        <td class="table_col">Do you have allergy</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['is_allergy']!="") ? ucfirst($ass['is_allergy']) : "No"; ?></td>

                                    </tr>                        
                                    <?php } ?>
                                    <?php if(strtolower($ass['is_allergy'])=="yes"){ ?>
                                    <tr>                    
                                        <td class="table_col">Allergy Type</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['allergy']!="") ? ucfirst($ass['allergy']) : "No"; ?></td>

                                    </tr>                        
                                    <?php } */ ?>    

                                    <?php if(strtolower($ass['other_specification'])!=''){ ?>
                                    <tr>                     
                                        <td class="table_col">Other Specification</td>
                                        <td class="table_cont text-danger"><?php echo ($ass['other_specification']!="") ? ucfirst($ass['other_specification']) : "No"; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <?php if($ass['report1_attachment']!="" || $ass['report2_attachment']!="" || $ass['report3_attachment']!=""){?>
            <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_accordion_assessment_item_5_head" data-toggle="collapse" href="#m_accordion_assessment_item_5_body" aria-expanded="false">                        
                    <span class="m-accordion__item-title text-black">Medical Report
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit" data-section = "Attach Medical Report" title="Edit Right" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_assessment_item_5_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_5_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <div class="table-responsive">
                            <table class="table assessment_tbl table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <thead class="text-center">
                                    <tr>
                                        <th class="table_col bold">Test</th>
                                        <th class="table_cont bold">Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(strtolower($ass['report1_attachment'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col"><?php echo $ass['test1_brief']; ?></td>
                                        <td class="table_cont"><a href="<?php echo 'https://www.balancenutrition.in/media/reports/assessments/uid_'.$ass['user_id'].'/'.$ass['report1_attachment']; ?>" target="_blank"><?php echo $ass['report1_attachment']; ?></a></td>
                                    </tr>
                                    <?php } ?>  
                                    <?php if(strtolower($ass['report2_attachment'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col"><?php echo $ass['test2_brief']; ?></td>
                                        <td class="table_cont"><a href="<?php echo 'https://www.balancenutrition.in/media/reports/assessments/uid_'.$ass['user_id'].'/'.$ass['report2_attachment']; ?>" target="_blank"><?php echo $ass['report2_attachment']; ?></a></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['report3_attachment'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col"><?php echo $ass['test3_brief']; ?></td>
                                        <td class="table_cont"><a href="<?php echo 'https://www.balancenutrition.in/media/reports/assessments/uid_'.$ass['user_id'].'/'.$ass['report3_attachment']; ?>" target="_blank"><?php echo $ass['report3_attachment']; ?></a></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['test4_brief'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col"><?php echo $ass['test4_brief']; ?></td>
                                        <td class="table_cont"><a href="<?php echo 'https://www.balancenutrition.in/media/reports/assessments/uid_'.$ass['user_id'].'/'.$ass['report4_attachment']; ?>" target="_blank"><?php echo $ass['report4_attachment']; ?></a></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(strtolower($ass['test5_brief'])!=""){ ?>
                                    <tr>                     
                                        <td class="table_col"><?php echo $ass['test5_brief']; ?></td>
                                        <td class="table_cont"><a href="<?php echo 'https://www.balancenutrition.in/media/reports/assessments/uid_'.$ass['user_id'].'/'.$ass['report5_attachment']; ?>" target="_blank"><?php echo $ass['report5_attachment']; ?></a></td>
                                    </tr>
                                    <?php } ?>                         
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_accordion_assessment_item_6_head" data-toggle="collapse" href="#m_accordion_assessment_item_6_body" aria-expanded="false">                        
                    <span class="m-accordion__item-title text-black">Are you taking any medication / vitamins
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit" title="Edit Right" data-section = "Medical History" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_assessment_item_6_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_6_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <div class="table-responsive">
                            <table class="table assessment_tbl_3 table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <thead class="thead-default">
                                    <tr>
                                        <strong><th style="font-weight:bold;" class="table_col">Name/Dosage</th></strong>
                                        <strong><th style="font-weight:bold;" class="table_cont">Frequency</th></strong>                            
                                        <strong><th style="font-weight:bold;" class="table_cont">Aliment</th></strong>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i=1; $i<=10  ; $i++) { 
                                      if(strtolower($ass['med'.$i.'_name'])!=''){ ?>                       
                                    
                                    <tr>
                                        <td class="table_cont" style="font-weight:bold;"><?php echo ($ass['med'.$i.'_name']!="") ? ucfirst($ass['med'.$i.'_name']) : "No"; ?></td>
                                        <td class="table_cont"><?php echo ($ass['med'.$i.'_dose']!="") ? ucfirst($ass['med'.$i.'_dose'].' '.$ass['med'.$i.'_dose_other']) : "No"; ?></td>                            
                                        <td class="table_cont"><?php echo ($ass['med'.$i.'_aliment']!="") ? ucfirst($ass['med'.$i.'_aliment']) : "No"; ?></td>
                                    </tr>
                                    <?php } } ?>                        
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php
            }else{
        ?>
            <!-- <div><h4>No data found!</h4></div> -->
        <?php
            }//if(count($assessment[0]['result']) > 0){
        ?>
            <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_accordion_assessment_item_7_head" data-toggle="collapse" href="#m_accordion_assessment_item_7_body" aria-expanded="false">                        
                    <span class="m-accordion__item-title text-black">24 Hour Diet Recalll
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit" data-section = "24 Hour Diet Recall" title="Edit Right" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_assessment_item_7_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_7_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <?php
                            if(count($assessment[0]['result']) > 0){
                        ?>
                        <div class="table-responsive">
                            <table class="table assessment_tbl_3 table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <thead class="thead-default">
                                    <tr>                     
                                        <th class="bold">Type</th>
                                        <th class="bold">Timing</th>
                                        <th class="bold">Consumption</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($ass['sleep_time']!=""){ ?>
                                        <tr>                     
                                            <td class="table_col">Sleep Timing</td>
                                            <td>
                                                <?php 
                                                    $sleep_array = array('4' => '10 > hrs','7' => '< 6 Hrs Disturbed','12' => '< 6 hrs Peaceful', '14' => '6 - 9 hrs');
                                                    if(array_key_exists($ass['sleep_time'],$sleep_array))
                                                    {
                                                        echo $sleep_array[$ass['sleep_time']];
                                                    }else{

                                                        echo ($ass['sleep_time']!="") ? ucfirst($ass['sleep_time']) : "--NA--" ; 
                                                    }
                                                ?>
                                            </td>
                                            <td>NA</td>
                                        </tr>
                                    <?php } ?>    
                                    <?php /* if($ass['wakeup_time']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Wakeup Timing</td>
                                        <td><?php echo ($ass['wakeup_time']!="") ? ucfirst($ass['wakeup_time']) : "--NA--" ; ?></td>
                                        <td>NA</td>
                                    </tr>
                                    <?php } */ ?>
                                    
                                    <?php if($ass['earlymorning_time']!="" || $ass['earlymorning_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Early Morning</td>
                                        <td><?php echo ($ass['earlymorning_time']!="") ? ucfirst($ass['earlymorning_time']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['earlymorning_menu']!="") ? ucfirst($ass['earlymorning_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    
                                    <?php if($ass['break_time']!="" || $ass['break_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Breakfast</td>
                                        <td><?php echo ($ass['break_time']!="") ? ucfirst($ass['break_time']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['break_menu']!="") ? ucfirst($ass['break_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['midmorning_time']!="" || $ass['midmorning_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Mid Morning</td>
                                        <td><?php echo ($ass['midmorning_time']!="") ? ucfirst($ass['midmorning_time']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['midmorning_menu']!="") ? ucfirst($ass['midmorning_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['lunch_time']!="" || $ass['lunch_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Lunch</td>
                                        <td><?php echo ucfirst($ass['lunch_time']!="") ? ($ass['lunch_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['lunch_menu']!="") ? ($ass['lunch_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['tea_time']!="" || $ass['tea_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Tea/Evening</td>
                                        <td><?php echo ucfirst($ass['tea_time']!="") ? ($ass['tea_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['tea_menu']!="") ?  ($ass['tea_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['lateve_time']!="" || $ass['lateve_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Late Evening</td>
                                        <td><?php echo ucfirst($ass['lateve_time']!="") ? ($ass['lateve_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['lateve_menu']!="") ?  ($ass['lateve_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php /* if($ass['predinner_time']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Dinner</td>
                                        <td><?php echo ucfirst($ass['predinner_time']!="") ? ($ass['predinner_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['predinner_menu']!="") ? ($ass['predinner_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } */ ?>
                                    <?php if($ass['dinner_time']!="" || $ass['dinner_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Dinner</td>
                                        <td><?php echo ucfirst($ass['dinner_time']!="") ? ($ass['dinner_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['dinner_menu']!="") ? ($ass['dinner_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['bed_time']!="" || $ass['bed_menu']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Bed Time / Midnight Munching</td>
                                        <td><?php echo ucfirst($ass['bed_time']!="") ? ($ass['bed_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['bed_menu']!="") ? ($ass['bed_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php /* if($ass['midsnack_time']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Post Dinner Snacks</td>
                                        <td><?php echo ucfirst($ass['midsnack_time']!="") ? ($ass['midsnack_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['midsnack_menu']!="") ? ($ass['midsnack_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass['midnight_munching_time']!=""){ ?>
                                    <tr>                     
                                        <td class="table_col">Mid Night Munching</td>
                                        <td><?php echo ucfirst($ass['midnight_munching_time']!="") ? ($ass['midnight_munching_time']): "--NA--"; ?></td>
                                        <td><?php echo ucfirst($ass['midnight_munching_menu']!="") ? ($ass['midnight_munching_menu']): "--NA--"; ?></td>
                                    </tr>
                                    <?php } */ ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                            }else{
                        ?>
                            <div><h4>No data found!</h4></div>
                        <?php
                            }//if(count($assessment[0]['result']) > 0){
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="m-accordion__item m-accordion__item--metal">
                <div class="m-accordion__item-head py-1 px-2 collapsed" role="tab" id="m_accordion_assessment_item_8_head" data-toggle="collapse" href="#m_accordion_assessment_item_8_body" aria-expanded="false">                        
                    <span class="m-accordion__item-title text-black">Food Frequency
                        <!--<a class="btn btn-danger btn-sm create editDietAction float-right mr-2 right_to_edit"  data-section = "Food Frequency" title="Edit Right" href="#"><i class="fa fa-edit"></i> Edit Right</a>-->
                    </span>
                    <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                </div>

                <div class="m-accordion__item-body collapse" id="m_accordion_assessment_item_8_body" role="tabpanel" aria-labelledby="m_accordion_assessment_item_8_head" data-parent="#m_accordion_assessment"> 
                    <div class="m-accordion__item-content p-2">
                        <?php
                            if(count($assessment[0]['result']) > 0){
                        ?>
                        <div class="table-responsive">
                            <table class="table assessment_tbl_3 table-hover table-bordered m-table table-sm m-table--border-brand  m-table--head-bg-brand">
                                <thead class="thead-default">
                                    <tr>
                                        <th  class="bold"> Type </th>                            
                                        <th  class="bold"> Consumption </th>
                                        <th  class="bold"> Other    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($ass["pizza_freq"]!="" || $ass['other_pizza_freq']!=""){ ?>                            
                                    <tr>         
                                        <td><strong><strong>Pizza/Burger</strong></strong></td>                           
                                        <td><?php echo ($ass['pizza_freq']!="") ? ucfirst($ass['pizza_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_pizza_freq']!="") ? ucfirst($ass['other_pizza_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["chapati_freq"]!="" || $ass['other_chapati_freq']!=""){ ?> 
                                    <tr>

                                        <td><strong><strong>Roti/chapati</strong></strong></td>                            
                                        <td><?php echo ($ass['chapati_freq']!="") ? ucfirst($ass['chapati_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_chapati_freq']!="") ? ucfirst($ass['other_chapati_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["paratha_freq"]!="" || $ass['other_paratha_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Parathas</strong></strong></td>
                                        <td><?php echo ($ass['paratha_freq']!="") ? ucfirst($ass['paratha_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_paratha_freq']!="") ? ucfirst($ass['other_paratha_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if($ass["chaat_freq"]!="" || $ass['other_chaat_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Chaat & Fried Snacks</strong></strong></td>
                                        <td><?php echo ($ass['chaat_freq']!="") ? ucfirst($ass['chaat_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_chaat_freq']!="") ? ucfirst($ass['other_chaat_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["sprout_freq"]!="" || $ass['other_sprout_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Sprouts/Pulses</strong></strong></td>
                                        <td><?php echo ($ass['sprout_freq']!="" ) ? ucfirst($ass['sprout_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_sprout_freq']!="" ) ? ucfirst($ass['other_sprout_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["rice_freq"]!="" || $ass['other_rice_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Rice</strong></strong></td>
                                        <td><?php echo ($ass['rice_freq']!="" ) ? ucfirst($ass['rice_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_rice_freq']!="" ) ? ucfirst($ass['other_rice_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["maggi_freq"]!="" || $ass['other_maggi_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Maggi/Yeppi/Instant Noodles</strong></strong></td>
                                        <td><?php echo ($ass['maggi_freq']!="" ) ? ucfirst($ass['maggi_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_maggi_freq']!="" ) ? ucfirst($ass['other_maggi_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["bread_freq"]!="" || $ass['other_bread_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Bread / Pav</strong></strong></td>
                                        <td><?php echo ($ass['bread_freq']!="" ) ? ucfirst($ass['bread_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_bread_freq']!="" ) ? ucfirst($ass['other_bread_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["biscuit_freq"]!="" || $ass['other_biscuit_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Biscuit / Cookies</strong></strong></td>
                                        <td><?php echo ($ass['biscuit_freq']!="" ) ? ucfirst($ass['biscuit_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_biscuit_freq']!="" ) ? ucfirst($ass['other_biscuit_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["paneer_freq"]!="" || $ass['other_paneer_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Paneer</strong></strong></td>
                                        <td><?php echo ($ass['paneer_freq']!="" ) ? ucfirst($ass['paneer_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_paneer_freq']!="" ) ? ucfirst($ass['other_paneer_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["cheese_freq"]!="" || $ass['other_cheese_freq']){ ?>
                                    <tr>

                                        <td><strong><strong>Cheese</strong></strong></td>
                                        <td><?php echo ($ass['cheese_freq']!="" ) ? ucfirst($ass['cheese_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_cheese_freq']!="" ) ? ucfirst($ass['other_cheese_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["dessert_freq"]!="" || $ass['other_dessert_freq']){ ?>
                                    <tr>

                                        <td><strong><strong>Dessert(Eg. Chololate, Cake, Mithai, Icecream)</strong></strong></td>
                                        <td><?php echo ($ass['dessert_freq']!="" ) ? ucfirst($ass['dessert_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_dessert_freq']!="" ) ? ucfirst($ass['other_dessert_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["mithai_freq"]!="" || $ass['other_mithai_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Fruits</strong></strong></td>
                                        <td><?php echo ($ass['mithai_freq']!="" ) ? ucfirst($ass['mithai_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_mithai_freq']!="" ) ? ucfirst($ass['other_mithai_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["nuts_freq"]!="" || $ass['other_nuts_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Nuts</strong></strong></td>
                                        <td><?php echo ($ass['nuts_freq']!="" ) ? ucfirst($ass['nuts_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_nuts_freq']!="" ) ? ucfirst($ass['other_nuts_freq']!="" ) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["fried_freq"]!="" || $ass['other_fried_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Fried Snacks</strong></strong></td>
                                        <td><?php echo ($ass['fried_freq']!="" ) ? ucfirst($ass['fried_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_fried_freq']!="" ) ? ucfirst($ass['other_fried_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["breverage_freq"]!="" || $ass['other_breverage_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Aerated beverages</strong></strong></td>
                                        <td><?php echo ($ass['breverage_freq']!="" ) ? ucfirst($ass['breverage_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_breverage_freq']!="" ) ? ucfirst($ass['other_breverage_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["juice_freq"]!="" || $ass['other_juice_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Juices</strong></strong></td>
                                        <td><?php echo ($ass['juice_freq']!="" ) ? ucfirst($ass['juice_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_juice_freq']!="" ) ? ucfirst($ass['other_juice_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["tea_freq"]!="" || $ass['other_tea_freq']!="" ){ ?>
                                    <tr>         
                                        <td><strong><strong>Tea(Eg. Regular/ Black/ Green)</strong></strong></td>
                                        <td><?php echo ($ass['tea_freq']!="" ) ? ucfirst($ass['tea_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_tea_freq']!="" ) ? ucfirst($ass['other_tea_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>                        
                                    <?php if($ass["cofee_freq"]!="" || $ass['other_cofee_freq']!=""){ ?>
                                    <tr>         
                                        <td><strong>Coffee (Eg. Regular/ Black)</strong></td>
                                        <td><?php echo ($ass['cofee_freq']!="" ) ? ucfirst($ass['cofee_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_cofee_freq']!="" ) ? ucfirst($ass['other_cofee_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["chocolate_freq"]!="" || $ass['other_chocolate_freq']!=""){ ?>
                                    <tr>         
                                        <td><strong>Chocolate</strong></td>
                                        <td><?php echo ($ass['chocolate_freq']!="" ) ? ucfirst($ass['chocolate_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_chocolate_freq']!="" ) ? ucfirst($ass['other_chocolate_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["ghee_freq"]!="" || $ass['other_ghee_freq']!=""){ ?>
                                    <tr>
                                        <td><strong>Ghee</strong></td>
                                        <td><?php echo ($ass['ghee_freq']!="" ) ? ucfirst($ass['ghee_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_ghee_freq']!="" ) ? ucfirst($ass['other_ghee_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["butter_freq"]!="" || $ass['other_butter_freq']!=""){ ?>
                                    <tr>
                                        <td><strong>Butter</strong></td>
                                        <td><?php echo ($ass['butter_freq']!="" ) ? ucfirst($ass['butter_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_butter_freq']!="" ) ? ucfirst($ass['other_butter_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["milk_freq"]!="" || $ass['other_milk_freq']!=""){ ?>
                                    <tr>
                                        <td><strong>Milk</strong></td>
                                        <td><?php echo ($ass['milk_freq']!="" ) ? ucfirst($ass['milk_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_milk_freq']!="" ) ? ucfirst($ass['other_milk_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["yogurt_freq"]!="" || $ass['other_yogurt_freq']!="" ){ ?>
                                    <tr>
                                        <td><strong>Yogurt</strong></td>
                                        <td><?php echo ($ass['yogurt_freq']!="" ) ? ucfirst($ass['yogurt_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_yogurt_freq']!="" ) ? ucfirst($ass['other_yogurt_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["cereal_freq"]!="" || $ass['other_cereal_freq']!=""){ ?>
                                    <tr>
                                        <td><strong>Cereal</strong></td>
                                        <td><?php echo ($ass['cereal_freq']!="" ) ? ucfirst($ass['cereal_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_cereal_freq']!="" ) ? ucfirst($ass['other_cereal_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["icecream_freq"]!="" || $ass['other_icecream_freq']!=""){ ?>
                                    <tr>
                                        <td><strong>Ice cream</strong></td>
                                        <td><?php echo ($ass['icecream_freq']!="" ) ? ucfirst($ass['icecream_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_icecream_freq']!="" ) ? ucfirst($ass['other_icecream_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["frozenfood_freq"]!="" || $ass['other_frozenfood_freq']!=""){ ?>
                                    <tr>
                                        <td><strong>Frozen food (Fries Mccane)</strong></td>
                                        <td><?php echo ($ass['frozenfood_freq']!="" ) ? ucfirst($ass['frozenfood_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_frozenfood_freq']!="" ) ? ucfirst($ass['other_frozenfood_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["seafood_freq"]!="" || $ass['other_seafood_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Seafood & Fish</strong></strong></td>
                                        <td><?php echo ($ass['seafood_freq']!="" ) ? ucfirst($ass['seafood_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_seafood_freq']!="" ) ? ucfirst($ass['other_seafood_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["fish_freq"]!="" || $ass['other_fish_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Fish</strong></strong></td>
                                        <td><?php echo ($ass['fish_freq']!="" ) ? ucfirst($ass['fish_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_fish_freq']!="" ) ? ucfirst($ass['other_fish_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["chicken_freq"]!="" || $ass['other_chicken_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Chicken</strong></strong></td>
                                        <td><?php echo ($ass['chicken_freq']!="" ) ? ucfirst($ass['chicken_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_chicken_freq']!="" ) ? ucfirst($ass['other_chicken_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["mutton_freq"]!="" || $ass['other_mutton_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Mutton</strong></strong></td>
                                        <td><?php echo ($ass['mutton_freq']!="" ) ? ucfirst($ass['mutton_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_mutton_freq']!="" ) ? ucfirst($ass['other_mutton_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["beef_freq"]!="" || $ass['other_beef_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Beef</strong></strong></td>
                                        <td><?php echo ($ass['beef_freq']!="" ) ? ucfirst($ass['beef_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_beef_freq']!="" ) ? ucfirst($ass['other_beef_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["pork_freq"]!="" || $ass['other_pork_freq']!=""){ ?>
                                    <tr>

                                        <td><strong><strong>Pork</strong></strong></td>
                                        <td><?php echo ($ass['pork_freq']!="" ) ? ucfirst($ass['pork_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_pork_freq']!="" ) ? ucfirst($ass['other_pork_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["egg_freq"]!="" || $ass['other_egg_freq']!="" ){ ?>
                                    <tr>

                                        <td><strong><strong>Eggs</strong></strong></td>
                                        <td><?php echo ($ass['egg_freq']!="" ) ? ucfirst($ass['egg_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_egg_freq']!="" ) ? ucfirst($ass['other_egg_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($ass["cake_freq"]!="" || $ass['other_cake_freq']!=""){ ?>
                                    <tr>
                                        <td><strong>Cakes/Pastries</strong></td>
                                        <td><?php echo ($ass['cake_freq']!="" )? ucfirst($ass['cake_freq']) : "--NA--"; ?></td>
                                        <td><?php echo ($ass['other_cake_freq']!="" )? ucfirst($ass['other_cake_freq']) : "--NA--"; ?></td>
                                    </tr>
                                    <?php } ?>                        
                                </tbody>
                            </table>
                        </div>
                        <?php
                            }else{
                        ?>
                            <div><h4>No data found!</h4></div>
                        <?php
                            }//if(count($assessment[0]['result']) > 0){
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            
        </div>
        <!--end::Section--> 
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