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
	
	
	<script src="https://cdn.tiny.cloud/1/2257lyhw8ha7c820iqo8nr9r6dsyqllv5w3wcsoh2owyoe2z/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
        tinymce.init({
            selector: '#description',
            height: 300,  // Set the height of the editor
            plugins: 'autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        });
        
        
        
         tinymce.init({
            selector: '#editDescription',
            height: 300,  // Set the height of the editor
            plugins: 'autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        });
    </script>
	
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

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}

		th,
		td {
			width: 50px;
		}
.modal-content {
    width:160%;
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
			#tipsTable{
				margin-top: 78px
			}
		/* table.dataTable {
			width: 100%;
			margin: 76px auto;
			clear: both;
			border-collapse: separate;
			border-spacing: 0;
		} */
		
	</style>
	<script>
		$(document).ready(function () {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function () {
				if (this.checked) {
					checkbox.each(function () {
						this.checked = true;
					});
				} else {
					checkbox.each(function () {
						this.checked = false;
					});
				}
			});
			checkbox.click(function () {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</head>

<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2> <b>Tips</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="#addTipsModal" class="btn btn-success" data-toggle="modal"><span>Add
									Tips</span></a>
						</div>
					</div>
				</div>
				<table id="tipsTable" class="table table-striped table-hover table-bordered">
					<thead>
						<tr class="table-active">
							<th>Title</th>
							<th>Image</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!-- Existing table rows can go here if applicable -->
					</tbody>
				</table>

			</div>
		</div>
	</div>
	<!-- Add Modal HTML -->
	<div id="addTipsModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="tipsForm" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Add Tips</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" id="title" required>
						</div>
					 <div class="form-group" id="imageInputs">
                        <label>Images</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="images[]" multiple required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger" onclick="removeImageInput(this)">Delete</button>
                            </div>
                        </div>
                        <!-- Additional file input fields will be appended here dynamically -->
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addImageInput()">Add More</button>
    					<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" id="description" name="description"></textarea>
							<!--<input type="text" class="form-control" id="description" required></input>-->
						</div>
						
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="editTipsModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="editTipsForm">
					<div class="modal-header">
						<h4 class="modal-title">Edit Tips</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="editTipId" name="editTipId">
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" id="editTitle" name="editTitle" required>
						</div>
						<div class="form-group">
							<label>Image</label>
							<div id="editImagePreview">
							 </div>
							<!--<input type="file" class="form-control" id="editImage" name="editImage[]">-->
							<!-- Hidden input to store the current image filename -->
							<!--<input type="hidden" id="currentImage" name="currentImage">-->
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" id="editDescription" name="editDescription"
								required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save Changes">
					</div>
				</form>
			</div>
		</div>
	</div>

<script>
    function addImageInput() {
        // Create a new file input field
        var newInput = $(
            '<div class="input-group mb-3">' +
            '<input type="file" class="form-control" name="images[]" multiple required>' +
            '<div class="input-group-append">' +
            '<button type="button" class="btn btn-danger" onclick="removeImageInput(this)">Delete</button>' +
            '</div>' +
            '</div>'
        );
        // Append the new input to the container
        $('#imageInputs').append(newInput);
    }

    function removeImageInput(button) {
        // Remove the parent div of the clicked "Delete" button
        $(button).closest('.input-group').remove();
    }
</script>
	<script>
		$(document).ready(function () {

			// fetch all data
			function loadData() {
				$.ajax({
					type: "GET",
					url: "<?php echo base_url('tips/getTipsData'); ?>",
					dataType: 'json',
					success: function (data) {
						console.log(data);
						
						$("#tipsTable tbody").empty();
						$.each(data, function (index, tip) {
						    
						 var titleRow = "<tr><td width='20px'>" + tip.title + "</td><td>";

                    // Split the comma-separated images and create img tags
                   var images = tip.image.split(',');
                    var imageElements = '';
                    
                    for (var i = 0; i < images.length; i++) {
                        imageElements += "<img src='http://balancenutrition.in/sales_crm_new/images/tips_recepies/" + images[i] + "' alt='Image' width='150' height='130'>";
                    }
                    
                    var titleRow = "<tr><td>" + tip.title + "</td><td>" + imageElements + "</td><td>" + tip.description + "</td><td> <a href='#editTipsModal' class='edit' data-toggle='modal' data-tip-id='" + tip.id + "' data-tip-title='" + tip.title + "' data-tip-image='" + tip.image + "' data-tip-description='" + tip.description + "'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a><a href='#deleteEmployeeModal' class='delete' data-toggle='modal' data-tip-id='" + tip.id + "'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a></td></tr>";
                    
                    $("#tipsTable tbody").append(titleRow);

						});

						$('#tipsTable').DataTable();
					},
					error: function () {
						console.error("Error fetching data.");
					}
				});
			}

			loadData();

			// add data

			$("#tipsForm").on("submit", function (e) {
				e.preventDefault();
				console.log("in func");
				var title = $("#title").val();
				var description = $("#description").val();
				var formData = new FormData();
				formData.append("title", title);
				formData.append("description", description);

                
                $('#imageInputs input[type="file"]').each(function (index, input) {
                var files = input.files;
                for (var i = 0; i < files.length; i++) {
                    formData.append("images[]", files[i]);
                }
            });

				$.ajax({
					type: "POST",
					url: "<?php echo base_url('tips/addTips'); ?>",
					data: formData,
					contentType: false,
					processData: false,
					success: function (response) {

						var result = JSON.parse(response);
						if (result.status == "success") {
							$('#addTipsModal').modal('hide');
							$("#title").val('');
							$("#description").val('');
							$("#image").val('');
							$('.modal-backdrop').remove();
							loadData();

						} else {
							alert('Error: ' + response.message);
						}
					},

					error: function () {
						console.error("Error submitting data.");
					}
				});
			});


			// delete data 

			function deleteTip(tipId) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('tips/deleteTips'); ?>",
					data: { tip_id: tipId },
					dataType: 'json',
					success: function (data) {
						if (data.status === 'success') {
							alert(data.message);
							loadData();
						} else {
							alert("Error: " + data.message);
						}
					},
					error: function () {
						console.error("Error deleting data.");
					}
				});
			}

			$('#tipsTable').on('click', 'a.delete', function () {
				if (confirm("Are you sure you want to delete this tip?")) {
					var tipId = $(this).data('tip-id');
					deleteTip(tipId);
				}
			});




            // Edit Tips Functionality
        $('#tipsTable').on('click', 'a.edit', function () {
            var tipId = $(this).data('tip-id');
            var tipTitle = $(this).data('tip-title');
            var tipImages = $(this).data('tip-image').split(',');
            var tipDescription = $(this).data('tip-description');
        
            // Set the tipId, title, and description
            $('#editTipId').val(tipId);
            $('#editTitle').val(tipTitle);
            $('#editDescription').val(tipDescription);
        
            // Display images in the edit form
            var imagePreviewContainer = $('#editImagePreview');
            imagePreviewContainer.empty();
        
            // Iterate through the images and append them to the container
            for (var i = 0; i < tipImages.length; i++) {
                var imageUrl = 'https://balancenutrition.in/sales_crm_new/images/tips_recepies/' + tipImages[i].trim();
                var imageElement = $("<div>").addClass('existing-image-container row');
                var imgContainer = $("<div>").addClass('col-md-4');
                var img = $("<img>")
                    .attr('src', imageUrl)
                    .attr('alt', 'Image')
                    .attr('id', i)   
                    .attr('width', '100')
                    .attr('height', '100')
                    .addClass('existing-image'); // Add a class to identify existing images
        
                var fileInputContainer = $("<div>").addClass('col-md-5');
                var removeButtonContainer = $("<div>").addClass('col-md-3'); // Adjusted to 3 columns
        
                // If there are existing images, add a "Remove" button
                if (tipImages[i].trim() !== '') {
                    var fileInput = $("<input>")
                        .attr('type', 'file')
                        .addClass('form-control')
                        .attr('name', 'editImage[]')
                        .attr('row_id', i)     
                        .on('change', function() {
                            var rowId = $(this).attr('row_id');
                            rm_img(rowId);
                            // Optionally, remove the corresponding image container from the DOM
                            $(this).closest('.existing-image-container').remove();
                        })                          
                        .attr('multiple', 'multiple')
                        .data('image-url', tipImages[i].trim());
        
                    var removeButton = $("<button>")
                        .text('Remove')
                        .addClass('btn btn-danger remove-image-button')
                        .attr('type', 'button')
                        .data('image-url', tipImages[i].trim());
        
                    fileInputContainer.append(fileInput);
                    removeButtonContainer.append(removeButton);
                }
        
                imgContainer.append(img);
                imageElement.append(imgContainer, fileInputContainer, removeButtonContainer);
                imagePreviewContainer.append(imageElement);
            }
        
            // Add "Add More" button for additional images
            var addMoreButtonContainer = $("<div>").addClass('col-md-12'); // Adjusted to 12 columns
            var addMoreButton = $("<button>")
                .text('Add More')
                .addClass('btn btn-primary add-more-button col-md-2 m-3') // Adjusted to 2 columns
                .attr('type', 'button');
        
            addMoreButtonContainer.append(addMoreButton);
            imagePreviewContainer.append(addMoreButtonContainer);
        });

          function rm_img(id) {
            // Remove the image by id
             $('#editImagePreview').find('.existing-image-container[row_id="' + rowId + '"]').remove();
        }
        // Event listener for removing existing images
        $('#editImagePreview').on('click', '.remove-image-button', function () {
            var imageUrlToRemove = $(this).data('image-url');
            $(this).closest('.existing-image-container').remove();
            // Add logic here to keep track of removed images, if needed
        });
        
        // Event listener for "Add More" button
        $('#editImagePreview').on('click', '.add-more-button', function () {
            addNewImageInput();
        });
        
        // Event listener for removing new images
        $('#editImagePreview').on('click', '.remove-new-image-button', function () {
            $(this).closest('.existing-image-container').remove();
        });

        // Function to add new image input for additional images
        function addNewImageInput() {
            var newImageInputContainer = $("<div>").addClass('existing-image-container row');
            
            var newImageInput = $('<input>')
                .attr('type', 'file')
                .addClass('form-control col-md-9 m-1') // Adjusted to` 5 columns
                .attr('name', 'editImage[]')
                .attr('multiple', 'multiple');
        
            var removeNewImageButtonContainer = $("<div>").addClass('col-md-2'); // Adjusted to 3 columns
            var removeNewImageButton = $("<button>")
                .text('Remove')
                .addClass('btn btn-danger remove-new-image-button')
                .attr('type', 'button');
        
            newImageInputContainer.append(newImageInput, removeNewImageButton);
            $('#editImagePreview').append(newImageInputContainer);
        }


			$('#editTipsForm').on('submit', function (e) {
				e.preventDefault();
				var tipId = $('#editTipId').val();
				var title = $('#editTitle').val();
				var description = $('#editDescription').val();
				var currentImage = $('#currentImage').val(); // Retrieve the current image filename

				var formData = new FormData();
				formData.append('tip_id', tipId);
				formData.append('title', title);
				formData.append('description', description);
    
                var existingImages= [];
                $('#editImagePreview .existing-image-container').each(function () {
                var imageUrl = $(this).find('img').attr('src');
                var imageName = imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
                console.log("imageName" +imageName);
                formData.append('existingImages[]', imageName);
             });
        
        
        // var newImages = [];
        //     var newImagesInput = $('#editImagePreview input[type="file"]');
        //     for (var i = 0; i < newImagesInput.length; i++) {
        //         console.log("newImagesInput[i].files" + newImagesInput[i].files);
        //         var files = newImagesInput[i].files;
        //         for (var j = 0; j < files.length; j++) {
        //             console.log("files[j]" +files[j]);
        //             formData.append("newImages[]", files[j]);
        //         }
        //     }
            
               var newImages = [];
              $('#editImagePreview .existing-image-container input[type="file"]').each(function (index, input) {
                var files = input.files;
                // alert(files);
                for (var i = 0; i < files.length; i++) {
                    formData.append("newImages[]", files[i]);
                }
            });
            
            // console.log("newImages" +newImages);
            
				// var newImage = $('#editImage')[0].files[0];
			
				// newImage = newImage ? formData.append('image', newImage) : formData.append('image', '');
			
				// currentImage = currentImage ? formData.append('current_image', currentImage) : formData.append('current_image', '');
			

				$.ajax({
					type: 'POST',
					url: "<?php echo base_url('tips/editTips'); ?>",
					data: formData,
					contentType: false,
					processData: false,
					dataType: 'json',
					success: function (response) {
						console.log(response);
						// console.log("response json"+response.JSON());
						if (response.status === 'success') {
							console.log("success result");
							$('#editTipsModal').modal('hide');
							$('#editTipId').val('');
							$('#editTitle').val('');
							$('#editDescription').val('');
							$('#currentImage').val(''); // Retrieve the current image filename
							$('#editImage').val('');

							$('.modal-backdrop').remove();
							loadData();

						}
					}
					
				});
			});
		});

	</script>