<!-- BEGIN: Header -->
<!--21-11-2021-->
<!--<link rel="stylesheet" type="text/css" href="https://www.balancenutrition.in/crm_ui/assets/multiselect/msfmultiselect.min.css"/> -->
<!--<script src="https://www.balancenutrition.in/crm_ui/assets/multiselect/msfmultiselect.js"></script>-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"  rel="stylesheet"  type='text/css'>


<header class="m-grid__item    m-header"  data-minimize-offset="200" data-minimize-mobile-offset="200" >
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">		
			<!-- BEGIN: Brand -->
			<div class="m-stack__item m-brand  m-brand--skin-light" id="mobile_nav_toogle">
				<div class="m-stack m-stack--ver m-stack--general">
					<div class="m-stack__item m-stack__item--middle m-brand__logo">
						<a href="<?= base_url(''); ?>" class="m-brand__logo-wrapper">
						<img src="https://www.balancenutrition.in/images/home_page/bn_logo_300.png" class="sidebar_logo">
						</a>  
					</div>
					<div class="m-stack__item m-stack__item--middle m-brand__tools">
										
						<!-- BEGIN: Left Aside Minimize Toggle -->
						<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block m-brand__toggler--active">
							<span></span>
						</a>
						<!-- END -->
						
						<!-- BEGIN: Responsive Aside Left Menu Toggler -->
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>
						<!-- END -->
								

						<!-- BEGIN: Topbar Toggler -->
						<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
							<i class="flaticon-more"></i>
						</a>
						<!-- BEGIN: Topbar Toggler -->
					</div>
				</div>
			</div>
			<!-- END: Brand -->			
			
			<!-- avinash added this for save review submit status-->
			<input type="hidden" class="first_half" id="first_half" name="first_half" value="0"/>
			<input type="hidden" class="second_half" id="second_half" name="second_half" value="0"/>
			<input type="hidden" class="day_end" id="day_end" name="day_end" value="0"/>
			<!-- avinash added this for save review submit status-->
			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
				<!-- BEGIN: Horizontal Menu -->
				<!--<img src="https://www.balancenutrition.in/images/home_page/bn_logo_300.png" class="topbar_logo">-->
				<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
				<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">	
					<div class="m-stack__item m-topbar__nav-wrapper">
						<ul class="m-topbar__nav m-nav m-nav--inline">
						    	<li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width screen414_search m-dropdown--skin-light	m-list-search m-list-search--skin-light" data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown">
								<a href="javascript:void(0)" class="m-nav__link">
									<div class="form-group m-form__group mt-2 search_box">
									    <div class="input-group m-input-group m-input-group--pill m-input-group--solid" id="search_div">
											<input type="text" class="form-control m-input search-place" placeholder="Search By (Name, Number, Email)" aria-describedby="basic-addon1">
											<div class="input-group-append"><span class="input-group-text" id="basic-addon1"><i class="flaticon-search-1"></i></span></div>
										</div>						
									</div>
								</a>
							</li>
							<li id="lead_capture_notification" data-id="lead_capture_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
								
                                <a href="#" class="m-nav__link m-dropdown__toggle omr_animate">
									<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger lead_capture_count d-none"></span>
									<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">Leads to Capture</button></span>
								</a>
                                <div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: #23a3b0; background-size: cover;">
											<!--<span class="m-dropdown__header-title">5 New</span>-->
											<span class="m-dropdown__header-subtitle" >Leads to Capture</span>
										</div>
										<div class="m-dropdown__body py-1">				
											<div class="m-dropdown__content">
											    <div class="m-scrollable" data-scrollable="true" data-max-height="110" data-mobile-max-height="200">
													<div class="m-list-timeline m-list-timeline--skin-light">
														<div class="m-list-timeline__items">
															
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text" >Stage 1</span>
																<a href="<?= base_url('lead?lead_by=ld_to_cap&stage=1'); ?>"  class="m-nav__link" style="">
                                                                    <span class="m-list-timeline__time top_list_count lead_capture_stage1_count" >View</span>
                                                                </a>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																<span class="m-list-timeline__text top_list_text">Stage 2</span>
                                                                <a href="<?= base_url('lead?lead_by=ld_to_cap&stage=2'); ?>"  class="m-nav__link">
																    <span class="m-list-timeline__time lead_capture_stage2_count today_fus_notification" >View</span>
                                                                </a>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Stage 3</span>
                                                                <a href="<?= base_url('lead?lead_by=ld_to_cap&stage=3'); ?>" class="m-nav__link">
																    <span class="m-list-timeline__time lead_capture_stage3_count today_reminder_notification" >View</span>
                                                                </a>
															</div>
                                                            <div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Stage 4</span>
                                                                <a href="<?= base_url('lead?lead_by=ld_to_cap&stage=4'); ?>"  class="m-nav__link">
																    <span class="m-list-timeline__time lead_capture_stage4_count today_reminder_notification" >View</span>
                                                                </a>
															</div>
															

															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">No Stage</span>
                                                                <a href="<?= base_url('lead?lead_by=not_hs'); ?>"  class="m-nav__link">
																    <span class="m-list-timeline__time lead_capture_other_lead today_reminder_notification" >0</span>
                                                                </a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
					<?php
