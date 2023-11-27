<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
<div class="row m-5">
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        <!-- Healthy Recipes Section -->
        <div class="m-portlet card-with-white-background" id="m_portlet">
            <div class="m-portlet__body" style="height: 170px; margin-left: 12px; padding: 0.8rem 1.2rem;">
                <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                    <tbody>
                        <tr class="text-center">
                            <th colspan="2">Healthy Recipes</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="1"><b>Today</b></td>
                            <td colspan="1"><b>Last 30 Days</b></td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <span id="recipe_today_count" style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;" class="cursor m--font-info popup" data-id="recipe_today_count" data-toggle="modal" data-target="#client_summary_popup">0</span>
                            </td>
                            <td>
                                <span id="recipe_30_days_count" style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;" class="cursor m--font-info popup" data-id="recipe_30_days_count" data-toggle="modal" data-target="#client_summary_popup">8</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        <!-- Healthy Blog Section -->
        <div class="m-portlet card-with-white-background" id="m_portlet">
            <div class="m-portlet__body" style="height: 170px; margin-left: 12px; padding: 0.8rem 1.2rem;">
                <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                    <tbody>
                        <tr class="text-center">
                            <th colspan="2">Healthy Blog</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="1"><b>Today</b></td>
                            <td colspan="1"><b>Last 30 Days</b></td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <span id="blog_today_count" style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;" class="cursor m--font-info popup" data-id="blog_today_count" data-toggle="modal" data-target="#client_summary_popup">5</span>
                            </td>
                            <td>
                                <span id="blog_30_days_count" style="font-size: 1.75rem; font-weight: 600; text-align: center; cursor: pointer;" class="cursor m--font-info popup" data-id="blog_30_days_count" data-toggle="modal" data-target="#client_summary_popup">37</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function () {

    });

    function fetchDataAndPopulateTable(type) {
        var $tableBody = $('#health-data tbody');

        $.ajax({
            url: "<?php echo base_url("health_blog/getHealthBlogData"); ?>",
            type: 'POST',
            dataType: 'json',
            success: function (response) {
    if (response.success) {
        $tableBody.empty(); // Clear existing table data

        if (type === 'healthy-recipes') {
            var healthRecipes = response.data.health_recipes;
            healthRecipes.forEach(function (recipe) {
                var rowHtml = '<tr>';
                rowHtml += '<td>' + recipe.gyaan_name + '</td>';
                rowHtml += '<td>' + recipe.email_id + '</td>';
                rowHtml += '<td>' + recipe.visited_at + '</td>';
                rowHtml += '</tr>';
                $tableBody.append(rowHtml);
            });
        } else if (type === 'blog') {
            var healthBlog = response.data.health_reads;
            healthBlog.forEach(function (blog) {
                var rowHtml = '<tr>';
                rowHtml += '<td>' + blog.gyaan_name + '</td>';
                rowHtml += '<td>' + blog.email_id + '</td>';
                rowHtml += '<td>' + blog.visited_at + '</td>';
                rowHtml += '</tr>';
                $tableBody.append(rowHtml);
            });
        }
    } else {
        console.log("No data found");
    }
},

            error: function () {
                console.log("Error fetching data");
            }
        });

    }

    $('#btn-healthy-recipes').click(function () {
        fetchDataAndPopulateTable('healthy-recipes');


    });

    $('#btn-blog').click(function () {
        fetchDataAndPopulateTable('blog');
    });

</script>