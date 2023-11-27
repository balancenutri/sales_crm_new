<style type="text/css">
    input[type=checkbox]{
        margin-right: 1%;
    }
</style> 
<div class="m-content">
    <div class="m-portlet m-portlet--bordered m-portlet--unair">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Performance Analysis
                    </h3>
                </div>          
            </div>
        </div>
        <div class="m-portlet__body pa-p-0 pt-3">
            <span class="m-section__sub">
                <div class="float-left goal_set mb-4">
                    <p>Goal set: Rs. <span><?= $goal_set[0]['sale_goal']; ?></span> | Units <span><?= $goal_set[0]['unit_goal']; ?></span></p>
                </div>
                <div class="float-right goal_set mb-4">
                    <p>Goal achieved: Rs. <span><?= $sales_funnel_sales[0]['amt']; ?></span> | Units <span><?= $sales_funnel_sales[0]['unit']; ?></span></p>
                </div>
            </span>
            <div class="clearfix"></div>
            
    
        </div>
    </div>
</div>