if($this->session->balance_session['email_id']!='marketing@balancenutrition.in'){
    ?>
						    <!--search bar-->
						
                            <!--End search bar-->
                            
                            <!--<li id="lead_capture_notification" data-id="lead_capture_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
								<a href="<?= base_url('lead?lead_by=ld_to_cap'); ?>" target="<?= ($this->uri->segment(1) != "lead")? '_blank': '_self' ?>" class="m-nav__link">
									<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger lead_capture_count d-none"></span>
									<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">Leads to capture</button></span>
								</a>
							</li>-->
       <!--                     <li id="lead_capture_notification" data-id="lead_capture_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">-->
								
       <!--                         <a href="#" class="m-nav__link m-dropdown__toggle omr_animate">-->
							<!--		<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger lead_capture_count d-none"></span>-->
							<!--		<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">Leads to Capture</button></span>-->
							<!--	</a>-->
       <!--                         <div class="m-dropdown__wrapper">-->
							<!--		<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>-->
							<!--		<div class="m-dropdown__inner">-->
							<!--			<div class="m-dropdown__header m--align-center" style="background: #23a3b0; background-size: cover;">-->
											<!--<span class="m-dropdown__header-title">5 New</span>-->
							<!--				<span class="m-dropdown__header-subtitle" >Leads to Capture</span>-->
							<!--			</div>-->
							<!--			<div class="m-dropdown__body py-1">				-->
							<!--				<div class="m-dropdown__content">-->
							<!--				    <div class="m-scrollable" data-scrollable="true" data-max-height="110" data-mobile-max-height="200">-->
							<!--						<div class="m-list-timeline m-list-timeline--skin-light">-->
							<!--							<div class="m-list-timeline__items">-->
															
							<!--								<div class="m-list-timeline__item m-0 p-0">-->
							<!--									<span class="m-list-timeline__badge"></span>-->
							<!--									<span class="m-list-timeline__text top_list_text" >Stage 1</span>-->
							<!--									<a href="<?= base_url('lead?lead_by=ld_to_cap&stage=1'); ?>"  class="m-nav__link" style="">-->
       <!--                                                             <span class="m-list-timeline__time top_list_count lead_capture_stage1_count" >0</span>-->
       <!--                                                         </a>-->
							<!--								</div>-->
							<!--								<div class="m-list-timeline__item m-0 p-0">-->
							<!--									<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>-->
							<!--									<span class="m-list-timeline__text top_list_text">Stage 2</span>-->
       <!--                                                         <a href="<?= base_url('lead?lead_by=ld_to_cap&stage=2'); ?>"  class="m-nav__link">-->
							<!--									    <span class="m-list-timeline__time lead_capture_stage2_count today_fus_notification" >0</span>-->
       <!--                                                         </a>-->
							<!--								</div>-->
							<!--								<div class="m-list-timeline__item m-0 p-0">-->
							<!--									<span class="m-list-timeline__badge"></span>-->
							<!--									<span class="m-list-timeline__text top_list_text">Stage 3</span>-->
       <!--                                                         <a href="<?= base_url('lead?lead_by=ld_to_cap&stage=3'); ?>" class="m-nav__link">-->
							<!--									    <span class="m-list-timeline__time lead_capture_stage3_count today_reminder_notification" >0</span>-->
       <!--                                                         </a>-->
							<!--								</div>-->
       <!--                                                     <div class="m-list-timeline__item m-0 p-0">-->
							<!--									<span class="m-list-timeline__badge"></span>-->
							<!--									<span class="m-list-timeline__text top_list_text">Stage 4</span>-->
       <!--                                                         <a href="<?= base_url('lead?lead_by=ld_to_cap&stage=4'); ?>"  class="m-nav__link">-->
							<!--									    <span class="m-list-timeline__time lead_capture_stage4_count today_reminder_notification" >0</span>-->
       <!--                                                         </a>-->
							<!--								</div>-->
															

							<!--								<div class="m-list-timeline__item m-0 p-0">-->
							<!--									<span class="m-list-timeline__badge"></span>-->
							<!--									<span class="m-list-timeline__text top_list_text">No Stage</span>-->
       <!--                                                         <a href="<?= base_url('lead?lead_by=not_hs'); ?>"  class="m-nav__link">-->
							<!--									    <span class="m-list-timeline__time lead_capture_other_lead today_reminder_notification" >0</span>-->
       <!--                                                         </a>-->
							<!--								</div>-->
							<!--							</div>-->
							<!--						</div>-->
							<!--					</div>-->
							<!--				</div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</li>-->
                                                        
						
							<li id="balance_notification" data-id="balance_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
								<a href="#" class="m-nav__link m-dropdown__toggle call_animate">
									<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger balance_count d-none"></span>
									<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">Balance</button></span>
								</a>
								
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: #23a3b0; background-size: cover;">
											<!--<span class="m-dropdown__header-title">5 New</span>-->
											<span class="m-dropdown__header-subtitle">Balance</span>
										</div>
										<div class="m-dropdown__body py-1">				
											<div class="m-dropdown__content">
											    <div class="m-scrollable" data-scrollable="true" data-max-height="110" data-mobile-max-height="220">
													<div class="m-list-timeline m-list-timeline--skin-light">
														<div class="m-list-timeline__items">
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Due Tomorrow</span>
																<span class="m-list-timeline__time top_list_count due_tomorrow_count" data-toggle="modal" data-target="#sales_summary_popup" data-id="due_tomorrow">0</span>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Due Today</span>
																<span class="m-list-timeline__time top_list_count balance_due_count" data-toggle="modal" data-target="#sales_summary_popup" data-id="balance_due"></span>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																<span class="m-list-timeline__text top_list_text">Overdue</span>
																<span class="m-list-timeline__time top_list_count balance_overdue_count" data-toggle="modal" data-target="#sales_summary_popup" data-id="balance_overdue"></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							
							<!--<li id="queries_notification" data-id="queries_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
								<a href="<?= base_url('chat'); ?>" class="m-nav__link" target="<?= ($this->uri->segment(1) != "chat")? '_blank': '_self' ?>">
									<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger query_count d-none"></span>
									<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">Queries</button></span>
								</a>
							</li>
                            
							<li id="call_notification" data-id="call_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
								<a href="#" class="m-nav__link call_animate" data-toggle="modal" data-target="#mentorreminderModal">
									<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger today_call_count d-none"></span>
									<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">Add Task</button></span>
								</a>
							</li>-->

							<li id="do_notification" data-id="do_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
								<a href="#" class="m-nav__link m-dropdown__toggle omr_animate">
									<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger do_total_count d-none"></span>
									<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">DO</button></span>
								</a>
								
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: #23a3b0; background-size: cover;">
											<!--<span class="m-dropdown__header-title">5 New</span>-->
											<span class="m-dropdown__header-subtitle">Today Tasks</span>
										</div>
										<div class="m-dropdown__body py-1">				
											<div class="m-dropdown__content">
											    <div class="m-scrollable" data-scrollable="true" data-max-height="" data-mobile-max-height="200">
													<div class="m-list-timeline m-list-timeline--skin-light">
														<div class="m-list-timeline__items">
															<!--<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																<span class="m-list-timeline__text top_list_text">Calls</span>
																<span class="m-list-timeline__time top_list_count calls_scheduled_count" data-toggle="modal" data-target="#m_modal_1" data-id="calls_scheduled"></span>
															</div>-->
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Consultation Calls</span>
																<span class="m-list-timeline__time top_list_count calls_scheduled_count" data-toggle="modal" data-target="#sales_summary_popup" data-id="calls_scheduled">5</span>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																<span class="m-list-timeline__text top_list_text">FUS</span>
																<span class="m-list-timeline__time top_list_count today_fus_notification" data-toggle="modal" data-target="#sales_summary_popup" data-id="today_fus_notification"></span>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Reminders Set</span>
																<span class="m-list-timeline__time top_list_count today_reminder_notification" data-toggle="modal" data-target="#sales_summary_popup" data-id="today_reminder_notification">5</span>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Links Expiring in 48Hrs</span>
																<span class="m-list-timeline__time top_list_count payment_link" data-toggle="modal" data-target="#sales_summary_popup" data-id="payment_link" style='cursor:pointer'>1</span>
															</div>
															<!--<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">All active Links</span>
																<span class="m-list-timeline__time top_list_count active_payment_links" data-toggle="modal" data-target="#sales_summary_popup" data-id="active_payment_links" style='cursor:pointer'>1</span>
															</div>
															<!--// Avinash code for hor and warm notification start-->
															<!--<div class="m-list-timeline__item m-0 p-0">-->
															<!--	<span class="m-list-timeline__badge"></span>-->
															<!--	<span class="m-list-timeline__text top_list_text">Hot Pending Leads !</span>-->
															<!--	<span class="m-list-timeline__time top_list_count hot_pending_notification" data-toggle="modal" data-target="#sales_summary_popup" data-id="hot_pending_notification" style='cursor:pointer'>5</span>-->
															<!--</div>-->
															<!--<div class="m-list-timeline__item m-0 p-0">-->
															<!--	<span class="m-list-timeline__badge"></span>-->
															<!--	<span class="m-list-timeline__text top_list_text">Warm Pending Leads !</span>-->
															<!--	<span class="m-list-timeline__time top_list_count warm_pending_notification" data-toggle="modal" data-target="#sales_summary_popup" data-id="warm_pending_notification" style='cursor:pointer'>5</span>-->
															<!--</div>-->
															<!--<div class="m-list-timeline__item m-0 p-0">-->
															<!--	<span class="m-list-timeline__badge"></span>-->
															<!--	<span class="m-list-timeline__text top_list_text">To Engage Pending Leads !</span>-->
															<!--	<span class="m-list-timeline__time top_list_count to_engage_pending_notification" data-toggle="modal" data-target="#sales_summary_popup" data-id="to_engage_pending_notification" style='cursor:pointer'>5</span>-->
															<!--</div>-->
															<!--// Avinash code for hor and warm notification start-->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							
							<li id="lead_miss_notification" data-id="lead_miss_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
								<a href="#" class="m-nav__link m-dropdown__toggle queries_animate queries_show" data-toggle="modal" data-target="#m_modal_1">
									<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger lead_miss_count">0</span>
									<!--<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger lead_miss_count">7</span>-->
									<span class="m-nav__link-icon"><button class="btn m-btn--pill btn-metal text-dark top_nav_btn">Misses</button></span>
								</a>
								
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: #23a3b0; background-size: cover;">
											<!--<span class="m-dropdown__header-title">5 New</span>-->
											<span class="m-dropdown__header-subtitle">Yesterday Misses</span>
										</div>
										<div class="m-dropdown__body py-1">				
											<div class="m-dropdown__content">
											    <div class="m-scrollable" data-scrollable="true" data-max-height="150" data-mobile-max-height="200">
													<div class="m-list-timeline m-list-timeline--skin-light">
														<div class="m-list-timeline__items">
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																<span class="m-list-timeline__text top_list_text">FUS Missed</span>
																<span class="m-list-timeline__time top_list_count fus_missed_count" data-toggle="modal" data-target="#sales_summary_popup" data-id="fus_missed_count"></span>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Consultation Missed</span>
																<span class="m-list-timeline__time top_list_count today_consultation_missed" data-toggle="modal" data-target="#sales_summary_popup" data-id="today_consultation_missed">5</span>
															</div>
															<!-- avinash added this for no action planed 28-01-2022-->
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Pitched But No FU Set</span>
																<span class="m-list-timeline__time top_list_count today_no_action_planed" data-toggle="modal" data-target="#sales_summary_popup" data-id="today_no_action_planed" style='cursor:pointer'>0</span>
															</div>
															<div class="m-list-timeline__item m-0 p-0">
																<span class="m-list-timeline__badge"></span>
																<span class="m-list-timeline__text top_list_text">Update Lead Detail</span>
																<span class="m-list-timeline__time top_list_count lead_pending_detail" data-toggle="modal" data-target="#sales_summary_popup" data-id="lead_pending_detail" style='cursor:pointer'>0</span>
															</div>
															<!-- avinash added this for no action planed 28-01-2022-->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							
							
							<?php
							
							}
							
							?>
							
							<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
								<span class="m-topbar__userpic">
								    <img src="<?php echo ($this->session->balance_session['photo']=='') ? CDN_IMAGE_URL.'default_photo.png' : CDN_IMAGE_URL.$this->session->balance_session['photo']; ?>" class="m--img-rounded m--marginless m--img-centered" alt=""/>
								</span>
								<span class="m-topbar__username m--hide">Nick</span>					
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: url(<?= base_url()?>assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
											<div class="m-card-user m-card-user--skin-dark">
												<div class="m-card-user__pic">
													<a href="<?php echo base_url('dashboard/mentor/exportMentor'); ?>" target="_blank">
                                                        <img src="<?php echo ($this->session->balance_session['photo']=='') ? CDN_IMAGE_URL.'default_photo.png' : CDN_IMAGE_URL.$this->session->balance_session['photo']; ?>" class="m--img-rounded m--marginless" alt=""/>
                                                    </a>
												</div>
												<div class="m-card-user__details">
													<span class="m-card-user__name m--font-weight-500"><?php echo $this->session->balance_session['full_name']; ?></span>
													<a href="#" class="m-card-user__email m--font-weight-300 m-link"><?php echo $this->session->balance_session['email_id']; ?></a>
												</div>
											</div>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
													<li class="m-nav__section m--hide">
														<span class="m-nav__section-text">Section</span>
													</li>
													<li class="m-nav__separator m-nav__separator--fit">
													</li>
													<li class="m-nav__item">
														<a href="<?php echo base_url('logout'); ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
									
							<!--<li id="m_quick_sidebar_toggle" class="m-nav__item">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									<span class="m-nav__link-icon"><i class="la la-cog"></i></span>
								</a>
							</li>-->			
						</ul>
					</div>
				</div>
				<!-- END: Topbar -->

			</div>
		</div>
	</div>
</header>
<!-- END: Header -->