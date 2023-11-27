<?php
    error_reporting(0);
?>
<style type="text/css">

</style>
<div class="lead_show_desk">
    <!--start:: Active Client Journey -->
    <div class="m-content">
    	
    	<div class="m-portlet" id="m_portlet">
    		<div class="m-portlet__body py-3">
    		          
    		    <div class="m-section position-relative">
    		        
        		    <div class="m-section__content position-relative">
        		        <?php
        		            if(!empty($get_parameters) && !empty($get_parameters['lead_by'])){
                                $lead_label = "Unit & Revenue List";
                            }else{
                                $lead_label = "Unit & Revenue List";
                            }
        		        ?>
        		        
        		        <h3 class="lead_heading"><?= $lead_label; ?></h3>
        		        <table class="table table-bordered m-table m-table--border-brand table-responsive" id="order_details_data" style="width: 100%">
        		            <thead>
        		                <tr>
        		                    <th >#</th>
        		                    <th style="width: 20%">First Name </th>
        		                    <th style="width: 20%">Last Name</th>
        		                    <th style="width: 20%">Email Id</th>
        		                    <th style="width: 20%">Program Name</th>
                                    <th style="width: 20%">Amount</th>
                                    <th style="width: 20%">Pruchase Date</th> 
                                    
        		                    
        	                    </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
    			<div id=""></div>
    		</div>
    	</div>
    </div>
    <!--end:: Active Client Journey -->
</div>
<?php
    if($_GET['today_sales']==1){
        $url = base_url()."dashboard/unit_list_with_revenue?today_sales=1";
    }else{
        $url = base_url()."dashboard/unit_list_with_revenue?today_sales=0";
    }
?>
<script type="text/javascript">

    function order_details_table(){
var i=1;
        $('#order_details_data').DataTable({
            "ajax": {
                "type" : "GET",
                "url" : "<?php echo $url?>",
                "dataSrc": "unit_list_with_revenue",
                beforeSend: function () {
                    $("#cover-spin").show();
                }
            },
            language: {
                search : "",
                searchPlaceholder: "Search By Email Id"
            },
            "columns": [
                /*{ "data": null,  "render": function ( data, type, full, meta ) {
                    }},*/
                
            ],
            "ordering": false,
            "lengthChange": false,
            /*searchPanes: {
                layout: 'columns-8',
                columns: [5,6,7,8,9,10,11,12]
            },*/
            dom: 'Plfrtip',
            columnDefs: [
                {
                    searchPanes: {
                        show: true
                    },
                    // targets: [5,6,3],
                },
                /*{
                    "targets": [5,6,7,8,9,10,11,12],
                    "visible": false
                },*/
                { "width": "5%", "targets": 0 },
                { "width": "30%", "targets": 1 },
                { "width": "30%", "targets": 2 },
                { "width": "20%", "targets": 3 },
                { "width": "15%", "targets": 4 },
                { "width": "15%", "targets": 5 },
                { "width": "15%", "targets": 6 },
                // { "width": "15%", "targets": 5 },
                {
                    // puts a button in the last column
                    targets: [5], render: function (a, b, data, s) {
                        return data.amt;
                    }
                },
                {
                    // puts a button in the last column
                    targets: [6], render: function (a, b, data, s) {
                        return data.date;
                    }
                },
                /*{
                    // puts a button in the last column
                    targets: [5], render: function (a, b, data, s) {
                        return data.category;
                    }
                },*/
                {
                    // puts a button in the last column
                    targets: [4], render: function (a, b, data, s) {
                        return data.program_name;
                    }
                },
                {
                    // puts a button in the last column
                    targets: [3], render: function (a, b, data, s) {
                        return data.email_id;
                    }
                },
                {
                    // puts a button in the last column
                    targets: [2], render: function (a, b, data, s) {
                        return data.last_name;
                    }
                },
                {
                    // puts a button in the last column
                    targets: [1], render: function (a, b, data, s) {
                       return "<a href='<?php echo base_url()?>user_details?user_email="+data.email_id+"&user_status=lead' target='_blank'>"+data.first_name+"</a>";
                    }
                },
                {
                    // puts a button in the last column
                    targets: [0], render: function (a, b, data, s) {
                       return data.row;
                    }
                }
            ],
            
            "rowCallback": function( row, data, dataIndex ) {
                
            },
            initComplete: function () {
                
                $("#cover-spin").hide();
            },
            retrieve: true,
        });
    }
    $(window).on('load',function(){
        order_details_table();
    });
</script>
