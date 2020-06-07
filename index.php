<?php 
$title = 'Employee Listing';
include './views/commonFiles/header2.php'; ?>
<div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Employee Id</th>
				<th>Photo</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Date Of Birth</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Languages</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<!-- Update Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-heading">Edit Employee</div>
						<div class="panel-body">
							<form id="employeeForm" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="firstName">First Name:</label>
									<input type="text" class="form-control" id="firstName" name="firstName">
									<input type="hidden" name="id" id="id">
								</div>
								<div class="form-group">
									<label for="lastName">Last Name:</label>
									<input type="text" class="form-control" id="lastName" name="lastName">
								</div>
								<div class="form-group">
									<label for="gender">Gender:</label>
									<div class="radio radio-inline">
										<label class="radio-inline"><input type="radio" id="gender" name="gender" value="male">Male</label>
										<label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
									</div>
								</div>
								<div class="form-group">
									<label for="dateOfBirth">Date Of Birth:</label>
									<input type="text" class="form-control wid" id="dateOfBirth" name="dateOfBirth" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="email">Email address:</label>
									<input type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="phone">Phone Number:</label>
									<input type="text" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="languages">Language:</label>
									<div class="checkbox checkbox-inline">
										<label class="checkbox-inline"><input type="checkbox" id="languages" value="C" name="languages[]">C</label>
										<label class="checkbox-inline"><input type="checkbox" value="PHP" name="languages[]">PHP</label>
										<label class="checkbox-inline"><input type="checkbox" value="JavaScript" name="languages[]">JavaScript</label>
									</div>
								</div>
								<div class="form-group">
									<label for="photo">Photo:</label>
									<input type="file" class="form-control wid" id="photo" name="photo">
									<div id="img"></div>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Delete Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-heading">Delete Employee</div>
						<div class="panel-body">
							<form id="deleteEmployeeForm" method="POST">
								<h2>Are you sure to delete employee ?</h2>
								<input type="hidden" name="delId">
								<button type="submit" class="btn btn-danger">Delete</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$("ul li").removeClass('active');
		$("ul li:nth-child(1)").addClass('active');
		$("#dateOfBirth").datepicker({
			changeMonth: true,
      		changeYear: true,
      		dateFormat: 'yy-mm-dd'
		});
		$('.table').DataTable( {
			"ajax": "./controller/GetEmployees.php",
			"columns": [
			{ "data": "id" },
			{ "data": function (item, index) { return "<img class='img' src='./uploads/"+item.photo+"'/>"; }},
			{ "data": "firstName" },
			{ "data": "lastName" },
			{ "data": "gender" },
			{ "data": "dateOfBirth" },
			{ "data": "email" },
			{ "data": "phone" },
			{ "data": "languages" },
			{ "data": function (item, index) { return "<a class='btn btn-warning' onclick='editEmployee("+item.id+")' data-toggle='modal' data-target='#exampleModalCenter'>Edit</a><a class='btn btn-danger' onclick='deleteEmployee("+item.id+")'>Delete</a>"; } },
			]
		});

		$('#employeeForm').submit(function (e) {
			e.preventDefault(); 
			let formData = new FormData(this);
			$.ajax({
				url: './controller/UpdateEmployee.php',
				data: formData,
				type: 'POST',
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				success: function(res){
					if (res.status == 'success') {
						window.location.reload();
					}
				},
				error: function(err){
					console.log(err);
				}
			});
		});

		$('#deleteEmployeeForm').submit(function (e) {
			e.preventDefault(); 
			let formData = new FormData(this);
			$.ajax({
				url: './controller/DeleteEmployee.php',
				data: formData,
				type: 'POST',
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				success: function(res){
					if (res.status == 'success') {
						window.location.reload();
					}
				},
				error: function(err){
					console.log(err);
				}
			});
		});
	});

	function editEmployee(obj) {
		$('#id').val(obj);
		$.ajax({
			url: './controller/GetEmployeeById.php',
			type: 'POST',
			dataType: 'json',
			data: {id : obj},
			success: function(res){
				if (res.status == 'success') {
					let data = res.data[0];
					let languages = data.languages.split(', ');
					$('#firstName').val(data.firstName);
					$('#lastName').val(data.lastName);
					$("input[value="+data.gender+"]").attr('checked', true);
					$('#dateOfBirth').val(data.dateOfBirth);
					$('#email').val(data.email);
					$('#phone').val(data.phone);
					$('#img').append('<img class="img" src="./uploads/'+data.photo+'"/>');
					languages.forEach(function (item, index) {
						$("input[value="+item+"]").prop('checked', true);	
					});
				}
			},
			error: function(err){
				console.log(err);
			}
		});	
	}

	function deleteEmployee(obj) {
		$("input[name=delId]").val(obj);
		$("#deleteModal").modal('toggle');
	}
</script>
<?php include './views/commonFiles/footer.php'; ?>
