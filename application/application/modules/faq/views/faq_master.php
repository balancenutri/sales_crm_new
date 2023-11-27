<?php 

  $super_admin=array('super_admin','super_mentor');
  $mentor_id=$this->session->balance_session['user_type'];
  $mentor_idz=$this->session->balance_session['admin_id'];
  $check=in_array($mentor_id, $super_admin);

    // print_r($mentor_id);exit;
?>

<style type="text/css">
#faq_modal .err{color: red;}
    .faq_btn {
    color: #000;
    display: block;
    outline: none;
}
#faq_modal .open{
  transform: rotate(90deg);
  transition:all .4s ease-in;
}

#faq_modal .close{
  transform: rotate(0deg);
  transition:all .4s ease-in;
}

#faq_modal .showText {
    background: #f0f0f0;
    width: auto;
    position: relative;
    display: inline-block;
    padding: 5px 10px;
    font-weight: 600;
}   
#faq_modal #table_select {
    height: 30px;
    padding: 2px 10px;
    color: #000;
    display: inline-block;
    width: 25%;
    margin: 6px 0 0;
}

#faq_modal .filter_div{
    width: 100%;
    display: inline-block;
    margin: 0 0 10px;
    text-align: right;
}

#faq_modal .add_faqs_section {
    padding: 0 0 1.4rem 0;
    display: none;
    border: 1px solid;
    margin: 0 0 2rem;
}

#faq_modal .dataTables_wrapper .dataTables_length {
     float: left !important; 
     margin: 0 !important; 
}

#faq_modal .dataTables_wrapper .dataTables_filter {
    text-align: left !important;
    margin: 0 5px 0 0 !important;
}

</style>

<ul class="nav nav-tabs  m-tabs-line mb-1" role="tablist">
    <li class="nav-item m-tabs__item mr-3">
        <a class="nav-link m-tabs__link own_draft px-2 active" data-toggle="tab" href="#m_tabs_2_1">My Own Drafts</a>
    </li>
    <li class="nav-item m-tabs__item">
        <a class="nav-link m-tabs__link px-2" data-toggle="tab" href="#m_tabs_2_2" title="Default Draft">Default Drafts</a>
    </li>
</ul>
<div class="tab-content mt-3">
    <div class="tab-pane own_draft active" id="m_tabs_2_1" role="tabpanel">
        <div class="m-section mb-0">
		    <?php // if($check==true || $mentor_idz=='123'){ ?>
            <button class="btn btn-warning mb-3 add_faq_btn btn-sm"><i class="fas fa-comments"></i> Create My Own Draft</button>
            <!--<a href="<?php //echo base_url('faq/exportfaq'); ?>" class="btn btn-primary" target="_blank">Export</a>-->
            <?php //} ?>
            
            <div class="add_faqs_section">
            <form action="#" id="mentor_draft" class="m-form m-form--fit m-form--label-align-right">
            <input type="hidden" value="" name="mfaq_id" id="mfaq_id"/>
					
            <div class="form-group m-form__group">
              <label for="manswer">Enter Your Draft :<span class="text-danger">*</span></label>
              <textarea class="form-control m-input clear_field" id="manswer" name="manswer" rows="3" placeholder="Enter Your Draft"></textarea>
            </div>
            
            <div class="form-group m-form__group">
              <label for="mquestion">Enter The Question / Keyword :</label>
              <input type="text" class="form-control m-input clear_field" id="mquestion" name="mquestion" placeholder="Enter The Question / Keyword">
            </div>

					
            <div class="form-group m-form__group">
                <button type="button" id="btnSave" onclick="saveMentorDraft()" class="btn btn-success text-dark btn-sm">Save Draft</button>
                <button type="button" class="btn btn-danger close_btn btn-sm">Cancel</button>
            </div>
					
                </form>
            </div> 
        
            
            <!--<div class="table-responsive">-->
                <table class="table m-table table-bordered m-table--border-brand" cellspacing="0" width="100%" id="c_id_faq">
                  <thead>
                    <tr class="text-center">
                        <th style="width:20%;">Question</th>
                        <th style="width:50%;">Answer</th>
                        <!--<th style="width:120px;">Action </th>-->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach($mentor_draft as $faq){?>
                    <tr>
                        <td><?php echo $faq['question'];?></td>
                        <td class="pwd_spn_mdraft<?php echo $faq['id'];?>"><?php echo $faq['answer'];?> <div class="clearfix"></div> <a href="javascript:void(0)" class="cp_btn_mdraft" data-id="<?php echo $faq['id'];?>" data-toggle="tooltip" data-placement="top" title="Copy Text"><i class="fa fa-copy"></i></a></td>
                    </tr>
                    <?php $i++; }?>
                  </tbody>
                </table>
            <!--</div>-->
        
          </div>
    </div>
    
    <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
       <div class="mb-3 filter_div">
            <label class="">Related to : </label>
            <select name="type" class="form-control m-form__group" id="table_select">
              <option value="">All</option>
              <?php foreach($faqs_titles as $val){?>
              <option value="<?php echo $val['title'];?>"><?php echo $val['title'];?></option>
              <?php } ?>
            </select>
		</div>
		<!--begin::Section-->
		<div class="m-section mb-0">
		    <?php  if($check==true || $mentor_idz=='123'){ ?>
            <button class="btn btn-success" onclick="add_faq()"><i class="glyphicon glyphicon-plus"></i> Add faq</button>
            <a href="<?php echo base_url('faq/exportfaq'); ?>" class="btn btn-primary" target="_blank">Export</a>
            <?php } ?>
            
            <div class="table-responsive">
                <table class="table_id table m-table table-bordered m-table--border-brand" cellspacing="0" width="100%">
                  <thead>
                    <tr class="text-center">
                        <th style="width:10%;">Title</th>
                        <th style="width:20%;">Question</th>
                        <th style="width:50%;">Answer</th>
                        <!--<th style="width:10%;">Action </th>-->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach(array_reverse($faqs_details) as $faq){?>
                    <tr>
                        <td><?php echo ucwords(strtolower($faq->title));?></td>
                        <td><?php echo $faq->question;?></td>
                        <td class="pwd_spn<?php echo $faq->faq_id;?>"><?php echo $faq->answer;?><div class="clearfix"></div> <a href="javascript:void(0)" class="cp_btn" data-id="<?php echo $faq->faq_id;?>" data-toggle="tooltip" data-placement="top" title="Copy Text"><i class="fa fa-copy"></i></a></td>
                    </tr>
                    <?php $i++; }?>
                  </tbody>
            </table>
            </div>
        
          </div>
    </div>
