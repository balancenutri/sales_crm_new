<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <style>
        .new_pending_grp {
            width: 20% !important;
        }

        .mis_data {
            padding: 7rem 0 0;
        }

        .mis_dropdown_section {
            padding: 1rem 0 2rem;
        }

        #mis_projected_data_wrapper {
            padding: 3rem 0;
        }

        .mis_projected_section_header {
            padding: 0;
        }

        .mis_projected_section_header_left {
            float: left;
            width: 50%;
        }

        .mis_projected_section_header_left h3 {
            font-size: 24px;
            font-weight: 600;
            text-transform: capitalize;
            margin: 0;
            padding: 1rem 0 0;
        }

        .mis_projected_section_header_right {
            float: left;
            width: 50%;
        }

        #mis_projected_data_count,
        #dormant_list_data_count,
        #assessemnt_not_recieved_data_count {
            text-align: right;
            display: block;
            padding: 1rem;
        }

        #mis_projected_data_filter,
        #dormant_list_table_filter,
        #assessemnt_not_recieved_tbl_filter {
            text-align: right;
        }

        .padding_right {
            padding-left: 0;
        }

        .padding_left {
            text-align: right;
        }

        .padding_left label {
            padding: 0.6rem 0 0 !important;
        }

        .mis_projected_section_header_right .row {
            display: flex;
            justify-content: flex-end;
        }

        .mis_projected_section_header_right {
            display: block;
        }

        #m_accordion_client_journey .client_journey_item {
            background: transparent !important;
            border: none !important;
        }

        .client_journey_item .m-accordion.m-accordion--bordered .m-accordion__item .m-accordion__item-head,
        .client_journey_item .m-accordion.m-accordion--bordered .m-accordion__item .m-accordion__item-head:hover,
        .client_journey_item .m-accordion.m-accordion--default .m-accordion__item .m-accordion__item-head,
        .client_journey_item .m-accordion.m-accordion--default .m-accordion__item .m-accordion__item-head:hover {
            background-color: #ffffff !important;
        }

        .m-accordion.m-accordion--bordered .m-accordion__item .m-accordion__item-head,
        .m-accordion.m-accordion--bordered .m-accordion__item .m-accordion__item-head:hover,
        .m-accordion.m-accordion--default .m-accordion__item .m-accordion__item-head,
        .m-accordion.m-accordion--default .m-accordion__item .m-accordion__item-head:hover {
            background-color: #ffffff !important;
        }

        .hs_sec {
            height: 290px;
        }

        .not_started_sec12 {
            display: block;
            text-align: center;
        }

        .not_started_sec12 ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .not_started_sec12 ul li {
            display: inline-block;
            width: 20%;
            text-align: center;
            /*padding: 1rem 0;*/
            color: #2D2F39;
            font-family: 'Poppins';
            border-right: 1px solid #707070;
            vertical-align: text-top;
        }

        .not_started_sec12 ul li h5 {
            text-transform: capitalize;
            padding: 1rem 0 0;
        }



        .not_started_sec12 ul li a {
            font-size: 4rem;
            font-family: 'Poppins';
            font-weight: 600;
            display: block;
            padding: 1.2rem 0 0rem;
        }

        .not_started_sec12 li li {
            width: auto;
            padding: 4px 10px;
            text-align: left;
            border: none;
            display: block;
        }

        .not_started_sec12 li li a {
            font-size: 20px;
            display: inline !important;
            padding: 0;
            float: right;
            line-height: 1.1;
            position: relative;
        }


        .not_started_sec12 li li a img {
            position: absolute;
            right: 0;
        }

        body {
            background-color: #e7e7e7;
        }

        .card-with-white-background {
            background-color: #fff;
            /* White background color */
            border: 1px solid #e1e1e1;
            /* Add a border for separation if needed */
            border-radius: 4px;
            /* Optional: Add rounded corners */
            padding: 10px;
            /* Optional: Add padding for spacing */
        }

        .modal-full-screen .modal-dialog {
            max-width: 80%;
            margin-left: 169px;
            margin-top: 20px;
        }

        /* Add CSS to style the modal body for the desired date format */
        .modal-full-screen .modal-body table tbody td[data-date] {
            content: attr(data-date);
            font-weight: bold;
            text-align: center;
        }

        table.table thead th {
            text-align: center;
        }

        /* Center the table contents (td) */
        table.table tbody td {
            text-align: center;
        }
        .dataTables_length {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px;
            z-index: 1; /* Add z-index to make sure it's displayed above the table */
        }

        /* Adjust the position of search element to top right corner */
        .dataTables_filter {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            z-index: 1; /* Add z-index to make sure it's displayed above the table */
        }
        #healthTable{
            margin-top: 78px
        }
