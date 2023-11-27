<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		th,
		td {
			width: 100px;
		}

		.dataTables_length {
			position: absolute;
			top: 0;
			left: 0;
			padding: 10px;
			z-index: 1;
		}

		.dataTables_filter {
			position: absolute;
			top: 0;
			right: 0;
			padding: 10px;
			z-index: 1;
		}

		#leadTable {
			margin-top: 78px
		}
		
	</style>

</head>

<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2> <b>Leads</b></h2>
						</div>
						<!-- <div class="col-sm-6">
							<a href="#addTipsModal" class="btn btn-success" data-toggle="modal"><span>Add
									Tips</span></a>
						</div> -->
					</div>
				</div>
				<table id="leadTable" class="table table-striped table-hover table-bordered">
					<thead>
						<tr class="table-active">
							<th>Name</th>
							<th>Email</th>
							<th>Mobile No</th>
							<th>Source</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			
			function loadData() {
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('lead_data/getLeadData'); ?>",
					dataType: 'json',
					success: function (data) {
					console.log(data);
						var tableBody = $("#leadTable tbody");

						tableBody.empty();

						var rowsToAppend = "";

						// Loop through the data and create rows
						for (var i = 0; i < data.length; i++) {

							var lead = data[i];

							var visitedDate = new Date(lead.created); // Assuming data[i].visited_at contains the date and time

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

							rowsToAppend += "<tr>";
							rowsToAppend += "<td>" + lead.first_name + " " + lead.last_name + "</td>";
							rowsToAppend += "<td>" + lead.email_id + "</td>";
							rowsToAppend += "<td>" + lead.phone + "</td>";
							rowsToAppend += "<td>" + lead.source + "</td>";
							rowsToAppend += "<td>" + formattedDate + "</td>";
							rowsToAppend += "</tr>";
						}

						tableBody.html(rowsToAppend);
						$('#leadTable').DataTable();
					},
					error: function () {
						console.error("Error fetching data.");
					}
				});
			}

			loadData();

		});

	</script>