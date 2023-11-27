
                         
                        <div id="spindata">
                            <h3 class="lead_heading" style="
    margin-left: 5%;
    margin-top: 3%;
" ><?php echo $title; ?></h3>
                        </div>
                        
                   
                    
                    <script>
                     $(window).on('load',function(){
                         var base_url="https://www.balancenutrition.in/sales_crm/";
                      var addData =
                    '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered m-table m-table--border-brand" id="maintenance_table_data" style="width: 90%;!important"> <thead style="background-color: #c4c5d6;"><tr><th>Lead Details</th><th>Prize</th> <th>Date</th> <th>Source</th> </tr></thead> </table> </div> </div>';
                $('#spindata').append(addData);
                
                $('#maintenance_table_data').DataTable({
                    // processing: true,
                    "ordering": false,
                    "ajax": {
                        "type": "GET",
                        "url" : "<?php echo base_url()?>lead/get_spin_details_data",
                        "dataSrc": "spin_details_data",
                       
                    },
                    "columns": [
                        // { "data": "full_name" },
                        {
                            "data": null,
                            "render": function(data, type, full, meta) {
                                var html= '<a href="' + base_url +
                                    'user_details?user_email=' + data
                                    .email +
                                    '&user_status=lead" target="_blank" style="color:blue;text-decoration:underline;" >' +
                                    data.fname + '</a></br>';
                                    html+=data.email+'</br>';
                                    html+=data.phone +
                                    '<br/>';
                                     html+=data.country +
                                    '<br/>';
                                    
                                    return html;
                            }
                        },
                        
                         
                        
                        {
                            "data": null,
                            "render": function(data, type, full, meta) {
                             
                             html=data.Prize;
                                    
                                    return html;
                                // html +='<span style="display: flex;"><span class="btn btn-sm btn-success mr-1"><a href="https://wa.me/91'+data.mentor_phone.replace(/[^\d]/g, '')+'/?text=Hello '+data.mentor_name+',%0a%0aProgram Start date for Client %0aName : '+data.NAME+'%0aEmail : '+data.email_id+'%0aSet by : '+sds+' is overdue by *'+data.cal_days+'*.%0a%0aShall i call the client or close the program?%0a%0a" class="text-white" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true">  </i> Mentor</a></span></span>';
                                // return html;
                            }
                        },
                       
                        {
                            "data": null,
                            "render": function(data, type, full, meta) {
                               html=data.date_created;
                                    
                                    return html;
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, full, meta) {
                                  html=data.primary_source;
                                    
                                    return html;
                            }
                        }

                    ],
                    initComplete: function() {
                        // console.log()();
                        // $("#cover-spin").hide
                    },
                    retrieve: true,
                });
                
                     });
                    </script>