</style>
</head>

<body>
    <div class="row m-5 text-align">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-4">
            <!--begin::Portlet-->
            <div class="m-portlet card-with-white-background" id="m_portlet">
                <div class="m-portlet__body" style="height: 170px;margin-left: 12px;padding: 0.8rem 1.2rem;">
                    <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                        <tbody>

                            <tr class="text-center">
                                <th colspan="2"> Healthy Recepies</th>
                            </tr>
                            <tr class="text-center">
                                <td colspan="1"><b>Today</b></td>
                                <td colspan="1"><b>Last 30 Days</b></td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    <span id="recipe_today_count" data-category="Healthy_Recipes" data-time="today"
                                        onclick="fetch_user_list('Healthy_Recipes','today')"
                                        style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;"
                                        class="cursor m--font-info popup" data-id="recipe_today_count"
                                        data-toggle="modal" data-target=""></span>
                                </td>

                                <td>
                                    <span id="recipe_30_days_count" data-category="Healthy_Recipes"
                                        data-time="thirty_days"
                                        onclick="fetch_user_list('Healthy_Recipes','thirty_days')"
                                        style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;"
                                        class="cursor m--font-info popup" data-id="recipe_30_days_count"
                                        data-toggle="modal" data-target=""></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-4">
            <!--begin::Portlet-->
            <div class="m-portlet card-with-white-background" id="m_portlet">
                <div class="m-portlet__body" style="height: 170px;margin-left: 12px;padding: 0.8rem 1.2rem;">
                    <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                        <tbody>

                            <tr class="text-center">
                                <th colspan="2"> Healthy Reads</th>
                            </tr>
                            <tr class="text-center">
                                <td colspan="1"><b>Today</b></td>
                                <td colspan="1"><b>Last 30 Days</b></td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    <span id="blog_today_count" data-category="Health_Reads" data-time="today"
                                        onclick="fetch_user_list('Health_Reads','today')"
                                        style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;"
                                        class="cursor m--font-info popup" data-id="blog_today_count" data-toggle="modal"
                                        data-target="#exampleModal"></span>
                                </td>
                                <td>
                                    <span id="blog_30_days_count" data-category="Health_Reads" data-time="thirty_days"
                                        onclick="fetch_user_list('Health_Reads','thirty_days')"
                                        style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;"
                                        class="cursor m--font-info popup" data-id="blog_30_days_count"
                                        data-toggle="modal" data-target="#exampleModal"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- *********************** Modal Code ********************** -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <div class="modal fade modal-full-screen" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recipies & Reads</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover table-bordered" id="healthTable">
                        <thead class="text-align">
                            <tr class="table-active">
                                
                                <th scope="col">Recipies Name</th>
                                <th scope="col">Recipies Link</th>
                                <th scope="col">Visited Count</th>
                                 <th scope="col">Date</th>
                                <th scope="col">Visisted By</th>
                               
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ************************ Modal Code ******************************** -->

    <script>
        $(document).ready(function () {
            fetchDataAndPopulateCounts();
        });

        function fetchDataAndPopulateCounts() {
            // alert("in function ");
            $.ajax({
                url: "<?php echo base_url('health_blog/getHealthBlogData'); ?>",
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    console.log("in response");
                   
                        console.log(response.Healthy_Recipes_today[0]['total_data_count']);
                        console.log(response.read_30_days_count);

                        $('#recipe_today_count').text(response.Healthy_Recipes_today ? response.Healthy_Recipes_today[0]['total_data_count'] || 0 : 0);
                        $('#recipe_30_days_count').text(response.Healthy_Recipes_30_days ? response.Healthy_Recipes_30_days[0]['total_data_count'] || 0 : 0);
                        
                        $('#blog_today_count').text(response.Health_Reads_today ? response.Health_Reads_today[0]['total_data_count'] || 0 : 0);
                        $('#blog_30_days_count').text(response.Health_Reads_30_days ? response.Health_Reads_30_days[0]['total_data_count'] || 0 : 0);

                   
                },
                error: function () {
                    console.log("Error fetching data");
                }
            });
        }


        function fetch_user_list(screen_name, duration) {
            event.preventDefault();
            console.log("screen_name: " + screen_name);
            console.log("duration: " + duration);


            $.ajax({
                url: "<?php echo base_url('health_blog/get_user_record'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    screen_name: screen_name,
                    duration: duration
                },
                success: function (response) {
                    $('#healthTable').DataTable().destroy();
                    var modalContent = buildModalContent(response);

                    $('#exampleModal .modal-body table tbody').html(modalContent);
                    $('#healthTable').DataTable().search('').page.len(10).draw();

                    $('#healthTable').DataTable();

                    // Show the modal
                    $('#exampleModal').modal('show');
                },
                error: function () {
                    console.log("Error fetching data");
                }
            });

        }


        function buildModalContent(data) {
            var htmlContent = '';
            for (var i = 0; i < data.length; i++) {
                var visitedDate = new Date(data[i].visited_at); // Assuming data[i].visited_at contains the date and time

                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                var day = visitedDate.getDate().toString().padStart(2, '0');
                var month = months[visitedDate.getMonth()];
                var year = visitedDate.getFullYear();
                var hours = visitedDate.getHours();
                var minutes = visitedDate.getMinutes();
                var amPm = hours >= 12 ? 'PM' : 'AM';

                // Convert hours to 12-hour format
                if (hours > 12) {
                    hours -= 12;
                }

                var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ' ' + amPm;
                var formattedDate = day + ' ' + month + ' ' + year + ' ' + formattedTime;

               
                if(data[i].gyaan_name!="")
                {
                     htmlContent += '<tr>';
                     var screen_name_data = data[i].screen_name;
                     var imageUrl = ''; 
                    
              
                   let stringWithoutSpaces = data[i].gyaan_name.replace(/\s/g, '-');
                   let lowercaseString = stringWithoutSpaces.toLowerCase();
                   
                    console.log("gyaan_name" +lowercaseString);
                    
                // if (screen_name_data == "Health_Reads") {
                  
                //      let stringcatSlug = data[i].catSlug; lowercaseString
                //      console.log("category" + stringcatSlug);
                     
                //       lowercaseString = stringcatSlug +'/'+lowercaseString;
                //       console.log("category/gyaan_name"+lowercaseString);
                    
                // } 
               
                htmlContent += '<td>' + data[i].gyaan_name + '</td>';
                htmlContent += '<td><button class="btn btn-info"><a style="color:white" href="' + getImageUrl(screen_name_data, lowercaseString) + '" target="_blank" style="color: blue;">'+data[i].gyaan_name+'</a></button></td>';
                 htmlContent += '<td>' +  data[i].data_count + '</td>';
                htmlContent += '<td>' + formattedDate + '</td>';
                htmlContent += '<td>' + data[i].email_id + '</td>';
               
                htmlContent += '</tr>';
                }
               
            }

            return htmlContent;
        }
            function getImageUrl(screen_name, imageUrl) 
            {
              console.log("imageUrl"+imageUrl);
                if (screen_name == "Healthy_Recipes") {
                    return 'https://www.balancenutrition.in/recipes/recipe-details/' + imageUrl;
                } 
                else {
                   return '#';
                    // return 'https://www.balancenutrition.in/blog/health-reads/' +imageUrl;
                }
            }

    </script>