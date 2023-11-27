<!--start:: Calendar -->
<div class="m-content p-0">
	<div class="row">
	   	<div class="col-lg-12">	
	   		<!--begin::Portlet-->
			<div class="m-portlet" id="m_portlet">
			    
				<div class="m-portlet__body">
				    <a  href="javascript:void" class="m-menu__link add_task_btn" data-toggle="modal" data-target="#mentorreminderModal" id="calender_model">
                        <i class="m-menu__link-icon la la-plus"></i> 
                        <span class="m-menu__link-title"> 
                            <span class="m-menu__link-wrap"> 
                                <span class="m-menu__link-text">Add Task</span> 
                             </span>
                        </span>
                    </a>
					<div class="m_calendar" id="task_calendar"></div>
					<div class="m_calendar" id="append_task_calendar"></div>
				</div>
			</div>	
			<!--end::Portlet-->
		</div>
	   	<? /*<div class="col-lg-4">	
	   		<!--begin::Portlet-->
			<div class="m-portlet" id="m_portlet">
				<div class="m-portlet__body p-3 position-relative">
				    <!--<button id="add_task_btn" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add_task_modal">Add Task</button>-->
				    
				    <ul class="nav nav-tabs  m-tabs-line" role="tablist">
                        <li class="nav-item m-tabs__item mr-3">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_today_calls" role="tab">Today</a>
                        </li>
                        <li class="nav-item m-tabs__item mr-3">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_weekly_agenda" role="tab" id="get_all_chats">Weekly Agenda</a>
                        </li>
                    </ul>
				    <div class="tab-content">
                        <div class="tab-pane active show" id="m_tabs_today_calls" role="tabpanel">
        					<div class="call_duration_stat_sec">
        					    <table class="table m-table">
        					        <tbody>
        					            <?php 
        					            if(!empty($today_task_calender)){
        					            foreach($today_task_calender as $val){ ?>
            					        <tr>
            					            <td width="140px"><?= $val['task_name'];?></td>
            					            <th width="110px"><?= date("h:i a", strtotime($val['start_date']));?></th>
            					            <th><?= $val['type'];?></th>
            					        </tr>
            					        <?php }}?>
        					        </tbody>
        					    </table>
        						<!--<h5>Todays Call</h5>-->
        					</div>
                        </div>
                        
                        <div class="tab-pane" id="m_tabs_weekly_agenda" role="tabpanel">
        					<div class="call_duration_stat_sec">
        						<!--<h5>Todays Call</h5>-->
        						
        					    <table class="table m-table">
        					        <tbody>
            					        <?php 
        					            if(!empty($mtd_task_calender)){
        					            foreach($mtd_task_calender as $val){ ?>
            					        <tr>
            					            <td width="140px"><?= $val['task_name'];?></td>
            					            <th width="110px"><?= date("Y-m-d <br> h:i a", strtotime($val['start_date']));?></th>
            					            <th><?= $val['type'];?></th>
            					        </tr>
            					        <?php }}?>
        					        </tbody>
        					    </table>
        					</div>
                        </div>
                    </div> 
                    
				</div>
			</div>	
			<!--end::Portlet-->
	   	</div> */ ?>
	</div>
</div>
<!--End:: Calendar -->