</div>

<div class="d-none">
    
<ul class="nav nav-tabs  m-tabs-line mb-1" role="tablist">
    <li class="nav-item m-tabs__item mr-3">
        <a class="nav-link m-tabs__link own_draft px-2 active" data-toggle="tab" href="#m_tabs_2_1">My Own Drafts</a>
    </li>
    <li class="nav-item m-tabs__item">
        <a class="nav-link m-tabs__link px-2" data-toggle="tab" href="#m_tabs_2_2" title="Default Draft">Default Drafts</a>
    </li>
</ul>
<div class="tab-content mt-3">
    <div class="tab-pane own_draft active" id="m_tabs_2_1" role="tabpanel">
        <div class="m-section mb-0">
		    <?php // if($check==true || $mentor_idz=='123'){ ?>
            <button class="btn btn-warning mb-3 add_faq_btn btn-sm"><i class="fas fa-comments"></i> Create My Own Draft</button>
            <!--<a href="<?php //echo base_url('faq/exportfaq'); ?>" class="btn btn-primary" target="_blank">Export</a>-->
            <?php //} ?>
            
            <div class="add_faqs_section">
            <form action="#" id="mentor_draft" class="m-form m-form--fit m-form--label-align-right">
            <input type="hidden" value="" name="mfaq_id" id="mfaq_id"/>
					
            <div class="form-group m-form__group">
              <label for="manswer">Enter Your Draft :<span class="text-danger">*</span></label>
              <textarea class="form-control m-input clear_field" id="manswer" name="manswer" rows="3" placeholder="Enter Your Draft"></textarea>
            </div>
            
            <div class="form-group m-form__group">
              <label for="mquestion">Enter The Question / Keyword :</label>
              <input type="text" class="form-control m-input clear_field" id="mquestion" name="mquestion" placeholder="Enter The Question / Keyword">
            </div>

					
            <div class="form-group m-form__group">
                <button type="button" id="btnSave" onclick="saveMentorDraft()" class="btn btn-success text-dark btn-sm">Save Draft</button>
                <button type="button" class="btn btn-danger close_btn btn-sm">Cancel</button>
            </div>
					
                </form>
            </div> 
        
            
            <!--<div class="table-responsive">-->
                <table class="table m-table table-bordered m-table--border-brand" cellspacing="0" width="100%" id="c_id_faq">
                  <tbody>
                    <?php $i=1; foreach($mentor_draft as $faq){?>
                    <tr>
                        <td><b>Question:</b> <?php echo $faq['question'];?> <br> <span class="pwd_spn_mdraft<?php echo $faq['id'];?>"><b>Answer:</b> <?php echo $faq['answer'];?> <div class="clearfix"></div> <a href="javascript:void(0)" class="cp_btn_mdraft" data-id="<?php echo $faq['id'];?>" data-toggle="tooltip" data-placement="top" title="Copy Text"><i class="fa fa-copy"></i></a></span></td>
                    </tr>
                    <?php $i++; }?>
                  </tbody>
                </table>
            <!--</div>-->
        
          </div>
    </div>
    
    <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
       <div class="mb-3 filter_div">
            <label class="">Related to : </label>
            <select name="type" class="form-control m-form__group" id="table_select">
              <option value="">All</option>
              <?php foreach($faqs_titles as $val){?>
              <option value="<?php echo $val['title'];?>"><?php echo $val['title'];?></option>
              <?php } ?>
            </select>
		</div>
		<!--begin::Section-->
		<div class="m-section mb-0">
		    <?php  if($check==true || $mentor_idz=='123'){ ?>
            <button class="btn btn-success" onclick="add_faq()"><i class="glyphicon glyphicon-plus"></i> Add faq</button>
            <a href="<?php echo base_url('faq/exportfaq'); ?>" class="btn btn-primary" target="_blank">Export</a>
            <?php } ?>
            
            <div class="table-responsive">
                <table class="table_id table m-table table-bordered m-table--border-brand" cellspacing="0" width="100%">
                  <tbody>
                    <?php $i=1; foreach(array_reverse($faqs_details) as $faq){?>
                    <tr>
                        <td><b>Title:</b> <?php echo ucwords(strtolower($faq->title));?> <br> <b>Question:</b> <?php echo $faq->question;?> <br> 
                        <span class="pwd_spn<?php echo $faq->faq_id;?>"><b>Answer:</b> <?php echo $faq->answer;?><div class="clearfix"></div> <a href="javascript:void(0)" class="cp_btn" data-id="<?php echo $faq->faq_id;?>" data-toggle="tooltip" data-placement="top" title="Copy Text"><i class="fa fa-copy"></i></a></span></td>
                    </tr>
                    <?php $i++; }?>
                  </tbody>
            </table>
            </div>
        
          </div>
    </div>
</div>
</div>
